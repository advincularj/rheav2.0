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
                            <div class="element1 col-md-4">
                                <h3>User Logs</h3>
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
                                    <th scope="col">IP Address</th>
                                    <th scope="col">User Agent</th>
                                    <th scope="col">Method</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col"></th>
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
                                            {{ $audit->updated_at }}
                                        </td>
                                        <td>

                                        </td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            @else
                                <p>There are no audit logs</p>
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
                        &copy; 2019 <a href="https://www.creative-tim.com" class="font-weight-bold ml-1" target="_blank">Rhea</a>
                    </div>
                </div>

            </div>
        </footer>
    </div>
@endsection