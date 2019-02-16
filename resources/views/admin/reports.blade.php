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

                                @if(count($items) > 0)

                                <table class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <td>Name</td>
                                        <td>Email</td>
                                        <td>Created At</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>{{ $user->first_name}}</td>
                                            <td>{{ $user->email}}</td>
                                            <td>{{ $user->created_at->toDayDateTimeStrin()}}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                @else
                                    <div align="center">
                                        <h4>No records found.</h4>
                                    </div>
                                @endif



                            </div>