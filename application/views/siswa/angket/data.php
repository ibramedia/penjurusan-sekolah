
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Angket Siswa</h3>
            </div>
            <div class="box-body">
              <!-- Custom Tabs -->
              <?php if ($this->session->flashdata('success')): ?>
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('success'); ?></p>
              </div>
              <?php elseif ($this->session->flashdata('failed')): ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <p><i class="icon fa fa-bullhorn"></i> <?php echo $this->session->flashdata('failed'); ?></p>
              </div>
              <?php else: ?>
              <?php endif; ?>
              
              <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                  <li class="active"><a href="#tab_1" data-toggle="tab">1 .Biodata</a></li>
                  <li><a href="#tab_2" data-toggle="tab">2. Peminatan</a></li>
                  <li><a href="#tab_3" data-toggle="tab">3. Minat Mapel</a></li>
                  <li><a href="#tab_4" data-toggle="tab">4. Minat Pekerjaan</a></li>
                  <li><a href="#tab_5" data-toggle="tab">5. Minat Studi Lanjut Ke Perguruan Tinggi</a></li>
                  <li><a href="#tab_6" data-toggle="tab">6. Nilai</a></li>
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <b>Biodata / Identitas Diri</b>
                    <p>Mohon lengkapi form berikut</p>
                    <hr>
                    <!-- /.box-header -->
                    <form action="<?php echo site_url('siswa/angket/updatebiodata/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>" required>
                    <input type="hidden" name="no_peserta" value="<?php echo $siswa->no_peserta?>" required>
                    <input type="hidden" name="password" value="<?php echo $siswa->password?>" required>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_siswa" value="<?php echo $siswa->nama_siswa?>" required>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tempat Lahir</label>
                              <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $siswa->tempat_lahir?>" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $siswa->tanggal_lahir?>" required>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Agama</label>
                          <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php echo $siswa->agama?>" required>
                        </div>
                        <div class="form-group">
                          <label>Alamat Tempat Tinggal</label>
                          <textarea type="text" class="form-control" placeholder="Alamat Tempat Tinggal" name="alamat" required><?php echo $siswa->alamat?></textarea>
                        </div>
                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="text" class="form-control" placeholder="No. HP" name="no_hp" value="<?php echo $siswa->no_hp?>" required>
                        </div>
                        <div class="form-group">
                          <label>Asal Sekolah</label>
                          <input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" value="<?php echo $siswa->asal_sekolah?>" required>
                        </div>
                        <div class="form-group">
                          <label>Status Sekolah Asal</label>
                          <input type="text" class="form-control" placeholder="Mis. Negeri/Swasta atau yang lainnya" name="status_sekolah_asal" value="<?php echo $siswa->status_sekolah_asal?>" required>
                        </div>
                        <div class="form-group">
                          <label>Bulan/Tahun masuk SMP/MTs</label>
                          <input type="month" class="form-control" placeholder="Bulan/Tahun masuk SMP/MTs" name="bulan_tahun_masuk_smp" value="<?php echo $siswa->bulan_tahun_masuk_smp?>" required>
                        </div>
                        <div class="form-group">
                          <label>Bulan/Tahun lulus SMP/MTs</label>
                          <input type="month" class="form-control" placeholder="Bulan/Tahun lulus SMP/MTs" name="bulan_tahun_lulus_smp" value="<?php echo $siswa->bulan_tahun_lulus_smp?>" required>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <b>Perminatan</b>
                    <p>Pilihlah salah satu perminatan kalian dan jelaskan alasannya</p>
                    <hr>
                    <!-- /.box-header -->
                    <form action="<?php echo site_url('siswa/angket/updatepeminatan/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_peminatan" value="<?php echo $peminatan->id_peminatan?>" required>
                    <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>" required>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Peminatan</label>
                          <select class="form-control" name="pilihan" required>
                            <option value="" <?php echo empty($peminatan->pilihan) ? 'selected' : '';?>>Pilih Peminatan</option>
                            <option value="1" <?php echo $peminatan->pilihan=='1' ? 'selected' : '';?>>Matematika dan ilmu-ilmu alam (Matematika, Biologi, Fisika, Kimia)</option>
                            <option value="2" <?php echo $peminatan->pilihan=='2' ? 'selected' : '';?>>Ilmu-ilmu Sosial (Geografi, Sejarah, Sosiologi, Antropologi, dan Ekonomi)</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Alasan Memilih</label>
                          <textarea type="text" class="form-control" placeholder="Cantumkan alasan anda memilih" name="alasan" required><?php echo $peminatan->alasan?></textarea>
                        </div>
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_3">
                    <b>Minat Mapel</b>
                    <p>Tulislah 3 (tiga) mata pelajaran yang disenangi (urutkan dari yang paling disenangi)</p>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow:auto;">
                      <table id="" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Mata Pelajaran</th>
                          <th>Alasan</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($frame as $key => $item): ?>
                        <tr>
                          <td><?php echo $item->no?></td>
                          <td><?php echo isset($minat_mapel[$key]->mapel) ? $minat_mapel[$key]->mapel : '<i>Belum di input</i>'?></td>
                          <td><?php echo isset($minat_mapel[$key]->alasan) ? $minat_mapel[$key]->alasan : '<i>Belum di input</i>'?></td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#minat-mapel<?php echo $item->no ?>"><i class="fa fa fa-pencil"></i>&nbsp;Input</a>
                            <?php
                            if(isset($minat_mapel[$key]->id_minat_mapel)){
                              ?>
                              <a href="<?php echo site_url('siswa/angket/hapusminatmapel/'.($minat_mapel[$key]->id_minat_mapel)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                              <?php
                            }
                            ?>
                          </td>
                            <!-- edit data -->
                            <div class="modal fade" id="minat-mapel<?php echo $item->no ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Input Minat Mata Pelajaran</h4>
                                  </div>
                                  <form action="<?php echo site_url('siswa/angket/updateminatmapel/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                  <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>">
                                  <input type="hidden" name="id_minat_mapel" value="<?php echo isset($minat_mapel[$key]->id_minat_mapel) ? $minat_mapel[$key]->id_minat_mapel : ''?>">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label>Nama Mata Pelajaran</label>
                                      <input type="text" class="form-control" placeholder="Nama Mata Pelajaran" name="mapel" value="<?php echo isset($minat_mapel[$key]->mapel) ? $minat_mapel[$key]->mapel : ''?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Alasan Disenangi</label>
                                      <textarea type="text" class="form-control" placeholder="Alasan Disenangi" name="alasan" required><?php echo isset($minat_mapel[$key]->alasan) ? $minat_mapel[$key]->alasan : ''?></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_4">
                    <b>Minat Pekerjaan</b>
                    <p>Tulislah 3 (tiga) minat pekerjaan yang disenangi (urutkan dari yang paling disenangi)</p>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow:auto;">
                      <table id="" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Pekerjaan</th>
                          <th>Alasan</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($frame as $key => $item): ?>
                        <tr>
                          <td><?php echo $item->no?></td>
                          <td><?php echo isset($minat_kerja[$key]->kerja) ? $minat_kerja[$key]->kerja : '<i>Belum di input</i>'?></td>
                          <td><?php echo isset($minat_kerja[$key]->alasan) ? $minat_kerja[$key]->alasan : '<i>Belum di input</i>'?></td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#minat-kerja<?php echo $item->no ?>"><i class="fa fa fa-pencil"></i>&nbsp;Input</a>
                            <?php
                            if(isset($minat_kerja[$key]->id_minat_kerja)){
                              ?>
                              <a href="<?php echo site_url('siswa/angket/hapusminatkerja/'.($minat_kerja[$key]->id_minat_kerja)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                              <?php
                            }
                            ?>
                          </td>
                            <!-- edit data -->
                            <div class="modal fade" id="minat-kerja<?php echo $item->no ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Input Minat Pekerjaan</h4>
                                  </div>
                                  <form action="<?php echo site_url('siswa/angket/updateminatkerja/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                  <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>">
                                  <input type="hidden" name="id_minat_kerja" value="<?php echo isset($minat_kerja[$key]->id_minat_kerja) ? $minat_kerja[$key]->id_minat_kerja : ''?>">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label>Nama Pekerjaan/Profesi</label>
                                      <input type="text" class="form-control" placeholder="Nama Pekerjaan/Profesi" name="kerja" value="<?php echo isset($minat_kerja[$key]->kerja) ? $minat_kerja[$key]->kerja : ''?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Alasan Disenangi</label>
                                      <textarea type="text" class="form-control" placeholder="Alasan Disenangi" name="alasan" required><?php echo isset($minat_kerja[$key]->alasan) ? $minat_kerja[$key]->alasan : ''?></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_5">
                    <b>Minat Studi Lanjut Ke Perguruan Tinggi</b>
                    <p>Tulislah 3 (tiga) minat perguruan tinggi yang diinginkan (urutkan dari yang paling diinginkan)</p>
                    <hr>
                    <!-- /.box-header -->
                    <div class="box-body" style="overflow:auto;">
                      <table id="" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>No.</th>
                          <th>Nama Perguruan Tinggi</th>
                          <th>Alasan</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($frame as $key => $item): ?>
                        <tr>
                          <td><?php echo $item->no?></td>
                          <td><?php echo isset($minat_pt[$key]->pt) ? $minat_pt[$key]->pt : '<i>Belum di input</i>'?></td>
                          <td><?php echo isset($minat_pt[$key]->alasan) ? $minat_pt[$key]->alasan : '<i>Belum di input</i>'?></td>
                          <td>
                            <a href="#" class="btn btn-primary btn-xs" data-toggle="modal" data-target="#minat-pt<?php echo $item->no ?>"><i class="fa fa fa-pencil"></i>&nbsp;Input</a>
                            <?php
                            if(isset($minat_pt[$key]->id_minat_pt)){
                              ?>
                              <a href="<?php echo site_url('siswa/angket/hapusminatpt/'.($minat_pt[$key]->id_minat_pt)) ?>"><button class="btn btn-danger btn-xs" onclick="return confirm('Yakin menghapus data?');"><i class="fa fa fa-trash"></i> Hapus</button></a>
                              <?php
                            }
                            ?>
                          </td>
                            <!-- edit data -->
                            <div class="modal fade" id="minat-pt<?php echo $item->no ?>">
                              <div class="modal-dialog">
                                <div class="modal-content">
                                  <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                      <span aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Input Minat Perguruan Tinggi</h4>
                                  </div>
                                  <form action="<?php echo site_url('siswa/angket/updateminatpt/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                  <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>">
                                  <input type="hidden" name="id_minat_pt" value="<?php echo isset($minat_pt[$key]->id_minat_pt) ? $minat_pt[$key]->id_minat_pt : ''?>">
                                  <div class="modal-body">
                                    <div class="form-group">
                                      <label>Nama Perguruan Tinggi</label>
                                      <input type="text" class="form-control" placeholder="Nama Perguruan Tinggi" name="pt" value="<?php echo isset($minat_pt[$key]->pt) ? $minat_pt[$key]->pt : ''?>" required>
                                    </div>
                                    <div class="form-group">
                                      <label>Alasan Disenangi</label>
                                      <textarea type="text" class="form-control" placeholder="Alasan Disenangi" name="alasan" required><?php echo isset($minat_pt[$key]->alasan) ? $minat_pt[$key]->alasan : ''?></textarea>
                                    </div>
                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Submit</button>
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
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_6">
                    <b>Nilai Anda</b>
                    <p>Mohon lengkapi form berikut</p>
                    <hr>
                    <!-- /.box-header -->
                    <form action="<?php echo site_url('siswa/angket/updatenilai/'.($siswa->id_siswa)) ?>" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_nilai" value="<?php echo $siswa->id_siswa?>" required> <!-- id_siswa = id_nilai -->
                    <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>" required> <!-- id_siswa = id_nilai -->
                    <input type="hidden" name="no_peserta" value="<?php echo $siswa->no_peserta?>" required>
                      <div class="box-body">
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nilai MTK</label>
                              <input type="text" class="form-control" placeholder="Nilai MTK" name="mtk" value="<?php
                              foreach ($nilais as $nilai):
                                if($this->session->userdata('id_siswa')==$nilai->id_siswa){
                                  echo $nilai->mtk;
                                }
                                endforeach;
                              ?>" required>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Nilai IPA</label>
                              <input type="text" class="form-control" placeholder="Nilai IPA" name="ipa" value="<?php
                              foreach ($nilais as $nilai):
                                if($this->session->userdata('id_siswa')==$nilai->id_siswa){
                                  echo $nilai->ipa;
                                }
                                endforeach;
                              ?>" required>
                            </div>
                          </div>
                          <input type="hidden" class="form-control" placeholder="Nilai PSIKOTES" name="psikotes" value="<?php
                              foreach ($nilais as $nilai):
                                if($this->session->userdata('id_siswa')==$nilai->id_siswa){
                                  echo $nilai->psikotes;
                                }
                                endforeach;
                              ?>">
                        </div>
                        
                      </div>
                      <!-- /.box-body -->

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div>
              <!-- nav-tabs-custom -->
            </div>
          </div>
        </div>
      </div>

    </section>