<?php

namespace App\Http\Requests\Site;

use App\Message;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ContactRequest extends FormRequest
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
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Pleas provide your name',
            'email.required' => 'Please provide your email',
            'email.email' => 'This email isn\'t correct',
            'subject.required' => 'Please provide message subject',
            'message.required' => 'Please fill in your message'
        ];
    }

    public function store()
    {
        $message = new Message();

        $message->name = $this->name;
        $message->email = $this->email;
        $message->subject = $this->subject;
        $message->message = $this->message;

        $message->save();
    }
}
