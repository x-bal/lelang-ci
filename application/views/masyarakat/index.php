<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header"><?= $title ?></div>

            <div class="card-body">
                <a href="<?= base_url('masyarakat/create') ?>" class="btn btn-sm btn-primary mb-3">Tambah Masyarakat</a>
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
                        foreach ($masyarakat as $msy) : ?>
                            <tr>
                                <td></td>
                                <td><?= $i++ ?></td>
                                <td><?= $msy['username'] ?></td>
                                <td><?= $msy['nama'] ?></td>
                                <td><?= $msy['email'] ?></td>
                                <td><?= $msy['telp'] ?></td>
                                <td>
                                    <a href="<?= base_url('masyarakat/edit/' . $msy['id_masyarakat']) ?>" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                    <a href="<?= base_url('masyarakat/destroy/' . $msy['id_masyarakat']) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus masyarakat?')"><i class="fas fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>