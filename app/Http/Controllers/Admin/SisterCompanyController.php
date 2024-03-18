<?php

namespace App\Http\Controllers\Admin;

use App\Company;
use App\Http\Requests\Admin\SisterCompanyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SisterCompanyController extends Controller
{
    //
    public function getIndex()
    {
        $sliders = Company::orderBy('id' , 'DESC')->get();

        return view('admin.pages.group.company' ,compact('sliders'));
    }

    public function getInfo($id)
    {
        $slider = Company::find($id);

        return view('admin.pages.group.templates.edit2' ,compact('slider'));
    }

    public function postIndex(SisterCompanyRequest $request)
    {
        $request->store();

        $sliders = Company::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.group.templates.table2' ,compact('sliders'))->render()];
    }

    public function postEdit(SisterCompanyRequest $request , $id)
    {
        $request->edit($id);

        $sliders = Company::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.group.templates.table2' ,compact('sliders'))->render()];
    }

    public function postDelete(Request $request)
    {
        if (!$request->image_id){
            return ['status' => 'error' ,'data' => 'You must select one image at least'];
        }else{
            foreach ($request->image_id  as $id) {
                $image = Company::find($id);
                @unlink(storage_path('uploads/sliders') . "/{$image->image}");
                $image->delete();

            }
            $sliders = Company::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.group.templates.table2' ,compact('sliders'))->render()];
        }

    }
}
