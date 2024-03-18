<?php

namespace App\Http\Controllers\Site;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function getIndex()
    {
        $products = Product::all();

        return view('site.pages.products.index' ,compact('products'));
    }

    public function getSingleProduct($slug)
    {
        $product = Product::where('slug' , $slug)->first();
        $relatedProducts = Product::where('id' , '!=' ,$product->id)->get();

        return view('site.pages.products.single' ,compact('product' , 'relatedProducts'));
    }
}
