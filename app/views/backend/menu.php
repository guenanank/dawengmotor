<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
  <a class="navbar-brand" href="<?php echo base_url('backend') ?>">Dawenk Motor</a>
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarResponsive">
    <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
        <a class="nav-link" href="<?php echo base_url('backend') ?>">
          <i class="fa fa-fw fa-home"></i>
          <span class="nav-link-text">Halaman Utama</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Unit Kendaraan">
        <a class="nav-link" href="<?php echo base_url('product') ?>">
          <i class="fa fa-fw fa-motorcycle"></i>
          <span class="nav-link-text">Unit Produk</span>
        </a>
      </li>
      <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pengajuan Kredit">
        <a class="nav-link" href="<?php echo base_url('submission') ?>">
          <i class="fa fa-fw fa-credit-card"></i>
          <span class="nav-link-text">Pengajuan Kredit</span>
        </a>
      </li><li class="nav-item" data-toggle="tooltip" data-placement="right" title="Artikel Berita">
        <a class="nav-link" href="<?php echo base_url('post') ?>">
          <i class="fa fa-fw fa-newspaper-o"></i>
          <span class="nav-link-text">Artikel Berita</span>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav sidenav-toggler">
      <li class="nav-item">
        <a class="nav-link text-center" id="sidenavToggler">
          <i class="fa fa-fw fa-angle-left"></i>
        </a>
      </li>
    </ul>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
          <i class="fa fa-fw fa-sign-out"></i>Logout</a>
      </li>
    </ul>
  </div>
</nav>
