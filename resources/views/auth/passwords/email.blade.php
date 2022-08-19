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
                @if (session('status'))
                    <div class="alert alert-success text-center mb-4" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <form class="form-horizontal" method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="useremail" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                            id="useremail" name="email" placeholder="Enter email"
                            value="{{ old('email') }}" id="email">
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button class="btn btn-rounded w-md waves-effect waves-light"
                            type="submit">Reset</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    @endsection
