@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Maternal Guide Categories Table -->
        <div class="row">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-5">
                                <h2>Maternal Guide Categories</h2>
                            </div>

                            <div class="w3-show-inline-block offset-3">
                            <div class="w3-bar">
                            <a href="/guides" class="btn btn-default">Go Back to Maternal Guide</a>
                            </div>
                            </div>
                        </div>
                    </div>

                    @if(count($categories) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Created At</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($categories as $category)
                                    <tr>
                                        <td>
                                            {{ $category->id}}
                                        </td>
                                        <td>
                                            {{ $category->name}}
                                        </td>
                                        <td>
                                            {{ $category->created_at }}
                                        </td>
                                        <td>
                                            <a href="/categories/{{$category->id}}/edit"
                                               class="btn btn-default">Edit</a>
                                        </td>
                                        {{--<td>--}}
                                            {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                            {{--{!!Form::open(['action' => ['MaternalGuideCategoryController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right', 'enctype' => 'multipart/form-data'])!!}--}}
                                            {{--{{Form::hidden('_method', 'DELETE')}}--}}
                                            {{--{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            @else
                                <p style="text-align: center">You have no categories</p>
                            @endif
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    {{ $categories->links() }}
                                </ul>
                            </nav>
                        </div>
                </div>
            </div> <!-- end of .col-md-8 -->

            <div class="col-md-4">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-4">
                            </div>
                            {!! Form::open(['action' => 'MaternalGuideCategoryController@store', 'method' => 'post']) !!}
                            <h2 class="form-group col-md-9">New Category</h2>
                            <div class="form-group col-md-9">
                                {{ Form::label('name', 'Name:') }}
                                {{ Form::text('name', null, ['class' => 'form-control']) }}
                            </div>
                            <div class="form-group col-md-9">
                                {{Form::file('cover_image')}}
                            </div>
                            <div class="form-group col-md-9">
                            {{ Form::submit('Create New Category', ['class' => 'btn btn-primary']) }}
                            </div>
                            {!! Form::close() !!}
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
