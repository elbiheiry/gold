<?php

namespace App\Http\Controllers\Admin;

use App\Country;
use App\Http\Requests\Admin\CountryRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CountryController extends Controller
{
    //
    public function getIndex()
    {
        $countries = Country::orderBy('id' , 'DESC')->get();

        return view('admin.pages.countries.index' ,compact('countries'));
    }

    public function getInfo($id)
    {
        $country = Country::find($id);

        return view('admin.pages.countries.templates.edit' ,compact('country'));
    }

    public function postIndex(CountryRequest $request)
    {
        $request->store();

        $countries = Country::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.countries.templates.table' ,compact('countries'))->render()];
    }

    public function postEdit(CountryRequest $request , $id)
    {
        $request->edit($id);

        $countries = Country::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.countries.templates.table' ,compact('countries'))->render()];
    }

    public function postDelete(Request $request)
    {
        if (!$request->country_id){
            return ['status' => 'error' ,'data' => 'You must select one country at least'];
        }else{
            foreach ($request->country_id  as $id) {
                $country = Country::find($id);
                $country->cities()->delete();
                $country->delete();

            }
            $countries = Country::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.countries.templates.table' ,compact('countries'))->render()];
        }

    }
}
