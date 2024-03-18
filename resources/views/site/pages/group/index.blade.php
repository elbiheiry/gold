@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30" data-mh="banner02">
                    <div class="row">
                        <div class="col-md-6 col-lg-offset-3 col-md-12 wow fadeInDown " data-wow-duration="2s">
                            <!-- Category Item Start -->
                            <iframe width="100%" height="315" src="{{$content->link}}"
                                    frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                            <!-- Category Item End -->
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
                        <div class="col-md-12 wow fadeInDown " data-wow-duration="4s">
                            <p class="sub">{{$content->description}}</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30 wow fadeInDown" data-mh="banner02">
                    <div class="instagram--items">
                        <!-- Owl Carousel Start -->
                        <div class="owl-carousel" data-owl-center="true" data-owl-responsive='{"0": {"autoWidth": true}}' data-trigger="gallery_popup">
                            @foreach($sliders as $slider)
                                <!-- Instagram Item Start -->
                                <div class="instagram--item">
                                    <a href="{{asset('storage/uploads/sliders/'.$slider->image)}}">
                                        <img src="{{asset('storage/uploads/sliders/'.$slider->image)}}" alt="">
                                    </a>
                                </div>
                                <!-- Instagram Item End -->
                            @endforeach
                        </div>
                        <!-- Owl Carousel End -->
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30 wow fadeInDown" data-mh="banner02">
                    <h3 class="centerz">Sister Companies</h3>
                    <div class="instagram--items">
                        <!-- Owl Carousel Start -->
                        <div class="owl-carousel" data-owl-center="true" data-owl-responsive='{"0": {"autoWidth": true}}' data-trigger="gallery_popup">
                            @foreach($companies as $company)
                                <!-- Instagram Item Start -->
                                <div class="instagram--item">
                                    <a href="{{asset('storage/uploads/companies/'.$company->image)}}">
                                        <img src="{{asset('storage/uploads/companies/'.$company->image)}}" alt="">
                                    </a>
                                </div>
                                <!-- Instagram Item End -->
                            @endforeach
                        </div>
                        <!-- Owl Carousel End -->
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection