@extends('patient.layouts.app')

@section('content')
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
        <div class="container">
            @include('patient.inc.messages')
        </div>
        <div class="container py-lg-md d-flex">
            <div class="col px-0">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <a href="/checkups" class="btn btn-default">Go Back</a>
                                <div class="row">
                                    <div class="col-md-5  offset-1 required">

                                        <div class="form-group">
                                            <div class="thumbnail">
                                                <h3>{{ $user->doctor->first_name ?? "Blank" }} {{ $user->doctor->last_name ?? "Blank"}}</h3>
                                                <img src="/uploads/image/{{ $user->doctor->image ?? ""}}"
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
                                            <h2>{{ old('about') }}{{($user == null) ? '' : $user->doctor->doctorprofile->about}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Address</span>
                                            <h2>{{ old('address') }}{{($user == null) ? '' : $user->doctor->doctorprofile->address}}</h2>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <span id="basic-addon1">Services</span>
                                            <h2>{{ old('services') }}{{($user == null) ? '' :$user->doctor->doctorprofile->services}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Specialization</span>
                                            <h2>{{ old('specialization') }}{{($user == null) ? '' :$user->doctor->doctorprofile->specialization}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Education</span>
                                            <h2>{{ old('education') }}{{($user == null) ? '' : $user->doctor->doctorprofile->education}}</h2>
                                        </div>

                                        <div class="form-group">
                                            <span id="basic-addon1">Experience</span>
                                            <h2>{{ old('experience') }}{{($user == null) ? '' : $user->doctor->doctorprofile->experience}}</h2>
                                        </div>

                                    </div>
                                    <br>
                                </div>
                            </div>

                    </div>
                </div>
            </div>
        </div>
        <!-- SVG separator -->

    </section>
    <!-- 1st Hero Variation -->
    </div>

@endsection
