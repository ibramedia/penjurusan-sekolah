
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
                  <td>Min Error</td>
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
                  <th>MTK</th>
                  <th>IPA</th>
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
                        <th class="text-center">MTK<br>(X1)</th>
                        <th class="text-center">IPA<br>(X2)</th>
                        <th class="text-center">PSIKOTES<br>(X3)</th>
                      </tr>
                      </thead>
                      <tbody>
                      <?php 
                      $no = 1; foreach ($siswas as $siswa): ?>
                      <tr>
                        <td><?php echo $no++ ?></td>
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
                  <th class="text-center" colspan="3">Data yang diklaster</th>
                  <th class="text-center" colspan="4">Derajat Keanggotaan Klaster 1</th>
                  <th class="text-center" colspan="4">Derajat Keanggotaan Klaster 2</th>
                </tr>
                <tr>
                  <th>No.</th>
                  <th class="text-center">µi1</th>
                  <th class="text-center">µi2</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">X1</th>
                  <th class="text-center">X2</th>
                  <th class="text-center">X3</th>
                  <th class="text-center">(µi1)<sup>2</sup></th>
                  <th class="text-center">(µi1)<sup>2</sup> * X1</th>
                  <th class="text-center">(µi1)<sup>2</sup> * X2</th>
                  <th class="text-center">(µi1)<sup>2</sup> * X3</th>
                  <th class="text-center">(µi2)<sup>2</sup></th>
                  <th class="text-center">(µi2)<sup>2</sup> * X1</th>
                  <th class="text-center">(µi2)<sup>2</sup> * X2</th>
                  <th class="text-center">(µi2)<sup>2</sup> * X3</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $dkµi1_sum = 0;
                $dkµi1x1_sum = 0;
                $dkµi1x2_sum = 0;
                $dkµi1x3_sum = 0;
                $dkµi2_sum = 0;
                $dkµi2x1_sum = 0;
                $dkµi2x2_sum = 0;
                $dkµi2x3_sum = 0;
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

                $µi1 = $siswa->partisi_c1;
                $µi2 = $siswa->partisi_c2;
                $sum = $µi1 + $µi2;
                
                // parameter
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x1 = $nilai->mtk;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x2 = $nilai->ipa;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x3 = $nilai->psikotes;
                  }
                endforeach;
                // derajat ke anggotaan utk klaster 1
                $dkµi1 = $µi1 * $µi1;
                $dkµi1x1 = $dkµi1 * $x1;
                $dkµi1x2 = $dkµi1 * $x2;
                $dkµi1x3 = $dkµi1 * $x3;
                $dkµi1_sum += $dkµi1;
                $dkµi1x1_sum += $dkµi1x1;
                $dkµi1x2_sum += $dkµi1x2;
                $dkµi1x3_sum += $dkµi1x3;

                // derajat ke anggotaan utk klaster 2
                $dkµi2 = $µi2 * $µi2;
                $dkµi2x1 = $dkµi2 * $x1;
                $dkµi2x2 = $dkµi2 * $x2;
                $dkµi2x3 = $dkµi2 * $x3;
                $dkµi2_sum += $dkµi2;
                $dkµi2x1_sum += $dkµi2x1;
                $dkµi2x2_sum += $dkµi2x2;
                $dkµi2x3_sum += $dkµi2x3;
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $µi1; ?></td>
                  <td><?php echo $µi2; ?></td>
                  <td><?php echo $sum; ?></td>
                  <td class="bg-light-blue disabled"><?php echo $x1;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x2;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x3;?></td>
                  <td><?php echo $dkµi1; ?></td>
                  <td><?php echo $dkµi1x1; ?></td>
                  <td><?php echo $dkµi1x2; ?></td>
                  <td><?php echo $dkµi1x3; ?></td>
                  <td><?php echo $dkµi2; ?></td>
                  <td><?php echo $dkµi2x1; ?></td>
                  <td><?php echo $dkµi2x2; ?></td>
                  <td><?php echo $dkµi2x3; ?></td>
                </tr>
                <?php endforeach;

                // variabel untuk perhitungan L1
                $v1x1 = $dkµi1x1_sum / $dkµi1_sum;
                $v1x2 = $dkµi1x2_sum / $dkµi1_sum;
                $v1x3 = $dkµi1x3_sum / $dkµi1_sum;

                $v2x1 = $dkµi2x1_sum / $dkµi2_sum;
                $v2x2 = $dkµi2x2_sum / $dkµi2_sum;
                $v2x3 = $dkµi2x3_sum / $dkµi2_sum;
                ?>
                <tr>
                  <td colspan="7">&nbsp;</td>
                  <td><?php echo $dkµi1_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi1x1_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi1x2_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi1x3_sum?></td>
                  <td><?php echo $dkµi2_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi2x1_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi2x2_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi2x3_sum?></td>
                  
                </tr>
                
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
              <h3 class="box-title">Iterasi 1</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" colspan="3">Kuadrat Derajat Keanggotaan</th>
                  <th class="text-center" colspan="3">Data yang diklaster</th>
                  <th class="text-center" colspan="2">L1</th>
                  <th class="text-center" colspan="2">L2</th>
                  <th class="text-center">LT</th>
                  <th class="text-center">(µi1)</th>
                  <th class="text-center">(µi2)</th>
                </tr>
                <tr>
                  <th>No.</th>
                  <th class="text-center">(µi1)<sup>2</sup></th>
                  <th class="text-center">(µi2)<sup>2</sup></th>
                  <th class="text-center">X1</th>
                  <th class="text-center">X2</th>
                  <th class="text-center">X3</th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup></th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup> * (µi1)<sup>2</sup></th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup></th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup> * (µi2)<sup>2</sup></th>
                  <th class="text-center">L1+L2</th>
                  <th class="text-center">L1/LT</th>
                  <th class="text-center">L2/LT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $p = 0;
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
                
                $µi1 = $siswa->partisi_c1;
                $µi2 = $siswa->partisi_c2;
                $sum = $µi1 + $µi2;
                
                // parameter
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x1 = $nilai->mtk;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x2 = $nilai->ipa;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x3 = $nilai->psikotes;
                  }
                endforeach;
                // kuadrat derajat keanggotaan utk klaster 1
                $dkµi1 = $µi1 * $µi1;

                // kuadrat derajat keanggotaan utk klaster 2
                $dkµi2 = $µi2 * $µi2;
                
                // proses perhitungan L1
                $pl1 = pow($x1-$v1x1, 2) + pow($x2-$v1x2, 2) + pow($x3-$v1x3, 2);
                $l1 = $pl1 * $dkµi1;
                
                // proses perhitungan L2
                $pl2 = pow($x1-$v2x1, 2) + pow($x2-$v2x2, 2) + pow($x3-$v2x3, 2);
                $l2 = $pl2 * $dkµi2;

                // LT
                $lt = $l1 + $l2;
                $p += $lt;

                // L1/LT
                $µi1 = $l1 / $lt; // jadi µi1 untuk iterasi selanjutnya

                // L2/LT
                $µi2 = $l2 / $lt; // jadi µi2 untuk iterasi selanjutnya


                $conn = mysqli_connect("127.0.0.1", "root", "rootdatabase", "penjurusan-sekolah");
                $sql = "UPDATE siswa SET µi1p1='$µi1', µi2p1='$µi2' WHERE id_siswa='$siswa->id_siswa'";
                $query = mysqli_query($conn, $sql);
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dkµi1; ?></td>
                  <td><?php echo $dkµi2; ?></td>
                  <td class="bg-light-blue disabled"><?php echo $x1;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x2;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x3;?></td>
                  <td><?php echo $pl1; ?></td>
                  <td><?php echo $l1; ?></td>
                  <td><?php echo $pl2; ?></td>
                  <td><?php echo $l2; ?></td>
                  <td><?php echo $lt; ?></td>
                  <td><?php echo $µi1; ?></td>
                  <td><?php echo $µi2; ?></td>
                </tr>
                <?php endforeach;
                
                ?>
                <tr>
                  <td colspan="9">&nbsp;</td>
                  <td align="right"><b>Σ (p1)</b></td>
                  <td class="bg-gray disabled"><?php echo $p;?></td>
                  
                </tr>
                
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
              <h3 class="box-title">Hasil Perhitungan 2</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" colspan="4">Partisi Awal</th>
                  <th class="text-center" colspan="3">Data yang diklaster</th>
                  <th class="text-center" colspan="4">Derajat Keanggotaan Klaster 1</th>
                  <th class="text-center" colspan="4">Derajat Keanggotaan Klaster 2</th>
                </tr>
                <tr>
                  <th>No.</th>
                  <th class="text-center">µi1</th>
                  <th class="text-center">µi2</th>
                  <th class="text-center">Jumlah</th>
                  <th class="text-center">X1</th>
                  <th class="text-center">X2</th>
                  <th class="text-center">X3</th>
                  <th class="text-center">(µi1)<sup>2</sup></th>
                  <th class="text-center">(µi1)<sup>2</sup> * X1</th>
                  <th class="text-center">(µi1)<sup>2</sup> * X2</th>
                  <th class="text-center">(µi1)<sup>2</sup> * X3</th>
                  <th class="text-center">(µi2)<sup>2</sup></th>
                  <th class="text-center">(µi2)<sup>2</sup> * X1</th>
                  <th class="text-center">(µi2)<sup>2</sup> * X2</th>
                  <th class="text-center">(µi2)<sup>2</sup> * X3</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $dkµi1_sum = 0;
                $dkµi1x1_sum = 0;
                $dkµi1x2_sum = 0;
                $dkµi1x3_sum = 0;
                $dkµi2_sum = 0;
                $dkµi2x1_sum = 0;
                $dkµi2x2_sum = 0;
                $dkµi2x3_sum = 0;
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

                $µi1 = $siswa->µi1p1;
                $µi2 = $siswa->µi2p1;
                $sum = $µi1 + $µi2;
                
                // parameter
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x1 = $nilai->mtk;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x2 = $nilai->ipa;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x3 = $nilai->psikotes;
                  }
                endforeach;
                // derajat ke anggotaan utk klaster 1
                $dkµi1 = $µi1 * $µi1;
                $dkµi1x1 = $dkµi1 * $x1;
                $dkµi1x2 = $dkµi1 * $x2;
                $dkµi1x3 = $dkµi1 * $x3;
                $dkµi1_sum += $dkµi1;
                $dkµi1x1_sum += $dkµi1x1;
                $dkµi1x2_sum += $dkµi1x2;
                $dkµi1x3_sum += $dkµi1x3;

                // derajat ke anggotaan utk klaster 2
                $dkµi2 = $µi2 * $µi2;
                $dkµi2x1 = $dkµi2 * $x1;
                $dkµi2x2 = $dkµi2 * $x2;
                $dkµi2x3 = $dkµi2 * $x3;
                $dkµi2_sum += $dkµi2;
                $dkµi2x1_sum += $dkµi2x1;
                $dkµi2x2_sum += $dkµi2x2;
                $dkµi2x3_sum += $dkµi2x3;
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $µi1; ?></td>
                  <td><?php echo $µi2; ?></td>
                  <td><?php echo $sum; ?></td>
                  <td class="bg-light-blue disabled"><?php echo $x1;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x2;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x3;?></td>
                  <td><?php echo $dkµi1; ?></td>
                  <td><?php echo $dkµi1x1; ?></td>
                  <td><?php echo $dkµi1x2; ?></td>
                  <td><?php echo $dkµi1x3; ?></td>
                  <td><?php echo $dkµi2; ?></td>
                  <td><?php echo $dkµi2x1; ?></td>
                  <td><?php echo $dkµi2x2; ?></td>
                  <td><?php echo $dkµi2x3; ?></td>
                </tr>
                <?php endforeach;

                // variabel untuk perhitungan L1
                $v1x1 = $dkµi1x1_sum / $dkµi1_sum;
                $v1x2 = $dkµi1x2_sum / $dkµi1_sum;
                $v1x3 = $dkµi1x3_sum / $dkµi1_sum;

                $v2x1 = $dkµi2x1_sum / $dkµi2_sum;
                $v2x2 = $dkµi2x2_sum / $dkµi2_sum;
                $v2x3 = $dkµi2x3_sum / $dkµi2_sum;
                ?>
                <tr>
                  <td colspan="7">&nbsp;</td>
                  <td><?php echo $dkµi1_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi1x1_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi1x2_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi1x3_sum?></td>
                  <td><?php echo $dkµi2_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi2x1_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi2x2_sum?></td>
                  <td class="bg-gray disabled"><?php echo $dkµi2x3_sum?></td>
                  
                </tr>
                
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
              <h3 class="box-title">Iterasi 2</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center" colspan="3">Kuadrat Derajat Keanggotaan</th>
                  <th class="text-center" colspan="3">Data yang diklaster</th>
                  <th class="text-center" colspan="2">L1</th>
                  <th class="text-center" colspan="2">L2</th>
                  <th class="text-center">LT</th>
                  <th class="text-center">(µi1)</th>
                  <th class="text-center">(µi2)</th>
                </tr>
                <tr>
                  <th>No.</th>
                  <th class="text-center">(µi1)<sup>2</sup></th>
                  <th class="text-center">(µi2)<sup>2</sup></th>
                  <th class="text-center">X1</th>
                  <th class="text-center">X2</th>
                  <th class="text-center">X3</th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup></th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup> * (µi1)<sup>2</sup></th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup></th>
                  <th class="text-center">[(Xij - Vij)<sup>2</sup> * (µi2)<sup>2</sup></th>
                  <th class="text-center">L1+L2</th>
                  <th class="text-center">L1/LT</th>
                  <th class="text-center">L2/LT</th>
                </tr>
                </thead>
                <tbody>
                <?php
                $p = 0;
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
                
                $µi1 = $siswa->µi1p1;
                $µi2 = $siswa->µi2p1;
                $sum = $µi1 + $µi2;
                
                // parameter
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x1 = $nilai->mtk;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x2 = $nilai->ipa;
                  }
                endforeach;
                foreach ($nilais as $nilai):
                  if($siswa->id_siswa==$nilai->id_siswa){
                    $x3 = $nilai->psikotes;
                  }
                endforeach;
                // kuadrat derajat keanggotaan utk klaster 1
                $dkµi1 = $µi1 * $µi1;

                // kuadrat derajat keanggotaan utk klaster 2
                $dkµi2 = $µi2 * $µi2;
                
                // proses perhitungan L1
                $pl1 = pow($x1-$v1x1, 2) + pow($x2-$v1x2, 2) + pow($x3-$v1x3, 2);
                $l1 = $pl1 * $dkµi1;
                
                // proses perhitungan L2
                $pl2 = pow($x1-$v2x1, 2) + pow($x2-$v2x2, 2) + pow($x3-$v2x3, 2);
                $l2 = $pl2 * $dkµi2;

                // LT
                $lt = $l1 + $l2;
                $p += $lt;

                // L1/LT
                $µi1 = $l1 / $lt; // jadi µi1 untuk iterasi selanjutnya

                // L2/LT
                $µi2 = $l2 / $lt; // jadi µi2 untuk iterasi selanjutnya
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $dkµi1; ?></td>
                  <td><?php echo $dkµi2; ?></td>
                  <td class="bg-light-blue disabled"><?php echo $x1;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x2;?></td>
                  <td class="bg-light-blue disabled"><?php echo $x3;?></td>
                  <td><?php echo $pl1; ?></td>
                  <td><?php echo $l1; ?></td>
                  <td><?php echo $pl2; ?></td>
                  <td><?php echo $l2; ?></td>
                  <td><?php echo $lt; ?></td>
                  <td><?php echo $µi1; ?></td>
                  <td><?php echo $µi2; ?></td>
                </tr>
                <?php endforeach;
                
                ?>
                <tr>
                  <td colspan="9">&nbsp;</td>
                  <td align="right"><b>Σ (p2)</b></td>
                  <td class="bg-gray disabled"><?php echo $p;?></td>
                  
                </tr>
                
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

      <!-- disini nanti bisa diisi grafik jika memungkinkan -->
    </section>
