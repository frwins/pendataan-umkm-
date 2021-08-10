<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>


<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Daftar Data Diri</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>
        <div class="col-md">
            <a href="<?= site_url('datadiri/excel') ?>" class="btn btn-outline-success shadow float-right">Excel <i class="fa fa-file-excel"></i></a>
        </div>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">No.KTP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Pekerjaan</th>
                        <th scope="col">Pendapatan</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $i = 1; ?>
                    <?php foreach ($datadiri as $d) : ?>

                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['KTP']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td><?= $d['pekerjaan']; ?></td>
                            <td><?= $d['pendapatan']; ?></td>
                            <td><?= $d['telpon']; ?></td>
                            <td>
                                <a href="/datadiri/edit/<?= $d['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="/datadiri/delete/<?= $d['id']; ?>" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <?php foreach ($datadiri2 as $d) : ?>

                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['KTP']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td><?= $d['pekerjaan']; ?></td>
                            <td><?= $d['pendapatan']; ?></td>
                            <td><?= $d['telpon']; ?></td>
                            <td>
                                <a href="/datadiri/edit/<?= $d['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="/datadiri/delete2/<?= $d['id']; ?>" class="btn btn-danger">Delete</a>

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