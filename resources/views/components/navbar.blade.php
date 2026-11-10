@props(['username' => 'Pengunjung', 'active' => 'dashboard'])
<header class="site-header">
    <div class="nav-wrap">
        <a class="brand" href="{{ route('dashboard', ['username' => $username]) }}">
            <span class="brand-mark">J</span>
            <span>Jember<span class="brand-light">Explore</span></span>
        </a>
        <button class="menu-toggle" type="button" aria-label="Buka navigasi" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
        <nav class="main-nav">
            <a class="{{ $active === 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard', ['username' => $username]) }}">Beranda</a>
            <a class="{{ $active === 'pengelolaan' ? 'active' : '' }}" href="{{ route('pengelolaan', ['username' => $username]) }}">Jelajahi Wisata</a>
            <a class="{{ $active === 'profile' ? 'active' : '' }}" href="{{ route('profile', ['username' => $username]) }}">Profil</a>
        </nav>
        <div class="nav-user">
            <span class="avatar-small">{{ strtoupper(substr($username, 0, 1)) }}</span>
            <span>{{ $username }}</span>
            <a class="logout-link" href="{{ route('logout') }}" title="Keluar" aria-label="Keluar">↗</a>
        </div>
    </div>
</header>
