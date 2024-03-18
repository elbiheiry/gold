<?php

namespace App\Http\Requests\Admin;

use App\GroupContent;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GroupContentRequest extends FormRequest
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
            'link' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'link.required' => 'Please enter video link',
            'description.required' => 'Please enter some words here'
        ];
    }

    public function edit()
    {
        $content = GroupContent::first();

        $content->link = str_replace('watch?v=' , 'embed/' , $this->link);
        $content->description = $this->description;

        $content->save();
    }
}
