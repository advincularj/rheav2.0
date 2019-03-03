@extends('admin.layouts.app')

@section('content')
    <a href="/guides" class="btn btn-default">Go Back</a>
    <h1>{{$guide->title}}</h1>
    <img style="width:100%" src="/storage/cover_images/{{$guide->cover_image}}">
    <br>
    <br>
    <div class="card-body">
        <textarea readonly>
            {!!$guide->body!!}
        </textarea>
    </div>
    <hr>
    <small>Written on {{$guide->created_at}} by {{$guide->user->first_name}} {{$guide->user->last_name}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()-> id == $guide->user_id)
            {{--Edit Button--}}
            <a href="/posts/{{$guide->id}}/edit" class="btn btn-default">Edit</a>

            {{--Delete Button - ARCHIVE dapat sa thesis--}}
            {!!Form::open(['action' => ['MaternalGuideController@destroy', $guide->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
            {{Form::hidden('_method', 'DELETE')}}
            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!! Form::close() !!}
        @endif
    @endif
@endsection