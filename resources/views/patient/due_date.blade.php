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

            <div class="container">
                @include('patient.inc.messages')
            </div>

            <div class="container py-lg-md d-flex ">
                <div class="col px-1">
                    <div class="row justify-content-center">
                        <div class="col-md-12">


                            {{--HERE IS THE START--}}
                            <a href="/userIndex" class="btn btn-default">Go Back</a>
                            <br>
                            <br>
                            <h1>Due Date Calculator</h1>
                            <div class="row">
                            <div class="col-md-4">
                                <div class="card shadow">
                                    <div class="card-header border-0">
                                        <div class="row mb-0">
                                            <div class="element1 col-md-4">
                                            </div>
                                            {!! Form::open(['action' => 'DueDateController@store', 'method' => 'POST']) !!}
                                            @csrf
                                            <label for="name" class="col-md col-form-label">{{ __('First day of my last period:') }}</label>

                                            <div class="col-md-12">
                                                <input id="name" type="date"
                                                       class="form-control{{ $errors->has('last_period') ? ' is-invalid' : '' }}"
                                                       name="last_period" value="{{ old('last_period') }}" required autofocus>

                                                @if ($errors->has('last_period'))
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_period') }}</strong>
                                    </span>
                                                @endif
                                            </div>

                                            <br>
                                            <div class="col-md">
                                                <button type="submit" class="btn btn-primary">
                                                    {{ __('Submit') }}
                                                </button>
                                                <a href="/userIndex" class="btn btn-default">Cancel</a>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4 offset-3">
                                {{--@if ($due > 0)--}}
                                    {{--<h3>tae</h3>--}}
                                {{--@endif--}}
                                <h3>Blah Blah Blah Blah Blah Blah Blah Blah Blah Blah </h3>
                                <h1>Due Date is: Blah Blah</h1>

                            </div> <!-- end of .col-md-8 -->
                            </div>
                        </div>



                        </div>
                    </div>
                    <br>
                </div>




            <!-- SVG separator -->
            <div class="separator separator-bottom separator-skew">
                <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                     xmlns="http://www.w3.org/2000/svg">
                    <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
                </svg>
            </div>
        </section>
        <!-- 1st Hero Variation -->
    </div>

    <section class="section section-components pb-0" id="about">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <h3 class="display-3">How is my due date calculated?
                    </h3>
                    <div>
                        <h5>
                            Your due date is calculated by adding 280 days (40 weeks) to the first day of your last
                            menstrual period (assuming a 28 day cycle).
                            Note that your menstrual period and ovulation are counted as the first two weeks of
                            pregnancy. If you deliver on your due date, your baby is actually only 38 weeks old, not 40.
                        </h5>
                        <br>
                        <br>
                        <h2 class="display-3">Your due date is only an estimate
                        </h2>
                        <h5>
                            Please remember that your due date is only an estimate. Every pregnancy is unique and your
                            baby will come when it's ready. Be sure to talk to your health care provider about your due
                            date.

                            On average only 5% of births take place exactly on the estimated due date. Most are born
                            within a week either side of the estimated due date. A normal pregnancy can last anywhere
                            between 38 and 42 weeks.
                        </h5>
                        <br>
                        <br>
                        <small>Source: Pregnancy Due Date Calculator. (n.d.). Retrieved from
                            http://www.yourduedate.com/
                        </small>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>
    <br>

    <section class="section section-lg section-shaped" id="contact">
        <div class="shape shape-style-1 shape-default">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="col-lg-6">
                        <h3 class="display-3 text-white">Contact Us
                            <h5 class="text-white">Reach us through the following contact details</h5>
                        </h3>
                    </div>
                    <br>
                    <div class="row row-grid">
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-primary rounded-circle mb-4">
                                        <i class="ni ni-check-bold"></i>
                                    </div>
                                    <h6 class="text-primary text-uppercase">Location</h6>
                                    <p class="description mt-3">182 Montanilla St., Alabang, Muntinlupa, 1770 Metro
                                        Manila</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-success rounded-circle mb-4">
                                        <i class="ni ni-istanbul"></i>
                                    </div>
                                    <h6 class="text-success text-uppercase">Phone Numbers</h6>
                                    <p class="description mt-3">(+63)2 556 3596 / 0933 857 0017</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="card card-lift--hover shadow border-0">
                                <div class="card-body py-5">
                                    <div class="icon icon-shape icon-shape-warning rounded-circle mb-4">
                                        <i class="ni ni-planet"></i>
                                    </div>
                                    <h6 class="text-warning text-uppercase">Email Address</h6>
                                    <p class="description mt-3">vkmd7@yahoo.com</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="separator separator-bottom separator-skew">
            <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"
                 xmlns="http://www.w3.org/2000/svg">
                <polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>
            </svg>
        </div>
    </section>


@endsection