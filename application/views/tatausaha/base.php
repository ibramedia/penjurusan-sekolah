<!DOCTYPE html>
<html>
<?php $this->load->view("tatausaha/_partials/head") ?>
<body class="hold-transition skin-purple sidebar-mini">
<div class="wrapper">

  <?php $this->load->view("tatausaha/_partials/navbar") ?>
  <!-- Left side column. contains the logo and sidebar -->
  <?php $this->load->view("tatausaha/_partials/sidebar") ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <?php $this->load->view("tatausaha/_partials/breadcrumb") ?>
    
    <!-- Main content -->
    <?php echo $contents; ?>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php $this->load->view("tatausaha/_partials/footer") ?>
  
</div>
<!-- ./wrapper -->

<?php $this->load->view("tatausaha/_partials/script") ?>
</body>
</html>
