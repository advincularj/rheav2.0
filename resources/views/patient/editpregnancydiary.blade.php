@extends('patient.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Edit Note
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
            <form method="post" action="{{ route('pregnancydiaries.update', $diaries->id) }}">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <label for="name">Note: </label>
                    <input type="text" class="form-control" name="note" value={{ $diaries->note }} />
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
    @endsection