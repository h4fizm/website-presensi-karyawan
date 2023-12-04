<aside id="sidebar-wrapper">

  <!-- <div class="sidebar-brand mt-3">
    <a href="<?php echo base_url('/'); ?>" class="text-white">
      <img width="200.31px" height="44.2px" src="<?= base_url('assets') ?>/logo/fix-2.png" alt="User Image"> -->

      <!-- <?= $this->session->userdata('nama') ?> -->
    <!-- </a>
  </div>
  <div class="sidebar-brand sidebar-brand-sm text-white"> -->
    <!-- <?php echo getInitial($this->session->userdata('nama')); ?> -->
    <!-- <img src="<?= base_url('assets') ?>/logo/fix.png" alt="User Image">
  </div> -->
  <div class="sidebar-brand mt-3">
        <a href="<?php echo base_url(); ?>"><img width="200.31px" height="44.2px" src="<?php echo base_url('assets') ?>/logo/webcare-1.png"></a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
        <img src="<?php echo base_url('assets') ?>/logo/webcare-2.png">
    </div>
  <ul class="sidebar-menu">
    <li class=" mt-2">
      <a class="nav-link" href="<?php echo base_url('index.php/admin/dashboard') ?>"><i class="fas fa-th-large"></i> <span>Dashboard</span></a>
    </li>
    <li class=" mt-2">
      <a class="nav-link" href="<?php echo base_url('index.php/admin/absensi') ?>"><i class="fas fa-edit"></i> <span>Data Absensi</span></a>
    </li>
    <?php if ($this->session->userdata('level') == 'Administrator') : ?>

      <li class="dropdown mt-2 ">
        <a class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span> Pengaturan</span></a>
        <ul class="dropdown-menu mt-2">
          <li class="mt-2"><a style="background-color: #0A2647;" href="<?php echo base_url('index.php/admin/user') ?>" class="nav-link text-white"> Manajemen Users</a></li>
          <li class="mt-2"><a style="background-color: #0A2647;" href="<?php echo base_url('index.php/admin/aplikasi') ?>" class="nav-link text-white"> Tentang Aplikasi</a></li>
        </ul>
      </li>
      
    <?php endif; ?>

    <li class=" mt-2">
      <a class="nav-link" href="<?php echo base_url('index.php/admin/profil') ?>"><i class="fas fa-user"></i> <span>Profil</span></a>
    </li>
    <li class=" mt-2">
      <a class="nav-link" href="<?php echo base_url('index.php/home/logout') ?>"><i class="fas fa-sign-out-alt"></i> <span>Sign Out</span></a>
    </li>
  </ul>

  <div class="mt-4 mb-4 p-3 hide-sidebar-mini">

  </div>
</aside>