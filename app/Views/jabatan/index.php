<div class="row">
    <!-- /.col -->
    <div class="col-md-11 ml-2">
        <div class="card card-solid card-primary">
            <div class="card-header judul-merah">
                <h3 class="card-title"> Data Jabatan </h3>

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
                            <th> Jabatan </th>
                            <th width="100px" class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jabatan as $key => $jab) { ?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $jab['nama_jabatan']; ?> </td>
                                <td class="text-center">
                                    <button class="btn btn-xs btn-warning" style="border-radius: 3px !important; padding: 3px 9px; margin: 5px 1px !important;" data-toggle="modal" data-target="#edit<?= $jab['id_jabatan']; ?>"> Edit </button>
                                    <button class="btn btn-xs btn-danger" style="border-radius: 3px !important; padding: 3px 9px; margin: 5px 1px !important;" data-toggle="modal" data-target="#hapus<?= $jab['id_jabatan']; ?>"> Delete </button>
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
                <h4 class="modal-title"> Tambah Jabatan </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?=
                form_open('jabatan/add')
                ?>
                <div class="form-group">
                    <label> Nama Jabatan </label>
                    <input name="nama_jabatan" class="form-control" placeholder="jabatan" required>
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
<?php foreach ($jabatan as $key => $jab) { ?>
    <div class="modal fade" id="edit<?= $jab['id_jabatan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"> Edit Jabatan </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?=
                    form_open('jabatan/edit/' . $jab['id_jabatan'])
                    ?>
                    <div class="form-group">
                        <label> Nama Jabatan </label>
                        <input name="nama_jabatan" value="<?= $jab['nama_jabatan']; ?>" class="form-control" placeholder="jabatan" required>
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
<?php foreach ($jabatan as $key => $jab) { ?>
    <div class="modal fade" id="hapus<?= $jab['id_jabatan']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-danger">
                    <h4 class="modal-title"> Hapus Jabatan </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <?= $jab['nama_jabatan']; ?> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('jabatan/hapus/' . $jab['id_jabatan']) ?>" type="submit" class="btn btn-primary"> Ya </a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php }  ?>
<!-- /.modal hapus-->