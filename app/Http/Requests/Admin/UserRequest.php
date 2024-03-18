<?php

namespace App\Http\Requests\Admin;

use App\User;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRequest extends FormRequest
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
        if (\Request::route()->getName() == 'admin.users'){
            return [
                'name' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
                're_password' => 'same:password'
            ];
        }else{
            return [
                'name' => 'required',
                'email' => 'required|unique:users,email,'.$this->id
            ];
        }
    }

    public function messages()
    {
        if (\Request::route()->getName() == 'admin.users'){
            return [
                'name.required' => 'Please enter username',
                'email.required' => 'Please enter email',
                'email.unique' => 'Email is already taken',
                'password.required' => 'Please enter your password',
                're_password.same' => 'Password doesn\'t match'
            ];
        }else{
            return [
                'name.required' => 'Please enter username',
                'email.required' => 'Please enter email',
                'email.unique' => 'Email is already taken'
            ];
        }
    }

    public function store(){
        $user= new User();

        $user->name =  $this->name;
        $user->email =  $this->email;
        $user->password = bcrypt($this->password);

        $user->save();
    }

    public function edit($id)
    {
        $user= User::find($id);

        $user->name =  $this->name;
        $user->email =  $this->email;
        if ($this->password){
            $user->password = bcrypt($this->password);
        }

        $user->save();
    }
}
