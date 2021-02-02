<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/images/barang/' . $lelang['images']) ?>" alt="" width="150px">
                    </div>
                    <div class="col-md-7 my-3">
                        <p>
                            <b>Nama Barang : </b><?= $lelang['nama_barang'] ?><br>
                            <b>Harga Awal : </b>Rp. <?= rupiah($lelang['harga_awal'])  ?><br>
                            <b>Deskripsi : </b><?= $lelang['deskripsi'] ?><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card p-3">
            <div class="card-body">
                <form action="<?= base_url('lelang/tawarkan') ?>" method="post">
                    <input type="hidden" name="id_barang" value="<?= $lelang['id_barang'] ?>">
                    <div class="form-group">
                        <label for="tawaran">Penawaran</label>
                        <input type="number" name="tawaran" id="tawaran" class="form-control">

                        <?php if (form_error('tawaran')) : ?>
                            <div class="mt-2">
                                <small class="text-danger"><?= form_error('tawaran') ?></small>
                            </div>
                        <?php endif; ?>

                        <?php if ($this->session->userdata('tawaran')) : ?>
                            <div class="mt-2">
                                <small class="text-danger"><?= $this->session->userdata('tawaran') ?></small>
                            </div>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Tawarkan</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">Data Penawaran Harga</div>

            <div class="card-body">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Nama Penawar</th>
                            <th>Harga Awal</th>
                            <th>Tawaran</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        foreach ($historyLelang as $history) : ?>
                            <tr>
                                <td></td>
                                <td><?= $i++ ?></td>
                                <td><?= $lelang['nama_barang'] ?></td>
                                <td><?= $history['nama'] ?></td>
                                <td>Rp. <?= rupiah($lelang['harga_awal']) ?></td>
                                <td>Rp. <?= rupiah($history['penawaran_harga']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>