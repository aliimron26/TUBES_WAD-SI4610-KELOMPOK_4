@extends('layouts.app')

@section('content')
    <main class="main">
        <section id="rekomendasi" class="rekomendasi section">
            <div class="container">
                @auth
                    <div class="d-flex justify-content-end mb-4">
                        <a href="{{ route('rekomendasi.create') }}" class="btn btn-primary">+Recommendation</a>
                    </div>
                @endauth

                <h2>Daftar Rekomendasi Fashion</h2>
                <div class="row">
                    @forelse($rekomendasi as $item)
                        <div class="col-lg-4 col-md-6">
                            <div class="rekomendasi-item">
                                <img src="{{ asset('storage/rekomendasi/' . $item->image) }}" alt="{{ $item->nama_fashion }}" class="img-fluid">
                                <h3>{{ $item->nama_fashion }}</h3>
                                <p>{{ Str::limit($item->deskripsi_fashion, 100) }}</p>
                                <p><strong>Harga: </strong>{{ $item->formatted_harga }}</p>

                                <div class="d-flex justify-content-between mt-2">
                                    <span class="badge badge-primary">{{ $item->kategori }}</span>
                                    <span class="badge badge-secondary">{{ $item->status }}</span>
                                </div>

                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('rekomendasi.show', $item->id_rekomendasi) }}" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>Rekomendasi tidak ditemukan.</p>
                    @endforelse
                </div>
            </div>
        </section>
    </main>
@endsection
