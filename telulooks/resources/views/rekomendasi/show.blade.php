@extends('layouts.app')

@section('content')
    <main class="main">
        <section class="detail section">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <img src="{{ asset('storage/rekomendasi/' . $rekomendasi->image) }}" alt="{{ $rekomendasi->nama_fashion }}" class="img-fluid">
                    </div>
                    <div class="col-md-6">
                        <h2>{{ $rekomendasi->nama_fashion }}</h2>
                        <p><strong>Deskripsi:</strong> {{ $rekomendasi->deskripsi_fashion }}</p>
                        <p><strong>Harga:</strong> {{ $rekomendasi->formatted_harga }}</p>
                        <p><strong>Kategori:</strong> {{ $rekomendasi->kategori }}</p>

                        @auth
                            <button class="btn mt-3" style="background-color:white; color:#059ea3; border-color:#059ea3"
                                onclick="addToWishlist({{ $rekomendasi->id_rekomendasi }})">
                                Tambah ke Wishlist
                            </button>
                        @endauth

                        <button class="btn mt-3" style="background-color:#059ea3; color:white" data-bs-toggle="modal" data-bs-target="#platformModal">
                            Beli Sekarang
                        </button>
                    </div>
                </div>

                @auth
                    <div class="container mt-5">
                        <h4>Komentar</h4>
                        <div id="commentForm" class="form-floating mb-4">
                            <textarea class="form-control" placeholder="Tulis Komentar..." id="floatingTextarea" style="height: 100px;"></textarea>
                            <label for="floatingTextarea">Tuliskan komentar anda disini...</label>
                            <button class="btn btn-primary mt-2" id="submitComment">Kirim</button>
                        </div>
                        <div id="commentSection"></div>
                    </div>
                @else
                    <div class="container mt-5">
                        <div class="alert alert-info">
                            Silakan <a href="{{ route('login') }}">login</a> untuk menambahkan komentar
                        </div>
                    </div>
                @endauth
            </div>
        </section>

        <!-- Modal Platform -->
        <div class="modal fade" id="platformModal" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pilih Platform untuk Membeli Produk</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body text-center">
                        @if (empty($rekomendasi->link_affiliate_shopee) && empty($rekomendasi->link_affiliate_tokopedia) && empty($rekomendasi->link_affiliate_lazada))
                            <p class="text-danger">Link pembelian tidak tersedia.</p>
                        @else
                            <div class="d-flex justify-content-center gap-3">
                                @if ($rekomendasi->link_affiliate_shopee)
                                    <a href="{{ $rekomendasi->link_affiliate_shopee }}" target="_blank" class="btn btn-warning">Shopee</a>
                                @endif

                                @if ($rekomendasi->link_affiliate_tokopedia)
                                    <a href="{{ $rekomendasi->link_affiliate_tokopedia }}" target="_blank" class="btn btn-success">Tokopedia</a>
                                @endif

                                @if ($rekomendasi->link_affiliate_lazada)
                                    <a href="{{ $rekomendasi->link_affiliate_lazada }}" target="_blank" class="btn btn-primary">Lazada</a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </main>

    @push('scripts')
        <script>
            function addToWishlist(id) {
                fetch(`/wishlist/add/${id}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        Swal.fire({
                            title: data.success ? 'Berhasil' : 'Gagal',
                            text: data.message,
                            icon: data.success ? 'success' : 'error',
                            confirmButtonText: 'OK'
                        });
                    });
            }
        </script>
    @endpush
@endsection
