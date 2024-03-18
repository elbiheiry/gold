<?php

namespace App\Http\Controllers\Site;

use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    //

    public function getIndex($slug)
    {
        $page = Page::where('slug' , $slug)->first();

        return view('site.pages.pages.index' ,compact('page'));
    }
}
