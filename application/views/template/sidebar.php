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
                    <a href="#" class="d-block">ADMIN</a>
                </div>
            </div>
            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('admin/index'); ?>" class="nav-link">
                            <i class="nav-icon text-white fas fa-home"></i>
                            <p class="text-white">
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item text-white has-treeview">
                        <!-- <a href="#" class="nav-link">
                            <i class="nav-icon fa text-white fa-user"></i>
                            <p class="text-white">
                                Daftar
                                <i class="right fas text-white fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<= base_url('admin/dashboard/'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">Daftar User</p>
                                </a>
                            </li>
                        </ul> -->
                    <li class="nav-item text-white has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa text-white fa-book"></i>
                            <p class="text-white">
                                Tabel
                                <i class="right fas text-white fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/pegawai'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">Data Pegawai</p>
                                </a>
                            </li>
                            <!-- <li class="nav-item">
                                <a href="<= base_url('admin/ruangan'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">Daftar Ruangan</p>
                                </a>
                            </li> -->
                            <li class="nav-item">
                                <a href="<?= base_url('admin/jenis_tim'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">Jenis Tim</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/tim'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">Tim</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?= base_url('admin/anggota_tim'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">Anggota Tim</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item text-white has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fa text-white fa-calendar"></i>
                            <p class="text-white">
                                Penjadwalan
                                <i class="right fas text-white fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('Admin/kalender/a1611ff7-b604-11ed-8fc0-dc215c6adf56'); ?>" class="nav-link">
                                    <i class="far fa-circle text-white nav-icon"></i>
                                    <p class="text-white">
                                        Rawat Inap
                                        <span class="badge badge-info right"></span>
                                    </p>

                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="<?= base_url('admin/konfigurasi'); ?>" class="nav-link">
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
            <!-- /.sidebar-menu -->
            <!-- <div id='center' class="main center">
            <div class="mainInner">
                <div>PURE CSS SIDEBAR TOGGLE MENU</div>
            </div>
            <div class="mainInner">
                <div>PURE CSS SIDEBAR TOGGLE MENU</div>
            </div>
            <div class="mainInner">
                <div>PURE CSS SIDEBAR TOGGLE MENU</div>
            </div> -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container">
                <div class="row mb-2 text-center" style="margin-left: 20%;">
                    <div class="col-sm-12">
                        <h1 class="m-0 text-dark text-bold">PENJADWALAN SHIFT PERAWAT</h1>
                    </div>

                </div>
            </div>
        </div>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">