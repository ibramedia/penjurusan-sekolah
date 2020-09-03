
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url('dist/img/siswa.png');?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $this->common->getSiswaData()->nama_siswa;?></p>
          <a href="#"><i class="fa fa-circle-o"></i> Siswa</a>
        </div>
      </div>
      
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="<?php echo $this->uri->segment(2) == '' ? 'active': '' ?>">
          <a href="<?php echo site_url('siswa') ?>">
            <i class="fa fa-home"></i> <span>Beranda</span>
          </a>
        </li>
        <li class="<?php echo $this->uri->segment(2) == 'angket' ? 'active': '' ?>">
          <a href="<?php echo site_url('siswa/angket') ?>">
            <i class="fa fa-newspaper-o"></i> <span>Angket Siswa</span>
          </a>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>