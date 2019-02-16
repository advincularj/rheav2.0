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

            @include('doctor.inc.messages')
            <div class="container-fluid mt--8">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            {{--HERE IS THE START--}}
                            <div class="card">
                                <div class="card-header">Edit Profile</div>
                                <div class="card-body">

                                    <div class="col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                                            <img src="/uploads/avatar/{{Auth::user()->avatar }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                            <div class="caption">
                                                <br>
                                                <br>
                                                <br>
                                                <p align="right">  <a href="/changePic"  class=" btn btn-sm btn-primary" role="button">Change Image</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <form action="/doctorsettings" method="post">
                                            @csrf
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span  id="basic-addon1">First Name</span>
                                                    <input type="text" class="form-control" placeholder="First Name" name="user[first_name]" value="{{ old('first_name')}}{{$user->first_name}}">
                                                </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Last Name</span>
                                                <input type="text" class="form-control" placeholder="Last Name" name="user[last_name]" value="{{ old('last_name')}}{{$user->last_name}}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">About</span>
                                                <textarea type="text" class="form-control" name="about">{{ old('about') }}{{($data == null) ? '' : $data->about}}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Address</span>
                                                <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address') }}{{($data == null) ? '' : $data->address}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Services</span>
                                                <input type="text" class="form-control" placeholder="Services" name="services" value="{{ old('services') }}{{($data == null) ? '' : $data->services}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Specialization</span>
                                                <input type="text" class="form-control" placeholder="Specialization" name="specialization" value="{{ old('specialization') }}{{($data == null) ? '' : $data->specialization}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Education</span>
                                                <input type="text" class="form-control" placeholder="Education" name="education" value="{{ old('education') }}{{($data == null) ? '' : $data->education}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Experiences</span>
                                                <input type="text" class="form-control" placeholder="Experiences" name="experience" value="{{ old('experiences') }}{{($data == null) ? '' : $data->experiences}}">
                                            </div>
                                        </div>
                                        <br>

                                        <div class="form-group">
                                            <input type="submit" class="btn btn-success pull-right" >
                                            <a href="/doctorprofile" class="btn btn-default">Cancel</a>
                                            <p align="right">  <a href="/changePassword"  class=" btn btn-sm btn-primary" role="button">Change Password</a></p>
                                        </div>
                                        </form>
                                    </div>
                                    {{--END--}}

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
        <!-- 1st Hero Variation -->
    </div>
@endsection
