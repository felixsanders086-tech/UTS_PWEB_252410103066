@extends('layouts.app')

@section('title', 'Jelajahi Wisata | JemberExplore')

@section('body')
<x-navbar :username="$username" active="pengelolaan" />
<main class="page-container listing-page">
    <section class="page-intro"><span class="eyebrow">DIREKTORI DESTINASI</span><h1>Jelajahi wisata <em>Jember.</em></h1><p>Temukan inspirasi perjalanan dari berbagai destinasi pilihan di Kabupaten Jember.</p></section>

    <section class="search-panel">
        <form action="{{ route('pengelolaan') }}" method="GET" class="search-form">
            <input type="hidden" name="username" value="{{ $username }}">
            <label class="search-input-wrap"><span>⌕</span><input type="search" name="q" value="{{ $kataKunci }}" placeholder="Cari nama tempat wisata..." aria-label="Cari nama tempat wisata"></label>
            <button class="btn btn-primary" type="submit">Cari wisata</button>
        </form>
        <span class="result-count">{{ count($wisata) }} destinasi ditemukan</span>
    </section>

    @if ($kataKunci !== '')
        <p class="search-caption">Hasil pencarian untuk <strong>“{{ $kataKunci }}”</strong> · <a href="{{ route('pengelolaan', ['username' => $username]) }}">Hapus pencarian</a></p>
    @endif

    @if (count($wisata) > 0)
        <div class="destination-grid listing-grid">
            @foreach ($wisata as $item)
                <article class="destination-card">
                    <div class="card-image-wrap"><img src="{{ $item['gambar'] }}" alt="Pemandangan {{ $item['nama'] }}" loading="lazy"><span class="category-pill">{{ $item['kategori'] }}</span></div>
                    <div class="card-content"><span class="location-text">⌖ {{ $item['lokasi'] }}</span><h3>{{ $item['nama'] }}</h3><p>{{ $item['deskripsi'] }}</p><div class="fact-box"><strong>TAHUKAH KAMU?</strong><span>{{ $item['fakta'] }}</span></div>
                    @if (!empty($item['maps']))
                        <a class="btn btn-map" href="{{ $item['maps'] }}" target="_blank" rel="noopener noreferrer">Lihat di Google Maps ↗</a>
                    @else
                        <span class="btn btn-map btn-disabled" aria-disabled="true">Link Google Maps belum diisi</span>
                    @endif
                    </div>
                </article>
            @endforeach
        </div>
    @else
        <div class="empty-state"><span>⌕</span><h2>Wisata tidak ditemukan</h2><p>Coba gunakan kata kunci nama tempat yang berbeda.</p><a class="btn btn-primary" href="{{ route('pengelolaan', ['username' => $username]) }}">Tampilkan semua wisata</a></div>
    @endif
</main>
@include('components.footer')
@endsection
