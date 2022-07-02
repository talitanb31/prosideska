<div class="sidebar" data-color="white" data-active-color="danger">
    <div class="logo">
        <a href="<?= site_url("welcome/index") ?>" class="simple-text logo-mini">
            <!-- <div class="logo-image-small">
            <img src="<?php echo base_url() ?>assets/img/logo-small.png">
            </div> -->
            <!-- <p>CT</p> -->

        </a>
        <a href="<?= site_url("welcome/index") ?>" class="simple-text logo-normal">
            PROSIDESKA
            <!-- <div class="logo-image-big">
            <img src=".<?php echo base_url() ?>assets/img/logo-big.png">
            </div> -->
        </a>
    </div>
    <div class="sidebar-wrapper">

        <ul class="nav">
            <?php if ($_SESSION['level'] == 'superadmin') : ?>
                <li class="<?= $this->uri->segment(1) == 'welcome' ? 'active' : '' ?>">
                    <a href="<?= site_url("welcome/index") ?>">
                        <i class="nc-icon nc-bank"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-toggle="collapse" data-target="#products" class="collapsed">
                    <a href="#"><i class="fa fa-list fa-lg"></i> Master <span class="arrow"></span></a>
                </li>
                <ul class="sub-menu collapse " id="products">
                    <li class="<?= $this->uri->segment(1) == 'akun' ? 'active' : '' ?>"><a href="<?= site_url('akun/index') ?>">Akun</a></li>
                    <li class="<?= $this->uri->segment(1) == 'jenissurat' ? 'active' : '' ?>"><a href="<?= site_url('jenissurat/index') ?>">Jenis Surat</a></li>
                    <li class="<?= $this->uri->segment(1) == 'syaratsurat' ? 'active' : '' ?>"><a href="<?= site_url('syaratsurat/index') ?>">Alur / Syarat Surat</a></li>
                </ul>
                <li class="<?= $this->uri->segment(1) == 'penduduk' ? 'active' : '' ?>">
                    <a href="<?= site_url('penduduk/index') ?>">
                        <i class="nc-icon nc-circle-10"></i>
                        <p>Penduduk/Warga</p>
                    </a>
                </li>
                <li class="<?= $this->uri->segment(1) == 'kartukeluarga' ? 'active' : '' ?>">
                    <a href="<?= site_url('kartukeluarga/index') ?>">
                        <i class="nc-icon nc-badge"></i>
                        <p>Kartu Keluarga</p>
                    </a>
                </li>
            <?php endif ?>
            <li class="<?= $this->uri->segment(1) == 'listpermintaan' ? 'active' : '' ?>">
                <a href="<?= site_url('listpermintaan/index') ?>">
                    <i class="nc-icon nc-email-85"></i>
                    <p>Pengesahan Surat</p>
                </a>
            </li>
            <?php if ($_SESSION['level'] == 'admin') : ?>
                <li class="<?= $this->uri->segment(1) == 'riwayatpermintaansurat' ? 'active' : '' ?>">
                    <a href="<?= site_url('riwayatpermintaansurat/index') ?>">
                        <i class="nc-icon nc-refresh-69"></i>
                        <p>Riwayat Surat</p>
                    </a>
                </li>
            <?php endif ?>
            <?php if ($_SESSION['level'] == 'superadmin') : ?>
                <!-- <li class="<?= $this->uri->segment(1) == 'berita' ? 'active' : '' ?>">
                    <a href="<?= site_url('berita/index') ?>">
                        <i class="nc-icon nc-alert-circle-i"></i>
                        <p>Berita</p>
                    </a>
                </li> -->
                <li class="<?= $this->uri->segment(1) == 'kritiksaran' ? 'active' : '' ?>">
                    <a href="<?= site_url('kritiksaran/index') ?>">
                        <i class="nc-icon nc-headphones"></i>
                        <p>Kritik & Saran</p>
                    </a>
                </li>
            <?php endif ?>
        </ul>
    </div>
</div>