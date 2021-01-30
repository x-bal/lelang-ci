<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card">
                <div class="body">
                    <form action="<?= base_url('level/store') ?>" method="post">
                        <div class="form-group">
                            <label for="level">Level</label>
                            <input type="text" name="level" id="level" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>