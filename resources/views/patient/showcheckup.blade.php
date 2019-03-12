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
                                {{--<img style="width:100%" src="/storage/cover_images/{{$checkuprecords->cover_image}}" class="image-responsive"/>--}}
                                <br>
                                <br>
                                <div>
                                    <h2>{!!$checkuprecords->dropdown!!}</h2>
                                </div>
                                <div>
                                    IE Findings: <strong>{!!$checkuprecords->ieFindings!!}</strong>
                                </div>
                                <div>
                                    Blood Pressure: <strong>{!!$checkuprecords->bloodPressure!!}</strong>
                                </div>
                                <div>
                                    Height: <strong>{!!$checkuprecords->height!!}</strong>
                                </div>
                                <div>
                                    Weight: <strong>{!!$checkuprecords->weight!!}</strong>
                                </div>
                                <div>
                                    AOG: <strong>{!!$checkuprecords->AOG!!}</strong>
                                </div>
                                <div>
                                    Weight Gain: <strong>{!!$checkuprecords->weightGain!!}</strong>
                                </div>
                                <div>
                                    Doctor's Checklist: <strong>{!!$checkuprecords->checkbox!!}</strong>
                                </div>
                                <hr>
                                <div>
                                    <small>By Doctor <a href="/doctorprof/{{$checkuprecords->doctors->id}}"> {{$checkuprecords->doctors->first_name }} {{$checkuprecords->doctors->last_name }}</a></small>
                                </div>
                                <div>
                                    <small>Written on: {{$checkuprecords->created_at}}</small>
                                </div>
                                {{--<hr>--}}
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $checkuprecords->userid)

                                    @endif
                                @endif

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
