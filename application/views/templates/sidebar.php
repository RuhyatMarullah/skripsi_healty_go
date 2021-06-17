<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <i class="fas fa-clinic-medical"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Makmur Jaya</div>
        <input type="hidden" name="cek" id="cek" value="<?= $cek; ?>">
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('status') == 'pasien') : ?>

        <?php if ($this->session->userdata('level') == 1) : ?>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item" id="dashboard">
                <a class="nav-link pb-0" href="<?= base_url('dashboard'); ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
        <?php endif; ?>


        <li class="nav-item" id="rekam_medis">
            <a class="nav-link pb-0" href="<?= base_url('rekammedis'); ?>">
                <i class="fas fa-fw fa-book"></i>
                <span>Rekam Medis</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif; ?>

    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Admin
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item" id="data_master">
            <a class="nav-link collapsed pb-0" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Master</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="<?= base_url('master/pasien'); ?>">Data Pasien</a>
                    <?php if ($this->session->userdata('level') == 1) : ?>
                        <a class="collapse-item" href="<?= base_url('master/doctor'); ?>">Data Dokter</a>
                        <a class="collapse-item" href="<?= base_url('master/poli'); ?>">Data Poli</a>
                        <a class="collapse-item" href="<?= base_url('master/obat'); ?>">Data Obat</a>
                        <a class="collapse-item" href="<?= base_url('master/karyawan'); ?>">Data Karyawan</a>
                        <a class="collapse-item" href="<?= base_url('master/masterlab'); ?>">Data Master Lab</a>
                    <?php endif; ?>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif; ?>

    <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('status') == 'dokter') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Poli
        </div>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) : ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="poli_umum">
                <a class="nav-link pb-0" href="<?= base_url('poli/umum'); ?>">
                    <i class="fas fa-fw fa-user-nurse"></i>
                    <span>Poli Umum</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 6) : ?>
            <li class="nav-item" id="poli_gigi">
                <a class="nav-link pb-0" href="<?= base_url('poli/gigi'); ?>">
                    <i class="fas fa-fw fa-tooth"></i>
                    <span>Poli Gigi</span></a>
            </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 7) : ?>
            <li class="nav-item" id="poli_anak">
                <a class="nav-link pb-0" href="<?= base_url('poli/anak'); ?>">
                    <i class="fas fa-fw fa-baby"></i>
                    <span>Poli Anak</span></a>
            </li>
        <?php endif; ?>



        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php endif; ?>

    <?php if ($this->session->userdata('status') == 'admin') : ?>
        <!-- Heading -->
        <div class="sidebar-heading">
            Layanan
        </div>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 4) : ?>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item" id="lab">
                <a class="nav-link pb-0" href="<?= base_url('layanan/laboratorium'); ?>">
                    <i class="fas fa-fw fa-flask"></i>
                    <span>Laboratorium</span></a>
            </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 3) : ?>
            <li class="nav-item" id="farmasi">
                <a class="nav-link pb-0" href="<?= base_url('layanan/farmasi'); ?>">
                    <i class="fas fa-fw fa-capsules"></i>
                    <span>Farmasi</span></a>
            </li>
        <?php endif; ?>

        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 2) : ?>
            <li class="nav-item" id="pendaftaran">
                <a class="nav-link pb-0" href="<?= base_url('layanan/pendaftaran'); ?>">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Pendaftaran</span></a>
            </li>
        <?php endif; ?>
        <?php if ($this->session->userdata('level') == 1 || $this->session->userdata('level') == 5) : ?>
            <li class="nav-item" id="kasir">
                <a class="nav-link pb-0" href="<?= base_url('layanan/kasir'); ?>">
                    <i class="fas fa-fw fa-cash-register"></i>
                    <span>Kasir</span></a>
            </li>
        <?php endif; ?>


        <hr class="sidebar-divider">
    <?php endif; ?>

    <div class="sidebar-heading">
        user
    </div>

    <!-- Nav Item - Charts -->
    <li class="nav-item" id="profile">
        <a class="nav-link pb-0" href="<?= base_url('user'); ?>">
            <i class="fas fa-fw fa-user"></i>
            <span>Profile</span>
        </a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item" id="edit_profile">
        <a class="nav-link pb-0" href="<?= base_url('user/edit'); ?>">
            <i class="fas fa-fw fa-user-edit"></i>
            <span>Edit Profile</span>
        </a>
    </li>

    <hr class="sidebar-divider">

    <li class="nav-item">
        <a class="nav-link pb-0" href="<?= base_url('login/logout'); ?>">
            <i class="fas fa-fw fa-sign-out-alt"></i>
            <span>Logout</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->