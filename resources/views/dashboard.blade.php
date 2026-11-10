@extends('layouts.app')

@section('title', 'Beranda | JemberExplore')

@section('body')
<x-navbar :username="$username" active="dashboard" />
<main>
    <section class="hero-section">
        <div class="hero-content">
            <span class="eyebrow eyebrow-light">PESONA JAWA TIMUR</span>
            <h1>Temukan sisi lain<br>keindahan <em>Jember.</em></h1>
            <p>Mulai perjalananmu dari pantai yang menenangkan hingga alam yang menyegarkan.</p>
            <a class="btn btn-white" href="{{ route('pengelolaan', ['username' => $username]) }}">Jelajahi destinasi <span>→</span></a>
        </div>
        <div class="hero-caption"><span class="caption-line"></span> YOUR NEXT STORY STARTS HERE</div>
    </section>

    <section class="welcome-strip page-container">
        <div><span class="eyebrow">HALO, {{ strtoupper($username) }}</span><h2>Senang melihatmu kembali.</h2></div>
        <p>Sudah siap menemukan tempat baru untuk dikunjungi?</p>
    </section>

    <section class="section-block page-container">
        <div class="section-heading">
            <div><span class="eyebrow">PILIHAN UNTUKMU</span><h2>Rekomendasi wisata</h2><p>Beberapa tempat menarik untuk memulai perjalananmu.</p></div>
            <a class="text-link" href="{{ route('pengelolaan', ['username' => $username]) }}">Lihat semua wisata <span>→</span></a>
        </div>
        <div class="destination-grid">
            @foreach ($rekomendasi as $item)
                <article class="destination-card">
                    <div class="card-image-wrap"><img src="{{ $item['gambar'] }}" alt="Pemandangan {{ $item['nama'] }}" loading="lazy"><span class="category-pill">{{ $item['kategori'] }}</span></div>
                    <div class="card-content"><span class="location-text">⌖ {{ $item['lokasi'] }}</span><h3>{{ $item['nama'] }}</h3><p>{{ $item['deskripsi'] }}</p><a class="card-link" href="{{ route('pengelolaan', ['username' => $username]) }}">Lihat detail <span>→</span></a></div>
                </article>
            @endforeach
        </div>
    </section>

    <section class="explore-banner page-container"><div><span class="eyebrow eyebrow-light">WAKTUNYA KELUAR DAN MENJELAJAH</span><h2>Jember punya banyak<br>tempat untuk dikagumi.</h2></div><a class="btn btn-white" href="{{ route('pengelolaan', ['username' => $username]) }}">Temukan wisata <span>→</span></a></section>
</main>
@include('components.footer')
@endsection
