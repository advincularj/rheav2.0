@extends('layouts.app')

@section('content')
    <div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            {{--@include('inc.messages')--}}
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            {{--@include('inc.messages')--}}

                            {{--HERE IS THE START--}}
                            <div class="card">
                                <div class="card-header">{{ __('Reset Password') }}</div>

                                <div class="card-body">
                                    <form method="post" action="{{URL::to('/forgotpassword/save')}}" id="form">
                                        @if($errors->any())
                                            <div class="alert alert-warning">
                                                @foreach($errors->all() as $error)

                                                    {{$error}}

                                                @endforeach

                                            </div>
                                        @endif
                                        <div class="form-group">
                                            <input type="password" placeholder="New Password" name="password"
                                                   class="form-control input-rounded">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" placeholder="Confirm Password"
                                                   name="password_confirmation"
                                                   class="form-control input-rounded">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" id="button" onclick="return confirm('Are you sure?')"
                                                    class="btn btn-primary btn-rounded">Submit
                                            </button>
                                            <input type="hidden" name="emailAddress" value="{{ $email }}">
                                            <input type="hidden" name="_token" value="{{ Session::token() }}">
                                        </div>
                                    </form>
                                </div>
                            </div>
                            {{--END--}}

                        </div>
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>

@endsection