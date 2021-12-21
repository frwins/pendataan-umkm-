<?= $this->extend('layout2/index'); ?>
<?= $this->section('page-content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />


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
            <?php
            if (!empty($datadiri2)) {
            ?>

            <?php

            }
            ?>


        </div>

        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">no</th>
                        <th scope="col">No.KTP</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scopae="col">Pekerjaan</th>
                        <th scope="col">Pendapatan</th>
                        <th scope="col">Telpon</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($datadiri2)) {
                    ?>
                        <?php $i = 1;

                        foreach ($datadiri2 as $data) {



                        ?>


                            <tr>
                                <th scope="row"><?= $i++; ?></th>
                                <td><?= $data['KTP']; ?></td>
                                <td><?= $data['nama']; ?></td>
                                <td><?= $data['alamat']; ?></td>
                                <td><?= $data['pekerjaan']; ?></td>
                                <td><?= $data['pendapatan']; ?></td>
                                <td><?= $data['telpon']; ?></td>
                                <td>
                                    <a href="/datadiri2/edit/<?= $data['id']; ?>" class="btn btn-warning">Edit</a>
                                    <a href="/datadiri2/delete/<?= $data['id']; ?>" class="btn btn-danger">Delete</a>

                                </td>
                            </tr>
                    <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>


<?= $this->endSection('page-content'); ?>