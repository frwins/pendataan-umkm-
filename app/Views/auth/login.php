<?= $this->extend('auth/index'); ?>

<?= $this->section('content'); ?>
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
                                    <h1 class="h4 text-gray-900 mb-4">Login</h1>
                                </div>
                                <?php
                                $errors = session()->getFlashdata('errors');
                                if (!empty($errors)) { ?>
                                    <div class="alert alert-danger alert-dismissible">
                                        <ul>
                                            <?php foreach ($errors as $key => $value) { ?>
                                                <li><?= esc($value) ?></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                                <?php
                                if (session()->getFlashdata('pesan')) {
                                    echo '<div class="alert alert-danger alert-dismissible">';
                                    echo session()->getFlashdata('pesan');
                                    echo '</div>';
                                }
                                ?>
                                <?php echo form_open('auth/login') ?>
                                <form class="form-group has-feedback">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control" placeholder="Password">
                                    </div>


                                    <div class="col-xs-4">
                                        <button type="submit" class="btn btn-primary btn-block btn-flat"> Masuk </button>
                                    </div>

                                    <?php echo form_close() ?>
                                    <hr>

                            </div>
                        </div>
                    </div>
                </div>
                <a class="btn btn-secondary btn-xl js-scroll-trigger" href="/">kembali</a>
            </div>

        </div>

    </div>

</div>
</div>
<?= $this->endsection(); ?>