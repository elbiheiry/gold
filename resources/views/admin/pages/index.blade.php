@extends('admin.layouts.master')
@section('title')
    Dashboard
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12">
            <div class="widget">
                <div class="widget-content">
                    <div class="col-sm-12">
                        <img src="{{asset('assets/admin/images/logo.png')}}" class="intro-logo">
                    </div>
                    <div class="funfact-lists">
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Product::count()}}" data-speed="2000">0</h3>
                                <div class="count-name">Products</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Message::count()}}" data-speed="2000">0</h3>
                                <div class="count-name">Messages</div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="counter">
                                <h3 class="timer" data-to="{{\App\Member::count()}}" data-speed="2000">0</h3>
                                <div class="count-name">Members</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection