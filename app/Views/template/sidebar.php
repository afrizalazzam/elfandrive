<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <h4>
            <span class="brand-text font-weight-light">Welcome <?= session()->get('username') ?> </span>
        </h4>
    </a>

    <!-- Sidebar Menu -->
    <div id="sidebar-menu" class="main_menu_side hidden main_menu">
        <!-- Sidebar user panel (optional) -->
        <div class="menu_section">
            <h3 class="text-center" style="color: white"> Menu </h3>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="<?= base_url() ?>" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <?php if (session()->get('level') == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('kategori') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Kategori

                            </p>
                        </a>

                    </li>

                    <li class="nav-item">
                        <a href=" <?= base_url('arsip') ?> " class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                File Arsip
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href=" <?= base_url('jabatan') ?> " class="nav-link">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Jabatan
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href=" <?= base_url('user') ?> " class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                            </p>
                        </a>
                    </li>

                <?php } ?>

                <?php if (session()->get('level') == 2) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('kategori') ?>" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Kategori

                            </p>
                        </a>

                    </li>

                   <li class="nav-item">
                        <a href=" <?= base_url('arsip') ?> " class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                File Arsip
                            </p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>