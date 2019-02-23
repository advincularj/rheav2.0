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
                        <div class="col-md-12">

                            {{--HERE IS THE START--}}
                            <h1>Articles</h1>
                            <a href="{{url('diary/create')}}" class="btn btn-success">Add Diary</a>
                            <div class="row row-grid">
                                @if (count($pregnancydiaries) > 0)
                                    @foreach($pregnancydiaries as $pregnancydiarie)
                                        <div class="col-lg-4">
                                            <br>
                                            <div class="card card-lift--hover shadow border-0">
                                                <div class="card-body py-5">
                                                    <div>

                                                        <img style="width:100%;"
                                                             src="/storage/cover_images/{{$pregnancydiarie->cover_image}}"/>
                                                        {{--                                                        <img style="width:100%; height: 140px !important; margin: 0 auto 1em auto;" src="/storage/cover_images/{{$guide->cover_image}}"/>--}}
                                                    </div>
                                                    <h3><a href="/diary/{{$pregnancydiarie->id}}">{{$pregnancydiarie->title}}</a></h3>
                                                    <div>
                                                        <small>Written on {{$pregnancydiarie->created_at}} </small>
                                                    </div>
                                                    {{--<div>--}}
                                                    {{--<small>by {{$guide->user->first_name }} {{$guide->user->last_name }}</small>--}}
                                                    {{--</div>--}}
                                                    <a href="/diary/{{$pregnancydiarie->id}}" class="btn btn-primary mt-4">Learn
                                                        more</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                @else
                                    <p>No maternal guide found</p>
                                @endif
                                {{--END--}}
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="pull-right">
                        {{$pregnancydiaries->links()}}
                    </div>
                </div>
            </div>
            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>
@endsection