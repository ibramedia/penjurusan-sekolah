
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Rekap Hasil Siswa</h3>
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
            <div class="box-header">
              <a href="#" class="btn btn-primary pull-right"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Peserta</th>
                  <th>Nama Siswa</th>
                  <th>IPA</th>
                  <th>IPS</th>
                  <th>PSIKOTES</th>
                  <th>Klaster</th>
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
                  $jum_ips=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_ips++;
                    echo $nilai->ips;
                  }
                  endforeach;
                  if($jum_ips==0)
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
                  <td>Putusan disini IPA/IPS nantinya</td>
                  <td>
                    <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#lihat-data<?php echo $siswa->id_siswa ?>"><i class="fa fa fa-folder-open"></i>&nbsp;Rincian</a>
                  </td>
                    <!-- lihat data -->
                    <div class="modal fade" id="lihat-data<?php echo $siswa->id_siswa ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Rincian Hasil Siswa</h4>
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
                              <input type="text" class="form-control" placeholder="No. Peserta" value="<?php echo $siswa->no_peserta ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>Nama Siswa</label>
                              <input type="text" class="form-control" placeholder="Nama Siswa" value="<?php echo $siswa->nama_siswa ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>Alamat</label>
                              <textarea type="text" class="form-control" placeholder="Alamat" readonly><?php echo $siswa->alamat ?></textarea>
                            </div>
                            <div class="row">
                              <div class="col-md-4">
                                <div class="form-group">
                                  <label>Nilai IPA</label>
                                  <input type="number" class="form-control" placeholder="Nilai IPA" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->ipa;
                                                                                                                      endforeach;?>">
                                </div>
                              </div>
                              <div class="col-md-4">  
                                <div class="form-group">
                                  <label>Nilai IPS</label>
                                  <input type="number" class="form-control" placeholder="Nilai IPS" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->ips;
                                                                                                                      endforeach;?>">
                                </div>
                              </div>
                              <div class="col-md-4">  
                                <div class="form-group">
                                  <label>Nilai PSIKOTES</label>
                                  <input type="number" class="form-control" placeholder="Nilai PSIKOTES" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->psikotes;
                                                                                                                      endforeach;?>">
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Klaster</label>
                              <h4 class="text-center">IPA/IPS</h4>
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
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