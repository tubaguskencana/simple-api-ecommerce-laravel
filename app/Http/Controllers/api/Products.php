<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductsResource;
use App\Models\Products as ModelsProducts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Validator;

class Products extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ModelsProducts::all();
        return ProductsResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->except('image');
        $path = $request->file('image')->store('public/images');
        $input['image'] = $path;
        $create = ModelsProducts::create($input);
        return new ProductsResource($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsProducts $product)
    {
        return new ProductsResource($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsProducts $product)
    {
        $input = $request->except('image');

        // checking if there is changes on images
        if ($file = $request->file('image')){
            $path = $file->store('public/images');
            $input['image'] = $path;
        }
        $product->update($input);
        return new ProductsResource($product);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsProducts $product)
    {
        $product->delete();
        return $this->sendResponse(['Deleted Successfully']);
    }
}
