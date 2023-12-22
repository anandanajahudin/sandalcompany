@extends('layouts.back.base')

@section('content')
    <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
            <div class="row">
                <div class="col-xl-7 col-xxl-8">
                    <a href="{{ route('frontend') }}" class="text-nowrap logo-img d-block px-4 py-9 w-100">
                        <img src="{{ asset('srs-dummylogo.png') }}" class="img-fluid" />
                    </a>
                    <div class="d-none d-xl-flex align-items-center justify-content-center"
                        style="height: calc(100vh - 80px);">
                        <img src="{{ asset('back/dist/images/backgrounds/login-security.svg') }}" alt=""
                            class="img-fluid" width="800">
                    </div>
                </div>
                <div class="col-xl-5 col-xxl-4">
                    <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                        <div class="col-sm-8 col-md-6 col-xl-9">
                            <h2 class="mb-3 fs-7 fw-bolder">Log In Page</h2>
                            <p class=" mb-9">Your Admin Dashboard</p>

                            <form class="needs-validation" novalidate method="POST" action="{{ route('signIn') }}">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name='email' :value="old('email')" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputPassword1"
                                        required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input primary" type="checkbox" value=""
                                            id="flexCheckChecked" checked>
                                        <label class="form-check-label text-dark" for="flexCheckChecked">
                                            Remeber this Device
                                        </label>
                                    </div>
                                    <a class="text-primary fw-medium" href="{{ route('password.request') }}">Forgot
                                        Password ?</a>
                                </div> --}}
                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" type="submit">Sign In</button>
                                <div class="d-flex align-items-center justify-content-center">
                                    <p class="fs-4 mb-0 fw-medium">New Member ?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('register') }}">Create an
                                        account</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
