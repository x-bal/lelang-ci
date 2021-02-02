<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="<?= base_url('dashboard') ?>"><img src="<?= base_url('assets') ?>/images/logo/logo.png" alt="Logo" srcset=""></a>
                </div>
                <div class="toggler">
                    <a href="#" class='sidebar-hide d-xl-none d-block'><i class='bi bi-x bi-middle'></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class='sidebar-title'>Menu</li>

                <li class="sidebar-item active ">
                    <a href="<?= base_url('dashboard') ?>" class='sidebar-link'>
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <?php if ($this->session->userdata('level_id') == 1) : ?>
                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="bi bi-stack"></i>
                            <span>Data Master</span>
                        </a>
                        <ul class="submenu ">
                            <li>
                                <a href="<?= base_url('user') ?>">Data User</a>
                            </li>
                            <li>
                                <a href="<?= base_url('level') ?>">Data Level</a>
                            </li>
                        </ul>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('petugas') ?>" class='sidebar-link'>
                            <i class="fas fa-user-shield"></i>
                            <span>Data Petugas</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('masyarakat') ?>" class='sidebar-link'>
                            <i class="fas fa-user-tag"></i>
                            <span>Data Masyarakat</span>
                        </a>
                    </li>
                <?php endif; ?>
                <?php if ($this->session->userdata('level_id') != 3) : ?>
                    <li class="sidebar-item">
                        <a href="<?= base_url('barang') ?>" class='sidebar-link'>
                            <i class="fas fa-tags"></i>
                            <span>Data Barang</span>
                        </a>
                    </li>

                    <li class="sidebar-item  has-sub">
                        <a href="#" class='sidebar-link'>
                            <i class="fab fa-uncharted"></i>
                            <span>Data Lelang</span>
                        </a>
                        <ul class="submenu ">
                            <li>
                                <a href="<?= base_url('lelang') ?>">Data Lelang</a>
                            </li>
                            <li>
                                <a href="<?= base_url('level') ?>">Laporan Lelang</a>
                            </li>
                        </ul>
                    </li>
                <?php elseif ($this->session->userdata('level_id') == 3) : ?>
                    <li class="sidebar-item">
                        <a href="<?= base_url('dashboard/lelang') ?>" class='sidebar-link'>
                            <i class="fab fa-uncharted"></i>
                            <span>Lelang</span>
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('dashboard/lelang') ?>" class='sidebar-link'>
                            <i class="fas fa-history"></i>
                            <span>History</span>
                        </a>
                    </li>
                <?php endif; ?>
                <li class="sidebar-item">
                    <a href="<?= base_url('auth/logout') ?>" class='sidebar-link'>
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </a>
                </li>

            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>
<div id="main">
    <header class='mb-3'>
        <a href="#" class='burger-btn d-block d-xl-none'>
            <i class='bi bi-justify fs-3'></i>
        </a>
    </header>

    <div class="page-heading">
        <h3><?= $title ?></h3>
    </div>
    <div class="page-content">