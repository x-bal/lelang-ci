<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="<?= base_url('assets/images/barang/' . $barang['images']) ?>" alt="" width="250px">
                    </div>
                    <div class="col-md-6">
                        <p>
                            <b>Nama Barang : </b><?= $barang['nama_barang'] ?><br>
                            <b>Harga Awal : </b>Rp. <?= rupiah($barang['harga_awal'])  ?><br>
                            <b>Deskripsi : </b><?= $barang['deskripsi'] ?><br>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>