<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\ReviewBlogRequest;
use App\Http\Resources\ReviewResourse;
use App\Product;
use App\Review;
use Illuminate\Http\Request;

class ReviewController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @param Product $product
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Product $product)
    {
        return ReviewResourse::collection($product->reviews);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ReviewBlogRequest $request
     * @param Product $product
     * @return \Illuminate\Http\Response
     */
    public function store(ReviewBlogRequest $request, Product $product)
    {
        $review = new Review($request->all());

        $product->reviews()->save($review);

        return $this->sendResponse(new ReviewResourse($review), 'Review created successfully.');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param Product $procduct
     * @param  \App\Review $review
     * @return void
     */
    public function update(Request $request, Product $procduct, Review $review)
    {
        $review->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Product $product
     * @param  \App\Review $review
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Product $product, Review $review)
    {
        $review->delete();
        return $this->sendResponse(null, 'Review delete successfully.');
    }
}
