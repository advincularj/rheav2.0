@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--9">
        <!-- Maternal Guide Table -->
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-3">
                                <h2>Maternal Guide</h2>
                            </div>
                            {{--<div class="element2 col-md-2">--}}
                                {{--<input style="width: 450px;" type="text" name="search" id="search" class="form-control" placeholder="Search Article" />--}}
                            {{--</div>--}}
                            <div class="w3-show-inline-block offset-5">
                                <div class="w3-bar">
                                    <a href="{{ url('/guides/create') }}" class="btn btn-primary">Create Guide</a>
                                    <a href="{{ url('/categories') }}" class="btn btn-primary">Categories</a>
                                    <a href="{{ url('/archived') }}" class="btn btn-primary">Archived</a>
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
                                    {{--<th scope="col"></th>--}}
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($guides as $guide)
                                    <tr>
                                        <td>
                                            {{$guide->title}}
                                        </td>
                                        <td>
                                            {{ str_limit($guide->body, 50) }}
                                        </td>
                                        <td>
                                            {{ $guide->created_at }}
                                        </td>
                                        {{--<td>--}}
                                        {{--<a href="/guides/{{$guide->id}}/edit" class="btn btn-default">Edit</a>--}}
                                        {{--</td>--}}
                                        <td>
                                            {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                            {{--{!!Form::open(['action' => ['MaternalGuideController@destroy', $guide->id], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
                                            {{--{{Form::hidden('_method', 'DELETE')}}--}}
                                            {{--{{Form::submit('Delete', ['class' => 'btn btn-danger'])}}--}}
                                            {{--{!! Form::close() !!}--}}


                                            <form action="{{ action('MaternalGuideController@destroy', $guide->id)}}"
                                                  method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <a href="/guides/{{$guide->id}}/edit" class="btn btn-default btn-sm">Edit</a>
                                                <button class="btn btn-danger btn-sm" name="archive" type="submit"
                                                        onclick="archiveFunction()">
                                                    Archive
                                                </button>
                                            </form>

                                            <script>
                                                function archiveFunction() {
                                                    event.preventDefault(); // prevent form submit
                                                    var form = event.target.form; // storing the form
                                                    swal({
                                                            title: "Are you sure?",
                                                            text: "But you will still be able to retrieve this file.",
                                                            type: "warning",
                                                            showCancelButton: true,
                                                            confirmButtonColor: "#DD6B55",
                                                            confirmButtonText: "Yes, archive it!",
                                                            cancelButtonText: "No, cancel please!",
                                                            closeOnConfirm: false,
                                                            closeOnCancel: false
                                                        },
                                                        function (isConfirm) {
                                                            if (isConfirm) {
                                                                form.submit();          // submitting the form when user press yes
                                                                // swal("Archived!", "Your file has been archived.", "success");


                                                            } else {
                                                                swal("Cancelled", "Your file is safe :)", "error");
                                                            }
                                                        });
                                                }
                                            </script>

                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach

                                <script>

                                </script>


                            </table>
                            @else
                                <p style="text-align: center">You have no article</p>
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
                        &copy; 2018 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1"
                                       target="_blank">Creative Tim</a>
                    </div>
                </div>
                <div class="col-xl-6">
                    <ul class="nav nav-footer justify-content-center justify-content-xl-end">
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com" class="nav-link" target="_blank">Creative Tim</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://www.creative-tim.com/presentation" class="nav-link" target="_blank">About
                                Us</a>
                        </li>
                        <li class="nav-item">
                            <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a href="https://github.com/creativetimofficial/argon-dashboard/blob/master/LICENSE.md"
                               class="nav-link" target="_blank">MIT License</a>
                        </li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    </div>

@endsection