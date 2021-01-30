<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <a href="<?= base_url('user/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah User</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;  
                        foreach($users as $user) : ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $user['username'] ?></td>
                                <td><?= $user['email'] ?></td>
                                <td>
                                    <a href="<?= base_url('user/edit/' . $user['id']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>    
                                    <a href="<?= base_url('user/destroy/' . $user['id']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus User?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>