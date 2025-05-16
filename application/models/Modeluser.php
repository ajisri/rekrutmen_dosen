<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modeluser extends CI_Model{
	function __construct()
    {
		parent::__construct();
		$this->load->database();
	}

	function read($table, $cond, $ordField, $ordType){
		if($cond!=null){
			$this->db->where($cond);
		}
		if($ordField!=null){
			$this->db->order_by($ordField, $ordType);
		}
		$query = $this->db->get($table);
		return $query;
	}
	
	function readverifikatortugas($id){
		$query = $this->db->query("select * from tb_tugas where id_verifikator = ".$id." ");
		return $query;
	}

	function namakualifikasi($id){
		$query = $this->db->query("select * from tb_user join tb_tugas on tb_user.id_user = tb_tugas.id_verifikator where tb_tugas.id_verifikator = ".$id." ");
		return $query;
	}

	function readtugasuser($id){
		$query = $this->db->query("SELECT u.nik AS nik, u.nm_user AS nm_user, u.password_tampil AS password, u.kualifikasi AS kualifikasi, k.nm_kualifikasi AS nm_kualifikasi FROM tb_user AS u JOIN tb_kualifikasi AS k ON FIND_IN_SET(k.id_kualifikasi, u.kualifikasi) WHERE u.id_user = ".$id." ");

		// $query = $this->db->query("SELECT c.name AS city_name, a.name AS airway_name, a.rating AS airway_rating FROM og_city AS c JOIN og_airway AS a ON FIND_IN_SET(a.id, c.airways) WHERE c.id = = ".$id." ");
		return $query;	
	}

	function readnik($id){
		$query = $this->db->query("select * from tb_user where id_user = ".$id." ");
		return $query;
	}

	function create($table, $data){
		$query = $this->db->insert($table, $data);
		return $query;
	}

	function readVerifikator($level){
		$query = $this->db->query('select * from tb_user where level = 2');
		return $query;
	}

	function readUserById($id){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('tb_user.id_user=', $id);

		$query = $this->db->get('');

		return $query;
	}

	function cekNik($nik){
		$this->db->select('*');
		$this->db->from('tb_user');
		$this->db->where('tb_user.nik=', $nik);

		$query = $this->db->get('');

		return $query->num_rows();
	}
	
	function cekAkses($nik){
		$this->db->select('*');
		$this->db->from('tb_akses_masuk');
		$this->db->where('tb_akses_masuk.nik=', $nik);

		$query = $this->db->get('');

		return $query->num_rows();
	}

	function cekEmail($email) {
		$this->db->where('email', $email);
		$query = $this->db->get('tb_user');
		return $query->num_rows();
	}

	function update($cond, $table, $data){
		$this->db->where($cond);
		$query = $this->db->update($table, $data);
		return $query;
	}

	function delete($cond, $table){
		$this->db->where($cond);
		$query = $this->db->delete($table);
		return $query;
	}

	function deletefile($id,$kategori, $table){
		$this->db->where('id_kerjasama=',$id);
		$this->db->where('kategori_file=',$kategori);
		$query = $this->db->delete($table);
		return $query;
	}
}