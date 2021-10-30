<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Brand;
use App\Models\TemporaryFile;
use Illuminate\Http\Request;
use App\Http\Livewire\Forms\UploadFile;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(5);
        return view('admin.product.index', compact('products'))->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function create()
    {

        $collectionItem = Brand::all();
        return view('admin.product.create', compact('collectionItem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        dd($request);

      /*$request->validate([
            'name' => 'required|unique:products|max:255|min:6',
            'description' => 'required',
            'price' => 'required',
        ]);*/

        $product = new Product();

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->brand_id = $request->brand;

        
        if($request->image){

            foreach($request->image as $image){

                $imageInfo = json_decode($image);
                $product->addMedia(storage_path('app/files/tmp/' . $imageInfo->folder . '/' . $imageInfo->filename))->toMediaCollection($request->image_collectionName);

            }

        }

        if($request->image2){

            foreach($request->image2 as $image){

                $imageInfo = json_decode($image);
                $product->addMedia(storage_path('app/files/tmp/' . $imageInfo->folder . '/' . $imageInfo->filename))->toMediaCollection($request->image2_collectionName);

            }

        }



        $product->save();



        return redirect()->route('product.index')->with('success', 'Product created successfully');


    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit($id)
    {

        //get product info
        $product = Product::find($id);
        $brand = Brand::find($product->brand_id);
        $collectionItem = Brand::all();

        return view('admin.product.edit', compact('product', 'brand', 'collectionItem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request,$id)
    {
        $product = Product::find($id);



        /*$request->validate([
            'image' => 'image',
        ]);*/

        //dd($request);

        $product->name = $request->name;
        $product->description = $request->description;
        $product->price = $request->price;

        $product->brand_id = $request->brand;


        if($request->image){

            foreach($request->image as $image){

                if(gettype($image) != 'string'){
                $product->addMedia($image)->toMediaCollection($request->image_collectionName);
                }
            }

        }

        if($request->image2){

            foreach($request->image2 as $image2){

                if(gettype($image2) != 'string'){
                $product->addMedia($image2)->toMediaCollection($request->image2_collectionName);
                }
            }

        }

        else{
            $product->delete();
        }

        $product->save();

        return redirect()->route('product.index')->with('success', 'Product updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {

        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Product deleted successfully');
    }

    public function iterateOverImages($model, $files){

        //$model->addMultipleMediaFromRequest($files);

        foreach ($files as $key => $file){
            if($key == "image"){
                $model->addMedia($file)->toMediaCollection($model->name.'_image');
            }elseif ($key == "gallery"){
                $model->addMedia($file)->toMediaCollection($model->name.'_gallery');
            }


        }

    }



}
