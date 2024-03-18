@extends('admin.layouts.master')
@section('title')
    blogs
@endsection
@section('models')
    <div class="modal fade" id="delete_user" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this image ?</h5>
                </div>
                <form class="modal-footer text-center">
                    <a type="button" class="custom-btn modalDLTBTN">Delete</a>
                    <a type="button" class="custom-btn red-bc" data-dismiss="modal">Close</a>
                </form>
            </div>
        </div>
    </div>
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content ">
        <div class="col-sm-12 page-heading ">
            <div class="col-sm-6 ">
                <h2>blogs</h2>
            </div>
            <!--End col-md-6-->
            <div class="col-sm-6 ">
                <ul class="breadcrumb ">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">blogs</li>
                </ul>
            </div>
            <!--End col-md-6-->
        </div>
        <div class="spacer-15 "></div>

        <div class="widget">
            <div class="widget-title">
                {{$blog->name}}'s images
            </div>
            <div class="widget-content">
                <form class="ajax-form" action="{{route('admin.blogs.image.add' ,['id' => $blog->id])}}" method="post" enctype="multipart/form-data">

                    <div class="alert alert-success hidden SuccessMessage" id=""></div>
                    <div class="alert alert-danger hidden ErrorMessage" id=""></div>

                    {!! csrf_field() !!}
                    <div class="col-md-12 form-group ">
                        <label>Image</label>

                        <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="image" style="display: none;">
                        <div class="text-danger text-center">Please click on image to change it</div>
                        <div class="text-danger text-center">Image size should be: 275 * 275</div>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="col-sm-12 save-btn">
                        <button class="custom-btn green-bc" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-title">
                {{$blog->name}}'s images edit
            </div>
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    @include('admin.pages.blogs.templates.table_img')
                </div>
            </div>
        </div>
    </div>
@endsection