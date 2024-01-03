<?php
	include 'tambah.php';
?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>Semester</th>
            <th>Tahun Akademik</th>
            <th>Periode</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;

	foreach ($tahunakademik as $ta) { ?>
        <tr>
            <td><?= $no ?></td>
            <td> Semester <?= $ta['semester'] ?></td>
            <td><?= $ta['tahun_akademik'] ?></td>
            <td><?= $ta['periode'] ?></td>
            <td><?= $ta['tanggal_mulai'] ?></td>
            <td><?= $ta['tanggal_selesai'] ?></td>
            <td>
                <a href="<?= base_url('admin/TahunAkademik/delete/' . $ta['id_tahun_akademik']) ?>"
                    class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>

<!--edit-->
<?= form_open(base_url('admin/tahunakademik/edit'));
echo csrf_field();
?>
<div class="modal fade" id="modal-edit">
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

<script>
$(document).ready(function() {
    // Untuk sunting
    $('#modal-edit').on('show.bs.modal', function(event) {
        var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan
        var modal = $(this)

        // Isi nilai pada field
        modal.find('#id').attr("value", div.data('id'));
        modal.find('#nama').attr("value", div.data('nama'));
        modal.find('#alamat').html(div.data('alamat'));
        modal.find('#pekerjaan').attr("value", div.data('pekerjaan'));
    });
});
</script>