@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-xs-12 pb--60">
                    <!-- Post Item Start -->
                    <div class="post--item text-center">
                        <!-- Post Image Start -->
                        <div class="post--img">
                            <img src="{{asset('storage/uploads/blogs/'.$blog->image)}}" alt="">
                        </div>
                        <!-- Post Image End -->

                        <!-- Post Category Start -->
                        <div class="post--cat">
                            <a href="#" data-overlay="0.5" data-overlay-color="primary">{{$blog->created_at->format('d/m/Y')}}</a>
                        </div>
                        <!-- Post Category End -->

                        <!-- Post Title Start -->
                        <div class="post--title">
                            <h2 class="h3">{{$blog->name}}</h2>
                        </div>
                        <!-- Post Title End -->

                        <!-- Post Excerpt Start -->
                        <div class="post--excerpt">
                            <p>
                                {{$blog->description1}}
                            </p>
                            <blockquote>
                                <p>{{$blog->description2}}</p>
                            </blockquote>
                        </div>
                        @php(
                            $images = json_decode($blog->images)
                        )
                        @if($images != null)
                            <div class="row pt--10">
                                @foreach($images as $image)
                                <div class="col-sm-4 col-xs-6 pb--30">
                                    <p><img src="{{asset('storage/uploads/blogs/'.$image)}}" alt="" class="center-block"></p>
                                </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </section>
@endsection