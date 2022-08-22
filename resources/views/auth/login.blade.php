@extends('admin.layouts.master-without-nav')

@section('title')
    @lang('translation.Login')
@endsection

@section('body')

    <body>
    @endsection

    @section('content')
        <div class="account-pages">
            <div class="login-form">
                <img src="{{ URL::asset ('/images/admin/login.png') }}" alt="">
                <div class="login-wrapper">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-5">
                            <h3 class="login-title">LOGIN</h3>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Email</label>
                            <input name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                value="{{ old('email', '') }}" id="username"
                                autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <div
                                class="input-group auth-pass-inputgroup @error('password') is-invalid @enderror">
                                <input type="password" name="password"
                                    class="form-control  @error('password') is-invalid @enderror"
                                    id="userpassword" value="" 
                                    aria-label="Password" aria-describedby="password-addon">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-5 d-grid login-button">
                            <button class="btn btn-rounded waves-effect waves-light" type="submit">LOGIN</button>
                        </div>
                    </form>
                </div>
                <div class="mt-4 text-center">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="forgot-password">Forgot your password?</a>
                    @endif

                </div>
            </div>
        </div>
        <!-- end account-pages -->

    @endsection
