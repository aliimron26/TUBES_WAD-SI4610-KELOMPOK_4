@extends('layouts.app')

@section('title', 'User Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/user_profile.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
@endpush

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7">
                <div class="card p-3 py-4">
                    <div class="text-center">
                        <img src="{{ $profile?->profile_image_url ?? 'https://i.imgur.com/bDLhJiP.jpg' }}" width="100" class="rounded-circle">
                    </div>

                    <div class="text-center mt-3">
                        <h5 class="mt-2 mb-0">{{ $user->name }}</h5>

                        @if ($interests)
                            <p class="mt-2 mb-1">Interest Fashion:</p>
                            <div style="display: flex; justify-content: center; flex-wrap: wrap;">
                                @foreach ($interests as $interest)
                                    <span
                                        style="background-color: #059ea3; border-radius: 10px; padding: 5px 10px; color: white; margin-right: 5px; margin-bottom: 5px;">
                                        {{ $interest }}
                                    </span>
                                @endforeach
                            </div>
                        @endif

                        <div class="px-4 mt-1">
                            <p class="fonts">{{ $profile?->bio }}</p>
                        </div>

                        <ul class="social-list">
                            <li><a href="{{ $profile?->twitter_url ?? '#' }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="{{ $profile?->facebook_url ?? '#' }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="{{ $profile?->whatsapp_url ?? '#' }}" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                            <li><a href="{{ $profile?->linkedin_url ?? '#' }}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="{{ $profile?->instagram_url ?? '#' }}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        </ul>

                        <div class="a">
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-primary px-4">Edit Profile</a>
                            <a href="{{ route('home') }}" class="btn btn-primary px-4 ms-3">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
