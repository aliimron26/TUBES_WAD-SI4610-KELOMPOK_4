@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4">Wishlist</h2>

        <div class="row">
            @forelse($wishlists as $wishlist)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($wishlist->rekomendasi->image)
                            <img src="{{ asset('storage/rekomendasi/' . $wishlist->rekomendasi->image) }}" class="card-img-top"
                                alt="{{ $wishlist->rekomendasi->nama_fashion }}">
                        @endif

                        <div class="card-body">
                            <h5 class="card-title">{{ $wishlist->rekomendasi->nama_fashion }}</h5>
                            <p class="card-text">{{ $wishlist->rekomendasi->deskripsi_fashion }}</p>
                            <p class="card-text">
                                <strong>Harga:</strong> {{ $wishlist->rekomendasi->formatted_harga }}
                            </p>
                            <button class="btn btn-danger" onclick="removeFromWishlist({{ $wishlist->id_rekomendasi }})">
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-center">Tidak ada produk dalam wishlist.</p>
                </div>
            @endforelse
        </div>

        <div class="btn-share mt-4">
            <div class="btn_wrap">
                <span>Bagikan Wishlist</span>
                <div class="container">
                    <a href="https://www.facebook.com" target="_blank">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://twitter.com/" target="_blank">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.instagram.com/" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="https://github.com/" target="_blank">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function removeFromWishlist(id) {
                if (!confirm('Apakah Anda yakin ingin menghapus item ini dari wishlist?')) {
                    return;
                }

                fetch(`/wishlist/remove/${id}`, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            window.location.reload();
                        } else {
                            alert('Gagal menghapus item dari wishlist');
                        }
                    });
            }
        </script>
    @endpush

    @push('styles')
        <style>
            .btn-share {
                /* CSS untuk tombol share */
                display: flex;
                justify-content: center;
                margin-top: 2rem;
            }

            .btn-share .btn_wrap {
                position: relative;
                display: flex;
                justify-content: center;
                align-items: center;
                overflow: hidden;
                cursor: pointer;
                width: 240px;
                height: 72px;
                background-color: rgb(250, 250, 201);
                border-radius: 80px;
                padding: 0 18px;
                transition: all .2s ease-in-out;
            }

            /* Tambahkan CSS lainnya sesuai kebutuhan */
        </style>
    @endpush
@endsection
