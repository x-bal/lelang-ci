<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">History Penawaran</div>

            <div class="card-body">
                <a href="<?= base_url('history/destroyAll/' . $this->session->userdata('id_user')) ?>" class="btn btn-sm btn-info mb-3" onclick="return confirm('Hapus semua history?')">Hapus Semua</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Harga Penawaran</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($history as $his) : ?>
                            <tr>
                                <td></td>
                                <td><?= $no++ ?></td>
                                <td><?= $his['nama_barang'] ?></td>
                                <td>Rp. <?= rupiah($his['harga_awal']) ?></td>
                                <td>Rp. <?= rupiah($his['penawaran_harga']) ?></td>
                                <td><a href="<?= base_url('history/destroy/' . $his['id_history']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus history penawaran?')"><i class="fas fa-trash"></i></a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>