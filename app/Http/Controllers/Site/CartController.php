<?php

namespace App\Http\Controllers\Site;

use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;

class CartController extends Controller
{
    public function getIndex()
    {
        $products = Cart::content();

        return view('site.pages.cart.index' ,compact('products'));

    }

    public function postCart(Request $request , $id)
    {
        $product = Product::find($id);

//        dd($product);

        $items = Cart::content();

        foreach ($items as $item) {
            if ($item->id == $id){
                Cart::update($item->rowId , [
                    'qty' => $item->qty + 1
                ]);
                return ['status' => 'success' ,'data' => ['Cart has been updated successfully']];
            }
        }
        Cart::add([
            'id' => $id,
            'name' => $product->name ,
            'qty' => 1,
            'price' => $product->price,
            'options' => [
                'image' => $product->image,
                'brief' => $product->brief,
            ]
        ]);

//        $carts = Cart::content();

        return ['status' => 'success' ,'data' => ['Product has been added to your cart successfully']];
    }

    public function postUpdate(Request $request , $rowId)
    {
        Cart::update($rowId , ['qty' => $request->qty]);

        $products = Cart::content();

        return ['status' => 'success' ,
            'html' => view('site.pages.cart.templates.table' ,compact('products'))->render()];
    }

    public function getDeleteCart($id)
    {
        Cart::remove($id);

        return redirect()->back();
    }
}
