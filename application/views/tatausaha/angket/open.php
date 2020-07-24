
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Angket Siswa</h3>
            </div>

            <div class="box-footer">
                <a href="#" class="btn btn-success btn-xs" onclick="return history.back(-1);"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
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
                </ul>
                <div class="tab-content">
                  <div class="tab-pane active" id="tab_1">
                    <b>Biodata / Identitas Diri</b>
                    <p>Mohon lengkapi form berikut</p>
                    <hr>
                    <!-- /.box-header -->
                    <form action="#" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>" readonly>
                    <input type="hidden" name="no_peserta" value="<?php echo $siswa->no_peserta?>" readonly>
                    <input type="hidden" name="password" value="<?php echo $siswa->password?>" readonly>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Nama Lengkap</label>
                          <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_siswa" value="<?php echo $siswa->nama_siswa?>" readonly>
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tempat Lahir</label>
                              <input type="text" class="form-control" placeholder="Tempat Lahir" name="tempat_lahir" value="<?php echo $siswa->tempat_lahir?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                              <label>Tanggal Lahir</label>
                              <input type="date" class="form-control" placeholder="Tanggal Lahir" name="tanggal_lahir" value="<?php echo $siswa->tanggal_lahir?>" readonly>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label>Agama</label>
                          <input type="text" class="form-control" placeholder="Agama" name="agama" value="<?php echo $siswa->agama?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Alamat Tempat Tinggal</label>
                          <textarea type="text" class="form-control" placeholder="Alamat Tempat Tinggal" name="alamat" readonly><?php echo $siswa->alamat?></textarea>
                        </div>
                        <div class="form-group">
                          <label>No. HP</label>
                          <input type="text" class="form-control" placeholder="No. HP" name="no_hp" value="<?php echo $siswa->no_hp?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Asal Sekolah</label>
                          <input type="text" class="form-control" placeholder="Asal Sekolah" name="asal_sekolah" value="<?php echo $siswa->asal_sekolah?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Status Sekolah Asal</label>
                          <input type="text" class="form-control" placeholder="Mis. Negeri/Swasta atau yang lainnya" name="status_sekolah_asal" value="<?php echo $siswa->status_sekolah_asal?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Bulan/Tahun masuk SMP/MTs</label>
                          <input type="month" class="form-control" placeholder="Bulan/Tahun masuk SMP/MTs" name="bulan_tahun_masuk_smp" value="<?php echo $siswa->bulan_tahun_masuk_smp?>" readonly>
                        </div>
                        <div class="form-group">
                          <label>Bulan/Tahun lulus SMP/MTs</label>
                          <input type="month" class="form-control" placeholder="Bulan/Tahun lulus SMP/MTs" name="bulan_tahun_lulus_smp" value="<?php echo $siswa->bulan_tahun_lulus_smp?>" readonly>
                        </div>
                      </div>
                      <!-- /.box-body -->
                    </form>
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab_2">
                    <b>Perminatan</b>
                    <p>Pilihlah salah satu perminatan kalian dan jelaskan alasannya</p>
                    <hr>
                    <!-- /.box-header -->
                    <form action="#" role="form" method="POST" enctype="multipart/form-data" class="form-horizontal">
                    <input type="hidden" name="id_peminatan" value="<?php echo $peminatan->id_peminatan?>" readonly>
                    <input type="hidden" name="id_siswa" value="<?php echo $siswa->id_siswa?>" readonly>
                      <div class="box-body">
                        <div class="form-group">
                          <label>Peminatan</label>
                          <select class="form-control" name="pilihan" disabled>
                            <option value="" <?php echo empty($peminatan->pilihan) ? 'selected' : '';?>>Pilih Peminatan</option>
                            <option value="1" <?php echo $peminatan->pilihan=='1' ? 'selected' : '';?>>Matematika dan ilmu-ilmu alam (Matematika, Biologi, Fisika, Kimia)</option>
                            <option value="2" <?php echo $peminatan->pilihan=='2' ? 'selected' : '';?>>Ilmu-ilmu Sosial (Geografi, Sejarah, Sosiologi, Antropologi, dan Ekonomi)</option>
                          </select>
                        </div>
                        <div class="form-group">
                          <label>Alasan Memilih</label>
                          <textarea type="text" class="form-control" placeholder="Cantumkan alasan anda memilih" name="alasan" readonly><?php echo $peminatan->alasan?></textarea>
                        </div>
                      </div>
                      <!-- /.box-body -->
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($frame as $key => $item): ?>
                        <tr>
                          <td><?php echo $item->no?></td>
                          <td><?php echo isset($minat_mapel[$key]->mapel) ? $minat_mapel[$key]->mapel : '<i>Belum di input</i>'?></td>
                          <td><?php echo isset($minat_mapel[$key]->alasan) ? $minat_mapel[$key]->alasan : '<i>Belum di input</i>'?></td>
                          
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($frame as $key => $item): ?>
                        <tr>
                          <td><?php echo $item->no?></td>
                          <td><?php echo isset($minat_kerja[$key]->kerja) ? $minat_kerja[$key]->kerja : '<i>Belum di input</i>'?></td>
                          <td><?php echo isset($minat_kerja[$key]->alasan) ? $minat_kerja[$key]->alasan : '<i>Belum di input</i>'?></td>
                          
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
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($frame as $key => $item): ?>
                        <tr>
                          <td><?php echo $item->no?></td>
                          <td><?php echo isset($minat_pt[$key]->pt) ? $minat_pt[$key]->pt : '<i>Belum di input</i>'?></td>
                          <td><?php echo isset($minat_pt[$key]->alasan) ? $minat_pt[$key]->alasan : '<i>Belum di input</i>'?></td>
                          
                        </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                    <!-- /.box-body -->
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