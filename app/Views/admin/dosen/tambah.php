<p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        <i class="fa fa-plus"></i> Tambah Baru
    </button>
</p>
<form action="<?= base_url('admin/dosen/tambah')?>" method="post" id="form_tambah_dosen" accept-charset="utf-8" enctype="multipart/form-data">
    <?= csrf_field();
?>

    <div class="modal fade" id="modal-default">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Baru</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-3">Nama dosen</label>
                        <div class="col-9">
                            <input type="text" name="nama" class="form-control" placeholder="Nama dosen"
                                value="<?= set_value('nama') ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">NIK</label>
                        <div class="col-9">
                            <input type="number" name="nik" class="form-control" placeholder="NIK dosen"
                                value="<?= set_value('nik') ?>" required>
                        </div>
                    </div> 
                    <div class="form-group row">
                        <label class="col-3">NIDN</label>
                        <div class="col-9">
                            <input type="number" name="nidn" class="form-control" placeholder="NIDN"
                                value="<?= set_value('nidn') ?>" required>
                        </div>
                    </div>  
                    <div class="form-group row">
                        <label class="col-3">Email</label>
                        <div class="col-9">
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com"
                                value="<?= set_value('email') ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Username</label>
                        <div class="col-9">
                            <input type="text" name="username" class="form-control" placeholder="Username"
                                value="<?= set_value('username') ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Password</label>
                        <div class="col-9">
                            <input type="password" name="password" class="form-control" placeholder="password"
                                value="<?= set_value('password') ?>" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Jenis, jabatan</label>
                        <div class="col-5">
                            <select name="jenis_jabatan" id="jenis_jabatan" class="form-control select2bs4" required>
                                <option value="">---Pilih Jenis Jabatan---</option>
                                <option value="Struktural">Struktural</option>
                                <option value="Fungsional">Fungsional</option>
                            </select>
                            <small class="text-secondary">Jenis jabatan</small>
                        </div>
                        <div class="col-4">
                            <select name="id_jabatan" id="id_jabatan" class="form-control select2bs4" required>
                                <option value="">---Pilih Jabatan---</option>
                                <!--DATA DI LOOPING DI PHP-->
                                <?php foreach ($jabatan as $row) { ?>
                                    <option value="<?= $row['id_jabatan'] ?>">
                                        <?= $row['nama_jabatan'] ?>
                                    </option>
                                <?php } ?>
                            </select>
                            <small class="text-secondary">jabatan dosen</small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3">Tempat, tanggal lahir</label>
                        <div class="col-5">
                            <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat lahir"
                                value="<?= set_value('tempat_lahir') ?>" required>
                        </div>
                        <div class="col-md-4">
                            <input type="text" name="tanggal_lahir" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_lahir'])) {
                                    echo set_value('tanggal_lahir');
                                } else {
                                    echo date('d-m-Y');
                                } ?>" required>
                            <small class="text-secondary">Format <strong>dd-mm-yyyy</strong>. Misal:
                                <?= date('d-m-Y') ?></small>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3">Website dan Telepon</label>
                        <div class="col-5">
                            <input type="text" name="website" class="form-control" placeholder="https://www.apkindi.com"
                                value="<?= set_value('website') ?>">
                        </div>
                        <div class="col-4">
                            <input type="number" name="telepon" class="form-control" placeholder="Telepon">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3">Alamat</label>
                        <div class="col-9">
                            <textarea name="alamat" placeholder="Alamat"
                                class="form-control"><?= set_value('alamat') ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-3">Keahlian</label>
                        <div class="col-9">
                            <textarea name="keahlian" placeholder="Keahlian"
                                class="form-control"><?= set_value('keahlian') ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Upload Foto Profil</label>
                        <div class="col-5">
                            <input type="file" name="gambar" class="form-control" placeholder="gambar"
                                value="<?= set_value('gambar') ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-3">Status Dosen</label>
                        <div class="col-3">
                            <select name="status_dosen" class="form-control" required>
                                <option value="Tetap">Dosen Tetap</option>
                                <option value="Tidak Tetap">Dosen Tidak Tetap</option>
                            </select>
                            <small class="text-secondary">Status dosen</small>
                        </div>
                    </div>

                </div>
                <div class="modal-footer center-content-between">
                    <button type="button" class="btn btn-warning" data-dismiss="modal"><i class="fa fa-times"></i>
                        Close</button>
                    <button type="submit" class="btn btn-primary btnSimpan"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
    <script>
    $(document).ready(function() {
        $('#jenis_jabatan').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url();?>/admin/dosen/jabatan",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    //data di looping di php
                    var html = '';
                    var i;
                    for (i = 0; i < data.length; i++) {

                        html += '<option value="' + data[i].id_jabatan + '">' + data[i]
                            .nama_jabatan + '</option>';
                    }
                    $('#jabatan').html(html);

                }
            });
        });
    });
    </script>
    
    <?= form_close(); ?>