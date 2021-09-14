<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>


<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Notifikasi</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
        
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" style="width: 10%;">no</th>
                        <th scope="col">Username</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    ?>
                    <?php foreach ($dataAkun as $d) : ?>
                    <tr>
                        <td><?= $nomor++ ?></td>
                        <td><?= $d['username'] ?></td>
                        <td>
                            <a href="akun-pengguna/reset-password/<?= $d['id'] ?>" class="btn btn-warning">Reset Password</a>
                            <!-- <a href="notifikasi/hapus/<?= $d['id'] ?>" class="btn btn-danger">Delete</a> -->
                        </td>
                    </tr>
                    <?php endforeach; ?>
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>


<?= $this->endSection('page-content'); ?>