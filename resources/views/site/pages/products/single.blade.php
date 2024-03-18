@extends('site.layouts.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <!-- Post Author Start -->
                    <div class="post--author clearfix pb--60">
                        <div class="img float--left">
                            <div class="post--slider owl-carousel" data-owl-nav="true" data-owl-dots="true"
                                 data-owl-margin="10">
                                @php(
                                    $images = json_decode($product->images)
                                )
                                @if($images != null)
                                    @foreach($images as $image)
                                        <img src="{{asset('storage/uploads/products/'.$image)}}" alt="">
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        {{--<div class="img float--left">--}}
                            {{--<img src="{{asset('storage/uploads/products/'.$product->image)}}" alt="">--}}
                        {{--</div>--}}

                        <div class="info ov--h">
                            <div class="header clearfix">
                                <h2 class="name h6">
                                    {{$product->name}}
                                    <a href="#" data-overlay="0.5" data-overlay-color="primary">{{$product->price}} AED</a>
                                </h2>
                            </div>
                            <div class="bio">
                                <p>{{$product->brief}}</p>
                            </div>
                            <div class="post--action">
                                <a href="javascript:;" data-url="{{route('site.cart.add',['id' => $product->id])}}" data-token="{!! csrf_token() !!}" class="CartBTN add post--cat">Add To Cart</a>
                            </div>
                        </div>
                    </div>
                    <!-- Post Author End -->
                    <div class="row">
                        <div class="col-sm-12 col-xs-12 ">
                            <h2 class="h4 widget--title">Related Products</h2>
                        </div>
                    </div>
                    <div class="row" data-trigger="masonry">

                        @foreach($relatedProducts as $relatedProduct)
                            <div class="col-sm-4 col-xs-12 pb--60">

                                <div class="post--img">
                                    <a href="{{route('site.products.single',['slug' => $relatedProduct->slug])}}"><img src="{{asset('storage/uploads/products/'.$relatedProduct->image)}}" alt=""></a>
                                </div>
                                <div class="post--cat">
                                    <a class="price" href="#" data-overlay="0.5" data-overlay-color="primary">{{$relatedProduct->price}} AED</a>
                                    <a href="#" data-overlay="0.5" data-overlay-color="primary">{{$relatedProduct->code}}</a>

                                </div>
                                <!-- Post Category End -->

                                <!-- Post Title Start -->
                                <div class="post--title">
                                    <h2 class="h3"><a href="{{route('site.products.single',['slug' => $relatedProduct->slug])}}" class="btn-link">{{substr($relatedProduct->name ,0 ,15)}}</a></h2>
                                </div>
                                <!-- Post Title End -->

                                <!-- Post Excerpt Start -->
                                <div class="post--excerpt">
                                    <p class="productdet">{{$relatedProduct->brief}}</p>
                                </div>
                                <!-- Post Excerpt End -->

                                <!-- Post Action Start -->
                                <div class="post--action">
                                    <a href="{{route('site.products.single',['slug' => $relatedProduct->slug])}}" class="readz ">Read More</a>
                                </div>
                                <!-- Post Action End -->
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-md-4 pb--60">
                    <!-- Widget Start -->
                    <div class="widget">
                        <h2 class="h4 widget--title">Specifications</h2>

                        <!-- Links Widget Start -->
                        <div class="links--widget pb--10">
                            <ul class="nav">
                                <li>
                                    <a href="#">
                                        <span class="text">Price</span>
                                        <span class="count">{{$product->price}} AED</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Brand</span>
                                        <span class="count">{{$product->brand}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">WEIGHT</span>
                                        <span class="count">{{$product->weight}}</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="text">Gold Suisse</span>
                                        <span class="count">{{$product->suisse}}</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- Links Widget End -->
                    </div>
                    <!-- Widget End -->

                    <!-- Widget Start -->
                    <div class="widget">
                        <h2 class="h4 widget--title">Share</h2>

                        <!-- Social Widget Start -->
                        <div class="social--widget pb--5 text-center a2a_kit a2a_kit_size_32 a2a_default_style">
                            <script async src="https://static.addtoany.com/menu/page.js"></script>
                            <ul class="nav">
                                <li><a class="a2a_button_facebook"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="a2a_button_twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="a2a_button_google_plus"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="a2a_button_linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <!-- Social Widget End -->
                    </div>
                    <!-- Widget End -->
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $('.CartBTN').on('click',function () {
            var url = $(this).data('url');

            $.ajax({
                url : url,
                method : 'POST',
                dataType: 'json',
                data : {_token : $(this).data('token')},
                success : function (response) {
                    $('#form-messages').modal('show');

                    var messages = response.data;
                    $('.response-messages').html('');
                    $.each(messages, function( index, message ) {
                        $('.response-messages').append('<p>'+message+'</p>');
                    });
                }
            });
            $.ajaxSetup({
                headers:
                    {
                        'X-CSRF-Token': $('input[name="_token"]').val()
                    }
            });
            return false;
        });
    </script>
@endsection