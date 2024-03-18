@extends('admin.layouts.master')
@section('title')
    checkouts
@endsection
@section('models')
    <div class="modal fade" id="delete_message" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Do you want to delete this order?</h5>
                </div>
                <form class="modal-footer text-center">
                    <a type="button" class="custom-btn red-bc modalDLTBTN">Delete</a>
                    <a type="button" class="custom-btn green-bc" data-dismiss="modal">Close</a>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>checkouts</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">checkouts</li>
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
                            <th>First name</th>
                            <th>Last name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Country</th>
                            <th>City</th>
                            <th>Address</th>
                            <th>Total</th>
                            <th>Created at</th>
                            <th>Order</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($checkouts as $index => $checkout)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$checkout->member['name']}}</td>
                                <td>{{$checkout->last_name}}</td>
                                <td>{{$checkout->member['email']}}</td>
                                <td>{{$checkout->phone}}</td>
                                <td>{{$checkout->country['name']}}</td>
                                <td>{{$checkout->city['name']}}</td>
                                <td>{{$checkout->address}}</td>
                                <td>{{$checkout->total}}</td>
                                <td>{{$checkout->created_at->format('Y-m-d')}}</td>
                                <td class="text-center">
                                    <a href="{{route('admin.checkouts.orders',['id' => $checkout->id])}}" class="icon-btn green-bc">
                                        <i class="fa fa-info"></i>
                                    </a>
                                    <button data-url="{{route('admin.checkouts.delete',['id' => $checkout->id])}}" data-toggle="modal" data-target="#delete_message" class="icon-btn red-bc deleteBTN">
                                        <i class="fa fa-trash-o"></i>
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection