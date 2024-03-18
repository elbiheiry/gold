<?php

namespace App\Http\Requests\Admin;

use App\ServiceQuestion;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class ServiceQuestionRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Please insert the question',
            'description.required' => 'Please add question answer'
        ];
    }

    public function store($id)
    {
        $question = new ServiceQuestion();

        $question->service_id = $id;
        $question->title = $this->title;
        $question->description = $this->description;

        $question->save();
    }

    public function edit($id)
    {
        $question = ServiceQuestion::find($id);

        $question->title = $this->title;
        $question->description = $this->description;

        $question->save();
    }
}
