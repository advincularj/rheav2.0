@extends('doctor.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">
        <!-- Table -->
        <form action="/patient" method="post">
            @csrf
            <div class="row">
                <div class="col">
                    <div class="card shadow">
                        <div class="card-header border-0">
                            <div class="row mb-0">
                                <div class="element1 col-md-4">
                                    <h3>My Patients</h3>
                                </div>


                                    <div class="w3-show-inline-block offset-8">
                                        <input type="submit" class="btn btn-danger pull-right" value="Remove Patient" />
                                        <a href="/addpatient" class="btn btn-primary">Find Patients</a>
                                    </div>

                            </div>
                        </div>

                        @if(count($users) > 0)
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush">
                                    <thead class="thead-light">
                                    <tr>
                                        <th><input type="checkbox" id="select-all"/></th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Created At</th>
                                        <th scope="col">Actions</th>


                                    </tr>
                                    </thead>
                                    <tbody>

                                    @foreach($users as $user)
                                        @if($user->patient)
                                        <tr>

                                            <td>
                                                <input type="checkbox" name="id[]" class="checkthis" value="{{ $user->id }}"/>
                                            </td>
                                            <td>
                                                {{ $user->patient->first_name ?? ""}} {{ $user->patient->last_name ?? ""}}
                                            </td>
                                            <td>
                                                {{ $user->patient->email ?? ""}}
                                            </td>
                                            <td>
                                                {{ $user->patient->created_at ?? ""}}
                                            </td>
                                            <td>
                                                <div class="w3-show-inline-block offset-1">
                                                    <a href="/patientprofile/{{$user->patient_id}}" class="btn btn-primary btn-sm">View Profile</a>
                                                    <a href="/indexrecord" class="btn btn-default btn-sm">View Check-up Records</a>
                                                </div>
                                            </td>
                                        </tr>
                                        @endif
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#select-all').click(function(event) {
                if(this.checked) { // check select status
                    $('.checkthis').each(function() {
                        this.checked = true;  //select all
                    });
                }else{
                    $('.checkthis').each(function() {
                        this.checked = false; //deselect all
                    });
                }
            });

        });
    </script>
@endsection