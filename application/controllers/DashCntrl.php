<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class DashCntrl extends CI_Controller {
	public function __construct(){
                parent::__construct();
                $this->load->helper('url');
                $this->load->helper('form');
                $this->load->helper('file');
                $this->load->model('Modelpelamar');
	}

	public function index(){
		$yearnow = (int)date('Y', strtotime('now'));
		$id = $this->session->userdata('iduser');
		$level = $this->session->userdata('level');
		$nik = $this->session->userdata('nik');

		$date = date("Y-m-d H:i:s");
		$dateawal = $this->Modelpelamar->readTglbuka()->row();
		$dateakhir = $this->Modelpelamar->readTgltutup()->row();
		// $datepengumuman = date('Y-m-d', strtotime("25-01-2022"));
		$row = $this->Modelpelamar->readTgl()->row();
		$datepengumuman = $row->tgl_umum_adm;

		$tolak = $this->Modelpelamar->cekstatuspelamarditolak()->num_rows();
		$terima = $this->Modelpelamar->cekstatuspelamarterima()->num_rows();
		$proses = $this->Modelpelamar->cekstatuspelamarbelumproses()->num_rows();
		$akuntrdftr = $this->Modelpelamar->cekpelamarterdaftar()->num_rows();
		$jml_kebutuhan = $this->Modelpelamar->cekjml_kebutuhan();
		$id_kualifikasi = $this->Modelpelamar->readid_kualifikasi()->result();
		$sorting = $this->Modelpelamar->jmlpelamarper();
		$query = $this->Modelpelamar->jml_pelamarperformasi();
		
		$tot = $terima+$tolak+$proses;

		if($nik == 33111){
			$data=[
				'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
				'time' => date("l, d-m-Y", strtotime("now")),
				'cek' => $this->Modelpelamar->cekPelamar($nik)->num_rows(),
				'terima' => $terima,
				'proses' => $proses,
				'tolak' => $tolak,
				'akuntrdftr' => $akuntrdftr,
				'total' => $tot,
				'jml_kebutuhan' => $jml_kebutuhan,
				'date' => $date,
				'datebuka' => $dateawal->tgl_buka,
				'datetutup' => $dateakhir->tgl_tutup,
				'datepengumuman' => $datepengumuman,
				'sorting' => $query
			];
			$this->load->view('dashboard', $data);
		}else if($level == 4){
			$data=[
				'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
				'time' => date("l, d-m-Y", strtotime("now")),
				'cek' => $this->Modelpelamar->cekPelamar($nik)->num_rows(),
				'terima' => $terima,
				'proses' => $proses,
				'tolak' => $tolak,
				'akuntrdftr' => $akuntrdftr,
				'total' => $tot,
				'jml_kebutuhan' => $jml_kebutuhan,
				'date' => $date,
				'datebuka' => $dateawal->tgl_buka,
				'datetutup' => $dateakhir->tgl_tutup,
				'datepengumuman' => $datepengumuman,
				'sorting' => $query
			];
			$this->load->view('dashboard', $data);
		}else if($level == 2){
		$data=[
			'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
			'time' => date("l, d-m-Y", strtotime("now")),
			'cek' => $this->Modelpelamar->cekPelamar($nik)->num_rows(),
			'terima' => $terima,
			'proses' => $proses,
			'tolak' => $tolak,
			// 'semua' => $semua,
			'akuntrdftr' => $akuntrdftr,
			'sorting' => $query,
			'total' => $tot,
			'jml_kebutuhan' => $jml_kebutuhan,
		];           
		$this->load->view('dashboard', $data);
		}else{
			$level = $this->session->userdata('level');
			if($level == ''){
				redirect('login');
			}else{
				// Lolos tahap administrasi

				// $query = $this->Modelpelamar->read('tb_pelamar', array('ktp'=>$nik), null, null)->row();
				// $status = $query->status;
				// $date = date("Y-m-d H:i:s");
				// $dateawal = date('Y-m-d H:i:s', strtotime("16-01-2020"));
				// $dateakhir = date('Y-m-d H:i:s', strtotime("25-01-2020"));
				// $datepengumuman = date('Y-m-d H:i:s', strtotime("29-01-2020"));
				// $data=[
				// 	'title' => 'Rekrutmen Terbuka Tenaga Kependidikan',
				// 	'time' => date("l, d-m-Y", strtotime("now")),
				// 	'cek' => $this->Modelpelamar->cekPelamar($nik)->num_rows(),
				// 	'statusipun' => $status,
				//'date' => $date,
				// 'dateawal' => $dateawal,
				//  'dateakhir' => $dateakhir,
				// 'datepengumuman' => $datepengumuman
				// ];

				// $this->load->view('dashboard', $data);
				
				// Lolos Tahap dua
				// $query = $this->Modelpelamar->readlolostahapdua($nik)->num_rows();
				$statusPelamar = $this->Modelpelamar->readStatusPelamar($nik)->row();
				
				//lolos skd skb
				//$statusPelamarSkdskb = $this->Modelpelamar->readstatuspelamarskdskb($nik)->row();
				
				//lolos skd skb tb_lolostahaptiga
				$lolostahaptigaa = $this->Modelpelamar->readlolostahapskdskb($nik);
				if ($lolostahaptigaa->num_rows() > 0) {
					$statusskdskb = "4"; //lolosskdskb
				}else{
					$statusskdskb = "5"; //tidaklolosskdskb
				}
				
				//lolos skd skb tb_lolostahaptiga
				$nik = $this->Modelpelamar->readtb_lolostahapdua($nik)->row();
				if(!empty($nik)){
					$nopendaftaran = $nik->no_pendaftaran;
					// $noujian = $nik->noujian;
					// $lolostahaptiga = $this->Modelpelamar->read('tb_lolostahaptiga', array('noujian' => $noujian), null, null);
					$lolostahaptiga = $this->Modelpelamar->read('tb_lolostahaptiga', array('no_pendaftaran' => $nopendaftaran), null, null);
					if ($lolostahaptiga->num_rows() > 0) {
						$statusskdskbb = "4"; //lolosskdskb
					}else{
						$statusskdskbb = "5"; //tidaklolosskdskb
					}
				}
				
				$lolosfinal = $this->Modelpelamar->readlolosfinal($nik);
				if ($lolosfinal->num_rows() > 0) {
					$statusfinal = "6"; //lolos final
				}else{
					$statusfinal = "7"; //tidaklolos final
				}
				
				$date = date("Y-m-d");
				$dateawal = $this->Modelpelamar->readTglbuka()->row();
				$dateakhir = $this->Modelpelamar->readTgltutup()->row();
				$row = $this->Modelpelamar->readTgl()->row();
				$datepengumuman = $row->tgl_umum_adm;
				$datepengumumanskdskb = $row->tgl_pengumuman_skdskb;
				$datepengumumanfinal = $row->tgl_final;
				$nik = $this->session->userdata('nik');
				$tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();

				$data=[
					'title' => '',
					'time' => date("l, d-m-Y", strtotime("now")),
					//'cek' => $this->Modelpelamar->cekPelamar($nik)->num_rows(),
					// 'statusipun' => $query,
					'statuspelamar' => $statusPelamar->status,
					'lolostahaptiga' => $statusskdskb,
					'lolosfinal' => $statusfinal,
					'date' => $date,
					'datebuka' => $dateawal->tgl_buka,
					'datetutup' => $dateakhir->tgl_tutup,
					'dateumumadministrasi' => $datepengumuman,
					'dateskdskb' => $datepengumumanskdskb,
					'datefinal' => $datepengumumanfinal,
					'nik' => $nik,
					'tabelpelamar' => $tabelpelamar,
				];
		   
				$this->load->view('dashboard', $data);
			}
		}
	}

}