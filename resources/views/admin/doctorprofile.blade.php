@extends('admin.layouts.app')

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

            <div class="container-fluid mt--8">
                <div class="col-lg-10 center">

                    {{--HERE IS THE START--}}
                    <form class="card">
                        <div class="card-header">
                            <div class="row mb-0">
                                <div class="element1 col-md-4">
                                    <h2>Doctor Profile</h2>
                                </div>
                                <div class="w3-show-inline-block offset-6">
                                    <a href="/users" class="btn btn-default">Go Back</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
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
                        {{--</div>--}}
                    </form>
                </div>
            </div>
            {{--END--}}


        </section>
    </div>

    <!-- 1st Hero Variation -->

@endsection