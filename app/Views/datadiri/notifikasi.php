<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />


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
                        <th scope="col">No.KTP</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor = 1;
                    ?>
                    <?php foreach ($notifikasi as $d) : ?>
                        <tr>
                            <td><?= $nomor++ ?></td>
                            <td><?= $d['username'] ?></td>
                            <td>
                                <a href="notifikasi/konfirmasi/<?= $d['id_notifikasi'] ?>" class="btn btn-success">Konfirmasi</a>
                                <a href="notifikasi/hapus/<?= $d['id_notifikasi'] ?>" class="btn btn-danger">Delete</a>
                            </td>
                        <?php endforeach; ?>
                        </tr>

                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>


<?= $this->endSection('page-content'); ?>