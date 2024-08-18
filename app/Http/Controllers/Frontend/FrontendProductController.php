<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendProductController extends Controller
{
    // show product
    public function showProduct(string $slug){
        $product = Product::with(['seller','category','productImageGalleries'])->where('slug', $slug)->where('status', 1)->first();
        return view('frontend.pages.product-detail', compact('product')); //product-detail.blade.php
    }
}
