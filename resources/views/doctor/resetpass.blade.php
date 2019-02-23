@extends('doctor.layouts.app')

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
                                                <form class="form-horizontal" method="POST" action="changePassword">
                                                    {{ csrf_field() }}

                                                    <div
                                                            class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                                        <label for="new-password" class="col-md-4 control-label">Current
                                                            Password</label>

                                                        <div class="col-md-6">
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
                                                        <label for="new-password" class="col-md-4 control-label">New
                                                            Password</label>

                                                        <div class="col-md-6">
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
                                                               class="col-md-4 control-label">Confirm New
                                                            Password</label>

                                                        <div class="col-md-6">
                                                            <input id="new-password-confirm" type="password"
                                                                   class="form-control" name="new-password_confirmation"
                                                                   required>
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <p align="right">
                                                            <button type="submit" class="btn  btn-sm btn-primary">
                                                                Change Password
                                                            </button>
                                                            <a href="/doctorsettings" class="btn  btn-sm btn-primary">Cancel</a>
                                                        </p>
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