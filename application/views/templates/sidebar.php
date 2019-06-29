<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url('user'); ?>">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="fas fw fa-money-check-alt"></i>
    </div>
    <div class="sidebar-brand-text mx-3">Listin</div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider my-0">

  <!-- Nav Item - Dashboard -->
  <li class="nav-item active">
    <a class="nav-link" href="<?php echo base_url('user') ?>">
      <i class="fas fa-fw fa-tachometer-alt"></i>
      <span>Dashboard</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Features
  </div>

  <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url('wishlist') ?>">
      <i class="fas fa-fw fa-list-alt"></i>
      <span>My Wishlists</span></a>
  </li>

  <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url('wallet') ?>">
      <i class="fas fa-fw fa-wallet"></i>
      <span>My Wallet</span></a>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- Heading -->
  <div class="sidebar-heading">
    Personal
  </div>

  <li class="nav-item ">
    <a class="nav-link" href="<?php echo base_url('user/profile') ?>">
      <i class="fas fa-fw fa-user"></i>
      <span>My Profile</span></a>
  </li>

  <!-- Nav Item - Pages Collapse Menu -->
  <li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
      <i class="fas fa-fw fa-clipboard-list"></i>
      <span>My Account</span>
    </a>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
      <div class="bg-white py-2 collapse-inner rounded">
        <a class="collapse-item" href="buttons.html"><i class="fas fa-fw fa-check"></i>&nbsp;Profile</a>
        <a class="collapse-item" href="cards.html">Completed</a>
        <a class="collapse-item" href="<?php echo base_url('wishlist/viewAll'); ?>">Cancelled</a>
      </div>
    </div>
  </li>

  <!-- Divider -->
  <hr class="sidebar-divider d-none d-md-block">

  <!-- Sidebar Toggler (Sidebar) -->
  <div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
  </div>

</ul>
<!-- End of Sidebar -->