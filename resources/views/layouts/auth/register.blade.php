@extends('layouts.back.base')

@section('content')
    <div
        class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
            <div class="row justify-content-center w-100">
                <div class="col-md-8 col-lg-6 col-xxl-3">
                    <div class="card mb-0">
                        <div class="card-body">
                            <a href="{{ route('frontend') }}" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                                <img src="{{ asset('srs-dummylogo.png') }}" class="img-fluid" />
                            </a>

                            <form action="{{ route('signUp') }}" method="POST">
                                @csrf

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Cutomer Name</label>
                                    <input type="text" name="name" :value="old('name')" required
                                        class="form-control @error('name') is-invalid @enderror" id="exampleInputtext"
                                        aria-describedby="textHelp">
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">User Name</label>
                                    <input type="text" name="user_name" :value="old('user_name')" required
                                        class="form-control @error('user_name') is-invalid @enderror" id="exampleInputtext"
                                        aria-describedby="textHelp">
                                    @error('user_name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" name="email" type="email" :value="old('email')" required
                                        class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        id="exampleInputPassword1" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="exampleInputPassword1" class="form-label">Password Confirm</label>
                                    <input type="password" name="password_confirmation" class="form-control"
                                        id="exampleInputPassword1" required>
                                </div>

                                <button class="btn btn-primary w-100 py-8 mb-4 rounded-2" type="submit">Sign Up</button>

                                <div class="d-flex align-items-center">
                                    <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                                    <a class="text-primary fw-medium ms-2" href="{{ route('login') }}">Sign In</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
