<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class PelamarCntrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('Modelpelamar');
        $this->load->model('Modellogin');
        $this->load->model('Modeluser');
        $this->load->library('encryption');
        $this->load->library('upload');
        $this->load->library('form_validation');
        $this->load->library('excel');
    }

    public function index() {
        $level = $this->session->userdata('level');
        $nik = $this->session->userdata('nik');
        $kualifikasi = $this->Modelpelamar->read_kualifikasi()->result();
        ini_set('date.timezone', 'Asia/Jakarta');
        $jam = date('d-m-Y H:i:s');
        $row = $this->Modelpelamar->readid($nik)->row();
        $verifikator = $row->id_user;

        if ($level == 1) {
            $data = [
                'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
                // 'date' => date('l, d-m-Y', strtotime("now")),
                'date' => date('l, d-m-Y'),
                'kualifikasi' => $kualifikasi
            ];
            return $this->load->view('hal_admin', $data);
        } else if ($level == 2) {
            $sortingverifikator = $this->Modelpelamar->readsortingverifikator($verifikator)->result();
            $data = [
                'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
                // 'date' => date('l, d-m-Y H:i', strtotime("now")),
                'date' => date('l, d-m-Y'),
                'kualifikasi' => $sortingverifikator
            ];
            return $this->load->view('hal_admin', $data);
        } else if ($level == 3) {
            $data = [
                'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
                // 'date' => date('l, d-m-Y H:i', strtotime("now")),
                'date' => date('l, d-m-Y'),
            ];
            return $this->load->view('pelamar', $data);
        } else if ($level == 4) {
            redirect('hal_asesor');
        }
    }

    public function bahan_verifikasi() {
        $level = $this->session->userdata('level');
        $nik = $this->session->userdata('nik');
        $kualifikasi = $this->Modelpelamar->read_kualifikasi()->result();
        ini_set('date.timezone', 'Asia/Jakarta');
        $jam = date('d-m-Y H:i:s');
        $row = $this->Modelpelamar->readid($nik)->row();
        $verifikator = $row->id_user;

        $data = [
            'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
            // 'date' => date('l, d-m-Y', strtotime("now")),
            'date' => date('l, d-m-Y'),
            'kualifikasi' => $kualifikasi
        ];
        return $this->load->view('hal_bhnverifikasi', $data);
    }

    public function getTabelhal_bhnverifikasi() {
        $level = $this->session->userdata('level');
        $nik = $this->session->userdata('nik');

        $row = $this->Modelpelamar->readid($nik)->row();
        $verifikator = $row->id_user;
        $sorting = $this->Modelpelamar->readhal_admin();

        $bhnverif = $this->Modelpelamar->getDataVerifikasi();

        $data = [
            'bhnverif' => $bhnverif
        ];

        $this->load->view('tabel-bhnverifikasi', $data);
    }

    public function getBahan() {
        $id = $this->input->get('id');

        $query = $this->Modelpelamar->read('tb_bahanverifikasi', ['id_bhnverifikasi' => $id], null, null);
        foreach ($query->result() as $result) {
            $data = [
                'id_kualifikasi' => $result->id_kualifikasi,
                'kode_kualifikasi' => $result->kode_kualifikasi,
                'min_akreditasipt' => $result->min_akreditasipt,
                'min_akreditasips' => $result->min_akreditasips,
                'ipk' => $result->ipk,
                'min_akreditasipt1' => $result->min_akreditasipt1,
                'min_akreditasips1' => $result->min_akreditasips1,
                'ipk1' => $result->ipk1,
                'min_akreditasipt2' => $result->min_akreditasipt2,
                'min_akreditasips2' => $result->min_akreditasips2,
                'ipk2' => $result->ipk2,
                'min_akreditasipt3' => $result->min_akreditasipt3,
                'min_akreditasips3' => $result->min_akreditasips3,
                'ipk3' => $result->ipk3,
                'itp' => $result->itp,
                'ielts' => $result->ielts,
                'lainlainnya' => $result->lainlainnya,
                'skor_itp' => $result->skor_itp,
                'skor_ielts' => $result->skor_ielts,
                'skor_lain' => $result->skor_lain,
                'status_bahan' => $result->status_bahan,
                'id_bhnverifikasi' => $result->id_bhnverifikasi,
            ];

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function getBahanVerifikasi() {
        $idbhnverifikasi = $this->input->get('id');
        $id_kualifikasi = $this->input->get('kategori');

        $query = $this->Modelpelamar->read('tb_bahanverifikasi', ['id_bhnverifikasi' => $idbhnverifikasi], null, null);
        foreach ($query->result() as $result) {
            $data = [
                'id_kualifikasi' => $result->id_kualifikasi,
                'kode_kualifikasi' => $result->kode_kualifikasi,
                'min_akreditasipt' => $result->min_akreditasipt,
                'min_akreditasips' => $result->min_akreditasips,
                'ipk' => $result->ipk,
                'min_akreditasipt1' => $result->min_akreditasipt1,
                'min_akreditasips1' => $result->min_akreditasips1,
                'ipk1' => $result->ipk1,
                'min_akreditasipt2' => $result->min_akreditasipt2,
                'min_akreditasips2' => $result->min_akreditasips2,
                'ipk2' => $result->ipk2,
                'min_akreditasipt3' => $result->min_akreditasipt3,
                'min_akreditasips3' => $result->min_akreditasips3,
                'ipk3' => $result->ipk3,
                'itp' => $result->itp,
                'ielts' => $result->ielts,
                'lainlainnya' => $result->lainlainnya,
                'skor_itp' => $result->skor_itp,
                'skor_ielts' => $result->skor_ielts,
                'skor_lain' => $result->skor_lain,
                'status_bahan' => $result->status_bahan,
                'id_bhnverifikasi' => $result->id_bhnverifikasi,
            ];

            header('Content-Type: application/json');
            echo json_encode($data);
        }
    }

    public function getDataPelamardanVerifikasi() {
        $id = $this->input->get('id');

        $query = $this->Modelpelamar->tbPelamarjoinTbDataVerifikasi($id);
        foreach ($query->result() as $result) {
            //     $pendidikan = $result->pendidikan;
            //     $pendidikan2 = $result->pendidikan2;
            //     $pendidikan3 = $result->pendidikan3;
            //     if($pendidikan == 3){
            //         $pendidikane = "D4";
            //     }else if($pendidikan == 4){
            //         $pendidikane = "S1";
            //     }else if($pendidikan == 5){ 
            //         $pendidikane = "S1 Profesi";
            //     }else if($pendidikan == 6){
            //         $pendidikane = "S2";
            //     }else if($pendidikan == 7){
            //         $pendidikane = "S2 Terapan";
            //     }else if($pendidikan == 9){
            //         $pendidikane = "S3";
            //     }else if($pendidikan == 10){
            //         $pendidikane = "S3 Terapan";
            //     }else{
            //         $pendidikane = "SMA";
            //     }

            $data = [
                'no_pendaftaran' => $result->no_pendaftaran,
                'ktp' => $result->ktp,
                'kualifikasi' => $result->id_kualifikasi,
                'gelar_depan' => $result->gelar_depan,
                'gelar_belakang' => $result->gelar_belakang,
                'nama_pelamar' => $result->nama_pelamar,
                'tempat_lahir' => $result->tempat_lahir,
                'tanggal_lahir' => $result->tanggal_lahir,
                'email' => $result->email,
                'jenis_kelamin' => $result->jenis_kelamin,
                'status_menikah' => $result->status_menikah,
                'agama' => $result->agama,
                'no_telepon' => $result->no_telepon,
                'pendidikan' => $result->pendidikan,
                'asal_sekolah' => $result->asal_sekolah,
                'nm_kampus' => $result->nm_kampus,
                'akreditasi_kampus' => $result->akreditasi_kampus,
                'akreditasi_jurusan' => $result->akreditasi_prodi,
                'ipk' => $result->ipk,
                'jurusan' => $result->prodi,
                'thn_lulus' => $result->thn_lulus,
                'skripsi' => $result->skripsi,
                'pendidikan1' => $result->pendidikan1,
                'asal_sekolah1' => $result->asal_sekolah1,
                'nm_kampus1' => $result->nm_kampus1,
                'akreditasi_kampus1' => $result->akreditasi_kampus1,
                'akreditasi_jurusan1' => $result->akreditasi_prodi1,
                'ipk1' => $result->ipk1,
                'jurusan1' => $result->prodi1,
                'thn_lulus1' => $result->thn_lulus1,
                'skripsi1' => $result->skripsi1,
                'pendidikan2' => $result->pendidikan2,
                'asal_sekolah2' => $result->asal_sekolah2,
                'nm_kampus2' => $result->nm_kampus2,
                'akreditasi_kampus2' => $result->akreditasi_kampus2,
                'akreditasi_jurusan2' => $result->akreditasi_prodi2,
                'ipk2' => $result->ipk2,
                'jurusan2' => $result->prodi2,
                'thn_lulus2' => $result->thn_lulus2,
                'tesis' => $result->tesis,
                'pendidikan3' => $result->pendidikan3,
                'asal_sekolah3' => $result->asal_sekolah3,
                'nm_kampus3' => $result->nm_kampus3,
                'akreditasi_kampus3' => $result->akreditasi_kampus3,
                'akreditasi_jurusan3' => $result->akreditasi_prodi3,
                'ipk3' => $result->ipk3,
                'jurusan3' => $result->prodi3,
                'thn_lulus3' => $result->thn_lulus3,
                'desertasi' => $result->desertasi,
                'toefl' => $result->toefl,
                'tgl_sert_terbit' => $result->tgl_sert_terbit,
                'verif_lamaran' => $result->verif_lamaran,
                'verif_ktp' => $result->verif_ktp,
                'verif_foto' => $result->verif_foto,
                'verif_sks' => $result->verif_sks,
                'verif_skck' => $result->verif_skck,
                'verif_suratpernyataanbebasparpol' => $result->verif_suratpernyataanbebasparpol,
                'verif_ijazah' => $result->verif_ijazah,
                'verif_transkrip' => $result->verif_transkrip,
                'verif_akreditasipt' => $result->verif_akreditasipt,
                'verif_akreditasiprodi' => $result->verif_akreditasiprodi,
                'verif_penyetaraan' => $result->verif_penyetaraan,
                'verif_ijazah1' => $result->verif_ijazah1,
                'verif_transkrip1' => $result->verif_transkrip1,
                'verif_akreditasipt1' => $result->verif_akreditasipt1,
                'verif_akreditasiprodi1' => $result->verif_akreditasiprodi1,
                'verif_penyetaraan1' => $result->verif_penyetaraan1,
                'verif_ijazah2' => $result->verif_ijazah2,
                'verif_transkrip2' => $result->verif_transkrip2,
                'verif_akreditasipt2' => $result->verif_akreditasipt2,
                'verif_akreditasiprodi2' => $result->verif_akreditasiprodi2,
                'verif_penyetaraan2' => $result->verif_penyetaraan2,
                'verif_ijazah3' => $result->verif_ijazah3,
                'verif_transkrip3' => $result->verif_transkrip3,
                'verif_akreditasipt3' => $result->verif_akreditasipt3,
                'verif_akreditasiprodi3' => $result->verif_akreditasiprodi3,
                'verif_penyetaraan3' => $result->verif_penyetaraan3,
                'verif_toefl' => $result->verif_toefl,
                'id_pelamar' => $id,
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function getData() {
        $id = $this->input->get('id');

        $query = $this->Modelpelamar->read('tb_pelamar', ['id_pelamar' => $id], null, null);
        foreach ($query->result() as $result) {
            //     $pendidikan = $result->pendidikan;
            //     $pendidikan2 = $result->pendidikan2;
            //     $pendidikan3 = $result->pendidikan3;
            //     if($pendidikan == 3){
            //         $pendidikane = "D4";
            //     }else if($pendidikan == 4){
            //         $pendidikane = "S1";
            //     }else if($pendidikan == 5){ 
            //         $pendidikane = "S1 Profesi";
            //     }else if($pendidikan == 6){
            //         $pendidikane = "S2";
            //     }else if($pendidikan == 7){
            //         $pendidikane = "S2 Terapan";
            //     }else if($pendidikan == 9){
            //         $pendidikane = "S3";
            //     }else if($pendidikan == 10){
            //         $pendidikane = "S3 Terapan";
            //     }else{
            //         $pendidikane = "SMA";
            //     }

            $data = [
                'no_pendaftaran' => $result->no_pendaftaran,
                'ktp' => $result->ktp,
                'kualifikasi' => $result->id_kualifikasi,
                'gelar_depan' => $result->gelar_depan,
                'gelar_belakang' => $result->gelar_belakang,
                'nama_pelamar' => $result->nama_pelamar,
                'tempat_lahir' => $result->tempat_lahir,
                'tanggal_lahir' => $result->tanggal_lahir,
                'email' => $result->email,
                'jenis_kelamin' => $result->jenis_kelamin,
                'status_menikah' => $result->status_menikah,
                'agama' => $result->agama,
                'no_telepon' => $result->no_telepon,
                'pendidikan' => $result->pendidikan,
                'asal_sekolah' => $result->asal_sekolah,
                'nm_kampus' => $result->nm_kampus,
                'akreditasi_kampus' => $result->akreditasi_kampus,
                'akreditasi_jurusan' => $result->akreditasi_prodi,
                'ipk' => $result->ipk,
                'jurusan' => $result->prodi,
                'thn_lulus' => $result->thn_lulus,
                'skripsi' => $result->skripsi,
                'pendidikan1' => $result->pendidikan1,
                'asal_sekolah1' => $result->asal_sekolah1,
                'nm_kampus1' => $result->nm_kampus1,
                'akreditasi_kampus1' => $result->akreditasi_kampus1,
                'akreditasi_jurusan1' => $result->akreditasi_prodi1,
                'ipk1' => $result->ipk1,
                'jurusan1' => $result->prodi1,
                'thn_lulus1' => $result->thn_lulus1,
                'skripsi1' => $result->skripsi1,
                'pendidikan2' => $result->pendidikan2,
                'asal_sekolah2' => $result->asal_sekolah2,
                'nm_kampus2' => $result->nm_kampus2,
                'akreditasi_kampus2' => $result->akreditasi_kampus2,
                'akreditasi_jurusan2' => $result->akreditasi_prodi2,
                'ipk2' => $result->ipk2,
                'jurusan2' => $result->prodi2,
                'thn_lulus2' => $result->thn_lulus2,
                'tesis' => $result->tesis,
                'pendidikan3' => $result->pendidikan3,
                'asal_sekolah3' => $result->asal_sekolah3,
                'nm_kampus3' => $result->nm_kampus3,
                'akreditasi_kampus3' => $result->akreditasi_kampus3,
                'akreditasi_jurusan3' => $result->akreditasi_prodi3,
                'ipk3' => $result->ipk3,
                'jurusan3' => $result->prodi3,
                'thn_lulus3' => $result->thn_lulus3,
                'desertasi' => $result->desertasi,
                'toefl' => $result->toefl,
                'tgl_sert_terbit' => $result->tgl_sert_terbit,
                'id_pelamar' => $id,
            ];
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    }

    public function detail() {
        $id_pelamar = (int) $this->input->get("id");
        $a = $this->Modelpelamar->readFilekartu($id_pelamar);
        $b = $this->Modelpelamar->readFile($id_pelamar);
        $query = $this->Modelpelamar->read('tb_pelamar', ['id_pelamar' => $id_pelamar], null, null);
        $query2 = $this->Modelpelamar->namapelamardankualifikasi($id_pelamar);

        $data = array(
            'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
            'tabel' => $query,
            'date' => date('l, d-m-Y', strtotime("now")),
            'tabel_file' => $this->Modelpelamar->readFilekartu($id_pelamar),
            'tabel_file2' => $b,
            'query' => $query2,
            'keterangan' => $this->Modelpelamar->readKeterangan($id_pelamar),
            'status' => $this->Modelpelamar->readStatus($id_pelamar),
            'tabel1' => $id_pelamar,
        );

        $this->load->view("detailPelamar", $data);
    }

    public function hal_verifikasi() {
        if ($this->session->userdata('nik')) {
            $id_pelamar = (int) $this->input->get("id");
            $a = $this->Modelpelamar->readFilekartu($id_pelamar);
            $b = $this->Modelpelamar->readFile($id_pelamar);
            $query = $this->Modelpelamar->read('tb_pelamar', ['id_pelamar' => $id_pelamar], null, null);
            $query2 = $this->Modelpelamar->namapelamardankualifikasi($id_pelamar);

            $tabelpelamar = $this->Modelpelamar->readDataPelamarId($id_pelamar)->row();
            $tablePelamar = $this->Modelpelamar->readDataVerifikasiPelamarId($id_pelamar)->row();

            $lamaran = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'lamaran'], null, null)->row();
            $ktp = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ktp'], null, null)->row();
            $foto = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'foto'], null, null)->row();
            $sks = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sks'], null, null)->row();
            $skck = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'skck'], null, null)->row();
            $suratpernyataanbebasparpol = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasparpol'], null, null)->row();
            $suratpernyataanbebasdariinstansi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasdariinstansi'], null, null)->row();
            $ijazah = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah'], null, null)->row();
            $transkrip = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip'], null, null)->row();
            $penyetaraan = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan'], null, null)->row();
            $akreditasi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi'], null, null)->row();
            $akreditasiprodi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi'], null, null)->row();
            $ijazah1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah1'], null, null)->row();
            $transkrip1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip1'], null, null)->row();
            $penyetaraan1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan1'], null, null)->row();
            $akreditasi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi1'], null, null)->row();
            $akreditasiprodi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi1'], null, null)->row();
            $ijazah2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah2'], null, null)->row();
            $transkrip2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip2'], null, null)->row();
            $penyetaraan2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan2'], null, null)->row();
            $akreditasi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi2'], null, null)->row();
            $akreditasiprodi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi2'], null, null)->row();
            $ijazah3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah3'], null, null)->row();
            $transkrip3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip3'], null, null)->row();
            $penyetaraan3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan3'], null, null)->row();
            $akreditasi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi3'], null, null)->row();
            $akreditasiprodi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi3'], null, null)->row();
            $sertifikat = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sertifikat'], null, null)->row();

            $data = array(
                'title' => 'REKRUTMEN SDM UNIVERSITAS DIPONEGORO',
                'tabel' => $id_pelamar,
                'date' => date('l, d-m-Y', strtotime("now")),
                'tabel_file' => $this->Modelpelamar->readFilekartu($id_pelamar),
                'tabel_file2' => $b,
                'query' => $query2,
                'keterangan' => $this->Modelpelamar->readKeterangan($id_pelamar),
                'status' => $this->Modelpelamar->readStatus($id_pelamar),
                'idpelamar' => $id_pelamar,
                'tabelpelamar' => $tabelpelamar,
                'tablePelamar' => $tablePelamar,
                'lamaran' => $lamaran,
                'ktp' => $ktp,
                'foto' => $foto,
                'sks' => $sks,
                'skck' => $skck,
                'suratpernyataanbebasparpol' => $suratpernyataanbebasparpol,
                'suratpernyataanbebasdariinstansi' => $suratpernyataanbebasdariinstansi,
                'ijazah' => $ijazah,
                'transkrip' => $transkrip,
                'penyetaraan' => $penyetaraan,
                'akreditasi' => $akreditasi,
                'akreditasiprodi' => $akreditasiprodi,
                'ijazah1' => $ijazah1,
                'transkrip1' => $transkrip1,
                'penyetaraan1' => $penyetaraan1,
                'akreditasi1' => $akreditasi1,
                'akreditasiprodi1' => $akreditasiprodi1,
                'ijazah2' => $ijazah2,
                'transkrip2' => $transkrip2,
                'penyetaraan2' => $penyetaraan2,
                'akreditasi2' => $akreditasi2,
                'akreditasiprodi2' => $akreditasiprodi2,
                'ijazah3' => $ijazah3,
                'transkrip3' => $transkrip3,
                'penyetaraan3' => $penyetaraan3,
                'akreditasi3' => $akreditasi3,
                'akreditasiprodi3' => $akreditasiprodi3,
                'sertifikat' => $sertifikat,
            );

            $this->load->view("hal_verifikasi", $data);
        } else {
            redirect('login');
        }
    }

    function hal_asesor() {
        //$nik = '3374106011940001';
        $nmr_daftar = $this->input->post('nomor_pendaftaran');
        $yearnow = (int) date('Y', strtotime('now'));
        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $agama = $this->Modelpelamar->read('tb_agama', null, null, null)->result();
        if (empty($nmr_daftar)) {
            $data = [
                'title' => 'REKRUTMEN SDM UNDIP',
                'time' => date('l, d-m-Y', strtotime("now")),
                'date' => $date,
                'datebuka' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman,
                'datatingkatijazah' => '',
                'nmr_daftar' => ''
            ];
            return $this->load->view('hal_resumeasesor', $data);
        } else {
            $value = $this->Modelpelamar->readAgamaAsesor($nmr_daftar)->row();
            $pelamaragama = $value->agama;
            $pilihanagama = $this->Modelpelamar->pilihanAgama($pelamaragama)->result();

            $datastatuskawin = $this->Modelpelamar->read('tb_status_kawin', null, null, null)->result();
            $statuskawinpelamar = $this->Modelpelamar->readStatusKawinAsesor($nmr_daftar)->row();
            $status_kawin = $statuskawinpelamar->status_menikah;
            $pilihanstatuskawin = $this->Modelpelamar->pilihanStatusKawin($status_kawin)->result();

            $tabelpelamar = $this->Modelpelamar->readDataPelamarAsesor($nmr_daftar)->row();
            $formasi = $tabelpelamar->id_kualifikasi;
            $pilihanformasi = $this->Modelpelamar->pilihanFormasi($formasi)->result();
            $pilihanformasipelamar = $this->Modelpelamar->getPilihanFormasi($formasi)->row();
            $formasipelamar = $this->Modelpelamar->getFormasi($formasi)->row();

            $statuspelamar = $tabelpelamar->status;

            $pend_terakhir = $this->Modelpelamar->pilihanPendidikanTerakhir($nmr_daftar)->row();
            if (!empty($pend_terakhir->id)) {
                $idijazah = $pend_terakhir->id;
                $dataijazah = $this->Modelpelamar->dataPilihanPendidikanTerakhir($idijazah)->result();
                $datatingkatijazah = $this->Modelpelamar->dataPilihanPendidikanTerakhir($idijazah)->row();
            } else {
                $dataijazah = null;
            }
            if (!empty($idijazah)) {
                $jenjangpelamar = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            } else {
                $jenjangpelamar = '';
            }

            $valuepend_terakhir = $this->Modelpelamar->readDataPelamarAsesor($nmr_daftar)->row();
            $pend_terakhir = $valuepend_terakhir->pendidikan_terakhir;
            $valuetingkatijazah = $this->Modelpelamar->read('ijazah', ['id' => $pend_terakhir], null, null)->row();
            $datatingkatijazah = $valuetingkatijazah->tingkat;

            $row = $this->Modelpelamar->read('tb_pelamar', ['no_pendaftaran' => $nmr_daftar], null, null)->row();
            $id_pelamar = $row->id_pelamar;
            $lamaran = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'lamaran'], null, null)->row();
            $ktp = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ktp'], null, null)->row();
            $foto = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'foto'], null, null)->row();
            $sks = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sks'], null, null)->row();
            $skck = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'skck'], null, null)->row();
            $suratpernyataanbebasparpol = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasparpol'], null, null)->row();
            $suratpernyataanbebasdariinstansi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasdariinstansi'], null, null)->row();
            $ijazah = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah'], null, null)->row();
            $transkrip = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip'], null, null)->row();
            $penyetaraan = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan'], null, null)->row();
            $akreditasi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi'], null, null)->row();
            $akreditasiprodi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi'], null, null)->row();
            $ijazah1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah1'], null, null)->row();
            $transkrip1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip1'], null, null)->row();
            $penyetaraan1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan1'], null, null)->row();
            $akreditasi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi1'], null, null)->row();
            $akreditasiprodi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi1'], null, null)->row();
            $ijazah2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah2'], null, null)->row();
            $transkrip2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip2'], null, null)->row();
            $penyetaraan2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan2'], null, null)->row();
            $akreditasi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi2'], null, null)->row();
            $akreditasiprodi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi2'], null, null)->row();
            $ijazah3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah3'], null, null)->row();
            $transkrip3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip3'], null, null)->row();
            $penyetaraan3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan3'], null, null)->row();
            $akreditasi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi3'], null, null)->row();
            $akreditasiprodi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi3'], null, null)->row();
            $sertifikat = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sertifikat'], null, null)->row();

            $tabel = $this->Modelpelamar->readDataPelamarAsesor($nmr_daftar)->row();
            $data = [
                'title' => 'REKRUTMEN SDM UNDIP',
                'time' => date('l, d-m-Y', strtotime("now")),
                'date' => $date,
                'datebuka' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman,
                'nmr_daftar' => $nmr_daftar,
                'agama' => $agama,
                'readagama' => $value,
                'pilihanagama' => $pilihanagama,
                'datastatuskawin' => $datastatuskawin,
                'status_kawin' => $status_kawin,
                'pilihanstatuskawin' => $pilihanstatuskawin,
                'tabelijazah' => $this->Modelpelamar->read('ijazah', ['status_aktif' => '1'], ['id'=>desc], null),
                'datapilihanformasi' => $pilihanformasi,
                'pilihanformasipelamar' => $pilihanformasipelamar,
                'formasipelamar' => $formasipelamar,
                'pilihanpendidikanterakhir' => $pend_terakhir,
                'datajenjang' => $dataijazah,
                'jenjangpelamar' => $jenjangpelamar,
                'datatingkatijazah' => $datatingkatijazah,
                'tabelpelamar' => $tabelpelamar,
                'lamaran' => $lamaran,
                'ktp' => $ktp,
                'foto' => $foto,
                'sks' => $sks,
                'skck' => $skck,
                'suratpernyataanbebasparpol' => $suratpernyataanbebasparpol,
                'suratpernyataanbebasdariinstansi' => $suratpernyataanbebasdariinstansi,
                'ijazah' => $ijazah,
                'transkrip' => $transkrip,
                'penyetaraan' => $penyetaraan,
                'akreditasi' => $akreditasi,
                'akreditasiprodi' => $akreditasiprodi,
                'ijazah1' => $ijazah1,
                'transkrip1' => $transkrip1,
                'penyetaraan1' => $penyetaraan1,
                'akreditasi1' => $akreditasi1,
                'akreditasiprodi1' => $akreditasiprodi1,
                'ijazah2' => $ijazah2,
                'transkrip2' => $transkrip2,
                'penyetaraan2' => $penyetaraan2,
                'akreditasi2' => $akreditasi2,
                'akreditasiprodi2' => $akreditasiprodi2,
                'ijazah3' => $ijazah3,
                'transkrip3' => $transkrip3,
                'penyetaraan3' => $penyetaraan3,
                'akreditasi3' => $akreditasi3,
                'akreditasiprodi3' => $akreditasiprodi3,
                'sertifikat' => $sertifikat,
                'statuspelamar' => $statuspelamar,
                'tabel' => $tabel
            ];
            return $this->load->view('hal_resumeasesor', $data);
        }
    }

    public function getTabelhal_admin() {
        $level = $this->session->userdata('level');
        $nik = $this->session->userdata('nik');

        $row = $this->Modelpelamar->readid($nik)->row();
        $verifikator = $row->id_user;
        $sorting = $this->Modelpelamar->readhal_admin();

        if ($level == 1 or $level == 4) {
            $data = [
                'tabel' => $sorting
            ];

            $this->load->view('tabelhal-admin', $data);
        } else {
            // $readnik = $this->db->query("select * from tb_user where nik = ".$nik." ")->result();
            // foreach($readnik as $row){
            //     $dataa = explode(',', $row->kualifikasi);
            //     foreach($dataa as $key => $valu){
            //         $sorting = $this->Modelpelamar->readhal_adminn($valu);
            //         $k = implode($sorting);
            //         $data = [
            //             'tabel' => $k
            //         ];
            //         $this->load->view('tabelhal-admin',$data);
            //     }
            // }
            $sortingverifikator = $this->Modelpelamar->readverifikator($verifikator);
            $data = [
                'tabel' => $sortingverifikator
            ];

            $this->load->view('tabelhal-admin', $data);
        }
    }

    public function getTabelRiwayatKerja() {
        $this->load->view('tabel-riwayatkerja');
    }

    public function getTabelpelamar() {
        $nik = $this->session->userdata('nik');
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $datepengumumanskdskb = $row->tgl_pengumuman_skdskb;
        $datepengumumanfinal = $row->tgl_final;

        $sorting = $this->Modelpelamar->readKualifikasi($nik);
        //lolos skd skb tb_lolostahaptiga
        $lolostahaptigaa = $this->Modelpelamar->readlolostahapskdskb($nik);
        if ($lolostahaptigaa->num_rows() > 0) {
            $statusskdskb = "4"; //lolosskdskb
        } else {
            $statusskdskb = "5"; //tidaklolosskdskb
        }
        $lolosfinal = $this->Modelpelamar->readlolosfinal($nik);
        if ($lolosfinal->num_rows() > 0) {
            $statusfinal = "6"; //lolos final
        } else {
            $statusfinal = "7"; //tidaklolos final
        }

        $data = [
            'tabel' => $sorting,
            'nik' => $nik,
            'lolostahaptiga' => $statusskdskb,
            'datefinal' => $statusfinal,
            'datepengumuman' => $datepengumuman,
            'pengumumanfinal' => $datepengumumanfinal,
            'dateskdskb' => $datepengumumanskdskb,
        ];

        $this->load->view('tabel-pelamar', $data);
    }

    public function getFileTable() {
        $level = $this->session->userdata('level');
        if ($level == '') {
            echo 'Anda Belum Login';
        } else {
            $id = $this->input->get('id');

            $data = [
                'tabel_file' => $this->Modelpelamar->readFile($id)
            ];
            return $this->load->view('file-pelamar', $data);
        }
    }

    public function getFileadmin() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $keterangan = $this->input->get('keterangan');
        $query = $this->Modelpelamar->namapelamardankualifikasi($id);

        $data = [
            'query' => $query,
            'tabel_file' => $this->Modelpelamar->readFile($id),
            'tabel' => $id,
            'keterangan' => $this->Modelpelamar->readKeterangan($id),
            'status' => $this->Modelpelamar->readStatus($id)
        ];
        return $this->load->view('file-admin', $data);
    }

    public function getFileTableadmin() {
        $id = $this->input->get('id');
        $status = $this->input->get('status');
        $query = $this->Modelpelamar->namapelamardankualifikasi($id);

        $data = [
            'query' => $query,
            'tabel_file' => $this->Modelpelamar->readFile($id),
            'tabel' => $id,
            'keterangan' => $this->Modelpelamar->readKeterangan($id),
            'status' => $this->Modelpelamar->readStatus($id)
        ];
        return $this->load->view('file-hal_admin', $data);
    }

    public function sorting() {
        $level = $this->session->userdata('level');
        $nik = $this->session->userdata('nik');
        $formasi = $this->input->get('formasi');
        $status = $this->input->get('status');
        $row = $this->Modelpelamar->readid($nik)->row();
        $verifikator = $row->id_user;

        if ($formasi == 'all' && $status == 'all') {
            if ($level == '1' or $level == '4') {
                $sorting = $this->Modelpelamar->readhal_admin();
            } else {
                $sorting = $this->Modelpelamar->readverifikator($verifikator);
            }
        } else if ($status == 'all') {
            if ($level == '1' or $level == '4') {
                $sorting = $this->Modelpelamar->sortformasi($formasi);
            } else {
                $sorting = $this->Modelpelamar->sortformasi_verifikator($verifikator, $formasi);
            }
        } else if ($formasi == 'all') {
            if ($level == '1' or $level == '4') {
                $sorting = $this->Modelpelamar->sortstatus($status);
            } else {
                $sorting = $this->Modelpelamar->sortstatus_verifikator($verifikator, $status);
            }
        } else {
            $sorting = $this->Modelpelamar->sortall($formasi, $status);
        }

        $data = [
            'tabel' => $sorting
        ];

        return $this->load->view('tabelhal-admin', $data);
    }

    function pendaftaran() {
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $data = [
            'title' => 'REKRUTMEN SDM UNDIP',
            'time' => date('l, d-m-Y', strtotime("now")),
            'date' => $date,
            'tabel' => $this->Modelpelamar->read('tb_kualifikasi', null, null, null),
            'tabelijazah' => $this->Modelpelamar->read('ijazah', ['status_aktif' => '1'], null, null),
            'datebuka' => $dateawal->tgl_buka,
            'datetutup' => $dateakhir->tgl_tutup,
            'datepengumuman' => $datepengumuman
        ];
        return $this->load->view('pendaftaran', $data);
    }

    function panduan() {
        $yearnow = (int) date('Y', strtotime('now'));
        $data = [
            'title' => 'REKRUTMEN SDM UNDIP',
            'date' => date('l, d-m-Y', strtotime("now")),
        ];
        return $this->load->view('panduan', $data);
    }

    function lupa() {
        $nik = $this->input->post('nik');
        $cekuser = $this->Modeluser->cekNik($nik);

        $password = $this->input->post("password");
        $pass = md5($password);
        $level = 3;

        if ($cekuser > 0) {
            $data = array(
                'nik' => $this->input->post("nik"),
                'password' => $pass,
                'password_tampil' => $password,
                'level' => $level
            );

            $this->db->where('nik', $nik);
            $this->db->update('tb_user', $data);

            $data = array(
                'ktp' => $this->input->post("nik"),
            );
            // $this->Modelpelamar->create('tb_pelamar',$data);

            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);

            $nik = $this->input->post('nik');
            $password = $this->input->post('password');
            $match = $this->Modellogin->read('tb_user', array('nik' => $nik, 'password' => md5($password)), null, null);
            if ($match->num_rows() > 0) {
                foreach ($match->result() as $result) {
                    $iduser = $result->id_user;
                    $level = $result->level;
                    $nik = $result->nik;
                }
                //set session
                $this->session->set_userdata('iduser', $iduser);
                $this->session->set_userdata('level', $level);
                $this->session->set_userdata('nik', $nik);
            }
        } else {
            $data = array(
                'nik' => $this->input->post("nik"),
                'password' => $pass,
                'password_tampil' => $password,
                'level' => $level
            );
            $this->Modelpelamar->create('tb_user', $data);

            $data = array(
                'ktp' => $this->input->post("nik"),
            );
            $this->Modelpelamar->create('tb_pelamar', $data);

            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);

            $nik = $this->input->post('nik');
            $password = $this->input->post('password');
            $match = $this->Modellogin->read('tb_user', array('nik' => $nik, 'password' => md5($password)), null, null);
            if ($match->num_rows() > 0) {
                foreach ($match->result() as $result) {
                    $iduser = $result->id_user;
                    $level = $result->level;
                    $nik = $result->nik;
                }
                //set session
                $this->session->set_userdata('iduser', $iduser);
                $this->session->set_userdata('level', $level);
                $this->session->set_userdata('nik', $nik);
            }
        }
    }

    function addDataUser() {
        $nik = $this->security->xss_clean($this->input->post('nik', TRUE));
        $email = $this->security->xss_clean($this->input->post("email", TRUE));
        $cekuser = $this->Modeluser->cekNik($nik);
        $cekakses = $this->Modeluser->cekAkses($nik);
        $cekemail = $this->Modeluser->cekEmail($email);

        if (!preg_match('/^[0-9]{16}$/', $nik)) {
            echo json_encode(['return' => 'invalid_nik']);
            return;
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo json_encode(['return' => 'invalid_email']);
            return;
        }

        // $password = $this->input->post("password");
        
        $password = $this->security->xss_clean($this->input->post("password", TRUE));
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $level = 3;

        if ($cekuser > 0) {
            $return = [
                'return' => 1
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($cekakses > 0) {
            $return = [
                'return' => 3
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($cekemail > 0) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $data = array(
                'nm_user' => '',
                'kualifikasi' => '',
                'nik' => $this->input->post("nik"),
                'email' => $this->input->post("email"),
                'password' => $pass,
                'password_tampil' => $password,
                'level' => $level
            );
            $this->Modelpelamar->create('tb_user', $data);

            // $data = array(
            // 'ktp' => $this->input->post("nik"),
            // );
            // $this->Modelpelamar->create('tb_pelamar',$data);

            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);

            $nik = $this->input->post('nik');
            $password = $this->input->post('password');
            $match = $this->Modellogin->read('tb_user', ['nik' => $nik], null, null);
            if ($match->num_rows() > 0) {
                foreach ($match->result() as $result) {
                    if (password_verify($password, $result->password)) {
                        $this->session->set_userdata('iduser', $result->id_user);
                        $this->session->set_userdata('level', $result->level);
                        $this->session->set_userdata('nik', $result->nik);
                        break;
                    }
                }
            }
        }
    }

    function identitas() {
        $nik = $this->session->userdata('nik');
        if (empty($nik)) {
            redirect(site_url('dashboard'));
        } else {
            $yearnow = (int) date('Y', strtotime('now'));

            $date = date("Y-m-d H:i:s");
            $dateawal = $this->Modelpelamar->readTglbuka()->row();
            $dateakhir = $this->Modelpelamar->readTgltutup()->row();
            $row = $this->Modelpelamar->readTgl()->row();
            $datepengumuman = $row->tgl_umum_adm;

            $agama = $this->Modelpelamar->read('tb_agama', null, null, null)->result();
            $value = $this->Modelpelamar->readAgama($nik)->row();
            $pelamaragama = $value->agama;
            $pilihanagama = $this->Modelpelamar->pilihanAgama($pelamaragama)->result();

            $datastatuskawin = $this->Modelpelamar->read('tb_status_kawin', null, null, null)->result();
            $statuskawinpelamar = $this->Modelpelamar->readStatusKawin($nik)->row();
            $status_kawin = $statuskawinpelamar->status_menikah;
            $pilihanstatuskawin = $this->Modelpelamar->pilihanStatusKawin($status_kawin)->result();

            $tabel = $this->Modelpelamar->readDataPelamar($nik)->row();
            $statuspelamar = $tabel->status;
            $status_simpanidentitas = $tabel->status_simpanidentitas;
            $data = [
                'title' => 'REKRUTMEN SDM UNDIP',
                'time' => date('l, d-m-Y', strtotime("now")),
                'date' => $date,
                'datebuka' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman,
                'nik' => $nik,
                'agama' => $agama,
                'readagama' => $value,
                'pilihanagama' => $pilihanagama,
                'datastatuskawin' => $datastatuskawin,
                'status_kawin' => $status_kawin,
                'pilihanstatuskawin' => $pilihanstatuskawin,
                'statuspelamar' => $statuspelamar,
                'status_simpanidentitas' => $status_simpanidentitas,
                'tabel' => $tabel
            ];
            return $this->load->view('identitas', $data);
        }
    }

    public function addIdentitasPelamar() {
        $nik = $this->session->userdata('nik');
        $tahun = (int) date('Y', strtotime('now'));
        if ($this->input->post('nama') == '') {
            $return = [
                'return' => 1
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('glrblkg') == '') {
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('tmpt_lahir') == '') {
            $return = [
                'return' => 3
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('tgl_lahir') == '') {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('jenis_kelamin') == '') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('status_menikah') == '') {
            $return = [
                'return' => 6
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('agama') == '') {
            $return = [
                'return' => 7
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('no_telepon') == '') {
            $return = [
                'return' => 8
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('alamat') == '') {
            $return = [
                'return' => 9
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {


            $data = [
                // 'no_pendaftaran' => $tahun.$k.$p.$urutperkualifikasi,
                // 'no_pendaftaran' => $tahun.$k.$p.sprintf("%05d", $no_pendaftaran),
                'ktp' => $nik,
                'gelar_depan' => $this->input->post('glrdpn'),
                'nama_pelamar' => $this->security->xss_clean($this->input->post('nama', TRUE)),
                'gelar_belakang' => $this->input->post('glrblkg'),
                'tempat_lahir' => $this->security->xss_clean($this->input->post('tmpt_lahir', TRUE)),
                'tanggal_lahir' => $this->security->xss_clean($this->input->post('tgl_lahir')),
                'jenis_kelamin' => $this->security->xss_clean($this->input->post('jenis_kelamin')),
                'status_menikah' => $this->security->xss_clean($this->input->post('status_menikah')),
                'agama' => $this->security->xss_clean($this->input->post('agama')),
                'no_telepon' => $this->security->xss_clean($this->input->post('no_telepon')),
                'alamat' => $this->security->xss_clean($this->input->post('alamat')),
                'status_simpanidentitas' => $this->input->post('status_simpanidentitas'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);

            $return = [
                'return' => 10
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function formasi() {
        $nik = $this->session->userdata('nik');
        if (empty($nik)) {
            redirect(site_url('dashboard'));
        } else {
            $yearnow = (int) date('Y', strtotime('now'));

            $date = date("Y-m-d H:i:s");
            $dateawal = $this->Modelpelamar->readTglbuka()->row();
            $dateakhir = $this->Modelpelamar->readTgltutup()->row();
            $row = $this->Modelpelamar->readTgl()->row();
            $datepengumuman = $row->tgl_umum_adm;
            $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
            $statuspelamar = $tabelpelamar->status;
            $status_simpanformasi = $tabelpelamar->status_simpanformasi;

            $formasi = $tabelpelamar->id_kualifikasi;
            $pilihanformasi = $this->Modelpelamar->pilihanFormasi($formasi)->result();
            $pilihanformasipelamar = $this->Modelpelamar->getPilihanFormasi($formasi)->row();
            $formasinyapelamar = $this->Modelpelamar->formasiPelamar($formasi)->row();

            $formasipelamar = $this->Modelpelamar->getFormasi($formasi)->row();

            $pend_terakhir = $this->Modelpelamar->pilihanPendidikanTerakhir($nik)->row();
            if (!empty($pend_terakhir->id)) {
                $idijazah = $pend_terakhir->id;
                $dataijazah = $this->Modelpelamar->dataPilihanPendidikanTerakhir($idijazah)->result();
            } else {
                $dataijazah = null;
            }
            if (!empty($idijazah)) {
                $jenjangpelamar = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            } else {
                $jenjangpelamar = '';
            }

            $data = [
                'title' => 'REKRUTMEN SDM UNDIP',
                'time' => date('l, d-m-Y', strtotime("now")),
                'date' => $date,
                'tabel' => $this->Modelpelamar->read('tb_kualifikasi', null, null, null),
                'tabelijazah' => $this->Modelpelamar->read('ijazah', ['status_aktif' => '1'], null, null),
                'datebuka' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman,
                'datapilihanformasi' => $pilihanformasi,
                'pilihanformasipelamar' => $pilihanformasipelamar,
                'formasinyapelamar' => $formasinyapelamar,
                'pilihanpendidikanterakhir' => $pend_terakhir,
                'datajenjang' => $dataijazah,
                'jenjangpelamar' => $jenjangpelamar,
                'statuspelamar' => $statuspelamar,
                'status_simpanformasi' => $status_simpanformasi,
                'tabelpelamar' => $tabelpelamar
            ];
            return $this->load->view('formasi', $data);
        }
    }

    function addFormasiPelamar() {
        $nik = $this->session->userdata('nik');
        $tahun = (int) date('Y', strtotime('now'));
        $idijazah = $this->input->post('pendidikan_terakhir');
        $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
        $tingkat = $dataijazah->tingkat;

        if ($this->input->post('kualifikasi') == '0') {
            $return = [
                'return' => 1
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '') {
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan') == '0') {
            $return = [
                'return' => 3
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah') == '0') {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('nm_kampus') == '') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah') == 'Dalam Negeri' and $this->input->post('akreditasi_kampus') == '0') {
            $return = [
                'return' => 6
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah') == 'Luar Negeri' and $this->input->post('nomor_penyetaraan') == '') {
            $return = [
                'return' => 7
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('jurusan') == '') {
            $return = [
                'return' => 8
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah') == 'Dalam Negeri' and $this->input->post('akreditasi_jurusan') == '0') {
            $return = [
                'return' => 9
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('ipk') == '' and $this->input->post('asal_sekolah') == 'Dalam Negeri') {
            $return = [
                'return' => 10
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('thn_lulus') == '') {
            $return = [
                'return' => 11
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('skripsi') == '') {
            $return = [
                'return' => 12
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == '0') {
            $return = [
                'return' => 13
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('pendidikan1') == '0') {
            $return = [
                'return' => 14
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('asal_sekolah1') == '0') {
            $return = [
                'return' => 15
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('nm_kampus1') == '') {
            $return = [
                'return' => 16
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('asal_sekolah1') == 'Dalam Negeri' and $this->input->post('akreditasi_kampus1') == '0') {
            $return = [
                'return' => 17
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('asal_sekolah1') == 'Luar Negeri' and $this->input->post('nomor_penyetaraan1') == '') {
            $return = [
                'return' => 18
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('jurusan1') == '') {
            $return = [
                'return' => 19
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('asal_sekolah1') == 'Dalam Negeri' and $this->input->post('akreditasi_jurusan1') == '0') {
            $return = [
                'return' => 20
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('ipk1') == '' and $this->input->post('asal_sekolah1') == 'Dalam Negeri') {
            $return = [
                'return' => 21
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('thn_lulus1') == '') {
            $return = [
                'return' => 22
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $this->input->post('skripsi1') == '') {
            $return = [
                'return' => 23
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan2') == '0') {
            $return = [
                'return' => 24
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah2') == '0') {
            $return = [
                'return' => 25
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('nm_kampus2') == '') {
            $return = [
                'return' => 26
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah2') == 'Dalam Negeri' and $this->input->post('akreditasi_kampus2') == '0') {
            $return = [
                'return' => 27
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah2') == 'Luar Negeri' and $this->input->post('nomor_penyetaraan2') == '') {
            $return = [
                'return' => 28
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('jurusan2') == '') {
            $return = [
                'return' => 29
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('asal_sekolah2') == 'Dalam Negeri' and $this->input->post('akreditasi_jurusan2') == '0') {
            $return = [
                'return' => 30
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('ipk2') == '' and $this->input->post('asak_sekolah2' == "Dalam Negeri")) {
            $return = [
                'return' => 31
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('thn_lulus2') == '') {
            $return = [
                'return' => 32
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('tesis') == '') {
            $return = [
                'return' => 33
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('pendidikan3') == '0') {
            $return = [
                'return' => 34
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('asal_sekolah3') == '0') {
            $return = [
                'return' => 35
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('nm_kampus3') == '') {
            $return = [
                'return' => 36
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('asal_sekolah3') == 'Dalam Negeri' and $this->input->post('akreditasi_kampus3') == '0') {
            $return = [
                'return' => 37
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('asal_sekolah3') == 'Luar Negeri' and $this->input->post('nomor_penyetaraan3') == '') {
            $return = [
                'return' => 38
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('jurusan3') == '') {
            $return = [
                'return' => 39
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('asal_sekolah3') == 'Dalam Negeri' and $this->input->post('akreditasi_jurusan3') == '0') {
            $return = [
                'return' => 40
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('ipk3') == '' and $this->input->post('asak_sekolah3' == "Dalam Negeri")) {
            $return = [
                'return' => 41
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('thn_lulus3') == '') {
            $return = [
                'return' => 42
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '9' and $this->input->post('desertasi') == '') {
            $return = [
                'return' => 43
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('pendidikan3') == '0') {
            $return = [
                'return' => 34
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('asal_sekolah3') == '0') {
            $return = [
                'return' => 35
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('nm_kampus3') == '') {
            $return = [
                'return' => 36
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('asal_sekolah3') == 'Dalam Negeri' and $this->input->post('akreditasi_kampus3') == '0') {
            $return = [
                'return' => 37
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('asal_sekolah3') == 'Luar Negeri' and $this->input->post('nomor_penyetaraan3') == '') {
            $return = [
                'return' => 38
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('jurusan3') == '') {
            $return = [
                'return' => 39
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('asal_sekolah3') == 'Dalam Negeri' and $this->input->post('akreditasi_jurusan3') == '0') {
            $return = [
                'return' => 40
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('ipk3') == '' and $this->input->post('asak_sekolah3' == "Dalam Negeri")) {
            $return = [
                'return' => 41
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('thn_lulus3') == '') {
            $return = [
                'return' => 42
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '10' and $this->input->post('desertasi') == '') {
            $return = [
                'return' => 43
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('pendidikan3') == '0') {
            $return = [
                'return' => 34
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('asal_sekolah3') == '0') {
            $return = [
                'return' => 35
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('nm_kampus3') == '') {
            $return = [
                'return' => 36
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('asal_sekolah3') == 'Dalam Negeri' and $this->input->post('akreditasi_kampus3') == '0') {
            $return = [
                'return' => 37
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('asal_sekolah3') == 'Luar Negeri' and $this->input->post('nomor_penyetaraan3') == '') {
            $return = [
                'return' => 38
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('jurusan3') == '') {
            $return = [
                'return' => 39
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('asal_sekolah3') == 'Dalam Negeri' and $this->input->post('akreditasi_jurusan3') == '0') {
            $return = [
                'return' => 40
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('ipk3') == '' and $this->input->post('asak_sekolah3' == "Dalam Negeri")) {
            $return = [
                'return' => 41
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('thn_lulus3') == '') {
            $return = [
                'return' => 42
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pendidikan_terakhir') == '11' and $this->input->post('desertasi') == '') {
            $return = [
                'return' => 43
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('jenis_toefl') == '') {
            $return = [
                'return' => 44
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('toefl') == '') {
            $return = [
                'return' => 45
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('toefllainnya') == '' and $this->input->post('toefl') == 'Lain-lain') {
            $return = [
                'return' => 46
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('tgl_sert_terbit') == '') {
            $return = [
                'return' => 47
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $tingkat != '6') {
            $idijazah = $this->input->post('pendidikan_terakhir');
            $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            $tingkat = $dataijazah->tingkat;
            $asal_sekolah = $this->input->post('asal_sekolah');
            $asal_sekolah1 = $this->input->post('asal_sekolah1');
            $asal_sekolah2 = $this->input->post('asal_sekolah2');
            $asal_sekolah3 = $this->input->post('asal_sekolah3');
            $jenis_toefl = $this->input->post('jenis_toefl');
            $toefllainnya = $this->input->post('toefl_lainnya');
            if ($jenis_toefl == 'Lain-lain') {
                $toefl_lainnya = $toefllainnya;
            } else {
                $toefl_lainnya = '';
            }

            if ($asal_sekolah == 'Luar Negeri') {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = '0';
                $akreditasi_ps = '0';
                $nomor_penyetaraan = $this->input->post('nomor_penyetaraan');
            } else {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = $this->input->post('akreditasi_kampus');
                $akreditasi_ps = $this->input->post('akreditasi_jurusan');
                $nomor_penyetaraan = '';
            }

            if ($asal_sekolah1 == 'Luar Negeri') {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = '0';
                $akreditasi_ps1 = '0';
                $nomor_penyetaraan1 = $this->input->post('nomor_penyetaraan1');
            } else {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = $this->input->post('akreditasi_kampus1');
                $akreditasi_ps1 = $this->input->post('akreditasi_jurusan1');
                $nomor_penyetaraan1 = '';
            }

            if ($asal_sekolah2 == 'Luar Negeri') {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = '0';
                $akreditasi_ps2 = '0';
                $nomor_penyetaraan2 = $this->input->post('nomor_penyetaraan2');
            } else {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = $this->input->post('akreditasi_kampus2');
                $akreditasi_ps2 = $this->input->post('akreditasi_jurusan2');
                $nomor_penyetaraan2 = '';
            }

            if ($asal_sekolah3 == 'Luar Negeri') {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = '0';
                $akreditasi_ps3 = '0';
                $nomor_penyetaraan3 = $this->input->post('nomor_penyetaraan3');
            } else {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = $this->input->post('akreditasi_kampus3');
                $akreditasi_ps3 = $this->input->post('akreditasi_jurusan3');
                $nomor_penyetaraan3 = '';
            }

            $data = [
                'id_kualifikasi' => $this->input->post('kualifikasi'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nm_kampus' => $this->input->post('nm_kampus'),
                'akreditasi_kampus' => $akreditasi_pt,
                'nomor_penyetaraan' => $nomor_penyetaraan,
                'ipk' => $ipk,
                'prodi' => $this->input->post('jurusan'),
                'thn_lulus' => $this->input->post('thn_lulus'),
                'skripsi' => $this->input->post('skripsi'),
                'akreditasi_prodi' => $akreditasi_ps,
                'pend_profesi' => $this->input->post('pend_profesi'),
                'pendidikan1' => $this->input->post('pendidikan1'),
                'asal_sekolah1' => $this->input->post('asal_sekolah1'),
                'nm_kampus1' => $this->input->post('nm_kampus1'),
                'akreditasi_kampus1' => $akreditasi_pt1,
                'nomor_penyetaraan1' => $nomor_penyetaraan1,
                'ipk1' => $ipk1,
                'prodi1' => $this->input->post('jurusan1'),
                'thn_lulus1' => $this->input->post('thn_lulus1'),
                'skripsi1' => $this->input->post('skripsi1'),
                'akreditasi_prodi1' => $akreditasi_ps1,
                'pendidikan2' => $this->input->post('pendidikan2'),
                'asal_sekolah2' => $this->input->post('asal_sekolah2'),
                'nm_kampus2' => $this->input->post('nm_kampus2'),
                'akreditasi_kampus2' => $akreditasi_pt2,
                'nomor_penyetaraan2' => $nomor_penyetaraan2,
                'ipk2' => $ipk2,
                'prodi2' => $this->input->post('jurusan2'),
                'akreditasi_prodi2' => $akreditasi_ps2,
                'thn_lulus2' => $this->input->post('thn_lulus2'),
                'tesis' => $this->input->post('tesis'),
                'pendidikan3' => '',
                'asal_sekolah3' => '',
                'nm_kampus3' => '',
                'akreditasi_kampus3' => '',
                'nomor_penyetaraan3' => '',
                'ipk3' => '',
                'prodi3' => '',
                'akreditasi_prodi3' => '',
                'thn_lulus3' => '',
                'desertasi' => '',
                'jenis_toefl' => $this->input->post('jenis_toefl'),
                'toefl' => $this->input->post('toefl'),
                'toefl_lainnya' => $toefl_lainnya,
                'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
                'status_simpanformasi' => $this->input->post('status_simpanformasi'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
            $return = [
                'return' => 48
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Ya' and $tingkat == '6') {
            $idijazah = $this->input->post('pendidikan_terakhir');
            $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            $tingkat = $dataijazah->tingkat;
            $asal_sekolah = $this->input->post('asal_sekolah');
            $asal_sekolah1 = $this->input->post('asal_sekolah1');
            $asal_sekolah2 = $this->input->post('asal_sekolah2');
            $asal_sekolah3 = $this->input->post('asal_sekolah3');
            $jenis_toefl = $this->input->post('jenis_toefl');
            $toefllainnya = $this->input->post('toefl_lainnya');
            if ($jenis_toefl == 'Lain-lain') {
                $toefl_lainnya = $toefllainnya;
            } else {
                $toefl_lainnya = '';
            }

            if ($asal_sekolah == 'Luar Negeri') {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = '0';
                $akreditasi_ps = '0';
                $nomor_penyetaraan = $this->input->post('nomor_penyetaraan');
            } else {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = $this->input->post('akreditasi_kampus');
                $akreditasi_ps = $this->input->post('akreditasi_jurusan');
                $nomor_penyetaraan = '';
            }

            if ($asal_sekolah1 == 'Luar Negeri') {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = '0';
                $akreditasi_ps1 = '0';
                $nomor_penyetaraan1 = $this->input->post('nomor_penyetaraan1');
            } else {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = $this->input->post('akreditasi_kampus1');
                $akreditasi_ps1 = $this->input->post('akreditasi_jurusan1');
                $nomor_penyetaraan1 = '';
            }

            if ($asal_sekolah2 == 'Luar Negeri') {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = '0';
                $akreditasi_ps2 = '0';
                $nomor_penyetaraan2 = $this->input->post('nomor_penyetaraan2');
            } else {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = $this->input->post('akreditasi_kampus2');
                $akreditasi_ps2 = $this->input->post('akreditasi_jurusan2');
                $nomor_penyetaraan2 = '';
            }

            if ($asal_sekolah3 == 'Luar Negeri') {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = '0';
                $akreditasi_ps3 = '0';
                $nomor_penyetaraan3 = $this->input->post('nomor_penyetaraan3');
            } else {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = $this->input->post('akreditasi_kampus3');
                $akreditasi_ps3 = $this->input->post('akreditasi_jurusan3');
                $nomor_penyetaraan3 = '';
            }


            $data = [
                'id_kualifikasi' => $this->input->post('kualifikasi'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nm_kampus' => $this->input->post('nm_kampus'),
                'akreditasi_kampus' => $akreditasi_pt,
                'nomor_penyetaraan' => $nomor_penyetaraan,
                'ipk' => $ipk,
                'prodi' => $this->input->post('jurusan'),
                'thn_lulus' => $this->input->post('thn_lulus'),
                'skripsi' => $this->input->post('skripsi'),
                'akreditasi_prodi' => $akreditasi_ps,
                'pend_profesi' => $this->input->post('pend_profesi'),
                'pendidikan1' => $this->input->post('pendidikan1'),
                'asal_sekolah1' => $this->input->post('asal_sekolah1'),
                'nm_kampus1' => $this->input->post('nm_kampus1'),
                'akreditasi_kampus1' => $akreditasi_pt1,
                'nomor_penyetaraan1' => $nomor_penyetaraan1,
                'ipk1' => $ipk1,
                'prodi1' => $this->input->post('jurusan1'),
                'thn_lulus1' => $this->input->post('thn_lulus1'),
                'skripsi1' => $this->input->post('skripsi1'),
                'akreditasi_prodi1' => $akreditasi_ps1,
                'pendidikan2' => $this->input->post('pendidikan2'),
                'asal_sekolah2' => $this->input->post('asal_sekolah2'),
                'nm_kampus2' => $this->input->post('nm_kampus2'),
                'akreditasi_kampus2' => $akreditasi_pt2,
                'nomor_penyetaraan2' => $nomor_penyetaraan2,
                'ipk2' => $ipk2,
                'prodi2' => $this->input->post('jurusan2'),
                'akreditasi_prodi2' => $akreditasi_ps2,
                'thn_lulus2' => $this->input->post('thn_lulus2'),
                'tesis' => $this->input->post('tesis'),
                'pendidikan3' => $this->input->post('pendidikan3'),
                'asal_sekolah3' => $this->input->post('asal_sekolah3'),
                'nm_kampus3' => $this->input->post('nm_kampus3'),
                'akreditasi_kampus3' => $akreditasi_pt3,
                'nomor_penyetaraan3' => $nomor_penyetaraan3,
                'ipk3' => $ipk3,
                'prodi3' => $this->input->post('jurusan3'),
                'akreditasi_prodi3' => $akreditasi_ps3,
                'thn_lulus3' => $this->input->post('thn_lulus3'),
                'desertasi' => $this->input->post('desertasi'),
                'jenis_toefl' => $this->input->post('jenis_toefl'),
                'toefl' => $this->input->post('toefl'),
                'toefl_lainnya' => $toefl_lainnya,
                'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
                'status_simpanformasi' => $this->input->post('status_simpanformasi'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
            $return = [
                'return' => 48
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == '' and $tingkat != '6') {
            // $idijazah = $this->input->post('pendidikan_terakhir');
            // $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            // $tingkat = $dataijazah->tingkat;
            $asal_sekolah = $this->input->post('asal_sekolah');
            $asal_sekolah1 = $this->input->post('asal_sekolah1');
            $asal_sekolah2 = $this->input->post('asal_sekolah2');
            $asal_sekolah3 = $this->input->post('asal_sekolah3');
            $jenis_toefl = $this->input->post('jenis_toefl');
            $toefllainnya = $this->input->post('toefl_lainnya');
            if ($jenis_toefl == 'Lain-lain') {
                $toefl_lainnya = $toefllainnya;
            } else {
                $toefl_lainnya = '';
            }

            if ($asal_sekolah == 'Luar Negeri') {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = '0';
                $akreditasi_ps = '0';
                $nomor_penyetaraan = $this->input->post('nomor_penyetaraan');
            } else {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = $this->input->post('akreditasi_kampus');
                $akreditasi_ps = $this->input->post('akreditasi_jurusan');
                $nomor_penyetaraan = '';
            }

            if ($asal_sekolah1 == 'Luar Negeri') {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = '0';
                $akreditasi_ps1 = '0';
                $nomor_penyetaraan1 = $this->input->post('nomor_penyetaraan1');
            } else {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = $this->input->post('akreditasi_kampus1');
                $akreditasi_ps1 = $this->input->post('akreditasi_jurusan1');
                $nomor_penyetaraan1 = '';
            }

            if ($asal_sekolah2 == 'Luar Negeri') {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = '0';
                $akreditasi_ps2 = '0';
                $nomor_penyetaraan2 = $this->input->post('nomor_penyetaraan2');
            } else {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = $this->input->post('akreditasi_kampus2');
                $akreditasi_ps2 = $this->input->post('akreditasi_jurusan2');
                $nomor_penyetaraan2 = '';
            }

            if ($asal_sekolah3 == 'Luar Negeri') {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = '0';
                $akreditasi_ps3 = '0';
                $nomor_penyetaraan3 = $this->input->post('nomor_penyetaraan3');
            } else {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = $this->input->post('akreditasi_kampus3');
                $akreditasi_ps3 = $this->input->post('akreditasi_jurusan3');
                $nomor_penyetaraan3 = '';
            }

            $data = [
                'id_kualifikasi' => $this->input->post('kualifikasi'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nm_kampus' => $this->input->post('nm_kampus'),
                'akreditasi_kampus' => $akreditasi_pt,
                'nomor_penyetaraan' => $nomor_penyetaraan,
                'ipk' => $ipk,
                'prodi' => $this->input->post('jurusan'),
                'thn_lulus' => $this->input->post('thn_lulus'),
                'skripsi' => $this->input->post('skripsi'),
                'akreditasi_prodi' => $akreditasi_ps,
                'pend_profesi' => $this->input->post('pend_profesi'),
                'pendidikan1' => '',
                'asal_sekolah1' => '',
                'nm_kampus1' => '',
                'akreditasi_kampus1' => '',
                'nomor_penyetaraan1' => '',
                'ipk1' => '',
                'prodi1' => '',
                'thn_lulus1' => '',
                'skripsi1' => '',
                'akreditasi_prodi1' => '',
                'pendidikan2' => $this->input->post('pendidikan2'),
                'asal_sekolah2' => $this->input->post('asal_sekolah2'),
                'nm_kampus2' => $this->input->post('nm_kampus2'),
                'akreditasi_kampus2' => $akreditasi_pt2,
                'nomor_penyetaraan2' => $nomor_penyetaraan2,
                'ipk2' => $ipk2,
                'prodi2' => $this->input->post('jurusan2'),
                'akreditasi_prodi2' => $akreditasi_ps2,
                'thn_lulus2' => $this->input->post('thn_lulus2'),
                'tesis' => $this->input->post('tesis'),
                'pendidikan3' => '',
                'asal_sekolah3' => '',
                'nm_kampus3' => '',
                'akreditasi_kampus3' => '',
                'nomor_penyetaraan3' => '',
                'ipk3' => '',
                'prodi3' => '',
                'akreditasi_prodi3' => '',
                'thn_lulus3' => '',
                'desertasi' => '',
                'jenis_toefl' => $this->input->post('jenis_toefl'),
                'toefl' => $this->input->post('toefl'),
                'toefl_lainnya' => $toefl_lainnya,
                'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
                'status_simpanformasi' => $this->input->post('status_simpanformasi'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
            $return = [
                'return' => 48
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == '' and $tingkat == '6') {
            $idijazah = $this->input->post('pendidikan_terakhir');
            $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            $tingkat = $dataijazah->tingkat;
            $asal_sekolah = $this->input->post('asal_sekolah');
            $asal_sekolah1 = $this->input->post('asal_sekolah1');
            $asal_sekolah2 = $this->input->post('asal_sekolah2');
            $asal_sekolah3 = $this->input->post('asal_sekolah3');
            $jenis_toefl = $this->input->post('jenis_toefl');
            $toefllainnya = $this->input->post('toefl_lainnya');
            if ($jenis_toefl == 'Lain-lain') {
                $toefl_lainnya = $toefllainnya;
            } else {
                $toefl_lainnya = '';
            }

            if ($asal_sekolah == 'Luar Negeri') {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = '0';
                $akreditasi_ps = '0';
                $nomor_penyetaraan = $this->input->post('nomor_penyetaraan');
            } else {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = $this->input->post('akreditasi_kampus');
                $akreditasi_ps = $this->input->post('akreditasi_jurusan');
                $nomor_penyetaraan = '';
            }

            if ($asal_sekolah1 == 'Luar Negeri') {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = '0';
                $akreditasi_ps1 = '0';
                $nomor_penyetaraan1 = $this->input->post('nomor_penyetaraan1');
            } else {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = $this->input->post('akreditasi_kampus1');
                $akreditasi_ps1 = $this->input->post('akreditasi_jurusan1');
                $nomor_penyetaraan1 = '';
            }

            if ($asal_sekolah2 == 'Luar Negeri') {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = '0';
                $akreditasi_ps2 = '0';
                $nomor_penyetaraan2 = $this->input->post('nomor_penyetaraan2');
            } else {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = $this->input->post('akreditasi_kampus2');
                $akreditasi_ps2 = $this->input->post('akreditasi_jurusan2');
                $nomor_penyetaraan2 = '';
            }

            if ($asal_sekolah3 == 'Luar Negeri') {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = '0';
                $akreditasi_ps3 = '0';
                $nomor_penyetaraan3 = $this->input->post('nomor_penyetaraan3');
            } else {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = $this->input->post('akreditasi_kampus3');
                $akreditasi_ps3 = $this->input->post('akreditasi_jurusan3');
                $nomor_penyetaraan3 = '';
            }

            $data = [
                'id_kualifikasi' => $this->input->post('kualifikasi'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nm_kampus' => $this->input->post('nm_kampus'),
                'akreditasi_kampus' => $akreditasi_pt,
                'nomor_penyetaraan' => $nomor_penyetaraan,
                'ipk' => $ipk,
                'prodi' => $this->input->post('jurusan'),
                'thn_lulus' => $this->input->post('thn_lulus'),
                'skripsi' => $this->input->post('skripsi'),
                'akreditasi_prodi' => $akreditasi_ps,
                'pend_profesi' => $this->input->post('pend_profesi'),
                'pendidikan1' => '',
                'asal_sekolah1' => '',
                'nm_kampus1' => '',
                'akreditasi_kampus1' => '',
                'nomor_penyetaraan1' => '',
                'ipk1' => '',
                'prodi1' => '',
                'thn_lulus1' => '',
                'skripsi1' => '',
                'akreditasi_prodi1' => '',
                'pendidikan2' => $this->input->post('pendidikan2'),
                'asal_sekolah2' => $this->input->post('asal_sekolah2'),
                'nm_kampus2' => $this->input->post('nm_kampus2'),
                'akreditasi_kampus2' => $akreditasi_pt2,
                'nomor_penyetaraan2' => $nomor_penyetaraan2,
                'ipk2' => $ipk2,
                'prodi2' => $this->input->post('jurusan2'),
                'akreditasi_prodi2' => $akreditasi_ps2,
                'thn_lulus2' => $this->input->post('thn_lulus2'),
                'tesis' => $this->input->post('tesis'),
                'pendidikan3' => $this->input->post('pendidikan3'),
                'asal_sekolah3' => $this->input->post('asal_sekolah3'),
                'nm_kampus3' => $this->input->post('nm_kampus3'),
                'akreditasi_kampus3' => $akreditasi_pt3,
                'nomor_penyetaraan3' => $nomor_penyetaraan3,
                'ipk3' => $ipk3,
                'prodi3' => $this->input->post('jurusan3'),
                'akreditasi_prodi3' => $akreditasi_ps3,
                'thn_lulus3' => $this->input->post('thn_lulus3'),
                'desertasi' => $this->input->post('desertasi'),
                'jenis_toefl' => $this->input->post('jenis_toefl'),
                'toefl' => $this->input->post('toefl'),
                'toefl_lainnya' => $toefl_lainnya,
                'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
                'status_simpanformasi' => $this->input->post('status_simpanformasi'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
            $return = [
                'return' => 48
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Tidak' and $tingkat == '6') {
            $idijazah = $this->input->post('pendidikan_terakhir');
            $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            $tingkat = $dataijazah->tingkat;
            $asal_sekolah = $this->input->post('asal_sekolah');
            $asal_sekolah1 = $this->input->post('asal_sekolah1');
            $asal_sekolah2 = $this->input->post('asal_sekolah2');
            $asal_sekolah3 = $this->input->post('asal_sekolah3');
            $jenis_toefl = $this->input->post('jenis_toefl');
            $toefllainnya = $this->input->post('toefl_lainnya');
            if ($jenis_toefl == 'Lain-lain') {
                $toefl_lainnya = $toefllainnya;
            } else {
                $toefl_lainnya = '';
            }

            if ($asal_sekolah == 'Luar Negeri') {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = '0';
                $akreditasi_ps = '0';
                $nomor_penyetaraan = $this->input->post('nomor_penyetaraan');
            } else {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = $this->input->post('akreditasi_kampus');
                $akreditasi_ps = $this->input->post('akreditasi_jurusan');
                $nomor_penyetaraan = '';
            }

            if ($asal_sekolah1 == 'Luar Negeri') {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = '0';
                $akreditasi_ps1 = '0';
                $nomor_penyetaraan1 = $this->input->post('nomor_penyetaraan1');
            } else {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = $this->input->post('akreditasi_kampus1');
                $akreditasi_ps1 = $this->input->post('akreditasi_jurusan1');
                $nomor_penyetaraan1 = '';
            }

            if ($asal_sekolah2 == 'Luar Negeri') {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = '0';
                $akreditasi_ps2 = '0';
                $nomor_penyetaraan2 = $this->input->post('nomor_penyetaraan2');
            } else {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = $this->input->post('akreditasi_kampus2');
                $akreditasi_ps2 = $this->input->post('akreditasi_jurusan2');
                $nomor_penyetaraan2 = '';
            }

            if ($asal_sekolah3 == 'Luar Negeri') {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = '0';
                $akreditasi_ps3 = '0';
                $nomor_penyetaraan3 = $this->input->post('nomor_penyetaraan3');
            } else {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = $this->input->post('akreditasi_kampus3');
                $akreditasi_ps3 = $this->input->post('akreditasi_jurusan3');
                $nomor_penyetaraan3 = '';
            }

            $data = [
                'id_kualifikasi' => $this->input->post('kualifikasi'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nm_kampus' => $this->input->post('nm_kampus'),
                'akreditasi_kampus' => $akreditasi_pt,
                'nomor_penyetaraan' => $nomor_penyetaraan,
                'ipk' => $ipk,
                'prodi' => $this->input->post('jurusan'),
                'thn_lulus' => $this->input->post('thn_lulus'),
                'skripsi' => $this->input->post('skripsi'),
                'akreditasi_prodi' => $akreditasi_ps,
                'pend_profesi' => $this->input->post('pend_profesi'),
                'pendidikan1' => '',
                'asal_sekolah1' => '',
                'nm_kampus1' => '',
                'akreditasi_kampus1' => '',
                'nomor_penyetaraan1' => '',
                'ipk1' => '',
                'prodi1' => '',
                'thn_lulus1' => '',
                'skripsi1' => '',
                'akreditasi_prodi1' => '',
                'pendidikan2' => $this->input->post('pendidikan2'),
                'asal_sekolah2' => $this->input->post('asal_sekolah2'),
                'nm_kampus2' => $this->input->post('nm_kampus2'),
                'akreditasi_kampus2' => $akreditasi_pt2,
                'nomor_penyetaraan2' => $nomor_penyetaraan2,
                'ipk2' => $ipk2,
                'prodi2' => $this->input->post('jurusan2'),
                'akreditasi_prodi2' => $akreditasi_ps2,
                'thn_lulus2' => $this->input->post('thn_lulus2'),
                'tesis' => $this->input->post('tesis'),
                'pendidikan3' => $this->input->post('pendidikan3'),
                'asal_sekolah3' => $this->input->post('asal_sekolah3'),
                'nm_kampus3' => $this->input->post('nm_kampus3'),
                'akreditasi_kampus3' => $akreditasi_pt3,
                'nomor_penyetaraan3' => $nomor_penyetaraan3,
                'ipk3' => $ipk3,
                'prodi3' => $this->input->post('jurusan3'),
                'akreditasi_prodi3' => $akreditasi_ps3,
                'thn_lulus3' => $this->input->post('thn_lulus3'),
                'desertasi' => $this->input->post('desertasi'),
                'jenis_toefl' => $this->input->post('jenis_toefl'),
                'toefl' => $this->input->post('toefl'),
                'toefl_lainnya' => $toefl_lainnya,
                'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
                'status_simpanformasi' => $this->input->post('status_simpanformasi'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
            $return = [
                'return' => 48
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($this->input->post('pend_profesi') == 'Tidak' and $tingkat != '6') {
            $idijazah = $this->input->post('pendidikan_terakhir');
            $dataijazah = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            $tingkat = $dataijazah->tingkat;
            $asal_sekolah = $this->input->post('asal_sekolah');
            $asal_sekolah1 = $this->input->post('asal_sekolah1');
            $asal_sekolah2 = $this->input->post('asal_sekolah2');
            $asal_sekolah3 = $this->input->post('asal_sekolah3');
            $jenis_toefl = $this->input->post('jenis_toefl');
            $toefllainnya = $this->input->post('toefl_lainnya');
            if ($jenis_toefl == 'Lain-lain') {
                $toefl_lainnya = $toefllainnya;
            } else {
                $toefl_lainnya = '';
            }

            if ($asal_sekolah == 'Luar Negeri') {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = '0';
                $akreditasi_ps = '0';
                $nomor_penyetaraan = $this->input->post('nomor_penyetaraan');
            } else {
                $ipk = $this->input->post('ipk');
                $akreditasi_pt = $this->input->post('akreditasi_kampus');
                $akreditasi_ps = $this->input->post('akreditasi_jurusan');
                $nomor_penyetaraan = '';
            }

            if ($asal_sekolah1 == 'Luar Negeri') {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = '0';
                $akreditasi_ps1 = '0';
                $nomor_penyetaraan1 = $this->input->post('nomor_penyetaraan1');
            } else {
                $ipk1 = $this->input->post('ipk1');
                $akreditasi_pt1 = $this->input->post('akreditasi_kampus1');
                $akreditasi_ps1 = $this->input->post('akreditasi_jurusan1');
                $nomor_penyetaraan1 = '';
            }

            if ($asal_sekolah2 == 'Luar Negeri') {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = '0';
                $akreditasi_ps2 = '0';
                $nomor_penyetaraan2 = $this->input->post('nomor_penyetaraan2');
            } else {
                $ipk2 = $this->input->post('ipk2');
                $akreditasi_pt2 = $this->input->post('akreditasi_kampus2');
                $akreditasi_ps2 = $this->input->post('akreditasi_jurusan2');
                $nomor_penyetaraan2 = '';
            }

            if ($asal_sekolah3 == 'Luar Negeri') {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = '0';
                $akreditasi_ps3 = '0';
                $nomor_penyetaraan3 = $this->input->post('nomor_penyetaraan3');
            } else {
                $ipk3 = $this->input->post('ipk3');
                $akreditasi_pt3 = $this->input->post('akreditasi_kampus3');
                $akreditasi_ps3 = $this->input->post('akreditasi_jurusan3');
                $nomor_penyetaraan3 = '';
            }

            $data = [
                'id_kualifikasi' => $this->input->post('kualifikasi'),
                'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
                'pendidikan' => $this->input->post('pendidikan'),
                'asal_sekolah' => $this->input->post('asal_sekolah'),
                'nm_kampus' => $this->input->post('nm_kampus'),
                'akreditasi_kampus' => $akreditasi_pt,
                'nomor_penyetaraan' => $nomor_penyetaraan,
                'ipk' => $ipk,
                'prodi' => $this->input->post('jurusan'),
                'thn_lulus' => $this->input->post('thn_lulus'),
                'skripsi' => $this->input->post('skripsi'),
                'akreditasi_prodi' => $akreditasi_ps,
                'pend_profesi' => $this->input->post('pend_profesi'),
                'pendidikan1' => '',
                'asal_sekolah1' => '',
                'nm_kampus1' => '',
                'akreditasi_kampus1' => '',
                'nomor_penyetaraan1' => '',
                'ipk1' => '',
                'prodi1' => '',
                'thn_lulus1' => '',
                'skripsi1' => '',
                'akreditasi_prodi1' => '',
                'pendidikan2' => $this->input->post('pendidikan2'),
                'asal_sekolah2' => $this->input->post('asal_sekolah2'),
                'nm_kampus2' => $this->input->post('nm_kampus2'),
                'akreditasi_kampus2' => $akreditasi_pt2,
                'nomor_penyetaraan2' => $nomor_penyetaraan2,
                'ipk2' => $ipk2,
                'prodi2' => $this->input->post('jurusan2'),
                'akreditasi_prodi2' => $akreditasi_ps2,
                'thn_lulus2' => $this->input->post('thn_lulus2'),
                'tesis' => $this->input->post('tesis'),
                'pendidikan3' => '',
                'asal_sekolah3' => '',
                'nm_kampus3' => '',
                'akreditasi_kampus3' => '',
                'nomor_penyetaraan3' => '',
                'ipk3' => '',
                'prodi3' => '',
                'akreditasi_prodi3' => '',
                'thn_lulus3' => '',
                'desertasi' => '',
                'jenis_toefl' => $this->input->post('jenis_toefl'),
                'toefl' => $this->input->post('toefl'),
                'toefl_lainnya' => $toefl_lainnya,
                'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
                'status_simpanformasi' => $this->input->post('status_simpanformasi'),
            ];

            $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
            $return = [
                'return' => 48
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function pengalaman_kerja() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $data = [
            'title' => 'REKRUTMEN SDM UNDIP',
            'time' => date('l, d-m-Y', strtotime("now")),
            'date' => $date,
            'datebuka' => $dateawal->tgl_buka,
            'datetutup' => $dateakhir->tgl_tutup,
            'datepengumuman' => $datepengumuman,
            'nik' => $nik
        ];
        return $this->load->view('pengalaman_kerja', $data);
    }

    public function getTabelPengalamanKerja() {
        $nik = $this->session->userdata('nik');
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $datepengumumanskdskb = $row->tgl_pengumuman_skdskb;
        $datepengumumanfinal = $row->tgl_final;

        $sorting = $this->Modelpelamar->readKualifikasi($nik);

        $data = [
            'tabel' => $sorting,
            'nik' => $nik
        ];

        $this->load->view('tabel-pengalamankerja', $data);
    }

    function lampiran() {
        $nik = $this->session->userdata('nik');
        if (empty($nik)) {
            redirect(site_url('dashboard'));
        } else {
            $yearnow = (int) date('Y', strtotime('now'));

            $date = date("Y-m-d H:i:s");
            $dateawal = $this->Modelpelamar->readTglbuka()->row();
            $dateakhir = $this->Modelpelamar->readTgltutup()->row();
            $row = $this->Modelpelamar->readTgl()->row();
            $datepengumuman = $row->tgl_umum_adm;
            $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
            $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
            $id_pelamar = $row->id_pelamar;
            $lamaran = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'lamaran'], null, null)->row();
            $ktp = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ktp'], null, null)->row();
            $foto = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'foto'], null, null)->row();
            $sks = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sks'], null, null)->row();
            $skck = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'skck'], null, null)->row();
            $suratpernyataanbebasparpol = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasparpol'], null, null)->row();
            $suratpernyataanbebasdariinstansi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasdariinstansi'], null, null)->row();
            $ijazah = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah'], null, null)->row();
            $transkrip = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip'], null, null)->row();
            $penyetaraan = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan'], null, null)->row();
            $akreditasi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi'], null, null)->row();
            $akreditasiprodi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi'], null, null)->row();
            $ijazah1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah1'], null, null)->row();
            $transkrip1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip1'], null, null)->row();
            $penyetaraan1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan1'], null, null)->row();
            $akreditasi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi1'], null, null)->row();
            $akreditasiprodi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi1'], null, null)->row();
            $ijazah2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah2'], null, null)->row();
            $transkrip2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip2'], null, null)->row();
            $penyetaraan2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan2'], null, null)->row();
            $akreditasi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi2'], null, null)->row();
            $akreditasiprodi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi2'], null, null)->row();
            $ijazah3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah3'], null, null)->row();
            $transkrip3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip3'], null, null)->row();
            $penyetaraan3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan3'], null, null)->row();
            $akreditasi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi3'], null, null)->row();
            $akreditasiprodi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi3'], null, null)->row();
            $sertifikat = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sertifikat'], null, null)->row();

            $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
            $statuspelamar = $tabelpelamar->status;

            $data = [
                'title' => 'REKRUTMEN SDM UNDIP',
                'time' => date('l, d-m-Y', strtotime("now")),
                'date' => $date,
                'datebuka' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman,
                'tabelpelamar' => $tabelpelamar,
                'lamaran' => $lamaran,
                'ktp' => $ktp,
                'foto' => $foto,
                'sks' => $sks,
                'skck' => $skck,
                'suratpernyataanbebasparpol' => $suratpernyataanbebasparpol,
                'suratpernyataanbebasdariinstansi' => $suratpernyataanbebasdariinstansi,
                'ijazah' => $ijazah,
                'transkrip' => $transkrip,
                'penyetaraan' => $penyetaraan,
                'akreditasi' => $akreditasi,
                'akreditasiprodi' => $akreditasiprodi,
                'ijazah1' => $ijazah1,
                'transkrip1' => $transkrip1,
                'penyetaraan1' => $penyetaraan1,
                'akreditasi1' => $akreditasi1,
                'akreditasiprodi1' => $akreditasiprodi1,
                'ijazah2' => $ijazah2,
                'transkrip2' => $transkrip2,
                'penyetaraan2' => $penyetaraan2,
                'akreditasi2' => $akreditasi2,
                'akreditasiprodi2' => $akreditasiprodi2,
                'ijazah3' => $ijazah3,
                'transkrip3' => $transkrip3,
                'penyetaraan3' => $penyetaraan3,
                'akreditasi3' => $akreditasi3,
                'akreditasiprodi3' => $akreditasiprodi3,
                'sertifikat' => $sertifikat,
                'statuspelamar' => $statuspelamar,
                'nik' => $nik
            ];
            return $this->load->view('lampiran', $data);
        }
    }

    function addSuratLamaranPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['lamaran']['name'];
        $s = $_FILES['lamaran']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'lamaran', 'nik', 'file_upload', '/assets/file/lamaran/', 'lamaran', $_FILES['lamaran']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addKtpPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $s = $_FILES['ktp']['size'];
        $size = implode("|", $s);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {

            $this->upload_filesgambar($id_pelamar, 'ktp', 'nik', 'file_upload', '/assets/file/ktp/', 'ktp', $_FILES['ktp']);

            //cek sudah masuk belum
            $filektp = $this->Modelpelamar->read('file_upload', ['kode_unik' => $id_pelamar . 'ktp'], null, null)->num_rows();
            if ($filektp == 0) {
                $return = [
                    'return' => 3
                ];

                header('Content-Type: application/json');
                echo json_encode($return);
            } else {
                $return = [
                    'return' => 2
                ];

                header('Content-Type: application/json');
                echo json_encode($return);
            }
        }
    }

    function addFotoPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $s = $_FILES['foto']['size'];
        $size = implode("|", $s);
        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_filesgambar($id_pelamar, 'foto', 'nik', 'file_upload', '/assets/file/foto/', 'foto', $_FILES['foto']);
            //cek sudah masuk belum
            $filefoto = $this->Modelpelamar->read('file_upload', ['kode_unik' => $id_pelamar . 'foto'], null, null)->num_rows();
            if ($filefoto == 0) {
                $return = [
                    'return' => 3
                ];

                header('Content-Type: application/json');
                echo json_encode($return);
            } else {
                $return = [
                    'return' => 2
                ];

                header('Content-Type: application/json');
                echo json_encode($return);
            }
        }
    }

    function addSksPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['sks']['name'];
        $s = $_FILES['sks']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'sks', 'nik', 'file_upload', '/assets/file/sks/', 'sks', $_FILES['sks']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addSkckPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['skck']['name'];
        $s = $_FILES['skck']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'skck', 'nik', 'file_upload', '/assets/file/skck/', 'skck', $_FILES['skck']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addSuratpernyataanbebasparpolPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['suratpernyataanbebasparpol']['name'];
        $s = $_FILES['suratpernyataanbebasparpol']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'suratpernyataanbebasparpol', 'nik', 'file_upload', '/assets/file/suratpernyataanbebasparpol/', 'suratpernyataanbebasparpol', $_FILES['suratpernyataanbebasparpol']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addSuratpernyataanbebasdariinstansiPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['suratpernyataanbebasdariinstansi']['name'];
        $s = $_FILES['suratpernyataanbebasdariinstansi']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'suratpernyataanbebasdariinstansi', 'nik', 'file_upload', '/assets/file/suratpernyataanbebasdariinstansi/', 'suratpernyataanbebasdariinstansi', $_FILES['suratpernyataanbebasdariinstansi']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addIjazahPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['ijazah']['name'];
        $s = $_FILES['ijazah']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'ijazah', 'nik', 'file_upload', '/assets/file/ijazah/', 'ijazah', $_FILES['ijazah']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addTranskripPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['transkrip']['name'];
        $s = $_FILES['transkrip']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'transkrip', 'nik', 'file_upload', '/assets/file/transkrip/', 'transkrip', $_FILES['transkrip']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addPenyetaraanPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['penyetaraan']['name'];
        $s = $_FILES['penyetaraan']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'penyetaraan', 'nik', 'file_upload', '/assets/file/penyetaraan/', 'penyetaraan', $_FILES['penyetaraan']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasiPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi']['name'];
        $s = $_FILES['akreditasi']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasi', 'nik', 'file_upload', '/assets/file/akreditasi/', 'akreditasi', $_FILES['akreditasi']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasiprodiPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi_prodi']['name'];
        $s = $_FILES['akreditasi_prodi']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasiprodi', 'nik', 'file_upload', '/assets/file/akreditasiprodi/', 'akreditasiprodi', $_FILES['akreditasi_prodi']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addIjazah1Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['ijazah1']['name'];
        $s = $_FILES['ijazah1']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'ijazah1', 'nik', 'file_upload', '/assets/file/ijazah1/', 'ijazah1', $_FILES['ijazah1']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addTranskrip1Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['transkrip1']['name'];
        $s = $_FILES['transkrip1']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'transkrip1', 'nik', 'file_upload', '/assets/file/transkrip1/', 'transkrip1', $_FILES['transkrip1']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addPenyetaraan1Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['penyetaraan1']['name'];
        $s = $_FILES['penyetaraan1']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'penyetaraan1', 'nik', 'file_upload', '/assets/file/penyetaraan1/', 'penyetaraan1', $_FILES['penyetaraan1']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasi1Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi1']['name'];
        $s = $_FILES['akreditasi1']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasi1', 'nik', 'file_upload', '/assets/file/akreditasi1/', 'akreditasi1', $_FILES['akreditasi1']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasiprodi1Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi_prodi1']['name'];
        $s = $_FILES['akreditasi_prodi1']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasiprodi1', 'nik', 'file_upload', '/assets/file/akreditasiprodi1/', 'akreditasiprodi1', $_FILES['akreditasi_prodi1']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addIjazah2Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['ijazah2']['name'];
        $s = $_FILES['ijazah2']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'ijazah2', 'nik', 'file_upload', '/assets/file/ijazah2/', 'ijazah2', $_FILES['ijazah2']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addTranskrip2Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['transkrip2']['name'];
        $s = $_FILES['transkrip2']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'transkrip2', 'nik', 'file_upload', '/assets/file/transkrip2/', 'transkrip2', $_FILES['transkrip2']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addPenyetaraan2Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['penyetaraan2']['name'];
        $s = $_FILES['penyetaraan2']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'penyetaraan2', 'nik', 'file_upload', '/assets/file/penyetaraan2/', 'penyetaraan2', $_FILES['penyetaraan2']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasi2Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi2']['name'];
        $s = $_FILES['akreditasi2']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasi2', 'nik', 'file_upload', '/assets/file/akreditasi2/', 'akreditasi2', $_FILES['akreditasi2']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasiprodi2Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi_prodi2']['name'];
        $s = $_FILES['akreditasi_prodi2']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasiprodi2', 'nik', 'file_upload', '/assets/file/akreditasiprodi2/', 'akreditasiprodi2', $_FILES['akreditasi_prodi2']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addIjazah3Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['ijazah3']['name'];
        $s = $_FILES['ijazah3']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'ijazah3', 'nik', 'file_upload', '/assets/file/ijazah3/', 'ijazah3', $_FILES['ijazah3']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addTranskrip3Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['transkrip3']['name'];
        $s = $_FILES['transkrip3']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'transkrip3', 'nik', 'file_upload', '/assets/file/transkrip3/', 'transkrip3', $_FILES['transkrip3']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addPenyetaraan3Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['penyetaraan3']['name'];
        $s = $_FILES['penyetaraan3']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'penyetaraan3', 'nik', 'file_upload', '/assets/file/penyetaraan3/', 'penyetaraan3', $_FILES['penyetaraan3']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasi3Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi3']['name'];
        $s = $_FILES['akreditasi3']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasi3', 'nik', 'file_upload', '/assets/file/akreditasi3/', 'akreditasi3', $_FILES['akreditasi3']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addAkreditasiprodi3Pelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['akreditasi_prodi3']['name'];
        $s = $_FILES['akreditasi_prodi3']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'akreditasiprodi3', 'nik', 'file_upload', '/assets/file/akreditasiprodi3/', 'akreditasiprodi3', $_FILES['akreditasi_prodi3']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function addSertifikatPelamar() {
        $nik = $this->session->userdata('nik');
        $yearnow = (int) date('Y', strtotime('now'));

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;
        $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
        $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
        $id_pelamar = $row->id_pelamar;

        $t = $_FILES['sertifikat']['name'];
        $s = $_FILES['sertifikat']['size'];
        $size = implode("|", $s);
        $ext = implode("|", $t);
        $tipe = pathinfo($ext, PATHINFO_EXTENSION);

        if ($size > 400000) {
            $return = [
                'return' => 4
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else if ($tipe != 'pdf') {
            $return = [
                'return' => 5
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $this->upload_files($id_pelamar, 'sertifikat', 'nik', 'file_upload', '/assets/file/sertifikat/', 'sertifikat', $_FILES['sertifikat']);
            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function resume() {
        $nik = $this->session->userdata('nik');
        if (empty($nik)) {
            redirect(site_url('dashboard'));
        } else {
            $yearnow = (int) date('Y', strtotime('now'));

            $date = date("Y-m-d H:i:s");
            $dateawal = $this->Modelpelamar->readTglbuka()->row();
            $dateakhir = $this->Modelpelamar->readTgltutup()->row();
            $row = $this->Modelpelamar->readTgl()->row();
            $datepengumuman = $row->tgl_umum_adm;

            $agama = $this->Modelpelamar->read('tb_agama', null, null, null)->result();
            $value = $this->Modelpelamar->readAgama($nik)->row();
            $pelamaragama = $value->agama;
            $pilihanagama = $this->Modelpelamar->pilihanAgama($pelamaragama)->result();

            $datastatuskawin = $this->Modelpelamar->read('tb_status_kawin', null, null, null)->result();
            $statuskawinpelamar = $this->Modelpelamar->readStatusKawin($nik)->row();
            $status_kawin = $statuskawinpelamar->status_menikah;
            $pilihanstatuskawin = $this->Modelpelamar->pilihanStatusKawin($status_kawin)->result();

            $tabelpelamar = $this->Modelpelamar->readDataPelamar($nik)->row();
            $formasi = $tabelpelamar->id_kualifikasi;
            $pilihanformasi = $this->Modelpelamar->pilihanFormasi($formasi)->result();
            $pilihanformasipelamar = $this->Modelpelamar->getPilihanFormasi($formasi)->row();
            $formasipelamar = $this->Modelpelamar->getFormasi($formasi)->row();

            $statuspelamar = $tabelpelamar->status;

            $pend_terakhir = $this->Modelpelamar->pilihanPendidikanTerakhir($nik)->row();
            if (!empty($pend_terakhir->id)) {
                $idijazah = $pend_terakhir->id;
                $dataijazah = $this->Modelpelamar->dataPilihanPendidikanTerakhir($idijazah)->result();
                $datatingkatijazah = $this->Modelpelamar->dataPilihanPendidikanTerakhir($idijazah)->row();
            } else {
                $dataijazah = null;
            }
            if (!empty($idijazah)) {
                $jenjangpelamar = $this->Modelpelamar->read('ijazah', ['id' => $idijazah], null, null)->row();
            } else {
                $jenjangpelamar = '';
            }

            $valuepend_terakhir = $this->Modelpelamar->readDataPelamar($nik)->row();
            $pend_terakhir = $valuepend_terakhir->pendidikan_terakhir;
            $valuetingkatijazah = $this->Modelpelamar->read('ijazah', ['id' => $pend_terakhir], null, null)->row();
            if (isset($valuetingkatijazah)) {
                $datatingkatijazah = $valuetingkatijazah->tingkat;
            } else {
                $datatingkatijazah = '5';
            }
            $row = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null)->row();
            $id_pelamar = $row->id_pelamar;
            $lamaran = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'lamaran'], null, null)->row();
            $ktp = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ktp'], null, null)->row();
            $foto = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'foto'], null, null)->row();
            $sks = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sks'], null, null)->row();
            $skck = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'skck'], null, null)->row();
            $suratpernyataanbebasparpol = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasparpol'], null, null)->row();
            $suratpernyataanbebasdariinstansi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'suratpernyataanbebasdariinstansi'], null, null)->row();
            $ijazah = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah'], null, null)->row();
            $transkrip = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip'], null, null)->row();
            $penyetaraan = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan'], null, null)->row();
            $akreditasi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi'], null, null)->row();
            $akreditasiprodi = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi'], null, null)->row();
            $ijazah1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah1'], null, null)->row();
            $transkrip1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip1'], null, null)->row();
            $penyetaraan1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan1'], null, null)->row();
            $akreditasi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi1'], null, null)->row();
            $akreditasiprodi1 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi1'], null, null)->row();
            $ijazah2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah2'], null, null)->row();
            $transkrip2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip2'], null, null)->row();
            $penyetaraan2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan2'], null, null)->row();
            $akreditasi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi2'], null, null)->row();
            $akreditasiprodi2 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi2'], null, null)->row();
            $ijazah3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'ijazah3'], null, null)->row();
            $transkrip3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'transkrip3'], null, null)->row();
            $penyetaraan3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'penyetaraan3'], null, null)->row();
            $akreditasi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasi3'], null, null)->row();
            $akreditasiprodi3 = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'akreditasiprodi3'], null, null)->row();
            $sertifikat = $this->Modelpelamar->read('file_upload', ['nik' => $id_pelamar, 'kode_unik' => $id_pelamar . 'sertifikat'], null, null)->row();

            $tabel = $this->Modelpelamar->readDataPelamar($nik)->row();
            $data = [
                'title' => 'REKRUTMEN SDM UNDIP',
                'time' => date('l, d-m-Y', strtotime("now")),
                'date' => $date,
                'datebuka' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman,
                'nik' => $nik,
                'agama' => $agama,
                'readagama' => $value,
                'pilihanagama' => $pilihanagama,
                'datastatuskawin' => $datastatuskawin,
                'status_kawin' => $status_kawin,
                'pilihanstatuskawin' => $pilihanstatuskawin,
                'tabelijazah' => $this->Modelpelamar->read('ijazah', ['status_aktif' => '1'], null, null),
                'datapilihanformasi' => $pilihanformasi,
                'pilihanformasipelamar' => $pilihanformasipelamar,
                'formasipelamar' => $formasipelamar,
                'pilihanpendidikanterakhir' => $pend_terakhir,
                'datajenjang' => $dataijazah,
                'jenjangpelamar' => $jenjangpelamar,
                'datatingkatijazah' => $datatingkatijazah,
                'tabelpelamar' => $tabelpelamar,
                'lamaran' => $lamaran,
                'ktp' => $ktp,
                'foto' => $foto,
                'sks' => $sks,
                'skck' => $skck,
                'suratpernyataanbebasparpol' => $suratpernyataanbebasparpol,
                'suratpernyataanbebasdariinstansi' => $suratpernyataanbebasdariinstansi,
                'ijazah' => $ijazah,
                'transkrip' => $transkrip,
                'penyetaraan' => $penyetaraan,
                'akreditasi' => $akreditasi,
                'akreditasiprodi' => $akreditasiprodi,
                'ijazah1' => $ijazah1,
                'transkrip1' => $transkrip1,
                'penyetaraan1' => $penyetaraan1,
                'akreditasi1' => $akreditasi1,
                'akreditasiprodi1' => $akreditasiprodi1,
                'ijazah2' => $ijazah2,
                'transkrip2' => $transkrip2,
                'penyetaraan2' => $penyetaraan2,
                'akreditasi2' => $akreditasi2,
                'akreditasiprodi2' => $akreditasiprodi2,
                'ijazah3' => $ijazah3,
                'transkrip3' => $transkrip3,
                'penyetaraan3' => $penyetaraan3,
                'akreditasi3' => $akreditasi3,
                'akreditasiprodi3' => $akreditasiprodi3,
                'sertifikat' => $sertifikat,
                'statuspelamar' => $statuspelamar,
                'tabel' => $tabel
            ];
            return $this->load->view('resume', $data);
        }
    }

    public function submitData() {
        $nik = $this->session->userdata('nik');
        $tgl = date("Y-m-d H:i:s");

        $data = [
            'tgl_daftar' => $tgl,
            'pernyataan' => 'Dengan ini menyatakan bahwa data yang saya isikan adalah yang sebenar-benarnya. Saya setuju dengan segala ketentuan yang ditetapkan oleh panitia penerimaan Universitas Diponegoro dan bersedia menerima sanksi pembatalan kelulusan apabila data yang isikan tidak benar.',
            'jwb_pernyataan' => 'setuju',
            'status' => 3
        ];

        $this->Modelpelamar->update(['ktp' => $nik], 'tb_pelamar', $data);
    }

    function preview_file($param) {
        if ($this->session->userdata('nik')) {
            $data = $this->encryption->decrypt(base64_decode($param));
            $html = '<iframe src="https://rekrutmen.undip.ac.id/' . $data . '" style="border:none; width: 100%; height: 100%"></iframe>';
            echo $html;
        } else {
            redirect('login');
        }
    }

    // public function getTabelResume(){
    // $nik = $this->session->userdata('nik');
    // $row = $this->Modelpelamar->readTgl()->row();
    // $datepengumuman = $row->tgl_umum_adm;
    // $datepengumumanskdskb = $row->tgl_pengumuman_skdskb;
    // $datepengumumanfinal = $row->tgl_final;
    // $sorting = $this->Modelpelamar->readKualifikasi($nik);
    // $data = [
    // 'tabel' => $sorting,
    // 'nik' => $nik
    // ];
    // $this->load->view('tabel-resume',$data);
    // }
    // public function addDataPelamar(){
    // $tgl_brks = date("d-m-Y H:i:s");
    // $nik = $this->session->userdata('nik');
    // $k = $this->input->post('kualifikasi');
    // $p = $this->input->post('pendidikan');
    // $tahun = (int)date('Y', strtotime('now'));
    // $id = $this->Modelpelamar->read('tb_pelamar', ['ktp' => $nik], null, null);
    // $row = $this->Modelpelamar->idnik($nik)->row();
    // $idno = $row->id_pelamar;
    // $last = $this->Modelpelamar->readnomorurut($nik)->row();
    // $nourut = $last->id_pelamar;
    // $no = $nourut + 1;
    // $jmlpelamar_formasi = $this->Modelpelamar->readformasipelamar($k)->num_rows()+1;
    // $urutperkualifikasi =  sprintf("%'.04d\n", $jmlpelamar_formasi);
    // $cekpelamar = $this->Modelpelamar->read('tb_pelamar', null, null, null)->num_rows();
    // $no_pendaftaran = $this->Modelpelamar->no_pendaftaran();
    // $data = [
    // 'no_pendaftaran' => $tahun.$k.$p.$urutperkualifikasi,
    // // 'no_pendaftaran' => $tahun.$k.$p.sprintf("%05d", $no_pendaftaran),
    // 'ktp' => $nik,
    // 'id_kualifikasi' => $this->input->post('kualifikasi'),
    // 'gelar_depan' => $this->input->post('glrdpn'),
    // 'nama_pelamar' => $this->input->post('nama'),
    // 'gelar_belakang' => $this->input->post('glrblkg'),
    // 'tempat_lahir' => $this->input->post('tmpt_lahir'),
    // 'tanggal_lahir' => $this->input->post('tgl_lahir'),
    // // 'email' => $this->input->post('email'),
    // 'jenis_kelamin' => $this->input->post('jenis_kelamin'),
    // 'status_menikah' => $this->input->post('status_menikah'),
    // 'agama' => $this->input->post('agama'),
    // 'no_telepon' => $this->input->post('no_telepon'),
    // 'alamat' => $this->input->post('alamat'),
    // 'pendidikan' => $this->input->post('pendidikan'),
    // 'asal_sekolah' => $this->input->post('asal_sekolah'),
    // 'nm_kampus' => $this->input->post('nm_kampus'),
    // 'akreditasi_kampus' => $this->input->post('akreditasi_kampus'),
    // 'ipk' => $this->input->post('ipk'),
    // 'prodi' => $this->input->post('jurusan'),
    // 'thn_lulus' => $this->input->post('thn_lulus'),
    // 'skripsi' => $this->input->post('skripsi'),
    // 'akreditasi_prodi' => $this->input->post('akreditasi_jurusan'),
    // 'pendidikan1' => $this->input->post('pendidikan1'),
    // 'asal_sekolah1' => $this->input->post('asal_sekolah1'),
    // 'nm_kampus1' => $this->input->post('nm_kampus1'),
    // 'akreditasi_kampus1' => $this->input->post('akreditasi_kampus1'),
    // 'ipk1' => $this->input->post('ipk1'),
    // 'prodi1' => $this->input->post('jurusan1'),
    // 'thn_lulus1' => $this->input->post('thn_lulus1'),
    // 'skripsi1' => $this->input->post('skripsi1'),
    // 'akreditasi_prodi1' => $this->input->post('akreditasi_jurusan1'),
    // 'pendidikan2' => $this->input->post('pendidikan2'),
    // 'asal_sekolah2' => $this->input->post('asal_sekolah2'),
    // 'nm_kampus2' => $this->input->post('nm_kampus2'),
    // 'akreditasi_kampus2' => $this->input->post('akreditasi_kampus2'),
    // 'ipk2' => $this->input->post('ipk2'),
    // 'prodi2' => $this->input->post('jurusan2'),
    // 'akreditasi_prodi2' => $this->input->post('akreditasi_jurusan2'),
    // 'thn_lulus2' => $this->input->post('thn_lulus2'),
    // 'tesis' => $this->input->post('tesis'),
    // 'pendidikan3' => $this->input->post('pendidikan3'),
    // 'asal_sekolah3' => $this->input->post('asal_sekolah3'),
    // 'nm_kampus3' => $this->input->post('nm_kampus3'),
    // 'akreditasi_kampus3' => $this->input->post('akreditasi_kampus3'),
    // 'ipk3' => $this->input->post('ipk3'),
    // 'prodi3' => $this->input->post('jurusan3'),
    // 'akreditasi_prodi3' => $this->input->post('akreditasi_jurusan3'),
    // 'thn_lulus3' => $this->input->post('thn_lulus3'),
    // 'desertasi' => $this->input->post('desertasi'),
    // 'toefl' => $this->input->post('toefl'),
    // 'tgl_sert_terbit' => $this->input->post('tgl_sert_terbit'),
    // 'tgl_daftar' => $tgl_brks,
    // 'pernyataan'=>'Dengan ini menyatakan bahwa seluruh data yang saya isikan adalah benar dan dapat dipertanggungjawabkan serta bersedia dibatalkan/gugur bila memberikan data yg tidak sesuai/manipulasi data setelah diterima sebagai Pegawai.',
    // 'jwb_pernyataan'=>'setuju',
    // 'status' => 3
    // ];
    // $this->Modelpelamar->update(['ktp'=>$nik], 'tb_pelamar', $data);
    // $id = $this->Modelpelamar->read('tb_pelamar',['ktp' => $nik],'id_pelamar', 'DESC')->first_row()->id_pelamar;
    // tidak dipakai
    // $this->upload_files($nourut,'lamaran','nik','file_upload','/assets/file/lamaran/','lamaran', $_FILES['lamaran']);
    // $this->upload_files($nourut,'foto','nik','file_upload','/assets/file/foto/','foto', $_FILES['foto']);
    // $this->upload_files($nourut,'ktp','nik','file_upload','/assets/file/ktp/','ktp', $_FILES['ktp']);
    // $this->upload_files($nourut,'sks','nik','file_upload','/assets/file/sks/','sks', $_FILES['sks']);
    // $this->upload_files($nourut,'skck','nik','file_upload','/assets/file/skck/','skck', $_FILES['skck']);
    // $this->upload_files($nourut,'ijazah','nik','file_upload','/assets/file/ijazah/','ijazah', $_FILES['ijazah']);
    // $this->upload_files($nourut,'akreditasi','nik','file_upload','/assets/file/akreditasi/','akreditasi', $_FILES['akreditasi']);
    // $this->upload_files($nourut,'akreditasiprodi','nik','file_upload','/assets/file/akreditasiprodi/','akreditasiprodi', $_FILES['akreditasi_prodi']);
    // $this->upload_files($nourut,'ijazah2','nik','file_upload','/assets/file/ijazah2/','ijazah2', $_FILES['ijazah2']);
    // $this->upload_files($nourut,'akreditasi2','nik','file_upload','/assets/file/akreditasi2/','akreditasi2', $_FILES['akreditasi2']);
    // $this->upload_files($nourut,'akreditasiprodi2','nik','file_upload','/assets/file/akreditasiprodi2/','akreditasiprodi2', $_FILES['akreditasi_prodi2']);
    // $this->upload_files($nourut,'ijazah3','nik','file_upload','/assets/file/ijazah3/','ijazah3', $_FILES['ijazah3']);
    // $this->upload_files($nourut,'akreditasi3','nik','file_upload','/assets/file/akreditasi3/','akreditasi3', $_FILES['akreditasi3']);
    // $this->upload_files($nourut,'akreditasiprodi3','nik','file_upload','/assets/file/akreditasiprodi3/','akreditasiprodi3', $_FILES['akreditasi_prodi3']);
    // batas tidak dipakai
    // $this->upload_files($idno,'lamaran','nik','file_upload','/assets/file/lamaran/','lamaran', $_FILES['lamaran']);
    // $this->upload_files($idno,'foto','nik','file_upload','/assets/file/foto/','foto', $_FILES['foto']);
    // $this->upload_files($idno,'ktp','nik','file_upload','/assets/file/ktp/','ktp', $_FILES['ktp']);
    // $this->upload_files($idno,'sks','nik','file_upload','/assets/file/sks/','sks', $_FILES['sks']);
    // $this->upload_files($idno,'skck','nik','file_upload','/assets/file/skck/','skck', $_FILES['skck']);
    // $this->upload_files($idno,'ijazah','nik','file_upload','/assets/file/ijazah/','ijazah', $_FILES['ijazah']);
    // $this->upload_files($idno,'penyetaraan','nik','file_upload','/assets/file/penyetaraan/','penyetaraan', $_FILES['penyetaraan']);
    // $this->upload_files($idno,'akreditasi','nik','file_upload','/assets/file/akreditasi/','akreditasi', $_FILES['akreditasi']);
    // $this->upload_files($idno,'akreditasiprodi','nik','file_upload','/assets/file/akreditasiprodi/','akreditasiprodi', $_FILES['akreditasi_prodi']);
    // $this->upload_files($idno,'ijazah1','nik','file_upload','/assets/file/ijazah1/','ijazah1', $_FILES['ijazah1']);
    // $this->upload_files($idno,'penyetaraan1','nik','file_upload','/assets/file/penyetaraan1/','penyetaraan1', $_FILES['penyetaraan1']);
    // $this->upload_files($idno,'akreditasi1','nik','file_upload','/assets/file/akreditasi1/','akreditasi1', $_FILES['akreditasi1']);
    // $this->upload_files($idno,'akreditasiprodi1','nik','file_upload','/assets/file/akreditasiprodi1/','akreditasiprodi1', $_FILES['akreditasi_prodi1']);
    // $this->upload_files($idno,'ijazah2','nik','file_upload','/assets/file/ijazah2/','ijazah2', $_FILES['ijazah2']);
    // $this->upload_files($idno,'penyetaraan2','nik','file_upload','/assets/file/penyetaraan2/','penyetaraan2', $_FILES['penyetaraan2']);
    // $this->upload_files($idno,'akreditasi2','nik','file_upload','/assets/file/akreditasi2/','akreditasi2', $_FILES['akreditasi2']);
    // $this->upload_files($idno,'akreditasiprodi2','nik','file_upload','/assets/file/akreditasiprodi2/','akreditasiprodi2', $_FILES['akreditasi_prodi2']);
    // $this->upload_files($idno,'ijazah3','nik','file_upload','/assets/file/ijazah3/','ijazah3', $_FILES['ijazah3']);
    // $this->upload_files($idno,'penyetaraan3','nik','file_upload','/assets/file/penyetaraan3/','penyetaraan3', $_FILES['penyetaraan3']);
    // $this->upload_files($idno,'akreditasi3','nik','file_upload','/assets/file/akreditasi3/','akreditasi3', $_FILES['akreditasi3']);
    // $this->upload_files($idno,'akreditasiprodi3','nik','file_upload','/assets/file/akreditasiprodi3/','akreditasiprodi3', $_FILES['akreditasi_prodi3']);
    // $this->upload_files($idno,'sertifikat','nik','file_upload','/assets/file/sertifikat/','sertifikat', $_FILES['sertifikat']);
    // $this->upload_files($idno,'suratpernyataanbebasparpol','nik','file_upload','/assets/file/suratpernyataanbebasparpol/','suratpernyataanbebasparpol', $_FILES['suratpernyataanbebasparpol']);
    // $return = [
    // 'return' => 2
    // ];
    // header('Content-Type: application/json');
    // echo json_encode($return);
    // }

    public function cetak() {
        $nik = $this->session->userdata('nik');
        $id = (int) $this->input->get("id");
        $query = $this->Modelpelamar->readkongsi($id)->row();
        $tgl_lahir = $query->tanggal_lahir;
        $nik_pelamar = $query->ktp;

        if ($nik == $nik_pelamar) {
            $a['hasil'] = $this->Modelpelamar->readkongsi($id)->row();
            $a['tabel_file'] = $this->Modelpelamar->readFilekartu($id);
            $this->load->view('cetak-formulir', $a);
        } else {
            return redirect('login');
        }
    }

    public function cetaklis() {
        $nik = $this->session->userdata('nik');
        $id = (int) $this->input->get("id");
        $query = $this->Modelpelamar->readkongsi($id)->row();
        $tgl_lahir = $query->tanggal_lahir;
        $nik_pelamar = $query->ktp;

        $ceklamaran = $this->Modelpelamar->ceklamaran($id)->num_rows();
        if ($ceklamaran > 0) {
            $lamaran = 'Ada';
        } else {
            $lamaran = 'Tidak ada';
        }
        $cekfoto = $this->Modelpelamar->cekfoto($id)->num_rows();
        if ($cekfoto > 0) {
            $foto = 'Ada';
        } else {
            $foto = 'Tidak ada';
        }
        $cekktp = $this->Modelpelamar->cekktp($id)->num_rows();
        if ($cekktp > 0) {
            $ktp = 'Ada';
        } else {
            $ktp = 'Tidak ada';
        }
        $ceksks = $this->Modelpelamar->ceksks($id)->num_rows();
        if ($ceksks > 0) {
            $sks = 'Ada';
        } else {
            $sks = 'Tidak ada';
        }
        $cekskck = $this->Modelpelamar->cekskck($id)->num_rows();
        if ($cekskck > 0) {
            $skck = 'Ada';
        } else {
            $skck = 'Tidak ada';
        }
        $cekijazah = $this->Modelpelamar->cekijazah($id)->num_rows();
        if ($cekijazah > 0) {
            $ijazah = 'Ada';
        } else {
            $ijazah = 'Tidak ada';
        }
        $cekakreditasi = $this->Modelpelamar->cekakreditasi($id)->num_rows();
        if ($cekakreditasi > 0) {
            $akreditasi = 'Ada';
        } else {
            $akreditasi = 'Tidak ada';
        }
        $cekakreditasi_prodi = $this->Modelpelamar->cekakreditasi_prodi($id)->num_rows();
        if ($cekakreditasi_prodi > 0) {
            $akreditasi_prodi = 'Ada';
        } else {
            $akreditasi_prodi = 'Tidak ada';
        }
        $cekijazah2 = $this->Modelpelamar->cekijazah2($id)->num_rows();
        if ($cekijazah2 > 0) {
            $ijazah2 = 'Ada';
        } else {
            $ijazah2 = 'Tidak ada';
        }
        $cekakreditasi2 = $this->Modelpelamar->cekakreditasi2($id)->num_rows();
        if ($cekakreditasi2 > 0) {
            $akreditasi2 = 'Ada';
        } else {
            $akreditasi2 = 'Tidak ada';
        }
        $cekakreditasi_prodi2 = $this->Modelpelamar->cekakreditasi_prodi2($id)->num_rows();
        if ($cekakreditasi_prodi2 > 0) {
            $akreditasi_prodi2 = 'Ada';
        } else {
            $akreditasi_prodi2 = 'Tidak ada';
        }
        $cekijazah3 = $this->Modelpelamar->cekijazah3($id)->num_rows();
        if ($cekijazah3 > 0) {
            $ijazah3 = 'Ada';
        } else {
            $ijazah3 = 'Tidak ada';
        }
        $cekakreditasi3 = $this->Modelpelamar->cekakreditasi3($id)->num_rows();
        if ($cekakreditasi3 > 0) {
            $akreditasi3 = 'Ada';
        } else {
            $akreditasi3 = 'Tidak ada';
        }
        $cekakreditasi_prodi3 = $this->Modelpelamar->cekakreditasi_prodi3($id)->num_rows();
        if ($cekakreditasi_prodi3 > 0) {
            $akreditasi_prodi3 = 'Ada';
        } else {
            $akreditasi_prodi3 = 'Tidak ada';
        }

        $pelamar = $this->Modelpelamar->Pelamar($id)->row();
        $nama = $pelamar->nama_pelamar;

        if ($nik == $nik_pelamar) {
            $a['lamaran'] = $lamaran;
            $a['foto'] = $foto;
            $a['ktp'] = $ktp;
            $a['sks'] = $sks;
            $a['skck'] = $skck;
            $a['ijazah'] = $ijazah;
            $a['akreditasi'] = $akreditasi;
            $a['akreditasi_prodi'] = $akreditasi_prodi;
            $a['ijazah2'] = $ijazah2;
            $a['akreditasi2'] = $akreditasi2;
            $a['akreditasi_prodi2'] = $akreditasi_prodi2;
            $a['ijazah3'] = $ijazah3;
            $a['akreditasi3'] = $akreditasi3;
            $a['akreditasi_prodi3'] = $akreditasi_prodi3;
            $a['nama'] = $nama;

            $this->load->view('cetak-ceklis', $a);
        } else {
            return redirect('login');
        }
    }

    function hitungJmlLolos() {
        //ambil id kualifikasi
        $idbhnverifikasi = $this->input->get("id");

        //get data bahan kualifikasi
        $dataidkualifikasi = $this->Modelpelamar->read('tb_bahanverifikasi', ['id_bhnverifikasi' => $idbhnverifikasi], null, null)->row();
        $id_kualifikasi = $dataidkualifikasi->id_kualifikasi;
        $kode_kualifikasi = $dataidkualifikasi->kode_kualifikasi;
        $min_akreditasipt = $dataidkualifikasi->min_akreditasipt;
        $min_akreditasips = $dataidkualifikasi->min_akreditasips;
        $ipk = $dataidkualifikasi->ipk;
        $min_akreditasipt1 = $dataidkualifikasi->min_akreditasipt1;
        $min_akreditasips1 = $dataidkualifikasi->min_akreditasips1;
        $ipk1 = $dataidkualifikasi->ipk1;
        $min_akreditasipt2 = $dataidkualifikasi->min_akreditasipt2;
        $min_akreditasips2 = $dataidkualifikasi->min_akreditasips2;
        $ipk2 = $dataidkualifikasi->ipk2;
        $min_akreditasipt3 = $dataidkualifikasi->min_akreditasipt3;
        $min_akreditasips3 = $dataidkualifikasi->min_akreditasips3;
        $ipk3 = $dataidkualifikasi->ipk3;
        $skor_itp = $dataidkualifikasi->skor_itp;
        $skor_ielts = $dataidkualifikasi->skor_ielts;
        $skor_lain = $dataidkualifikasi->skor_lain;
        $jml_lolos = $dataidkualifikasi->jml_lolos;
        $jml_tidaklolos = $dataidkualifikasi->jml_lolos;

        //tambah kolom status admin pada tb_pelamar saat verifikasi nnti update statusnya
        //ambil status tsb utk matching (komen dibawah)
        //matching dengan data pelamar yang berkas lamaran dkk nya berstatus sesuai
        $datapelamarlolosadminbyid = $this->Modelpelamar->hitungJmlLolosAdministrasi($id_kualifikasi)->num_rows();

        $jml_pelamarbyidkualifikasi = $this->Modelpelamar->read('tb_pelamar', ['id_kualifikasi' => $id_kualifikasi], null, null)->num_rows();
        $jml_tidaklolos = $jml_pelamarbyidkualifikasi - $datapelamarlolosadminbyid;
        $data = [
            'jml_total' => $jml_pelamarbyidkualifikasi,
            'jml_lolos' => $datapelamarlolosadminbyid,
            'jml_tidaklolos' => $jml_tidaklolos
        ];

        $this->db->where('id_bhnverifikasi', $idbhnverifikasi);
        $this->db->where('status_bahan', 1);
        $this->db->update('tb_bahanverifikasi', $data);
    }

    function verifikasi() {
        $keterangan = $this->input->post("keterangan");
        $id = $this->input->post("id");
        // $nik = $this->input->post("nik[]");
        // $kesesuaian = $this->input->post("kesesuaian[]");
        //update beberapa id langsung berdasarkan nik. lihat db file_upload
        // $value = array();
        //     for($i=0; $i<count($nik); $i++){
        //         if (!isset($kesesuaian[$i])) {
        //             $kesesuaian[$i] = '';
        //         }
        //         $value[$i] = array(
        //             'id_file' => $nik[$i],
        //             'kesesuaian' => $kesesuaian[$i]
        //         );
        //     }
        // $this->db->update_batch('file_upload', $value, 'id_file');

        $data = array(
            'keterangan_berkas' => $keterangan
        );

        $query = $this->Modelpelamar->update(['id_pelamar' => $id], 'tb_pelamar', $data);

        // $query = $this->db->query("update tb_pelamar set keterangan_berkas = '$keterangan' where id_pelamar = '$id' ");
        echo json_encode(array('data' => $query));
    }

    //verifikasi pada icon i tabel admin
    function verifikasi1() {
        $nik = $this->input->post("nik[]");
        $kesesuaian = $this->input->post("kesesuaian[]");
        $status = $this->input->post("status");
        $keterangan = $this->input->post("keterangan");
        $id = $this->input->post("id");
        $verifikator = $this->session->userdata('nik');

        $data = array(
            'keterangan_berkas' => $keterangan,
            'status' => $status,
            'verifikator' => $verifikator
        );

        $this->db->where('id_pelamar', $id);
        $this->db->update('tb_pelamar', $data);

        $return = [
            'return' => 2
        ];

        header('Content-Type: application/json');
        echo json_encode($return);
    }

    function verifikasi2() {
        $nik = $this->session->userdata('nik');
        if (empty($nik)) {
            redirect('login');
        } else {
            $status = $this->input->post("status");
            $keterangan = $this->input->post("keterangan");
            $id = $this->input->post("id");
            $id_pelamardataverif = $this->Modelpelamar->read('tb_dataverifikasi', ['id_pelamardataverifikasi' => $id], null, null)->num_rows();
            $tabelpelamar = $this->Modelpelamar->read('tb_pelamar', ['id_pelamar' => $id], null, null)->row();
            $asal_sekolah = $tabelpelamar->asal_sekolah;
            $asal_sekolah1 = $tabelpelamar->asal_sekolah1;
            $asal_sekolah2 = $tabelpelamar->asal_sekolah2;
            $asal_sekolah3 = $tabelpelamar->asal_sekolah3;

            $verif_lamaran = $this->input->post("verif_lamaran");
            $verif_ktp = $this->input->post("verif_ktp");
            $verif_foto = $this->input->post("verif_foto");
            $verif_sks = $this->input->post("verif_sks");
            $verif_skck = $this->input->post("verif_skck");
            $verif_suratpernyataanbebasparpol = $this->input->post("verif_suratpernyataanbebasparpol");
            $verif_suratpernyataanbebasdariinstansi = $this->input->post("verif_suratpernyataanbebasdariinstansi");

            //verifikator input ulang data2 peserta saja(?)
            $verif_ijazah = $this->input->post("verif_ijazah");
            $verifikator_ijazah = $this->input->post("verifikator_ijazah");
            if ($verif_ijazah == "Tidak Ada") {
                $verifikatorijazah = $verifikator_ijazah;
            } else if ($verif_ijazah == "Tidak Sesuai dengan kategori file") {
                $verifikatorijazah = $verifikator_ijazah;
            } else {
                if (!empty($verifikator_ijazah)) {
                    $verifikatorijazah = $verifikator_ijazah;
                } else {
                    $verifikatorijazah = $tabelpelamar->prodi;
                }
            }

            $verif_transkrip = $this->input->post("verif_transkrip");
            $verifikator_transkrip = $this->input->post("verifikator_transkrip");
            if ($verif_transkrip == "Tidak Ada") {
                $verifikatortranskrip = $verifikator_transkrip;
            } else if ($verif_transkrip == "Tidak Sesuai dengan kategori file") {
                $verifikatortranskrip = $verifikator_transkrip;
            } else {
                if (!empty($verifikator_transkrip)) {
                    $verifikatortranskrip = $verifikator_transkrip;
                } else {
                    $verifikatortranskrip = $tabelpelamar->ipk;
                }
            }

            $verif_akreditasi = $this->input->post("verif_akreditasi");
            $verifikator_akreditasi = $this->input->post("verifikator_akreditasi");
            if ($verif_akreditasi == "Tidak Ada") {
                $verifikatorakreditasi = $verifikator_akreditasi;
                $verifikator_akreditasisaatlulus = $this->input->post("verifikator_akreditasisaatlulus");
            } else if ($verif_akreditasi == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasi = $verifikator_akreditasi;
                $verifikator_akreditasisaatlulus = $this->input->post("verifikator_akreditasisaatlulus");
            } else {
                if (!empty($verifikator_akreditasi)) {
                    $verifikatorakreditasi = $verifikator_akreditasi;
                    $verifikator_akreditasisaatlulus = $this->input->post("verifikator_akreditasisaatlulus");
                } else {
                    $verifikatorakreditasi = $tabelpelamar->akreditasi_kampus;
                    $verifikator_akreditasisaatlulus = $tabelpelamar->akreditasi_kampus;
                }
            }

            $verif_akreditasiprodi = $this->input->post("verif_akreditasiprodi");
            $verifikator_akreditasiprodi = $this->input->post("verifikator_akreditasiprodi");
            if ($verif_akreditasiprodi == "Tidak Ada") {
                $verifikatorakreditasiprodi = $verifikator_akreditasiprodi;
                $verifikator_akreditasiprodisaatlulus = $this->input->post("verifikator_akreditasiprodisaatlulus");
            } else if ($verif_akreditasiprodi == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasiprodi = $verifikator_akreditasiprodi;
                $verifikator_akreditasiprodisaatlulus = $this->input->post("verifikator_akreditasiprodisaatlulus");
            } else {
                if (!empty($verifikator_akreditasiprodi)) {
                    $verifikatorakreditasiprodi = $verifikator_akreditasiprodi;
                    $verifikator_akreditasiprodisaatlulus = $this->input->post("verifikator_akreditasiprodisaatlulus");
                } else {
                    $verifikatorakreditasiprodi = $tabelpelamar->akreditasi_prodi;
                    $verifikator_akreditasiprodisaatlulus = $tabelpelamar->akreditasi_prodi;
                }
            }

            $verif_penyetaraan = $this->input->post("verif_penyetaraan");
            $verifikator_penyetaraan = $this->input->post("verifikator_penyetaraan");
            if ($verif_penyetaraan == "Tidak Ada") {
                $verifikatorpenyetaraan = $verifikator_penyetaraan;
            } else if ($verif_penyetaraan == "Tidak Sesuai dengan kategori file") {
                $verifikatorpenyetaraan = $verifikator_penyetaraan;
            } else {
                if (!empty($verifikator_penyetaraan)) {
                    $verifikatorpenyetaraan = $verifikator_penyetaraan;
                } else {
                    $verifikatorpenyetaraan = $tabelpelamar->nomor_penyetaraan;
                }
            }

            $verif_ijazah1 = $this->input->post("verif_ijazah1");
            $verifikator_ijazah1 = $this->input->post("verifikator_ijazah1");
            if ($verif_ijazah1 == "Tidak Ada") {
                $verifikatorijazah1 = $verifikator_ijazah1;
            } else if ($verif_ijazah1 == "Tidak Sesuai dengan kategori file") {
                $verifikatorijazah1 = $verifikator_ijazah1;
            } else {
                if (!empty($verifikator_ijazah1)) {
                    $verifikatorijazah1 = $verifikator_ijazah1;
                } else {
                    $verifikatorijazah1 = $tabelpelamar->prodi1;
                }
            }

            $verif_transkrip1 = $this->input->post("verif_transkrip1");
            $verifikator_transkrip1 = $this->input->post("verifikator_transkrip1");
            if ($verif_transkrip1 == "Tidak Ada") {
                $verifikatortranskrip1 = $verifikator_transkrip1;
            } else if ($verif_transkrip1 == "Tidak Sesuai dengan kategori file") {
                $verifikatortranskrip1 = $verifikator_transkrip1;
            } else {
                if (!empty($verifikator_transkrip1)) {
                    $verifikatortranskrip1 = $verifikator_transkrip1;
                } else {
                    $verifikatortranskrip1 = $tabelpelamar->ipk1;
                }
            }

            $verif_akreditasi1 = $this->input->post("verif_akreditasi1");
            $verifikator_akreditasi1 = $this->input->post("verifikator_akreditasi1");
            if ($verif_akreditasi1 == "Tidak Ada") {
                $verifikatorakreditasi1 = $verifikator_akreditasi1;
                $verifikator_akreditasi1saatlulus = $this->input->post("verifikator_akreditasi1saatlulus");
            } else if ($verif_akreditasi1 == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasi1 = $verifikator_akreditasi1;
                $verifikator_akreditasi1saatlulus = $this->input->post("verifikator_akreditasi1saatlulus");
            } else {
                if (!empty($verifikator_akreditasi1)) {
                    $verifikatorakreditasi1 = $verifikator_akreditasi1;
                    $verifikator_akreditasi1saatlulus = $this->input->post("verifikator_akreditasi1saatlulus");
                } else {
                    $verifikatorakreditasi1 = $tabelpelamar->akreditasi_kampus1;
                    $verifikator_akreditasi1saatlulus = $tabelpelamar->akreditasi_kampus1;
                }
            }

            $verif_akreditasiprodi1 = $this->input->post("verif_akreditasiprodi1");
            $verifikator_akreditasiprodi1 = $this->input->post("verifikator_akreditasiprodi1");
            if ($verif_akreditasiprodi1 == "Tidak Ada") {
                $verifikatorakreditasiprodi1 = $verifikator_akreditasiprodi1;
                $verifikator_akreditasiprodi1saatlulus = $this->input->post("verifikator_akreditasiprodi1saatlulus");
            } else if ($verif_akreditasiprodi1 == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasiprodi1 = $verifikator_akreditasiprodi1;
                $verifikator_akreditasiprodi1saatlulus = $this->input->post("verifikator_akreditasiprodi1saatlulus");
            } else {
                if (!empty($verifikator_akreditasiprodi1)) {
                    $verifikatorakreditasiprodi1 = $verifikator_akreditasiprodi1;
                    $verifikator_akreditasiprodi1saatlulus = $this->input->post("verifikator_akreditasiprodi1saatlulus");
                } else {
                    $verifikatorakreditasiprodi1 = $tabelpelamar->akreditasi_prodi1;
                    $verifikator_akreditasiprodi1saatlulus = $tabelpelamar->akreditasi_prodi1;
                }
            }

            $verif_penyetaraan1 = $this->input->post("verif_penyetaraan1");
            $verifikator_penyetaraan1 = $this->input->post("verifikator_penyetaraan1");
            if ($verif_penyetaraan1 == "Tidak Ada") {
                $verifikatorpenyetaraan1 = $verifikator_penyetaraan1;
            } else if ($verif_penyetaraan1 == "Tidak Sesuai dengan kategori file") {
                $verifikatorpenyetaraan1 = $verifikator_penyetaraan1;
            } else {
                if (!empty($verifikator_penyetaraan1)) {
                    $verifikatorpenyetaraan1 = $verifikator_penyetaraan1;
                } else {
                    $verifikatorpenyetaraan1 = $tabelpelamar->nomor_penyetaraan1;
                }
            }

            $verif_ijazah2 = $this->input->post("verif_ijazah2");
            $verifikator_ijazah2 = $this->input->post("verifikator_ijazah2");
            if ($verif_ijazah2 == "Tidak Ada") {
                $verifikatorijazah2 = $verifikator_ijazah2;
            } else if ($verif_ijazah2 == "Tidak Sesuai dengan kategori file") {
                $verifikatorijazah2 = $verifikator_ijazah2;
            } else {
                if (!empty($verifikator_ijazah2)) {
                    $verifikatorijazah2 = $verifikator_ijazah2;
                } else {
                    $verifikatorijazah2 = $tabelpelamar->prodi2;
                }
            }

            $verif_transkrip2 = $this->input->post("verif_transkrip2");
            $verifikator_transkrip2 = $this->input->post("verifikator_transkrip2");
            if ($verif_transkrip2 == "Tidak Ada") {
                $verifikatortranskrip2 = $verifikator_transkrip2;
            } else if ($verif_transkrip2 == "Tidak Sesuai dengan kategori file") {
                $verifikatortranskrip2 = $verifikator_transkrip2;
            } else {
                if (!empty($verifikator_transkrip2)) {
                    $verifikatortranskrip2 = $verifikator_transkrip2;
                } else {
                    $verifikatortranskrip2 = $tabelpelamar->ipk2;
                }
            }

            $verif_akreditasi2 = $this->input->post("verif_akreditasi2");
            $verifikator_akreditasi2 = $this->input->post("verifikator_akreditasi2");
            if ($verif_akreditasi2 == "Tidak Ada") {
                $verifikatorakreditasi2 = $verifikator_akreditasi2;
                $verifikator_akreditasi2saatlulus = $this->input->post("verifikator_akreditasi2saatlulus");
            } else if ($verif_akreditasi2 == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasi2 = $verifikator_akreditasi2;
                $verifikator_akreditasi2saatlulus = $this->input->post("verifikator_akreditasi2saatlulus");
            } else {
                if (!empty($verifikator_akreditasi2)) {
                    $verifikatorakreditasi2 = $verifikator_akreditasi2;
                    $verifikator_akreditasi2saatlulus = $this->input->post("verifikator_akreditasi2saatlulus");
                } else {
                    $verifikatorakreditasi2 = $tabelpelamar->akreditasi_kampus2;
                    $verifikator_akreditasi2saatlulus = $tabelpelamar->akreditasi_kampus2;
                }
            }

            $verif_akreditasiprodi2 = $this->input->post("verif_akreditasiprodi2");
            $verifikator_akreditasiprodi2 = $this->input->post("verifikator_akreditasiprodi2");
            if ($verif_akreditasiprodi2 == "Tidak Ada") {
                $verifikatorakreditasiprodi2 = $verifikator_akreditasiprodi2;
                $verifikator_akreditasiprodi2saatlulus = $this->input->post("verifikator_akreditasiprodi2saatlulus");
            } else if ($verif_akreditasiprodi2 == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasiprodi2 = $verifikator_akreditasiprodi2;
                $verifikator_akreditasiprodi2saatlulus = $this->input->post("verifikator_akreditasiprodi2saatlulus");
            } else {
                if (!empty($verifikator_akreditasiprodi2)) {
                    $verifikatorakreditasiprodi2 = $verifikator_akreditasiprodi2;
                    $verifikator_akreditasiprodi2saatlulus = $this->input->post("verifikator_akreditasiprodi2saatlulus");
                } else {
                    $verifikatorakreditasiprodi2 = $tabelpelamar->akreditasi_prodi2;
                    $verifikator_akreditasiprodi2saatlulus = $tabelpelamar->akreditasi_prodi2;
                }
            }

            $verif_penyetaraan2 = $this->input->post("verif_penyetaraan2");
            $verifikator_penyetaraan2 = $this->input->post("verifikator_penyetaraan2");
            if ($verif_penyetaraan2 == "Tidak Ada") {
                $verifikatorpenyetaraan2 = $verifikator_penyetaraan2;
            } else if ($verif_penyetaraan2 == "Tidak Sesuai dengan kategori file") {
                $verifikatorpenyetaraan2 = $verifikator_penyetaraan2;
            } else {
                if (!empty($verifikator_penyetaraan2)) {
                    $verifikatorpenyetaraan2 = $verifikator_penyetaraan2;
                } else {
                    $verifikatorpenyetaraan2 = $tabelpelamar->nomor_penyetaraan2;
                }
            }

            $verif_ijazah3 = $this->input->post("verif_ijazah3");
            $verifikator_ijazah3 = $this->input->post("verifikator_ijazah3");
            if ($verif_ijazah3 == "Tidak Ada") {
                $verifikatorijazah3 = $verifikator_ijazah3;
            } else if ($verif_ijazah3 == "Tidak Sesuai dengan kategori file") {
                $verifikatorijazah3 = $verifikator_ijazah3;
            } else {
                if (!empty($verifikator_ijazah3)) {
                    $verifikatorijazah3 = $verifikator_ijazah3;
                } else {
                    $verifikatorijazah3 = $tabelpelamar->prodi3;
                }
            }

            $verif_transkrip3 = $this->input->post("verif_transkrip3");
            $verifikator_transkrip3 = $this->input->post("verifikator_transkrip3");
            if ($verif_transkrip3 == "Tidak Ada") {
                $verifikatortranskrip3 = $verifikator_transkrip3;
            } else if ($verif_transkrip3 == "Tidak Sesuai dengan kategori file") {
                $verifikatortranskrip3 = $verifikator_transkrip3;
            } else {
                if (!empty($verifikator_transkrip3)) {
                    $verifikatortranskrip3 = $verifikator_transkrip3;
                } else {
                    $verifikatortranskrip3 = $tabelpelamar->ipk3;
                }
            }

            $verif_akreditasi3 = $this->input->post("verif_akreditasi3");
            $verifikator_akreditasi3 = $this->input->post("verifikator_akreditasi3");
            if ($verif_akreditasi3 == "Tidak Ada") {
                $verifikatorakreditasi3 = $verifikator_akreditasi3;
                $verifikator_akreditasi3saatlulus = $this->input->post("verifikator_akreditasi3saatlulus");
            } else if ($verif_akreditasi3 == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasi3 = $verifikator_akreditasi3;
                $verifikator_akreditasi3saatlulus = $this->input->post("verifikator_akreditasi3saatlulus");
            } else {
                if (!empty($verifikator_akreditasi3)) {
                    $verifikatorakreditasi3 = $verifikator_akreditasi3;
                    $verifikator_akreditasi3saatlulus = $this->input->post("verifikator_akreditasi3saatlulus");
                } else {
                    $verifikatorakreditasi3 = $tabelpelamar->akreditasi_kampus3;
                    $verifikator_akreditasi3saatlulus = $tabelpelamar->akreditasi_kampus3;
                }
            }

            $verif_akreditasiprodi3 = $this->input->post("verif_akreditasiprodi3");
            $verifikator_akreditasiprodi3 = $this->input->post("verifikator_akreditasiprodi3");
            if ($verif_akreditasiprodi3 == "Tidak Ada") {
                $verifikatorakreditasiprodi3 = $verifikator_akreditasiprodi3;
                $verifikator_akreditasiprodi3saatlulus = $this->input->post("verifikator_akreditasiprodi3saatlulus");
            } else if ($verif_akreditasiprodi3 == "Tidak Sesuai dengan kategori file") {
                $verifikatorakreditasiprodi3 = $verifikator_akreditasiprodi3;
                $verifikator_akreditasiprodi3saatlulus = $this->input->post("verifikator_akreditasiprodi3saatlulus");
            } else {
                if (!empty($verifikator_akreditasiprodi3)) {
                    $verifikatorakreditasiprodi3 = $verifikator_akreditasiprodi3;
                    $verifikator_akreditasiprodi3saatlulus = $this->input->post("verifikator_akreditasiprodi3saatlulus");
                } else {
                    $verifikatorakreditasiprodi3 = $tabelpelamar->akreditasi_prodi3;
                    $verifikator_akreditasiprodi3saatlulus = $tabelpelamar->akreditasi_prodi3;
                }
            }

            $verif_penyetaraan3 = $this->input->post("verif_penyetaraan3");
            $verifikator_penyetaraan3 = $this->input->post("verifikator_penyetaraan3");
            if ($verif_penyetaraan3 == "Tidak Ada") {
                $verifikatorpenyetaraan3 = $verifikator_penyetaraan3;
            } else if ($verif_penyetaraan3 == "Tidak Sesuai dengan kategori file") {
                $verifikatorpenyetaraan3 = $verifikator_penyetaraan3;
            } else {
                if (!empty($verifikator_penyetaraan3)) {
                    $verifikatorpenyetaraan3 = $verifikator_penyetaraan3;
                } else {
                    $verifikatorpenyetaraan3 = $tabelpelamar->nomor_penyetaraan3;
                }
            }

            $verif_sertifikat = $this->input->post("verif_sertifikat");
            $verifikator_jenistoefl = $this->input->post("verifikator_jenistoefl");
            $verifikator_sertifikat = $this->input->post("verifikator_sertifikat");
            $verifikator_lembagapenerbit = $this->input->post("verifikator_lembagapenerbit");
            if ($verif_sertifikat == "Tidak Ada") {
                $verifikatorjenistoefl = $verifikator_jenistoefl;
                $verifikatorsertifikat = $verifikator_sertifikat;
            } else if ($verif_sertifikat == "Tidak Sesuai dengan kategori file") {
                $verifikatorjenistoefl = $verifikator_jenistoefl;
                $verifikatorsertifikat = $verifikator_sertifikat;
            } else {
                if (!empty($verifikator_sertifikat)) {
                    $verifikatorjenistoefl = $verifikator_jenistoefl;
                    $verifikatorsertifikat = $verifikator_sertifikat;
                } else {
                    $verifikatorjenistoefl = $tabelpelamar->jenis_toefl;
                    $verifikatorsertifikat = $tabelpelamar->toefl;
                }
            }

            $verifikator = $this->session->userdata('nik');

            //get status berkas admnistrasi utk simulasi bahan verifikasi
            // $rowstatusberkas = $this->Modelpelamar->joinTbpelamardanTbdataverifikasi($id)->row();
            // $status_berkasadmin = $rowstatusberkas->status_berkasadmin;

            if ($id_pelamardataverif >= 1) {
                $data = array(
                    'id_pelamardataverifikasi' => $id,
                    'verif_lamaran' => $verif_lamaran,
                    'verif_ktp' => $verif_ktp,
                    'verif_foto' => $verif_foto,
                    'verif_sks' => $verif_sks,
                    'verif_skck' => $verif_skck,
                    'verif_suratpernyataanbebasparpol' => $verif_suratpernyataanbebasparpol,
                    'verif_suratpernyataanbebasdariinstansi' => $verif_suratpernyataanbebasdariinstansi,
                    'asal_sekolah' => $asal_sekolah,
                    'asal_sekolah1' => $asal_sekolah1,
                    'asal_sekolah2' => $asal_sekolah2,
                    'asal_sekolah3' => $asal_sekolah3,
                    'verif_ijazah' => $verif_ijazah,
                    'ket_ijazahprodi' => $verifikatorijazah,
                    'verif_transkrip' => $verif_transkrip,
                    'ket_transkripipk' => $verifikatortranskrip,
                    'verif_akreditasipt' => $verif_akreditasi,
                    'ket_akreditasipt' => $verifikatorakreditasi,
                    'ket_akreditasiptsaatlulus' => $verifikator_akreditasisaatlulus,
                    'verif_akreditasiprodi' => $verif_akreditasiprodi,
                    'ket_akreditasiprodi' => $verifikatorakreditasiprodi,
                    'ket_akreditasiprodisaatlulus' => $verifikator_akreditasiprodisaatlulus,
                    'verif_penyetaraan' => $verif_penyetaraan,
                    'ket_penyetaraan' => $verifikatorpenyetaraan,
                    'verif_ijazah1' => $verif_ijazah1,
                    'ket_ijazahprodi1' => $verifikatorijazah1,
                    'verif_transkrip1' => $verif_transkrip1,
                    'ket_transkripipk1' => $verifikatortranskrip1,
                    'verif_akreditasipt1' => $verif_akreditasi1,
                    'ket_akreditasipt1' => $verifikatorakreditasi1,
                    'ket_akreditasipt1saatlulus' => $verifikator_akreditasi1saatlulus,
                    'verif_akreditasiprodi1' => $verif_akreditasiprodi1,
                    'ket_akreditasiprodi1' => $verifikatorakreditasiprodi1,
                    'ket_akreditasiprodi1saatlulus' => $verifikator_akreditasiprodi1saatlulus,
                    'verif_penyetaraan1' => $verif_penyetaraan1,
                    'ket_penyetaraan1' => $verifikatorpenyetaraan1,
                    'verif_ijazah2' => $verif_ijazah2,
                    'ket_ijazahprodi2' => $verifikatorijazah2,
                    'verif_transkrip2' => $verif_transkrip2,
                    'ket_transkripipk2' => $verifikatortranskrip2,
                    'verif_akreditasipt2' => $verif_akreditasi2,
                    'ket_akreditasipt2' => $verifikatorakreditasi2,
                    'ket_akreditasipt2saatlulus' => $verifikator_akreditasi2saatlulus,
                    'verif_akreditasiprodi2' => $verif_akreditasiprodi2,
                    'ket_akreditasiprodi2' => $verifikatorakreditasiprodi2,
                    'ket_akreditasiprodi2saatlulus' => $verifikator_akreditasiprodi2saatlulus,
                    'verif_penyetaraan2' => $verif_penyetaraan2,
                    'ket_penyetaraan2' => $verifikatorpenyetaraan2,
                    'verif_ijazah3' => $verif_ijazah3,
                    'ket_ijazahprodi3' => $verifikatorijazah3,
                    'verif_transkrip3' => $verif_transkrip3,
                    'ket_transkripipk3' => $verifikatortranskrip3,
                    'verif_akreditasipt3' => $verif_akreditasi3,
                    'ket_akreditasipt3' => $verifikatorakreditasi3,
                    'ket_akreditasipt3saatlulus' => $verifikator_akreditasi3saatlulus,
                    'verif_akreditasiprodi3' => $verif_akreditasiprodi3,
                    'ket_akreditasiprodi3' => $verifikatorakreditasiprodi3,
                    'ket_akreditasiprodi3saatlulus' => $verifikator_akreditasiprodi3saatlulus,
                    'verif_penyetaraan3' => $verif_penyetaraan3,
                    'ket_penyetaraan3' => $verifikatorpenyetaraan3,
                    'verif_toefl' => $verif_sertifikat,
                    'ket_jenistoefl' => $verifikatorjenistoefl,
                    'ket_toefl' => $verifikatorsertifikat,
                    'ket_konversiitp' => $this->input->post('verifikator_konversiitp'),
                    'ket_lembagapenerbit' => $verifikator_lembagapenerbit,
                    'status_pelamar' => $status,
                    'id_kualifikasi' => $tabelpelamar->id_kualifikasi,
                    'nik_verifikator' => $verifikator
                );

                $this->db->where('id_pelamardataverifikasi', $id);
                $this->db->update('tb_dataverifikasi', $data);

                $dataa = [
                    'status' => $status,
                    'verifikator' => $verifikator
                ];
                $this->db->where('id_pelamar', $id);
                $this->db->update('tb_pelamar', $dataa);
            } else {
                $data = array(
                    'id_pelamardataverifikasi' => $id,
                    'verif_lamaran' => $verif_lamaran,
                    'verif_ktp' => $verif_ktp,
                    'verif_foto' => $verif_foto,
                    'verif_sks' => $verif_sks,
                    'verif_skck' => $verif_skck,
                    'verif_suratpernyataanbebasparpol' => $verif_suratpernyataanbebasparpol,
                    'verif_suratpernyataanbebasdariinstansi' => $verif_suratpernyataanbebasdariinstansi,
                    'asal_sekolah' => $asal_sekolah,
                    'asal_sekolah1' => $asal_sekolah1,
                    'asal_sekolah2' => $asal_sekolah2,
                    'asal_sekolah3' => $asal_sekolah3,
                    'verif_ijazah' => $verif_ijazah,
                    'ket_ijazahprodi' => $verifikatorijazah,
                    'verif_transkrip' => $verif_transkrip,
                    'ket_transkripipk' => $verifikatortranskrip,
                    'verif_akreditasipt' => $verif_akreditasi,
                    'ket_akreditasipt' => $verifikatorakreditasi,
                    'ket_akreditasiptsaatlulus' => $verifikator_akreditasisaatlulus,
                    'verif_akreditasiprodi' => $verif_akreditasiprodi,
                    'ket_akreditasiprodi' => $verifikatorakreditasiprodi,
                    'ket_akreditasiprodisaatlulus' => $verifikator_akreditasiprodisaatlulus,
                    'verif_penyetaraan' => $verif_penyetaraan,
                    'ket_penyetaraan' => $verifikatorpenyetaraan,
                    'verif_ijazah1' => $verif_ijazah1,
                    'ket_ijazahprodi1' => $verifikatorijazah1,
                    'verif_transkrip1' => $verif_transkrip1,
                    'ket_transkripipk1' => $verifikatortranskrip1,
                    'verif_akreditasipt1' => $verif_akreditasi1,
                    'ket_akreditasipt1' => $verifikatorakreditasi1,
                    'ket_akreditasipt1saatlulus' => $verifikator_akreditasi1saatlulus,
                    'verif_akreditasiprodi1' => $verif_akreditasiprodi1,
                    'ket_akreditasiprodi1' => $verifikatorakreditasiprodi1,
                    'ket_akreditasiprodi1saatlulus' => $verifikator_akreditasiprodi1saatlulus,
                    'verif_penyetaraan1' => $verif_penyetaraan1,
                    'ket_penyetaraan1' => $verifikatorpenyetaraan1,
                    'verif_ijazah2' => $verif_ijazah2,
                    'ket_ijazahprodi2' => $verifikatorijazah2,
                    'verif_transkrip2' => $verif_transkrip2,
                    'ket_transkripipk2' => $verifikatortranskrip2,
                    'verif_akreditasipt2' => $verif_akreditasi2,
                    'ket_akreditasipt2' => $verifikatorakreditasi2,
                    'ket_akreditasipt2saatlulus' => $verifikator_akreditasi2saatlulus,
                    'verif_akreditasiprodi2' => $verif_akreditasiprodi2,
                    'ket_akreditasiprodi2' => $verifikatorakreditasiprodi2,
                    'ket_akreditasiprodi2saatlulus' => $verifikator_akreditasiprodi2saatlulus,
                    'verif_penyetaraan2' => $verif_penyetaraan2,
                    'ket_penyetaraan2' => $verifikatorpenyetaraan2,
                    'verif_ijazah3' => $verif_ijazah3,
                    'ket_ijazahprodi3' => $verifikatorijazah3,
                    'verif_transkrip3' => $verif_transkrip3,
                    'ket_transkripipk3' => $verifikatortranskrip3,
                    'verif_akreditasipt3' => $verif_akreditasi3,
                    'ket_akreditasipt3' => $verifikatorakreditasi3,
                    'ket_akreditasipt3saatlulus' => $verifikator_akreditasi3saatlulus,
                    'verif_akreditasiprodi3' => $verif_akreditasiprodi3,
                    'ket_akreditasiprodi3' => $verifikatorakreditasiprodi3,
                    'ket_akreditasiprodi3saatlulus' => $verifikator_akreditasiprodi3saatlulus,
                    'verif_penyetaraan3' => $verif_penyetaraan3,
                    'ket_penyetaraan3' => $verifikatorpenyetaraan3,
                    'verif_toefl' => $verif_sertifikat,
                    'ket_jenistoefl' => $verifikatorjenistoefl,
                    'ket_toefl' => $verifikatorsertifikat,
                    'ket_konversiitp' => $this->input->post('verifikator_konversiitp'),
                    'ket_lembagapenerbit' => $verifikator_lembagapenerbit,
                    'id_kualifikasi' => $tabelpelamar->id_kualifikasi,
                    'status_pelamar' => $status,
                    'nik_verifikator' => $verifikator
                );

                $this->Modelpelamar->create('tb_dataverifikasi', $data);
                $dataa = [
                    'status' => $status,
                    'verifikator' => $verifikator
                ];
                $this->db->where('id_pelamar', $id);
                $this->db->update('tb_pelamar', $dataa);
            }

            // if($id_pelamardataverif >= 1){
            //asal sekolah ln transkrip dipertimbangkan
            if ($verif_ijazah1 == "" and $verif_akreditasi1 == "" and $verif_ijazah3 == "" and $verif_akreditasi3 == "") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            } else if ($verif_ijazah1 != "" and $verif_akreditasi1 == "" and $verif_ijazah3 == "" and $verif_akreditasi3 == "") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                        ;
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            } else if ($verif_ijazah1 != "" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_akreditasi3 == "") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            } else if ($verif_ijazah1 == "" and $verif_akreditasi1 == "" and $verif_ijazah3 != "" and $verif_akreditasi3 == "") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            } else if ($verif_ijazah1 != "" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_ijazah3 != "" and $verif_akreditasi3 == "") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            } else if ($verif_ijazah1 == "" and $verif_akreditasi1 == "" and $verif_ijazah3 != "" and $verif_akreditasi3 == "Sesuai dengan persyaratan") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            } else if ($verif_ijazah1 != "" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_ijazah3 != "" and $verif_akreditasi3 == "Sesuai dengan persyaratan") {
                if ($verif_akreditasi == "" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                } else if ($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan") {
                    if ($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck == "Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_suratpernyataanbebasdariinstansi == 'Sesuai' and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == "") {
                        $data = array(
                            'status_berkasadmin' => 'ok',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'ok',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    } else {
                        $data = array(
                            'status_berkasadmin' => 'gagal',
                            'status_pelamar' => $status,
                            'nik_verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamardataverifikasi', $id);
                        // $this->db->update('tb_pelamar', $data);
                        $this->db->update('tb_dataverifikasi', $data);

                        $dataa = array(
                            'status_berkasadmintbpelamar' => 'gagal',
                            'status' => $status,
                            'verifikator' => $verifikator
                        );

                        $this->db->where('id_pelamar', $id);
                        $this->db->update('tb_pelamar', $dataa);
                    }
                }
            }
            // }
            //Tidak mempertimbangkan transkrip utk lulusan luar negeri
            // if($verif_ijazah1 == "" and $verif_akreditasi1 == "" and $verif_ijazah3 == "" and $verif_akreditasi3 == ""){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }else if($verif_ijazah1 != "" and $verif_akreditasi1 == "" and $verif_ijazah3 == "" and $verif_akreditasi3 == ""){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "Sesuai dengan persyaratan" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }else if($verif_ijazah1 != "" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_akreditasi3 == ""){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "" and $verif_transkrip3 == "" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }else if($verif_ijazah1 == "" and $verif_akreditasi1 == "" and $verif_ijazah3 != "" and $verif_akreditasi3 == ""){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }else if($verif_ijazah1 != "" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_ijazah3 != "" and $verif_akreditasi3 == ""){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and  $verif_akreditasi3 == "" and $verif_akreditasiprodi3 == "" and $verif_penyetaraan3 == "Sesuai dengan persyaratan"){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }else if($verif_ijazah1 == "" and $verif_akreditasi1 == "" and $verif_ijazah3 != "" and $verif_akreditasi3 == "Sesuai dengan persyaratan"){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "" and $verif_transkrip1 == "" and $verif_akreditasi1 == "" and $verif_akreditasiprodi1 == "" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }else if($verif_ijazah1 != "" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_ijazah3 != "" and $verif_akreditasi3 == "Sesuai dengan persyaratan"){
            // if($verif_akreditasi == "" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == ""){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "" and $verif_akreditasiprodi2 == "" and $verif_penyetaraan2 == "Sesuai dengan persyaratan" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_akreditasi == "" and $verif_akreditasiprodi == "" and $verif_penyetaraan == "Sesuai dengan persyaratan" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }else if($verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan"){
            // if($verif_lamaran == "Sesuai" and $verif_ktp == "Sesuai" and $verif_sks == "Sesuai" and $verif_skck =="Sesuai" and $verif_suratpernyataanbebasparpol == "Sesuai" and $verif_ijazah == "Sesuai dengan persyaratan" and $verif_transkrip == "Sesuai dengan persyaratan" and $verif_akreditasi == "Sesuai dengan persyaratan" and $verif_akreditasiprodi == "Sesuai dengan persyaratan" and $verif_penyetaraan == "" and $verif_ijazah1 == "Sesuai dengan persyaratan" and $verif_transkrip1 == "Sesuai dengan persyaratan" and $verif_akreditasi1 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi1 == "Sesuai dengan persyaratan" and $verif_penyetaraan1 == "" and $verif_ijazah2 == "Sesuai dengan persyaratan" and $verif_transkrip2 == "Sesuai dengan persyaratan" and $verif_akreditasi2 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi2 == "Sesuai dengan persyaratan" and $verif_penyetaraan2 == "" and $verif_ijazah3 == "Sesuai dengan persyaratan" and $verif_transkrip3 == "Sesuai dengan persyaratan" and $verif_akreditasi3 == "Sesuai dengan persyaratan" and $verif_akreditasiprodi3 == "Sesuai dengan persyaratan" and $verif_penyetaraan3 == ""){
            // $data = array(
            // 'status_berkasadmin' => 'ok',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }else{
            // $data = array(
            // 'status_berkasadmin' => 'gagal',
            // 'status' => $status,
            // 'verifikator' => $verifikator
            // );
            // $this->db->where('id_pelamar', $id);
            // $this->db->update('tb_pelamar', $data);
            // $this->db->update('tb_dataverifikasi', $data);
            // }
            // }
            // }

            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    function setujuPelamar() {
        $id = $this->input->get('id');
        $nik = $this->session->userdata('nik');
        // $keterangan = $this->input->get('keterangan');

        $data = array(
            'status' => 1,
            'keterangan_berkas' => $keterangan,
            'verifikator' => $nik
        );

        $this->db->where('id_pelamar', $id);
        $this->db->update('tb_pelamar', $data);
    }

    function bukaPelamar() {
        $id = $this->input->get('id');
        $nik = $this->session->userdata('nik');

        $data = array(
            'status' => 3,
            'verifikator' => $nik
        );

        $this->db->where('id_pelamar', $id);
        $this->db->update('tb_pelamar', $data);
    }

    function tolakPelamar() {
        $id = $this->input->get('id');
        $nik = $this->session->userdata('nik');

        $data = array(
            'status' => 2,
            'verifikator' => $nik
        );

        $this->db->where('id_pelamar', $id);
        $this->db->update('tb_pelamar', $data);
    }

    function action() {
        $object = new PHPExcel();

        $object->setActiveSheetIndex(0);

        $table_columns = array("NIK", "Nomor Daftar", "Nama Pelamar", "Nomor Ujian");

        $column = 0;

        foreach ($table_columns as $field) {
            $object->getActiveSheet()->setCellValueByColumnAndRow($column, 1, $field);
            $column++;
        }

        $thing_data = $this->Modelpelamar->readlolostahaponline();
        if ($thing_data->num_rows() < 1) {
            echo "Data Belum Lengkap";
        } else {
            $excel_row = 2;
            $tahun = (int) date('Y', strtotime('now'));
            $i = 1;
            foreach ($thing_data->result() as $row) {
                // php to string value
                $nik = $row->ktp;
                $nodaftar = $row->no_pendaftaran;
                $idkualifikasi = $row->id_kualifikasi;
                $formasi = sprintf("%02s", $idkualifikasi);
                $urut = sprintf("%04s", $i);

                $object->getActiveSheet()->setCellValueByColumnAndRow(0, $excel_row, $nik);
                $object->getActiveSheet()->setCellValueByColumnAndRow(1, $excel_row, $nodaftar);
                $object->getActiveSheet()->setCellValueByColumnAndRow(2, $excel_row, $row->nama_pelamar);
                $object->getActiveSheet()->setCellValueByColumnAndRow(3, $excel_row, $tahun . $formasi . $urut);
                $excel_row++;
                $i++;
            }

            $object_writer = PHPExcel_IOFactory::createWriter($object, 'Excel5');
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Nomor Ujian.xls"');
            $object_writer->save('php://output');
        }
    }

    public function cetakkartuujian2() {
        $nik = $this->session->userdata('nik');
        $id = (int) $this->input->get("id");

        $result = $this->Modelpelamar->readkongsi($id)->row();
        $nik_pelamar = $result->ktp;

        if ($nik == $nik_pelamar) {
            $a['hasil'] = $this->Modelpelamar->readkongsi($id)->row();
            $a['query'] = $this->Modelpelamar->readPelamarlolostahapsatu($id)->row();
            $a['tabel_file'] = $this->Modelpelamar->readFilekartu($id);
            // $a['lokasi'] = $this->Modelpelamar->readLokasi($id)->row();

            $this->load->view('cetak-kartuujian', $a);
        } else {
            return redirect('login');
        }
    }

    function cetakkartuujian() {
        $nik = $this->session->userdata('nik');
        $id = (int) $this->input->get("id");

        $result = $this->Modelpelamar->readkongsi($id)->row();
        $nik_pelamar = $result->ktp;
        if ($nik == $nik_pelamar) {
            $rownik = $this->Modelpelamar->readPelamarlolostahapsatu($id)->row();
            if (isset($rownik->nik)) {
                $a['query'] = $this->Modelpelamar->readPelamarlolostahapsatu($id)->row();
                $a['tabel_file'] = $this->Modelpelamar->readFilekartu($id);
                $this->load->view('cetak-kartuujian', $a);
                $html = $this->load->view('cetak-kartuujian', $a, true);
                //this the the PDF filename that user will get to download
                $pdfFilePath = "Kartu Ujian Dosen PU Non ASN Undip 2022" . ".pdf";
                //load mPDF library
                $hasil = $this->load->library('m_pdf');

                $this->m_pdf->pdf->AddPage('P');
                //generate the PDF from the given html
                $this->m_pdf->pdf->WriteHTML($html);

                //download it.
                $this->m_pdf->pdf->Output($pdfFilePath, "D");
            } else {
                
            }
        } else {
            return redirect('login');
        }
    }

    function downloaddaftarpesertalolosdua() {
        $query = $this->Modelpelamar->readfotopsertatahapdua();
        if (empty($query)) {
            echo "Data Belum Lengkap";
        } else {
            $data['datapesertawa'] = $this->Modelpelamar->readfotopsertatahapdua();
            $this->load->view('daftar-peserta', $data);
            $html = $this->load->view('daftar-peserta', $data, true);
            //this the the PDF filename that user will get to download
            $pdfFilePath = "Tenaga dosen PU Non ASN Lolos Seleksi Administrasi" . ".pdf";
            //load mPDF library
            $hasil = $this->load->library('m_pdf');

            $this->m_pdf->pdf->AddPage('P');
            //generate the PDF from the given html
            $this->m_pdf->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf->pdf->Output($pdfFilePath, "D");
        }
    }

    function downloaddaftarpesertalolostiga() {
        $query = $this->Modelpelamar->readfotopsertatahaptiga();
        if (empty($query)) {
            echo "Data Belum Lengkap";
        } else {
            $data['datapesertawawancara'] = $this->Modelpelamar->readfotopsertatahaptiga();
            $this->load->view('daftar-pesertawawancara', $data);
            $html = $this->load->view('daftar-pesertawawancara', $data, true);
            //this the the PDF filename that user will get to download
            $pdfFilePath = "Tenaga dosen PU Non ASN Lolos SKD & SKB" . ".pdf";
            //load mPDF library
            $hasil = $this->load->library('m_pdf');

            $this->m_pdf->pdf->AddPage('P');
            //generate the PDF from the given html
            $this->m_pdf->pdf->WriteHTML($html);

            //download it.
            $this->m_pdf->pdf->Output($pdfFilePath, "D");
        }
    }

    private function upload_files($valueid, $kategori, $id, $table, $path, $title, $files) {
        $config = array(
            'upload_path' => '.' . $path,
            'allowed_types' => 'pdf|jpeg|jpg|png',
            'overwrite' => 1,
            'max_size' => '400'
        );

        $this->load->library('upload', $config);

        $images = array();
        $i = 0;
        foreach ($files['name'] as $key => $image) {
            $i++;
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $fileName = gmdate("d-m-y-H-i-s", time() + 3600 * 7) . '-' . $title;
            $name = $kategori . '-' . $valueid;

            $images[] = $name;

            $config['file_name'] = $name;

            $ext = pathinfo($files['name'][$key], PATHINFO_EXTENSION);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }

            $cekidfile = $this->Modelpelamar->cekidfile($valueid, $kategori)->row();
            if (!empty($cekidfile)) {
                $idfile = $cekidfile->id_file;

                $cekfile = $this->Modelpelamar->cekfilepelamar($valueid, $kategori);
                $data = [
                    'nama_file' => $name,
                    'path_file' => $path . $name . '.' . $ext,
                    'nik' => $valueid,
                    'kategori_file' => $kategori,
                    'kesesuaian' => 'Sesuai Kualifikasi'
                ];

                $this->Modelpelamar->update(['id_file' => $idfile], $table, $data);
            } else {
                $data = [
                    'nama_file' => $name,
                    'path_file' => $path . $name . '.' . $ext,
                    'nik' => $valueid,
                    'kategori_file' => $kategori,
                    'kesesuaian' => 'Sesuai Kualifikasi'
                ];

                $this->Modelpelamar->create($table, $data);
            }
        }
        return true;
    }

    private function upload_filesgambar($valueid, $kategori, $id, $table, $path, $title, $files) {
        $config = array(
            'upload_path' => '.' . $path,
            'allowed_types' => 'jpeg|jpg|png',
            'overwrite' => 1,
            'max_size' => '500'
        );

        $this->load->library('upload', $config);

        $images = array();
        $i = 0;
        foreach ($files['name'] as $key => $image) {
            $i++;
            $_FILES['images[]']['name'] = $files['name'][$key];
            $_FILES['images[]']['type'] = $files['type'][$key];
            $_FILES['images[]']['tmp_name'] = $files['tmp_name'][$key];
            $_FILES['images[]']['error'] = $files['error'][$key];
            $_FILES['images[]']['size'] = $files['size'][$key];

            $fileName = gmdate("d-m-y-H-i-s", time() + 3600 * 7) . '-' . $title;
            $name = $kategori . '-' . $valueid;

            $images[] = $name;

            $config['file_name'] = $name;

            $ext = pathinfo($files['name'][$key], PATHINFO_EXTENSION);

            $this->upload->initialize($config);

            if ($this->upload->do_upload('images[]')) {
                $this->upload->data();
            } else {
                return false;
            }

            $cekidfile = $this->Modelpelamar->cekidfile($valueid, $kategori)->row();
            if (!empty($cekidfile)) {
                $idfile = $cekidfile->id_file;

                $cekfile = $this->Modelpelamar->cekfilepelamar($valueid, $kategori);
                $data = [
                    'nama_file' => $name,
                    'path_file' => $path . $name . '.' . $ext,
                    'nik' => $valueid,
                    'kategori_file' => $kategori,
                    'kesesuaian' => 'Sesuai Kualifikasi'
                ];

                $this->Modelpelamar->update(['id_file' => $idfile], $table, $data);
            } else {
                $data = [
                    'nama_file' => $name,
                    'path_file' => $path . $name . '.' . $ext,
                    'nik' => $valueid,
                    'kategori_file' => $kategori,
                    'kesesuaian' => 'Sesuai Kualifikasi'
                ];

                $this->Modelpelamar->create($table, $data);
            }
        }
        return true;
    }

    public function dl_file() {
        if (!$this->input->get('file')) {
            show_404();
        }
        $file = $this->input->get('file');
        $this->load->helper('download');
        force_download($file, null);
    }

    public function dl_filee() {
        if (!$this->input->get('file')) {
            show_404();
        }
        $file = $this->input->get('file');
        $this->load->helper('download');
        force_download($file);
    }

    //export peserta
    public function export_peserta() {
        $level = $this->session->userdata('level');
        if ($level == '1') {
            $data['peserta'] = $this->Modelpelamar->get_export_peserta()->result();
            $data['dataa'] = $this->Modelpelamar->get_export_peserta()->row();
//            print_r($data['peserta']);die();
            $this->load->helper(array('form'));
            $this->load->view('export_peserta', $data);
        } else {
            echo "Anda tidak memiliki akses ke halaman ini";
        }
    }

}
