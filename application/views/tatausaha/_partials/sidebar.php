
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/tatausaha.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->common->getTatausahaData()->nama_tu;?></p>
          <a href="#"><i class="fa fa-circle-o"></i> Tata Usaha</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="<?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
          <a href="<?php echo site_url('tatausaha') ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'siswa' ? 'active': '' ?>">
          <a href="<?php echo site_url('tatausaha/siswa') ?>">
            <i class="fa fa-users"></i> <span>Data Siswa</span>
          </a>
        </li>
        <li class="header">NILAI</li>
        <li class="<?php echo $this->uri->segment(2) == 'nilai' ? 'active': '' ?>">
          <a href="<?php echo site_url('tatausaha/nilai') ?>">
            <i class="fa fa-book"></i> <span>Nilai Siswa</span>
          </a>
        </li>
        <li class="header">ANGKET</li>
        <li class="<?php echo $this->uri->segment(2) == 'angket' ? 'active': '' ?>">
          <a href="<?php echo site_url('tatausaha/angket') ?>">
            <i class="fa fa-newspaper-o"></i> <span>Angket Siswa</span>
          </a>
        </li>
        <li class="header">LAPORAN</li>
        <li class="<?php echo $this->uri->segment(2) == 'laporan' ? 'active': '' ?>">
          <a href="<?php echo site_url('tatausaha/laporan') ?>">
            <i class="fa fa-file"></i> <span>Rekap Hasil Putusan</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>