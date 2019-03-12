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
                        <div class="element1 col-md-4">
                            <h2>Archived User Logs</h2>
                        </div>

                        <div class="w3-show-inline-block offset-4">
                            <div class="form-inline">

                                <form action="{{ route('destroy-activity')}}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <a href="{{ url('/audits') }}" class="btn btn-default">Go Back</a>
                                    <button class="btn btn-danger" name="delete" type="submit" onclick="archiveFunction()">
                                        Delete All
                                    </button>
                                </form>
                                &nbsp;
                                &nbsp;
                                <form action="{{ route('restore-activity')}}" method="POST">
                                    {{ csrf_field() }}
                                    <button class="btn btn-primary" name="restore" type="submit" onclick="restoreFunction()">
                                        Restore All
                                    </button>
                                </form>

                                <script>
                                    function archiveFunction() {
                                        event.preventDefault(); // prevent form submit
                                        var form = event.target.form; // storing the form
                                        swal({
                                                title: "Are you sure?",
                                                text: "Once deleted, you will not be able to recover this!",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "Yes, delete it!",
                                                cancelButtonText: "No, cancel please!",
                                                closeOnConfirm: false,
                                                closeOnCancel: false
                                            },
                                            function(isConfirm){
                                                if (isConfirm) {
                                                    form.submit();          // submitting the form when user press yes
                                                    // swal("Archived!", "Your file has been archived.", "success");
                                                }

                                                else {
                                                    swal("Cancelled", "Your files are safe :)", "error");
                                                }
                                            });
                                    }
                                </script>



                                <script>
                                    function restoreFunction() {
                                        event.preventDefault(); // prevent form submit
                                        var form = event.target.form; // storing the form
                                        swal({
                                                title: "Are you sure?",
                                                text: "All files will be restored.",
                                                type: "warning",
                                                showCancelButton: true,
                                                confirmButtonColor: "#DD6B55",
                                                confirmButtonText: "Yes, restore all!",
                                                cancelButtonText: "No, cancel please!",
                                                closeOnConfirm: false,
                                                closeOnCancel: false
                                            },
                                            function(isConfirm){
                                                if (isConfirm) {
                                                    form.submit();          // submitting the form when user press yes
                                                    // swal("Archived!", "Your file has been archived.", "success");


                                                }

                                                else {
                                                    swal("Cancelled", "Your files are still archived", "error");
                                                }
                                            });
                                    }
                                </script>


                            </div>
                        </div>
                    </div>
                </div>

                @if(count($trash) > 0)
                <div class="table-responsive">
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            {{--<th scope="col">User Type</th>--}}
                            <th scope="col">Name</th>
                            <th scope="col">Route</th>
                            <th scope="col">IP Address</th>
                            <th scope="col">User Agent</th>
                            <th scope="col">Method</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Deleted At</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($trash as $audit)
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
                                {{ $audit->ipAddress }}
                            </td>
                            <td>
                                {{ $audit->userAgent }}
                            </td>
                            <td>
                                {{ $audit->methodType }}
                            </td>
                            <td>
                                {{ $audit->created_at }}
                            </td>
                            <td>
                                {{ $audit->deleted_at }}
                            </td>
                        </tr>
                        </tbody>
                        @endforeach

                    </table>
                    @else
                    <p style="text-align: center">You have no archived user logs</p>
                    @endif
                </div>
                <div class="card-footer py-4">
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            {{--{{ $guides->links() }}--}}
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