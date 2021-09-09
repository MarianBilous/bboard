@extends('admin.layouts.layout')

@section('content')
    <div class="authentication-lock-screen d-flex align-items-center justify-content-center">
        <div class="card shadow-none bg-transparent">
            <div class="card-body p-md-5 text-center">
                <h2 class="text-white">{{ now()->format('H:i') }}</h2>
                <h5 class="text-white">{{ now()->format('l, F m, Y') }}</h5>
                <div class="">
                    <img src="assets/images/icons/user.png" class="mt-5" width="120" alt="" />
                </div>
                <p class="mt-2 text-white">Administrator</p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mt-3">
                        <input id="email" type="email"
                               class="form-control @error('email') is-invalid @enderror"
                               name="email"
                               value="{{ old('email') }}"
                               required autocomplete="login" autofocus>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <input id="password" type="password"
                               class="form-control @error('password') is-invalid @enderror"
                               name="password"
                               required autocomplete="current-password"
                               placeholder="{{ __('Password') }}">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-light btn-block">{{ __('Login') }}</button>
                </form>
            </div>
        </div>
    </div>
@endsection
