<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="25%">Nama</th>
            <th width="25%">Slug</th>
            <th width="25%">Urutan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;

foreach ($kategori_buku as $kategori_buku) { ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $kategori_buku['nama_kategori_buku'] ?></td>
            <td><?= $kategori_buku['slug_kategori_buku'] ?></td>
            <td><?= $kategori_buku['urutan'] ?></td>
            <td>
                <a href="<?= base_url('admin/kategori_buku/edit/' . $kategori_buku['id_kategori_buku']) ?>"
                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/kategori_buku/delete/' . $kategori_buku['id_kategori_buku']) ?>"
                    class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>