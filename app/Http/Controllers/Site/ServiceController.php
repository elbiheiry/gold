<?php

namespace App\Http\Controllers\Site;

use App\Service;
use App\ServiceContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function getIndex()
    {
        $services = Service::all();
        $content = ServiceContent::first();

        return view('site.pages.services.index' ,compact('services' ,'content'));
    }
}
