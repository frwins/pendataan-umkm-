<?= $this->extend('layout2/index'); ?>
<?= $this->section('page-content'); ?>

<?php

?>

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
            if (!empty($datadiri2))
            {
            ?>
                
                <a href="/datadiri2/kirim/<?= $datadiri2['id']; ?>" class="btn btn-outline-success shadow float-right">Kirim</a>
            <?php
            
            }
            ?>
            
            
        </div>
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
                if (!empty($datadiri2))
                            {
                            ?>
                <?php $i = 1; ?>
                

                    <tr>
                        <th scope="row"><?= $i++; ?></th>
                        <td><?= $datadiri2['KTP']; ?></td>
                        <td><?= $datadiri2['nama']; ?></td>
                        <td><?= $datadiri2['alamat']; ?></td>
                        <td><?= $datadiri2['pekerjaan']; ?></td>
                        <td><?= $datadiri2['pendapatan']; ?></td>
                        <td><?= $datadiri2['telpon']; ?></td>
                        <td>
                            <a href="/datadiri2/edit/<?= $datadiri2['id']; ?>" class="btn btn-warning">Edit</a>
                            <a href="/datadiri2/delete/<?= $datadiri2['id']; ?>" class="btn btn-danger">Delete</a>

                        </td>
                    </tr>
                <?php
                            }
                ?>
            </tbody>
        </table>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="js/datatables-simple-demo.js"></script>

<?= $this->endSection('page-content'); ?>