@extends('site.layouts.master')
@section('content')
    <section class="banner--section">
        <div class="container">
            <div class="cart-items">
                @include('site.pages.cart.templates.table')
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
                $('.cart-items').html(response.html);
            },
            complete: function(xhr) {
                // status.html(xhr.responseText);
            }
        });
    </script>
@endsection