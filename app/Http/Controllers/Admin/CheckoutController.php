<?php

namespace App\Http\Controllers\Admin;

use App\Checkout;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class CheckoutController extends Controller
{
    //

    public function getIndex()
    {
        $checkouts = Checkout::orderBy('id' , 'DESC')->get();

        return view('admin.pages.checkouts.index' ,compact('checkouts'));
    }

    public function getOrder($id)
    {
        $checkout = Checkout::find($id);

        return view('admin.pages.checkouts.orders' ,compact('checkout'));
    }
    
    public function getDelete($id)
    {
        $message = Checkout::find($id);
        
        $message->orders()->delete();

        $message->delete();

        return redirect()->back();
    }
    
    public function getReport()
    {
        $checkouts = Checkout::orderBy('id' , 'DESC')->get();

        return view('admin.pages.checkouts.report' ,compact('checkouts'));
    }

    public function postReport(Request $request)
    {
        $from = Carbon::parse($request->from);
        $to = Carbon::parse($request->to);

        $checkouts = Checkout::whereBetween('created_at' , [$from , $to])->get();

        return ['html' => view('admin.pages.checkouts.templates.report',compact('checkouts'))->render()];
    }
}
