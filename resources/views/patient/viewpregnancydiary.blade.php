@extends('doctor.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="uper">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br />
        @endif
        <table class="table table-striped">
            <thead>
            <tr>
                <td>ID</td>
                <td>note</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($diaries as $diary)
                <tr>
                    <td>{{$diary->id}}</td>
                    <td>{{$diary->note}}</td>
                    <td><a href="{{ route('pregnancydiaries.edit',$diary->id)}}" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="{{ route('pregnancydiaries.destroy', $diary->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection