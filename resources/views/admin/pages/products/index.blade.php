@extends('admin.layouts.master')
@section('title')
    Products
@endsection
@section('models')
    <div id="common-modal" class="modal fade" role="dialog">

    </div>
@endsection
@section('content')
    <div class="content">
        <div class="col-sm-12 page-heading">
            <div class="col-sm-6">
                <h2>Products</h2>
            </div><!--End col-md-6-->
            <div class="col-sm-6">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                    <li class="active">Products</li>
                </ul>
            </div><!--End col-md-6-->
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <form class="widget-content ajax-form" action="{{route('admin.products')}}" method="post" enctype="multipart/form-data">
                {!! csrf_field() !!}
                <div class="col-md-6 form-group increment">
                    <label>Slider images</label>
                    <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="images[]" style="display: none;">
                    <div class="input-group-btn">
                        <button class="btn btn-success pull-right" type="button">Add</button>
                    </div>
                    <div class="text-danger text-center">Please click on image to change it</div>
                    <div class="text-danger text-center">Image size should be: 264 * 264</div>
                </div>

                <div class="form-group clone hide">
                    <div class="col-md-6 form-group control-group">
                        <label>Slider images</label>
                        <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                        <input type="file" name="images[]" style="display: none;">
                        <div class="input-group-btn">
                            <button class="btn btn-danger pull-right" type="button">Remove</button>
                        </div>
                        <div class="text-danger text-center">Please click on image to change it</div>
                        <div class="text-danger text-center">Image size should be: 264 * 264</div>
                    </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-md-6 form-group ">
                    <label>Main image</label>
                    <img src="{{asset('assets/admin/images/download.png')}}" class="img-responsive btn-product-image" style="cursor: pointer;">
                    <input type="file" name="image" style="display: none;">
                    <div class="text-danger text-center">Please click on image to change it</div>
                    <div class="text-danger text-center">Image size should be: 264 * 264</div>
                </div>
                <div class="spacer-15"></div>
                <div class="col-md-6 form-group">
                    <label>Product name</label>
                    <input class="form-control" type="text" name="name">
                </div>
                <div class="col-md-6 form-group">
                    <label>Product code</label>
                    <input class="form-control" type="text" name="code">
                </div>
                <div class="col-md-6 form-group">
                    <label>Product price</label>
                    <input class="form-control" type="text" name="price">
                </div>
                <div class="col-md-6 form-group">
                    <label>Product brand</label>
                    <input class="form-control" type="text" name="brand">
                </div>
                <div class="col-md-6 form-group">
                    <label>Product weight</label>
                    <input class="form-control" type="text" name="weight">
                </div>
                <div class="col-md-6 form-group">
                    <label>Gold suisse</label>
                    <input class="form-control" type="text" name="suisse">
                </div>
                <div class="col-md-6 form-group">
                    <label>Brief description</label>
                    <textarea class="form-control" name="brief"></textarea>
                </div>
                <div class="spacer-15"></div>
                <div class="col-sm-12 save-btn">
                    <button class="custom-btn green-bc" type="submit">Save</button>
                </div>
            </form>
        </div>
        <div class="spacer-15"></div>
        <div class="widget">
            <div class="widget-content">
                <form method="post" action="{{route('admin.products.delete')}}" class="ajax-form">
                    {!! csrf_field() !!}
                    <div class="col-sm-12">
                        <button type="submit" class="icon-btn red-bc">
                            <i class="fa fa-trash-o"></i>
                            Delete
                        </button>
                    </div>
                    <div class="load-spinner" style="display: none;">
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                    <div class="spacer-15"></div>
                    <div class="table-responsive">
                        @include('admin.pages.products.templates.table')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')

    <script type="text/javascript">

        $(document).ready(function() {

            $(".btn-success").click(function(){
                var html = $(".clone").html();
                $(".increment").after(html);
            });

            $("body").on("click",".btn-danger",function(){
                $(this).parents(".control-group").remove();
            });

        });

    </script>

@endsection