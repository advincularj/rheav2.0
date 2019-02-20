@extends('doctor.layouts.app2')

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
                                <div class="w3-show-inline-block offset-5">
                                    <input type="submit" class="btn btn-primary pull-right" value="Add Patient" />
                                    <a href="/patients" class="btn btn-default">Go Back</a>
                            </div>
                            </form>
                        </div>
                    </div>

                    @if(count($users) > 0)
                        <div class="table-responsive">
                            <table class="table align-items-center table-flush">
                                <thead class="thead-light">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Created At</th>
                                    <th scope="col"></th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($users as $user)
                                    <tr>
                                        <td>
                                            <input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"/>

                                        </td>
                                        <td>
                                            {{$user->first_name}} {{ $user->last_name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        {{--<td>--}}
                                        {{--{{ $user->status }}--}}
                                        {{--</td>--}}
                                        <td>
                                            {{ $user->created_at }}
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
