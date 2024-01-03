<?php
	include 'tambah.php';
?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>No</th>
            <th>Jabatan</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;

	foreach ($jabatan as $jabatan) { ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $jabatan['nama_jabatan'] ?></td>
            <td>
                <a href="<?= base_url('admin/jabatan/delete/' . $jabatan['id_jabatan']) ?>"
                    class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>