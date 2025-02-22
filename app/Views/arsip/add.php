<div class="row">
    <!-- /.col -->
    <div class="col-md-11 ml-2">
        <div class="card card-solid card-primary">
            <div class="card-header">
                <h3 class="card-title"> Tambah File </h3>
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

                <?php echo form_open_multipart('arsip/insert');
                helper('text');
                $no_arsip = date('Ymds') . '-' . random_string('alnum', 4);
                ?>

                <div class="form-group">
                    <label> No Arsip</label>
                    <input name="no_arsip" class="form-control" value="<?= $no_arsip ?>" readonly>
                </div>

                <div class="form-group">
                    <label> Kategori </label>
                    <select name="id_kategori" class="form-control">
                        <option value=""> --- Pilih Kategori --- </option>
                        <?php foreach ($kategori as $key => $k) { ?>
                            <option value="<?= $k['id_kategori'] ?>"> <?= $k['nama_kategori'] ?> </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label> Nama File </label>
                    <input name="nama_file" class="form-control" placeholder="Nama File" required>
                </div>

                <div class="form-group">
                    <label> Deskripsi </label>
                    <textarea name="deskripsi" class="form-control" rows="5"></textarea>
                </div>

                <div class="form-group">
                    <label> File </label>
                    <input type="file" name="file_arsip" class="form-control">
                </div>



                <div class="form-group">
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                    <a href="<?= base_url('arsip') ?>" type="submit" class="btn btn-success">
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