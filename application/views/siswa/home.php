
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

                <hr>
                <h4 class="box-title text-center">Anda lolos masuk ke jurusan <b><?php echo "belum diketahui";?></b>
              </section>
            </div>
          </div>
        </div>
      </div>

    </section>