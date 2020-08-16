
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Data Nilai Siswa</h3>
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
                  <th>IPA</th>
                  <th>MTK</th>
                  <th>PSIKOTES</th>
                  <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach ($siswas as $siswa): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $siswa->no_peserta ?></td>
                  <td><?php echo $siswa->nama_siswa ?></td>
                  <td><?php 
                  $jum_ipa=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_ipa++;
                    echo $nilai->ipa;
                  }
                  endforeach;
                  if($jum_ipa==0)
                    echo "Belum diinput";?></td>
                  <td><?php 
                  $jum_mtk=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_mtk++;
                    echo $nilai->mtk;
                  }
                  endforeach;
                  if($jum_mtk==0)
                    echo "Belum diinput";?></td>
                  <td><?php 
                  $jum_psikotes=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_psikotes++;
                    echo $nilai->psikotes;
                  }
                  endforeach;
                  if($jum_psikotes==0)
                    echo "Belum diinput";?></td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#edit-data<?php echo $siswa->id_siswa ?>"><i class="fa fa fa-pencil"></i>&nbsp;Nilai</a>
                    <a href="<?php echo site_url('bk/nilai/delete/'.($siswa->id_siswa)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                  </td>
                    <!-- edit data -->
                    <div class="modal fade" id="edit-data<?php echo $siswa->id_siswa ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Input Nilai Siswa</h4>
                          </div>
                          <form action="<?php echo site_url('bk/nilai/olah/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data">
                          <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa ?>">
                          <input type="hidden" name="id_nilai" value="<?php 
                                                                      foreach ($nilais as $nilai):
                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                        echo $nilai->id_nilai;
                                                                      endforeach;?>">
                          <div class="modal-body">
                            <div class="form-group">
                              <label>No. Peserta</label>
                              <input type="text" class="form-control" placeholder="No. Peserta" name="no_peserta" value="<?php echo $siswa->no_peserta ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>Nama Siswa</label>
                              <input type="text" class="form-control" placeholder="Nama Siswa" name="nama_siswa" value="<?php echo $siswa->nama_siswa ?>" readonly>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Nilai IPA</label>
                                  <input type="text" class="form-control" placeholder="Nilai IPA" name="ipa" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->ipa;
                                                                                                                      endforeach;?>">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Nilai MTK</label>
                                  <input type="text" class="form-control" placeholder="Nilai MTK" name="mtk" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->mtk;
                                                                                                                      endforeach;?>">
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Nilai PSIKOTES</label>
                                  <input type="text" class="form-control" placeholder="Nilai PSIKOTES" name="psikotes" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->psikotes;
                                                                                                                      endforeach;?>">
                                </div>
                              </div>
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