<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;


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


    public function mount($model, $itemName, $collectionName, $acceptedFiles, $multiple, $maxUploadFiles)
    {
        $this->itemName = $itemName;
        $this->collectionName = $collectionName;
        $this->acceptedFiles = $acceptedFiles;
        $this->multiple = $multiple;
        $this->maxUploadFiles = $this->multiple ? $maxUploadFiles : 1;
        $this->defineMimeTypes();

        if(gettype($model) === 'object'){

            $mediaCollections = $model->getRegisteredMediaCollections();

            foreach($mediaCollections as $media){

                if ($model->getMedia($media->name)) {
                    $files = $model->getMedia($media->name);

                    foreach($files as $file){
    
                        $this->uploadedFiles[$file->file_name]['fileUrl'] = $file->getUrl();
                        $this->uploadedFiles[$file->file_name]['fileName'] = $file->file_name;
                        $this->uploadedFiles[$file->file_name]['fileSize'] = $file->size;
                        $this->uploadedFiles[$file->file_name]['mimeType'] = $file->mime_type;
                        $this->uploadedFiles[$file->file_name]['collectionName'] = $media->name;  
       
                    }

                }
    
            }

            $this->uploadedFiles = json_encode($this->uploadedFiles);



        }
        else{
            $this->uploadedFiles = false;
        }

    }

    public function defineMimeTypes(){

        $acceptedFiles = explode(',', $this->acceptedFiles);

        $mimes = [
           '.jpeg' => 'image/jpeg',
           '.jpg' => 'image/jpeg',
           '.pdf' => 'application/pdf',
           '.png' => 'image/png'

        ];

        foreach($acceptedFiles as $acceptedFile){

            $this->acceptedMimes .= $mimes[$acceptedFile] . ",";

        }

        $this->acceptedMimes = substr($this->acceptedMimes, 0, -1);

    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }

}
