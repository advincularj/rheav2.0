@extends('layouts.app')

@if (Auth::user()->role_id == 3)
    @include ('patient.inc.navbar')
@else
    @include ('guest.navbar')
@endif

@section('content')
    <h1>{{$title}}</h1>
    <p>This is services page</p>

    {{--@if(count($services) > 0)--}}
        {{--<ul>--}}
            {{--@foreach($services as $service)--}}
                {{--<li>{{$service}}</li>--}}
            {{--@endforeach--}}
        {{--</ul>--}}
    {{--@endif--}}
@endsection

