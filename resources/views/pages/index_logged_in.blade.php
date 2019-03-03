@extends('layouts.app')

@section('content')
    <main>
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
                </div>
                <div class="container hero-inner">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-5 mx-lg-auto">
                            <div class="text-center text-lg-left">
                                <h1 class="display-3  text-white">
                                    @if(session('user') && Auth::user()) Hi, Welcome to @else @endif RHEA.
                                        &nbsp;
                                        <span><small>In partnership with Kasaju Medical and Maternal Clinic</small></span>
                                </h1>
                                <a href="/duedate"
                                   class="btn btn-lg btn-success mt-4 mb-3 mb-sm-0">
                                    <span class="btn-inner--text">Calculate my Due Date</span>
                                </a>

                                <div class="md-space"></div>
                                @if(!session('user') || !Auth::user())
                                    <a href="{{URL::to('/signup')}}"
                                       class="btn btn-lg btn-success mt-4 mb-3 mb-sm-0">
                                        <span class="btn-inner--text">Register now</span>
                                    </a>
                                @endif
                                {{--<p class="lead  text-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>--}}
                            </div>
                        </div>
                        <div class="col-12 col-lg-4 mt-5 mt-lg-0">
                            <img src="{{asset('uploads/index/icon.png')}}" class="img-fluid"
                                 alt="Browser Image">
                        </div>
                    </div>
                </div>
                <!-- SVG separator -->
                {{--<div class="separator separator-bottom separator-skew">--}}
                {{--<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">--}}
                {{--<polygon class="fill-white" points="2560 0 2560 100 0 100"></polygon>--}}
                {{--</svg>--}}
                {{--</div>--}}
            </section>
            <!-- 1st Hero Variation -->
        </div>
        <section class="section section-components pb-0" id="about">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <h2 class="display-3">About Us
                        </h2>
                        <div>
                            <h5>
                                Kasaju Medical & Maternity Clinic is a customer-oriented privately-owned clinic  that started out on 2001.
                                It is co-owned by Dr. Sangjit Kasaju and Dr. Vivienne Guzman - Kasaju. It was previously named Belang’s
                                Multispecialty and Maternity Clinic.
                                Located at 182 Montillano St, Alabang, Muntinlupa, 1770 Metro Manila.
                                Kasaju Medical & Maternity Clinic aims to provide accessible and affordable
                                quality healthcare for its patients.
                            </h5>
                            <br>
                            <br>
                            <h2 class="display-3">Vision
                            </h2>
                            <h5>
                                Kasaju Medical & Maternity Clinic visualizes independently to be a comprehensive lying-in/maternity
                                and multi-specialty clinic that accommodates affordable and receptive quality healthcare, which is
                                accessible to the needs of its patients.
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section features">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="row align-items-center">
                            <div class="col-lg-12 justify-content-center">
                                <div class="text-center text-lg-left">
                                    <h3 class="h4 text-success font-weight-bold mb-4">WHAT WE COMMIT TO ATTAIN</h3>
                                    <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                        <div class="row align-items-center">
                                            <div class="col-4 bg-secondary text-center rounded">
                                                <img src="{{asset('uploads/index/healthcare.png')}}"
                                                     class="img-fluid w-50 py-2"
                                                     alt="features">
                                            </div>
                                            <div class="col-8">
                                                <h4 class="display-4 mb-0"></h4>
                                                <h6>
                                                    <b>Delivery of Healthcare is Obtainable and Accessible</b>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center text-lg-left">
                                    <h2 class="lg-font-size font-weight__700">
                                    </h2>
                                    <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                        <div class="row align-items-center">
                                            <div class="col-4 bg-secondary text-center rounded">
                                                <img src="{{asset('uploads/index/doctor.png')}}"
                                                     class="img-fluid w-50 py-2"
                                                     alt="features">
                                            </div>
                                            <div class="col-8">
                                                <h4 class="display-4 mb-0"></h4>
                                                <h6>
                                                    <b>A Faculty that provides Security, Safety, and Reliability</b>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="text-center text-lg-left">
                                    <h2 class="lg-font-size font-weight__700">
                                    </h2>
                                    <div class="box box-shadow text-left rounded py-2 px-4 mb-5 mb-lg-0">
                                        <div class="row align-items-center">
                                            <div class="col-4 bg-secondary text-center rounded">
                                                <img src="{{asset('uploads/index/resources.png')}}"
                                                     class="img-fluid w-50 py-2"
                                                     alt="features">
                                            </div>
                                            <div class="col-8">
                                                <h4 class="display-4 mb-0"></h4>
                                                <h6>
                                                    <b>Practice of Supervision and Strategic Planning of Available Resources</b>
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                        <p class="description mt-3">182 Montanilla St., Alabang, Muntinlupa, 1770 Metro Manila</p>
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
    </main>
@endsection


