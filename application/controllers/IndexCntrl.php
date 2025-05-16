<?php

//header("location:https://rekrutmen.undip.ac.id");

defined('BASEPATH') OR exit('No direct script access allowed');
if (version_compare(PHP_VERSION, '8.2.0', '>=')) {
    error_reporting(E_ALL & ~E_DEPRECATED & ~E_STRICT);
} else {
    error_reporting(E_ALL & ~E_STRICT);
}

class IndexCntrl extends MY_Controller {

    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url', 'inflector'));
        $this->load->model('Modellogin');
        $this->load->model('Modelpelamar');
    }

    public function index() {
        if ($this->input->get('balasan') != null) {
            $data['report'] = 1;
        } else {
            $data['report'] = 0;
        }

        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $pendaftar = $this->Modelpelamar->read('tb_pelamar', null, null, null)->num_rows();
        $calon = $this->Modelpelamar->readcalon()->num_rows();
        $leveluser = $this->Modelpelamar->readleveluser()->num_rows();

        $calonpendaftar = $calon - $leveluser;
        if ($calonpendaftar < 0) {
            $data = array(
                'calonpendaftar' => 0,
                'pendaftar' => $pendaftar,
                'date' => $date,
                'dateawal' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman
            );

            $this->load->view('home', $data);
        } else {
            $data = array(
                'calonpendaftar' => $calonpendaftar,
                'pendaftar' => $pendaftar,
                'date' => $date,
                'dateawal' => $dateawal->tgl_buka,
                'datetutup' => $dateakhir->tgl_tutup,
                'datepengumuman' => $datepengumuman
            );

            $this->load->view('home', $data);
        }
    }

    public function login() {
        ini_set('date.timezone', 'Asia/Jakarta');
        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $data = array(
            'date' => $date,
            'datebuka' => $dateawal->tgl_buka,
            'datetutup' => $dateakhir->tgl_tutup,
            'datepengumuman' => $datepengumuman
        );

        $this->load->view('loginweb', $data);
    }

    public function register() {
        ini_set('date.timezone', 'Asia/Jakarta');
        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $data = array(
            'date' => $date,
            'datebuka' => $dateawal->tgl_buka,
            'datetutup' => $dateakhir->tgl_tutup,
            'datepengumuman' => $datepengumuman
        );

        $this->load->view('register', $data);
    }

    public function lupa() {
        $date = date("Y-m-d H:i:s");
        $dateawal = $this->Modelpelamar->readTglbuka()->row();
        $dateakhir = $this->Modelpelamar->readTgltutup()->row();
        $row = $this->Modelpelamar->readTgl()->row();
        $datepengumuman = $row->tgl_umum_adm;

        $data = array(
            'date' => $date,
            'dateawal' => $dateawal->tgl_buka,
            'dateakhir' => $dateakhir->tgl_tutup,
            'datepengumuman' => $datepengumuman
        );
        $this->load->view('lupa', $data);
    }

    public function loginProcess() {
        $nik = $this->security->xss_clean($this->input->post('nik', TRUE));
        $password = $this->security->xss_clean($this->input->post('password', TRUE));
        $match = $this->Modellogin->read('tb_user', ['nik' => $nik], null, null);
        // $match = $this->Modellogin->read('tb_user', array('nik' => $nik, 'password' => md5($password)), null, null);
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

            redirect(site_url('dashboard'));
        } else {
            redirect(site_url('login?balasan=1'));
        }
    }

    public function logoutProcess() {
        $this->session->unset_userdata('iduser');
        $this->session->unset_userdata('nik');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        redirect(site_url(''));
    }

    public function reset_password($key) {
        $this->load->helper('url');
        $this->load->model('Modellogin', 'act');
        $id = $this->encryption->decrypt(base64_decode($key));
        $quser = $this->act->get_user_by_id($id);
        if (!empty($quser)) {
            $data['email'] = $quser->email;
        }

        $this->load->view('reset_password', $data);
    }

    public function reset_password_post() {
        $this->load->model('Modellogin', 'act');
        $email = $this->input->post('email');
        $cek_email = $this->act->get_user_by_email($email);

        if (empty($cek_email)) {
            echo json_encode(array('result' => 'email_not_found', 'hasil' => array()));
        } else {
            $username = $cek_email->nik;
            $id_user = $cek_email->id_user;
            $password_baru = $this->passAcak(6);

            //enkripsi id
            $encrypted_id = md5($id_user);
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol'] = "smtp";
            $config['mailtype'] = "html";
            $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
            $config['smtp_port'] = "465";
            $config['smtp_timeout'] = "400";
            $config['smtp_user'] = "rekrutmen.undip@gmail.com"; // isi dengan email kamu
            $config['smtp_pass'] = "Rahasia123_"; // isi dengan password kamu
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
            $message = "
                        <html>
                        <head>
                        <title>Username Password Sistem Asesmen Undip</title>
                        </head>
                        <body>
                        <h4>Anda telah melakukan reset password pada Sistem Asesmen Universitas Diponegoro. Silakan login menggunakan username & password berikut : </h4>
                        <h2>Username : " . $username . "</h2>
                        <h2>Password : " . $password_baru . "</h2>
                        <h2>Tgl Reset : " . date("d-m-Y H:i:s") . "</h2>   

                        
                        </h4>
                        </body>
                        </html>
                        ";

            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);

            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("[success] Reset Password Sistem Rekrutmen Undip");
            $this->email->message($message);
            //notifikasi registrasi berhasil
            if ($this->email->send()) {
                $datapost_user = array(
                    'password' => md5($password_baru),
                    'password_tampil' => $password_baru,
                );

                $hasil = $this->act->update_user($datapost_user, $id_user);

                echo json_encode(array('result' => true, 'hasil' => $hasil));
//                                echo '<span class = "hljs-keyword">echo</span> <span class = "hljs-string">"Berhasil melakukan registrasi, silahkan cek email kamu"</span>';
            } else {
                //notifikasi jika email sudah terkirim atau belum terkirim
//                                echo '<span class = "hljs-keyword">echo</span> <span class = "hljs-string">"Berhasil melakukan registrasi, namu gagal mengirim verifikasi email"</span>';
                echo json_encode(array('result' => "gagal_verifikasi", 'hasil' => $hasil));
            }
        }
    }

    function email_reset_password_validation() {
        $this->load->model('Modellogin', 'act');
        $email = $this->input->post('email_reset');
        $nik = $this->input->post('nik');
        $cek_email = $this->act->get_user_by_email_nik($email, $nik);
//        print_r($nik); die();
        $this->load->helper(array('form', 'url'));
        $this->load->library('session');
//        $captcha = $this->input->post('captcha');
//        if (md5($captcha) == $this->session->userdata('keycode')) {
//            $data['captcha'] = $captcha;
//            $this->session->unset_userdata('keycode');
        if (empty($cek_email)) {
            echo json_encode(array('result' => 'email_not_found', 'hasil' => array()));
        } else {
            $username = $cek_email->nik;
            $id_user = $cek_email->id_user;
            $password_baru = $cek_email->password;

            //enkripsi id
//            $encrypted_id = md5($id_user);
            $encrypted_id = base64_encode($this->encryption->encrypt($id_user));
            $this->load->library('email');
            $config = array();
            $config['charset'] = 'utf-8';
            $config['useragent'] = 'Codeigniter';
            $config['protocol'] = "smtp";
            $config['mailtype'] = "html";
            $config['smtp_host'] = "ssl://smtp.gmail.com"; //pengaturan smtp
            $config['smtp_port'] = "465";
            $config['smtp_timeout'] = "400";
            $config['smtp_user'] = "rekrutmen.undip@gmail.com"; // isi dengan email kamu
            $config['smtp_pass'] = "Rahasia123_"; // isi dengan password kamu
            $config['crlf'] = "\r\n";
            $config['newline'] = "\r\n";
            $config['wordwrap'] = TRUE;
            $message = "
                        <html>
                        <head>
                        <title>Reset Password Sistem Rekrutmen Undip</title>
                        </head>
                        <body>
                        <h4>Anda melakukan permintaan reset password pada Sistem Rekrutmen Universitas Diponegoro. Silakan klik RESET PASSWORD dibawah ini untuk mereset password anda.</h4>
                        <h1><center><a href='" . base_url('index.php/IndexCntrl/reset_password/' . $encrypted_id) . "'>RESET PASSWORD</a></center></h1>
                        
                        </h4>
                        </body>
                        </html>
                        ";

            //memanggil library email dan set konfigurasi untuk pengiriman email
            $this->email->initialize($config);

            //konfigurasi pengiriman
            $this->email->from($config['smtp_user']);
            $this->email->to($email);
            $this->email->subject("Reset Password Sistem Rekrutmen Undip");
            $this->email->message($message);
            //notifikasi registrasi berhasil
            if ($this->email->send()) {
                $datapost_user = array(
                    'password' => $password_baru,
                );

                $hasil = $this->act->update_user($id_user, $datapost_user);

                echo json_encode(array('result' => true, 'hasil' => $hasil));
//                                echo '<span class = "hljs-keyword">echo</span> <span class = "hljs-string">"Berhasil melakukan registrasi, silahkan cek email kamu"</span>';
            } else {
                //notifikasi jika email sudah terkirim atau belum terkirim
//                                echo '<span class = "hljs-keyword">echo</span> <span class = "hljs-string">"Berhasil melakukan registrasi, namu gagal mengirim verifikasi email"</span>';
                echo json_encode(array('result' => 'gagal_verifikasi', 'hasil' => $hasil));
            }
        }
    }

    function passAcak($panjang) {
        $karakter = '';
        $karakter .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'; // karakter alfabet
        $karakter .= '1234567890'; // karakter numerik

        $string = '';
        for ($i = 0; $i < $panjang; $i++) {
            $pos = rand(0, strlen($karakter) - 1);
            $string .= $karakter[$pos];
        }
        return $string;
    }

}
