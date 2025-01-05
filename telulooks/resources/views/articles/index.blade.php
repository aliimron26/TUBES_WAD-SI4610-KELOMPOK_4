@extends('layouts.app')

@section('content')
    <main class="main">
        <section id="articles" class="articles section">
            <div class="container">
                <h2>Daftar Artikel</h2>
                <div class="row">
                    @foreach ($articles as $article)
                        <div class="col-lg-4 col-md-6">
                            <div class="article-item">
                                @if ($article->image)
                                    <img src="{{ asset('storage/' . $article->image) }}" alt="{{ $article->title }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('assets/img/default-image.png') }}" alt="Default Image" class="img-fluid">
                                @endif
                                <h3>{{ $article->title }}</h3>
                                <p>{{ Str::limit($article->content, 100) }}</p>
                                <div class="d-flex justify-content-between">
                                    <a href="{{ route('artikel.show', $article->id) }}" class="btn btn-primary">Baca Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    </main>
@endsection
