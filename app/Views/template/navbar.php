<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-primary">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link nav-light" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>


    <div class="navbar-custom-menu ml-auto mr-3">
        <ul class="nav navbar-nav">

            <!-- User menu -->
            <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white">
                    <img src="<?= base_url('public') ?>/assets/assetlogin/img/userlogo.jpg" class="user-image" alt="User Image">
                    <span class="hidden-xs">
                        <?= session()->get('username') ?>
                    </span>
                </a>
                <ul class="dropdown-menu">
                    <li class="user-header" style="background-color:#1e51c3;">
                        <img src="<?= base_url('public') ?>/assets/assetlogin/img/userlogo.jpg" class="img-circle" alt="">
                        <p style="color: white;">
                            <?= session()->get('username') ?> - <?php if (session()->get('level') == 1) {
                                                                    echo 'Admin';
                                                                } else {
                                                                    echo 'User';
                                                                } ?>
                            <small> <?= date('h M Y') ?> </small>

                        </p>
                    </li>

                    <!-- <li class="user-body">
                        <div class="row">
                            <div class="col-xs-4 text-center">
                                <a href="#"> Followers </a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#"> Followers </a>
                            </div>
                            <div class="col-xs-4 text-center">
                                <a href="#"> Followers </a>
                            </div>
                        </div>
                    </li> -->

                    <li class="user-footer">
                        <div class="container">
                            <div class="pull-left">
                                <a href="#" class="btn btn-default btn-flat"> Profile </a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url('auth/logout') ?> " class="btn btn-default btn-flat"> Keluar </a>
                            </div>
                        </div>
                    </li>

                </ul>

            </li>
        </ul>
    </div>

</nav>