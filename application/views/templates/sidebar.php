<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() ?>DataTraining" class="brand-link">
    <img src="<?= base_url() ?>assets/img/logoSideBar.jpg" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">BLT Desa Bojong</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="info">
        <a href="<?= base_url() ?>DataTraining" class="d-block">Administrator </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Data Training -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataTraining" class="<?php echo ($this->uri->segment(1) == 'DataTraining') ? 'nav-link active' : 'nav-link' ?>">
            <i class="fa fa-database" aria-hidden="true"></i>
            <p>
              Data Penerima Bantuan
            </p>
          </a>
        </li>
        <!-- Data Training  -->

        <!-- Data Uji -->
        <li class="nav-item">
          <a href="<?= base_url() ?>DataUji" class="<?php echo ($this->uri->segment(1) == 'DataUji') ? 'nav-link active' : 'nav-link' ?>">
            <i class="fa fa-power-off" aria-hidden="true"></i>
            <p>
              Data Uji Naive Bayes
            </p>
          </a>
        </li>
        <!-- Data Uji  -->

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>