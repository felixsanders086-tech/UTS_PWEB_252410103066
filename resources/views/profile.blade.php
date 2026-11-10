@extends('layouts.app')

@section('title', 'Profil | JemberExplore')

@section('body')
<x-navbar :username="$username" active="profile" />
<main class="page-container profile-page">
    <section class="page-intro"><span class="eyebrow">AKUN PENGUNJUNG</span><h1>Profil <em>pengguna.</em></h1><p>Informasi sederhana akun yang digunakan untuk menjelajahi JemberExplore.</p></section>
    <section class="profile-card">
        <div class="profile-avatar">{{ strtoupper(substr($username, 0, 1)) }}</div>
        <div class="profile-info"><span class="eyebrow">PENGUNJUNG JEMBEREXPLORE</span><h2>{{ $username }}</h2><p>Selamat datang! Semoga kamu menemukan destinasi menarik untuk perjalanan berikutnya.</p><span class="profile-status"><i></i> Pengunjung aktif (simulasi)</span></div>
        <div class="profile-actions"><a class="btn btn-primary" href="{{ route('pengelolaan', ['username' => $username]) }}">Jelajahi wisata <span>→</span></a><a class="text-link" href="{{ route('logout') }}">Keluar dari akun</a></div>
    </section>
</main>
@include('components.footer')
@endsection
