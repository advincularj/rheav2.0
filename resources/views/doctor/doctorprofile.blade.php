@extends('doctor.layouts.app2')

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
                        <div class="col-md-10">

                            {{--HERE IS THE START--}}
                            <div class="card">
                                <div class="card-header">My Profile </div>
                                <div class="card-body">


                                    <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                    <img src="/uploads/avatar/{{Auth::user()->avatar }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">About</span>
                                                <h2>{{ old('about') }}{{($data == null) ? '' : $data->about}}</h2>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Address</span>
                                                <h2>{{ old('address') }}{{($data == null) ? '' : $data->address}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Services</span>
                                                <h2>{{ old('services') }}{{($data == null) ? '' : $data->services}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Specialization</span>
                                                <h2>{{ old('specialization') }}{{($data == null) ? '' : $data->specialization}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Education</span>
                                                <h2>{{ old('education') }}{{($data == null) ? '' : $data->education}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Experiences</span>
                                                <h2>{{ old('experience') }}{{($data == null) ? '' : $data->experience}}</h2>
                                            </div>
                                        </div>
                                        <br>

                                        </form>

                                    </div>
                                </div>
                                {{--END--}}

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
