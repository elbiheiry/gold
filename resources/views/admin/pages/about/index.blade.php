@extends('admin.layouts.master')
@section('title')
    About us
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>About us</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">About us</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        @foreach($abouts as $about)
            <div class="widget">
                <div class="widget-title">{{$about->type}}</div>
                <form class="widget-content ajax-form" action="{{route('admin.about.edit' , ['id' => $about->id])}}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <div class="col-sm-6 form-group">
                        <label>Title</label>
                        <input class="form-control" type="text" value="{{$about->title}}" name="title">
                    </div>

                    <div class="col-sm-12 form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="description">{{$about->description}}</textarea>
                    </div>
                    <div class="spacer-15"></div>

                    <div class="col-sm-12 save-btn">
                        <button class="custom-btn green-bc" type="submit">Save</button>
                    </div>
                </form>
            </div>
        @endforeach
        <div class="progress-wrap" style="display: none;">
            <div class="progress">
                <div class="bar"></div >
                <div class="percent">0%</div >
            </div>
        </div>
    </div>
@endsection