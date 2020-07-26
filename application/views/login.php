<!DOCTYPE html>
<html>
<?php $this->load->view("_partials/head") ?>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b><?php echo SITE_NAME ?></b>
    <br>
    <small><?php echo ucfirst($this->uri->segment(1)) ?></small>
  </div>
  <?php if ($this->session->flashdata('failed')): ?>
    <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('failed'); ?></p>
    </div>
  <?php endif; ?>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Silakan login untuk masuk ke sistem</p>

    <form action="<?php echo site_url('login/aksi_login') ?>" method="post">
      <div class="form-group has-feedback">
        <select class="form-control" name="jenis_login" required>
          <option value="">Pilih Login</option>
          <option value="sw">Siswa</option>
          <option value="bk">BK (Bimbingan Konseling)</option>
          <option value="wk">Wakasis (Wakil Kesiswaan)</option>
        </select>
      </div>
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- <div class="col-xs-6">
          <a href="../" class="btn btn-warning btn-block btn-flat">Kembali</a>
        </div> -->
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn bg-purple btn-block btn-flat">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <hr>
    <div class="lockscreen-footer text-center">
      Copyright &copy; <script>document.write(new Date().getFullYear());</script>. <b><?php echo SITE_OWNER;?></b>
      <br>All rights reserved.
    </div>

    <!-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
    <!-- /.social-auth-links -->

    <!-- <a href="#">I forgot my password</a><br>
    <a href="register.html" class="text-center">Register a new membership</a> -->

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<?php $this->load->view("_partials/script") ?>
</body>
</html>
