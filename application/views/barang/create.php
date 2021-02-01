<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('barang/store') ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="nama_barang">Nama Barang</label>
                            <input type="text" name="nama_barang" id="nama_barang" class="form-control">

                            <?php if (form_error('nama_barang')) : ?>
                                <small class="text-danger mt-3"><?= form_error('nama_barang') ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="harga_awal">Harga Awal</label>
                            <input type="number" name="harga_awal" id="harga_awal" class="form-control">

                            <?php if (form_error('harga_awal')) : ?>
                                <small class="text-danger mt-3"><?= form_error('harga_awal') ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" rows="5" class="form-control"></textarea>

                            <?php if (form_error('deskripsi')) : ?>
                                <small class="text-danger mt-3"><?= form_error('deskripsi') ?></small>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="images">Images</label>
                            <input type="file" name="images" id="images" class="form-control">

                            <?php if (form_error('images')) : ?>
                                <small class="text-danger mt-3"><?= form_error('images') ?></small>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>