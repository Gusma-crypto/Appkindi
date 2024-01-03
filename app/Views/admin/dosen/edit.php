<form action="<?= base_url('admin/dosen/edit/' . $dosen['id_dosen']) ?>" method="post" accept-charset="utf-8"
    enctype="multipart/form-data">
    <?= csrf_field();
?>
    <div class="form-group row">
        <label class="col-3">Nama dosen</label>
        <div class="col-9">
            <input type="text" name="nama" class="form-control" placeholder="Nama dosen" value="<?= $dosen['nama'] ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">NIK</label>
        <div class="col-9">
            <input type="number" name="nik" class="form-control"  value="<?= $dosen['nik'] ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">NIDN</label>
        <div class="col-9">
            <input type="number" name="nidn" class="form-control"  value="<?= $dosen['nidn'] ?>"
                required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Email</label>
        <div class="col-9">
            <input type="email" name="email" class="form-control" placeholder="example@gmail.com"
                value="<?= set_value('email', $dosen['email']) ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Username</label>
        <div class="col-9">
            <input type="text" name="username" class="form-control" placeholder="Username"
                value="<?= set_value('username', $dosen['username']) ?>" readonly required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Password</label>
        <div class="col-9">
            <input type="password" name="password" class="form-control" placeholder="password"
                value="<?= set_value('password'), $dosen['password'] ?>" required>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Jenis, jabatan</label>
        <div class="col-5">
            <select name="jenis_jabatan" id="jenis_jabatan" class="form-control select2bs4" required>
                <option value="">---Pilih Jenis Jabatan---</option>
                <option value="Struktural" <?php if ($dosen['jenis_jabatan'] === 'Struktural') {
                        echo 'selected';
                    } ?>>Struktural</option>
                <option value="Fungsional" <?php if ($dosen['jenis_jabatan'] === 'Fungsional') {
                        echo 'selected';
                    } ?>>Fungsional</option>
            </select>
            <small class="text-secondary">Jenis jabatan</small>
        </div>
        <div class="col-4">
            <select name="id_jabatan" id="id_jabatan" class="form-control select2bs4" required>
                <option value="">---Pilih Jabatan---</option>
                <!--DATA DI LOOPING DI PHP-->
                <?php foreach ($jabatan as $row) { ?>
                    <option value="<?= $row['id_jabatan'] ?>" 
                    <?php if($dosen['id_jabatan'] === $row['id_jabatan']){echo "selected";}?>>
                        <?= $row['nama_jabatan'] ?>
                    </option>
                <?php } ?>
            </select>
            <small class="text-secondary">jabatan dosen</small>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-3">Tempat, tanggal lahir</label>
        <div class="col-3">
            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir"
                value="<?= $dosen['tempat_lahir'] ?>" required>
        </div>
        <div class="col-md-3">
            <input type="text" name="tanggal_lahir" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_lahir'])) {
                    echo set_value('tanggal_lahir');
                } else {
                    echo tanggal_id($dosen['tanggal_lahir']);
                } ?>" required>
            <small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal: <?= date('d-m-Y') ?></small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Website dan Telepon</label>
        <div class="col-5">
            <input type="text" name="website" class="form-control" placeholder="https://www.apkindi.com"
                value="<?= $dosen['website'] ?>">
        </div>
        <div class="col-4">
            <input type="number" name="telepon" class="form-control" 
                value="<?= $dosen['telepon'] ?>">
        </div>
    </div>

    <div class="form-group row">
        <label class="col-3">Alamat</label>
        <div class="col-9">
            <textarea name="alamat" placeholder="Alamat"
                class="form-control"><?= set_value('alamat', $dosen['alamat']) ?></textarea>
        </div>
    </div>

    <div class="form-group row">
        <label class="col-3">Keahlian</label>
        <div class="col-9">
            <textarea name="keahlian" placeholder="Keahlian"
                class="form-control"><?= set_value('keahlian', $dosen['keahlian']) ?></textarea>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Upload Foto Profil</label>
        <div class="col-5">
            <input type="file" name="gambar" class="form-control" placeholder="gambar"
                value="<?= $dosen['gambar']?>">
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3">Status dosen</label>
        <div class="col-3">
            <select name="status_dosen" class="form-control select2bs4" required>
                <option value="">===Silahkan Pilih Status===</option>
                <option value="Tetap" <?php if ($dosen['status_dosen'] === 'Tetap') {
                    echo 'selected';
                } ?>>Tetap</option>
                <option value="Tidak Tetap" <?php if ($dosen['status_dosen'] === 'Tidak Tetap') {
                    echo 'selected';
                } ?>>Tidak Tetap</option>
            </select>
            <small class="text-secondary">Status dosen</small>
        </div>
    </div>
    <div class="form-group row">
        <label class="col-3"></label>
        <div class="col-9">
            <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
        </div>
    </div>


    <?= form_close(); ?>