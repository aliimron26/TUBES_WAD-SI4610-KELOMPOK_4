<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Tel-U Looks')</title>

    <!-- CSS -->
    <link href="{{ asset('assets/css/login_register.css') }}" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&family=Poppins:wght@100;300;400;500;600;700;900&display=swap"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">

    @stack('styles')
</head>

<body>
    @yield('content')

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (Session::has('success'))
        <script>
            Swal.fire({
                title: 'Berhasil!',
                text: "{{ Session::get('success') }}",
                icon: 'success',
                timer: 1500,
                showConfirmButton: false
            });
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ Session::get('error') }}",
                icon: 'error',
                confirmButtonText: 'Ok'
            });
        </script>
    @endif

    <!-- Audio Elements -->
    <audio id="home-sound" src="{{ asset('assets/audio/home.mp3') }}"></audio>
    <audio id="about-sound" src="{{ asset('assets/audio/about.mp3') }}"></audio>
    <audio id="rekomendasi-sound" src="{{ asset('assets/audio/rekomendasi.mp3') }}"></audio>
    <audio id="kontak-sound" src="{{ asset('assets/audio/kontak.mp3') }}"></audio>
    <audio id="login-sound" src="{{ asset('assets/audio/login.mp3') }}"></audio>

    <script>
        document.querySelectorAll('[data-sound]').forEach(item => {
            item.addEventListener('mouseover', () => {
                const soundId = item.getAttribute('data-sound') + '-sound';
                const audio = document.getElementById(soundId);
                if (audio) {
                    audio.currentTime = 0;
                    audio.play();
                }
            });
        });
    </script>

    @stack('scripts')
</body>

</html>
