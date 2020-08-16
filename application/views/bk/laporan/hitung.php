
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Proses Perhitungan</h3>
            </div>

            <div class="box-footer">
                <a href="#" class="btn btn-success btn-xs" onclick="return history.back(-1);"><i class="fa fa-chevron-left"></i>&nbsp;Kembali</a>
            </div>

            <!-- <div class="body-body"></div> -->
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              
              <table id="" class="table table-bordered table-striped">
                <tr>
                  <td>Jumlah cluster yang dicari</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>Maksimum Iterasi</td>
                  <td>Maksimum Iterasi</td> <!-- ngikut ref: https://www.youtube.com/watch?v=MKW2EFq5OA8&t=189s -->
                </tr>
                <tr>
                  <td>Nilai Pembobot(Pangkat)</td>
                  <td>2</td>
                </tr>
                <tr>
                  <td>Nilai Error Terkecil</td>
                  <td>0.000001</td>
                </tr>
              </table>
              <hr>
              <h4 class="text-center">Data Hitungan</h4>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th rowspan="2">No.</th>
                  <th rowspan="2">No. Peserta</th>
                  <th rowspan="2">Nama Siswa</th>
                  <th colspan="3" class="text-center">Parameter Hitungan</th>
                </tr>
                <tr>
                  <th>IPA</th>
                  <th>MTK</th>
                  <th>PSIKOTES</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach ($siswas as $siswa): ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $siswa->no_peserta ?></td>
                  <td><?php echo $siswa->nama_siswa ?></td>
                  <td class="bg-light-blue disabled"><?php 
                  $jum_ipa=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_ipa++;
                    echo $nilai->ipa;
                  }
                  endforeach;
                  if($jum_ipa==0)
                    echo "Belum diinput";?></td>
                  <td class="bg-light-blue disabled"><?php 
                  $jum_mtk=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_mtk++;
                    echo $nilai->mtk;
                  }
                  endforeach;
                  if($jum_mtk==0)
                    echo "Belum diinput";?></td>
                  <td class="bg-light-blue disabled"><?php 
                  $jum_psikotes=0;
                  foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $jum_psikotes++;
                    echo $nilai->psikotes;
                  }
                  endforeach;
                  if($jum_psikotes==0)
                    echo "Belum diinput";?></td>
                    
                  
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <hr>
              <div class="row">
                  <div class="col-md-6">
                    <h4 class="text-center">Parameter</h4>
                    <table id="example3" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th rowspan="2">No.</th>
                        <th colspan="3" class="text-center">Parameter Hitungan</th>
                      </tr>
                      <tr>
                        <th class="text-center">IPA<br>(X1)</th>
                        <th class="text-center">MTK<br>(X2)</th>
                        <th class="text-center">PSIKOTES<br>(X3)</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1; foreach ($siswas as $siswa): ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td class="bg-light-blue disabled"><?php 
                        $jum_ipa=0;
                        foreach ($nilais as $nilai):
                        if($siswa->id_siswa==$nilai->id_siswa){
                          $jum_ipa++;
                          echo $nilai->ipa;
                        }
                        endforeach;
                        if($jum_ipa==0)
                          echo "Belum diinput";?></td>
                        <td class="bg-light-blue disabled"><?php 
                        $jum_mtk=0;
                        foreach ($nilais as $nilai):
                        if($siswa->id_siswa==$nilai->id_siswa){
                          $jum_mtk++;
                          echo $nilai->mtk;
                        }
                        endforeach;
                        if($jum_mtk==0)
                          echo "Belum diinput";?></td>
                        <td class="bg-light-blue disabled"><?php 
                        $jum_psikotes=0;
                        foreach ($nilais as $nilai):
                        if($siswa->id_siswa==$nilai->id_siswa){
                          $jum_psikotes++;
                          echo $nilai->psikotes;
                        }
                        endforeach;
                        if($jum_psikotes==0)
                          echo "Belum diinput";?></td>
                          
                        
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="col-md-6">
                    <h4 class="text-center">Partisi Awal</h4>
                    <table id="example4" class="table table-bordered table-striped">
                      <thead>
                      <tr>
                        <th colspan="4">&nbsp;</th>
                      </tr>
                      <tr>
                        <th>No.</th>
                        <th class="text-center">C1</th>
                        <th class="text-center">C2</th>
                        <th class="text-center">Jumlah</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1; foreach ($siswas as $siswa):
                      // mencari nilai random / partisi yang di sum = 1
                      // ref: https://stackoverflow.com/questions/2640053/getting-n-random-numbers-whose-sum-is-m/2640067#2640067
                      // $n1 = (float)rand() / (float)getrandmax();
                      // $n2 = (float)rand() / (float)getrandmax();
                      // $sum_n1n2 = $n1 + $n2;
                      // $c1 = number_format($n1/$sum_n1n2, 1);
                      // $c2 = number_format($n2/$sum_n1n2, 1);
                      $c1 = $siswa->partisi_c1;
                      $c2 = $siswa->partisi_c2;
                      $sum = $c1 + $c2;
                      ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $c1; ?></td>
                        <td><?php echo $c2; ?></td>
                        <td><?php echo $sum; ?></td>
                        
                      </tr>
                      <?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Hasil Perhitungan</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" colspan="4">Partisi Awal</th>
                  <th class="text-center" colspan="2">Derajat Keanggotaan</th>
                  <th class="text-center" colspan="3">Parameter</th>
                  <th class="text-center" colspan="4">Ui J</th>
                  <th class="text-center" colspan="4">Ui K</th>
                  <th class="text-center" colspan="8">Iterasi</th>
                  <th class="text-center" colspan="2">Hasil Cluster</th>
                </tr>
                <tr>
                  <th>No.</th>
                  <th class="text-center">C1</th>
                  <th class="text-center">C2</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">DK C1</th>
                  <th class="text-center">DK C2</th>
                  <th class="text-center">X1</th>
                  <th class="text-center">X2</th>
                  <th class="text-center">X3</th>
                  <th class="text-center">DK C1^2<br>(J)</th>
                  <th class="text-center">J * X1</th>
                  <th class="text-center">J * X2</th>
                  <th class="text-center">J * X3</th>
                  <th class="text-center">DK C2^2<br>(K)</th>
                  <th class="text-center">K * X1</th>
                  <th class="text-center">K * X2</th>
                  <th class="text-center">K * X3</th>
                  <th class="text-center">L1</th>
                  <th class="text-center">L2</th>
                  <th class="text-center">L1 + L2</th>
                  <th class="text-center">10 14 <br> L1</th>
                  <th class="text-center">10 14 <br> L2</th>
                  <th class="text-center">LT=L1+L2</th>
                  <th class="text-center">L1/L2</th>
                  <th class="text-center">L2/LT</th>
                  <th class="text-center">C1<br>(IPS)</th>
                  <th class="text-center">C2<br>(IPA)</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $j_sum = 0;
                $jx1_sum = 0;
                $jx2_sum = 0;
                $jx3_sum = 0;
                $k_sum = 0;
                $kx1_sum = 0;
                $kx2_sum = 0;
                $kx3_sum = 0;
                $no = 1; foreach ($siswas as $siswa):
                // mencari nilai random / partisi yang di sum = 1
                // ref: https://stackoverflow.com/questions/2640053/getting-n-random-numbers-whose-sum-is-m/2640067#2640067
                // $n1 = (float)rand() / (float)getrandmax();
                // $n1===0.0 || $n1===0 ? $n1=0.1 : $n1 = $n1; 
                // $n2 = (float)rand() / (float)getrandmax();
                // $n2===0.0 || $n2===0 ? $n2=0.1 : $n2 = $n2;
                // $sum_n1n2 = $n1 + $n2;
                // $sum_n1n2===0 ? $sum_n1n2=0.1 : $sum_n1n2 = $sum_n1n2;
                // // $c1 = number_format($n1/$sum_n1n2, 1);
                // // $c2 = number_format($n2/$sum_n1n2, 1);

                // if($siswa->partisi_c1==0){
                //   $c1 = number_format($n1/$sum_n1n2, 1);
                //   // menyimpan nilai partisi agar tidak berubah
                //   $conn = mysqli_connect("127.0.0.1", "root", "rootdatabase", "penjurusan-sekolah");
                //   $sql = "UPDATE siswa SET partisi_c1='$c1' WHERE id_siswa='$siswa->id_siswa'";
                //   $query = mysqli_query($conn, $sql);
                // }
                // else{
                //   $c1 = $siswa->partisi_c1;
                // }

                // if($siswa->partisi_c2==0){
                //   $c2 = number_format($n2/$sum_n1n2, 1);
                //   // menyimpan nilai partisi agar tidak berubah
                //   $conn = mysqli_connect("127.0.0.1", "root", "rootdatabase", "penjurusan-sekolah");
                //   $sql = "UPDATE siswa SET partisi_c2='$c2' WHERE id_siswa='$siswa->id_siswa'";
                //   $query = mysqli_query($conn, $sql);
                // }
                // else{
                //   $c2 = $siswa->partisi_c2;
                // }
                $c1 = $siswa->partisi_c1;
                $c2 = $siswa->partisi_c2;
                $sum = $c1 + $c2;
                
                // derajat ke anggotaan
                $dkc1 = $c1 * $c1;
                $dkc2 = $c2 * $c2;
                // parameter
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x1 = $nilai->ipa;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x2 = $nilai->mtk;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x3 = $nilai->psikotes;
                  }
                endforeach;
                // UiK
                $j = $dkc1 * $dkc1;
                $jx1 = $j * $x1;
                $jx2 = $j * $x2;
                $jx3 = $j * $x3;
                // SUM UiK
                $j_sum += $j;
                $jx1_sum += $jx1;
                $jx2_sum += $jx2;
                $jx3_sum += $jx3;
                $jx1j_sum = $jx1_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                $jx2j_sum = $jx2_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                $jx3j_sum = $jx3_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                // Perhitungan L1 (mengikuti pedoman dari excel: =SQRT((x1-u1)^2+(x2-u2)^2+(x3-u3)^2))
                $n1 = $x1 - $nilai_fcm->jx1j_sum; // $u dibuat mengambil data dari table agar tidak terjadi looping
                $pn1 = $n1 * $n1;
                $n2 = $x2 - $nilai_fcm->jx2j_sum; 
                $pn2 = $n2 * $n2;
                $n3 = $x3 - $nilai_fcm->jx3j_sum; 
                $pn3 = $n3 * $n3;
                $pnsum = $pn1 + $pn2 + $pn3;
                $l1 = sqrt($pnsum);

                // UiJ
                $k = $dkc2 * $dkc2;
                $kx1 = $k * $x1;
                $kx2 = $k * $x2;
                $kx3 = $k * $x3;
                // SUM UiK
                $k_sum += $k;
                $kx1_sum += $kx1;
                $kx2_sum += $kx2;
                $kx3_sum += $kx3;
                $kx1k_sum = $kx1_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                $kx2k_sum = $kx2_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                $kx3k_sum = $kx3_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                // Perhitungan L2 (mengikuti pedoman dari excel [sama kek L1]: =SQRT((x1-u1)^2+(x2-u2)^2+(x3-u3)^2))
                $m1 = $x1 - $nilai_fcm->kx1k_sum; // $u dibuat mengambil data dari table agar tidak terjadi looping
                $pm1 = $m1 * $m1;
                $m2 = $x2 - $nilai_fcm->kx2k_sum; 
                $pm2 = $m2 * $m2;
                $m3 = $x3 - $nilai_fcm->kx3k_sum; 
                $pm3 = $m3 * $m3;
                $pmsum = $pm1 + $pn2 + $pm3;
                $l2 = sqrt($pmsum);

                // L1 + L2
                $ll = $l1 + $l2;

                $v = $pnsum + $pmsum;
                $w = $pnsum / $v;
                $x = $pmsum / $v;
                $conn = mysqli_connect("127.0.0.1", "root", "rootdatabase", "penjurusan-sekolah");
                  $sql = "UPDATE siswa SET c_value='$x' WHERE id_siswa='$siswa->id_siswa'";
                  $query = mysqli_query($conn, $sql);
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $c1; ?></td>
                  <td><?php echo $c2; ?></td>
                  <td><?php echo $sum; ?></td>
                  <td><?php echo $dkc1; ?></td>
                  <td><?php echo $dkc2; ?></td>
                  <td class="bg-light-blue disabled"><?php echo $x1;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x2;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x3;?></td>
                  <td><?php echo $j; ?></td>
                  <td><?php echo $jx1; ?></td>
                  <td><?php echo $jx2; ?></td>
                  <td><?php echo $jx3; ?></td>
                  <td><?php echo $k; ?></td>
                  <td><?php echo $kx1; ?></td>
                  <td><?php echo $kx2; ?></td>
                  <td><?php echo $kx3; ?></td>
                  <td><?php echo $l1; ?></td>
                  <td><?php echo $l2; ?></td>
                  <td><?php echo $ll; ?></td>
                  <td><?php echo $pnsum; ?></td>
                  <td><?php echo $pmsum; ?></td>
                  <td><?php echo $v; ?></td>
                  <td><?php echo $w; ?></td>
                  <td><?php echo $x; ?></td>
                  <td>
                  <?php
                  if($x <= number_format(0.5, 1)) { //pembagian 2 cluster berdasarkan 0,5
                    echo "X";
                  }
                  ?></td> 
                  <td>
                  <?php
                  if ($x >= number_format(0.5, 1)) { //pembagian 2 cluster berdasarkan 0,5
                    echo "X";
                  }
                  ?></td>
                </tr>
                <?php endforeach;
                // Kumpul SUM dari J
                $jx1j_sum;
                $jx2j_sum;
                $jx3j_sum;
                // Kumpul SUM dari K
                $kx1k_sum;
                $kx2k_sum;
                $kx3k_sum;
                //menyimpan nilai penjumlahan ke table(agar tidak terjadi looping)
                $conn = mysqli_connect("127.0.0.1", "root", "rootdatabase", "penjurusan-sekolah");
                $sql = "UPDATE temp_fcm SET jx1j_sum='$jx1j_sum', jx2j_sum='$jx2j_sum', jx3j_sum='$jx3j_sum', kx1k_sum='$kx1k_sum', kx2k_sum='$kx2k_sum', kx3k_sum='$kx3k_sum'";
                $query = mysqli_query($conn, $sql);
                ?>
                <tr>
                  <td colspan="9">&nbsp;</td>
                  <td><?php echo number_format($j_sum, 4)?></td>
                  <td class="bg-gray disabled"><?php echo number_format($jx1j_sum, 4)?></td>
                  <td class="bg-gray disabled"><?php echo number_format($jx2j_sum, 4)?></td>
                  <td class="bg-gray disabled"><?php echo number_format($jx3j_sum, 4)?></td>
                  <td><?php echo number_format($k_sum, 4)?></td>
                  <td class="bg-gray disabled"><?php echo number_format($kx1k_sum, 4)?></td>
                  <td class="bg-gray disabled"><?php echo number_format($kx2k_sum, 4)?></td>
                  <td class="bg-gray disabled"><?php echo number_format($kx3k_sum, 4)?></td>
                  
                </tr>
                <!-- <tr>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  <td>X</td>
                  
                </tr> -->
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-xs-12">
          
          <div class="box box-default">
            <div class="box-header">
              <h3 class="box-title">Grafik Hasil Cluster</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <script src="<?php echo base_url('chartjs/dist/Chart.js') ?>"></script>
              
              <div class="row" style="padding: 70px; height:90vh;">
                  <canvas id="myChart"></canvas>
              </div>
              <script>
                var ctx = document.getElementById('myChart');
                var myChart = new Chart(ctx, {
                    type: 'scatter',
                    data: {
                        datasets: [{

                            label: 'C1 (Yang masuk IPA)',
                            backgroundColor: '#f87979',
                            pointBackgroundColor: '#f87979',
                            data: [
                            /////
                            <?php
                              $j_sum = 0;
                              $jx1_sum = 0;
                              $jx2_sum = 0;
                              $jx3_sum = 0;
                              $k_sum = 0;
                              $kx1_sum = 0;
                              $kx2_sum = 0;
                              $kx3_sum = 0;
                              $no = 1; foreach ($siswas as $siswa):
                              // mencari nilai random / partisi yang di sum = 1
                              // ref: https://stackoverflow.com/questions/2640053/getting-n-random-numbers-whose-sum-is-m/2640067#2640067
                              // $n1 = (float)rand() / (float)getrandmax();
                              // $n2 = (float)rand() / (float)getrandmax();
                              // $sum_n1n2 = $n1 + $n2;
                              // $c1 = number_format($n1/$sum_n1n2, 1);
                              // $c2 = number_format($n2/$sum_n1n2, 1);
                              $c1 = $siswa->partisi_c1;
                              $c2 = $siswa->partisi_c2;
                              $sum = $c1 + $c2;
                              // derajat ke anggotaan
                              $dkc1 = $c1 * $c1;
                              $dkc2 = $c2 * $c2;
                              // parameter
                              foreach ($nilais as $nilai):
                                if($siswa->id_siswa==$nilai->id_siswa){
                                  $x1 = $nilai->ipa;
                                }
                              endforeach;
                              foreach ($nilais as $nilai):
                                if($siswa->id_siswa==$nilai->id_siswa){
                                  $x2 = $nilai->mtk;
                                }
                              endforeach;
                              foreach ($nilais as $nilai):
                                if($siswa->id_siswa==$nilai->id_siswa){
                                  $x3 = $nilai->psikotes;
                                }
                              endforeach;
                              // UiK
                              $j = $dkc1 * $dkc1;
                              $jx1 = $j * $x1;
                              $jx2 = $j * $x2;
                              $jx3 = $j * $x3;
                              // SUM UiK
                              $j_sum += $j;
                              $jx1_sum += $jx1;
                              $jx2_sum += $jx2;
                              $jx3_sum += $jx3;
                              $jx1j_sum = $jx1_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $jx2j_sum = $jx2_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $jx3j_sum = $jx3_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                              // Perhitungan L1 (mengikuti pedoman dari excel: =SQRT((x1-u1)^2+(x2-u2)^2+(x3-u3)^2))
                              $n1 = $x1 - $nilai_fcm->jx1j_sum; // $u dibuat mengambil data dari table agar tidak terjadi looping
                              $pn1 = $n1 * $n1;
                              $n2 = $x2 - $nilai_fcm->jx2j_sum; 
                              $pn2 = $n2 * $n2;
                              $n3 = $x3 - $nilai_fcm->jx3j_sum; 
                              $pn3 = $n3 * $n3;
                              $pnsum = $pn1 + $pn2 + $pn3;
                              $l1 = sqrt($pnsum);

                              // UiJ
                              $k = $dkc2 * $dkc2;
                              $kx1 = $k * $x1;
                              $kx2 = $k * $x2;
                              $kx3 = $k * $x3;
                              // SUM UiK
                              $k_sum += $k;
                              $kx1_sum += $kx1;
                              $kx2_sum += $kx2;
                              $kx3_sum += $kx3;
                              $kx1k_sum = $kx1_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $kx2k_sum = $kx2_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $kx3k_sum = $kx3_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                              // Perhitungan L2 (mengikuti pedoman dari excel [sama kek L1]: =SQRT((x1-u1)^2+(x2-u2)^2+(x3-u3)^2))
                              $m1 = $x1 - $nilai_fcm->kx1k_sum; // $u dibuat mengambil data dari table agar tidak terjadi looping
                              $pm1 = $m1 * $m1;
                              $m2 = $x2 - $nilai_fcm->kx2k_sum; 
                              $pm2 = $m2 * $m2;
                              $m3 = $x3 - $nilai_fcm->kx3k_sum; 
                              $pm3 = $m3 * $m3;
                              $pmsum = $pm1 + $pn2 + $pm3;
                              $l2 = sqrt($pmsum);

                              // L1 + L2
                              $ll = $l1 + $l2;

                              $v = $pnsum + $pmsum;
                              $w = $pnsum / $v;
                              $x = $pmsum / $v;
                              
                              if ($x >= number_format(0.5, 1)) { //pembagian 2 cluster berdasarkan 0,5
                                echo "{
                                  x: $x,
                                  y: $w
                              },";
                              }
                            ?>
                            <?php endforeach;?>
                            /////
                            ]
                        },
                        {
                            label: 'C2 (Yang masuk IPS)',
                            backgroundColor: '#a4e0d5',
                            pointBackgroundColor: '#a4e0d5',
                            data: [
                              /////
                            <?php
                              $j_sum = 0;
                              $jx1_sum = 0;
                              $jx2_sum = 0;
                              $jx3_sum = 0;
                              $k_sum = 0;
                              $kx1_sum = 0;
                              $kx2_sum = 0;
                              $kx3_sum = 0;
                              $no = 1; foreach ($siswas as $siswa):
                              // mencari nilai random / partisi yang di sum = 1
                              // ref: https://stackoverflow.com/questions/2640053/getting-n-random-numbers-whose-sum-is-m/2640067#2640067
                              // $n1 = (float)rand() / (float)getrandmax();
                              // $n2 = (float)rand() / (float)getrandmax();
                              // $sum_n1n2 = $n1 + $n2;
                              // $c1 = number_format($n1/$sum_n1n2, 1);
                              // $c2 = number_format($n2/$sum_n1n2, 1);
                              $c1 = $siswa->partisi_c1;
                              $c2 = $siswa->partisi_c2;
                              $sum = $c1 + $c2;
                              // derajat ke anggotaan
                              $dkc1 = $c1 * $c1;
                              $dkc2 = $c2 * $c2;
                              // parameter
                              foreach ($nilais as $nilai):
                                if($siswa->id_siswa==$nilai->id_siswa){
                                  $x1 = $nilai->ipa;
                                }
                              endforeach;
                              foreach ($nilais as $nilai):
                                if($siswa->id_siswa==$nilai->id_siswa){
                                  $x2 = $nilai->mtk;
                                }
                              endforeach;
                              foreach ($nilais as $nilai):
                                if($siswa->id_siswa==$nilai->id_siswa){
                                  $x3 = $nilai->psikotes;
                                }
                              endforeach;
                              // UiK
                              $j = $dkc1 * $dkc1;
                              $jx1 = $j * $x1;
                              $jx2 = $j * $x2;
                              $jx3 = $j * $x3;
                              // SUM UiK
                              $j_sum += $j;
                              $jx1_sum += $jx1;
                              $jx2_sum += $jx2;
                              $jx3_sum += $jx3;
                              $jx1j_sum = $jx1_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $jx2j_sum = $jx2_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $jx3j_sum = $jx3_sum / $j_sum; // simpan/keluarkan nilai ini biar jangan looping
                              // Perhitungan L1 (mengikuti pedoman dari excel: =SQRT((x1-u1)^2+(x2-u2)^2+(x3-u3)^2))
                              $n1 = $x1 - $nilai_fcm->jx1j_sum; // $u dibuat mengambil data dari table agar tidak terjadi looping
                              $pn1 = $n1 * $n1;
                              $n2 = $x2 - $nilai_fcm->jx2j_sum; 
                              $pn2 = $n2 * $n2;
                              $n3 = $x3 - $nilai_fcm->jx3j_sum; 
                              $pn3 = $n3 * $n3;
                              $pnsum = $pn1 + $pn2 + $pn3;
                              $l1 = sqrt($pnsum);

                              // UiJ
                              $k = $dkc2 * $dkc2;
                              $kx1 = $k * $x1;
                              $kx2 = $k * $x2;
                              $kx3 = $k * $x3;
                              // SUM UiK
                              $k_sum += $k;
                              $kx1_sum += $kx1;
                              $kx2_sum += $kx2;
                              $kx3_sum += $kx3;
                              $kx1k_sum = $kx1_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $kx2k_sum = $kx2_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                              $kx3k_sum = $kx3_sum / $k_sum; // simpan/keluarkan nilai ini biar jangan looping
                              // Perhitungan L2 (mengikuti pedoman dari excel [sama kek L1]: =SQRT((x1-u1)^2+(x2-u2)^2+(x3-u3)^2))
                              $m1 = $x1 - $nilai_fcm->kx1k_sum; // $u dibuat mengambil data dari table agar tidak terjadi looping
                              $pm1 = $m1 * $m1;
                              $m2 = $x2 - $nilai_fcm->kx2k_sum; 
                              $pm2 = $m2 * $m2;
                              $m3 = $x3 - $nilai_fcm->kx3k_sum; 
                              $pm3 = $m3 * $m3;
                              $pmsum = $pm1 + $pn2 + $pm3;
                              $l2 = sqrt($pmsum);

                              // L1 + L2
                              $ll = $l1 + $l2;

                              $v = $pnsum + $pmsum;
                              $w = $pnsum / $v;
                              $x = $pmsum / $v;
                              
                              if ($x <= number_format(0.5, 1)) { //pembagian 2 cluster berdasarkan 0,5
                                echo "{
                                  x: $x,
                                  y: $w
                              },";
                              }
                            ?>
                            <?php endforeach;?>
                            /////
                            ]

                        }]
                    },
                    options: {
                        scales: {
                            xAxes: [{
                                type: 'linear',
                                position: 'bottom'
                            }]
                        }
                    }
                });
              </script>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>