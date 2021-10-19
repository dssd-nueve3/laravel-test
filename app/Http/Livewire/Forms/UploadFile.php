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



    public function mount($model, $itemName)
    {
        $this->itemName = $itemName;

        if(gettype($model) === 'object'){

            if ($model->getMedia('product_image')) {
                $files = $model->getMedia('product_image');
                foreach($files as $file){
    
                    $this->fileUrl = $file->getUrl();
                    $this->fileName = $file->file_name;
    
                }
    
            }
        }



    }

    public function render()
    {
        return view('livewire.forms.upload-file');
    }

}
