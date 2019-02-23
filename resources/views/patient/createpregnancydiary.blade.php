@extends('patient.layouts.app')

@if (Auth::user()->role_id == 3)
    @include ('patient.inc.navbar')
@else
    @include ('guest.navbar')
@endif

@section('content')
    <div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            @include('patient.inc.messages')
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="card">
                                <div class="card-header">
                                    Add a Diary
                                </div>
                                <div class="card-body">
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
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection