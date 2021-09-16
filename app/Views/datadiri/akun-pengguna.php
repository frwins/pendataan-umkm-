<?= $this->extend('layout/index'); ?>
<?= $this->section('page-content'); ?>

<div class="container">
    <div class="row">
        <div class="col">
            <h1 class="mb-2">Ganti Password</h1>
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>

            <form action="ganti-password" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="password_lama" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('password_lama')) ? 'is-invalid' : ''; ?>" id=" password_lama" name="password_lama" value="<?= old('password_lama'); ?>" placeholder="Masukkan Password Lama">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('password_lama'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_baru" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('password_baru')) ? 'is-invalid' : ''; ?>" id=" password_baru" name="password_baru" value="<?= old('password_baru'); ?>" placeholder="Masukan Password Baru">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('password_baru'); ?>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password_konfirmasi" class="col-sm-2 col-form-label">Password Konfirmasi</label>
                    <div class="col-sm-5">
                        <input type="password" class="form-control <?= ($validation->hasError('password_konfirmasi')) ? 'is-invalid' : ''; ?>" id=" password_konfirmasi" name="password_konfirmasi" value="<?= old('password_konfirmasi'); ?>" placeholder="Masukan Password Konfirmasi">
                        <div class=" invalid-feedback">
                            <?= $validation->getError('password_konfirmasi'); ?>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    
    </fieldset>
    <button type="submit" class="btn btn-primary">Ubah</a>
        </form>
</div>
</div>
</div>
<?= $this->endSection('page-content'); ?>