@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30" data-mh="banner02">
                    <h6 class="centerz wow bounceInRight" >Check out</h6>
                    <p class="centerz colorz wow fadeInDown">Please fill form and we call you to confirm your order in 24 Hours </p>

                </div>
                <div class="contact--form pt--90 wow fadeInDown">
                    <form class="ajax-form" action="{{route('site.checkout')}}" method="post">
                        {!! csrf_field() !!}
                        <div class="status"></div>

                        <div class="row">
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="first_name" value="{{auth()->guard('site')->user()->name}}" readonly placeholder="First Name" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="last_name" placeholder="Last Name" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="phone" placeholder="Your Telephone" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="email" name="email" value="{{auth()->guard('site')->user()->email}}" readonly placeholder="Your Email" class="form-control">
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <input type="text" name="address" placeholder="Address" class="form-control" >
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <select class="form-control CountryInput" id="sel1" name="country_id" data-url="{{route('site.cities')}}">
                                        <option value="0">Country</option>
                                        @foreach($countries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <div class="form-group">
                                    <select class="form-control CityInput" id="sel1" name="city_id" disabled>
                                        <option value="0">City</option>
                                    </select>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-default">Check out</button>
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
        $(document).on('change', '.CountryInput', function () {

            var $this = $(this);
            var originalHtml = $this.html();
            var government = $(this).val();

            $.ajax({
                url : $(this).data('url'),
                method : 'GET',
                data: {id : government},
                success : function (data) {
                    $('.CityInput').removeAttr('disabled');
                    $('.CityInput').html(data);
                }
            });
        });

        $('.ajax-form').ajaxForm({

            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                // $(".ajax-form")[0].reset();
                $('#form-messages').modal('show');

                
                    var messages = response.data;
                    $('.response-messages').html('');
                    $.each(messages, function( index, message ) {
                        $('.response-messages').append('<p>'+message+'</p>');
                    });
                
                
		setTimeout(function () {
	                if (response.url){
	                    window.location.replace(response.url);
	                }
                }, 3000);

            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });
    </script>
@endsection