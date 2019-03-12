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
        <div class="container py-lg-md d-flex">
            <div class="col px-0">
                <div class="row justify-content-center">
                    <div class="col-md-8">

                        <a href="{{ url('/diary') }}" class="btn btn-default">Go Back</a>
                        <h1>{{$pregnancydiary->title}}</h1>
                        <img style="width:100%" src="/storage/cover_images/{{$pregnancydiary->cover_image}}"
                             class="image-responsive"/>
                        <br>
                        <br>
                        <div class="card">
                            <div class="card-body py--5">
                                <textarea onkeyup="textAreaAdjust(this)" style="overflow:hidden">
                                    {!!$pregnancydiary->body!!}
                                </textarea>
                                {{--<hr>--}}
                        </br>
                                <small>Written on {{$pregnancydiary->created_at}}</small>

                            {{--</div>--}}
                        </div>
                        <br>
                        {{--<hr>--}}
                        @if(!Auth::guest())
                            @if(Auth::user()->id == $pregnancydiary->userid)

                                <a href="/diary/{{$pregnancydiary->id}}/edit" class="btn btn-default">Edit</a>


                                <form action="{{action('PregnancyDiariesController@destroy', $pregnancydiary->id)}}"
                                      method="POST" class="pull-right">
                                    {{Form::hidden('_method', 'DELETE')}}
                                    @csrf
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                                {!!Form::open(['action' => ['PregnancyDiariesController@destroy', $pregnancydiary->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                            @endif
                        @endif
                        {{--END--}}

                    </div>
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

@endsection