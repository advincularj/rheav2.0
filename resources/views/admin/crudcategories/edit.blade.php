@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <div class="row">
            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-5">
                            </div>
                            {!! Form::open(['action' => ['MaternalGuideCategoryController@update', $category->id] , 'method' => 'post','enctype' => 'multipart/form-data']) !!}
                            <h2 class="form-group col-md-9">Update Category</h2>
                            <div class="form-group col-md-9">
                                {{ Form::label('name', 'Name:') }}
                                {{ Form::text('name', $category->name, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-9">
                                {{Form::file('cover_image')}}
                            </div>
                            {{--Hindi pweds gawing 'PUT' and 'POST' method--}}
                            {{Form::hidden('_method','PUT')}}

                            <div class="form-group col-md-9">
                                {{ Form::submit('Update', ['class' => 'btn btn-primary']) }}
                                <a href="{{ url('/categories') }}" class="btn btn-default">Cancel</a>
                            </div>
                            {{--END--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
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
