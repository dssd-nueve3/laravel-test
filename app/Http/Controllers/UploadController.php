<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UploadController extends Controller
{
    public function store(Request $request, $idElement){

        if($request->hasFile($idElement)){
            $files = $request->file($idElement);

            foreach($files as $file){

                $fileName = $file->getClientOriginalName();
                $folder = uniqid() . '-' . now()->timestamp; 
                $file->storeAs('files/' . $folder, $fileName);

            }

            return $folder;

        }
        
        return '';

    }
}
