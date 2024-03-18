@extends('admin.layouts.master')
@section('title')
    Site settings
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Site settings</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Site settings</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.settings')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>Site name</label>
                    <input class="form-control" type="text" value="{{$settings->name}}" name="name">
                </div>

                <div class="col-sm-6 form-group">
                    <label>Phone number</label>
                    <input class="form-control" type="text" value="{{$settings->phone}}" name="phone">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Email</label>
                    <input class="form-control" type="email" value="{{$settings->email}}" name="email">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Address</label>
                    <textarea class="form-control" name="address">{{$settings->address}}</textarea>
                </div>
                <div class="col-sm-6 form-group">
                    <label> Facebook link </label>
                    <input class="form-control" type="url" value="{{$settings->facebook}}" name="facebook">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Linkedin link</label>
                    <input class="form-control" type="url" name="linkedin" value="{{$settings->linkedin}}">
                </div>
                <div class="col-sm-6 form-group">
                    <label>Instagram link</label>
                    <input class="form-control" type="url" name="instagram" value="{{$settings->instagram}}">
                </div>
                <div class="col-sm-12 form-group">
                    <label>Brief description</label>
                    <textarea class="form-control" name="brief">{{$settings->brief}}</textarea>
                </div>
                <div class="spacer-15"></div>

                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
                <div class="progress-wrap" style="display: none;">
                    <div class="progress">
                        <div class="bar"></div >
                        <div class="percent">0%</div >
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection