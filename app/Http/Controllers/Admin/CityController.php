<?php

namespace App\Http\Controllers\Admin;

use App\City;
use App\Http\Requests\Admin\CityRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    //
    public function getIndex($id)
    {
        $cities = City::where('country_id' , $id)->orderBy('id' , 'DESC')->get();

        return view('admin.pages.cities.index' ,compact('cities' , 'id'));
    }

    public function getInfo($id)
    {
        $city = City::find($id);

        return view('admin.pages.cities.templates.edit' ,compact('city'));
    }

    public function postIndex(CityRequest $request , $id)
    {
        $request->store($id);

        $cities = City::where('country_id' , $id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.cities.templates.table' ,compact('cities'))->render()];
    }

    public function postEdit(CityRequest $request , $id)
    {
        $city = City::find($id);

        $request->edit($id);

        $cities = City::where('country_id' , $city->country_id)->orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.cities.templates.table' ,compact('cities'))->render()];
    }

    public function postDelete(Request $request , $id)
    {
        if (!$request->city_id){
            return ['status' => 'error' ,'data' => 'You must select one city at least'];
        }else{
            foreach ($request->city_id  as $city_id) {
                $country = City::find($city_id);
                $country->delete();

            }
            $cities = City::where('country_id' , $id)->orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.cities.templates.table' ,compact('cities'))->render()];
        }

    }
}
