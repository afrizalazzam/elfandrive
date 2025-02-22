<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="#" class="nav-link">Contact</a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">

        <!-- logout -->
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="fa fa-sign-out-alt"></i>
                <!-- <p class="hidden-lg hidden-md">Profile <b class="caret"></b></p> -->
            </a>
            <div class="dropdown-menu">
                <a class="btn btn-danger" href="<?= base_url('auth/logout') ?> ">Keluar</a>
            </div>
        </li>
        <li class="separator hidden-lg hidden-md"></li>
    </ul>


</nav>
<!-- /.navbar -->