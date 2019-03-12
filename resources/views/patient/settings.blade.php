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
            </div>


            <div class="container-fluid mt--8">
                <div class="col-lg-12">

                            {{--HERE IS THE START--}}
                            <div class="card">
                                <div class="card-header">Edit Profile</div>
                                <div class="card-body">
                                    @include('patient.inc.messages')

                                    <div class="row">
                                        <div class="col-sm-6 required">
                                            <div class="form-group">
                                        <div class="thumbnail">
                                            <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                                            <img src="/uploads/image/{{Auth::user()->image }}"
                                                 style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                            <div class="caption">
                                                <br>
                                                <br>
                                                <br>

                                                <p align="right"><a href="{{ url('/changePhoto') }}" class=" btn btn-sm btn-primary"
                                                                    role="button">Change Image</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <form action="{{url('/settings')}}" method="post">
                                        @csrf

                                                <div class="form-group">
                                                    <span id="basic-addon1">First Name</span>
                                                    <input type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" placeholder="First Name"
                                                           name="user[first_name]"
                                                           value="{{ old('first_name')}}{{$user->first_name}}">
                                                    @if ($errors->has('first_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('first_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Last Name</span>
                                                    <input type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" placeholder="Last Name"
                                                           name="user[last_name]"
                                                           value="{{ old('last_name')}}{{$user->last_name}}">
                                                    @if ($errors->has('last_name'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('last_name') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Birth Date</span>
                                                    <input type="date" class="form-control{{ $errors->has('birthdate') ? ' is-invalid' : '' }}"
                                                           placeholder="Birth date" name="birthdate"
                                                           value="{{ old('birthdate') }}{{($data == null) ? '' : $data->birthdate}}">
                                                    @if ($errors->has('birthdate'))
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $errors->first('birthdate') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Address</span>
                                                    <textarea type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}"
                                                              name="address">{{ old('address') }}{{($data == null) ? '' : $data->address}}</textarea>
                                                    @if ($errors->has('address'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('address') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Contact Number</span>
                                                    <input type="number" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="Contact Number (09xxxxxxxxx)"
                                                           name="user[phone]"
                                                           value="{{ old('phone') }}{{$user->phone}}">
                                                    @if ($errors->has('phone'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('phone') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                    </div>
                                        <div class="col-sm-6 required">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Expected Date of Delivery</span>
                                                    <input type="date" class="form-control{{ $errors->has('edod') ? ' is-invalid' : '' }}"
                                                           placeholder="Expected Date of Delivery" name="edod"
                                                           value="{{ old('edod') }}{{($data == null) ? '' : $data->edod}}">
                                                    @if ($errors->has('edod'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('edod') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Allergies</span>
                                                    <input type="text" class="form-control{{ $errors->has('allergies') ? ' is-invalid' : '' }}" placeholder="Allergies"
                                                           name="allergies"
                                                           value="{{ old('allergies') }}{{($data == null) ? '' : $data->allergies}}">
                                                    @if ($errors->has('allergies'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('allergies') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Blood Type</span>
                                                    <input type="text" class="form-control{{ $errors->has('bloodtype') ? ' is-invalid' : '' }}" placeholder="Blood Type"
                                                           name="bloodtype"
                                                           value="{{ old('bloodtype') }}{{($data == null) ? '' : $data->bloodtype}}">
                                                    @if ($errors->has('bloodtype'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('bloodtype') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Hospital/Clinic</span>
                                                    <input type="text" class="form-control{{ $errors->has('clinic') ? ' is-invalid' : '' }}"
                                                           placeholder="Hospital/Clinic" name="clinic"
                                                           value="{{ old('clinic') }}{{($data == null) ? '' : $data->clinic}}">
                                                    @if ($errors->has('clinic'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('clinic') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                                <div class="form-group">
                                                    <span id="basic-addon1">Attending Physician</span>
                                                    <input type="text" class="form-control{{ $errors->has('doctor') ? ' is-invalid' : '' }}" placeholder="Doctor"
                                                           name="doctor"
                                                           value="{{ old('doctor') }}{{($data == null) ? '' : $data->doctor}}">
                                                    @if ($errors->has('doctor'))
                                                        <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('doctor') }}</strong>
                                                </span>
                                                    @endif
                                                </div>
                                            <br>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success pull-left">
                                                <a href="{{ url('/userprofile') }}" class="btn btn-default pull-left">Cancel</a>
                                                <p align="right"><a href="{{ url('/changePass') }}" class=" btn btn-sm btn-primary"
                                                                    role="button">Change Password</a></p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                {{--END--}}

                            </div>
                        </div>
                    </div>
                </div>
                <!-- SVG separator -->
                {{--<div class="separator separator-bottom separator-skew">--}}
                {{--<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">--}}
                {{--<polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>--}}
                {{--</svg>--}}
                {{--</div>--}}
            </div>
        </section>
    {{--</section>--}}
    {{--</div>--}}
    <!-- 1st Hero Variation -->
@endsection
