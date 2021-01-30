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

                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-stack"></i>
                        <span>Data Master</span>
                    </a>
                    <ul class="submenu ">
                        <li>
                            <a href="<?= base_url('user/index') ?>">Data User</a>
                        </li>
                        <li>
                            <a href="<?= base_url('level/index') ?>">Data Level</a>
                        </li>
                    </ul>
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