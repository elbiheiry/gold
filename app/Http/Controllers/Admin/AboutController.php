<?php

namespace App\Http\Controllers\Admin;

use App\About;
use App\Http\Requests\Admin\AboutRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AboutController extends Controller
{
    //
    public function getIndex()
    {
        $abouts = About::all();

        return view('admin.pages.about.index' ,compact('abouts'));
    }

    public function postEdit(AboutRequest $request , $id)
    {
        $request->edit($id);

        return ['status' => 'success'];
    }
}
