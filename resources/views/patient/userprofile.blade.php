@extends('patient.layouts.app')

@if (Auth::user()->role_id == 3)
    @include ('patient.inc.navbar')
@else
    @include ('guest.navbar')
@endif

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


                                    <h3>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h3>
                                    <img src="/uploads/image/{{Auth::user()->image }}" style="width:120px; height:120px; float:left; border-radius:50%; margin-right:25px; ">
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
                                                <h2>{{ old('address') }}{{($data == null) ? '' : $data->address}}</h2>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Contact Number</span>
                                                <h2>{{ old('number') }}{{($data == null) ? '' : $data->number}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Expected Date of Delivery</span>
                                                <h2>{{ old('edod') }}{{($data == null) ? '' : $data->edod}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Allergies</span>
                                                <h2>{{ old('allergies') }}{{($data == null) ? '' : $data->allergies}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Blood Type</span>
                                                <h2>{{ old('bloodtype') }}{{($data == null) ? '' : $data->bloodtype}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Hospital/Clinic</span>
                                                <h2>{{ old('clinic') }}{{($data == null) ? '' : $data->clinic}}</h2>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <span  id="basic-addon1">Attending Physician</span>
                                                <h2>{{ old('doctor') }}{{($data == null) ? '' : $data->doctor}}</h2>
                                            </div>
                                        </div>
                                        <br>

                                        <script src="https://js.pusher.com/4.2/pusher.min.js"></script>
                                        <!-- Alert whenever a new notification is pusher to our Pusher Channel -->
                                        <script>
                                            //Remember to replace key and cluster with your credentials.
                                            var pusher = new Pusher('6ef31bbfd6a4f31ed06a', {
                                                cluster: 'ap1',
                                                encrypted: true
                                            });

                                            //Also remember to change channel and event name if your's are different.
                                            var channel = pusher.subscribe('notification');
                                            channel.bind('notification-event', function(message) {
                                                alert(message);
                                            });

                                        </script>
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
