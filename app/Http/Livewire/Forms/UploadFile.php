<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;


use App\Models\Product;


class UploadFile extends Component
{

    use WithFileUploads;

    // ATTRIBUTES VARS
    public $fileName;
    public $fileSize;
    public $itemName;
    public $item;
    public $fileUrl;
    // STYLES VARS
    public $bgDropArea;

    // MODELS
    public $model;


    public $mimeType;
    public $collectionName;
    public $acceptedFiles;
    public $acceptedMimes;
    public $multiple;
    public $maxUploadFiles;
    public $uploadedFiles;

    public $temporaryFile;
    public $temporaryFolder;

    //public $file;

    protected $listeners = ['addfile' => 'addFile'];

    public function addFile($file){

        dd($file);
        

    }


    public function mount($model, $itemName, $collectionName, $acceptedFiles, $multiple, $maxUploadFiles,$bgDropArea)
    {

        $this->itemName = $itemName;
        $this->collectionName = $collectionName;
        $this->acceptedFiles = $acceptedFiles;
        $this->multiple = $multiple;
        $this->maxUploadFiles = $this->multiple ? $maxUploadFiles : 1;
        $this->bgDropArea = $bgDropArea;
        $this->acceptedMimes = $this->acceptedFiles;

        if (gettype($model) === 'object') {
            $mediaCollections = $model->getRegisteredMediaCollections();
            foreach ($mediaCollections as $media) {

                if ($model->getMedia($media->name)) {
                    $files = $model->getMedia($media->name);
                    $this->uploadedFiles [$media->name] = $files;
                }
            }
            $this->uploadedFiles = json_encode($this->uploadedFiles);

        } else { // creating model

            $this->model = new Product();
            $this->uploadedFiles = false;
        }

    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }


    public function upload(Request $request, $idElement){

            if($request->hasFile($idElement)){
                $files = $request->file($idElement);
    
                foreach($files as $file){
    
                    $fileName = $file->getClientOriginalName();
                    $folder = uniqid() . '-' . now()->timestamp; 
                    $file->storeAs('files/tmp/' . $folder, $fileName);

                    TemporaryFile::create([
                        'folder' => $folder,
                        'filename' => $fileName,
                    ]);

                }

                dd(TemporaryFile::all());

                return $folder;
    
            }
            
            return 'no';
    
    }

    public function store($id){

        

    }

}
