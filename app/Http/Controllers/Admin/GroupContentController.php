<?php

namespace App\Http\Controllers\Admin;

use App\GroupContent;
use App\Http\Requests\Admin\GroupContentRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupContentController extends Controller
{
    //

    public function getIndex()
    {
        $group = GroupContent::first();

        return view('admin.pages.group.index' ,compact('group'));
    }

    public function postIndex(GroupContentRequest $request)
    {
        $request->edit();

        return ['status' => 'success'];
    }
}
