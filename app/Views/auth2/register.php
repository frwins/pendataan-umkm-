<?= $this->extend('auth2/index'); ?>

<?= $this->section('content'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <!-- Outer Row -->
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Register</h1>
                                    </div>
                                    <form action=" <?= base_url('auth2/save'); ?>" method="post" enctype="multipart/form-data">
                                        <?= csrf_field(); ?>
                                        <?php

                                        use Config\Validation;

                                        if (!empty(session()->getFlashdata('fail'))) : ?>
                                            <div class="alert alert-danger"><?= session()->getFlashdata('fail'); ?></div>
                                        <?php endif ?>

                                        <?php if (!empty(session()->getFlashdata('success'))) : ?>
                                            <div class="alert alert-success"><?= session()->getFlashdata('success'); ?></div>
                                        <?php endif ?>
                                        <div class="form-group">
                                            <label for="">Username</label>
                                            <div class="form-group">
                                                <input type="text" name="username" class="form-control" placeholder="Masukan No.KTP" value="<?= set_value('username'); ?>">
                                                <span class="text-danger"><?= isset($validation) ?  display_error($validation, 'username') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="">Foto KTP</label>
                                            <input type="file" class="form-control" id="gambar" name='gambar' </input>
                                            <span class=" text-danger"><?= isset($validation) ?  display_error($validation, 'gambar') : '' ?></span>
                                        </div>

                                        <div class=" form-group">
                                            <label for="">Password</label>
                                            <div class="form-group">
                                                <input type="password" name="password" class="form-control" placeholder="Masukan Password" value="<?= set_value('password'); ?>">
                                                <span class="text-danger"><?= isset($validation) ?  display_error($validation, 'password') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="">Konfimasi Password</label>
                                            <div class="form-group">
                                                <input type="password" name="cpassword" class="form-control" placeholder="Masukan Ulang Password" value="<?= set_value('cpassword'); ?>">
                                                <span class="text-danger"><?= isset($validation) ?  display_error($validation, 'cpassword') : '' ?></span>
                                            </div>
                                        </div>
                                        <div class="col-xs-4">
                                            <button type="submit" class="btn btn-primary btn-block btn-flat"> Daftar </button>
                                        </div>


                                        <hr>
                                        <div class="text-center">
                                            <a class="small" href="<?= site_url('auth2/login') ?>">Kembali</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

</body>

</html>
<?= $this->endsection(); ?>