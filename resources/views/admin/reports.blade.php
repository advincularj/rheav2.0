@extends('admin.layouts.app')

@section('content')
    <div class="position-relative">
        <!-- shape Hero -->
        <section class="section section-lg section-shaped pb-250">
            <div class="shape shape-style-1 shape-default">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>

            @include('admin.inc.messages')
            <div class="container-fluid mt--8">
                <div class="col">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="table-responsive">

                                <table class="table" id="table">
                                    <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th class="text-center">First Name</th>
                                        <th class="text-center">Last Name</th>
                                        <th class="text-center">Email</th>
                                        <th class="text-center">Created At</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($data as $item)
                                        <tr class="item{{$item->id}}">
                                            <td>{{$item->id}}</td>
                                            <td>{{$item->first_name}}</td>
                                            <td>{{$item->last_name}}</td>
                                            <td>{{$item->email}}</td>
                                            <td>{{$item->created_at}}</td>
                                            <td></td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="//code.jquery.com/jquery-1.12.3.js"></script>
    <script src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script
            src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <link rel="stylesheet"
          href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css">