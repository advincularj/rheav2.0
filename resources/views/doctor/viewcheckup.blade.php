@extends('doctor.layouts.app')

@section('content')
    @include('doctor.inc.messages')
    <div class="container-fluid mt--8">
        <div class="card">
            <div class="card-header">
                Check up Records
                <div class="w3-show-inline-block offset-8">
                    <a href="/checkup/{{$id}}" class="btn btn-default">Add Check-up Record</a>
                    <a href="/patients" class="btn btn-default">Go Back</a>
                </div>
            </div>
            <table class="table table-striped table-responsive">
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
    </div>
@endsection


