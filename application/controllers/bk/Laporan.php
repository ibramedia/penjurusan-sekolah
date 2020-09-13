<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public $iterations = 0;
    public $decisions = [];
    public $fuzzies;
    public $cluster;
    public $jumlah_data;
    public $nilai_err;
    public $max_iteras;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('bk/model_siswa');
        $this->load->model('bk/model_nilai');
        $this->load->model('bk/model_peminatan');
        $this->load->library('form_validation');
        $this->load->model('model_login');
        if($this->model_login->isNotLogin()) redirect(site_url('login'));
    }

    public function index()
    {
        $data["siswas"] = $this->model_siswa->getAll();
        $data["nilais"] = $this->model_nilai->getAll();
        $data["peminatans"] = $this->model_peminatan->getAll();
        $this->template->load('bk/base', 'bk/laporan/data', $data);
    }

    public function hitung()
    {
        $post = $this->input->post();
        $this->fuzzies = $post["fuzzies"];
        $this->cluster = $post["cluster"];
        $this->jumlah_data = $post["jumlah_data"];
        $this->nilai_err = $post["nilai_err"];
        $this->max_iterasi = $post["max_iterasi"];
        $data["fuzzies"] = $this->fuzzies;
        $data["cluster"] = $this->cluster;
        $data["jumlah_data"] = $this->jumlah_data;
        $data["nilai_err"] = $this->nilai_err;
        $data["max_iterasi"] = $this->max_iterasi;
        $data["siswas"] = $this->model_siswa->getAll();
        $data["nilais"] = $this->model_nilai->getAll();

        $data["points"] = $this->initializeData($this->jumlah_data);
        $centers = [];
        $data["matrixU"] = $this->distributeOverMatrixU($data["points"], $this->fuzzies, $centers);

        $data["iterations"] = $this->iterations;
        $data["decisions"] = $this->decisions;
        $this->template->load('bk/base', 'bk/laporan/hitung', $data);
    }

    //---------------------------------------//
    //---- fungsi - fungsi fuzzy c-means ----//
    //---------------------------------------//
    //-- thanks to: https://github.com/kaharlykskyi/FuzzyCMeans-PHP
    //---------------------------------------//
    // Random values 0 - 1
    public function random_float ($min,$max) {
        return ($min+lcg_value()*(abs($max-$min)));
    }


    //  Fuzzy C Means Algorithm
    public function distributeOverMatrixU($arr, $m, &$centers) {
        $centers = $this->initializeData($this->cluster);
        // $MatrixU = fillUMatrix(count($arr), count($centers)); //generate nilai random = 1 (secara otomatis)
        $MatrixU = array();
        for($i = 0; $i < $this->jumlah_data; $i++){
            $data = $this->model_siswa->getPerOffset($i);
            foreach ($data as $item) {
                $MatrixU[$i] = array($item->partisi_c1, $item->partisi_c2);
            }
        }
        // print("<pre>".print_r($MatrixU,true)."</pre>");

        $previousDecisionValue = 0;
        $currentDecisionValue = 1;

        for($a = 0; $a < $this->max_iterasi && (abs($previousDecisionValue - $currentDecisionValue) > $this->nilai_err); $a++) {
            $previousDecisionValue = $currentDecisionValue;
            $centers = $this->calculateCenters($MatrixU, $m, $arr);

            foreach($MatrixU as $key => &$uRow){
                foreach($uRow as $clusterIndex => &$u){
                    $distance = $this->LT($arr[$key], $centers[$clusterIndex]);
                    $u = $this->prepareU($distance, $m);
                }

                $uRow = $this->normalizeUMatrixRow($uRow);
            }
            $currentDecisionValue = $this->calculateDecisionFunction($arr, $centers, $MatrixU);
        }
        // global $iterations;
        $this->iterations = $a;

        return $MatrixU;
    }

    public function fillUMatrix($pointsCount, $clustersCount) {
        $MatrixU = [];
        for($i = 0; $i < $pointsCount; $i++){
            $MatrixU[$i] = [];
            for($j=0; $j<$clustersCount; $j++){
                $MatrixU[$i][$j] = $this->random_float(0, 1);
            }
            $MatrixU[$i] = $this->normalizeUMatrixRow($MatrixU[$i]);
        }

        return $MatrixU;
    }

    public function calculateCenters($MatrixU, $m, $points)
    {
        $MatrixCentroids = [];

        for($clusterIndex=0; $clusterIndex < $this->cluster; $clusterIndex++){
            $tempAMtk = 0;
            $tempBmtk = 0;
            $tempAipa = 0;
            $tempBipa = 0;
            $tempApsikotes = 0;
            $tempBpsikotes = 0;

            foreach($MatrixU as $key=>$uRow){
                $tempAMtk += pow($uRow[$clusterIndex],$m);
                $tempBmtk += pow($uRow[$clusterIndex],$m) * $points[$key]->mtk;

                $tempAipa += pow($uRow[$clusterIndex],$m);
                $tempBipa += pow($uRow[$clusterIndex],$m) * $points[$key]->ipa;

                $tempApsikotes += pow($uRow[$clusterIndex],$m);
                $tempBpsikotes += pow($uRow[$clusterIndex],$m) * $points[$key]->psikotes;
            }

            $MatrixCentroids[$clusterIndex] = new FCMeans();
            $MatrixCentroids[$clusterIndex]->mtk = $tempBmtk / $tempAMtk;
            $MatrixCentroids[$clusterIndex]->ipa = $tempBipa / $tempAipa;
            $MatrixCentroids[$clusterIndex]->psikotes = $tempBpsikotes / $tempApsikotes;
        }

        return $MatrixCentroids;
    }

    public function calculateDecisionFunction($MatrixPointX, $MatrixCentroids, $MatrixU)
    {
        $sum = 0;
        foreach($MatrixU as $index => $uRow){
            foreach($uRow as $clusterIndex => $u){
                $sum += $u * $this->LT($MatrixCentroids[$clusterIndex], $MatrixPointX[$index]);
            }
        }

        // global $decisions;
        array_push($this->decisions, $sum);
        return $sum;
    }

    public function LT($pointA, $pointB)
    {
        $distance1 = pow(($pointA->mtk - $pointB->mtk),2);
        $distance2 = pow(($pointA->ipa - $pointB->ipa),2);
        $distance3 = pow(($pointA->psikotes - $pointB->psikotes),2);
        $distance = $distance1 + $distance2 + $distance3;
        return sqrt($distance);
    }

    public function normalizeUMatrixRow($MatrixURow)
    {
        $sum = 0;
        foreach($MatrixURow as $u){
            $sum += $u;
        }

        foreach($MatrixURow as &$u){
            $u = $u / $sum;
        }

        return $MatrixURow;
    }

    public function prepareU($distance, $m)
    {
        return pow(1/$distance , 2/($m-1));
    }


    public function initializeData($count) {
        $points = array_fill(0, $count, false);
        array_walk($points, function(&$value, $key){
            $value = new FCMeans();
            ///
            $data = $this->model_nilai->getPerOffset($key);
            ///
            foreach ($data as $item) {
                $value->id_siswa = $item->id_siswa;
                $value->nama_siswa = $item->nama_siswa;
                $value->mtk = $item->mtk;
                $value->ipa = $item->ipa;
                $value->psikotes = $item->psikotes;
            }
        });

        return $points;
    }
    //---------------------------------------//
    //-- end fungsi - fungsi fuzzy c-means --//
    //---------------------------------------//
}

class FCMeans
{
    public $id_siswa;
    public $nama_siswa;
    public $mtk;
    public $ipa;
    public $psikotes;
}