<footer class="site-footer">
    <div class="footer-inner">
        <a class="brand footer-brand" href="{{ route('dashboard', ['username' => $username ?? 'Pengunjung']) }}">
            <span class="brand-mark">J</span><span>Jember<span class="brand-light">Explore</span></span>
        </a>
        <p>Temukan cerita dan keindahan dari setiap sudut Jember.</p>
        <span class="copyright">© {{ date('Y') }} JemberExplore</span>
    </div>
</footer>
