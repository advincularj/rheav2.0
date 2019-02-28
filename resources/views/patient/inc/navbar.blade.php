<header class="header-global">
    <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg navbar-transparent navbar-light headroom">
        <div class="container">
            <a class="navbar-brand mr-lg-5" href="/">
                <img src="{{asset('aaa/doctor/img/brand/white.png')}}">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbar_global">
                <div class="navbar-collapse-header">
                    <div class="row">
                        <div class="col-6 collapse-brand">
                            <a href="{{asset('/index')}}">
                                <img src="{{asset('aaa/doctor/img/brand/blue.png')}}">
                            </a>
                        </div>
                        <div class="col-6 collapse-close">
                            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                                <span></span>
                                <span></span>
                            </button>
                        </div>
                    </div>
                </div>
                <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                    <li class="nav-item">
                        <a class="nav-link" href="/diary">Pregnancy Diary</a>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/checkups">Check-up Records</a>
                        </a>
                    </li>
                    {{--Eto yung Maternal Guide--}}
                    <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
                        <li class="nav-item">
                            <a class="nav-link" href="maternalguide">RHEA Maternal Guide</a>
                            </a>
                        </li>
                    </ul>
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.facebook.com/creativetim" target="_blank" data-toggle="tooltip" title="Like us on Facebook">
                            <i class="fa fa-facebook-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Facebook</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://www.instagram.com/creativetimofficial" target="_blank" data-toggle="tooltip" title="Follow us on Instagram">
                            <i class="fa fa-instagram"></i>
                            <span class="nav-link-inner--text d-lg-none">Instagram</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://twitter.com/creativetim" target="_blank" data-toggle="tooltip" title="Follow us on Twitter">
                            <i class="fa fa-twitter-square"></i>
                            <span class="nav-link-inner--text d-lg-none">Twitter</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link nav-link-icon" href="https://github.com/creativetimofficial/argon-design-system" target="_blank" data-toggle="tooltip" title="Star us on Github">
                            <i class="fa fa-github"></i>
                            <span class="nav-link-inner--text d-lg-none">Github</span>
                        </a>
                    </li>

                    @guest
                        <li class="nav-item d-none d-lg-block ml-lg-6 ">
                            <a href="/login" class="btn btn-neutral btn-icon">
                                </span>
                                <span class="nav-link-inner--text">Login</span>
                            </a>
                            {{--@if (Route::has('register'))--}}
                                {{--<a href="{{ route('register') }}" class="btn btn-neutral btn-icon">--}}
                                    {{--</span>--}}
                                    {{--<span class="nav-link-inner--text">{{ __('Register') }}</span>--}}
                                {{--</a>--}}
                            {{--@endif--}}
                            @if (Route::has('/register'))
                                <a href="/register" class="btn btn-neutral btn-icon">
                                    </span>
                                    <span class="nav-link-inner--text">{{ __('Register') }}</span>
                                </a>
                            @endif
                        </li>

                        {{--<li class="nav-item">--}}
                        {{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
                        {{--</li>--}}

                    @else
                        {{--<li class="nav-item dropdown">--}}
                        {{--<a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">--}}
                        {{--<i class="ni ni-collection d-lg-none"></i>--}}
                        {{--<span class="nav-link-inner--text">Examples</span>--}}
                        {{--</a>--}}
                        {{--<div class="dropdown-menu">--}}
                        {{--<a href="../examples/landing.html" class="dropdown-item">Landing</a>--}}
                        {{--<a href="../examples/profile.html" class="dropdown-item">Profile</a>--}}
                        {{--<a href="../examples/login.html" class="dropdown-item">Login</a>--}}
                        {{--<a href="../examples/register.html" class="dropdown-item">Register</a>--}}
                        {{--</div>--}}
                        {{--</li>--}}
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="position: relative; padding-left: 50px;: ">
                                <i class="ni ni-collection d-lg-none"></i>
                                <img src="/uploads/image/{{Auth::user()->image }}" style="width:32px; height:32px; position:absolute; top:10px; left:10px; border-radius:50%">
                                {{ Auth::user()->first_name }} {{ Auth::user()->last_name }}
                            </a>


                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="/userprofile">My Profile</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="/settings">Settings</a>
                                </li>


                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>


{{--<nav class="navbar navbar-expand-md navbar-dark bg-dark">--}}
{{--<a class="navbar-brand" href="/">{{config('app.name', 'Rhea')}}</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<div class="collapse navbar-collapse" id="navbarsExampleDefault">--}}
{{--<ul class="navbar-nav mr-auto">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/">Home</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/about">About</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/services">Services</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/posts">Blog</a>--}}
{{--</li>--}}
{{--</ul>--}}
{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li class="nav-item"><a class="nav-link" href="/posts/create">Create Post</a></li>--}}
{{--</ul>--}}
{{--</div>--}}
{{--</nav>--}}

{{--<nav class="navbar navbar-expand-md navbar-light navbar-laravel">--}}
{{--<div class="container">--}}
{{--<a class="navbar-brand" href="{{ url('/') }}">--}}
{{--{{ config('app.name', 'Rhea') }}--}}
{{--</a>--}}
{{--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">--}}
{{--<span class="navbar-toggler-icon"></span>--}}
{{--</button>--}}

{{--<ul class="collapse navbar-collapse" id="navbarSupportedContent">--}}
{{--<!-- Left Side Of Navbar -->--}}

{{--<ul class="navbar-nav mr-auto">--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/">Home</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/about">About</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/services">Services</a>--}}
{{--</li>--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="/posts">Blog</a>--}}
{{--</li>--}}
{{--</ul>--}}

{{--<!-- Right Side Of Navbar -->--}}

{{--<ul class="nav navbar-nav navbar-right">--}}
{{--<li class="nav-item"><a class="nav-link" href="/posts/create">Create Post</a></li>--}}
{{--</ul>--}}

{{--<ul class="navbar-nav ml-auto">--}}
{{--<ul class="navbar-nav navbar-right">--}}
{{--<!-- Authentication Links -->--}}
{{--@guest--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>--}}
{{--</li>--}}
{{--@if (Route::has('register'))--}}
{{--<li class="nav-item">--}}
{{--<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>--}}
{{--</li>--}}
{{--@endif--}}
{{--@else--}}
{{--<li class="nav-item dropdown">--}}
{{--<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>--}}
{{--{{ Auth::user()->name }}--}}
{{--</a>--}}

{{--<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--<li>--}}
{{--<a class="dropdown-item" href="/dashboard">Dashboard</a>--}}
{{--</li>--}}
{{--<li><a class="dropdown-item" href="{{ route('logout') }}"--}}
{{--onclick="event.preventDefault();--}}
{{--document.getElementById('logout-form').submit();">--}}
{{--{{ __('Logout') }}--}}
{{--</a>--}}

{{--<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">--}}
{{--@csrf--}}
{{--</form>--}}
{{--</li>--}}
{{--</ul>--}}
{{--</li>--}}
{{--@endguest--}}
{{--</ul>--}}
{{--</div>--}}
{{--</div>--}}
{{--</nav>--}}

