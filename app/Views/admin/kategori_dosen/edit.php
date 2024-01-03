<?= form_open(base_url('admin/kategori_dosen/edit/' . $kategori_dosen['id_kategori_dosen']));
echo csrf_field();
?>

<div class="form-group row">
    <label class="col-3">Nama Kategori dosen</label>
    <div class="col-9">
        <input type="text" name="nama_kategori_dosen" class="form-control" placeholder="Nama kategori_dosen"
            value="<?= $kategori_dosen['nama_kategori_dosen'] ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-3">Nomor urut Kategori dosen</label>
    <div class="col-9">
        <input type="number" name="urutan" class="form-control" placeholder="Nomor urut kategori_dosen"
            value="<?= $kategori_dosen['urutan'] ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-3"></label>
    <div class="col-9">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    </div>
</div>

<?= form_close(); ?>