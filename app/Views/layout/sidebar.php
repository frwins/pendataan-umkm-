<!-- Sidebar -->
<ul class="navbar-nav bg-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-water"></i>
        </div>
        <div class="sidebar-brand-text mx-3">UMKM BS</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/datadiri/dashboard') ?>">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span></a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">


    <!-- Nav Item - edit Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/datadiri/tambah') ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Isi Data Diri</span></a>
    </li>

    <!-- Nav Item - edit Profile -->
    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/datadiri/aksi') ?>">
            <i class="fas fa-fw fa-table"></i>
            <span>Cek Data diri</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/datadiri/notifikasi') ?>">
            <i class="fas fa-fw fa-bell"></i>
            <span>Notifikasi</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= site_url('/datadiri/akun-pengguna') ?>">
            <i class="fas fa-fw fa-users"></i>
            <span>Ganti Password</span></a>
    </li>


    <!-- Nav Item - logout -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->