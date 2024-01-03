<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>#</th>
            <th>Dosen</th>
            <th>Total Buku/Jurnal</th>
            <th>Act</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        $no = 1;
        foreach ($reportbuku as $r) { ?>
        <tr>
            <td><?= $no ?></td>
            <td><?= $r['nama']?></td>
            <td><?= $r['jumlah_buku']?></td>
            <td>
                <a href="<?= base_url('admin/buku/detailperdosen/'.$r['id_dosen'])?>" class="btn btn-sm btn-warning">
                    Detail
                </a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>