@extends('layouts.auth')

@section('title', 'Register - Tel-U Looks')

@section('content')
    <div class="container">
        <div class="container-left">
            <div class="toggle-buttons">
                <a href="{{ route('login') }}" class="toggle-btn" data-sound="login">Login</a>
                <a href="#" class="toggle-btn active" data-sound="register">Register</a>
            </div>
            <h1>Welcome</h1>
            <p>Please register your account</p>

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="input-container">
                    <input type="text" id="name" name="name" placeholder="Nama" class="input-field" required value="{{ old('name') }}">
                    <input type="text" id="username" name="username" placeholder="Username" class="input-field" required
                        value="{{ old('username') }}">
                    <input type="email" id="email" name="email" placeholder="Email" class="input-field" required value="{{ old('email') }}">
                    <input type="password" id="password" name="password" placeholder="Password" class="input-field" required>
                    <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" class="input-field"
                        required>
                </div>
                <button type="submit">Daftar</button>
            </form>

            <p>Already have an account? <a href="{{ route('login') }}">Login here</a></p>
        </div>
        <div class="container-right">
            <img src="{{ asset('assets/Logo-P.png') }}" alt="Tel-U Looks Logo">
            <h2>Tel-U Looks: Explore, Inspire, Express</h2>
        </div>
    </div>
@endsection
