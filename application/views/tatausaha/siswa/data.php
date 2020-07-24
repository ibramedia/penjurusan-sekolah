
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Data Siswa</h3>
            </div>

            <div class="box-footer">
                <a href="#" class="btn btn-success btn-xs" data-toggle="modal" data-target="#tambah-data"><i class="fa fa-plus"></i>&nbsp;Tambah</a>
            </div>

            <!-- /.box-header -->
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

            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Peserta</th>
                  <th>Nama Siswa</th>
                  <th>Password <i>(Password default adalah nomor peserta itu sendiri)</i></th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php $no = 1; foreach ($siswas as $siswa): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $siswa->no_peserta ?></td>
                  <td><?php echo $siswa->nama_siswa ?></td>
                  <td><?php if($siswa->password==$siswa->no_peserta){
                    ?>
                    <div>Password default</div>
                    <?php
                  }else{
                    ?>
                    <div class="text-warning">Password telah disesuaikan</div>
                    <?php
                  }?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $siswa->id_siswa ?>"><i class="fa fa fa-pencil"></i>&nbsp;Edit</a>
                    <a href="<?php echo site_url('tatausaha/siswa/delete/'.($siswa->id_siswa)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $siswa->id_siswa ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Edit Siswa</h4>
                          </div>
                          <form action="<?php echo site_url('tatausaha/siswa/edit/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa ?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>No. Peserta</label>
                              <input type="text" class="form-control" placeholder="No. Peserta" name="no_peserta" value="<?php echo $siswa->no_peserta ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>Nama Siswa</label>
                              <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" value="<?php echo $siswa->nama_siswa ?>">
                            </div>
                            <div class="form-group">
                              <label>Password Baru</label>
                              <input type="hidden" class="form-control" placeholder="Password" name="password" value="<?php echo $siswa->password ?>">
                              <input type="text" class="form-control" placeholder="Kosongkan field ini jika tidak ingin mengganti password" name="password_baru">
                              <i>(Password default adalah akan sama dengan nomor peserta itu sendiri)</i>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Perbaharui</button>
                          </div>
                          </form>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                </tr>
                <?php endforeach; ?>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>

    <!-- tambah data -->
  <div class="modal fade" id="tambah-data">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Tambah Siswa</h4>
        </div>
        <form action="<?php echo site_url('tatausaha/siswa/add') ?>" role="form" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="form-group">
            <label>No. Peserta</label>
            <input type="text" class="form-control" placeholder="No. Peserta" name="no_peserta">
          </div>
          <div class="form-group">
            <label>Nama Siswa</label>
            <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa">
          </div>
          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
  