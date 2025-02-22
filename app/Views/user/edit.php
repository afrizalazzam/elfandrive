<div class="row">
    <!-- /.col -->
    <div class="col-md-11 ml-2">
        <div class="card card-solid card-primary">
            <div class="card-header">
                <h3 class="card-title"> Edit User </h3>

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

                <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>

                <div class="form-group">
                    <label> Nama User </label>
                    <input name="username" value="<?= $user['username'] ?>" class="form-control" placeholder="Nama User" required>
                </div>

                <div class="form-group">
                    <label> E-Mail </label>
                    <input name="email" value="<?= $user['email'] ?>" class="form-control" placeholder="email" required readonly>
                </div>

                <div class="form-group">
                    <label> Password </label>
                    <input name="password" value="<?= $user['password'] ?>" class="form-control" placeholder="password" required>
                </div>

                <div class="form-group">
                    <label> Level </label>
                    <select name="level" class="form-control">
                        <option value="<?= $user['level'] ?>"> <?php if ($user['level'] == 1) {
                                                                    echo 'Admin';
                                                                } else {
                                                                    echo 'User';
                                                                } ?> </option>
                        <option value="1"> Admin </option>
                        <option value="2"> User </option>
                    </select>
                </div>

                <div class="form-group">
                    <label> Jabatan </label>
                    <select name="id_jabatan" class="form-control">
                        <option value="<?= $user['id_jabatan'] ?>"> <?= $user['nama_jabatan'] ?> </option>

                        <?php foreach ($jabatan as $key => $j) { ?>
                            <option value="<?= $j['id_jabatan'] ?>"> <?= $j['nama_jabatan'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Update
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