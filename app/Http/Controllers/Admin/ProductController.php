<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    //
    public function getIndex()
    {
        $products = Product::orderBy('id' , 'DESC')->get();

        return view('admin.pages.products.index' ,compact('products'));
    }

    public function getInfo($id)
    {
        $product = Product::find($id);

        return view('admin.pages.products.templates.edit' ,compact('product'));
    }

    public function postIndex(ProductRequest $request)
    {
        $request->store();

        $products = Product::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.products.templates.table' ,compact('products'))->render()];
    }

    public function postEdit(ProductRequest $request , $id)
    {
        $request->edit($id);

        $products = Product::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.products.templates.table' ,compact('products'))->render()];
    }

    public function postDelete(Request $request)
    {
        if (!$request->product_id){
            return ['status' => 'error' ,'data' => 'You must select one product at least'];
        }else{
            foreach ($request->product_id  as $id) {
                $product = Product::find($id);

                $images = json_decode($product->images);
                foreach ($images as $image) {
                    @unlink(storage_path('uploads/products/')."/{$image}");
                }

                @unlink(storage_path('uploads/products') . "/{$product->image}");
                $product->delete();

            }
            $products = Product::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.products.templates.table' ,compact('products'))->render()];
        }

    }

    public function getImages($id)
    {
        $product = Product::find($id);

        $images = json_decode($product->images);

        return view('admin.pages.products.slider' ,compact('product' ,'images'));
    }

    public function postAddImage(ProductRequest $request , $id)
    {
        $request->AddImage($id);

        $product = Product::find($id);

        $images = json_decode($product->images);

        return ['status' => 'success' ,'html' => view('admin.pages.products.templates.table_img' ,compact('product' ,'images'))->render()];
    }

    public function getInfoImage($id , $key)
    {
        $product = Product::find($id);
        $images = json_decode($product->images);

        return view('admin.pages.products.templates.image' ,compact('images' , 'product' ,'key'));
    }


    public function postEditImage(ProductRequest $request , $id , $key)
    {
        $request->EditImage($id , $key);

        $product = Product::find($id);

        $images = json_decode($product->images);

        return ['status' => 'success' ,'html' => view('admin.pages.products.templates.table_img' ,compact('product','images'))->render()];
    }

    public function getDeleteImage($id, $key)
    {
        $product = Product::find($id);
        $images = json_decode($product->images);
        @unlink(storage_path('uploads/products/')."/{$images[$key]}");

        unset($images[$key]);

        $product->update([
            'images' => json_encode($images)
        ]);

        return redirect()->back();
    }
}
