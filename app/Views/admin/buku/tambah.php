<form action="<?= base_url('admin/buku/tambah') ?>" method="post" accept-charset="utf-8" enctype="multipart/form-data">
    <?= csrf_field();
?>
    <div class="form-group row">
        <label class="col-md-2">Dosen</label>
        <div class="col-md-3">
            <select name="id_dosen" class="form-control select2bs4" required>
                <option value="">-----Pilih Dosen----</option>
                <?php foreach ($dosen as $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>">
                    <?= $dosen['nidn'] ?> - <?= $dosen['nama'] ?>
                </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Jenis, Kode Buku</label>
        <div class="col-md-2">
            <select name="jenis_kode" class="form-control select2bs4" required>
                <option value="ISSN">ISSN</option>
                <option value="ISBN">ISBN</option>
                <option value="lainya">Lainya</option>
            </select>
            <small class="text-secondary">Jenis kode buku/jurnal/lainya</small>
        </div>
        <div class="col-md-3">
            <input type="text" name="kode_buku" class="form-control" value="<?= set_value('kode_buku') ?>" placeholder="Masukan Kode Buku" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Judul Buku</label>
        <div class="col-md-5">
            <input type="text" name="judul_buku" class="form-control" value="<?= set_value('judul_buku') ?>" placeholder="Masukan Judul Buku" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Cover Buku</label>
        <div class="col-md-5">
            <input type="file" name="gambar" class="form-control" value="<?= set_value('gambar') ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">File Buku</label>
        <div class="col-md-5">
            <input type="file" name="fileUpload" class="form-control" value="<?= set_value('fileUpload') ?>">
        </div>
    </div>
    <!-- MAS -->
    <div class="form-group row">
        <label class="col-md-2">Kategori, Jenis &amp; Status</label>
        <div class="col-md-2">
            <select name="id_kategori_buku" class="form-control select2bs4" required>
                <?php foreach ($kategori_buku as $kategori_buku) { ?>
                <option value="<?= $kategori_buku['id_kategori_buku'] ?>">
                    <?= $kategori_buku['nama_kategori_buku'] ?>
                </option>
                <?php } ?>
            </select>
            <small class="text-secondary">Kategori</small>
        </div>
        <div class="col-md-2">
            <select name="jenis_buku" class="form-control select2bs4" required>
                <option value="buku">Buku</option>
                <option value="jurnal">Jurnal</option>
                <option value="prosiding">Prosiding</option>
                <option value="panduan">Panduan</option>
                <option value="lainya">Lainya</option>
            </select>
            <small class="text-secondary">Jenis konten</small>
        </div>
        <div class="col-md-2">
            <select name="status" class="form-control select2bs4" required>
                <option value="Publish">Publish</option>
                <option value="Draft">Draft</option>
            </select>
            <small class="text-secondary">Status publikasi</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2">Tanggal dan jam Publikasi</label>
        <div class="col-md-2">
            <input type="text" name="tanggal_publish" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_publis'])) {
                    echo set_value('tanggal_publish');
                } else {
                    echo date('d-m-Y');
                } ?>" required>
            <small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('d-m-Y') ?></small>
        </div>
        <div class="col-md-2">
            <input type="text" name="jam" class="form-control jam" value="<?php if (isset($_POST['jam'])) {
                echo set_value('jam');
            } else {
                echo date('H:i:s');
            } ?>" required>
            <small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?= date('H:i:s') ?></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Penulis</label>
        <div class="col-md-6">
            <textarea name="penulis" class="form-control"><?= set_value('penulis') ?></textarea>
            <small class="text-secondary">Lebih dari satu pisahkan dengan <strong> Koma (,)</strong>, Misal : Dr. Ir.
                Gunardi Dojo
                Winarno, Agus,
                Leni</small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Penerbit, Tgl Terbit</label>
        <div class="col-md-6">
            <input type="text" name="penerbit" class="form-control" value="<?= set_value('penerbit') ?>" placeholder="Masukan Penerbit" required>
        </div>
        <div class="col-md-2">
            <input type="text" name="tanggal_terbit" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_terbit'])) {
                    echo set_value('tanggal_terbit');
                } else {
                    echo date('d-m-Y');
                } ?>" required>
            <small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('d-m-Y') ?></small>
        </div>
        <div class="col-md-2">
            <input type="text" name="jam" class="form-control jam" value="<?php if (isset($_POST['jam'])) {
                echo set_value('jam');
            } else {
                echo date('H:i:s');
            } ?>">
            <small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?= date('H:i:s') ?></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Isi Rigkasan</label>
        <div class="col-md-10">
            <textarea name="isi" class="form-control konten"><?= set_value('isi') ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Link/URL</label>
        <div class="col-md-10">
            <input type="text" name="website" class="form-control" value="<?= set_value('website') ?>" placeholder="https://websitmu.com">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Keyword Berita (untuk SEO Google)</label>
        <div class="col-md-10">
            <textarea name="keyword" class="form-control"><?= set_value('keyword') ?></textarea>
        </div>
    </div>



    <div class="form-group row">
        <label class="col-md-2"></label>
        <div class="col-md-10">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>

    <?= form_close(); ?>