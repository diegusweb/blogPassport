<?php

namespace App\Http\Controllers\Api;


use App\Contracts\IProductRepository;
use App\Http\Requests\ProductBlogRequest;
//use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductCollections;
use App\Http\Resources\ProductResourse;
use App\Models\Product;


class ProductController extends BaseController
{
    private $productRepository;
    /**
     * ProductController constructor.
     */
    public function __construct(IProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function index()
    {
        $products = $this->productRepository->all();

        return $this->sendResponse(new ProductCollections($products), 'Products retrieved successfully.');
    }

    public function store(ProductBlogRequest $request)
    {
        $input = $request->all();

        $product = Product::create($input);

        return $this->sendResponse(new ProductResourse($product), 'Product created successfully.');

    }

    public function show($id)
    {
        $product = $this->productRepository->find($id);

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
