<?php

namespace App\Http\Controllers\Admin;

use App\Blog;
use App\Http\Requests\Admin\BlogRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BlogController extends Controller
{
    public function getIndex()
    {
        $blogs = Blog::orderBy('id' , 'DESC')->get();

        return view('admin.pages.blogs.index' ,compact('blogs'));
    }

    public function getInfo($id)
    {
        $blog = Blog::find($id);

        return view('admin.pages.blogs.templates.edit' ,compact('blog'));
    }

    public function postIndex(BlogRequest $request)
    {
        $request->store();

        $blogs = Blog::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.blogs.templates.table' ,compact('blogs'))->render()];
    }

    public function postEdit(BlogRequest $request , $id)
    {
        $request->edit($id);

        $blogs = Blog::orderBy('id' , 'DESC')->get();

        return['status' => 'success' ,'html' => view('admin.pages.blogs.templates.table' ,compact('blogs'))->render()];
    }

    public function postDelete(Request $request)
    {
        if (!$request->blog_id){
            return ['status' => 'error' ,'data' => 'You must select one blog at least'];
        }else{
            foreach ($request->blog_id  as $id) {
                $blog = Blog::find($id);

                $images = json_decode($blog->images);
                foreach ($images as $image) {
                    @unlink(storage_path('uploads/blogs/')."/{$image}");
                }

                @unlink(storage_path('uploads/blogs') . "/{$blog->image}");
                $blog->delete();

            }
            $blogs = Blog::orderBy('id' , 'DESC')->get();

            return ['status' => 'success' ,'html' => view('admin.pages.blogs.templates.table' ,compact('blogs'))->render()];
        }

    }

    public function getImages($id)
    {
        $blog = Blog::find($id);

        $images = json_decode($blog->images);

        return view('admin.pages.blogs.slider' ,compact('blog' ,'images'));
    }

    public function postAddImage(BlogRequest $request , $id)
    {
        $request->AddImage($id);

        $blog = Blog::find($id);

        $images = json_decode($blog->images);

        return ['status' => 'success' ,'html' => view('admin.pages.blogs.templates.table_img' ,compact('blog' ,'images'))->render()];
    }

    public function getInfoImage($id , $key)
    {
        $blog = Blog::find($id);
        $images = json_decode($blog->images);

        return view('admin.pages.blogs.templates.image' ,compact('images' , 'blog' ,'key'));
    }


    public function postEditImage(BlogRequest $request , $id , $key)
    {
        $request->EditImage($id , $key);

        $blog = Blog::find($id);

        $images = json_decode($blog->images);

        return ['status' => 'success' ,'html' => view('admin.pages.blogs.templates.table_img' ,compact('blog','images'))->render()];
    }

    public function getDeleteImage($id, $key)
    {
        $blog = Blog::find($id);
        $images = json_decode($blog->images);
        @unlink(storage_path('uploads/blogs/')."/{$images[$key]}");

        unset($images[$key]);

        $blog->update([
            'images' => json_encode($images)
        ]);

        return redirect()->back();
    }
}
