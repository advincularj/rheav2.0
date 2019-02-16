@extends('admin.layouts.app')

@section('content')
    <div class="container">

        <div class="panel panel-primary">

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        {!! $chart->html() !!}
                    </div>
                    <div class="col-md-6">
                        {!! $charts->html() !!}
                    </div>
                    <div class="col-md-6">
                        {!! $pie_chart->html() !!}
                    </div>
                    <div class="col-md-6">
                        {!! $barchart->html() !!}
                    </div>
                    <div class="col-md-6">
                        {!! $patient_chart->html() !!}
                    </div>
                    <div class="col-md-6">
                        {!! $barcharts->html() !!}
                    </div>
                </div>

            </div>

        </div>
    </div>

    {!! Charts::scripts() !!}
    {!! $chart->script() !!}
    {!! $charts->script() !!}
    {!! $pie_chart->script() !!}
    {!! $barchart->script() !!}
    {!! $patient_chart->script() !!}
    {!! $barcharts->script() !!}
@endsection