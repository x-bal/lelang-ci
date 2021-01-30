<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card">
                <div class="body">
                    <form action="<?= base_url('user/store') ?>" method="post">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" name="username" id="username" class="form-control">
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="level">Level</label>
                            <select name="level_id" id="level" class="form-control">
                                <option disabled selected>-- Pilih Level --</option>
                                <?php foreach($levels as $level) : ?>
                                    <option value="<?= $level['id'] ?>"><?= $level['level'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>