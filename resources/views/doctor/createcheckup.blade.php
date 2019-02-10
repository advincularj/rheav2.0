@extends('doctor.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card upper">
        <div class="card-header">
            Add Check up Record
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div><br />
            @endif
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
            </form>
        </div>
    </div>
@endsection