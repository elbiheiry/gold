@extends('admin.layouts.master')
@section('title')
    Services content
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Services content</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Services content</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.services.content')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>Title</label>
                    <input class="form-control" type="text" value="{{$content->title}}" name="title">
                </div>

                <div class="col-sm-12 form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{$content->description}}</textarea>
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