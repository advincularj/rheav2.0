@extends('admin.layouts.app')


@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-3">
                                <h2>User Logs</h2>
                            </div>

                            {{--<div class="element2 col-md-2 offset-md-5">--}}
                            {{--{!! Form::open(array('route' => 'clear-activity')) !!}--}}
                            {{--{!! Form::hidden('_method', 'DELETE') !!}--}}
                            {{--{!! Form::button('<i class="fa fa-fw fa-trash" aria-hidden="true"></i>' . trans('LaravelLogger::laravel-logger.dashboard.menu.clear'), array('type' => 'button', 'data-toggle' => 'modal', 'data-target' => '#confirmDelete', 'data-title' => trans('LaravelLogger::laravel-logger.modals.clearLog.title'),'data-message' => trans('LaravelLogger::laravel-logger.modals.clearLog.message'), 'class' => 'dropdown-item')) !!}--}}
                            {{--{!! Form::close() !!}--}}
                            {{--</div>--}}

                            <div class="w3-show-inline-block offset-6">
                                <div class="w3-bar">

                                    <form action="{{ route('clear-activity')}}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button class="btn btn-danger" name="archive" type="submit"
                                                onclick="archiveFunction()">
                                            Archive All
                                        </button>
                                        <a href="/archived-audits" class="btn btn-primary">Archived Logs</a>

                                    </form>

                                    <script>
                                        function archiveFunction() {
                                            event.preventDefault(); // prevent form submit
                                            var form = event.target.form; // storing the form
                                            swal({
                                                    title: "Are you sure?",
                                                    text: "But you will still be able to retrieve these files.",
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
                                                        swal("Cancelled", "Your files are safe :)", "error");
                                                    }
                                                });
                                        }
                                    </script>

                                    {{--<a href="/destroy-activity" class="btn btn-danger">Delete All</a>--}}


                                </div>
                            </div>


                            {{--<div class="element2 col-md-2 offset-md-6">--}}
                            {{--<a href="/users/create" class="btn btn-primary">Add Doctor</a>--}}
                            {{--</div>--}}
                        </div>
                    </div>

                    @if(count($audits) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Description</th>
                                    {{--<th scope="col">User Type</th>--}}
                                    <th scope="col">Name</th>
                                    <th scope="col">Route</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Created At</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($audits as $audit)
                                    <tr>
                                        <td>
                                            {{$audit->id }}
                                        </td>
                                        <td>
                                            {{$audit->description }}
                                        </td>
                                        <td>
                                            {{($audit->user == null) ? 'N/A' : $audit->user->first_name . ' ' . $audit->user->last_name}}
                                            {{--{{$audit->user->first_name}} {{$audit->user->last_name}}--}}
                                        </td>
                                        <td>
                                            {{$audit->route }}
                                        </td>
                                        <td>
                                            {{ $audit->methodType }}
                                        </td>
                                        <td>
                                            {{ $audit->created_at }}
                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            @else
                                <p style="text-align: center">There are no audit logs</p>
                            @endif
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    {{ $audits->links() }}
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
@endsection