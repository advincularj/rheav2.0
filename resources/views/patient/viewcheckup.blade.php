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
                                    Check-up Record
                                </div>
                                <table class="table table-striped">
                                    <thead>
                                    <tr>
                                        <td>ID</td>
                                        <td>IE Findings</td>
                                        <td>Blood Pressure</td>
                                        <td>Height</td>
                                        <td>Weight</td>
                                        <td>AOG</td>
                                        <td>Weight Gain</td>
                                        <td colspan="2">Action</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($checkuprecords as $checkuprecord)
                                        <tr>
                                            <td>{{$checkuprecord->id}}</td>
                                            <td>{{$checkuprecord->ieFindings}}</td>
                                            <td>{{$checkuprecord->bloodPressure}}</td>
                                            <td>{{$checkuprecord->height}}</td>
                                            <td>{{$checkuprecord->weight}}</td>
                                            <td>{{$checkuprecord->AOG}}</td>
                                            <td>{{$checkuprecord->weightGain}}</td>
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