<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('lelang/store') ?>" method="post">
                        <div class="form-group">
                            <label for="barang">Barang</label>
                            <select name="barang" id="barang" class="form-control">
                                <option disabled selected>-- Pilih Barang --</option>
                                <?php foreach ($barang as $brg) : ?>
                                            <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                    <?php foreach ($lelang as $lel) : ?>
                                        <?php if ($brg['id_barang'] == $lel['barang_id']) : ?>
                                        <?php else : ?>
                                            <option value="<?= $brg['id_barang'] ?>"><?= $brg['nama_barang'] ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal Lelang</label>
                            <input type="date" name="tanggal" id="tanggal" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>