@extends('patient.layouts.app')

@section('content')
    <style>
        .uper {
            margin-top: 40px;
        }
    </style>
    <div class="card uper">
        <div class="card-header">
            Add Note
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
            <form method="post" action="{{ route('pregnancydiaries.store') }}">
                <div class="form-group">
                    @csrf
                    <label for="name">Note:</label>
                    <input type="longtext" class="form-control" name="note"/>
                </div>

                <button type="submit" class="btn btn-primary">Add Note</button>
            </form>
        </div>
    </div>
@endsection