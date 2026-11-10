@extends('layouts.app')

@section('title', 'Masuk | JemberExplore')

@section('body')
<main class="login-page">
    <section class="login-visual">
        <div class="login-visual-content">
            <a class="brand brand-white" href="{{ route('login') }}"><span class="brand-mark">J</span><span>Jember<span class="brand-light">Explore</span></span></a>
            <div class="login-message">
                <span class="eyebrow eyebrow-light">JELAJAHI JEMBER</span>
                <h1>Selalu ada cerita indah di setiap perjalanan.</h1>
                <p>Temukan pantai, air terjun, dan sudut alam Jember yang mungkin belum pernah kamu kunjungi.</p>
            </div>
            <span class="visual-note">KABUPATEN JEMBER · JAWA TIMUR</span>
        </div>
    </section>
    <section class="login-panel">
        <div class="login-box">
            <span class="eyebrow">SELAMAT DATANG</span>
            <h2>Mulai petualanganmu.</h2>
            <p class="muted">Masukkan username untuk menjelajahi rekomendasi wisata Jember.</p>
            <form action="{{ route('login.proses') }}" method="POST" class="login-form">
                @csrf
                <label for="username">Username</label>
                <input id="username" name="username" type="text" placeholder="Contoh: felix" value="{{ old('username') }}" minlength="3" maxlength="30" required autofocus>
                @error('username') <small class="field-error">{{ $message }}</small> @enderror
                <button class="btn btn-primary btn-full" type="submit">Masuk dan jelajahi <span>→</span></button>
            </form>
        </div>
    </section>
</main>
@endsection
