@extends('admin.layouts.master')
@section('title')
    orders
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>order</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">order</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <div class="spacer-15"></div>
                <div class="table-responsive">
                    <table id="datatable"  class="table table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>product name</th>
                            <th>product price</th>
                            <th>Quantity</th>
                            <th>Total price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($checkout->orders as $index => $order)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$order->name}}</td>
                                <td>{{$order->price}}</td>
                                <td>{{$order->qty}}</td>
                                <td>{{$order->total}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection