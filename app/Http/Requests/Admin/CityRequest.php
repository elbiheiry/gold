<?php

namespace App\Http\Requests\Admin;

use App\City;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class CityRequest extends FormRequest
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
            'name' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter city name'
        ];
    }

    public function store($id)
    {
        $city = new City();

        $city->name = $this->name;
        $city->country_id = $id;

        $city->save();
    }

    public function edit($id)
    {
        $city = City::find($id);

        $city->name = $this->name;

        $city->save();
    }
}
