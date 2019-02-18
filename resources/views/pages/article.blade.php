@extends('admin.layouts.app')

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
                                    <h3>Maternal Guide</h3>
                                </div>
                                <br>
                                <br>

                                <div class="table-responsive">
                                    <table class="table align-items-center table-flush">
                                        <thead class="thead-light">
                                        <tr>
                                            <th scope="col">Title</th>
                                            <th scope="col">Body</th>
                                            <th scope="col">Created at</th>
                                            <th scope="col">Category</th>
                                        </tr>
                                        </thead>
                                    <tbody>
                                    @foreach($article as $articles)
                                        @foreach($maternalguide as $maternalguides)
                                            <tr>
                                                <td>{{$maternalguides->title}}</td>
                                                <td>{{ str_limit($maternalguides->body, 50) }}</td>
                                                <td>{{$maternalguides->created_at}}</td>


                                                    <td>{{$articles->name}}</td>

                                            </tr>
                                                    @endforeach

                                                @endforeach


                                    </tbody>


                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


@endsection