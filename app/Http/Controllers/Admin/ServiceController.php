<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ServiceRequest;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServiceController extends Controller
{
    //
    public function getIndex()
    {
        $services = Service::all();

        return view('admin.pages.services.index' ,compact('services'));
    }

    public function getInfo($id)
    {
        $service = Service::find($id);

        return view('admin.pages.services.templates.edit' ,compact('service'));
    }

    public function postEdit(ServiceRequest $request , $id)
    {
        $request->edit($id);

        $services = Service::all();

        return ['status' => 'success','html' => view('admin.pages.services.templates.table' ,compact('services'))->render()];
    }
}
