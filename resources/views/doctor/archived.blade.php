@extends('doctor.layouts.app')

@section('content')
    <!-- Main content -->

    <!-- Page content -->
    <div class="container-fluid mt--8">

        <!-- Maternal Guide Table -->
        <div class="row mt-5">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row mb-0">
                            <div class="element1 col-md-4">
                                <h2>Archived Patients</h2>
                            </div>

                            <div class="w3-show-inline-block offset-6">
                                <div class="w3-bar">
                                    <a href="/patients" class="btn btn-default">Go Back</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    @if(count($trash) > 0)
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

                                @foreach($trash as $input)
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
                                        <td>
                                            {{ $user->created_at }}
                                        </td>
                                        <td>
                                            <a href="{{ route('user.restore', $user->id) }}" class="btn btn-success">Restore</a>
                                        </td>
                                        {{--<td>--}}
                                        {{--Delete Button - ARCHIVE dapat sa thesis--}}
                                        {{--{!!Form::open(['action' => ['MaternalGuideController@restore'], 'method' => 'POST', 'class' => 'pull-right'])!!}--}}
                                        {{--{{Form::hidden('_method', 'RESTORE')}}--}}
                                        {{--{{Form::submit('Restore', ['class' => 'btn btn-default'])}}--}}
                                        {{--{!! Form::close() !!}--}}
                                        {{--</td>--}}
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            @else
                                <p style="text-align: center">You have no archived patients</p>
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
    </div>

@endsection
