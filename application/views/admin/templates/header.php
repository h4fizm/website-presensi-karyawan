<style>
  .note-popover{
    display: none;
  }

  .btn-primary:hover{
    background-color: #770D01 !important;
  }
  
  .btn-outline-dark-red{
    border-color: #BB1F26;
    color: #BB1F26;
  }
  
  .btn-outline-dark-red:hover{
    background-color: #770D01 !important;
    color: #fff;
  }
</style>
<nav class="navbar navbar-expand-lg main-navbar position-fixed" style="background: #f4f6f9">
  <form class="form-inline mr-auto ">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars burger-icon-navbar"></i></a></li>
      <!-- <li><a href="#" class="nav-link nav-link-lg ">
          <div class="judul-navbar ">Hub Arkatama</div>
        </a></li> -->
      <li><a href="#" class="nav-link nav-link-lg ">
          <div class="judul-navbar active">Webcare.idn</div>
        </a></li>
    </ul>

  </form>
  <ul class="navbar-nav navbar-right align-items-center">
    <!-- <li class="dropdown dropdown-list-toggle"> -->
      <!-- <span class="avatar-initial rounded-circle ml-2 " style="background-color: #0A2647;"><?php echo getInitial($this->session->userdata('nama')); ?></span> -->
      <!-- <img alt="image" src="<?= base_url('assets') ?>/profil/<?= $this->session->userdata('foto') ?>" class="rounded-circle mr-1"> -->
    <!-- </li> -->
    <li class="dropdown align-items-center  mr-2">
      <a href="#" data-toggle="dropdown" style="color:black;" class="nav-link  nav-link-lg nav-link-user d-flex align-items-center ">
      <img alt="image" src="<?= ( $this->session->userdata('foto') != null ? base_url('assets') . "/profil/" . $this->session->userdata("foto") : base_url('assets') . '/logo/avatar-1.png') ?>" class="rounded-circle mr-1">
        <div class="gap-username d-sm-none d-lg-inline-block text-black-50 w-100 mr-3">
          <div class="font-username ">
            <?= $this->session->userdata('nama') ?>
          </div>
          <figcaption><small class="font-username-sub"><?= $this->session->userdata('level') ?></small> </figcaption>
        </div>
        <i class="fas fa-chevron-down fa-fw fa-sm "></i>
      </a>

      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title d-flex justify-content-end"><i class="fas fa-chevron-up fa-fw fa-sm "></i></div>
        <a href="<?= base_url('index.php/admin/profil') ?>" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Profile
        </a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo base_url() . 'index.php/home/logout'; ?>" class="dropdown-item has-icon text-danger">
          <i class="fas fa-sign-out-alt"></i> Logout
        </a>
        <div class="dropdown-divider"></div>
      </div>
    </li>

  </ul>
</nav>