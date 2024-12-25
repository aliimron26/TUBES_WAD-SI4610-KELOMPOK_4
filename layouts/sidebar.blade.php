<div class="sidebar d-flex flex-column p-3 bg-primary text-white" style="width: 250px;">
    <h4 class="text-center font-weight-bold">Manajemen Data</h4>
    <hr class="border-white">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="{{ route('dosen.index') }}" class="nav-link text-white {{ request()->routeIs('dosen.index') ? 'active bg-secondary' : '' }}">
                <i class="bi bi-person-fill me-2"></i> Daftar Dosen
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('mahasiswa.index') }}" class="nav-link text-white {{ request()->routeIs('mahasiswa.index') ? 'active bg-secondary' : '' }}">
                <i class="bi bi-person-lines-fill me-2"></i> Daftar Mahasiswa
            </a>
        </li>
    </ul>
</div>
