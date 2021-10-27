<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;

use App\Models\Product;


class UploadFile extends Component
{

    use WithFileUploads;

    public $model;
    public $itemName;
    public $item;
    public $fileUrl;
    public $fileName;
    public $fileSize;
    public $mimeType;
    public $collectionName;
    public $acceptedFiles;
    public $acceptedMimes;
    public $multiple;
    public $maxUploadFiles;
    public $uploadedFiles;

    //public $file;

    public function mount($model, $itemName, $collectionName, $acceptedFiles, $multiple, $maxUploadFiles)
    {

        $this->itemName = $itemName;
        $this->collectionName = $collectionName;
        $this->acceptedFiles = $acceptedFiles;
        $this->multiple = $multiple;
        $this->maxUploadFiles = $this->multiple ? $maxUploadFiles : 1;
        $this->defineMimeTypes();

        if (gettype($model) === 'object') {
            $mediaCollections = $model->getRegisteredMediaCollections();
            foreach ($mediaCollections as $media) {

                if ($model->getMedia($media->name)) {
                    $files = $model->getMedia($media->name);
                    $this->uploadedFiles [$media->name]= $files;
                }
            }
            $this->uploadedFiles = json_encode($this->uploadedFiles);

        } else { // creating model

            $this->model = new Product();
            $this->uploadedFiles = false;
        }

    }

    public function defineMimeTypes()
    {

        $acceptedFiles = explode(',', $this->acceptedFiles);

        $mimes = [
            '.jpeg' => 'image/jpeg',
            '.jpg' => 'image/jpeg',
            '.pdf' => 'application/pdf',
            '.png' => 'image/png'

        ];

        foreach ($acceptedFiles as $acceptedFile) {

            $this->acceptedMimes .= $mimes[$acceptedFile] . ",";

        }

        $this->acceptedMimes = substr($this->acceptedMimes, 0, -1);

    }

    public function save(){


        $this->validate([
            'file' => 'image|max:10240',
        ]);

        $this->file->store('public');

    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }

}
