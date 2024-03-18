<?php

namespace App\Http\Requests\Admin;

use App\Product;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    protected function failedValidation(Validator $validator)
    {
        $result = ['status' => 'error' ,'data' => $validator->errors()->all()];

        throw new HttpResponseException(response()->json($result , 200));
    }


    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (\Request::route()->getName() == 'admin.products') {
            $rules = [
                'name' => 'required',
                'brief' => 'required',
                'price' => 'required',
                'brand' => 'required',
                'weight' => 'required',
                'suisse' => 'required'
            ];

            $rules['images'] = 'required';
            foreach ($this->images as $key => $val) {
                $rules['images.' . $key] = 'image|max:2048';
            }

            $rules['image'] = 'required|image|max:2048';
            $rules['code'] = 'required|unique:products';
        }elseif (\Request::route()->getName() == 'admin.products.edit'){
            $rules = [
                'name' => 'required',
                'brief' => 'required',
                'price' => 'required',
                'brand' => 'required',
                'weight' => 'required',
                'suisse' => 'required'
            ];

            $rules['image'] = 'image|max:2048';
            $rules['code'] = 'required|unique:products,code,'.$this->id;
        }elseif (\Request::route()->getName() == 'admin.products.image.add') {
            $rules = [
                'image' => 'required|image|max:2048'
            ];
        }elseif (\Request::route()->getName() == 'admin.products.image.edit'){
            $rules = [
                'image' => 'image|max:2048'
            ];
        }

        return $rules;
    }

    public function messages()
    {

        if (\Request::route()->getName() == 'admin.products'){
            $messages = [
                'name.required' => 'Please enter product name',
                'code.required' => 'Please enter product code',
                'code.unique' => 'Product code should be unique , this one has been used before',
                'brief.required' => 'Please enter brief description about the product',
                'price.required' => 'Please enter the product price',
                'brand.required' => 'Please provide product brand',
                'weight.required' => 'Please provide product weight',
                'suisse.required' => 'Please provide gold suisse'
            ];
            $messages['image.required'] = 'You must choose an image';
            $messages['image.image'] = 'You should choose image not file';
            $messages['image.max'] = 'Maximum size allowed for image is 2MB';

            $messages['images.required'] = 'You must upload at least one image for image slider';
            foreach($this->images as $key => $val) {
                $messages['images.'.$key.'image'] = 'File no. '.$key.' should be an image';
                $messages['images.'.$key.'max'] = 'Image no. '.$key.' should be less than 2MB';
            }
        }elseif (\Request::route()->getName() == 'admin.products.edit'){
            $messages = [
                'name.required' => 'Please enter product name',
                'code.required' => 'Please enter product code',
                'code.unique' => 'Product code should be unique , this one has been used before',
                'brief.required' => 'Please enter brief description about the product',
                'price.required' => 'Please enter the product price',
                'brand.required' => 'Please provide product brand',
                'weight.required' => 'Please provide product weight',
                'suisse.required' => 'Please provide gold suisse'
            ];
            $messages['image.image'] = 'You should choose image not file';
            $messages['image.max'] = 'Maximum size allowed for image is 2MB';
        }elseif (\Request::route()->getName() == 'admin.products.image.add'){

            $messages = [
                'image.required' => 'You mst upload an image',
                'image.image' => 'You must upload an image',
                'image.max' => 'Maximum size allowed for image is 2MB'
            ];

        }elseif (\Request::route()->getName() == 'admin.products.image.edit'){
            $messages = [
                'image.image' => 'You must upload an image',
                'image.max' => 'Maximum size allowed for image is 2MB'
            ];
        }

        return $messages;
    }

    public function store()
    {
        $product = new Product();

        $this->image->store('products');
        $product->image = $this->image->hashName();
        Image::make(storage_path('uploads/products/' . $this->image->hashName()))
            ->resize(264,264)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/products/' . $this->image->hashName()));

        foreach($this->images as $image)
        {
            $image->store('products');
            $name = $image->hashName();
            Image::make(storage_path('uploads/products/' . $name))
                ->resize(264,264)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/products/' . $name));
            $data[] = $name;
        }


        $product->name = $this->name;
        $product->slug = str_slug($this->name);
        $product->code = $this->code;
        $product->brief = $this->brief;
        $product->price = $this->price;
        $product->brand = $this->brand;
        $product->weight = $this->weight;
        $product->suisse = $this->suisse;

        $product->images = json_encode($data);

        $product->save();
    }

    public function edit($id)
    {
        $product = Product::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/products')."/{$product->image}");
            $this->image->store('products');
            $product->image = $this->image->hashName();
            Image::make(storage_path('uploads/products/' . $this->image->hashName()))
                ->resize(264, 264)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/products/' . $this->image->hashName()));
        }
        $product->name = $this->name;
        $product->slug = str_slug($this->name);
        $product->code = $this->code;
        $product->brief = $this->brief;
        $product->price = $this->price;
        $product->brand = $this->brand;
        $product->weight = $this->weight;
        $product->suisse = $this->suisse;

        $product->save();
    }

    public function AddImage($id)
    {

        $product = Product::find($id);

        $images = json_decode($product->images);

        $this->image->store('products');
        $name = $this->image->hashName();
        Image::make(storage_path('uploads/products/' . $name))
            ->resize(264, 264)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/products/' . $name));
        $images[] = $name;

        $product->update([
            'images' => json_encode($images)
        ]);
    }

    public function EditImage($id , $key)
    {
        $product = Product::find($id);

        $images = json_decode($product->images);

        @unlink(storage_path('uploads/products/')."/{$images[$key]}");

        $this->image->store('products');
        $name = $this->image->hashName();
        Image::make(storage_path('uploads/products/' . $name))
            ->resize(264, 264)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/products/' . $name));

        $images[$key] = $name;

        $product->update([
            'images' => json_encode($images)
        ]);
    }
}
