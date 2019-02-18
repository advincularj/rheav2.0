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
            @include('doctor.inc.messages')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">

</div>

<div class="card-body">

    <div class="panel-body">


        <table class="table table-striped">

            <tr>
                <th>Full name</th>
            </tr>

            @foreach($maternalguide as $value)
                <tr>
                    <td><a href="article/{{$value->title}}"> {{$value->title}}</a></td>
                </tr>
            @endforeach

        </table>
    </div>
</div>
</div>
</div>
</div>
</div>


    @endsection