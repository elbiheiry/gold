<?php

namespace App\Http\Requests\Admin;

use App\Setting;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class SettingRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'email' => 'required',
            'brief' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter website name',
            'phone.required' => 'Please enter phone number',
            'address.required' => 'Please enter your address',
            'email.required' => 'Please enter website email address',
            'brief.required' => 'Please enter brief description about the site'
        ];
    }

    public function edit()
    {
        $settings = Setting::first();

        $settings->name = $this->name;
        $settings->phone = $this->phone;
        $settings->address = $this->address;
        $settings->email = $this->email;
        $settings->brief = $this->brief;
        $settings->facebook = $this->facebook;
        $settings->linkedin = $this->linkedin;
        $settings->instagram = $this->instagram;

        $settings->save();
    }
}
