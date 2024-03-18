@extends('admin.layouts.master')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Checkout</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content checkout-form" action="{{route('admin.checkouts.reports')}}" method="post" enctype="multipart/form-data">

                {!! csrf_field() !!}
                <div class="col-sm-6 form-group">
                    <label>From</label>
                    <input type="date" class="form-control" name="from">
                </div>

                <div class="col-sm-6 form-group">
                    <label>To</label>
                    <input type="date" class="form-control" name="to">
                </div>


                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </form>
        </div>

        <div id="checkout">

        </div>
    </div>
@endsection