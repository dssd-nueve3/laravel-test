<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Http\Request;


use App\Models\TemporaryFile;
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
    public $product;


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

    //TODO: wire Filepond's Events
    protected $listeners = ['addfile' => 'addFile'];

    //TODO: first Filepond Event
    public function addFile($file){

        dd($file);
        

    }


    public function mount($itemName, $collectionName, $acceptedFiles, $multiple, $maxUploadFiles, $bgDropArea)
    {

        $this->itemName = $itemName;
        $this->collectionName = $collectionName;
        $this->acceptedFiles = $acceptedFiles;
        $this->multiple = $multiple;
        $this->maxUploadFiles = $this->multiple ? $maxUploadFiles : 1;
        $this->bgDropArea = $bgDropArea;
        $this->acceptedMimes = $this->acceptedFiles;

        /*if (gettype($model) === 'object') {
            $mediaCollections = $model->getRegisteredMediaCollections();
            foreach ($mediaCollections as $media) {

                if ($model->getMedia($media->name)) {
                    $files = $model->getMedia($media->name);
                    $this->uploadedFiles [$media->name] = $files;
                }
            }
            $this->uploadedFiles = json_encode($this->uploadedFiles);

        } else { // creating model

            //$this->model = new Product();
            $this->uploadedFiles = false;
        }*/

    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }

    //TODO: method use to upload temporary Filepond files, in order to manage request on Filepond Elements,
    //TODO: after saving, file info is returned to Model Controller

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

                return TemporaryFile::where('folder', $folder)->first();
    
            }
            
            return '';
    
    }

    //TODO: method use to load and show files already uploaded, when an id model is passed, search for all its media file related
    //TODO: and passed to render UploadFile element view.

    public function load($idModel){

        //dd($this);

        $files = [];
        $fileObject = [];

       $model = Product::find($idModel);

       dd($model);

       $mediaCollections = $model->getRegisteredMediaCollections();

       foreach ($mediaCollections as $mediaCollection) {

        if ($model->getMedia($mediaCollection->name)) {
            $files = $model->getMedia($mediaCollection->name);
            $files [$mediaCollection->name] = $files;
            }
        
        }

    return $files;

    }

}
