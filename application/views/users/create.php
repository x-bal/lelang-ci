<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card">
                <div class="card-body">
                    <form action="<?= base_url('user/store') ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">

                            <?php if (form_error('username')) : ?>
                                <div class="mt-2 text-danger"><?= form_error('username') ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">

                            <?php if (form_error('email')) : ?>
                                <div class="mt-2 text-danger"><?= form_error('email') ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control">

                            <?php if (form_error('nama')) : ?>
                                <div class="mt-2 text-danger"><?= form_error('nama') ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">

                            <?php if (form_error('password')) : ?>
                                <div class="mt-2 text-danger"><?= form_error('password') ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level_id" id="level" class="form-control">
                                <option disabled selected>-- Pilih Level --</option>
                                <?php foreach ($levels as $level) : ?>
                                    <option value="<?= $level['id_level'] ?>"><?= $level['level'] ?></option>
                                <?php endforeach; ?>
                            </select>

                            <?php if (form_error('level_id')) : ?>
                                <div class="mt-2 text-danger"><?= form_error('level_id') ?></div>
                            <?php endif; ?>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>