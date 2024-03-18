@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 " data-mh="banner02">
                    <div class="row">
                        <div class="col-md-12  ">
                            <!-- Post Item Start -->
                            <div class="post--item post--single text-center">
                                <!-- Post Slider Start -->
                                <div class="post--slider owl-carousel" data-owl-nav="true" data-owl-dots="true">
                                    @foreach($sliders as $slider)
                                        <img src="{{asset('storage/uploads/sliders/'.$slider->image)}}" alt="">
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30" data-mh="banner02">
                    <div class="row marg">
                        <div class="col-md-12 ">
                            <h3 class="">Why GOLD ? </h3>
                            @foreach($abouts as $index => $about)
                                @if($about->type == 'GOLD')
                                    <p class="weight" data-wow-duration="@if($index == 0){{''}}@else'{{$index+4}}s'@endif"> {{$about->title}}</p>
                                    <p class="sub" data-wow-duration="@if($index == 0){{''}}@else'{{$index+4}}s'@endif">{{$about->description}}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-md-12 pb--90" data-mh="banner02">
                    <div class="row marg">
                        <div class="col-md-12 ">
                            <h3 class=" ">Why RSG ?</h3>
                            @foreach($abouts as $index => $about)
                                @if($about->type == 'RSG')
                                    <p class="weight" data-wow-duration="@if($index == 0){{''}}@else'{{$index+4}}s'@endif"> {{$about->title}}</p>
                                    <p class="sub" data-wow-duration="@if($index == 0){{''}}@else'{{$index+4}}s'@endif">{{$about->description}}</p>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30" data-mh="banner02">
                    <h6 class="centerz">CONTACT US</h6>
                    @foreach(explode("\n" , $settings->brief) as $brief)
                        <p class="centerz colorz ">{{$brief}}</p>
                    @endforeach
                    <br>
                    @foreach(explode("\n" , $settings->address) as $brief)
                        <p class="centerz colorz ">{{$brief}}</p>
                    @endforeach
                    <p class="centerz colorz "> Phone: {{$settings->phone}}</p>
                    <p class="centerz colorz ">Email : {{$settings->email}}</p>
                    <p class="centerz colorz ">www.rubystargold.com</p>
                </div>
                <div class="contact--form pt--90 ">
                    <form action="{{route('site.contact')}}" method="post" class="ajax-form">
                        {!! csrf_field() !!}
                        <div class="status"></div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="name" placeholder="Your Name" class="form-control" >
                                </div>
                            </div>

                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="email" placeholder="Your Email" class="form-control" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="subject" placeholder="Subject" class="form-control" >
                                </div>
                            </div>

                            <div class="col-xs-12">
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Message" ></textarea>
                                </div>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-default">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>

        $('.ajax-form').ajaxForm({

            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                $(".ajax-form")[0].reset();
                $('#form-messages').modal('show');

                var messages = response.data;
                $('.response-messages').html('');
                $.each(messages, function( index, message ) {
                    $('.response-messages').append('<p>'+message+'</p>');
                });


            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });
    </script>
@endsection