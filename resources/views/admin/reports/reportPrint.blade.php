@extends('layouts.app')

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
                                <h3>Doctor - Reports</h3>
                            </div>
                            <br/>
                            <body>
                            <div class="container">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <td>Calamity Name</td>
                                            <td>Date and Time</td>
                                            <td>Remarks</td>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($request as $request)
                                            <tr>
                                                <td>{{ $request->id }}</td>
                                                <td>{{ $request->first_name }}</td>
                                                <td>{{ $request->last_name }}</td>
                                            </tr>
                                        </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                            </body>
                        </div>
                    </div>
                </div>
            </div>
                                </div>
                            </div>

                            </body>
                            </html>
