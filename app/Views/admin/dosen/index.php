<?php include 'tambah.php'; ?>
<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th width="5%">No</th>
            <th width="5%">Photo</th>
            <th width="20%">Nama</th>
            <th width="20%">Akses Level</th> 
            <th width="30%">Kontak</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;

foreach ($dosen as $dosen) { ?>
        <tr>
            <td><?= $no ?></td>
            <td><?php if ($dosen['gambar'] === '') { 
                    echo '-';
                } else { ?>
                <img src="<?= base_url('assets/upload/dosen/thumbs/' . $dosen['gambar']) ?>" class="img img-thumbnail">
                <?php } ?>
            </td>
            <td><?= $dosen['nama'] ?>
                <small>
                    <br><i class="fa fa-sitemap"></i> jabatan: <?= $dosen['jenis_jabatan'] ?> - <?= $dosen['nama_jabatan'] ?>
                    
                </small>
            </td>
            <td><?= $dosen['akses_level'] ?></td>
            <td><small><i class="fa fa-phone"></i> <?= $dosen['telepon'] ?>
                    <br><i class="fa fa-envelope"></i> <?= $dosen['email'] ?>
                    <br><i class="fa fa-globe"></i> <?= $dosen['website'] ?>
                    <br><i class="fa fa-map"></i> <?= $dosen['alamat'] ?>
                </small>
            </td>
            <td>
                <a href="<?= base_url('admin/dosen/edit/' . $dosen['id_dosen']) ?>" class="btn btn-success btn-sm"><i
                        class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/dosen/delete/' . $dosen['id_dosen']) ?>" class="btn btn-dark btn-sm"
                    onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>