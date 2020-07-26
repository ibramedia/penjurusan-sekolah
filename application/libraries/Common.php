<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Common
{
    public function getSiswaData()
    {
      $this->CI =& get_instance();
      $this->CI->load->model('siswa/model_profile');
      $siswa = $this->CI->model_profile;
      $id = $this->CI->session->userdata('id_siswa');
      $data = $siswa->getById($id);
      if ($data != null) {
        return $data;
      }
      else {
          redirect(site_url('login/logout'));
      }
    }

    public function getBkData()
    {
      $this->CI =& get_instance();
      $this->CI->load->model('bk/model_profile');
      $bk = $this->CI->model_profile;
      $id = $this->CI->session->userdata('id_bk');
      $data = $bk->getById($id);
      if ($data != null) {
        return $data;
      }
      else {
          redirect(site_url('login/logout'));
      }
    }

    public function getWakasisData()
    {
      $this->CI =& get_instance();
      $this->CI->load->model('wakasis/model_profile');
      $wakasis = $this->CI->model_profile;
      $id = $this->CI->session->userdata('id_wakasis');
      $data = $wakasis->getById($id);
      if ($data != null) {
        return $data;
      }
      else {
          redirect(site_url('login/logout'));
      }
    }

    function tanggalIndonesia($date)
    { // fungsi atau method untuk mengubah tanggal ke format indonesia
      // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
       $BulanIndo = array("Januari", "Februari", "Maret",
                  "April", "Mei", "Juni",
                  "Juli", "Agustus", "September",
                  "Oktober", "November", "Desember");
     
       $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
       $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
       $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
       
       $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
  
       $day = date('D', strtotime($date));
       $dayList = array(
         'Sun' => 'Minggu',
         'Mon' => 'Senin',
         'Tue' => 'Selasa',
         'Wed' => 'Rabu',
         'Thu' => 'Kamis',
         'Fri' => 'Jumat',
         'Sat' => 'Sabtu'
        );
        
        $result = $dayList[$day].", ".$result;
  
       return($result);
    }
}