<p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        <i class="fa fa-plus"></i> Tambah Baru
    </button>
</p>
<?= form_open(base_url('admin/jumlahmahasiswa'));
echo csrf_field();
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
                    <label class="col-3">Semester</label>
                    <div class="col-9">
                        <input type="number" name="semester" class="form-control" placeholder="Masukan Semester"
                            value="<?= set_value('semesester') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Tahun Akademik</label>
                    <div class="col-9">
                        <input type="text" name="tahunakademik" class="form-control" placeholder="Contoh : 2023/2024"
                            value="<?= set_value('tahunakademik') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Periode</label>
                    <div class="col-9">
                        <input type="text" name="periode" class="form-control" placeholder="Contoh : Gelombang I"
                            value="<?= set_value('periode') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Tanggal Mulai</label>
                    <div class="col-md-9">
                        <input type="text" name="tanggal_mulai" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_mulai'])) {
                                    echo set_value('tanggal_mulai');
                                } else {
                                    echo date('d-m-Y');
                                } ?>" required>
                        <small class="text-secondary text-danger">Format <strong>dd-mm-yyyy</strong></small>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Tanggal Selesai</label>
                    <div class="col-md-9">
                        <input type="text" name="tanggal_selesai" class="form-control tanggal" value="<?php if (isset($_POST['tanggal_selesai'])) {
                                    echo set_value('tanggal_selesai');
                                } else {
                                    echo date('d-m-Y'); 
                                } ?>" required>
                        <small class="text-secondary text-danger">Format <strong>dd-mm-yyyy</strong></small>
                    </div>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i>
                    Close</button>
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?= form_close(); ?>