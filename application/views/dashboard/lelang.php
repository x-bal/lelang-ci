<div class="row">
    <?php foreach ($lelang as $barang) : ?>
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-content">
                    <img class="card-img-top img-fluid" src="<?= base_url('assets/images/barang/' . $barang['images']) ?>" alt="Card image cap" style="height: 17rem; object-fit: cover; object-position: center;">
                    <div class="card-body">
                        <h4 class="card-title"><?= $barang['nama_barang'] ?></h4>
                        <div class="badge bg-primary">Rp. <?= rupiah($barang['harga_awal']) ?></div>
                        <p class="card-text my-3">
                            <?= substr($barang['deskripsi'], 0, 30)  ?>...
                        </p>
                        <a href="<?= base_url('lelang/show/' . $barang['id_barang']) ?>">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>