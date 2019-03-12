@extends('patient.layouts.app')

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
            </div>

            @include('patient.inc.messages')
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-10">
                            <!-- Main content -->

                            <!-- Page content -->
                            <div class="container-fluid mt--8">
                                <!-- Table -->
                                <div class="row">
                                    <div class="col">
                                        <div class="card shadow">
                                            <div class="card-header border-0">
                                                <h3 class="mb-0" style="text-align: center">Create Diary</h3>
                                            </div>

                                            {{--HERE IS THE START--}}
                                            <div class="container">
                                                {!! Form::open(['action' => 'PregnancyDiariesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                                                <div class="form-group">
                                                    {{Form::label('title', 'Title')}}
                                                    {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::label('body', 'Body')}}
                                                    {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                                                </div>
                                                <div class="form-group">
                                                    {{Form::file('cover_image')}}
                                                </div>
                                                <div class="form-group row col-md-12">
                                                    <button type="submit" class="btn btn-primary">
                                                        {{ __('Submit') }}
                                                    </button>
                                                    <a href="{{ url('/diary') }}" class="btn btn-default">Cancel</a>
                                                </div>
                                                {!! Form::close() !!}
                                                {{--END--}}

                                                <br>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection