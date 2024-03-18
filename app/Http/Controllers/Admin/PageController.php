<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\PageRequest;
use App\Page;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function getIndex()
    {
        $pages = Page::orderBy('id' , 'DESC')->get();

        return view('admin.pages.pages.index' ,compact('pages'));
    }

    public function getInfo($id)
    {
        $page = Page::find($id);

        return view('admin.pages.pages.templates.edit' ,compact('page'));
    }

    public function postIndex(PageRequest $request)
    {
        $request->store();

        $pages = Page::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.pages.templates.table' ,compact('pages'))->render()];
    }

    public function postEdit(PageRequest $request , $id)
    {
        $request->edit($id);

        $pages = Page::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.pages.templates.table' ,compact('pages'))->render()];
    }

    public function postDelete(Request $request)
    {
        if (!$request->page_id){
            return ['status' => 'error' ,'data' => 'You must select one page at least'];
        }else{
            foreach ($request->page_id  as $page_id) {
                $country = Page::find($page_id);
                $country->delete();

            }
            $pages = Page::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.pages.templates.table' ,compact('pages'))->render()];
        }

    }
}
