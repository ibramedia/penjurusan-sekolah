
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/wakasis.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->common->getWakasisData()->nama_wakasis;?></p>
          <a href="#"><i class="fa fa-circle-o"></i> Wakil Kesiswaan</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="<?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
          <a href="<?php echo site_url('wakasis') ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="header">LAPORAN</li>
        <li class="<?php echo $this->uri->segment(2) == 'laporan' ? 'active': '' ?>">
          <a href="<?php echo site_url('wakasis/laporan') ?>">
            <i class="fa fa-file"></i> <span>Rekap Hasil Putusan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>