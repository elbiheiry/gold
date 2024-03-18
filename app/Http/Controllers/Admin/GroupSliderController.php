<?php

namespace App\Http\Controllers\Admin;

use App\GroupSlider;
use App\Http\Requests\Admin\GroupSliderRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GroupSliderController extends Controller
{
    //
    public function getIndex()
    {
        $sliders = GroupSlider::orderBy('id' , 'DESC')->get();

        return view('admin.pages.group.slider' ,compact('sliders'));
    }

    public function getInfo($id)
    {
        $slider = GroupSlider::find($id);

        return view('admin.pages.group.templates.edit' ,compact('slider'));
    }

    public function postIndex(GroupSliderRequest $request)
    {
        $request->store();

        $sliders = GroupSlider::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.group.templates.table' ,compact('sliders'))->render()];
    }

    public function postEdit(GroupSliderRequest $request , $id)
    {
        $request->edit($id);

        $sliders = GroupSlider::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.group.templates.table' ,compact('sliders'))->render()];
    }

    public function postDelete(Request $request)
    {
        if (!$request->image_id){
            return ['status' => 'error' ,'data' => 'You must select one image at least'];
        }else{
            foreach ($request->image_id  as $id) {
                $image = GroupSlider::find($id);
                @unlink(storage_path('uploads/sliders') . "/{$image->image}");
                $image->delete();

            }
            $sliders = GroupSlider::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.group.templates.table' ,compact('sliders'))->render()];
        }

    }
}
