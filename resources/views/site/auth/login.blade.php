@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="row">
                <div class="col-md-12 pb--30" data-mh="banner02">
                    <div class="row marg">
                        <div class="col-md-12 ">
                            <div class="panel panel-login">
                                <div class="panel-heading">
                                    <div class="row">
                                        <div class="col-xs-6 centerz">
                                            <a href="#" style="font-size:30px" class="active" id="login-form-link">Login</a>
                                        </div>
                                        <div class="col-xs-6 centerz">
                                            <a href="#" style="font-size:30px" id="register-form-link">Register</a>
                                        </div>
                                    </div>
                                    <hr>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form id="login-form" action="{{route('site.login')}}"
                                                  method="post" role="form" style="display: block;">
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <input type="text" name="username" id="username" tabindex="1"
                                                           class="form-control" placeholder="Your email" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" tabindex="2"
                                                           class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group text-center">
                                                    <input type="checkbox" tabindex="3" class="" name="remember"
                                                           id="remember">
                                                    <label for="remember"> Remember Me</label>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="login-submit"
                                                                   tabindex="4" class="form-control btn btn-login"
                                                                   value="Log In">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="text-center">
                                                                <a href="https://phpoll.com/recover" tabindex="5"
                                                                   class="forgot-password">Forgot Password?</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                            <form id="register-form" action="{{route('site.register')}}" method="post" role="form" style="display: none;">
                                                {!! csrf_field() !!}
                                                <div class="form-group">
                                                    <input type="text" name="username" id="username" tabindex="1"
                                                           class="form-control" placeholder="Username" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="email" name="email" id="email" tabindex="1"
                                                           class="form-control" placeholder="Email Address" value="">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="password" id="password" tabindex="2"
                                                           class="form-control" placeholder="Password">
                                                </div>
                                                <div class="form-group">
                                                    <input type="password" name="confirm_password" id="confirm-password"
                                                           tabindex="2" class="form-control"
                                                           placeholder="Confirm Password">
                                                </div>
                                                <div class="form-group">
                                                    <div class="row">
                                                        <div class="col-sm-6 col-sm-offset-3">
                                                            <input type="submit" name="register-submit"
                                                                   id="register-submit" tabindex="4"
                                                                   class="form-control btn btn-register"
                                                                   value="Register Now">
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    <script>
        $(function() {
            $('#login-form-link').click(function(e) {
                $("#login-form").delay(100).fadeIn(100);
                $("#register-form").fadeOut(100);
                $('#register-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
            $('#register-form-link').click(function(e) {
                $("#register-form").delay(100).fadeIn(100);
                $("#login-form").fadeOut(100);
                $('#login-form-link').removeClass('active');
                $(this).addClass('active');
                e.preventDefault();
            });
        });

        $('#login-form').ajaxForm({

            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                if (response.status === 'success'){
                    $("#login-form")[0].reset();
                }
                $('#form-messages').modal('show');

                var messages = response.data;
                $('.response-messages').html('');
                $.each(messages, function( index, message ) {
                    $('.response-messages').append('<p>'+message+'</p>');
                });

                if (response.url){
                    window.location.replace(response.url);
                }
            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });

        $('#register-form').ajaxForm({

            beforeSend: function() {

            },
            uploadProgress: function(event, position, total, percentComplete) {

            },
            success: function(response) {
                if (response.status === 'success'){
                    $("#register-form")[0].reset();
                }
                $('#form-messages').modal('show');

                var messages = response.data;
                $('.response-messages').html('');
                $.each(messages, function( index, message ) {
                    $('.response-messages').append('<p>'+message+'</p>');
                });

                if (response.url){
                    window.location.replace(response.url);
                }

            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });
    </script>
@endsection