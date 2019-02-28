@extends('patient.layouts.app')

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

            @include('patient.inc.messages')
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            {{--HERE IS THE START--}}
                            <div class="card">
                                <div class="card-header">My Profile </div>

                                <div class="card-body">
                                    <img src="/uploads/image/{{Auth::user()->image }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                    <form enctype="multipart/form-data" action="/uploadPhoto" method="POST">
                                        <label>Update Profile Picture</label><br>
                                        <input type="file" name="image"><br>
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}"><br><br><br>
                                        <input type="submit" class="pull-right btn btn-sm btn-primary">

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
