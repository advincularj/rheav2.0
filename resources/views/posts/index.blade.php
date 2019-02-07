@extends('layouts.app')

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
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-8">

                            {{--HERE IS THE START--}}
                            <h1>Posts</h1>
                            @if (count($posts) > 0)
                                @foreach($posts as $post)
                                    <div class="well">
                                        <div class="row">
                                            <div class="col-md-4 col-sm-4">
                                                <img style="width:100%" src="/storage/cover_images/{{$post->cover_image}}"/>
                                            </div>
                                            <div class="col-md-8 col-sm-8">
                                                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                                                <small>Written on {{$post->created_at}} by {{$post->user->name}}</small>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{$posts->links()}}
                            @else
                                <p>No Posts found</p>
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