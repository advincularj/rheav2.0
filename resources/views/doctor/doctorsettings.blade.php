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

            <div class="container-fluid mt--8">
                <div class="col-lg-12">

                    {{--HERE IS THE START--}}
                    <div class="card">
                        <div class="card-header">Edit Profile</div>
                        <div class="card-body">
                            <form action="{{url('/doctorsettings')}}" method="post">
                                @csrf
                            {{--@if(session('success'))--}}
                            {{--<div class="alert alert-success">--}}
                            {{--{{session('success')}}--}}
                            {{--</div>--}}
                            {{--@endif--}}
                            <div class="row">

                                <div class="col-sm-6 required">
                                    <div class="form-group">
                                        <div class="thumbnail">
                                            <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                                            <img src="/uploads/image/{{Auth::user()->image }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                            <div class="caption">
                                                <br>
                                                <br>
                                                <br>
                                                <p align="right">  <a href="/changePic"  class=" btn btn-sm btn-primary" role="button">Change Image</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    {{--<form action="{{url('/doctorsettings')}}" method="post">--}}
                                        {{--@csrf--}}
                                        <div class="form-group">
                                            <span  id="basic-addon1">First Name</span>
                                            <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name" name="user[first_name]" value="{{ old('first_name')}}{{$user->first_name}}">
                                            @if ($errors->has('first_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('first_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <span  id="basic-addon1">Last Name</span>
                                            <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last Name" name="user[last_name]" value="{{ old('last_name')}}{{$user->last_name}}">
                                            @if ($errors->has('last_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <span  id="basic-addon1">Phone Number</span>
                                            <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Phone Number" name="user[phone]" value="{{ old('phone')}}{{$user->phone}}">
                                            @if ($errors->has('phone'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <span  id="basic-addon1">About</span>
                                            <textarea type="text" class="form-control{{ $errors->has('about') ? ' is-invalid' : '' }}" name="about">{{ old('about') }}{{($data == null) ? '' : $data->about}}</textarea>
                                            @if ($errors->has('about'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('about') }}</strong>
                                                </span>
                                            @endif
                                        </div>

                                        <div class="form-group">
                                            <span  id="basic-addon1">Address</span>
                                            <input type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" placeholder="Address" name="address" value="{{ old('address') }}{{($data == null) ? '' : $data->address}}">
                                            @if ($errors->has('address'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                            @endif
                                        </div>


                                </div>
                                <div class="col-sm-6 required">
                                    <div class="form-group">
                                        <span  id="basic-addon1">Services</span>
                                        <input type="text" class="form-control{{ $errors->has('services') ? ' is-invalid' : '' }}" placeholder="Services" name="services" value="{{ old('services') }}{{($data == null) ? '' : $data->services}}">
                                        @if ($errors->has('services'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('services') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <span  id="basic-addon1">Specialization</span>
                                        <input type="text" class="form-control{{ $errors->has('specialization') ? ' is-invalid' : '' }}" placeholder="Specialization" name="specialization" value="{{ old('specialization') }}{{($data == null) ? '' : $data->specialization}}">
                                        @if ($errors->has('specialization'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('specialization') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <span  id="basic-addon1">Education</span>
                                        <input type="text" class="form-control{{ $errors->has('education') ? ' is-invalid' : '' }}" placeholder="Education" name="education" value="{{ old('education') }}{{($data == null) ? '' : $data->education}}">
                                        @if ($errors->has('education'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('education') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <div class="form-group">
                                        <span  id="basic-addon1">Experiences</span>
                                        <input type="text" class="form-control{{ $errors->has('experience') ? ' is-invalid' : '' }}" placeholder="Experiences" name="experience" value="{{ old('experience') }}{{($data == null) ? '' : $data->experience}}">
                                        @if ($errors->has('experience'))
                                            <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('experience') }}</strong>
                                                </span>
                                        @endif
                                    </div>
                                    <br>

                                    <div class="form-group">
                                        <input type="submit" class="btn btn-success pull-right" >
                                        <a href="/doctorprofile" class="btn btn-default">Cancel</a>
                                        <p align="right">  <a href="/changePassword"  class=" btn btn-sm btn-primary" role="button">Change Password</a></p>


                                    </div>
                                </div>



                            </div>
                            </form>
                                {{--END--}}

                            </div>
                        </div>
                        </div>
                    </div>


        </section>
    </div>
    </section>
    </div>
    <!-- 1st Hero Variation -->
    </div>
@endsection