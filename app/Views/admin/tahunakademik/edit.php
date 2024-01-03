<?= form_open(base_url('admin/tahunakademik/edit'));
echo csrf_field();
?>
<div class="modal fade" id="modal-edit-<?=$ta['id_tahun_akademik']?>">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit Data</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row">
                    <label class="col-3">Semester</label>
                    <div class="col-9">
                        <input type="number" name="semester" class="form-control" placeholder="Masukan Semester"
                            value="<?= set_value('semesester', $ta['semester']) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Tahun Akademik</label>
                    <div class="col-9">
                        <input type="text" name="tahunakademik" class="form-control"
                            value="<?= set_value('tahunakademik', $ta['tahun_akademik']) ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Periode</label>
                    <div class="col-9">
                        <input type="text" name="periode" class="form-control"
                            value="<?= set_value('periode', $ta['periode']) ?>" required>
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