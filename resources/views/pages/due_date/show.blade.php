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

            <div class="confetti-land">
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                <div class="confetti"></div>
                {{--<div class="confetti"></div>--}}
                {{--<div class="confetti"></div>--}}
                {{--<div class="confetti"></div>--}}
                {{--<div class="confetti"></div>--}}
            </div>
            <div class="container">
                <style>
                    * {
                        box-sizing: border-box;
                    }
                    body {
                        background: #C4E4FF;
                        background: radial-gradient(circle, #748FBF, #C4E4FF);
                        overflow: hidden;
                        height: 100vh;
                        width: 100%;
                        user-select: none;
                        padding: 0;
                        margin: 0;
                    }

                    .confetti {
                        width: 1rem;
                        height: 1rem;
                        display: inline-block;
                        position: absolute;
                        top: -1rem;
                        left: 0;
                        z-index: 150;
                    }
                    .confetti .rotate {
                        animation: driftyRotate 1s infinite both ease-in-out;
                        perspective: 1000;
                    }
                    .confetti .askew {
                        background: currentColor;
                        transform: skewY(10deg);
                        width: 1rem;
                        height: 1rem;
                        animation: drifty 1s infinite alternate both ease-in-out;
                        perspective:1000;
                    }

                    .confetti:nth-of-type(5n) {
                        color: #F56620;
                    }
                    .confetti:nth-of-type(5n+1) {
                        color: #00EAFF;
                    }
                    .confetti:nth-of-type(5n+2) {
                        color: #EA8EE0;
                    }
                    .confetti:nth-of-type(5n+3) {
                        color: #EBFF38;
                    }
                    .confetti:nth-of-type(5n+4) {
                        color: #0582FF;
                    }

                    .confetti:nth-of-type(7n) .askew {
                        animation-delay: -.6s;
                        animation-duration: 2.25s;
                    }
                    .confetti:nth-of-type(7n + 1) .askew {
                        animation-delay: -.879s;
                        animation-duration: 3.5s;
                    }
                    .confetti:nth-of-type(7n + 2) .askew {
                        animation-delay: -.11s;
                        animation-duration: 1.95s;
                    }
                    .confetti:nth-of-type(7n + 3) .askew {
                        animation-delay: -.246s;
                        animation-duration: .85s;
                    }
                    .confetti:nth-of-type(7n + 4) .askew {
                        animation-delay: -.43s;
                        animation-duration: 2.5s;
                    }
                    .confetti:nth-of-type(7n + 5) .askew {
                        animation-delay: -.56s;
                        animation-duration: 1.75s;
                    }
                    .confetti:nth-of-type(7n + 6) .askew {
                        animation-delay: -.76s;
                        animation-duration: 1.5s;
                    }

                    .confetti:nth-of-type(9n) .rotate {
                        animation-duration: 2s;
                    }
                    .confetti:nth-of-type(9n + 1) .rotate {
                        animation-duration: 2.3s;
                    }
                    .confetti:nth-of-type(9n + 2) .rotate {
                        animation-duration: 1.1s;
                    }
                    .confetti:nth-of-type(9n + 3) .rotate {
                        animation-duration: .75s;
                    }
                    .confetti:nth-of-type(9n + 4) .rotate {
                        animation-duration: 4.3s;
                    }
                    .confetti:nth-of-type(9n + 5) .rotate {
                        animation-duration: 3.05s;
                    }
                    .confetti:nth-of-type(9n + 6) .rotate {
                        animation-duration: 2.76s;
                    }
                    .confetti:nth-of-type(9n + 7) .rotate {
                        animation-duration: 7.6s;
                    }
                    .confetti:nth-of-type(9n + 8) .rotate {
                        animation-duration: 1.78s;
                    }

                    @keyframes drifty {
                        0% {
                            transform: skewY(10deg) translate3d(-250%, 0, 0);
                        }
                        100% {
                            transform: skewY(-12deg) translate3d(250%, 0, 0);
                        }
                    }
                    @keyframes driftyRotate {
                        0% {
                            transform: rotateX(0);
                        }
                        100% {
                            transform: rotateX(359deg);
                        }
                    }

                </style>
                @include('patient.inc.messages')
            </div>

            <div class="container py-lg-md d-flex ">
                <div class="col px-1">
                    <div class="row justify-content-center">
                        <div class="col-md-12">


                            {{--HERE IS THE START--}}
                            {{--<a href="/userIndex" class="btn btn-default offset-1">Go Back</a>--}}
                            <br>
                            <br>
                            <div class="col-md-12" style="align-content: center">
                                <div class="row">
                                    <div class="col-md-7 offset-2">
                                        <div class="card shadow">
                                            <div class="card-header border-0">
                                                <div class="row mb-0">
                                                    <div class="element1 col-md-12" style="text-align: center">
                                                        <h1>Congratulations!</h1>
                                                        <h3>Your baby's estimated due date is </h3>
                                                        <h1>{{ date('F d, Y', strtotime($due->due_date)) }}</h1>
                                                        <br>
                                                        {{--<h3><a href="/userIndex"><h6>><u>Recalculate your due date</u></h6></a></h3>--}}

                                                        {{--Delete Button--}}
                                                        {!!Form::open(['action' => ['DueDateController@destroy', $due->id], 'method' => 'POST'])!!}
                                                        {{Form::hidden('_method', 'DELETE')}}
                                                        {{Form::submit('Recalculate', ['class' => 'btn btn-default btn-sm'])}}

                                                        <a href="{{ url('/userIndex') }}" class="btn btn-default btn-sm">Home</a>

                                                        {!! Form::close() !!}
                                                        {{--<a href="{{ action('DueDateController@destroy', $due->id) }}" data-method="delete" class="jquery-postback"><h6>><u>Recalculate your due date</u></h6></a>--}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    {{--<div class="col-md-4 offset-3">--}}
                                    {{--<img src="{{asset('uploads/index/calendar.png')}}"--}}
                                    {{--alt="features" style="height: 200px; width: 200px">--}}
                                    {{--</div> <!-- end of .col-md-8 -->--}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <!-- SVG separator -->
            {{--<div class="separator separator-bottom separator-skew">--}}
                {{--<svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1"--}}
                     {{--xmlns="http://www.w3.org/2000/svg">--}}
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

    <script>
        var confettiPlayers = [];

        function makeItConfetti() {
            var confetti = document.querySelectorAll('.confetti');

            if (!confetti[0].animate) {
                return false;
            }

            for (var i = 0, len = confetti.length; i < len; ++i) {
                var snowball = confetti[i];
                snowball.innerHTML = '<div class="rotate"><div class="askew"></div></div>';
                var scale = Math.random() * .8 + .2;
                var player = snowball.animate([
                    { transform: 'translate3d(' + (i/len*100) + 'vw,0,0) scale(' + scale + ')', opacity: scale },
                    { transform: 'translate3d(' + (i/len*100 + 10) + 'vw,100vh,0) scale(' + scale + ')', opacity: 1 }
                ], {
                    duration: Math.random() * 3000 + 3000,
                    iterations: Infinity,
                    delay: -(Math.random() * 5000)
                });


                confettiPlayers.push(player);
            }
        }

        makeItConfetti();
    </script>


@endsection