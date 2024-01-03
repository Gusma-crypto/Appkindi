<?php
use App\Models\Konfigurasi_model;

$session     = \Config\Services::session();
$konfigurasi = new Konfigurasi_model();
$site        = $konfigurasi->listing();
?>
<style type="text/css" media="screen">
.nav-item a:hover {
    color: yellow !important;
}
</style>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
        <img src="<?= base_url('assets/upload/image/' . $site['icon']) ?>" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light"><?= $site['namaweb'] ?></span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="<?= base_url() ?>/assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="<?= base_url('admin/akun') ?>" class="d-block"><?= $session->get('username') ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Dahboard -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/dasbor') ?>" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-header">APLIKASI</li>
                <!-- pengguna -->
                <li class="nav-item">
                    <a href="<?= base_url('dosen/buku') ?>" class="nav-link">
                        <i class="fas fa-bookmark nav-icon"></i>
                        <p>Data Buku</p>
                    </a>
                </li>
                <!-- panduan -->
                <li class="nav-item">
                    <a href="<?= base_url('admin/panduan') ?>" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <!-- logout -->
                <li class="nav-item">
                    <a href="<?= base_url('login/logout') ?>" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>Logout</p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title ?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/dasbor') ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active"><?= $title ?></li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-purple">
                        <div class="card-header">
                            <h3 class="card-title"><?= $title ?></h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body" style="min-height: 500px;">


                            <?php
                                $validation = \Config\Services::validation();
                                    $errors = $validation->getErrors();
                                    if (! empty($errors)) {
                                        echo '<span class="text-danger">' . $validation->listErrors() . '</span>';
                                    }
                                ?>

                            <?php if (session('msg')) : ?>
                            <div class="alert alert-info alert-dismissible">
                                <?= session('msg') ?>
                                <button type="button" class="close" data-dismiss="alert"><span>×</span></button>
                            </div>
                            <?php endif ?>