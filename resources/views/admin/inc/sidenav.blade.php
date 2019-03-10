
<!-- Sidenav -->
<nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
        <!-- Toggler -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- Brand -->
        {{--<a class="navbar-brand" href="{{ url('/admin/dashboard') }}">--}}
        {{--{{ config('app.name', 'Rhea') }}--}}
        {{--</a>--}}

        <a class="navbar-brand pt-0" href="/admin/dashboard">
            <img src="{{asset('aaa/doctor/img/brand/pinkkasaju.png')}}" class="navbar-brand-img" alt="{{ config('app.name', 'Rhea') }}">
        </a>

        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
            <!-- Collapse header -->
            <div class="navbar-collapse-header d-md-none">
                <div class="row">
                    <div class="col-6 collapse-brand">
                        <a href="../index.html">
                            <img src="../assets/img/brand/blue.png">
                        </a>
                    </div>
                    <div class="col-6 collapse-close">
                        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Form -->
            <form class="mt-4 mb-3 d-md-none">
                <div class="input-group input-group-rounded input-group-merge">
                    <input type="search" class="form-control form-control-rounded form-control-prepended" placeholder="Search" aria-label="Search">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <span class="fa fa-search"></span>
                        </div>
                    </div>
                </div>
            </form>
            <!-- Navigation -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/admin/charts">
                        <i class="ni ni-tv-2 text-primary"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/profile">
                        <i class="ni ni-single-02 text-yellow"></i> User profile
                    </a>
                </li>
                <li class="nav-item">
                    {{--<a class="nav-link active" href="/users">--}}
                    <a class="nav-link" href="/users">
                        <i class="ni ni-bullet-list-67 text-red"></i> Doctors
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/guides">
                        <i class="ni ni-bullet-list-67 text-red"></i> Maternal Guide
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/audits">
                        <i class="ni ni-bullet-list-67 text-red"></i> Audit Logs
                    </a>
                </li>
                <!-- Divider -->
                <hr class="my-2">
                <!-- Heading -->
                <h6 class="navbar-heading text-muted" style="padding-left: 15px">Reports</h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item" style="padding-left: 20px">
                        <a class="nav-link" href="/ajaxdata">
                            <i class="ni ni-bullet-list-67 text-red"></i> Users
                        </a>
                    </li>
                    <li class="nav-item" style="padding-left: 20px">
                        <a class="nav-link" href="/articles">
                            <i class="ni ni-bullet-list-67 text-red"></i> Maternal Articles
                        </a>
                    </li>
                    <li class="nav-item" style="padding-left: 20px">
                        <a class="nav-link" href="/logs">
                            <i class="ni ni-bullet-list-67 text-red"></i> User Logs
                        </a>
                    </li>


                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ url('login') }}">--}}
                        {{--<i class="ni ni-key-25 text-info"></i> {{ __('Login') }}--}}
                    {{--</a>--}}
                {{--</li>--}}
                {{--<li class="nav-item">--}}
                    {{--<a class="nav-link" href="{{ url('register') }}">--}}
                        {{--<i class="ni ni-circle-08 text-pink"></i> {{ __('Register') }}--}}
                    {{--</a>--}}
                {{--</li>--}}
            </ul>
            <!-- Divider -->
            {{--<hr class="my-3">--}}
        </div>
    </div>
</nav>
