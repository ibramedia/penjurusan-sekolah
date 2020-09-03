
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
              <a href="<?php echo site_url('bk/laporan/hitung') ?>" class="btn btn-primary btn-xs"><i class="fa fa-cog"></i> Proses Perhitungan</a>
              <a href="<?php echo site_url('pdf.php')?>" target="_blank" class="btn btn-primary btn-xs pull-right"><i class="fa fa-print"></i> Cetak</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No.</th>
                  <th>No. Peserta</th>
                  <th>Nama Siswa</th>
                  <th>MTK</th>
                  <th>IPA</th>
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
                  <?php
                    $µi1 =  $siswa->µi1p11;
                    $µi2 =  $siswa->µi2p11;

                    // logic putusan:
                    // - antara µi1 & µi2, jika salah satu lebih besar, maka masuk ke kelas tsb

                    if ($µi1==0 && $µi2===0){
                      echo "<i>Belum ada putusan</i>";
                    }
                    elseif($µi1 > $µi2) {
                      echo "<b>IPA</b>";
                    }
                    elseif($µi1 < $µi2) {
                      echo "<b>IPS</b>";
                    }
                  ?></td>
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
                                  <label>Nilai MTK</label>
                                  <input type="number" class="form-control" placeholder="Nilai MTK" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->mtk;
                                                                                                                      endforeach;?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-4">  
                                <div class="form-group">
                                  <label>Nilai IPA</label>
                                  <input type="number" class="form-control" placeholder="Nilai IPA" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->ipa;
                                                                                                                      endforeach;?>" readonly>
                                </div>
                              </div>
                              <div class="col-md-4">  
                                <div class="form-group">
                                  <label>Nilai PSIKOTES</label>
                                  <input type="number" class="form-control" placeholder="Nilai PSIKOTES" value="<?php 
                                                                                                                      foreach ($nilais as $nilai):
                                                                                                                      if($siswa->id_siswa==$nilai->id_siswa)
                                                                                                                        echo $nilai->psikotes;
                                                                                                                      endforeach;?>" readonly>
                                </div>
                              </div>
                            </div>
                            <div class="form-group">
                              <label>Klaster</label>
                              <h4 class="text-center">
                              <?php
                                $µi1 =  $siswa->µi1p11;
                                $µi2 =  $siswa->µi2p11;

                                // logic putusan:
                                // - antara µi1 & µi2, jika salah satu lebih besar, maka masuk ke kelas tsb

                                if ($µi1==0 && $µi2===0){
                                  echo "<i>Belum ada putusan</i>";
                                }
                                elseif($µi1 > $µi2) {
                                  echo "<b>IPA</b>";
                                }
                                elseif($µi1 < $µi2) {
                                  echo "<b>IPS</b>";
                                }
                              ?>
                              </h4>
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