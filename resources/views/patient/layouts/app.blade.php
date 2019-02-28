<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Rhea') }}</title>
    <!-- Favicon -->
    <link href="{{ asset('aaa/doctor/img/brand/pink.png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('aaa/doctor/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('aaa/doctor/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link href="{{ asset('/aaa/doctor/css/argon.css') }}" rel="stylesheet">
    <!-- Docs CSS -->
    <link href="{{ asset('aaa/doctor/css/docs.min.css') }}" rel="stylesheet">

    <!-- Alert -->
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}

</head>

<body>
<div id="app">
    @if (Auth::user()->role_id == 3)
        @include ('patient.inc.navbar')
    @else
        @include ('guest.navbar')
    @endif
    {{--@include('patient.inc.navbar')--}}
    {{--<main class="container">--}}
        {{--@include('inc.messages')--}}
    {{--</main>--}}
    @yield('content')
</div>
<footer class="footer has-cards">
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    &copy; 2018
                    <a href="https://www.creative-tim.com" target="_blank">Creative Tim</a>.
                </div>
            </div>
            <div class="col-md-6">
                <ul class="nav nav-footer justify-content-end">
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a href="https://github.com/creativetimofficial/argon-design-system/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</footer>

<!-- ReCaptcha -->
<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Core -->
<script src="{{asset('aaa/doctor/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('aaa/doctor/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('aaa/doctor/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('aaa/doctor/vendor/headroom/headroom.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('aaa/doctor/js/argon.js?v=1.0.1')}}../assets/"></script>
<!-- Ckeditor -->
<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
<script>
CKEDITOR.replace( 'article-ckeditor' );
</script>
</body>

</html>

{{--// ORIGINAL LAYOUT--}}
{{--<!DOCTYPE html>--}}
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
{{--<head>--}}
    {{--<meta charset="utf-8">--}}
    {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}

    {{--<!-- CSRF Token -->--}}
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    {{--<title>{{ config('app.name', 'Rhea') }}</title>--}}

    {{--<!-- Fonts -->--}}
    {{--<link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
    {{--<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">--}}

    {{--<!-- Styles -->--}}
    {{--<link rel="stylesheet" href="{{asset('css/app.css')}}">--}}

    {{--<!-- Latest compiled and minified CSS -->--}}
    {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">--}}
{{--</head>--}}
{{--<body>--}}
    {{--<div id="app">--}}
        {{--@include('inc.navbar')--}}
        {{--<main class="container">--}}
            {{--@include('inc.messages')--}}
            {{--@yield('content')--}}
        {{--</main>--}}
    {{--</div>--}}
    {{--<!-- Scripts -->--}}
    {{--<script src="{{ asset('js/app.js') }}" defer></script>--}}
    {{--<script src='https://www.google.com/recaptcha/api.js'></script>--}}
    {{--<script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>--}}
    {{--<script>--}}
        {{--CKEDITOR.replace( 'article-ckeditor' );--}}
    {{--</script>--}}
{{--</body>--}}
{{--</html>--}}




