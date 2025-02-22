<div class="row">

    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th width="100px"> No Arsip </th>
                <th width="30px"> : </th>
                <td> <?= $arsip['no_arsip']; ?> </td>

                <th width="120px"> Tanggal Upload </th>
                <th width="30px"> : </th>
                <td> <?= $arsip['tgl_upload']; ?> </td>

            </tr>

            <tr>
                <th> Nama Arsip </th>
                <th> : </th>
                <td> <?= $arsip['nama_file']; ?> </td>

                <th> Tanggal Update</th>
                <th> : </th>
                <td> <?= $arsip['tgl_update']; ?> </td>
            </tr>

            <tr>
                <th> Deskripsi </th>
                <th> : </th>
                <td> <?= $arsip['deskripsi']; ?> </td>

                <th> Ukuran File </th>
                <th> : </th>
                <td> <?= $arsip['ukuran_file']; ?> KB </td>
            </tr>

            <tr>
                <th> Jabatan </th>
                <th> : </th>
                <td> <?= $arsip['nama_jabatan']; ?> </td>

                <th> User </th>
                <th> : </th>
                <td> <?= $arsip['username']; ?> </td>
            </tr>
        </table>
    </div>

    <div class="col-sm-12 text-center">
        <iframe src="<?= base_url('public/file_arsip/' . $arsip['file_arsip']) ?>" height="600px" width="auto" style="border: none;" title="IFrame Example"></iframe>
    </div>

</div>