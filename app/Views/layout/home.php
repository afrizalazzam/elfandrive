<div class="row">


    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box biru">
            <div class="inner">
                <h3> <?= $total_kategori; ?> </h3>

                <p>Kategori</p>
            </div>
            <div class="icon">
                <i class="fa fa-bookmark"></i>
            </div>
            <a href="<?= base_url('kategori') ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <div class="col-lg-3 col-xs-12">
        <!-- small box -->
        <div class="small-box kuning">
            <div class="inner">
                <h3><?= $total_arsip; ?></h3>

                <p>File Arsip</p>
            </div>
            <div class="icon">
                <i class="fa fa-archive"></i>
            </div>
            <a href="<?= base_url('arsip') ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>

    <?php if (session()->get('level') == 1) { ?>
        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box merah">
                <div class="inner">
                    <h3><?= $total_jabatan; ?></h3>

                    <p>Jabatan</p>
                </div>
                <div class="icon">
                    <i class="fa fa-building"></i>
                </div>
                <a href="<?= base_url('jabatan') ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>


        <div class="col-lg-3 col-xs-12">
            <!-- small box -->
            <div class="small-box hijau">
                <div class="inner">
                    <h3><?= $total_user; ?></h3>

                    <p>User</p>
                </div>
                <div class="icon">
                    <i class="fa fa-user"></i>
                </div>
                <a href="<?= base_url('user') ?>" class="small-box-footer">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

    <?php } ?>

</div>