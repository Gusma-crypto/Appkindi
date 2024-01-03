<?= form_open(base_url('admin/kategori_buku/edit/' . $kategori_buku['id_kategori_buku']));
echo csrf_field();
?>

<div class="form-group row">
    <label class="col-3">Nama Kategori buku</label>
    <div class="col-9">
        <input type="text" name="nama_kategori_buku" class="form-control" placeholder="Nama kategori_buku"
            value="<?= $kategori_buku['nama_kategori_buku'] ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-3">Nomor urut Kategori buku</label>
    <div class="col-9">
        <input type="number" name="urutan" class="form-control" placeholder="Nomor urut kategori_buku"
            value="<?= $kategori_buku['urutan'] ?>" required>
    </div>
</div>

<div class="form-group row">
    <label class="col-3"></label>
    <div class="col-9">
        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Simpan</button>
    </div>
</div>

<?= form_close(); ?>