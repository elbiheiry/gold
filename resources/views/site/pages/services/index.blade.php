@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="col-md-6  pb--40">
                <h1>{{$content->title}}</h1>
                @foreach(explode("\n" , $content->description) as $description)
                    <p>{{$description}}</p>
                @endforeach
            </div>
            <div class="col-md-6 pt--80 pb--40">
                
                        <iframe
			 src="https://www.goldbroker.com/widget/iframe/live/XAU/320?currency=USD"  style="border:0px #FFFFFF none;" scrolling="no"
                        frameborder="0" marginheight="0px" marginwidth="0px" height="180px" width="100%"></iframe>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <!-- Nav tabs category -->
                    <ul class="nav nav-tabs faq-cat-tabs">
                        @foreach($services as $index => $service)
                        <li class="@if($index == 0){{'active'}}@endif"><a href="#faq-cat-{{$index+1}}" data-toggle="tab">{{$service->title}} </a></li>
                        @endforeach
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content faq-cat-content">
                        @foreach($services as $index => $service)
                            <div class="tab-pane @if($index == 0){{'active in'}}@endif  fade" id="faq-cat-{{$index+1}}">
                                <div class="panel-group" id="accordion-cat-{{$index+1}}">
                                    @foreach($service->questions as $key => $question)
                                        <div class="panel panel-default panel-faq">
                                            <div class="panel-heading">
                                                <a data-toggle="collapse" data-parent="#accordion-cat-{{$index+1}}" href="#faq-cat-{{$index+1}}-sub-{{$key+1}}">
                                                    <h4 class="panel-title">
                                                        {{$question->title}}
                                                        <span class="pull-right"><i class="glyphicon glyphicon-plus"></i></span>
                                                    </h4>
                                                </a>
                                            </div>
                                            <div id="faq-cat-{{$index+1}}-sub-{{$key+1}}" class="panel-collapse collapse">
                                                <div class="panel-body">
                                                    <div class="row form-group">
                                                        <div class="col-sm-12">
                                                            {{$question->description}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
        $(document).ready(function () {
            $('.collapse').on('show.bs.collapse', function () {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').addClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-minus"></i>');
            });
            $('.collapse').on('hide.bs.collapse', function () {
                var id = $(this).attr('id');
                $('a[href="#' + id + '"]').closest('.panel-heading').removeClass('active-faq');
                $('a[href="#' + id + '"] .panel-title span').html('<i class="glyphicon glyphicon-plus"></i>');
            });
        });
    </script>
@endsection