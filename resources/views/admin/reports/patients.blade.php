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
                                <h3>Users - Reports</h3>
                            </div>
                            <div class="w3-show-inline-block offset-8">

                                <a href="/articles" class="btn btn-primary">Articles</a>
                                <a href="/doctors" class="btn btn-primary">Doctors</a>
                                <a href="/patientreport" class="btn btn-primary">Patients</a>
                            </div>
                        </div>
                    </div>

                    @if(count($patient) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col">Updated At</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($patient as $patients)
                                    <tr>
                                        <td>{{$patients->id }}</td>
                                        <td>{{($patients->user == null) ? 'N/A' : $patients->user->first_name . ' ' . $patients->user->last_name}}</td>
                                        {{--<td>{{$articles->name}}</td>--}}
                                        <td>{{$patients->email}}</td>
                                        <td>{{$patients->phone}}</td>
                                        <td>{{$patients->created_at}}</td>
                                        <td>{{$patients->updated_at}}</td>

                                    </tr>


                                </tbody>

                                @endforeach


                            </table>

                            @else
                                <p>There are no patients.</p>
                            @endif

                        </div>
                        <br>

                        <div class="w3-show-inline-block offset-10">
                            <a href="/" class="btn btn-default pull-left">Print as PDF</a>
                        </div>


                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    {{--{{ $audit->links() }}--}}
                                </ul>
                            </nav>
                            <div class="col-xl-6">
                                <div class="copyright text-right text-muted">
                                    <a href="" class="font-weight-bold ml-1">
                                        Report Generated on {{today()->toDateString()}} by {{session('user')['first_name'] . ' ' . session('user')['last_name']}}
                                    </a>
                                </div>
                            </div>
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
    </div>
@endsection