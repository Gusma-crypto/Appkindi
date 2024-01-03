<?php $session = \Config\Services::session();
use App\Models\Dasbor_model;

$m_dasbor = new Dasbor_model();
?>
<div class="alert alert-primary">
    <h4>Hai <em class="text-warning"><?= $session->get('nama') ?></em></h4>
    <hr>
    <p>Selamat datang di website <strong><?= namaweb() ?></strong>. Website ini adalah Merupakan Sistem Pendukung
        Penilaian Kinerja PRODI
        <a href="https://apkindi.com">www.Appkindi.com</a>. Semoga bermanfaat yah.
    </p>
</div>

<!-- Info boxes -->
<div class="row">
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Buku/Jurnal/lainya</span>
                <span class="info-box-number">
                    <?= angka($m_dasbor->buku()) ?>
                    <small>buku</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">ISSN/ISBN</span>
                <span class="info-box-number"><?= angka($m_dasbor->issn()) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Dosen/Staff</span>
                <span class="info-box-number"><?= angka($m_dasbor->dosen()) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-lock"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Pengguna Website</span>
                <span class="info-box-number"><?= angka($m_dasbor->user()) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->

<div class="row">
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-download"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">File Buku (Tersedia)</span>
                <span class="info-box-number"><?= angka($m_dasbor->user()) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>

    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-tags"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Kategori File/Buku</span>
                <span class="info-box-number"><?= angka($m_dasbor->kategori_buku()) ?></span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-chalkboard-teacher"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Mahasiswa Masuk</span>
                <span class="info-box-number">50

                    <small>Orang</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <!-- fix for small devices only -->
    <div class="clearfix hidden-md-up"></div>
    <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-graduation-cap"></i></span>
            <div class="info-box-content">
                <span class="info-box-text">Mahasiswa Wisuda</span>
                <span class="info-box-number"> 10
                    <small>Orang</small>
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
</div>
<!-- /.row -->