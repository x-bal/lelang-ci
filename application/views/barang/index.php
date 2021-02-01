<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <a href="<?= base_url('barang/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah Barang</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Image</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Deskripsi</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($barang as $brg) : ?>
                            <tr>
                                <td></td>
                                <td><?= $no++ ?></td>
                                <td>Image</td>
                                <td><?= $brg['nam'] ?></td>
                                <td>
                                    <a href="<?= base_url('barang/edit/' . $brg['id_barang']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('barang/destroy/' . $brg['id_barang']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus barang?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>