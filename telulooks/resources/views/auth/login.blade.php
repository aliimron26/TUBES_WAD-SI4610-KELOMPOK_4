@extends('layouts.auth')

@section('title', 'Login - Tel-U Looks')

@section('content')
    <div class="container">
        <div class="container-left">
            <div class="toggle-buttons">
                <a href="#" class="toggle-btn active" data-sound="login">Login</a>
                <a href="{{ route('register') }}" class="toggle-btn" data-sound="register">Register</a>
            </div>
            <h1>Welcome Back</h1>
            <p>Please login to your account</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="input-container">
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field" required value="{{ old('email') }}">
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                </div>
                <button type="submit">Login</button>
            </form>

            <p class="forgot-password">
                <a href="#">Forgot Password?</a>
            </p>
            <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
            <hr style="width: 100%; max-width: 300px; margin: 20px 0;">
            <button onclick="location.href='{{ route('admin.login') }}'" style="background-color: #ff4d4d;">Login as Admin</button>
        </div>
        <div class="container-right">
            <img src="{{ asset('assets/Logo-P.png') }}" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
@endsection
