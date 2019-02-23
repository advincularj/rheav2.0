@extends('layouts.app')

@if (Auth::user()->role_id == 3)
    @include ('patient.inc.navbar')
@else
    @include ('guest.navbar')
@endif

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

            <div class="container py-lg-md d-flex">
                <div class="col px-0">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">Change password</div>

                                            <div class="card-body">
                                                @if (session('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif
                                                @if (session('success'))
                                                    <div class="alert alert-success">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif
                                                <form class="form-horizontal" method="POST" action="changePass">
                                                    {{ csrf_field() }}

                                                    <div
                                                            class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                        <label for="new-password" class="col-md-6 control-label">Current
                                                            Password</label>

                                                        <div class="col-md-8">
                                                            <input id="current-password" type="password"
                                                                   class="form-control" name="current-password"
                                                                   required>

                                                            @if ($errors->has('current-password'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('current-password') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div
                                                            class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                                        <label for="new-password" class="col-md-6 control-label">New
                                                            Password</label>

                                                        <div class="col-md-8">
                                                            <input id="new-password" type="password"
                                                                   class="form-control" name="new-password" required>

                                                            @if ($errors->has('new-password'))
                                                                <span class="help-block">
                                        <strong>{{ $errors->first('new-password') }}</strong>
                                    </span>
                                                            @endif
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="new-password-confirm"
                                                               class="col-md-8 control-label">Confirm New
                                                            Password</label>

                                                        <div class="col-md-8">
                                                            <input id="new-password-confirm" type="password"
                                                                   class="form-control" name="new-password_confirmation"
                                                                   required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="col-md-6 col-md-offset-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                Change Password
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
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
    </div>
@endsection