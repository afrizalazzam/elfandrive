<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elfan Drive | <?= $title ?> </title>
    <!-- <link rel="icon" type="image/x-icon" href="../elfandrive/public/assets/img/elfan drive.ico"> -->

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/font.googleapis.com.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/template/dist/css/adminlte.min.css">
<style type="text/css">
body {
    font-family: 'arial' !important;
    background: #e8cbc0;
    background: -webkit-linear-gradient(to top, #bcd1ff, #1e51c3);
    background: linear-gradient(to top, #bcd1ff, #1e51c3);
}
/*.bg-atas {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 45%;
    background: #5d8cd5;
    border-radius: 0px 0px 35px 35px;
}*/
/*.login-page, .register-page {
    background-color: #F7F9FE !important;
}*/
.card-primary.card-outline {
    border-top: 0 !important; 
    border-radius: 20px;
}
.card-header {
    background: #0050c0;
    border-radius: 11px;
    margin: 10px;
}
.card-header a {
    font-size: 1.5rem !important;
    color: #FFFFFF;
}
.card-header img {
    width: 118px;
    height: auto;
    margin: 20px;
}
.card-primary.card-outline {
    border-top: 6px solid #FFFFFF;
}
.login-box, .register-box, input, a {
    font-size: 15px !important;
}
.btn {
    border-radius: 20px !important;
}
</style>

</head>

<body class="hold-transition login-page">
    <div class="bg-atas"></div>
    </div>
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <img src="<?= base_url('public') ?>/assets/img/logo elfan drive.png"> <br>
                <a href="#"><b>Login</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Silahkan login terlebih dahulu</p>

                <!-- pesan peringatan error gagal login data tidak valid-->
                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            <?php foreach ($errors as $key => $err) { ?>
                                <?= esc($err) ?>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>

                <!-- pesan peringatan error gagal login jika data valid -->
                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-danger alert-dismissible">';
                    echo session()->getFlashdata('pesan');
                    echo '</div>';
                }
                ?>

                <?php echo form_open('auth/login'); ?>
                <div class="input-group mb-3">
                    <input type="username" name="username" class="form-control" placeholder="Username">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div> -->

                    <!-- tombol registrasi -->
                    <div class="col-5 mr-4 mb-3">
                        <a href="<?= base_url('auth/register') ?>" class="btn btn-success btn-block"> Registrasi </a>
                    </div>
                    <!-- /tombol registrasi -->

                    <!-- tombol login -->
                    <div class="col-5 ml-4">
                        <button type="submit" class="btn btn-primary btn-block"> Login </button>
                    </div>
                    <!-- /tombol login -->
                </div>
                <?php echo form_close() ?>

                <p class="mb-1" style="text-align: center; font-size: 0.95rem;">
                    <a href="<?= base_url('auth/reset') ?>"> Reset Password </a>
                </p>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="<?= base_url('public') ?>/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public') ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public') ?>/template/dist/js/adminlte.min.js"></script>
</body>

</html>