@extends('doctor.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Share
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
            <form method="resource" action="{{ route('checkuprecords.edit', $checkuprecord->id) }}">
                @method('PATCH')
                @csrf
                <div class="form-group">
                    <label for="name">IE Findings: </label>
                    <input type="text" class="form-control" name="ieFindings" value={{ $checkuprecord->ieFindings }} />
                </div>
                <div class="form-group">
                    <label for="name">Blood Pressure: </label>
                    <input type="text" class="form-control" name="bloodPressure" value={{ $checkuprecord->bloodPressure }} />
                </div>
                <div class="form-group">
                    <label for="name">Height: </label>
                    <input type="text" class="form-control" name="height" value={{ $checkuprecord->height }} />
                </div>
                <div class="form-group">
                    <label for="name">Weight: </label>
                    <input type="text" class="form-control" name="weight" value={{ $checkuprecord->weight }} />
                </div>
                <div class="form-group">
                    <label for="name">Heart Tones: </label>
                    <input type="text" class="form-control" name="heartTones" value={{ $checkuprecord->heartTones }} />
                </div>
                <div class="form-group">
                    <label for="name">AOG: </label>
                    <input type="text" class="form-control" name="AOG" value={{ $checkuprecord->AOG }} />
                </div>
                <div class="form-group">
                    <label for="name">Weight Gain: </label>
                    <input type="text" class="form-control" name="weightGain" value={{ $checkuprecord->weightGain }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection