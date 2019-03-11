@extends('doctor.layouts.app')

@section('content')

    {{--@include('doctor.inc.messages')--}}
    <div class="container-fluid mt--8">

        <div class="card">
            <div class="card-header">
                Add Check up Record for Patient ID: {{$id}}
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('checkuprecords.store') }}">
                    <div class="form-group">
                        @csrf
                        <input type="hidden" name="patient_id" value="{{$id}}">
                        <label for="name">IE Findings: </label>
                        <input type="text" class="form-control" name="ieFindings"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Blood Pressure: </label>
                        <input type="text" class="form-control" placeholder="e.g. 100/70" name="bloodPressure"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Height: </label>
                        <input type="text" class="form-control" placeholder="e.g. 163 cm" name="height"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Weight: </label>
                        <input type="text" class="form-control" placeholder="e.g. 53.4 kgs" name="weight"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Heart Tones: </label>
                        <input type="text" class="form-control" placeholder="e.g. S1" name="heartTones"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">AOG: </label>
                        <input type="text" class="form-control" placeholder="e.g. 1 week" name="AOG"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Weight Gain: </label>
                        <input type="text" class="form-control" name="weightGain"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Checkup record</button>
                    <a href="{{ url('/patients') }}" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection