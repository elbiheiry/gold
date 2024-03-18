<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceContentRequest;
use App\ServiceContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceContentController extends Controller
{
    //
    public function getIndex()
    {
        $content = ServiceContent::first();

        return view('admin.pages.services.content' ,compact('content'));
    }

    public function postIndex(ServiceContentRequest $request)
    {
        $request->edit();

        return ['status' => 'success'];
    }
}
