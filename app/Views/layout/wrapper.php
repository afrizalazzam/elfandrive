<?php echo $this->include('template/header') ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <?= $this->include('template/navbar') ?>
        <?= $this->include('template/sidebar') ?>
        <?= $this->include('template/content') ?>
        <?= $this->include('template/footer') ?>

    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED SCRIPTS -->

    <!-- jQuery -->
    <script src="<?= base_url('template') ?>/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="<?= base_url('template') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="<?= base_url('template') ?>/dist/js/adminlte.min.js"></script>
</body>

</html>