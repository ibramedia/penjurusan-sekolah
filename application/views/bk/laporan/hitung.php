
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
                  <td><?= $cluster?></td>
                </tr>
                <tr>
                  <td>Maksimum Iterasi</td>
                  <td><?= $max_iterasi?></td>
                </tr>
                <tr>
                  <td>Nilai Pembobot(Pangkat)</td>
                  <td><?= $fuzzies?></td>
                </tr>
                <tr>
                  <td>Nilai Error Terkecil</td>
                  <td><?= $nilai_err?></td>
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
                  <th colspan="3" class="text-center">Partisi Awal</th>
                </tr>
                <tr>
                  <th>MTK</th>
                  <th>IPA</th>
                  <th>PSIKOTES</th>
                  <th class="text-center">Cluster 1</th>
                  <th class="text-center">Cluster 2</th>
                  <th class="text-center">Jumlah</th>
                </tr>
                </thead>
                <tbody>
                <?php 
                $no = 1; foreach ($siswas as $siswa):
                
                  $c1 = $siswa->partisi_c1;
                  $c2 = $siswa->partisi_c2;
                  $sum = $c1 + $c2;
                ?>
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
                    
                  <td class="text-center"><?php echo $c1; ?></td>
                  <td class="text-center"><?php echo $c2; ?></td>
                  <td class="text-center"><?php echo $sum; ?></td>
                </tr>
                <?php endforeach; ?>
                </tbody>
              </table>
              <hr>
              
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
                    <th rowspan="2">No.</th>
                    <th rowspan="2">Nama Siswa</th>
                    <th colspan="3" class="text-center">Parameter Hitungan</th>
                    <th colspan="<?= $cluster?>" class="text-center">Klaster</th>
                    <th rowspan="2" class="text-center">Hasil</th>
                  </tr>
                  <tr>
                    <th class="text-center">MTK</th>
                    <th class="text-center">IPA</th>
                    <th class="text-center">PSIKOTES</th>
                    <?php for($i = 1; $i <= $cluster; $i++): ?>
                        <th class="text-center vertical">Cluster <?=$i?></th>
                    <?php endfor; ?>
                  </tr>
                </thead>
                <tbody>
                
                <?php $no = 1; foreach ($matrixU as $i => $row):
                  $id_siswa = $points[$i]->id_siswa;
                  ?>
                    <tr>
                        <td><?= $no++;?></td>
                        <td><?=$points[$i]->nama_siswa?></td>
                        <td class="bg-light-blue disabled"><?=$points[$i]->mtk?></td>
                        <td class="bg-light-blue disabled"><?=$points[$i]->ipa?></td>
                        <td class="bg-light-blue disabled"><?=$points[$i]->psikotes?></td>
                        <?php $maxInRow = max($row); ?>
                        <?php foreach ($row as $val): ?>
                            <td class="<?= $val == $maxInRow ? 'bg-success' : ''; ?>"><?=$val?></td>
                        <?php endforeach; ?>
                        <td class="text-center"><b><?= $val == $maxInRow ? 'SOS' : 'MIPA'; ?></b></td>
                        <?php
                        if($val==$maxInRow){
                          $hasil = 'SOS';
                        }
                        else{
                          $hasil = 'MIPA';
                        }
                        $conn = mysqli_connect("127.0.0.1", "root", "rootdatabase", "penjurusan-sekolah");
                        $sql = "UPDATE siswa SET hasil='$hasil' WHERE id_siswa='$id_siswa'";
                        $query = mysqli_query($conn, $sql);
                        ?>
                    </tr>
                <?php endforeach; ?>
                
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
              <h3 class="box-title">Hasil Iterasi</h3>
            </div>
            
            <!-- /.box-header -->
            <div class="box-body" style="overflow:auto;">
              <table id="example5" class="table table-bordered table-striped">
                <thead>
                  <tr>
                      <th>Iteration</th>
                      <th>Nilai<br>(U<sup>(k)</sup>)</th>
                      <th>Perbedaan<br>(U<sup>(k+1)</sup>-U<sup>(k)</sup>)</th>
                  </tr>
                </thead>
                <tbody>
                
                <?php foreach ($decisions as $i => $decision): ?>
                        <tr>
                            <td><?=$i + 1?></td>
                            <td><?=$decision?></td>
                            <td><?php echo $i > 0 ? $decisions[$i - 1] - $decision : '0'?></td>
                        </tr>
                    <?php endforeach; ?>
                
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

    </section>
