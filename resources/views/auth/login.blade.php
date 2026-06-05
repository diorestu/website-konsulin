@extends('admin.layout.auth')

@section('title')
    Smart Panel - Login
@endsection

@section('content')
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="auth-content my-auto">
        <div class="text-center">
            <h5 class="mb-0"><strong class="text-black font-size-20 fw-black">Smart Panel v.01</strong></h5>
            <p class="text-muted mt-2">Admin Panel for Management Website Content</p>
        </div>
        <div class="">
            @error('username')
                <div class="alert alert-danger alert-dismissible alert-label-icon label-arrow fade show" role="alert">
                    <strong>Error</strong> - Username and password not match
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
        </div>
        <form class="mt-4 pt-2" action="{{ route('login') }}" method="POST">
            @csrf
            <!-- Password -->
            <div class="mt-4"></div>
            <div class="form-floating form-floating-custom mb-3">
                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required
                    autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
                <x-input-label for="email" :value="__('Email')" />
                <div class="form-floating-icon"><i data-feather="users"></i></div>
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-floating form-floating-custom mb-3 auth-pass-inputgroup">
                <x-text-input id="password" class="form-control pe-5" type="password" name="password" required
                    autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                <button type="button" class="btn btn-link position-absolute h-100 end-0 top-0" id="password-addon">
                    <i class="mdi mdi-eye-outline font-size-18 text-muted"></i>
                </button>
                <x-input-label for="input-password" :value="__('Password')" />
                <div class="form-floating-icon"> <i data-feather="lock"></i></div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="d-flex justify-content-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox"
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
                <!-- Remember Me -->
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif
            </div>
            <div class="mb-3">
                <button class="btn btn-primary w-100 waves-effect waves-light py-3"
                    style="background-color: #023e8a; font-size: 16px !important;" type="submit">
                    SIGN IN
                </button>
            </div>
        </form>
    </div>
@endsection
