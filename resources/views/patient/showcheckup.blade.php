@extends('patient.layouts.app')

@if (Auth::user()->role_id == 3)
    @include ('patient.inc.navbar')
@else
    @include ('guest.navbar')
@endif


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
        <div class="container py-lg-md d-flex">
            <div class="col px-0">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">

                                <a href="diary" class="btn btn-default">Go Back</a>
                                <h1>{{$checkuprecords->title}}</h1>
                                <img style="width:100%" src="/storage/cover_images/{{$checkuprecords->cover_image}}" class="image-responsive"/>
                                <br>
                                <br>
                                <div>
                                    {!!$checkuprecords->ieFindings!!}
                                </div>
                                <div>
                                    {!!$checkuprecords->bloodPressure!!}
                                </div>
                                <div>
                                    {!!$checkuprecords->height!!}
                                </div>
                                <div>
                                    {!!$checkuprecords->weight!!}
                                </div>
                                <div>
                                    {!!$checkuprecords->AOG!!}
                                </div>
                                <div>
                                    {!!$checkuprecords->weightGain!!}
                                </div>
                                <hr>
                                <small>Written on {{$checkuprecords->created_at}}</small>

                                <hr>
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
