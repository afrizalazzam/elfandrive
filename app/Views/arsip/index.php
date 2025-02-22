<div class="row">
    <!-- /.col -->
    <div class="col-md-11 ml-2">
        <div class="card card-solid card-primary">
            <div class="card-header judul-kuning">
                <h3 class="card-title"> Data User </h3>

                <div class="card-tools">
                    <a href="<?= base_url('arsip/add') ?>" class="btn btn-primary btn-sm btn-flat"> <i class="fas fa-plus"></i>
                        Tambah
                    </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->

            <!-- card body -->
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
                            <th> No Arsip </th>
                            <th> Nama Arsip </th>
                            <th> Kategori </th>
                            <th> Tanggal Upload </th>
                            <th> Tanggal Update </th>
                            <th> Nama User </th>
                            <th> Jabatan </th>
                            <th class="text-center"> File </th>
                            <th width="100px" class="text-center"> Action </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($arsip as $key => $ars) { ?>
                            <tr>
                                <td> <?= $no++; ?> </td>
                                <td> <?= $ars['no_arsip']; ?> </td>
                                <td> <?= $ars['nama_file']; ?> </td>
                                <td> <?= $ars['nama_kategori']; ?> </td>
                                <td> <?= $ars['tgl_upload']; ?> </td>
                                <td> <?= $ars['tgl_update']; ?> </td>
                                <td> <?= $ars['username']; ?> </td>
                                <td> <?= $ars['nama_jabatan']; ?> </td>
                                <td class="text-center"> <a href="<?= base_url('arsip/viewfile/' . $ars['id_arsip']) ?>">
                                        <i class="fa fa-archive fa-2x label-danger"> </i> </a>
                                    <br> <?= number_format($ars['ukuran_file'], 0) ?> KB
                                </td>
                                <td class="text-center">
                                    <a href="<?= base_url('arsip/edit/' . $ars['id_arsip']) ?>" class="btn btn-xs btn-warning mr-2" style="border-radius: 3px !important; padding: 3px 9px; margin: 5px 1px !important;"> Edit </a>
                                    <button class="btn btn-xs btn-danger" style="border-radius: 3px !important; padding: 3px 9px; margin: 5px 1px !important;" data-toggle="modal" data-target="#hapus<?= $ars['id_arsip']; ?>"> Delete </button>
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

<!-- modal hapus -->
<?php foreach ($arsip as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_arsip']; ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-danger">
                    <h4 class="modal-title"> Hapus User </h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Hapus <b> <?= $value['nama_file']; ?> </b> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Tidak</button>
                    <a href="<?= base_url('arsip/hapus/' . $value['id_arsip']) ?>" type="submit" class="btn btn-primary"> Ya </a>
                </div>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
<?php }  ?>
<!-- /.modal hapus-->