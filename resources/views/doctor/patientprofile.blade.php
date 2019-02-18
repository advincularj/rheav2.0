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
                        <div class="col-md-10">

                            <div class="card">
                                <div class="card-header">My Profile </div>
                                <div class="w3-show-inline-block offset-7">
                                    <a href="/checkup" class="btn btn-default">Add Check-up Record</a>
                                    <a href="/patients" class="btn btn-default">Go Back</a>
                                </div>
                                <div class="card-body">


                                    <h3>{{ $user->patient->first_name }} {{ $user->patient->last_name }}</h3>
                                    <img src="/uploads/avatar/{{ $user->patient->avatar }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <div class="col-sm-12 col-md-12">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Address</span>
                                                <h2>{{ old('address') }}{{($user == null) ? '' : $user->patient->userprofile->address}}</h2>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Contact Number</span>
                                                <h2>{{ old('number') }}{{($user == null) ? '' : $user->patient->userprofile->number}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Expected Date of Delivery</span>
                                                <h2>{{ old('edod') }}{{($user == null) ? '' : $user->patient->userprofile->edod}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Allergies</span>
                                                <h2>{{ old('allergies') }}{{($user == null) ? '' : $user->patient->userprofile->allergies}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Blood Type</span>
                                                <h2>{{ old('bloodtype') }}{{($user == null) ? '' : $user->patient->userprofile->bloodtype}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Hospital/Clinic</span>
                                                <h2>{{ old('clinic') }}{{($user == null) ? '' : $user->patient->userprofile->clinic}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Attending Physician</span>
                                                <h2>{{ old('doctor') }}{{($user == null) ? '' : $user->patient->userprofile->doctor}}</h2>
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