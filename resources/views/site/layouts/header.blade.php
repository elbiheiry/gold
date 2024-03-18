<header class="header--section">
    <!-- Header Topbar Start -->

    <!-- Header Topbar End -->

    <!-- Header Navbar Start -->
    <nav class="header--navbar navbar">
        <div class="container">
            <!-- Header Logo Start -->
            <div class="header--logo header--date wow fadeInDown">
                <a href="{{route('site.index')}}">
                    <img src="{{asset('assets/site/img/logo.png')}}" alt="">
                </a>
            </div>
            <!-- Header Logo End -->

            <div class="navbar-header ">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#headerNav">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>

            <div id="headerNav" class="navbar-collapse collapse text-center " data-wow-duration="2s">

                <!-- Header nav Links Start -->
                <ul class="header--nav-links nav">
                    <li><a href="{{route('site.index')}}">Home</a></li>
                    <li><a href="{{route('site.group')}}">Group</a></li>
                    <li><a href="{{route('site.services')}}">Services</a></li>
                    <li><a href="{{route('site.products')}}">Products</a></li>
                    <li><a href="{{route('site.blogs')}}">Blogs</a></li>
                    @foreach($pages as $page)
                        <li><a href="{{route('site.pages',['slug' => $page->slug])}}">{{$page->name}}</a></li>
                    @endforeach
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">RSG Platform<i
                                    class="fa fa-caret-down"></i></a>

                        <ul class="dropdown-menu">
                            <li><a href="https://cm.rubystargold.com" target="_blank">Live Accoutant</a></li>
                            <li><a href="https://ct.rubystargold.com/copy" target="_blank">Demo Account</a></li>

                        </ul>
                    </li>

                    <li>
                    	<a style="padding: 5px;" class="cart-head-icon" href="{{route('site.cart')}}">
                    		<i class="fa fa-shopping-bag"></i><span>{{\Cart::content()->count()}}</span>
                    	</a>
                    </li>
                    @if(auth()->guard('site')->guest())
                        <li><a class="log" href="{{route('site.login')}}">Login</a></li>
                        @else
                        <li>Welcome : {{auth()->guard('site')->user()->name}}</li>
                        <li><a class="log" href="{{route('site.logout')}}">Logout</a></li>
                    @endif
                </ul>
                <div class="row">
                    <div style="float:right" class="col-md-4 col-md-offset-5">
                        <form action="" class="search-form">
                            <div class="form-group has-feedback">
                                <label for="search" class="sr-only">Search</label>
                                <input style="    margin-top: -5px;" type="text" class="form-control" name="search" id="search" placeholder="search">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Header nav Links End -->
            </div>
        </div>
    </nav>
    <!-- Header Navbar End -->
</header>