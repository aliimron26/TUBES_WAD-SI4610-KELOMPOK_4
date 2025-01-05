@extends('layouts.app')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section dark-background">
        <div id="hero-carousel" data-bs-interval="5000" class="container carousel carousel-fade" data-bs-ride="carousel">
            <div class="carousel-item active">
                <div class="carousel-container">
                    <h2 class="animate__animated animate__fadeInDown">Welcome to <span>Our Tel-U Looks</span></h2>
                    <p class="animate__animated animate__fadeInUp">Tel-U Looks: Explore, Inspire, Express</p>
                    <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
                </div>
            </div>
        </div>

        <svg class="hero-waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28"
            preserveAspectRatio="none">
            <defs>
                <path id="wave-path" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z"></path>
            </defs>
            <g class="wave1">
                <use xlink:href="#wave-path" x="50" y="3"></use>
            </g>
            <g class="wave2">
                <use xlink:href="#wave-path" x="50" y="0"></use>
            </g>
            <g class="wave3">
                <use xlink:href="#wave-path" x="50" y="9"></use>
            </g>
        </svg>
    </section>

    <!-- About Section -->
    <section id="about" class="about section">
        <div class="container">
            <div class="row position-relative">
                <div class="col-lg-6 about-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="{{ asset('assets/Logo-B.png') }}" alt="Tel-U Looks Logo">
                </div>

                <div class="col-lg-7" data-aos="fade-up" data-aos-delay="100">
                    <h2 class="inner-title">Tel-U Looks</h2>
                    <div class="our-story">
                        <h4>Est 2024</h4>
                        <h3>Our Story</h3>
                        <p>Tel-U Looks adalah sebuah platform berbasis web yang dirancang untuk memenuhi kebutuhan informasi dan inspirasi fashion bagi
                            mahasiswa dan dosen di lingkungan akademik. Website ini berfungsi sebagai:</p>
                        <ul>
                            <li><i class="bi bi-check-circle"></i> <span>Pusat informasi gaya busana terkini</span></li>
                            <li><i class="bi bi-check-circle"></i> <span>Menampilkan berita-berita terkait fashion baik di skala nasional maupun
                                    internasional</span></li>
                        </ul>
                        <p>Dengan fitur-fitur yang interaktif, Tel-U Looks bertujuan untuk memberikan pengalaman yang personal dan informatif bagi
                            penggunanya, baik mereka yang hanya sekedar melihat-lihat rekomendasi maupun yang ingin lebih berkontribusi, seperti membuat
                            review atau menyimpan rekomendasi di wishlist.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Section -->
    <section id="product" class="product section">
        <div class="container section-title">
            <h2>Rekomendasi Fashion</h2>
            <p>Koleksi fashion terkini, lagi trending, dan lainnya ada disini</p>
        </div>

        <div class="container-fluid">
            <div class="row g-0">
                @foreach ($rekomendasi as $item)
                    <div class="col-lg-3 col-md-4">
                        <div class="gallery-item">
                            <a href="{{ route('rekomendasi.detail', $item->id_rekomendasi) }}">
                                <img src="{{ asset('assets/rekomendasi/' . $item->image) }}" alt="{{ $item->nama_fashion }}" class="img-fluid">
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="contact section" style="margin-top: 50px;">
        <div class="container section-title" data-aos="fade-up">
            <h2>Kontak</h2>
            <p>Ingin mengetahui lebih lanjut seputar fashion? Isi data diri dibawah ini</p>
        </div>

        <div class="container" data-aos="fade" data-aos-delay="100">
            <div class="row gy-4">
                <div class="col-lg-4">
                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
                        <i class="bi bi-geo-alt flex-shrink-0"></i>
                        <div>
                            <h3>Alamat</h3>
                            <p>Jl. Telekomunikasi No. 1, Bandung Terusan Buahbatu - Bojongsoang, Sukapura, Kec. Dayeuhkolot, Kabupaten Bandung, Jawa Barat
                                40257</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
                        <i class="bi bi-telephone flex-shrink-0"></i>
                        <div>
                            <h3>Hubungi Kami</h3>
                            <p>+1 5589 55488 55</p>
                        </div>
                    </div>

                    <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
                        <i class="bi bi-envelope flex-shrink-0"></i>
                        <div>
                            <h3>Email Kami</h3>
                            <p>Looks@mail.com</p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8">
                    <form action="{{ route('contact.send') }}" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200"
                        id="contactForm">
                        @csrf
                        <div class="row gy-4">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="Nama" placeholder="Nama" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="subject" placeholder="Subject" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="6" placeholder="Message" required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <div class="loading">Loading</div>
                                <div class="error-message"></div>
                                <div class="sent-message">Your message has been sent. Thank you!</div>
                                <button type="submit">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Audio Elements -->
    <audio id="home-sound" src="{{ asset('assets/audio/home.mp3') }}"></audio>
    <audio id="about-sound" src="{{ asset('assets/audio/about.mp3') }}"></audio>
    <audio id="rekomendasi-sound" src="{{ asset('assets/audio/rekomendasi.mp3') }}"></audio>
    <audio id="kontak-sound" src="{{ asset('assets/audio/kontak.mp3') }}"></audio>
    <audio id="login-sound" src="{{ asset('assets/audio/login.mp3') }}"></audio>
@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Initialize AOS
            AOS.init();

            // Initialize Bootstrap components
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });
    </script>

    <script>
        document.getElementById('contactForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const form = this;
            const formData = new FormData(form);
            const loadingElement = form.querySelector('.loading');
            const errorElement = form.querySelector('.error-message');
            const sentElement = form.querySelector('.sent-message');

            // Reset messages
            loadingElement.style.display = 'block';
            errorElement.style.display = 'none';
            sentElement.style.display = 'none';

            fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                    }
                })
                .then(response => response.json())
                .then(data => {
                    loadingElement.style.display = 'none';
                    if (data.success) {
                        sentElement.style.display = 'block';
                        form.reset();
                    } else {
                        errorElement.textContent = data.message;
                        errorElement.style.display = 'block';
                    }
                })
                .catch(error => {
                    loadingElement.style.display = 'none';
                    errorElement.textContent = 'An error occurred. Please try again.';
                    errorElement.style.display = 'block';
                });
        });
    </script>
@endpush
