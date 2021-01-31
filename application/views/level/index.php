<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <a href="<?= base_url('level/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah Level</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Level</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($levels as $level) : ?>
                            <tr>
                                <td></td>
                                <td><?= $no++ ?></td>
                                <td><?= $level['level'] ?></td>
                                <td>
                                    <a href="<?= base_url('level/edit/' . $level['id_level']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('level/destroy/' . $level['id_level']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus Level?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>