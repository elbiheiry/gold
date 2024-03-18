@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 " data-mh="banner02">
                    <div class="row marg">
                        @foreach($products as $product)
                            <div class="col-md-3 offset-1 bgw wow fadeInDown " data-wow-duration="2s">
                                <div class="post--img">
                                    <a href="{{route('site.products.single',['slug' => $product->slug])}}"><img src="{{asset('storage/uploads/products/'.$product->image)}}" alt=""></a>
                                </div>
                                <div class="post--cat">
                                    <a class="price" href="#" data-overlay="0.5" data-overlay-color="primary">{{$product->price}} AED</a>
                                    <a href="#" data-overlay="0.5" data-overlay-color="primary">{{$product->code}}</a>
                                </div>
                                <!-- Post Category End -->
                                <!-- Post Title Start -->
                                <div class="post--title">
                                    <h2 class="h3"><a href="{{route('site.products.single',['slug' => $product->slug])}}" class="btn-link">{{substr($product->name ,0 ,20)}}</a></h2>
                                </div>
                                <!-- Post Title End -->
                                <!-- Post Excerpt Start -->
                                <div class="post--excerpt">
                                    <p class="productdet">{{$product->brief}}</p>
                                </div>
                                <!-- Post Excerpt End -->
                                <!-- Post Action Start -->
                                <div class="post--action">
                                    <a href="{{route('site.products.single',['slug' => $product->slug])}}" class="readz ">Read More</a>
                                    <a href="javascript:;" data-url="{{route('site.cart.add',['id' => $product->id])}}" data-token="{!! csrf_token() !!}" class="CartBTN add post--cat">Add To Cart</a>
                                </div>
                                <!-- Post Action End -->
                            </div>
                        @endforeach
                    </div>
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