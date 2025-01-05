@extends('layouts.admin')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-body">
                <h2 class="card-title text-center mb-4">Buat Artikel Baru</h2>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Judul Artikel:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                            value="{{ old('title') }}" placeholder="Masukkan judul artikel" required>
                    </div>

                    <div class="mb-3">
                        <label for="content" class="form-label">Isi Konten:</label>
                        <div class="btn-group mb-2">
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertTag('b')">
                                <i class="bi bi-type-bold"></i> Bold
                            </button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" onclick="insertTag('i')">
                                <i class="bi bi-type-italic"></i> Italic
                            </button>
                        </div>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10"
                            placeholder="Masukkan isi artikel (gunakan Ctrl+B untuk bold dan Ctrl+I untuk italic)" required>{{ old('content') }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Gambar:</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" accept="image/*"
                            required>
                        <div class="form-text">Format yang diperbolehkan: JPG, JPEG, PNG, GIF. Maksimal ukuran: 2MB</div>
                    </div>

                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success">Buat Artikel</button>
                        <a href="{{ route('admin.articles.index') }}" class="btn btn-secondary">Kembali ke Daftar Artikel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('scripts')
        <script>
            function insertTag(tag) {
                const textarea = document.getElementById('content');
                const start = textarea.selectionStart;
                const end = textarea.selectionEnd;
                const selectedText = textarea.value.substring(start, end);
                const newText = `<${tag}>${selectedText}</${tag}>`;
                textarea.value = textarea.value.substring(0, start) + newText + textarea.value.substring(end);
                textarea.focus();
                textarea.selectionStart = start + newText.length;
                textarea.selectionEnd = start + newText.length;
            }

            document.addEventListener('keydown', function(event) {
                if (event.ctrlKey && event.key === 'b') {
                    event.preventDefault();
                    insertTag('b');
                }
                if (event.ctrlKey && event.key === 'i') {
                    event.preventDefault();
                    insertTag('i');
                }
            });
        </script>
    @endpush
@endsection
