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
                            <img src="{{asset('storage/uploads/pages/'.$page->image)}}" alt="">
                        </div>
                        <!-- Post Image End -->
                        <!-- Post Excerpt Start -->
                        <div class="post--excerpt">
                            @foreach(explode("\n" , $page->description) as $description)
                                <p>
                                    {{$description}}
                                </p>
                            @endforeach
                        </div>
                    </div>
                    <!-- Post Item End -->
                </div>
            </div>
        </div>
    </section>
@endsection