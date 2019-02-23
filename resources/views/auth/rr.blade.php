<! DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Start your development with a Design System for Bootstrap 4.">
    <meta name="author" content="Creative Tim">
    <title>{{ config('app.name', 'Rhea') }}</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link href="{{ asset('aaa/doctor/img/brand/pink .png') }}" rel="icon" type="image/png">
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <!-- Icons -->
    <link href="{{ asset('aaa/doctor/vendor/nucleo/css/nucleo.css') }}" rel="stylesheet">
    <link href="{{ asset('aaa/doctor/vendor/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- Argon CSS -->
    <link href="{{ asset('/aaa/doctor/css/argon.css') }}" rel="stylesheet">
    <!-- Docs CSS -->
    <link href="{{ asset('aaa/doctor/css/docs.min.css') }}" rel="stylesheet">

</head>

<body>
@include('inc.navbar')
<main>
    <section class="section section-shaped section-lg">
        <div class="shape shape-style-1 bg-gradient-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>


        <div class="container pt-lg-md">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="card bg-secondary shadow-lg border-0">
                        <div class="card-body px-lg-5 py-lg-5">
                            <form method="POST" action="{{ url('register') }}">
                                @csrf
                                <div class="text-center text-muted mb-4">
                                    <small>Register</small>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 required">
                                        <div class="form-group">
                                            <input id="name" placeholder="First Name" type="text" MAXLENGTH="30"
                                                   class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}"
                                                   name="first_name" value="{{ old('first_name') }}" required autofocus>
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 required">
                                        <div class="form-group required">
                                            <input id="name" placeholder="Last Name" type="text" MAXLENGTH="30"
                                                   class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}"
                                                   name="last_name" value="{{ old('last_name') }}" required autofocus>
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 required">
                                        <div class="form-group required">
                                            <input id="name" placeholder="Phone Number" type="number" class="form-control
                                            {{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}
                                                    " required autofocus>
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('phone') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 required">
                                        <div class="form-group">
                                            <input id="email" placeholder="E-mail Address" type="email" class="form-control
                                            {{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                                                   value="{{ old('email') }}" required>
                                            @if ($errors->has('email'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 required">
                                        <div class="form-group">
                                            <input id="password" placeholder="Password" type="password"
                                                   class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                                                   name="password" required>
                                            @if ($errors->has('password'))
                                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4 required">
                                        <div class="form-group">
                                            <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required>
                                        </div>
                                    </div>

                                </div>



                                {{--PASSWORD STRENGTH--}}
                                {{--<div class="text-muted font-italic">--}}
                                {{--<small>password strength:--}}
                                {{--<span class="text-success font-weight-700">strong</span>--}}
                                {{--</small>--}}
                                {{--</div>--}}
                                <br><br>
                                <div class="form-group">
                                    <div class="g-recaptcha" align="center"
                                         data-sitekey="6Lfj6XAUAAAAAP9Mkg2ajxaSAZy0LaV-TS_BcnlK" style="display: block">
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary mt-4">{{ __('Register') }}</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>
</main>


<footer class="footer">
    <div class="container">
        <hr>
        <div class="row align-items-center justify-content-md-between">
            <div class="col-md-6">
                <div class="copyright">
                    &copy; 2019
                    <a href="https://www.creative-tim.com" target="_blank">Rhea</a>.
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

<script src='https://www.google.com/recaptcha/api.js'></script>
<!-- Core -->
<script src="{{asset('aaa/doctor/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('aaa/doctor/vendor/popper/popper.min.js')}}"></script>
<script src="{{asset('aaa/doctor/vendor/bootstrap/bootstrap.min.js')}}"></script>
<script src="{{asset('aaa/doctor/vendor/headroom/headroom.min.js')}}"></script>
<!-- Argon JS -->
<script src="{{asset('aaa/doctor/js/argon.js?v=1.0.1')}}../assets/"></script>

<script src="{{asset('js/register.js')}}"></script>
</body>

</html>