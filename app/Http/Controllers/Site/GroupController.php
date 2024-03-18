<?php

namespace App\Http\Controllers\Site;

use App\Company;
use App\GroupContent;
use App\GroupSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupController extends Controller
{
    //
    public function getIndex()
    {
        $sliders = GroupSlider::all();
        $content = GroupContent::first();
        $companies = Company::all();

        return view('site.pages.group.index' ,compact('sliders' ,'companies' ,'content'));
    }
}
