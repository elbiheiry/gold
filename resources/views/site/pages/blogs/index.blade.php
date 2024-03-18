@extends('site.layouts.master')
@section('content')
    <!-- Banner Section Start -->
    <section class="banner--section">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-sm-6 col-xs-12 pb--60">
                        <!-- Post Item Start -->
                        <div class="post--item text-center">
                            <!-- Post Image Start -->
                            <div class="post--img">
                                <a href="{{route('site.blogs.single' ,['slug' => $blog->slug])}}"><img src="{{asset('storage/uploads/blogs/'.$blog->image)}}" alt=""></a>
                            </div>
                            <!-- Post Image End -->
                            <!-- Post Category Start -->
                            <div class="post--cat">
                                <a href="#" data-overlay="0.5" data-overlay-color="primary">{{$blog->created_at->format('d/m/Y')}}</a>
                            </div>
                            <!-- Post Category End -->

                            <!-- Post Title Start -->
                            <div class="post--title">
                                <h2 class="h3">
                                    <a href="{{route('site.blogs.single' ,['slug' => $blog->slug])}}" class="btn-link">{{$blog->name}}</a>
                                </h2>
                            </div>
                            <!-- Post Title End -->

                            <!-- Post Excerpt Start -->
                            <div class="post--excerpt">
                                <p>
                                    {{$blog->description1}}
                                </p>
                            </div>
                            <!-- Post Excerpt End -->

                            <!-- Post Action Start -->
                            <div class="post--action">
                                <a href="{{route('site.blogs.single' ,['slug' => $blog->slug])}}" class="btn btn-default">Read More</a>
                            </div>
                            <!-- Post Action End -->
                        </div>
                        <!-- Post Item End -->
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection