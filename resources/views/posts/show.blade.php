@extends('layouts.app')

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

                        {{--HERE IS THE START--}}
                        <a href="/posts" class="btn btn-default">Go Back</a>
                        <h1>{{$post->title}}</h1>
                        <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}">
                        <br>
                        <br>
                        <div>
                            {!!$post->body!!}
                        </div>
                        <hr>
                        <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                        <hr>
                        @if(!Auth::guest())
                            @if(Auth::user()-> id == $post->user_id)
                                {{--Edit Button--}}
                                <a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a>

                                {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                {{Form::hidden('_method', 'DELETE')}}
                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                {!! Form::close() !!}
                            @endif
                        @endif
                        {{--END--}}

                    </div>
                </div>
            </div>
        </div>
        <!-- SVG separator -->
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>
    <!-- 1st Hero Variation -->
    </div>
@endsection