@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Update Rekomendasi Fashion</h2>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('recommendations.update', $recommendation->id) }}" method="POST" enctype="multipart/form-data" id="fashionForm">
                @csrf
                @method('PUT')

                <div class="section-header">Informasi Produk</div>

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Fashion</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $recommendation->nama_fashion) }}" placeholder="Contoh: Seragam Mahasiswa Teknik" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi Fashion</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi singkat mengenai produk" required>{{ old('deskripsi', $recommendation->deskripsi_fashion) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="harga" class="form-label">Harga Fashion (Rp)</label>
                    <input type="number" class="form-control" id="harga" name="harga" value="{{ old('harga', $recommendation->harga) }}" placeholder="Masukkan harga produk" required>
                </div>

                <!-- Kategori -->
                <div class="section-header">Kategori Pengguna</div>
                <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="dosen" name="kategori[]" value="Dosen" {{ in_array('Dosen', explode(', ', $recommendation->kategori)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="dosen">Rekomendasi untuk Dosen</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="mahasiswa" name="kategori[]" value="Mahasiswa" {{ in_array('Mahasiswa', explode(', ', $recommendation->kategori)) ? 'checked' : '' }}>
                        <label class="form-check-label" for="mahasiswa">Rekomendasi untuk Mahasiswa</label>
                    </div>
                </div>

                <!-- Link Afiliasi -->
                <div class="section-header">Link Afiliasi</div>
                <div class="mb-3">
                    <label for="link_shopee" class="form-label">Link Afiliasi Shopee</label>
                    <input type="url" class="form-control" id="link_shopee" name="link_shopee" value="{{ old('link_shopee', $recommendation->link_affiliate_shopee) }}" placeholder="Masukkan URL afiliasi Shopee">
                </div>
                <div class="mb-3">
                    <label for="link_tokopedia" class="form-label">Link Afiliasi Tokopedia</label>
                    <input type="url" class="form-control" id="link_tokopedia" name="link_tokopedia" value="{{ old('link_tokopedia', $recommendation->link_affiliate_tokopedia) }}" placeholder="Masukkan URL afiliasi Tokopedia">
                </div>
                <div class="mb-3">
                    <label for="link_lazada" class="form-label">Link Afiliasi Lazada</label>
                    <input type="url" class="form-control" id="link_lazada" name="link_lazada" value="{{ old('link_lazada', $recommendation->link_affiliate_lazada) }}" placeholder="Masukkan URL afiliasi Lazada">
                </div>

                <!-- Unggah Foto -->
                <div class="section-header">Unggah Foto</div>
                <div class="mb-3">
                    <label for="gambar" class="form-label">Unggah Foto Fashion</label>
                    <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*">
                    <p>Foto saat ini: {!! $recommendation->image ? '<img src="' . asset('storage/rekomendasi/' . $recommendation->image) . '" width="400">' : 'Tidak ada gambar' !!}</p>
                </div>

                <!-- Tombol -->
                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary px-4 py-2">Update Rekomendasi</button>
                    <a href="{{ route('recommendations.index') }}" class="btn btn-secondary px-4 py-2">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
