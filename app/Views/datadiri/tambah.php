<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" />
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;400;500;600;700&display=swap" rel="stylesheet" />


<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Data Diri</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <form action="/datadiri/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="KTP" class="col-sm-2 col-form-label">KTP</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('KTP')) ? 'is-invalid' : ''; ?>" id="KTP" name="KTP" value="<?= old('KTP'); ?>" placeholder="Contoh : 33201326100000-02">
                        <div class="invalid-feedback">
                            <?= $validation->getError('KTP'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" id=" nama" name="nama" value="<?= old('nama'); ?>" placeholder="Masukan Nama">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('nama'); ?>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb-3">
                    <label for="alamat" class="col-sm-2 col-form-label">Alamat Rt/Rw</label>
                    <div class="col-sm-10">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">RT/RW</div>
                            </div>
                            <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>" placeholder="Contoh : 4/2">
                            <div class="invalid-feedback">
                                <?= $validation->getError('alamat'); ?>
                            </div>
                        </div>
                    </div>
                </div> -->

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Alamat Rt/Rw</legend>
                    <div class="col-sm-10">
                        <div class="form-check <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" id="alamat" name="alamat" value="<?= old('alamat'); ?>">
                            <input class="form-check-input" type="radio" name="alamat" id="alamat" value="Rt 1 Rw 1">
                            <label class="form-check-label" for="alamat1">
                                Rt 1 Rw 1 </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="alamat" id="alamat" value="Rt 2 Rw 1">
                            <label class="form-check-label" for="alamat2">
                                Rt 2 Rw 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 3 Rw 1">
                            <label class="form-check-label" for="alamat3">
                                Rt 3 Rw 1
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 4 Rw 1">
                            <label class="form-check-label" for="alamat4">
                                Rt 4 Rw 1
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 5 Rw 1">
                            <label class="form-check-label" for="alamat5">
                                Rt 5 Rw 1
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 6 Rw 1">
                            <label class="form-check-label" for="alamat6">
                                Rt 6 Rw 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 7 Rw 1">
                            <label class="form-check-label" for="alamat7">
                                Rt 7 Rw 1
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 8 Rw 2">
                            <label class="form-check-label" for="alamat8">
                                Rt 8 Rw 2
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 9 Rw 2">
                            <label class="form-check-label" for="alamat9">
                                Rt 9 Rw 2
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 10 Rw 2">
                            <label class="form-check-label" for="alamat10">
                                Rt 10 Rw 2
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="alamat" id="pekerjaan" value="Rt 11 Rw 2">
                            <label class="form-check-label" for="alamat11">
                                Rt 11 Rw 2
                            </label>
                        </div>

                        <div class="invalid-feedback">Isi Alamat Dulu</div>
                    </div>
                    <div class=" invalid-feedback">
                        <?= $validation->getError('Alamat'); ?>
                    </div>

                </fieldset>
                <!-- <div class="row mb-3">
                    <label for="pekerjaan" class="col-sm-2 col-form-label">Pekerjaan / Jual Produk</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id=" pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>" placeholder="Masukan Nama Pekerjaan / penjualan">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('pekerjaan'); ?>
                        </div>
                    </div>
                </div> -->

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Pekerjaan</legend>
                    <div class="col-sm-10">
                        <div class="form-check <?= ($validation->hasError('pekerjaan')) ? 'is-invalid' : ''; ?>" id="pekerjaan" name="pekerjaan" value="<?= old('pekerjaan'); ?>">
                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan" value="Guru">
                            <label class="form-check-label" for="pekerjaan1">
                                Guru </label>
                        </div>
                        <div class="form-check ">
                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan" value="Pedagang">
                            <label class="form-check-label" for="pendapatan2">
                                Pedagang
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan" value="Petani">
                            <label class="form-check-label" for="pekerjaan3">
                                Petani
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan" value="Nelayan">
                            <label class="form-check-label" for="pekerjaan4">
                                Nelayan
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan" value="Wiraswasta">
                            <label class="form-check-label" for="pekerjaan5">
                                Wiraswasta
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="pekerjaan" id="pekerjaan" value="Toko Sembako">
                            <label class="form-check-label" for="pekerjaan">
                                Toko Sembako
                            </label>
                            <div class="invalid-feedback">Isi Pekerjaan Dulu</div>
                        </div>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('pekerjaan'); ?>
                        </div>
                    </div>
                </fieldset>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Pendapatan</legend>
                    <div class="col-sm-10">
                        <div class="form-check <?= ($validation->hasError('pendapatan')) ? 'is-invalid' : ''; ?>" id="pendapatan" name="pendapatan" value="<?= old('pendapatan'); ?>">
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
                            <div class="invalid-feedback">Isi Pendapatan Dulu</div>
                        </div>
                        <div class=" invalid-feedback">
                            <?= $validation->getError('pendapatan'); ?>
                        </div>
                    </div>
                </fieldset>

                <div class="row mb-3">
                    <label for="telpon" class="col-sm-2 col-form-label">Telpon</label>
                    <div class="col-sm-10 input">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">+62</div>
                            </div>
                            <input type="text" class="form-control <?= ($validation->hasError('telpon')) ? 'is-invalid' : ''; ?>" id="telpon" name="telpon" value="<?= old('telpon'); ?>" placeholder="Contoh : +6281233xxxxx">
                            <div class=" invalid-feedback">
                                <?= $validation->getError('telpon'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Data Diri</a>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection('page-content'); ?>