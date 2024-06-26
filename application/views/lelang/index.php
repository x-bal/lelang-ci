<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <a href="<?= base_url('lelang/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah Lelang</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Image</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Harga Awal</th>
                            <th>Pemenang</th>
                            <th>Harga Akhir</th>
                            <th>Status</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <?php $i = 1;
                    foreach ($lelang as $barang) : ?>
                        <tr>
                            <td></td>
                            <td><?= $i++ ?></td>
                            <td><img src="<?= base_url('assets/images/barang/' . $barang['images']) ?>" alt="" width="80"></td>
                            <td><?= $barang['tanggal_lelang'] ?></td>
                            <td><?= $barang['nama_barang'] ?></td>
                            <td>Rp. <?= rupiah($barang['harga_awal']) ?></td>
                            <?php $pemenang = $this->User_M->masyarakat($barang['user_id']); ?>
                            <td>
                                <?php if ($pemenang) : ?>
                                    <?= $pemenang['nama'] ?>
                                <?php else : ?>
                                    -
                                <?php endif; ?>
                            </td>
                            <td>Rp. <?= rupiah($barang['harga_akhir']) ?></td>
                            <td>
                                <div class="form-check form-switch">
                                    <input class="form-check-input status" type="checkbox" id="<?= $barang['id_lelang'] ?>" <?= $barang['status'] == 'dibuka' ? 'checked' : '' ?>>
                                </div>
                            </td>
                            <td>
                                <a href="<?= base_url('lelang/show/' . $barang['id_lelang']) ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>
                                <a href="<?= base_url('lelang/destroy/' . $barang['id_lelang']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data?')"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>