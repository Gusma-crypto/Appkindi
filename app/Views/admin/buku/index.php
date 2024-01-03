<p>
    <a href="<?= base_url('admin/buku/tambah') ?>" class="btn btn-primary">
        <i class="fa fa-plus"></i> Tambah Baru
    </a>
</p>

<table class="table table-bordered" id="example1">
    <thead>
        <tr>
            <th width="5%">#</th>
            <th width="10%">Cover</th>
            <th width="20%">Judul </th>
            <th width="20%">Biografi</th>
            <th width="15%">Author</th>
            <th width="15%">Act</th>
        </tr>
    </thead>
    <tbody>
        <?php $no = 1;
        foreach ($buku as $buku) { ?>
        <tr>
            <td><?= $no ?></td>
            <td>
                <?php if ($buku['gambar'] === '') {
                    echo '-';
                } else { ?>
                <img src="<?= base_url('assets/upload/buku/thumbs/' . $buku['gambar']) ?>" class="img img-thumbnail">
                <?php } ?>
            </td>
            <td><a href="<?= base_url('admin/buku/edit/' . $buku['id_buku']) ?>">
                    <?= $buku['judul_buku'] ?><br> (<?= $buku['jenis_kode'] ?>: <?= $buku['kode_buku'] ?>)
                    <small>
                        <br>
                        <a href="<?= $buku['website'] ?>"><i class="fa fa-link"></i> <?= $buku['website'] ?> </a>

                    </small>
                </a>
                <small>
                    <br><i class="fa fa-eye"></i> Hits: <?= $buku['hits'] ?>
                    <br><i class="fa fa-book"></i> Kategori : <?= $buku['nama_kategori_buku'] ?>
                    <br><i class="fa fa-address-card"></i> Jenis : <?= $buku['jenis_buku'] ?>
                    <br><i class="fa fa-calendar"></i> Tanggal Publish:
                    <?= tanggal_bulan_menit($buku['tanggal_publish']) ?>
                </small>
            </td>
            <td>
                <br><i class="fa fa-edit"></i> Penulis : <?= $buku['penulis'] ?>
                <br><i class="fa fa-university"></i> Penerbit : <?= $buku['penerbit'] ?>
                <br><i class="fa fa-calendar"></i> Tanggal Terbit: <?= tanggal_bulan_menit($buku['tanggal_terbit']) ?>
                <br><i class="fa fa-id-badge"></i> Own : <?= $buku['nama'] ?>
            </td>
            <td>
                <?= $buku['username'] ?>
                <small>
                    <br><i class="fa fa-calendar"></i> Updated: <?= tanggal_bulan_menit($buku['tanggal']) ?>
                </small>
            </td>
            <td> <?php if ($buku['file'] === null) {
                            echo '';
                        } else { ?>
                <a href="<?= base_url('admin/buku/unduh/' . $buku['id_buku']) ?>" class="btn btn-success btn-sm"><i
                        class="fa fa-download"></i></a>
                <?php } ?>
                <a href="<?= base_url('admin/buku/edit/' . $buku['id_buku']) ?>" class="btn btn-success btn-sm"><i
                        class="fa fa-edit"></i></a>
                <a href="<?= base_url('admin/buku/delete/' . $buku['id_buku']) ?>" class="btn btn-dark btn-sm"
                    onclick="confirmation(event)"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
        <?php $no++; } ?>
    </tbody>
</table>