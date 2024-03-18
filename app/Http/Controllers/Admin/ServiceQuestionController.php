<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceQuestionRequest;
use App\ServiceQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceQuestionController extends Controller
{
    //
    public function getIndex($id)
    {
        $questions = ServiceQuestion::where('service_id' , $id)->orderBy('id' , 'DESC')->get();

        return view('admin.pages.services.question' ,compact('questions' , 'id'));
    }

    public function getInfo($id)
    {
        $question = ServiceQuestion::find($id);

        return view('admin.pages.services.templates.edit2' ,compact('question'));
    }

    public function postIndex(ServiceQuestionRequest $request ,$id)
    {
        $request->store($id);

        $questions = ServiceQuestion::where('service_id' , $id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.templates.question' ,compact('questions'))->render()];
    }

    public function postEdit(ServiceQuestionRequest $request , $id)
    {
        $request->edit($id);

        $questions = ServiceQuestion::where('service_id' , ServiceQuestion::find($id)->value('service_id'))->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.services.templates.question' ,compact('questions'))->render()];
    }

    public function postDelete(Request $request , $id)
    {
        if (!$request->question_id){
            return ['status' => 'error' ,'data' => 'You must select one question at least'];
        }else{
            foreach ($request->question_id  as $question_id) {
                $question = ServiceQuestion::find($question_id);
                $question->delete();

            }
            $questions = ServiceQuestion::where('service_id' , $id)->orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.services.templates.question' ,compact('questions'))->render()];
        }

    }
}
