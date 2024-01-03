<form action="<?= base_url('admin/buku/edit/'.$buku['id_buku']) ?>" method="post" accept-charset="utf-8"
    enctype="multipart/form-data">
    <?= csrf_field();
?>
    <div class="form-group row">
        <label class="col-md-2">Dosen</label>
        <div class="col-md-5">
            <select name="id_dosen" class="form-control select2bs4" required>
                <option value="">====== Pilih Dosen =====</option>
                <?php foreach ($dosen as $dosen) { ?>
                <option value="<?= $dosen['id_dosen'] ?>" <?php if( $buku['id_dosen'] === $dosen['id_dosen']){ echo "selected";}?>>
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
                <option value="ISSN" <?php if($buku['jenis_kode']==='ISSN'){echo "selected";}?>>ISSN</option>
                <option value="ISBN" <?php if($buku['jenis_kode']==='ISBN'){echo "selected";}?>>ISBN</option>
                <option value="lainya" <?php if($buku['jenis_kode']==='lainya'){echo "selected";}?>>Lainya</option>
            </select>
            <small class="text-secondary">Jenis kode buku/jurnal/lainya</small>
        </div>
        <div class="col-md-3">
            <input type="text" name="kode_buku" class="form-control" value="<?= set_value('kode_buku', $buku['kode_buku']) ?>" placeholder="Masukan Kode Buku" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Judul Buku</label>
        <div class="col-md-5">
            <input type="text" name="judul_buku" class="form-control" value="<?= set_value('judul_buku', $buku['judul_buku']) ?>" placeholder="Masukan Judul Buku" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Cover Buku</label>
        <div class="col-md-5">
            <input type="file" name="gambar" class="form-control" value="<?= $buku['gambar'] ?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">File Buku</label>
        <div class="col-md-5">
            <input type="file" name="fileUpload" class="form-control" value="<?= $buku['file'] ?>">
        </div>
    </div>
    <!-- MAS -->
    <div class="form-group row">
        <label class="col-md-2">Kategori, Jenis &amp; Status</label>
        <div class="col-md-2">
            <select name="id_kategori_buku" class="form-control select2bs4">
                <?php foreach ($kategori_buku as $kategori_buku) { ?>
                <option value="<?= $kategori_buku['id_kategori_buku'] ?>" <?php if($buku['id_kategori_buku']===$kategori_buku['id_kategori_buku']){echo "selected";}?>>
                    <?= $kategori_buku['nama_kategori_buku'] ?>
                </option>
                <?php } ?>
            </select>
            <small class="text-secondary">Kategori</small>
        </div>
        <div class="col-md-2">
            <select name="jenis_buku" class="form-control select2bs4">
                <option value="buku"<?php if($buku['jenis_buku']==='buku'){echo "selected";}?>>Buku</option>
                <option value="jurnal" <?php if($buku['jenis_buku']==='jurnal'){echo "selected";}?>>Jurnal</option>
                <option value="prosiding" <?php if($buku['jenis_buku']==='prosiding'){echo "selected";}?>>Prosiding</option>
                <option value="panduan" <?php if($buku['jenis_buku']==='panduan'){echo "selected";}?>>Panduan</option>
                <option value="lainya" <?php if($buku['jenis_buku']==='lainya'){echo "selected";}?>>Lainya</option>
            </select>
            <small class="text-secondary">Jenis konten</small>
        </div>
        <div class="col-md-2">
            <select name="status" class="form-control select2bs4">
                <option value="Publish" <?php if($buku['status']==='Publish'){echo "selected";}?>>Publish</option>
                <option value="Draft" <?php if($buku['status']==='Draft'){echo "selected";}?>>Draft</option>
            </select>
            <small class="text-secondary">Status publikasi</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-md-2">Tanggal dan jam Publikasi</label>
        <div class="col-md-2">
            <input type="text" name="tanggal_publish" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_publish'])) {
                    echo set_value('tanggal_publish');
                } else {
                    echo tanggal_id($buku['tanggal_publish']);
                } ?>">
            <small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('d-m-Y') ?></small>
        </div>
        <div class="col-md-2">
            <input type="text" name="jam" class="form-control jam" value="<?php if (isset($_POST['jam'])) {
                echo set_value('jam');
            } else {
                echo date('H:i:s', strtotime($buku['tanggal_publish']));
            } ?>">
            <small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?= date('H:i:s') ?></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Penulis</label>
        <div class="col-md-6">
            <textarea name="penulis" class="form-control"><?= set_value('penulis', $buku['penulis']) ?></textarea>
            <small class="text-secondary">Lebih dari satu pisahkan dengan <strong> Koma (,)</strong>, Misal : Dr. Ir.
                Gunardi Dojo
                Winarno, Agus,
                Leni</small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Penerbit, Tgl Terbit</label>
        <div class="col-md-6">
            <input type="text" name="penerbit" class="form-control" value="<?= set_value('penerbit', $buku['penerbit']) ?>" placeholder="Masukan Penerbit" required>
        </div>
        <div class="col-md-2">
            <input type="text" name="tanggal_terbit" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_terbit'])) {
                    echo set_value('tanggal_terbit');
                } else {
                    echo tanggal_id($buku['tanggal_terbit']);
                } ?>" required>
            <small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('d-m-Y') ?></small>
        </div>
        <div class="col-md-2">
            <input type="text" name="jam" class="form-control jam" value="<?php if (isset($_POST['jam'])) {
                echo set_value('jam');
            } else {
                echo date('H:i:s', strtotime($buku['tanggal_terbit']));
            } ?>" required>
            <small class="text-secondary">Format <strong>HH:MM:SS</strong>. Misal: <?= date('H:i:s') ?></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Isi Rigkasan</label>
        <div class="col-md-10">
            <textarea name="isi" class="form-control konten"><?= set_value('isi', $buku['isi']) ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Link/URL</label>
        <div class="col-md-10">
            <input type="text" name="website" class="form-control" value="<?= set_value('website', $buku['website']) ?>" placeholder="https://websitmu.com">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2">Keyword Berita (untuk SEO Google)</label>
        <div class="col-md-10">
            <textarea name="keyword" class="form-control"><?= set_value('keyword', $buku['keyword']) ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-md-2"></label>
        <div class="col-md-10">
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>

    <?= form_close(); ?>