<button class="toggle-btn" onclick="toggleSidebar()">☰</button>

<div class="sidebar" id="sidebar">
    <div>
        <h4>TEL-U LOOKS</h4>
        <hr>
        <a href="{{ route('admin.rekomendasi.index') }}" class="{{ request()->routeIs('admin.rekomendasi.index') ? 'active' : '' }}">
            <i class="bi bi-list-ul"></i>
            <span>Daftar Rekomendasi</span>
        </a>
        <!-- Tambahkan menu admin lainnya -->
    </div>
    <form action="{{ route('logout') }}" method="POST" class="logout">
        @csrf
        <button type="submit" class="btn">
            <i class="bi bi-box-arrow-right"></i>
            <span>Keluar</span>
        </button>
    </form>
</div>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const contentWrapper = document.querySelector('.content-wrapper');
        sidebar.classList.toggle('collapsed');
        if (sidebar.classList.contains('collapsed')) {
            contentWrapper.style.marginLeft = '60px';
            contentWrapper.style.width = 'calc(100% - 60px)';
        } else {
            contentWrapper.style.marginLeft = '250px';
            contentWrapper.style.width = 'calc(100% - 250px)';
        }
    }
</script>
