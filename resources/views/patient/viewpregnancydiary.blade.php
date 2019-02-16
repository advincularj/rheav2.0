@extends('patient.layouts.app')

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

            @include('patient.inc.messages')
            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="card">
                                <div class="card-header">
                                    Pregnancy Diary
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>Note</td>
                                        <td colspan="2">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($diaries as $diary)
                                        <tr>
                                            <td>{{$diary->id}}</td>
                                            <td>{{$diary->note}}</td>
                                            <td><a href="{{ route('pregnancydiaries.edit',$diary->id)}}"
                                                   class="btn btn-primary">Edit</a></td>
                                            <td>
                                                <form action="{{ route('pregnancydiaries.destroy', $diary->id)}}"
                                                      method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
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
@endsection