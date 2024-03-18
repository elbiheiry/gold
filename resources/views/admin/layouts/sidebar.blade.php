<div class="side-menu">
    <div class="logo">
        <div class="main-logo"><img src="{{asset('assets/admin/images/logo.png')}}"></div>
    </div><!--End Logo-->
    <aside class="sidebar">
        <ul class="side-menu-links">
            <li class="@if(Request::route()->getName() == 'admin.dashboard'){{'active'}}@endif"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
            <li class="@if(Request::route()->getName() == 'admin.settings'){{'active'}}@endif"><a href="{{route('admin.settings')}}">Site settings</a></li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.sliders' ){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="javascript:void(0);">
                    Homepage
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li class="@if(Request::route()->getName() == 'admin.sliders'){{'active'}}@endif"><a href="{{route('admin.sliders')}}">Slider</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.about'){{'active'}}@endif"><a href="{{route('admin.about')}}">About</a></li>
                </ul>
            </li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.group.sliders' || Request::route()->getName() == 'admin.group.content' || Request::route()->getName() == 'admin.group.company'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="javascript:void(0);">
                    Group page
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li class="@if(Request::route()->getName() == 'admin.group.content'){{'active'}}@endif"><a href="{{route('admin.group.content')}}">Content</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.group.sliders'){{'active'}}@endif"><a href="{{route('admin.group.sliders')}}">Slider</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.group.company'){{'active'}}@endif"><a href="{{route('admin.group.company')}}">Sister companies</a></li>
                </ul>
            </li>
            <li class="sub-menu @if(Request::route()->getName() == 'admin.services.content' || Request::route()->getName() == 'admin.services'){{'active'}}@endif">
                <a rel="nofollow" rel="noreferrer" href="javascript:void(0);">
                    Services page
                    <i class="fa fa-angle-down"></i>
                </a>
                <ul>
                    <li class="@if(Request::route()->getName() == 'admin.services.content'){{'active'}}@endif"><a href="{{route('admin.services.content')}}">Content</a></li>
                    <li class="@if(Request::route()->getName() == 'admin.services'){{'active'}}@endif"><a href="{{route('admin.services')}}">Services</a></li>
                </ul>
            </li>
            <li class="@if(Request::route()->getName() == 'admin.products'){{'active'}}@endif"><a href="{{route('admin.products')}}">Products</a></li>
            <li class="@if(Request::route()->getName() == 'admin.blogs'){{'active'}}@endif"><a href="{{route('admin.blogs')}}">Blogs</a></li>
            <li class="@if(Request::route()->getName() == 'admin.pages'){{'active'}}@endif"><a href="{{route('admin.pages')}}">Pages</a></li>
            <li class="@if(Request::route()->getName() == 'admin.countries'){{'active'}}@endif"><a href="{{route('admin.countries')}}">Countries</a></li>
            <li class="@if(Request::route()->getName() == 'admin.checkouts'){{'active'}}@endif"><a href="{{route('admin.checkouts')}}">Orders</a></li>
            <li class="@if(Request::route()->getName() == 'admin.checkouts.reports'){{'active'}}@endif"><a href="{{route('admin.checkouts.reports')}}">Reports</a></li>
            <li class="@if(Request::route()->getName() == 'admin.messages'){{'active'}}@endif"><a href="{{route('admin.messages')}}">Messages</a></li>
            <li class="@if(Request::route()->getName() == 'admin.users'){{'active'}}@endif"><a href="{{route('admin.users')}}">Users</a></li>
        </ul>
    </aside>
</div>