<?php

namespace App\Http\Controllers\Api;


use App\Http\Requests\ProductBlogRequest;
//use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductCollections;
use App\Http\Resources\ProductResourse;

use App\Product;

class ProductController extends BaseController
{
    public function index()
    {
        $products = Product::all();

         //return new ProductCollection(Product::all());

         //dd($products);

        return $this->sendResponse(new ProductCollections(Product::all()), 'Products retrieved successfully.');
    }

    public function store(ProductBlogRequest $request)
    {
        $input = $request->all();

        $product = Product::create($input);

        return $this->sendResponse(new ProductResourse($product), 'Product created successfully.');

    }

    public function show($id)
    {
        $product = Product::find($id);

        if (is_null($product)) {
            return $this->sendError('Product not found.');
        }

        return $this->sendResponse(new ProductResourse($product), 'Product retrieved successfully.');
    }

    public function update(ProductBlogRequest $request, Product $product)
    {
        $product->update($request->all());

        return $this->sendResponse(new ProductResourse($product), 'Product updated successfully.');

    }

    public function destroy(Product $product)
    {
        try {
            $product->delete();
        } catch (\Exception $e) {
            return $this->sendError([], 'Product Problem');
        }

        return $this->sendResponse([], 'Product deleted successfully.');
    }
}
