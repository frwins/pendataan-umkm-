<?= $this->extend('template/index'); ?>
<?= $this->section('page-content'); ?>
<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Data Diri</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
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
                    <?php foreach ($isidata as $d) : ?>

                        <tr>
                            <th scope="row"><?= $i++; ?></th>
                            <td><?= $d['KTP']; ?></td>
                            <td><?= $d['nama']; ?></td>
                            <td><?= $d['alamat']; ?></td>
                            <td><?= $d['pekerjaan']; ?></td>
                            <td><?= $d['pendapatan']; ?></td>
                            <td><?= $d['telpon']; ?></td>
                            <td>
                                <a href="/isidata/edit/<?= $d['id']; ?>" class="btn btn-warning">Edit</a>
                                <a href="/isidata/delete/<?= $d['id']; ?>" class="btn btn-danger">Delete</a>

                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


            <form action="/isidata/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="KTP" class="col-sm-2 col-form-label">KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('KTP')) ? 'is-invalid' : ''; ?>" id="KTP" name="KTP" value="<?= old('KTP'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('KTP'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id=" nama" name="nama" value="<?= old('nama'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('alamat'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">pekerjaan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id=" pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('pekerjaan'); ?>
                        </div>
                    </div>
                </div>
                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">pendapatan</legend>
                    <div class="col-sm-10">
                        <div class="form-check <?= ($validation->hasError('pendapatan')) ? 'is-invalid' : ''; ?>" id="pendapatan" name="pendapatan">
                            <input class="form-check-input" type="radio" name="pendapatan" id="pendapatan" value="< Rp1.000.000">
                            <label class="form-check-label" for="pendapatan1">
                                < Rp1.000.000 </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="pendapatan" id="pendapatan" value="Rp1.000.000-Rp1.500.000">
                            <label class="form-check-label" for="pendapatan2">
                                Rp1.000.000-Rp1.500.000
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendapatan" id="pendapatan" value="Rp1.500.000-Rp2.000.000">
                            <label class="form-check-label" for="pendapatan3">
                                Rp1.500.000-Rp2.000.000
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendapatan" id="pendapatan" value="Rp2.000.000-Rp2.500.000">
                            <label class="form-check-label" for="pendapatan4">
                                Rp2.000.000-Rp2.500.000
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendapatan" id="pendapatan" value="Rp2.500.000-Rp3.000.000">
                            <label class="form-check-label" for="pendapatan5">
                                Rp2.500.000-Rp3.000.000
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pendapatan" id="pendapatan" value="Rp3.000.000 >">
                            <label class="form-check-label" for="pendapatan6">
                                > Rp3.000.000
                            </label>
                            <div class="invalid-feedback">Isi pendapatan dulu</div>
                        </div>
                    </div>
        </div>
    </div>
    <div class="row mb-3">
        <label for="telpon" class="col-sm-2 col-form-label">telpon</label>
        <div class="col-sm-10">
            <input type="text" class="form-control <?= ($validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" id=" telpon" name="telpon" value="<?= old('telpon'); ?>">
            <div class=" invalid-feedback">
                <?= $validation->getError('telpon'); ?>
            </div>
        </div>
    </div>
    </fieldset>
    <button type="submit" class="btn btn-primary">Tambah Data Diri</a>
        </form>

</div>
</div>
</div>
<?= $this->endSection('page-content'); ?>