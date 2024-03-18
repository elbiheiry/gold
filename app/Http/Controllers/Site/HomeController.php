<?php

namespace App\Http\Controllers\Site;

use App\About;
use App\Http\Requests\Site\ContactRequest;
use App\Mail\ContactMail;
use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mail;

class HomeController extends Controller
{
    //
    public function getIndex()
    {
        $sliders = Slider::all();
        $abouts = About::all();

        return view('site.pages.index' ,compact('sliders' ,'abouts'));
    }

    public function postIndex(ContactRequest $request)
    {
        $request->store();

        Mail::to('info@rubystargold.com')->send(new ContactMail($request->name , $request->email ,$request->subject ,$request->message));
        return ['status' => 'success' ,'data' => ['Thank you for your message , We will contact you later']];
    }
}
