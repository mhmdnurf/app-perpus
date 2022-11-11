    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <div class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">PERPUSTAKAAN</div>
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
            <a class="nav-link" href="/">
                <i class="fas fa-home"></i>
                <span>Dashboard</span></a>
        </li>
        <li class="nav-item {{ Request::is('data-anggota*') ? 'active' : '' }}">
            <a class="nav-link" href="/data-anggota">
                <i class="fas fa-users"></i>
                <span>Anggota</span></a>
        </li>
        <li class="nav-item {{ Request::is('data-buku*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="/data-buku" data-toggle="collapse" data-target="#collapseThree">
                <i class="fas fa-book"></i>
                <span>Buku</span></a>
            <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/data-buku">Data Buku</a>
                    <a class="collapse-item" href="/kategori">Kategori</a>
                    <a class="collapse-item" href="/rak">Rak Buku</a>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('data-transaksi*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Transaksi</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/data-peminjaman">Peminjaman</a>
                    <a class="collapse-item" href="/data-pengembalian"> Pengembalian</a>
                </div>
            </div>
        </li>
        <li class="nav-item {{ Request::is('laporan*') ? 'active' : '' }}">
            <a class="nav-link collapsed" href="" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="true" aria-controls="collapseFour">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Laporan</span>
            </a>
            <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="/anggota/report">Anggota</a>
                    <a class="collapse-item" href="/buku/report">Buku</a>
                    <a class="collapse-item" href="/pinjam/report">Peminjaman</a>
                    <a class="collapse-item" href="/pengembalian/report">Pengembalian</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->
