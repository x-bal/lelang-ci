<?php if ($this->session->userdata('level_id') != 3) {
    $user = $this->User_M->petugas($this->session->userdata('id_user'));
} else {
    $user = $this->User_M->masyarakat($this->session->userdata('id_user'));
} ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <h5>Selamat Datang, <?= $user['nama'] ?></h5>

                <p>Have a nice day :)</p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <?php if ($this->session->userdata('level_id') == 1) : ?>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon purple">
                                <i class='fas fa-users'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah User</h6>
                            <h6 class='font-extrabold mb-0'><?= $this->Dashboard_M->user() ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon green">
                                <i class='fas fa-user-shield'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Petugas</h6>
                            <h6 class='font-extrabold mb-0'><?= $this->Dashboard_M->petugas() ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon blue">
                                <i class='fas fa-user-tag'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Masyarakat</h6>
                            <h6 class='font-extrabold mb-0'><?= $this->Dashboard_M->masyarakat() ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('level_id') != 3) : ?>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon black">
                                <i class='fas fa-tags'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Barang</h6>
                            <h6 class='font-extrabold mb-0'><?= $this->Dashboard_M->barang() ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon red">
                                <i class='fab fa-uncharted'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Data Lelang</h6>
                            <h6 class='font-extrabold mb-0'><?= $this->Dashboard_M->lelang() ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon bg-warning">
                                <i class='fa fa-money-check-alt'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Data Penawaran</h6>
                            <h6 class='font-extrabold mb-0'><?= $this->Dashboard_M->history() ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($this->session->userdata('level_id') == 3) : ?>
        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon purple">
                                <i class='fas fa-tags'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Barang di Dapat</h6>
                            <h6 class='font-extrabold mb-0'><?= $lelang ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="col-6 col-lg-4 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-3 text-white">
                            <div class="stats-icon blue">
                                <i class='fab fa-uncharted'></i>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <h6 class="text-muted font-semibold">Jumlah Penawaran</h6>
                            <h6 class='font-extrabold mb-0'><?= $penawaran ?></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>