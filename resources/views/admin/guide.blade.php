@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        {{--<!-- Maternal Guide Categories Table -->--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-8">--}}
                {{--<div class="card shadow">--}}
                    {{--<div class="card-header border-0">--}}
                        {{--<div class="row mb-0">--}}
                            {{--<div class="element1 col-md-5">--}}
                                {{--<h2>Maternal Guide Categories</h2>--}}
                            {{--</div>--}}

                            {{--<div class="w3-show-inline-block offset-5">--}}
                                {{--<div class="w3-bar">--}}
                                    {{--<a href="/guides/create" class="btn btn-primary">Create Category</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                    {{--@if(count($categories) > 0)--}}
                        {{--<div class="table-responsive">--}}
                            {{--<table class="table align-items-center table-flush">--}}
                                {{--<thead class="thead-light">--}}
                                {{--<tr>--}}
                                    {{--<th>Name</th>--}}
                                    {{--<th>Created At</th>--}}
                                    {{--<th scope="col"></th>--}}
                                    {{--<th scope="col"></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}

                                {{--@foreach($categories as $category)--}}
                                    {{--<tr>--}}
                                        {{--<td>--}}
                                            {{--{{ $category->name}}--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--{{ $category->created_at }}--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--<a href="/categories/{{$category->id}}/edit"--}}
                                               {{--class="btn btn-default">Edit</a>--}}
                                        {{--</td>--}}
                                        {{--<td>--}}
                                            {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                            {{--{!!Form::open(['action' => ['MaternalGuideCategoryController@destroy', $category->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
                                            {{--{{Form::hidden('_method', 'DELETE')}}--}}
                                            {{--{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
                                            {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}
                                    {{--</tr>--}}
                                {{--</tbody>--}}
                                {{--@endforeach--}}

                            {{--</table>--}}
                            {{--@else--}}
                                {{--<p style="text-align: center">You have no categories</p>--}}
                            {{--@endif--}}
                        {{--</div>--}}
                        {{--<div class="card-footer py-4">--}}
                            {{--<nav aria-label="...">--}}
                                {{--<ul class="pagination justify-content-end mb-0">--}}
                                    {{--{{ $categories->links() }}--}}
                                {{--</ul>--}}
                            {{--</nav>--}}
                        {{--</div>--}}
                {{--</div>--}}
            {{--</div> <!-- end of .col-md-8 -->--}}

            {{--<div class="col-md-3">--}}
                {{--<div class="card shadow">--}}
                    {{--<div class="card-header border-0">--}}
                        {{--<div class="row mb-0">--}}
                            {{--<div class="element1 col-md-4">--}}
                            {{--</div>--}}
                            {{--{!! Form::open(['action' => 'MaternalGuideController@storeCat', 'method' => 'post']) !!}--}}
                                {{--<h2>New Category</h2>--}}
                                {{--<br>--}}
                                {{--{{ Form::label('name', 'Name:') }}--}}
                                {{--{{ Form::text('name', null, ['class' => 'form-control']) }}--}}
                                {{--<br>--}}
                                {{--{{ Form::submit('Create New Category', ['class' => 'btn btn-primary']) }}--}}

                            {{--{!! Form::close() !!}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


        <!-- Maternal Guide Table -->
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-4">
                                <h2>Maternal Guide</h2>
                            </div>

                            <div class="w3-show-inline-block offset-5">
                                <div class="w3-bar">
                                    <a href="/guides/create" class="btn btn-primary">Create Guide</a>
                                    <a href="/categories" class="btn btn-primary">Categories</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($guides) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th>Title</th>
                                    <th>Body</th>
                                    <th>Created At</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($guides as $guide)
                                    <tr>
                                        <td>
                                            {{$guide->title}}
                                        </td>
                                        <td >
                                            {{ str_limit($guide->body, 50) }}
                                        </td>
                                        <td>
                                            {{ $guide->created_at }}
                                        </td>
                                        <td>
                                            <a href="/guides/{{$guide->id}}/edit" class="btn btn-default">Edit</a>
                                        </td>
                                        <td>
                                            {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                            {!!Form::open(['action' => ['MaternalGuideController@destroy', $guide->id], 'method' => 'POST', 'class' => 'pull-right'])!!}
                                            {{Form::hidden('_method', 'DELETE')}}
                                            {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            @else
                                <p style="text-align: center">You have no posts</p>
                            @endif
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    {{ $guides->links() }}
                                </ul>
                            </nav>
                        </div>
                </div>
            </div>
        </div>


        <!-- Footer -->
        <footer class="footer">
            <div class="row align-items-center justify-content-xl-between">
                <div class="col-xl-6">
                    <div class="copyright text-center text-xl-left text-muted">
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                       target="_blank">Rhea</a>
                    </div>
                </div>

            </div>
        </footer>
    </div>
    </div>

@endsection
