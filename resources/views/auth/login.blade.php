@extends('layouts.app')

@section('content')
    <!-- Content -->
    <div class="position-relative">
        <div class="authentication-wrapper authentication-basic container-p-y">
            <div class="authentication-inner py-6 mx-4">
                <!-- Login -->
                <div class="card p-7">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mt-5">
                        <a href="/" class="app-brand-link gap-3">
                            <span class="app-brand-logo demo">
                                {{-- @if ($settings)
                                    <img src="{{ asset('storage/uploads/logo/' . $settings->logo) }}" alt=""
                                        class=" rounded-circle" style="height:50px;">
                                @else
                                    <img src="{{ asset('../assets/img/default-logo/no-logo.png') }}" alt=""
                                        class=" rounded-circle" style="height:50px;">
                                @endif --}}
                                <img src="{{ asset('../assets/img/logo/tupad-logo.png') }}" alt=""
                                    class=" rounded-circle" style="height:50px;">
                            </span>

                            <span
                                class="app-brand-text demo text-heading fw-semibold">{{ config('app.name', 'MPMIS') }}</span>
                        </a>
                    </div>
                    <!-- /Logo -->

                    <div class="card-body mt-1">
                        <h5 class="mb-4 text-center">MALITBOG PROGRAM MANAGEMENT INFORMATION SYSTEM</h5>

                        <form id="formAuthentication" class="mb-5" action="{{ route('login') }}" method="POST">
                            @csrf
                            <div class="mt-2 mb-4">
                                <select id="largeSelect"
                                    class="form-select form-select-md text-center @error('role') is-invalid @enderror"
                                    name="role" required>
                                    <option disabled selected>Select Login Credentials</option>
                                    <option value="1" {{ old('role') == 1 ? '' : '' }}>TUPAD / PESO</option>
                                    <option value="2" {{ old('role') == 2 ? '' : '' }}>DEPARTMENT OF
                                        AGRICULTURE</option>
                                    <option value="3" {{ old('role') == 3 ? '' : '' }}>ACAP</option>
                                    <option value="0" {{ old('role') == 0 ? '' : '' }}>ADMIN</option>

                                </select>

                                @error('role')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-floating form-floating-outline mb-5">
                                <input type="text" class="form-control @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="Enter your email or username"
                                    value="{{ old('email') }}" required autocomplete="email" autofocus />

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                                <label for="email">Email or Username</label>
                            </div>
                            <div class="mb-5">
                                <div class="form-password-toggle">
                                    <div class="input-group input-group-merge">
                                        <div class="form-floating form-floating-outline">
                                            <input type="password" id="password"
                                                class="form-control @error('password') is-invalid @enderror" required
                                                autocomplete="current-password" name="password"
                                                placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                aria-describedby="password" />
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label for="password">Password</label>
                                        </div>
                                        <span class="input-group-text cursor-pointer"><i
                                                class="ri-eye-off-line ri-20px"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="mb-5 pb-2 d-flex justify-content-between pt-2 align-items-center">
                                <div class="form-check mb-0">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                        {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="float-end mb-1">
                                        <span>Forgot Password?</span>
                                    </a>
                                @endif
                            </div>
                            <div class="mb-5">
                                <button class="btn btn-primary d-grid w-100" type="submit">login</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /Login -->
            </div>
            @include('admin-tupad.partials.scripts.officials-scripts.success-officials')
        </div>
    </div>
    <!-- / Content -->
@endsection
