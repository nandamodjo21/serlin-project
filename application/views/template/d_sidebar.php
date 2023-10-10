<!-- Main Sidebar Container -->
<div id="sidebarMenu">
    <aside class="main-sidebar elevation-4" style="background: linear-gradient(180deg, #008B8B 10%, #AFEEEE 80%);">
        <!-- Brand Logo -->
        <a class="brand-link">
            <img src="<?= base_url('assets'); ?>/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight text-white">PENJADWALAN</span>
        </a>
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?= base_url('assets'); ?>/dist/img/default.jpg" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block">DIREKTUR</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('direktur'); ?>" class="nav-link">
                            <i class="nav-icon text-white fas fa-home"></i>
                            <p class="text-white">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('direktur/konfigurasi'); ?>" class="nav-link">
                            <i class="nav-icon text-white fas fa-copy"></i>
                            <p class="text-white">
                                Jadwal
                                <span class="badge badge-info right"></span>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('auth'); ?>" class="nav-link" data-toggle="modal" data-target="#keluarModal">
                            <i class="nav-icon text-white fas fa-fw fa-sign-out-alt"></i>
                            <p class="text-white">
                                Keluar
                            </p>
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2 text-center" style="margin-left: 20%;">
                    <div class="col-sm-10">
                        <h1 class="m-0 text-dark text-bold">PENJADWALAN SHIFT PERAWAT</h1>
                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">