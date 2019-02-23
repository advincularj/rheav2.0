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
                    {{--Eto yung Maternal Guide--}}
                </ul>
                <ul class="navbar-nav align-items-lg-center ml-lg-auto">

                    @guest
                        <li class="nav-item d-none d-lg-block ml-lg-4">
                            <a href="{{ url('signin') }}" class="btn btn-neutral btn-icon">

                                <span class="nav-link-inner--text">Login</span>
                            </a>
                            {{--@if (Route::has('register'))--}}
                            {{--<a href="{{ route('register') }}" class="btn btn-neutral btn-icon">--}}
                            {{--</span>--}}
                            {{--<span class="nav-link-inner--text">{{ __('Register') }}</span>--}}
                            {{--</a>--}}
                            {{--@endif--}}

                                <a href="{{ url('signup') }}" class="btn btn-neutral btn-icon">

                                    <span class="nav-link-inner--text">{{ __('Register') }}</span>
                                </a>

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
                            <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
                                <div class=" dropdown-header noti-title">
                                    <h6 class="text-overflow m-0">Welcome!</h6>
                                </div>
                                <div class="dropdown-divider"></div>
                                {{--<a href="#!" class="dropdown-item">--}}
                                {{--<i class="ni ni-user-run"></i>--}}
                                {{--<span>Logout</span>--}}
                                {{--</a>--}}
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();">
                                    <i class="ni ni-user-run"></i>
                                    <span>{{ __('Logout') }}</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
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

