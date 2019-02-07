<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    {{--<meta name="csrf-token" content="{{ csrf_token() }}">--}}

    <title>{{ config('app.name', 'Rhea') }}</title>

    <!-- Favicon -->
    <link href="{{ asset('aaa/doctor/img/brand/pink.png') }}" rel="icon" type="image/png">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

    <!-- Icons -->
    <link href="{{ asset('aaa/admin/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('aaa/admin/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" rel="stylesheet">

    <!-- Argon CSS -->
    <link type="text/css" href="{{ asset('aaa/admin/css/argon.css?v=1.0.0') }}" rel="stylesheet">

    {{--<!-- Alert -->--}}
    {{--<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>--}}
    {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>--}}

</head>

<body>
<div id="app">
    @include('admin.inc.sidenav')
    <main class="main-content">
        @include('admin.inc.topnav')
        {{--@include('ainc.messages')--}}
        @yield('content')
    </main>
</div>

<!-- Argon Scripts -->
<!-- Core -->
<script src="{{ asset('aaa/admin/vendor/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('aaa/admin/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>

<!-- Argon JS -->
<script src="{{ asset('aaa/admin/js/argon.js?v=1.0.0') }}"></script>


</body>
</html>