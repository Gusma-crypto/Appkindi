<?php
	// include 'tambah.php';
?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th>#</th>
            <th>Judul Buku</th>
            <th>Kategori (Jenis)</th>
            <th>Penulis</th>
            <th>Penerbit</th>
            <th>Tanggal Terbit</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no=1;
        foreach($buku as $buku){
        ?>
        <tr>
            <td><?= $no; ?></td>
            <td><?= $buku['judul_buku']?></td>
            <td><?= $buku['nama_kategori_buku']?> (<?= $buku['jenis_buku']?>)</td>
            <td><?= $buku['penulis']?></td>
            <td><?= $buku['penerbit']?></td>
            <td><?= $buku['tanggal_terbit']?></td>
            <td>
                <a href="#" class="btn btn-sm btn-success btn-edit"><i class="fas fa-pencil-alt"></i></a>
                <?php if( $buku['file']===null){?>
                <!--Kosongkan Saja-->
                <?php
                }else{?>
                <a href="<?= base_url('dosen/buku/unduh/'.$buku['id_buku'])?>"
                    class="btn btn-sm btn-primary btn-download"><i class="fas fa-download"></i></a>
                <?php }?>
                <a href="#" class="btn btn-sm btn-warning btn-edit"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; }?>
    </tbody>
</table>