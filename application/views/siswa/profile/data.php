

    <section class="content">

        <div class="row">
            <div class="col-md-3">

                <!-- Profile Image -->
                <div class="box box-default">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?php echo base_url('dist/img/siswa.png');?>" alt="User profile picture">

                    <h3 class="profile-username text-center"><?php echo $user->nama_siswa ?></h3>

                    <p class="text-muted text-center">Siswa</p>

                    
                </div>
                <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-default">
                    <div class="box-header">
                        <h3 class="box-title">Update Profile</h3>
                    </div>

    				<?php if ($this->session->flashdata('success')): ?>
                    <div class="box-header">
                        <div class="alert alert-success alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    </div>
                    <?php elseif ($this->session->flashdata('failed')): ?>
                    <div class="box-header">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('failed'); ?></p>
                        </div>
                    </div>
    				<?php else: ?>
                    <?php endif; ?>
                    
                    <div class="box-body">
                        <form action="<?php echo site_url('siswa/profile/edit/'.($user->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                        <input type="hidden" name="id_siswa" value="<?php echo $user->id_siswa ?>">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Nama Siswa</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" value="<?php echo $user->nama_siswa?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Username (No. Peserta)</label>

                                <div class="col-sm-10">
                                    <input type="text" class="form-control" placeholder="Username (No. Peserta)" name="username" value="<?php echo $user->no_peserta?>" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Password Baru</label>

                                <div class="col-sm-10">
                                    <input type="hidden" class="form-control" placeholder="Password" name="password" value="<?php echo $user->password?>">
                                    <input type="text" class="form-control" placeholder="Kosongkan field ini jika tidak ingin mengganti password" name="password_baru">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Perbaharui</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </section>