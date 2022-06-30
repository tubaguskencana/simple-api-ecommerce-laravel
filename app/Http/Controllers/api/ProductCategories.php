<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategoriesResource;
use App\Models\ProductCategories as ModelsProductCategories;
use Illuminate\Http\Request;

class ProductCategories extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = ModelsProductCategories::all();
        return ProductCategoriesResource::collection($products);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        $create = ModelsProductCategories::create($input);
        return new ProductCategoriesResource($create);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ModelsProductCategories $productCategory)
    {
        return new ProductCategoriesResource($productCategory);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ModelsProductCategories $productCategory)
    {
        $input = $request->all();
        $productCategory->update($input);
        return new ProductCategoriesResource($productCategory);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(ModelsProductCategories $productCategory)
    {
        $productCategory->delete();
        return $this->sendResponse(['Deleted Successfully']);
    }
}
