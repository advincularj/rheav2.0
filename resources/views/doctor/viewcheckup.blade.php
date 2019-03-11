@extends('doctor.layouts.app')

@section('content')
    {{--@include('doctor.inc.messages')--}}
    <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-3">
                                <h3>Check up Records</h3>
                            </div>
                            {{--<div class="element2 col-md-2 offset-md-6">--}}
                                {{--<div class="w3-show-inline-block offset-8">--}}
                                    {{--<div class="w3-bar">--}}
                                    {{--<a href="/checkup/{{$id}}" class="btn btn-default">Add Check-up Record</a>--}}
                                    {{--<a href="/patients" class="btn btn-default">Go Back</a>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            <div class="w3-show-inline-block offset-5">
                                <div class="w3-bar">
                                    <a href="/checkup/{{$id}}" class="btn btn-default">Add Check-up Record</a>
                                    <a href="{{ url('/patients') }}" class="btn btn-default">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($checkuprecords) > 0)
                    <table class="table align-items-center table-striped">
                        <thead class="thead-light">
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
                                    <form action="{{ route('checkuprecords.destroy', $checkuprecord->id)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @else
                        <p style="text-align: center">There are no checkuprecords</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection


