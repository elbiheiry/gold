<?php

namespace App\Http\Requests\Admin;

use App\Page;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class PageRequest extends FormRequest
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
        $rules = [
            'name' => 'required',
            'description' => 'required'
        ];
        
        if (\Request::route()->getName() == 'admin.pages') {
            $rules['image'] = 'required|image|max:2048';
        }else{
            $rules['image'] = 'image|max:2048';
        }
        
        return $rules;
    }
    
    public function messages()
    {
        $messages = [
            'name.required' => 'Please enter page name',
            'description.required' => 'Please enter page description',
        ];
        if (\Request::route()->getName() == 'admin.pages') {
            $messages['image.required'] = 'You must choose an image';
            $messages['image.image'] = 'You should choose image not file';
            $messages['image.max'] = 'Maximum size allowed for image is 2MB';
        }else{
            $messages['image.image'] = 'You should choose image not file';
            $messages['image.max'] = 'Maximum size allowed for image is 2MB';
        }
        
        return $messages;
    }

    public function store()
    {
        $page = new Page();
        
        $page->name = $this->name;
        $page->slug = str_slug($this->name);
        $page->description = $this->description;

        $this->image->store('pages');
        $page->image = $this->image->hashName();
        Image::make(storage_path('uploads/pages/' . $this->image->hashName()))
            ->resize(800,300)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/pages/' . $this->image->hashName()));

        $page->save();
    }

    public function edit($id)
    {
        $page = Page::find($id);

        $page->name = $this->name;
        $page->slug = str_slug($this->name);
        $page->description = $this->description;

        if ($this->image) {
            @unlink(storage_path('uploads/pages')."/{$page->image}");
            $this->image->store('pages');
            $page->image = $this->image->hashName();
            Image::make(storage_path('uploads/pages/' . $this->image->hashName()))
                ->resize(800, 300)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/pages/' . $this->image->hashName()));
        }
        
        $page->save();
    }
}
