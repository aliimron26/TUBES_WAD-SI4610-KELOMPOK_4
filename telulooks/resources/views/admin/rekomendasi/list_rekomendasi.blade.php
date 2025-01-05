@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Daftar Rekomendasi Fashion</h2>

    <!-- Tabel Menampilkan Data Rekomendasi -->
    <div class="card">
        <div class="card-body">
            @if($status)
                <div class="alert alert-{{ $status == 'success' ? 'success' : 'danger' }}">
                    @if($status == 'success')
                        Data berhasil diperbarui!
                    @elseif($status == 'terhapus')
                        Data berhasil dihapus!
                    @else
                        Terjadi kesalahan, Data gagal diperbarui.
                    @endif
                </div>
            @endif

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nama Fashion</th>
                        <th>Deskripsi</th>
                        <th>Harga</th>
                        <th>Kategori</th>
                        <th>Shopee</th>
                        <th>Tokopedia</th>
                        <th>Lazada</th>
                        <th>Aksi</th> 
                    </tr>
                </thead>
                <tbody>
                    @forelse($recommendations as $recommendation)
                        <tr>
                            <td>{{ $recommendation->nama_fashion }}</td>
                            <td>{{ $recommendation->deskripsi_fashion }}</td>
                            <td>{{ $recommendation->harga }}</td>
                            <td>{{ $recommendation->kategori }}</td>
                            <td><a href="{{ $recommendation->link_affiliate_shopee }}" target="_blank">Shopee</a></td>
                            <td><a href="{{ $recommendation->link_affiliate_tokopedia }}" target="_blank">Tokopedia</a></td>
                            <td><a href="{{ $recommendation->link_affiliate_lazada }}" target="_blank">Lazada</a></td>
                            <td>
                                <a href="{{ route('recommendations.edit', $recommendation->id) }}" class="btn btn-warning btn-sm">Update</a>
                                <form action="{{ route('recommendations.destroy', $recommendation->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="8">Tidak ada rekomendasi yang ditemukan.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
