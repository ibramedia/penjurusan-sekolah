
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header text-center">
              <h3 class="box-title"><i class="fa fa-calendar"></i> <?php echo $this->common->tanggalIndonesia(date('Y-m-d'));?></h3>
            </div>
            <div class="box-body">
              <section class="col-lg-12">
              
                <h4 class="box-title">Selamat datang <b><?php echo $this->common->getSiswaData()->nama_siswa;?></b>
                <br><br>
                  <ol>
                    <li>Silakan ganti password default anda <i>(abaikan jika sudah anda lakukan)</i></li>
                    <li>Silakan lengkapi biodata anda</li>
                    <li>Silakan lakukan pengisian angket jika belum di isi.</li>
                  </ol>
                </h4>

                <!-- <hr>

                <h4 class="box-title"><div class="text-center">Nilai Anda</div>
                <br>
                <table id="" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th width="33%" class="text-center">IPA</th>
                    <th width="33%" class="text-center">MATEMATIKA</th>
                    <th width="33%" class="text-center">PSIKOTES</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  // detek sudah isi peminatan
                  $peminatan == 1 ? $data1 = 1 : $data1 = 0;
                  // detek sudah isi minat mapel
                  $minat_mapel == 3 ? $data2 = 1 : $data2 = 0;
                  // detek sudah isi minat pekerjaan
                  $minat_kerja == 3 ? $data3 = 1 : $data3 = 0;
                  // detek sudah isi minat studi lanjut
                  $minat_pt == 3 ? $data4 = 1 : $data4 = 0;
                  $data = $data1 + $data2 + $data3 + $data4;
                  $lengkap = 4;
                  if($data!=$lengkap){
                    ?>
                    <tr>
                      <td colspan="3" class="text-center"><i>Mohon lengkapi angket untuk dapat melihat nilai</i></td>
                      
                    </tr>
                    <?php
                  }
                  else{
                    ?>
                    <tr>
                      <td class="text-center"><?php 
                      $jum_ipa=0;
                      foreach ($nilais as $nilai):
                      if($this->session->userdata('id_siswa')==$nilai->id_siswa){
                        $jum_ipa++;
                        echo $nilai->ipa;
                      }
                      endforeach;
                      if($jum_ipa==0)
                        echo "Belum diinput";?></td>
                      <td class="text-center"><?php 
                      $jum_mtk=0;
                      foreach ($nilais as $nilai):
                      if($this->session->userdata('id_siswa')==$nilai->id_siswa){
                        $jum_mtk++;
                        echo $nilai->mtk;
                      }
                      endforeach;
                      if($jum_mtk==0)
                        echo "Belum diinput";?></td>
                      <td class="text-center"><?php 
                      $jum_psikotes=0;
                      foreach ($nilais as $nilai):
                      if($this->session->userdata('id_siswa')==$nilai->id_siswa){
                        $jum_psikotes++;
                        echo $nilai->psikotes;
                      }
                      endforeach;
                      if($jum_psikotes==0)
                        echo "Belum diinput";?></td>
                      
                    </tr>
                    <?php
                    
                  }
                  ?>
                </table>
                </h4> -->
                <hr>
                <h4 class="box-title text-center">Anda lolos masuk ke jurusan<br>
                <?php
                if($data!=$lengkap){
                  ?>
                  <i>Mohon lengkapi angket terlebih dahulu</i>
                  <?php
                }
                else{
                  ?>
                  <b><?= empty($this->common->getSiswaData()->hasil) ? 'Belum ada putusan' : $this->common->getSiswaData()->hasil; ?></b>
                  <?php
                }
                ?>
                </h4>
              </section>
            </div>
          </div>
        </div>
      </div>

    </section>