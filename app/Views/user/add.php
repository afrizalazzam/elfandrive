<div class="row">
    <!-- /.col -->
    <div class="col-md-11 ml-2">
        <div class="card card-solid card-primary">
            <div class="card-header">
                <h3 class="card-title"> Data User </h3>

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

                <?php echo form_open_multipart('user/insert'); ?>

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
                        <option value=""> --- Pilih Level --- </option>
                        <option value="1"> Admin </option>
                        <option value="2"> User </option>
                    </select>
                </div>

                <div class="form-group">
                    <label> Jabatan </label>
                    <select name="id_jabatan" class="form-control">
                        <option value=""> --- Pilih Jabatan --- </option>
                        <?php foreach ($jabatan as $key => $j) { ?>
                            <option value="<?= $j['id_jabatan'] ?>"> <?= $j['nama_jabatan'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="<?= base_url('user') ?>" type="submit" class="btn btn-success">
                        Kembali
                    </a>
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