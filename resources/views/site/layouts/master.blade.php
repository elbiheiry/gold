<!DOCTYPE html>
<html dir="ltr" lang="en">

    <!-- Mirrored from themelooks.us/demo/bloggypress/html/preview/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Mar 2018 06:32:22 GMT -->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- ==== Document Title ==== -->
        <title>:: {{$settings->name}} ::</title>

        <!-- ==== Document Meta ==== -->
        <meta name="description" content="{{$settings->name}}">
        <meta name="keywords"
              content="blog, blogging, personal, clean, modern, masonry, simple, html5, css3, template, responsive">
        <meta name="author" content="ThemeLooks">

        <!-- ==== Favicon ==== -->
        <link rel="icon" href="{{asset('assets/site/img/fav-icon.png')}}" type="image/png">

        <!-- ==== Google Font ==== -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700%7CPlayfair+Display:400,700">
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Mukta+Mahee" rel="stylesheet">

        <!-- ==== Font Awesome ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href="{{asset('assets/site/css/animate.css')}}"/>


        <!-- ==== Bootstrap Framework ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/bootstrap.min.css')}}">

        <!-- ==== Owl Carousel Plugin ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/owl.carousel.min.css')}}">

        <!-- ==== Magnific Popup Plugin ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/magnific-popup.min.css')}}">

        <!-- ==== Main Stylesheet ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/style.css')}}">

        <!-- ==== Responsive Stylesheet ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/responsive-style.css')}}">

        <!-- ==== Color Scheme Stylesheet ==== -->

        <!-- ==== Custom Stylesheet ==== -->
        <link rel="stylesheet" href="{{asset('assets/site/css/custom.css')}}">

        <link rel="stylesheet" href="https://widgetcdn.nfusionsolutions.com/widget/asset/css/ticker/1/32796899-2cc3-4454-ac51-2c95c78799af/195d0f03-c7e8-4b5d-8e7b-ad1c62e80c8f/2" />

        <style>
			.nfusionsolutions-com-ticker .container{
			width:100%;
			background:#caa969;
			bottom:0;
			height:45px;
			}
		</style>

        <!-- ==== HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries ==== -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

    </head>
    <body>
        <div class="modal fade" id="form-messages" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content text-center">
                    <div class="modal-header custom-modal">
                        <h5 class="modal-title" id="exampleModalLabel">Notes</h5>
                    </div>
                    <div class="modal-body">
                        <div class="response-messages">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Wrapper Start -->
        <div class="wrapper">
            <!-- Header Section Start -->
                @include('site.layouts.header')
            <!-- Header Section End -->
                @yield('content')
            <!-- Footer Section Start -->
                @include('site.layouts.footer')
            <!-- Footer Section End -->
        </div>
        <!-- Wrapper End -->

        <!-- ==== jQuery Library ==== -->
        <script src="{{asset('assets/site/js/wow.js')}}"></script>

        <script src="{{asset('assets/site/js/jquery-3.2.1.min.js')}}"></script>

        <!-- ==== Bootstrap Framework ==== -->
        <script src="{{asset('assets/site/js/bootstrap.min.js')}}"></script>

        <!-- ==== Owl Carousel Plugin ==== -->
        <script src="{{asset('assets/site/js/owl.carousel.min.js')}}"></script>

        <!-- ==== Magnific Popup Plugin ==== -->
        <script src="{{asset('assets/site/js/jquery.magnific-popup.min.js')}}"></script>

        <!-- ==== Validation Plugin ==== -->
        <script src="{{asset('assets/site/js/jquery.validate.min.js')}}"></script>

        <!-- ==== Match Height Plugin ==== -->
        <script src="{{asset('assets/site/js/jquery.matchHeight-min.js')}}"></script>

        <!-- ==== Isotope Plugin ==== -->
        <script src="{{asset('assets/site/js/isotope.min.js')}}"></script>

        <!-- ==== Footer Reveal Plugin ==== -->
        <script src="{{asset('assets/site/js/footer-reveal.min.js')}}"></script>

        <!-- ==== Retina Plugin ==== -->
        <script src="{{asset('assets/site/js/retina.min.js')}}"></script>

        <!-- ==== Main Script ==== -->
        <script src="{{asset('assets/site/js/main.js')}}"></script>
        <script>
            wow = new WOW(
                {
                    animateClass: 'animated',
                    offset: 100,
                    callback: function (box) {
                        console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
                    }
                }
            );
            wow.init();
            document.getElementById('moar').onclick = function () {
                var section = document.createElement('section');
                section.className = 'section--purple wow fadeInDown';
                this.parentNode.insertBefore(section, this);
            };
        </script>
        <script src="{{asset('assets/site/js/jquery.form.js')}}"></script>
        @yield('js')
        
        <script src="https://widgetcdn.nfusionsolutions.com/asset/static/76b3740c96b8032629319ae9db1fb947/common/1/js/widget.min.js"></script>
	    <script>
	    nfusion.lib.$LAB

	        .script("https://widgetcdn.nfusionsolutions.com/asset/static/cf20376340bc24ec8254dccb27b7eabf/common/1/js/utility.min.js")
	        .script("https://widgetcdn.nfusionsolutions.com/asset/static/03206d9c8f1be4af5c37a84ffac8cac1/ticker/1/js/ticker.min.js")
	    </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-99643272-12"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-99643272-12');
        </script>


    </body>

<!-- Mirrored from themelooks.us/demo/bloggypress/html/preview/index-3.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Mar 2018 06:32:22 GMT -->
</html>