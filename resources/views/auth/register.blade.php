@php
$title = 'Register';
@endphp

@extends('layouts.admin.admin-auth')
@section('content')
    <section class="h-100">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card card-registration my-4">
                        <div class="row g-0">
                            <div class="col-xl-6 d-none d-xl-block">
                                <img src="{{ asset('favicon/img4.webp') }}" alt="Sample photo" class="img-fluid"
                                    style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                            </div>
                            <div class="col-xl-6">
                                <div class="card-body p-md-5 text-black">
                                    <h3 class="mb-5 text-uppercase">{{ __('account registration') }}</h3>
                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-12 mb-4">
                                                <div class="form-outline">
                                                    <input type="text" id="name"
                                                        class="form-control form-control-lg @error('name') is-invalid @enderror"
                                                        name="name" value="{{ old('name') }}" required
                                                        autocomplete="name" autofocus>
                                                    <label class="form-label" for="name">{{ __('Full Name') }}</label>
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="email" id="email"
                                                class="form-control form-control-lg @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email">
                                            <label class="form-label" for="email">{{ __('Email Address') }}</label>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password"
                                                class="form-control form-control-lg @error('password') is-invalid @enderror"
                                                name="password" required autocomplete="new-password">
                                            <label class="form-label" for="password">{{ __('Password') }}</label>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-outline mb-4">
                                            <input type="password" id="password-confirm" class="form-control form-control-lg"
                                                name="password_confirmation" required autocomplete="new-password">
                                            <label class="form-label"
                                                for="password-confirm">{{ __('Confirm Password') }}</label>
                                        </div>

                                        <a href="/login">I already have account</a>
                                        <div class="d-flex justify-content-end pt-3">
                                            <button type="submit"
                                                class="btn btn-warning btn-lg ms-2">{{ __('Submit form') }}</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
