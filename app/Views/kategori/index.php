<div class="row">
    <!-- /.col -->
    <div class="col-md-11 ml-2">
        <div class="card card-solid card-primary">
            <div class="card-header judul-biru">
                <h3 class="card-title"> Data Kategori </h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-primary btn-sm btn-flat" data-toggle="modal" data-target="#add"> <i class="fas fa-plus"></i>
                        Tambah
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-success alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                        &times;
                    </button>
                    <h4> <i class="icon fa fa-check"> </i> Success - ';
                    echo session()->getFlashdata('pesan');
                    echo '</h4> </div>';
                }
                ?>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="80px"> No </th>
                            <th> Kategori</th>
                            <th width="100px" class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $key => $kat) { ?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $kat['nama_kategori']; ?> </td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-warning" style="border-radius: 3px !important; padding: 3px 9px; margin: 5px 1px !important;" data-toggle="modal" data-target="#edit<?= $kat['id_kategori']; ?>"> Edit </button>
                                    <button class="btn btn-xs btn-danger" style="border-radius: 3px !important; padding: 3px 9px; margin: 5px 1px !important;" data-toggle="modal" data-target="#hapus<?= $kat['id_kategori']; ?>"> Delete </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.col -->
</div>

<!-- modal add -->
<div class="modal fade" id="add">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> Tambah Kategori </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=
                form_open('kategori/add')
                ?>
                <div class="form-group">
                    <label> Nama Kategori </label>
                    <input name="nama_kategori" class="form-control" placeholder="Kategori" required>
                </div>

            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary"> Simpan </button>
            </div>

            <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal add-->


<!-- modal edit -->
<?php foreach ($kategori as $key => $kat) { ?>
    <div class="modal fade" id="edit<?= $kat['id_kategori']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit Kategori </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?=
                    form_open('kategori/edit/' . $kat['id_kategori'])
                    ?>
                    <div class="form-group">
                        <label> Nama Kategori </label>
                        <input name="nama_kategori" value="<?= $kat['nama_kategori']; ?>" class="form-control" placeholder="Kategori" required>
                    </div>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary"> Update </button>
                </div>

                <?= form_close(); ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php }  ?>
<!-- /.modal edit-->

<!-- modal hapus -->
<?php foreach ($kategori as $key => $kat) { ?>
    <div class="modal fade" id="hapus<?= $kat['id_kategori']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-danger">
                    <h4 class="modal-title"> Hapus Kategori </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <?= $kat['nama_kategori']; ?> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('kategori/hapus/' . $kat['id_kategori']) ?>" type="submit" class="btn btn-primary"> Ya </a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php }  ?>
<!-- /.modal hapus-->