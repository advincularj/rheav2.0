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
                <td>IE Findings</td>
                <td>Blood Pressure</td>
                <td>Height</td>
                <td>Weight</td>
                <td>AOG</td>
                <td>Weight Gain</td>
                <td colspan="2">Action</td>
            </tr>
            </thead>
            <tbody>
            @foreach($checkuprecords as $checkuprecord)
                <tr>
                    <td>{{$checkuprecord->id}}</td>
                    <td>{{$checkuprecord->ieFindings}}</td>
                    <td>{{$checkuprecord->bloodPressure}}</td>
                    <td>{{$checkuprecord->height}}</td>
                    <td>{{$checkuprecord->weight}}</td>
                    <td>{{$checkuprecord->AOG}}</td>
                    <td>{{$checkuprecord->weightGain}}</td>
                    {{--<td><a href="{{ route('checkuprecords.edit',$checkuprecord->id)}}" class="btn btn-primary">Edit</a></td>--}}
                    <td>
                        <form action="{{ route('checkuprecords.destroy', $checkuprecord->id)}}" method="post">
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