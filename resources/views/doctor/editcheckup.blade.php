@extends('doctor.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <h3 class="mb-0" style="text-align: center">Edit</h3>
                    </div>

                    {{--HERE IS THE START--}}
                    <div class="container">
                        {!! Form::open(['action' => ['PregnancyDiariesController@update', $pregnancydiaries->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        @method('PUT')
                        <div class="form-group">
                            {{Form::label('title', 'Title')}}
                            {{Form::text('title', $pregnancydiaries->title, ['class' => 'form-control', 'placeholder' => 'Title'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('body', 'Body')}}
                            {{Form::textarea('body', $pregnancydiaries->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                        </div>
                        <div class="form-group">
                            {{Form::file('cover_image')}}
                        </div>
                        {{--Hindi pweds gawing 'PUT' and 'POST' method--}}
                        {{Form::hidden('_method','PUT')}}
                        {{--{{Form::submit('Submit', ['class'=>'btn btn-primary'])}}--}}
                        {{--{!! Form::close() !!}--}}
                        <div class="form-group row col-md-12">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Submit') }}
                            </button>
                            <a href="/indexnote" class="btn btn-default">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                        {{--END--}}

                        <br>
                    </div>

                </div>
            </div>
        </div>

        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md" class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
@endsection