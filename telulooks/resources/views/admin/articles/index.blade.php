@extends('layouts.admin')

@section('content')
    <div class="container-fluid mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Manage Articles</h2>
            <a href="{{ route('admin.articles.create') }}" class="btn btn-primary">Tambah Artikel</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="card">
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul Artikel</th>
                            <th>Isi Konten</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($articles as $article)
                            <tr>
                                <td>{{ $article->title }}</td>
                                <td>{{ Str::limit($article->content, 50) }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" style="width: 100px;">
                                </td>
                                <td>
                                    <a href="{{ route('admin.articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Update</a>
                                    <form action="{{ route('admin.articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Tidak ada artikel yang ditemukan.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
