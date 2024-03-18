<?php

namespace App\Http\Requests\Admin;

use App\Blog;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class BlogRequest extends FormRequest
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
        if (\Request::route()->getName() == 'admin.blogs') {
            $rules = [
                'name' => 'required',
                'description1' => 'required',
                'description2' => 'required',
            ];

            $rules['images'] = 'required';
            foreach ($this->images as $key => $val) {
                $rules['images.' . $key] = 'image|max:2048';
            }

            $rules['image'] = 'required|image|max:2048';
        }elseif (\Request::route()->getName() == 'admin.blogs.edit'){
            $rules = [
                'name' => 'required',
                'description1' => 'required',
                'description2' => 'required',
            ];

            $rules['image'] = 'image|max:2048';
        }elseif (\Request::route()->getName() == 'admin.blogs.image.add') {
            $rules = [
                'image' => 'required|image|max:2048'
            ];
        }elseif (\Request::route()->getName() == 'admin.blogs.image.edit'){
            $rules = [
                'image' => 'image|max:2048'
            ];
        }

        return $rules;
    }

    public function messages()
    {

        if (\Request::route()->getName() == 'admin.blogs'){
            $messages = [
                'name.required' => 'Please enter blog name',
                'description1.required' => 'Please enter blog first description',
                'description2.required' => 'Please enter blog second description'
            ];
            $messages['image.required'] = 'You must choose an image';
            $messages['image.image'] = 'You should choose image not file';
            $messages['image.max'] = 'Maximum size allowed for image is 2MB';

            $messages['images.required'] = 'You must upload at least one image for image slider';
            foreach($this->images as $key => $val) {
                $messages['images.'.$key.'image'] = 'File no. '.$key.' should be an image';
                $messages['images.'.$key.'max'] = 'Image no. '.$key.' should be less than 2MB';
            }
        }elseif (\Request::route()->getName() == 'admin.blogs.edit'){
            $messages = [
                'name.required' => 'Please enter blog name',
                'description1.required' => 'Please enter blog first description',
                'description2.required' => 'Please enter blog second description'
            ];
            $messages['image.image'] = 'You should choose image not file';
            $messages['image.max'] = 'Maximum size allowed for image is 2MB';
        }elseif (\Request::route()->getName() == 'admin.blogs.image.add'){

            $messages = [
                'image.required' => 'You mst upload an image',
                'image.image' => 'You must upload an image',
                'image.max' => 'Maximum size allowed for image is 2MB'
            ];

        }elseif (\Request::route()->getName() == 'admin.blogs.image.edit'){
            $messages = [
                'image.image' => 'You must upload an image',
                'image.max' => 'Maximum size allowed for image is 2MB'
            ];
        }

        return $messages;
    }

    public function store()
    {
        $blog = new Blog();

        $this->image->store('blogs');
        $blog->image = $this->image->hashName();
        Image::make(storage_path('uploads/blogs/' . $this->image->hashName()))
            ->resize(800,300)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/blogs/' . $this->image->hashName()));

        foreach($this->images as $image)
        {
            $image->store('blogs');
            $name = $image->hashName();
            Image::make(storage_path('uploads/blogs/' . $name))
                ->resize(275,275)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/blogs/' . $name));
            $data[] = $name;
        }


        $blog->name = $this->name;
        $blog->slug = str_slug($this->name);
        $blog->description1 = $this->description1;
        $blog->description2 = $this->description2;

        $blog->images = json_encode($data);

        $blog->save();
    }

    public function edit($id)
    {
        $blog = Blog::find($id);

        if ($this->image) {
            @unlink(storage_path('uploads/blogs')."/{$blog->image}");
            $this->image->store('blogs');
            $blog->image = $this->image->hashName();
            Image::make(storage_path('uploads/blogs/' . $this->image->hashName()))
                ->resize(800,300)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/blogs/' . $this->image->hashName()));
        }
        $blog->name = $this->name;
        $blog->slug = str_slug($this->name);
        $blog->description1 = $this->description1;
        $blog->description2 = $this->description2;

        $blog->save();
    }

    public function AddImage($id)
    {

        $blog = Blog::find($id);

        $images = json_decode($blog->images);

        $this->image->store('blogs');
        $name = $this->image->hashName();
        Image::make(storage_path('uploads/blogs/' . $name))
            ->resize(275,275)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/blogs/' . $name));
        $images[] = $name;

        $blog->update([
            'images' => json_encode($images)
        ]);
    }

    public function EditImage($id , $key)
    {
        $blog = Blog::find($id);

        $images = json_decode($blog->images);

        @unlink(storage_path('uploads/blogs/')."/{$images[$key]}");

        $this->image->store('blogs');
        $name = $this->image->hashName();
        Image::make(storage_path('uploads/blogs/' . $name))
            ->resize(275,275)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/blogs/' . $name));

        $images[$key] = $name;

        $blog->update([
            'images' => json_encode($images)
        ]);
    }
}
