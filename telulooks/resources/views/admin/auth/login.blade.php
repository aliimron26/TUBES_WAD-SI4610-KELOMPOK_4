@extends('layouts.auth')

@section('title', 'Admin Login - Tel-U Looks')

@section('content')
    <div class="container">
        <div class="container-left">
            <h1>Welcome Back</h1>
            <p>Please login to admin account</p>

            @if ($errors->any())
                <div class="error-message">
                    {{ $errors->first() }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="input-container">
                    <input type="text" id="username" name="username" placeholder="Username" class="input-field" required value="{{ old('username') }}">
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                </div>
                <button type="submit">Login</button>
            </form>
            <hr style="width: 100%; max-width: 300px; margin: 20px 0;">
            <button onclick="location.href='{{ route('login') }}'" style="background-color: #ff4d4d;">Login as User</button>
        </div>
        <div class="container-right">
            <img src="{{ asset('assets/Logo-P.png') }}" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
@endsection
