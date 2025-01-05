@extends('layouts.app') <!-- Layout utama -->

@section('title', 'Tambah Rekomendasi Fashion') <!-- Title halaman -->

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
<link href="{{ asset('assets/css/add_rekomendasi.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="container mt-5">
    <h2>Tambah Rekomendasi Fashion</h2>
    <div class="card">
        <form action="{{ route('rekomendasi.store') }}" method="POST" enctype="multipart/form-data" id="fashionForm">
            @csrf <!-- Token CSRF -->
            
            <div class="section-header">Informasi Produk</div>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Fashion</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Contoh: Seragam Mahasiswa Teknik" required>
            </div>

            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi Fashion</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan deskripsi singkat mengenai produk" required></textarea>
            </div>

            <div class="mb-3">
                <label for="harga" class="form-label">Harga Fashion (Rp)</label>
                <input type="number" class="form-control" id="harga" name="harga" placeholder="Masukkan harga produk" required>
            </div>

            <div class="section-header">Kategori Pengguna</div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="dosen" name="kategori[]" value="Dosen">
                    <label class="form-check-label" for="dosen">Rekomendasi untuk Dosen</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="mahasiswa" name="kategori[]" value="Mahasiswa">
                    <label class="form-check-label" for="mahasiswa">Rekomendasi untuk Mahasiswa</label>
                </div>
            </div>

            <div class="section-header">Link Afiliasi</div>

            <div class="mb-3">
                <label for="link_shopee" class="form-label">Link Afiliasi Shopee</label>
                <input type="url" class="form-control" id="link_shopee" name="link_shopee" placeholder="Masukkan URL afiliasi Shopee">
            </div>

            <div class="mb-3">
                <label for="link_tokopedia" class="form-label">Link Afiliasi Tokopedia</label>
                <input type="url" class="form-control" id="link_tokopedia" name="link_tokopedia" placeholder="Masukkan URL afiliasi Tokopedia">
            </div>

            <div class="mb-3">
                <label for="link_lazada" class="form-label">Link Afiliasi Lazada</label>
                <input type="url" class="form-control" id="link_lazada" name="link_lazada" placeholder="Masukkan URL afiliasi Lazada">
            </div>

            <div class="section-header">Unggah Foto</div>

            <div class="mb-3">
                <label for="gambar" class="form-label">Unggah Foto Fashion</label>
                <input type="file" class="form-control" id="gambar" name="gambar" accept="image/*" required>
            </div>

            <div class="form-buttons">
                <button type="submit" class="btn btn-primary px-4 py-2">Simpan Rekomendasi</button>
                <button type="button" class="btn btn-cancel px-4 py-2" id="cancelButton" data-bs-toggle="modal" data-bs-target="#cancelModal">Batal</button>
            </div>
        </form>
    </div>
</div>

<div class="modal fade" id="cancelModal" tabindex="-1" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Konfirmasi Pembatalan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Apakah Anda yakin ingin membatalkan? Semua data yang diisi akan hilang.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger" id="confirmCancel">Ya, Batalkan</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    // JavaScript yang sama
</script>
@endpush
