<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <a href="<?= base_url('petugas/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah Petugas</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th></th>
                            <th>No</th>
                            <th>Username</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Telp</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $i = 1;
                        foreach ($petugas as $tgs) : ?>
                            <tr>
                                <td></td>
                                <td><?= $i++ ?></td>
                                <td><?= $tgs['username'] ?></td>
                                <td><?= $tgs['nama'] ?></td>
                                <td><?= $tgs['email'] ?></td>
                                <td><?= $tgs['telp'] ?></td>
                                <td>
                                    <a href="<?= base_url('petugas/edit/' . $tgs['id_petugas']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>