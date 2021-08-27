<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

<div class="container">
<div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Data Diri</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= count($datadiri) + count($datadiri2)?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-6 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Pendaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?=  count($datadiri2)?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-users fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


</div>
    <div class="d-flex align-items-center p-3 my-3 text-black bg-purple rounded shadow-sm">
        <div class="lh-1">
            <h1 class="h6 mb-0 text-black lh-1">Halo, Admin</h1>
            <small>Selamat Datang kembali</small>
        </div>
    </div>
</div>

<div class="container">
    
    <div class="my-3 p-3 bg-body rounded shadow-sm">
        <h6 class="border-bottom pb-2 mb-0 ">Info Penting</h6>
        <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#007bff" /><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text>
            </svg>

            <p class="pb-0 mb-0 big lh-sm border-bottom">
                <strong class="d-block text-gray-dark">Jangan Lupa selalu cek semua data diri</strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#e83e8c" /><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text>
            </svg>

            <p class="pb-0 mb-0 big lh-sm border-bottom">
                <strong class="d-block text-gray-dark">Simpan file excel data UMKM setiap minggu </strong>
            </p>
        </div>
        <div class="d-flex text-muted pt-3">
            <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#6f42c1" /><text x="50%" y="50%" fill="#6f42c1" dy=".3em">32x32</text>
            </svg>
            <p class="pb-0 mb-0 big lh-sm border-bottom">
                <strong class="d-block text-gray-dark">Jangan Lupa untuk hapus semua data diri di hari minggu</strong>
            </p>
        </div>
    </div>
</div>







<?= $this->endSection('page-content'); ?>