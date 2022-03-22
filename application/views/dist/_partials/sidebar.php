<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<div class="main-sidebar sidebar-style-2">
  <aside id="sidebar-wrapper">
    <div class="sidebar-brand">
      <a href="<?php echo base_url(); ?>admin/index">ISOKU</a>
    </div>
    <div class="sidebar-brand sidebar-brand-sm">
      <a href="<?php echo base_url(); ?>admin/index">Iso</a>
    </div>
    <ul class="sidebar-menu">
      <li class="<?php echo $this->uri->segment(2) == '' || $this->uri->segment(2) == 'index' || $this->uri->segment(2) == 'index_0' ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/index') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'produk' ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/produk') ?>" class="nav-link"><i class="fas fa-tshirt"></i><span>Produk</span></a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'tentang' ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/tentang') ?>" class="nav-link"><i class="fas fa-info-circle"></i><span>Tentang</span></a>
      </li>
      <li class="<?php echo $this->uri->segment(2) == 'kontak' ? 'active' : ''; ?>">
        <a href="<?= base_url('admin/kontak') ?>" class="nav-link"><i class="fas fa-address-card"></i><span>Kontak</span></a>
      </li>
    </ul>

    <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
      <a href="<?= base_url('landing'); ?>" class="btn btn-primary btn-lg btn-block btn-icon-split">
        <i class="fas fa-rocket"></i> Landing Page
      </a>
    </div>
  </aside>
</div>