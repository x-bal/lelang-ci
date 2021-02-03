<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <form action="<?= base_url('masyarakat/update/' . $masyarakat['id_masyarakat']) ?>" method="post">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" value="<?= $masyarakat['username'] ?>" readonly>

                        <?php if (form_error('username')) : ?>
                            <small class="text-danger mt-3"><?= form_error('username') ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" value="<?= $masyarakat['nama'] ?>">

                        <?php if (form_error('nama')) : ?>
                            <small class="text-danger mt-3"><?= form_error('nama') ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?= $masyarakat['email'] ?>" readonly>

                        <?php if (form_error('email')) : ?>
                            <small class="text-danger mt-3"><?= form_error('email') ?></small>
                        <?php endif; ?>
                    </div>

                    <div class="form-group">
                        <label for="telp">No Telp</label>
                        <input type="number" name="telp" id="telp" class="form-control" value="<?= $masyarakat['telp'] ?>">

                        <?php if (form_error('telp')) : ?>
                            <small class="text-danger mt-3"><?= form_error('telp') ?></small>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>