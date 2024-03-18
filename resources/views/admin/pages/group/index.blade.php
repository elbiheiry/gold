@extends('admin.layouts.master')
@section('title')
    Group content
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Group content</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Group content</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.group.content')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>Video link</label>
                    <input class="form-control" type="url" value="{{str_replace('embed/' , 'watch?v=' ,$group->link)}}" name="link">
                </div>

                <div class="col-sm-12 form-group">
                    <label>Description</label>
                    <textarea class="form-control" name="description">{{$group->description}}</textarea>
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