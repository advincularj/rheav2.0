@extends('doctor.layouts.app')

@section('content')

    @include('doctor.inc.messages')
    <div class="container-fluid mt--8">

        <div class="card">
            <div class="card-header">
                Add Check up Record
            </div>
            <div class="card-body">

                <form method="post" action="{{ route('checkuprecords.store') }}">
                    <div class="form-group">
                        @csrf
                        <label for="name">IE Findings: </label>
                        <input type="text" class="form-control" name="ieFindings"/>
                    </div>
                    <div class="form-group">
                        <label for="price">Blood Pressure: </label>
                        <input type="text" class="form-control" name="bloodPressure"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Height: </label>
                        <input type="text" class="form-control" name="height"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Weight: </label>
                        <input type="text" class="form-control" name="weight"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Heart Tones: </label>
                        <input type="text" class="form-control" name="heartTones"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">AOG: </label>
                        <input type="text" class="form-control" name="AOG"/>
                    </div>
                    <div class="form-group">
                        <label for="quantity">Weight Gain: </label>
                        <input type="text" class="form-control" name="weightGain"/>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Checkup record</button>
                    <a href="/patientprofile" class="btn btn-default">Cancel</a>
                </form>
            </div>
        </div>
    </div>
@endsection