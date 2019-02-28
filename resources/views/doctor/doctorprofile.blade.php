@extends('doctor.layouts.app')

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

            {{--@include('doctor.inc.messages')--}}
            <div class="container-fluid mt--8">
                <div class="col-lg-10 center">

                    {{--HERE IS THE START--}}
                    <form class="card">
                        <div class="card">
                            <div class="card-header">My Profile</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6 required">
                                        <div class="form-group">
                                            <div class="thumbnail">
                                                <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                                <img src="/uploads/image/{{Auth::user()->image }}"
                                                     style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                            </div>
                                        </div>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <br>
                                        <div class="form-group">
                                            <span id="basic-addon1">About</span>
                                            <h2>{{ old('about') }}{{($data == null) ? '' : $data->about}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Address</span>
                                            <h2>{{ old('address') }}{{($data == null) ? '' : $data->address}}</h2>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span id="basic-addon1">Services</span>
                                            <h2>{{ old('services') }}{{($data == null) ? '' : $data->services}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Specialization</span>
                                            <h2>{{ old('specialization') }}{{($data == null) ? '' : $data->specialization}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Education</span>
                                            <h2>{{ old('education') }}{{($data == null) ? '' : $data->education}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Experiences</span>
                                            <h2>{{ old('experience') }}{{($data == null) ? '' : $data->experience}}</h2>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--END--}}


        </section>
    </div>

    <!-- 1st Hero Variation -->


@endsection
