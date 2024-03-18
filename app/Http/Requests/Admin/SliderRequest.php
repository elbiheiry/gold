<?php

namespace App\Http\Requests\Admin;

use App\Slider;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Image;

class SliderRequest extends FormRequest
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
        return [
            'image' => \Request::route()->getName() == 'admin.sliders' ? 'required|image|max:2048' : 'image|max:2048'
        ];
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.sliders'){
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
        $slider = new Slider();

        $this->image->store('sliders');
        $slider->image = $this->image->hashName();

        Image::make(storage_path('uploads/sliders/' . $this->image->hashName()))
            ->resize(1020,382)
            ->encode('jpg', 100)
            ->save(storage_path('uploads/sliders/' . $this->image->hashName()));

        $slider->save();
    }

    public function edit($id)
    {
        $slider = Slider::find($id);

        if ($this->image){
            @unlink(storage_path('uploads/sliders')."/{$slider->image}");
            $this->image->store('sliders');
            $slider->image = $this->image->hashName();
            Image::make(storage_path('uploads/sliders/' . $this->image->hashName()))
                ->resize(1020,382)
                ->encode('jpg', 100)
                ->save(storage_path('uploads/sliders/' . $this->image->hashName()));
        }

        $slider->save();
    }
}
