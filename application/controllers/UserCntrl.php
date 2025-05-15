<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserCntrl extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->helper('file');
        $this->load->model('Modeluser');
        $this->load->model('Modelpelamar');
    }

    public function index() {
        $level = $this->session->userdata('level');
        $formasi = $this->Modelpelamar->read_kualifikasi()->result();
        $verifikator = $this->Modeluser->read('tb_user', null, null, null)->result();
        $data = [
            'title' => 'REKRUTMEN SDM UNDIP',
            'date' => date('l, d-m-Y', strtotime("now")),
            'verifikator' => $verifikator,
            'formasi' => $formasi
        ];

        $this->load->view('hal_useradminsuper', $data);
    }

    public function sorting() {
        $nama = $this->input->get('nama');

        if ($nama == 'all') {
            $sorting = $this->Modeluser->readVerifikator('2');
        } else {
            $sorting = $this->Modeluser->sort_verifikator($nama);
        }

        $data = [
            'tabel' => $sorting
        ];

        return $this->load->view('tabel-useradminsuper', $data);
    }

    public function edit() {
        $id = $this->input->get('id');
        $user = $this->Modeluser->readtugasuser($id)->result();

        $namakualifikasi = $this->Modeluser->namakualifikasi($id)->result();
        $row = $this->Modeluser->namakualifikasi($id)->row();
        $query = $this->Modeluser->read('tb_kualifikasi', null, null, null);
        $datauser = $this->Modeluser->read('tb_user', ['id_user' => $id], null, null)->row();

        $idkualifikasi = [];
        $kode_formasi = $row->kode_formasi;
        if (!empty($kode_formasi)) {
            foreach ($namakualifikasi as $formasi) {
                $idkualifikasi[] = $formasi->kode_formasi;
            }
        }
        $formasi = $this->Modelpelamar->read_kualifikasi()->result();

        $this->load->view('edit-tugasuser', ['tabel' => $datauser, 'listkualifikasi' => $idkualifikasi, 'formasi' => $formasi]);
    }

    public function getTabel() {
        $level = 2;

        $data = [
            'tabel' => $this->Modeluser->readVerifikator($level)
        ];

        return $this->load->view('tabel-useradminsuper', $data);
    }

    public function getKualifikasi() {
        $id = $this->input->get('id');
        $get = $this->Modeluser->read('tb_kualifikasi', null, null, null);

        $data = [
            'tabel' => $get,
            'id' => $id
        ];

        return $this->load->view('file-pilihkualifikasi', $data);
    }

    public function addData() {
        $nik = $this->input->post('nik');
        $nm_user = $this->input->post('nama');
        $pass = $this->input->post('password');
        $cekuser = $this->Modeluser->cekNik($nik);
        $level = '2';
        $k = array();
        $k = $this->input->post('tugas[]');
        $kualifikasi = implode(",", (array) $k);

        if ($cekuser > 0) {
            $return = [
                'return' => 1
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $data = [
                'kualifikasi' => $kualifikasi,
                'nik' => $nik,
                'nm_user' => $this->input->post('nama_user'),
                'password' => md5($this->input->post('password_user')),
                'password_tampil' => $this->input->post('password_user'),
                'level' => $level
            ];

            $this->Modeluser->create('tb_user', $data);

            $id = $this->db->insert_id();
            $id_usertugas = $this->Modelpelamar->read('tb_tugas', ['id_verifikator' => $id], null, null)->row();
            if ($id_usertugas > 0) {
                $return = [
                    'return' => 1
                ];

                header('Content-Type: application/json');
                echo json_encode($return);
            } else {
                $k = array();
                $k = $this->input->post('tugas[]');
                $kualifikasi = implode(",", (array) $k);

                $value = array();
                for ($i = 0; $i < count($k); $i++) {

                    if (!isset($k[$i])) {
                        $k[$i] = '';
                    }

                    $value[$i] = array(
                        'id_verifikator' => $id,
                        'kode_formasi' => $k[$i]
                    );
                }

                $this->db->insert_batch('tb_tugas', $value);

                $return = [
                    'return' => 2
                ];

                header('Content-Type: application/json');
                echo json_encode($return);
            }
        }
    }

    public function pilihkualifikasi() {
        $user = $this->session->userdata('level');
        $nik = $this->session->userdata('nik');
        $id = $this->input->post('id');

        $k = array();
        $k = $this->input->post('kualifikasi[]');
        $kualifikasi = implode(",", (array) $k);

        $data = array(
            'kualifikasi' => $kualifikasi
        );

        $update = $this->Modeluser->update(array('id_user' => $id), 'tb_user', $data);

        $cek = $this->Modeluser->readverifikatortugas($id)->num_rows();
        if ($cek > 0) {
            $delete = $this->Modeluser->delete(array('id_verifikator' => $id), 'tb_tugas');

            $value = array();
            for ($i = 0; $i < count($k); $i++) {

                if (!isset($k[$i])) {
                    $k[$i] = '';
                }

                $value[$i] = array(
                    'id_verifikator' => $id,
                    'kode_formasi' => $k[$i]
                );
            }

            $this->db->insert_batch('tb_tugas', $value);
        } else {
            $value = array();
            for ($i = 0; $i < count($k); $i++) {

                if (!isset($k[$i])) {
                    $k[$i] = '';
                }

                $value[$i] = array(
                    'id_verifikator' => $id,
                    'kode_formasi' => $k[$i]
                );
            }

            $this->db->insert_batch('tb_tugas', $value);
        }

        return redirect('user');
    }

    public function editData() {
        $id = $this->input->post('id');
        $nik = $this->input->post('editnik');
        $nm_user = $this->input->post('editnm_user');
        $pass = $this->input->post('editpassword');
        $k = array();
        $k = $this->input->post('edittugas[]');
        $kualifikasi = implode(",", (array) $k);
        $cekuser = $this->Modeluser->cekNik($nik);

        if ($cekuser > 1) {
            $return = [
                'return' => 1
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        } else {
            $data = [
                'kualifikasi' => $kualifikasi,
                'nik' => $this->input->post('editnik'),
                'nm_user' => $this->input->post('editnm_user'),
                'password' => md5($pass),
                'password_tampil' => $pass
            ];

            $update = $this->Modeluser->update(array('id_user' => $id), 'tb_user', $data);
            $delete = $this->Modeluser->delete(array('id_verifikator' => $id), 'tb_tugas');

            $value = array();
            for ($i = 0; $i < count($k); $i++) {

                if (!isset($k[$i])) {
                    $k[$i] = '';
                }

                $value[$i] = array(
                    'id_verifikator' => $id,
                    'kode_formasi' => $k[$i]
                );
            }

            $this->db->insert_batch('tb_tugas', $value);

            $return = [
                'return' => 2
            ];

            header('Content-Type: application/json');
            echo json_encode($return);
        }
    }

    public function hapusData() {

        $id = $this->input->get('id');

        $delete = $this->Modeluser->delete(array('id_user' => $id), 'tb_user');
    }

}
