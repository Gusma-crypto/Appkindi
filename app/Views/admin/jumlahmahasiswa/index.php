<?php
    include 'tambah.php';
?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>#</th>
            <th>Semester</th>
            <th>Tahun Akademik</th>
            <th>Periode</th>
            <th>Jumlah Mahasiswa Masuk</th>
            <th>Jumlah Mahasiswa Wisuda</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;

	foreach ($jumlahmahasiswa as $jm) { ?>
        <tr>
            <td><?= $no ?></td>
            <td>Semester <?= $jm['semester'] ?></td>
            <td><?= $jm['tahun_akademik'] ?></td>
            <td><?= $jm['periode'] ?></td>
            <td class="text-center"><?= $jm['jumlah_masuk'] ?></td>
            <td class="text-center"><?= $jm['jumlah_keluar'] ?></td>
            <td>
                <a href="<?= base_url('admin/jumlahmahasiswa/delete/' . $jm['id_jumlah_mahasiswa']) ?>"
                    class="btn btn-danger btn-sm" onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
    <tfoot>
        <tr>
            <th colspan="4" class="text-center">Total</th>
            <th class=" text-center bg-success"><?= $count['masuk']?></th>
            <th class=" text-center bg-danger"><?= $count['keluar']?></th>
        </tr>
    </tfoot>
</table>