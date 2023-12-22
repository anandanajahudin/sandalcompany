@extends('layouts.back.authentication')

@section('title', 'Login')

@section('content')

    <p class="text-center">Company Login</p>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            {{ $message }}
        </div>
    @elseif ($message = Session::get('error'))
        <div class="alert alert-danger">
            {{ $message }}
        </div>
    @endif

    <form action="{{ route('signIn') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" required>

            @error('email')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

            @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        {{-- <div class="d-flex align-items-center justify-content-between mb-4">
            <a class="text-primary fw-bold" href="{{ route('forgotPassword') }}">Forgot Password ?</a>
        </div> --}}

        <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">
            Sign In</button>

        <div class="d-flex align-items-center justify-content-center">
            <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
            <a class="text-primary fw-bold ms-2" href="{{ route('register') }}">Create an
                account</a>
        </div>
    </form>

@endsection
