<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul Buku</th>
            <th>Kategori-Jenis</th>
            <th>Penerbit</th>
            <th>Penulis</th>
            <th>Tanggal Terbit</th>
            <th>Act</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($detailbukudosen as $r) { ?>
        <tr>
            <td><?= $no++?></td>
            <td><?= $r['judul_buku']?></td>
            <td><?= $r['nama_kategori_buku']?> (<?= $r['jenis_buku']?>)</td>
            <td><?= $r['penerbit']?></td>
            <td><?= $r['penulis']?></td>
            <td><?= tanggal_id($r['tanggal_terbit'])?></td>
            <td>
                <?php if ($r['file'] === null) {
                        echo ' tidak ada file';
                    } else { ?>
                <a href="<?= base_url('admin/buku/unduh/'.$r['id_buku']) ?>" class="btn btn-success btn-sm btn-block"><i
                        class="fa fa-download"></i> Unduh</a>
                <?php } ?>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>