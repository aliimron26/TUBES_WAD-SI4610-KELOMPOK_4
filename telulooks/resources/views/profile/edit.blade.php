@extends('layouts.app')

@section('title', 'Edit Profile')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/manajemen_profil_pengguna.css') }}">
@endpush

@section('content')
    <div class="container light-style flex-grow-1 container-p-y">
        <a href="{{ route('profile.index') }}" class="btn btn-custom mb-3">
            <i class="fa fa-arrow-left"></i> Back
        </a>

        <h4 class="font-weight-bold py-3 mb-4">Account settings</h4>

        <button id="theme-switch">
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                <path
                    d="M480-120q-150 0-255-105T120-480q0-150 105-255t255-105q14 0 27.5 1t26.5 3q-41 29-65.5 75.5T444-660q0 90 63 153t153 63q55 0 101-24.5t75-65.5q2 13 3 26.5t1 27.5q0 150-105 255T480-120Z" />
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#e8eaed">
                <path d="M480-280q-83 0-141.5-58.5T280-480q0-83 58.5-141.5T480-680q83 0 141.5 58.5T680-480q0 83-58.5 141.5T480-280Z" />
            </svg>
        </button>

        <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card overflow-hidden">
                <div class="row no-gutters row-bordered row-border-light">
                    <div class="col-md-3 pt-0">
                        <div class="list-group list-group-flush account-settings-links">
                            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#account-general">General</a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#account-info">Info</a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#account-social-links">Social links</a>
                        </div>
                    </div>

                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="account-general">
                                <div class="card-body media align-items-center">
                                    <img id="profileImage" src="{{ $profile?->profile_image_url ?? 'https://i.imgur.com/bDLhJiP.jpg' }}" alt="Profile"
                                        class="d-block ui-w-80">
                                    <div class="media-body ml-4">
                                        <label class="btn btn-custom">
                                            Upload new photo
                                            <input type="file" class="account-settings-fileinput" name="profile_image" onchange="previewImage(event)">
                                        </label>
                                        <button type="button" class="btn btn-danger md-btn-flat mt-2" onclick="removeProfileImage()">Remove
                                            Photo</button>
                                    </div>
                                </div>

                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Username</label>
                                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username"
                                            value="{{ old('username', $user->username) }}" required>
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Name</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $user->name) }}" required>
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">E-mail</label>
                                        <input type="email" class="form-control" value="{{ $user->email }}" readonly>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="account-info">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Bio</label>
                                        <textarea class="form-control" name="bio" rows="5">{{ old('bio', $profile?->bio) }}</textarea>
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Interest Fashion</label>
                                        <select class="form-select" name="interest[]" multiple>
                                            @foreach ($availableInterests as $interest)
                                                <option value="{{ $interest }}" {{ in_array($interest, $interests) ? 'selected' : '' }}>
                                                    {{ $interest }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="account-social-links">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="form-label">Twitter</label>
                                        <input type="url" class="form-control" name="twitter_url"
                                            value="{{ old('twitter_url', $profile?->twitter_url) }}">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Facebook</label>
                                        <input type="url" class="form-control" name="facebook_url"
                                            value="{{ old('facebook_url', $profile?->facebook_url) }}">
                                    </div>

                                    <!-- Add other social media inputs -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-right mt-3">
                <button type="submit" class="btn btn-custom">Save changes</button>
                <button type="reset" class="btn btn-default">Reset</button>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImage');
                output.src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }

        function removeProfileImage() {
            document.getElementById('profileImage').src = 'https://i.imgur.com/hUQpigu.png';
        }

        // Dark mode toggle
        let darkmode = localStorage.getItem('darkmode');
        const themeSwitch = document.getElementById('theme-switch');

        const enableDarkmode = () => {
            document.body.classList.add('darkmode');
            localStorage.setItem('darkmode', 'active');
        }

        const disableDarkmode = () => {
            document.body.classList.remove('darkmode');
            localStorage.setItem('darkmode', null);
        }

        if (darkmode === "active") enableDarkmode();

        themeSwitch.addEventListener("click", () => {
            darkmode = localStorage.getItem('darkmode');
            darkmode !== "active" ? enableDarkmode() : disableDarkmode();
        });
    </script>
@endpush
