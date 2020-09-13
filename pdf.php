<?php
// header("Content-type:application/pdf");
session_start();
// include("../../config/config.php");
include("koneksi.php");
// Include the main TCPDF library (search for installation path).
require_once('lib/TCPDF-master/tcpdf.php');

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF {

    //Page header
    public function Header() {        
        // logo kiri
        $this->Image('dist/img/provinsi.png', 15, 6, 18, 22, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);
        // logo kanan
        $this->Image('dist/img/smantri.png', 179, 6, 18, 22, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

        // Set font
        $this->SetFont('times', 'B', 19);
        // Title
        // $this->Cell(0, 10, 'PEMERINTAH PROVINSI RIAU\nDINAS PENDIDIKAN', 0, false, 'C', 0, '', 0, false, 'M', 'M');
        $html = '
        <small style="font-size: 14px">
        PEMERINTAH PROVINSI RIAU
        <br>DINAS PENDIDIKAN
        <br>SEKOLAH MENENGAH ATAS (SMA) NEGERI 3 DUMAI
        </small>
        <small style="font-size: 10px">
        <br><br>Jl. Arif Rahman Hakim Telp/Fax. (0765) 4300024 Email. smantri_dumai@yahoo.co.id, Dumai - 2882. NPSN: 10405038
        </small>
        ';
        $this->writeHTML($html, true, false, true, false, 'C');
        // $this->writeHTML("&nbsp;", true, false, false, false, '');
        $this->writeHTML("<hr>", true, false, true, false, 'C');
    }

    // Page footer
    public function Footer() {
        // Position at 15 mm from bottom
        $this->SetY(-10);
        // Set font
        $this->SetFont('times', 'I', 9);
        // Page number
        $this->Cell(0, 10, 'Laporan Keputusan Penjurusan SMAN 3 Dumai', 0, false, 'L', 0, '', 0, false, 'T', 'M');
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Dinas Pendidikan');
$pdf->SetTitle('Laporan Keputusan Penjurusan');
$pdf->SetSubject('Laporan Keputusan Penjurusan');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
// $pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE.' 006', PDF_HEADER_STRING);
$pdf->SetHeaderData('', '17', 'PEMERINTAH PROVINSI RIAU', "DINAS PENDIDIKAN\nSEKOLAH MENENGAH ATAS (SMA) NEGERI 3 DUMAI\nJl. Arif Rahman Hakim Telp/Fax. (0765) 4300024 Email. smantri_dumai@yahoo.co.id, Dumai - 2882");

// set header and footer fonts
$pdf->setHeaderFont(Array('times', '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array('times', '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
// $pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetMargins(PDF_MARGIN_LEFT, "40", PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
	require_once(dirname(__FILE__).'/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('times', '', 12);

// add a page
// $pdf->AddPage();
$pdf->AddPage('P');

$html = '
<h2 class="center"><u>LAPORAN KEPUTUSAN PENJURUSAN</u></h2>
<br>
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, 'C');

$html = '
<table border="1" style="font-size: 13px">
    <tr>
        <th width="5%">No.</th>
        <th width="14%">No. Peserta</th>
        <th width="25%">Nama Siswa</th>
        <th>Nilai MTK</th>
        <th>Nilai IPA</th>
        <th>Nilai PSIKOTES</th>
        <th>Hasil FCM</th>
    </tr>';
    $no = 1;
    $putusan = '';
$result = mysqli_query($conn, 'select * from siswa a
inner join nilai b on a.id_siswa = b.id_siswa
order by a.nama_siswa asc');
while($row = mysqli_fetch_array($result)){
    if(empty($row['hasil'])){
        $hasil = 'Belum ada putusan';
    }
    else{
        $hasil = $row['hasil'];
    }
    $html .= '
        <tr>
            <td>'.$no++.'</td>
            <td align="center">'.$row['no_peserta'].'</td>
            <td>'.$row['nama_siswa'].'</td>
            <td align="center">'.$row['mtk'].'</td>
            <td align="center">'.$row['ipa'].'</td>
            <td align="center">'.$row['psikotes'].'</td>
            <td align="center"><b>'.$hasil.'</b></td>
        </tr>
    ';
}
$html .='
</table>
';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, 'L');

$html ='
<table>
    <tr>
        <td>
            &nbsp;
        </td>
        <td>
        Dumai, '.DateToIndo(date('Y-m-d')).'
        <br>Kepala Sekolah
        <br><br><br>
        <br><b>RONI PASLA, S.Sos., M.Pd.</b>
        <br>Penata Tk. I/III.d
        <br>NIP. 197807022006041010
        </td>
    </tr>
</table>

';
// output the HTML content
$pdf->writeHTML($html, true, false, true, false, 'C');

// $pdf->Image('dist/img/dumai.jpg', 20, 181, 15, 20, 'JPG', '', '', true, 150, '', false, false, 0, false, false, false);
// $pdf->Image('dist/img/logo_sekolah/5efbf5eb62110.png', 130, 184, 16, 15, 'PNG', '', '', true, 150, '', false, false, 0, false, false, false);

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------
//Close and output PDF document
$pdf->Output(__DIR__ . '/berkas/laporan.pdf', 'I');
// $pdf->Output(__DIR__ . '/berkas/laporan.pdf', 'FI');

function DateToIndo($date) { // fungsi atau method untuk mengubah tanggal ke format indonesia
    // variabel BulanIndo merupakan variabel array yang menyimpan nama-nama bulan
     $BulanIndo = array("Januari", "Februari", "Maret",
                "April", "Mei", "Juni",
                "Juli", "Agustus", "September",
                "Oktober", "November", "Desember");
   
     $tahun = substr($date, 0, 4); // memisahkan format tahun menggunakan substring
     $bulan = substr($date, 5, 2); // memisahkan format bulan menggunakan substring
     $tgl   = substr($date, 8, 2); // memisahkan format tanggal menggunakan substring
     
     $result = $tgl . " " . $BulanIndo[(int)$bulan-1] . " ". $tahun;
     return($result);
}

exit();

//============================================================+
// END OF FILE
//============================================================+