<?php $level = $this->session->userdata('level'); ?>

<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Beranda</div>
                <a class="nav-link" href="<?=site_url('dashboard')?>"><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>Dashboard</a>

                <?php if($level=='admin' || $level=='administrator') { ?>
                <div class="sb-sidenav-menu-heading">Admin</div>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>Menu<div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="<?=site_url('user') ?>">Data user</a>
                        <a class="nav-link" href="<?=site_url('user2') ?>">Data user avatar</a>
                        <a class="nav-link" href="<?=site_url('member') ?>">Data member</a>
                    </nav>
                </div>
                <?php } ?>

                <?php if($level=='user' || $level=='administrator') { ?>
                <div class="sb-sidenav-menu-heading">User</div>
                <a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>Menu user 1</a>
                <a class="nav-link" href="#"><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>Menu user 2</a>
                <?php } ?>

                <div class="sb-sidenav-menu-heading">Laporan</div>
                <a class="nav-link" href="<?=site_url('pdf') ?>"><div class="sb-nav-link-icon"><i class="fas fa-file-pdf"></i></div>Laporan PDF</a>
                <a class="nav-link" href="<?=site_url('excel') ?>"><div class="sb-nav-link-icon"><i class="fas fa-file-excel"></i></div>Laporan Excel</a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in </div>
            as: <?=$this->session->userdata('level'); ?>
        </div>
    </nav>
</div>