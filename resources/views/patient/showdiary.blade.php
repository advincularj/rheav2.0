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
                        <div class="card">
                            <div class="card-body">

                                <a href="diary" class="btn btn-default">Go Back</a>
                                <h1>{{$pregnancydiary->title}}</h1>
                                <img style="width:100%" src="/storage/cover_images/{{$pregnancydiary->cover_image}}" class="image-responsive"/>
                                <br>
                                <div>
                                    {!!$pregnancydiary->title!!}
                                </div>
                                <br>
                                <div>
                                    {!!$pregnancydiary->body!!}
                                </div>
                                <hr>
                                <small>Written on {{$pregnancydiary->created_at}}</small>

                                <hr>
                                @if(!Auth::guest())
                                    @if(Auth::user()->id == $pregnancydiary->userid)

                                        <a href="/diary/{{$pregnancydiary->id}}/edit" class="btn btn-default">Edit</a>


                                        <form action="{{action('PregnancyDiariesController@destroy', $pregnancydiary->id)}}" method="POST" class="pull-right">
                                            {{Form::hidden('_method', 'DELETE')}}
                                            @csrf
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>


                                        {!!Form::open(['action' => ['PregnancyDiariesController@destroy', $pregnancydiary->id], 'method' => 'POST', 'class' => 'pull-right'])!!}




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