<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Elfan Drive | <?= $title ?> </title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/assets/font.googleapis.com.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/template/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?= base_url('public') ?>/template/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="row">
            <!-- /.col -->
            <div class="col-12">
                <div class="card card-solid card-primary">
                    <div class="card-header">
                        <h3 class="card-title"> Registrasi </h3>

                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <!-- pesan peringatan error gagal login data tidak valid-->
                        <?php
                        $errors = session()->getFlashdata('errors');
                        if (!empty($errors)) { ?>
                            <div class="alert alert-danger alert-dismissible">
                                <h5> Ada Kesalahan </h5>
                                <ul>
                                    <?php foreach ($errors as $key => $err) { ?>
                                        <?= esc($err) ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <!-- penutup pesan error -->

                        <?php echo form_open_multipart('auth/insert'); ?>

                        <div class="form-group">
                            <label> Nama User </label>
                            <input name="username" class="form-control" placeholder="Nama User" required>
                        </div>

                        <div class="form-group">
                            <label> E-Mail </label>
                            <input name="email" class="form-control" placeholder="email" required>
                        </div>

                        <div class="form-group">
                            <label> Password </label>
                            <input name="password" class="form-control" placeholder="password" required>
                        </div>

                        <div class="form-group">
                            <label> Level </label>
                            <select name="level" class="form-control">
                                <!-- <option value=""> --- Pilih Level --- </option> -->
                                <!-- <option value="1"> Admin </option> -->
                                <option value="2" readonly> User </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label> Jabatan </label>
                            <input name="nama_jabatan" class="form-control" placeholder="Jabatan" required>

                        </div>

                        <div class="row">
                            <div class="col-md-4">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">
                                        Daftar
                                    </button>

                                </div>
                            </div>
                            <div class="col-md-4 offset-md-4">
                                <a href="<?= base_url('login') ?>" type="submit" class="btn btn-success">
                                    Kembali
                                </a>
                            </div>

                        </div>

                        <?= form_close()  ?>
                    </div>
                    <!-- card body -->
                </div>
                <!-- /.card  -->
            </div>
            <!-- /.col -->
        </div>
        <!-- ./row -->


    </div>

    <!-- jQuery -->
    <script src="<?= base_url('public') ?>/template/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('public') ?>/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('public') ?>/template/dist/js/adminlte.min.js"></script>

</body>


</html>