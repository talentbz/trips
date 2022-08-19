@extends('admin.layouts.master-without-nav')

@section('title')
    @lang('translation.Recover_Password')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
    <div class="account-pages">
        <div class="login-form">
            <img src="{{ URL::asset ('/images/admin/login.png') }}" alt="">
            <div class="login-wrapper">
                <form class="form-horizontal" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="useremail" name="email" placeholder="Enter email"
                            value="{{ $email ?? old('email') }}" id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Password</label>
                        <input type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            id="userpassword" placeholder="Enter password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="userpassword">Confirm Password</label>
                        <input id="password-confirm" type="password" name="password_confirmation"
                            class="form-control" placeholder="Enter confirm password">
                    </div>

                    <div class="text-end">
                        <button class="btn btn-primary w-md waves-effect waves-light"
                            type="submit">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>

    @endsection
