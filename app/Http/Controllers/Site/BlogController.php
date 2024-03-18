<?php

namespace App\Http\Controllers\Site;

use App\Blog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    //

    public function getIndex()
    {
        $blogs = Blog::all();

        return view('site.pages.blogs.index' ,compact('blogs'));
    }

    public function getSingleBlog($slug)
    {
        $blog = Blog::where('slug' , $slug)->first();

        return view('site.pages.blogs.single' ,compact('blog'));
    }
}
