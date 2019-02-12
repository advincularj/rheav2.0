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
                        <div class="col-md-8">

                            {{--HERE IS THE START--}}
                            <div class="card">
                                <div class="card-header">Dashboard</div>
                                <div class="card-body">

                                    <div class="col-sm-12 col-md-12">
                                        <div class="thumbnail">
                                            <h3 align="center">{{ucwords(Auth::user()->name)}}</h3>
                                            <img src="/uploads/avatar/{{Auth::user()->avatar }}"
                                                 style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                            <div class="caption">
                                                <br>
                                                <br>
                                                <br>
                                                <br>
                                                <p align="right"><a href="/changePhoto" class=" btn btn-sm btn-primary"
                                                                    role="button">Change Image</a></p>
                                            </div>
                                        </div>
                                    </div>

                                    <br>
                                    <form action="{{url('/settings')}}" method="post">
                                        @csrf
                                        <div class="col-sm-12 col-md-12">

                                            <br>
                                            <br>
                                            <br>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">First Name</span>
                                                    <input type="text" class="form-control" placeholder="First Name"
                                                           name="user[first_name]"
                                                           value="{{ old('first_name')}}{{$user->first_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Last Name</span>
                                                    <input type="text" class="form-control" placeholder="Last Name"
                                                           name="user[last_name]"
                                                           value="{{ old('last_name')}}{{$user->last_name}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-12">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Address</span>
                                                    <textarea type="text" class="form-control"
                                                              name="address">{{ old('address') }}{{($data == null) ? '' : $data->address}}</textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Contact Number</span>
                                                    <input type="text" class="form-control" placeholder="Contact Number"
                                                           name="number"
                                                           value="{{ old('number') }}{{($data == null) ? '' : $data->number}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Expected Date of Delivery</span>
                                                    <input type="text" class="form-control"
                                                           placeholder="Expected Date of Delivery" name="edod"
                                                           value="{{ old('edod') }}{{($data == null) ? '' : $data->edod}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Allergies</span>
                                                    <input type="text" class="form-control" placeholder="Allergies"
                                                           name="allergies"
                                                           value="{{ old('allergies') }}{{($data == null) ? '' : $data->allergies}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Blood Type</span>
                                                    <input type="text" class="form-control" placeholder="Blood Type"
                                                           name="bloodtype"
                                                           value="{{ old('bloodtype') }}{{($data == null) ? '' : $data->bloodtype}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Hospital/Clinic</span>
                                                    <input type="text" class="form-control"
                                                           placeholder="Hospital/Clinic" name="clinic"
                                                           value="{{ old('clinic') }}{{($data == null) ? '' : $data->clinic}}">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <span id="basic-addon1">Attending Physician</span>
                                                    <input type="text" class="form-control" placeholder="Doctor"
                                                           name="doctor"
                                                           value="{{ old('doctor') }}{{($data == null) ? '' : $data->doctor}}">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="form-group">
                                                <input type="submit" class="btn btn-success pull-right">
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
    </div>
    {{--</section>--}}
    {{--</div>--}}
    <!-- 1st Hero Variation -->
    </div>
@endsection
