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

            @include('inc.messages')
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                        <div class="row justify-content-center">
                            <div class="col-md-8">

                                {{--HERE IS THE START--}}
                                <div class="card">
                                    <div class="card-header">Dashboard</div>

                                    <div class="card-body">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif

                                        <h3>Your Blog Posts</h3>
                                        <a href="/posts/create" class="btn btn-primary">Create Post</a>
                                            <br>
                                            <br>
                                        @if(count($posts) > 0)
                                            <table class="table table-striped">
                                                <tr>
                                                    <th>Title</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                                @foreach($posts as $post)
                                                    <tr>
                                                        <td>{{$post->title}}</td>
                                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-default">Edit</a> </td>
                                                        <td>
                                                            {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                                            {!!Form::open(['action' => ['PostsController@destroy', $post->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                                            {{Form::hidden('_method', 'DELETE')}}
                                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                                            {!! Form::close() !!}
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </table>
                                        @else
                                            <p>You have no posts</p>
                                        @endif
                                    </div>
                                </div>
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
