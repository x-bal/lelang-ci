<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <form action="<?= base_url('dashboard/updateProfile')?>" method="post">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" value="<?= $profile['nama'] ?>" class="form-control">

                        <?php if(form_error('nama')) : ?>
                            <small class="text-danger mt-3"><?= form_error('nama')?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="no_tlp">No Telp</label>
                        <input type="number" name="no_tlp" id="no_tlp" value="<?= $profile['telp'] ?>" class="form-control">

                        <?php if(form_error('no_tlp')):?>
                            <small class="text-danger mt-3"><?= form_error('no_tlp')?></small>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>