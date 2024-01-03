<p>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default">
        <i class="fa fa-plus"></i> Tambah Baru
    </button>
</p>
<?= form_open(base_url('admin/jumlahmahasiswa/index'));
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
                    <label class="col-3">Tahun Akademik</label>
                    <div class="col-6">
                        <select name="id_tahun_akademik" class="form-control select2bs4" required>
                            <option value="">-----Tahun Akademik----</option>
                            <?php foreach ($tahunakademik as $ta) { ?>
                            <option value="<?= $ta['id_tahun_akademik'] ?>">
                                <?= $ta['tahun_akademik'] ?> - <?= $ta['periode'] ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-3">
                        <a href="<?= base_url('admin/tahunakademik')?>" class="btn btn-sm btn-success"> Tahun
                            Akademik</a>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Mahasiswa Masuk</label>
                    <div class="col-9">
                        <input type="number" name="jumlah_masuk" class="form-control"
                            placeholder="Jumlah Mahasiswa Masuk" value="<?= set_value('jumlah_masuk') ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-3">Mahasiswa Wisuda/Lulus</label>
                    <div class="col-9">
                        <input type="number" name="jumlah_keluar" class="form-control"
                            placeholder="Jumlah Mahasiswa Wisuda/Lulus" value="<?= set_value('jumlah_keluar') ?>"
                            required>
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