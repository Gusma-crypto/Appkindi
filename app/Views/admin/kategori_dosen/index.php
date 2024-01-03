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

foreach ($kategori_dosen as $kategori_dosen) { ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $kategori_dosen['nama_kategori_dosen'] ?></td>
            <td><?= $kategori_dosen['slug_kategori_dosen'] ?></td>
            <td><?= $kategori_dosen['urutan'] ?></td>
            <td>
                <a href="<?= base_url('admin/kategori_dosen/edit/' . $kategori_dosen['id_kategori_dosen']) ?>"
                    class="btn btn-success btn-sm"><i class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/kategori_dosen/delete/' . $kategori_dosen['id_kategori_dosen']) ?>"
                    class="btn btn-dark btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>