@extends('admin.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <form action="/addpatient" method="post">
            @csrf
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-4">
                                <h3>Find Patients</h3>
                            </div>

                            <form action="/addpatient" method="post">
                            <div class="element2 col-md-2 offset-md-6 pull-right">

                                    <input type="submit" class="btn btn-primary pull-right" value="Add Patient" />
                            </div>

                        </div>
                    </div>

                    @if(count($users) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone Number</th>
                                    <th scope="col">Birth Date</th>
                                    <th scope="col">Created At</th>
                                    <th>
                                        <input type="checkbox" class="checkuser" />
                                    </th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            {{$user->first_name}} {{ $user->last_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            {{ $user->phone }}
                                        </td>
                                        <td>
                                            {{ $user->birth_date }}
                                        </td>
                                        {{--<td>--}}
                                        {{--{{ $user->status }}--}}
                                        {{--</td>--}}
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            <input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"/>

                                        </td>

                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            @else
                                <p>There are no users</p>
                            @endif
                        </div>
                        <div class="card-footer py-4">
                            <nav aria-label="...">
                                <ul class="pagination justify-content-end mb-0">
                                    {{ $users->links() }}
                                </ul>
                            </nav>
                        </div>
                </div>
            </div>
        </div>
</form>
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
