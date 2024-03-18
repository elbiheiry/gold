<?php

namespace App\Http\Controllers\Site;

use App\Checkout;
use App\City;
use App\Country;
use App\Http\Requests\Site\CheckoutRequest;
use App\Mail\CheckoutMail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cart;
use Mail;

class CheckoutController extends Controller
{
    //
    public function getIndex()
    {
        $countries = Country::all();

        return view('site.pages.checkout.index' ,compact('countries'));
    }

    public function getCities(Request $request)
    {
        $country = Country::find($request->id);

        return view('site.pages.checkout.templates.city' ,compact('country'))->render();
    }

    public function postIndex(CheckoutRequest $request)
    {
        $request->store();

        $mails = ['info@rubystargold.com' ,'Shyam@finestargold.com' ,'Support@rubystargold.com'];
        Mail::to($mails)->send(new CheckoutMail(
            auth()->guard('site')->user()->name ,
            auth()->guard('site')->user()->email ,
            $request->last_name ,
            $request->phone ,
            $request->address ,
            Country::find($request->country_id)->value('name'),
            City::find($request->city_id)->value('name'),
            Checkout::orderBy('id' , 'DESC')->first()->id
        ));

        Cart::destroy();

        return ['status' => 'success','data' => ['Thank you for choosing us , we will contact you within 24 Hours'] ,'url' => route('site.index')];
    }
}
