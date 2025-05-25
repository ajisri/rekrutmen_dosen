<?php
	class Modelpelamar extends CI_Model{
		function __construct(){
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
		
		function create($table, $data){
			$query = $this->db->insert($table, $data);
			return $query;
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
		
		function cekfilepelamar($valueid, $kategori){
			$this->db->select('*');
			$this->db->from('file_upload');
			$this->db->where('file_upload.nik=', $valueid);
			$this->db->where('file_upload.kategori_file=', $kategori);

			$query = $this->db->get('');

			return $query;
		}

		function cekidfilepublikasi($valueid, $id_publikasi){
			$this->db->select('*');
			$this->db->from('file_uploadpublikasi');
			$this->db->where('file_uploadpublikasi.id_pelamar=', $valueid);
			$this->db->where('file_uploadpublikasi.id_publikasi=', $id_publikasi);

			$query = $this->db->get('');

			return $query;
		}

		function cekidfile($valueid, $kategori){
			$this->db->select('*');
			$this->db->from('file_upload');
			$this->db->where('file_upload.nik=', $valueid);
			$this->db->where('file_upload.kategori_file=', $kategori);

			$query = $this->db->get('');

			return $query;
		}
		
		function ceklamaran($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'lamaran'");
			return $query;
		}

		function cekijazah($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'ijazah'");
			return $query;
		}

		function cekijazah2($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'ijazah2'");
			return $query;
		}

		function cekijazah3($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'ijazah3'");
			return $query;
		}

		function cektranskrip($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'transkrip'");
			return $query;
		}

		function cektoefl($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'toefl'");
			return $query;
		}

		function cekakreditasi($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'akreditasi'");
			return $query;
		}

		function cekakreditasi_prodi($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'akreditasiprodi'");
			return $query;
		}

		function cekakreditasi2($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'akreditasi3'");
			return $query;
		}

		function cekakreditasi_prodi2($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'akreditasiprodi2'");
			return $query;
		}
		
		function cekakreditasi3($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'akreditasi3'");
			return $query;
		}

		function cekakreditasi_prodi3($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'akreditasiprodi3'");
			return $query;
		}

		function ceksks($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'sks'");
			return $query;
		}

		function cekskck($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'skck'");
			return $query;
		}

		function cekktp($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'ktp'");
			return $query;
		}

		function cekfoto($id){
			$query = $this->db->query("select * from file_upload where nik = ".$id." and kategori_file = 'foto'");
			return $query;
		}
		
		function cekDataIdFileLamaran($idpelamar, $kategori){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = '.$kategori.' ");
			return $query;
		}
		
		function cekDataIdFileKtp($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'ktp' ");
			return $query;
		}
		
		function cekDataIdFileFoto($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'foto' ");
			return $query;
		}
		
		function cekDataIdFileSks($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'sks' ");
			return $query;
		}
		
		function cekDataIdFileSkck($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'skck' ");
			return $query;
		}
		
		function cekDataIdFileSuratpernyataanbebasparpol($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'suratpernyataanbebasparpol' ");
			return $query;
		}
		
		function cekDataIdFileIjazah($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'ijazah' ");
			return $query;
		}
		
		function cekDataIdFileTranskrip($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'transkrip' ");
			return $query;
		}
		
		function cekDataIdFilePenyetaraan($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'penyetaraan' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasipt($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasi' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasips($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasiprodi' ");
			return $query;
		}
		
		function cekDataIdFileIjazah1($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'ijazah1' ");
			return $query;
		}
		
		function cekDataIdFileTranskrip1($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'transkrip1' ");
			return $query;
		}
		
		function cekDataIdFilePenyetaraan1($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'penyetaraan1' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasipt1($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasi1' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasips1($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasiprodi1' ");
			return $query;
		}
		
		function cekDataIdFileIjazah2($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'ijazah2' ");
			return $query;
		}
		
		function cekDataIdFileTranskrip2($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'transkrip2' ");
			return $query;
		}
		
		function cekDataIdFilePenyetaraan2($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'penyetaraan2' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasipt2($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasi2' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasips2($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasiprodi2' ");
			return $query;
		}
		
		function cekDataIdFileIjazah3($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'ijazah3' ");
			return $query;
		}
		
		function cekDataIdFileTranskrip3($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'transkrip3' ");
			return $query;
		}
		
		function cekDataIdFilePenyetaraan3($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'penyetaraan3' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasipt3($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasi3' ");
			return $query;
		}
		
		function cekDataIdFileAkreditasips3($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'akreditasiprodi3' ");
			return $query;
		}
		
		function cekDataIdFileSertifikat($idpelamar){
			$query = $this->db->query("select * from file_upload where nik=".$idpelamar." and kategori_file = 'sertifikat' ");
			return $query;
		}
		
		function cekKodeUnik($kode_unik){
			$query = $this->db->query('select * from file_upload where kode_unik="$kode_unik" ');
			return $query;
		}

		public function isFileNameExists($fileName, $table) {
			$this->db->where('nama_file', $fileName);
			$query = $this->db->get($table);
			return $query->num_rows() > 0; // Mengembalikan true jika nama file sudah ada
		}

		
		function cekIdFileUpload($idfile){
			$query = $this->db->query('select * from file_upload where id_file = ".$idfile." ');
			return $query;
		}

		function cekPelamar($nik){
			$query = $this->db->query("select * from tb_pelamar join file_upload on tb_pelamar.id_pelamar = file_upload.nik where tb_pelamar.ktp = ".$nik." ");
			return $query;
		}
		
		function cekstatuspelamarditolak(){
			$query = $this->db->query("select * from tb_pelamar where status = 2");
			return $query;
		}

		function cekstatuspelamarterima(){
			$query = $this->db->query("select * from tb_pelamar where status = 1");
			return $query;
		}

		function cekstatuspelamarbelumproses(){
			$query = $this->db->query("select * from tb_pelamar where status = 3");
			return $query;
		}

		function cekpelamarterdaftar(){
			// $query = $this->db->query("select * from tb_pelamar join file_upload on tb_pelamar.id_pelamar = file_upload.nik");
			$query = $this->db->query("select * from tb_pelamar");
			return $query;
		}
		
		function cekjml_kebutuhan(){
			$query = $this->db->query("select count(jml_kebutuhan) from tb_kualifikasi");
			return $query;
		}
		
		function dataPilihanPendidikanTerakhir($jenjang){
			$query = $this->db->query("select * from ijazah where id != '$jenjang' ");
			return $query;
		}
		
		function getPilihanFormasi($formasi){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_kualifikasi.id_kualifikasi != '$formasi'");
			return $query;
		}
		
		function formasiPelamar($a){
			$query = $this->db->query("select * from tb_kualifikasi where id_kualifikasi = '$a' ");
			return $query;
		}
		
		function getFormasi($formasi){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_kualifikasi.id_kualifikasi = '$formasi'");
			return $query;
		}
		
		//tb_pelamar dan tb_bhnverifikasi
		// function hitungJmlLolosAdministrasi($idkualifikasi){
			// $query = $this->db->query("SELECT * FROM (SELECT a.*, IF(a.akreditasi_kampus IS NOT NULL AND a.akreditasi_kampus <> '', IF(a.akreditasi_kampus <= b.min_akreditasipt, 1, 0), 1) as status_akreditasi_kampus, IF(a.akreditasi_prodi IS NOT NULL AND a.akreditasi_prodi <> '', IF(a.akreditasi_prodi <= b.min_akreditasips, 1, 0), 1) as status_akreditasi_prodi, IF(a.akreditasi_kampus1 IS NOT NULL AND a.akreditasi_kampus1 <> '', IF(a.akreditasi_kampus1 <= b.min_akreditasipt1, 1, 0), 1) as status_akreditasi_kampus1, IF(a.akreditasi_prodi1 IS NOT NULL AND a.akreditasi_prodi1 <> '', IF(a.akreditasi_prodi1 <= b.min_akreditasips1, 1, 0), 1) as status_akreditasi_prodi1, IF(a.akreditasi_kampus2 IS NOT NULL AND a.akreditasi_kampus2 <> '', IF(a.akreditasi_kampus2 <= b.min_akreditasipt2, 1, 0), 1) as status_akreditasi_kampus2, IF(a.akreditasi_prodi2 IS NOT NULL AND a.akreditasi_prodi2 <> '', IF(a.akreditasi_prodi2 <= b.min_akreditasips2, 1, 0), 1) as status_akreditasi_prodi2, IF(a.akreditasi_kampus3 IS NOT NULL AND a.akreditasi_kampus3 <> '', IF(a.akreditasi_kampus3 <= b.min_akreditasipt3, 1, 0), 1) as status_akreditasi_kampus3, IF(a.akreditasi_prodi3 IS NOT NULL AND a.akreditasi_prodi3 <> '', IF(a.akreditasi_prodi3 <= b.min_akreditasips3, 1, 0), 1) as status_akreditasi_prodi3, IF(a.ipk1 IS NOT NULL AND a.ipk1 <> '', IF(a.ipk1 >= b.ipk1, 1, 0), 1) as status_ipk1, IF(a.ipk3 IS NOT NULL AND a.ipk3 <> '', IF(a.ipk3 >= b.ipk3, 1, 0), 1) as status_ipk3, IF(a.toefl IS NOT NULL AND a.toefl <> '', IF(LOWER(a.jenis_toefl) = 'ITP' AND a.toefl >= 550, 1, IF(LOWER(a.jenis_toefl) = 'Lain-lain' AND a.toefl >= 550, 1, IF(LOWER(a.jenis_toefl) = 'IELTS' AND a.toefl >= 5.5, 1, 0))), 0) as status_toefl, b.min_akreditasipt as min_akreditasipt, b.min_akreditasipt1 as min_akreditasipt1, b.min_akreditasipt2 as min_akreditasipt2, b.min_akreditasipt3 as min_akreditasipt3, b.min_akreditasips as min_akreditasips, b.min_akreditasips1 as min_akreditasips1, b.min_akreditasips2 as min_akreditasips2, b.min_akreditasips3 as min_akreditasips3, b.ipk as min_ipk, b.ipk1 as min_ipk1, b.ipk2 as min_ipk2, b.ipk3 as min_ipk3 FROM tb_pelamar a LEFT JOIN tb_bahanverifikasi b ON a.id_kualifikasi = b.id_kualifikasi WHERE a.ipk2 IS NOT NULL AND a.ipk2 <> '' AND a.ipk >= b.ipk AND a.ipk2 >= b.ipk2 AND a.id_kualifikasi = $idkualifikasi AND a.status_berkasadmin = 'ok') as result WHERE result.status_ipk1 = 1 AND result.status_ipk3 = 1 AND result.status_toefl = 1 AND result.status_akreditasi_kampus = 1 AND result.status_akreditasi_kampus1 = 1 AND result.status_akreditasi_kampus2 = 1 AND result.status_akreditasi_kampus3 = 1 AND result.status_akreditasi_prodi = 1 AND result.status_akreditasi_prodi1 = 1 AND result.status_akreditasi_prodi2 = 1 AND result.status_akreditasi_prodi3 = 1");
			// return $query;
		// }
		
		//tb_dataverifikasi dan tb_bhnverifikasi
		//query hitungJmlLolosAdministrasi mempertimbangkan ipk ada atau tidak
		//SELECT * FROM (SELECT a.*, IF(a.ket_akreditasipt IS NOT NULL AND a.ket_akreditasipt <> '', IF(a.ket_akreditasipt <= b.min_akreditasipt, 1, 0), 1) as status_akreditasi_kampus, IF(a.ket_akreditasiprodi IS NOT NULL AND a.ket_akreditasiprodi <> '', IF(a.ket_akreditasiprodi <= b.min_akreditasips, 1, 0), 1) as status_akreditasi_prodi, IF(a.ket_akreditasipt1 IS NOT NULL AND a.ket_akreditasipt1 <> '', IF(a.ket_akreditasipt1 <= b.min_akreditasipt1, 1, 0), 1) as status_akreditasi_kampus1, IF(a.ket_akreditasiprodi1 IS NOT NULL AND a.ket_akreditasiprodi1 <> '', IF(a.ket_akreditasiprodi1 <= b.min_akreditasips1, 1, 0), 1) as status_akreditasi_prodi1, IF(a.ket_akreditasipt2 IS NOT NULL AND a.ket_akreditasipt2 <> '', IF(a.ket_akreditasipt2 <= b.min_akreditasipt2, 1, 0), 1) as status_akreditasi_kampus2, IF(a.ket_akreditasiprodi2 IS NOT NULL AND a.ket_akreditasiprodi2 <> '', IF(a.ket_akreditasiprodi2 <= b.min_akreditasips2, 1, 0), 1) as status_akreditasi_prodi2, IF(a.ket_akreditasipt3 IS NOT NULL AND a.ket_akreditasipt3 <> '', IF(a.ket_akreditasipt3 <= b.min_akreditasipt3, 1, 0), 1) as status_akreditasi_kampus3, IF(a.ket_akreditasiprodi3 IS NOT NULL AND a.ket_akreditasiprodi3 <> '', IF(a.ket_akreditasiprodi3 <= b.min_akreditasips3, 1, 0), 1) as status_akreditasi_prodi3, IF(a.ket_transkripipk IS NOT NULL AND a.ket_transkripipk <> '', IF(a.ket_transkripipk >= b.ipk, 1, 0), 1) as status_ipk, IF(a.ket_transkripipk1 IS NOT NULL AND a.ket_transkripipk1 <> '', IF(a.ket_transkripipk1 >= b.ipk1, 1, 0), 1) as status_ipk1, IF(a.ket_transkripipk2 IS NOT NULL AND a.ket_transkripipk2 <> '', IF(a.ket_transkripipk2 >= b.ipk2, 1, 0), 1) as status_ipk2, IF(a.ket_transkripipk3 IS NOT NULL AND a.ket_transkripipk3 <> '', IF(a.ket_transkripipk3 >= b.ipk3, 1, 0), 1) as status_ipk3, IF(a.ket_toefl IS NOT NULL AND a.ket_toefl <> '', IF(LOWER(a.ket_jenistoefl) = 'ITP' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'Lain-lain' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'IELTS' AND a.ket_toefl >= 5.5, 1, 0))), 0) as status_toefl, b.min_akreditasipt as min_akreditasipt, b.min_akreditasipt1 as min_akreditasipt1, b.min_akreditasipt2 as min_akreditasipt2, b.min_akreditasipt3 as min_akreditasipt3, b.min_akreditasips as min_akreditasips, b.min_akreditasips1 as min_akreditasips1, b.min_akreditasips2 as min_akreditasips2, b.min_akreditasips3 as min_akreditasips3, b.ipk as min_ipk, b.ipk1 as min_ipk1, b.ipk2 as min_ipk2, b.ipk3 as min_ipk3 FROM tb_dataverifikasi a LEFT JOIN tb_bahanverifikasi b ON a.id_kualifikasi = b.id_kualifikasi WHERE a.id_kualifikasi = $idkualifikasi AND a.status_berkasadmin = 'ok') as result WHERE result.status_ipk = 1 AND result.status_ipk1 = 1 AND result.status_ipk2 = 1 AND result.status_ipk3 = 1 AND result.status_toefl = 1 AND result.status_akreditasi_kampus = 1 AND result.status_akreditasi_kampus1 = 1 AND result.status_akreditasi_kampus2 = 1 AND result.status_akreditasi_kampus3 = 1 AND result.status_akreditasi_prodi = 1 AND result.status_akreditasi_prodi1 = 1 AND result.status_akreditasi_prodi2 = 1 AND result.status_akreditasi_prodi3 = 1
		
		//tb_dataverifikasi dan tb_bhnverifikasi
		//query hitungJmlLolosAdministrasi tidak mempertimbangkan ipk utk lulusan luar negeri
		//SELECT * FROM (SELECT a.*, IF(a.ket_akreditasipt IS NOT NULL AND a.ket_akreditasipt <> '', IF(a.ket_akreditasipt <= b.min_akreditasipt, 1, 0), 1) as status_akreditasi_kampus, IF(a.ket_akreditasiprodi IS NOT NULL AND a.ket_akreditasiprodi <> '', IF(a.ket_akreditasiprodi <= b.min_akreditasips, 1, 0), 1) as status_akreditasi_prodi, IF(a.ket_akreditasipt1 IS NOT NULL AND a.ket_akreditasipt1 <> '', IF(a.ket_akreditasipt1 <= b.min_akreditasipt1, 1, 0), 1) as status_akreditasi_kampus1, IF(a.ket_akreditasiprodi1 IS NOT NULL AND a.ket_akreditasiprodi1 <> '', IF(a.ket_akreditasiprodi1 <= b.min_akreditasips1, 1, 0), 1) as status_akreditasi_prodi1, IF(a.ket_akreditasipt2 IS NOT NULL AND a.ket_akreditasipt2 <> '', IF(a.ket_akreditasipt2 <= b.min_akreditasipt2, 1, 0), 1) as status_akreditasi_kampus2, IF(a.ket_akreditasiprodi2 IS NOT NULL AND a.ket_akreditasiprodi2 <> '', IF(a.ket_akreditasiprodi2 <= b.min_akreditasips2, 1, 0), 1) as status_akreditasi_prodi2, IF(a.ket_akreditasipt3 IS NOT NULL AND a.ket_akreditasipt3 <> '', IF(a.ket_akreditasipt3 <= b.min_akreditasipt3, 1, 0), 1) as status_akreditasi_kampus3, IF(a.ket_akreditasiprodi3 IS NOT NULL AND a.ket_akreditasiprodi3 <> '', IF(a.ket_akreditasiprodi3 <= b.min_akreditasips3, 1, 0), 1) as status_akreditasi_prodi3, IF(a.asal_sekolah = 'Dalam Negeri', IF(a.ket_transkripipk >= b.ipk, 1,  0), 1) as status_ipk, IF(a.asal_sekolah1 = 'Dalam Negeri', IF(a.ket_transkripipk1 >= b.ipk1, 1, 0), 1) as status_ipk1, IF(a.asal_sekolah2 = 'Dalam Negeri', IF(a.ket_transkripipk2 >= b.ipk2, 1, 0), 1) as status_ipk2, IF(a.asal_sekolah3 = 'Dalam Negeri', IF(a.ket_transkripipk3 >= b.ipk3, 1, 0), 1) as status_ipk3, IF(a.ket_toefl IS NOT NULL AND a.ket_toefl <> '', IF(LOWER(a.ket_jenistoefl) = 'ITP' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'Lain-lain' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'IELTS' AND a.ket_toefl >= 5.5, 1, 0))), 0) as status_toefl, b.min_akreditasipt as min_akreditasipt, b.min_akreditasipt1 as min_akreditasipt1, b.min_akreditasipt2 as min_akreditasipt2, b.min_akreditasipt3 as min_akreditasipt3, b.min_akreditasips as min_akreditasips, b.min_akreditasips1 as min_akreditasips1, b.min_akreditasips2 as min_akreditasips2, b.min_akreditasips3 as min_akreditasips3, b.ipk as min_ipk, b.ipk1 as min_ipk1, b.ipk2 as min_ipk2, b.ipk3 as min_ipk3 FROM tb_dataverifikasi a LEFT JOIN tb_bahanverifikasi b ON a.id_kualifikasi = b.id_kualifikasi WHERE a.id_kualifikasi = $idkualifikasi AND a.status_berkasadmin = 'ok') as result WHERE result.status_ipk = 1 AND result.status_ipk1 = 1 AND result.status_ipk2 = 1 AND result.status_ipk3 = 1 AND result.status_toefl = 1 AND result.status_akreditasi_kampus = 1 AND result.status_akreditasi_kampus1 = 1 AND result.status_akreditasi_kampus2 = 1 AND result.status_akreditasi_kampus3 = 1 AND result.status_akreditasi_prodi = 1 AND result.status_akreditasi_prodi1 = 1 AND result.status_akreditasi_prodi2 = 1 AND result.status_akreditasi_prodi3 = 1
		
		//tb_dataverifikasi dan tb_bhnverifikasi
		//query hitungJmlLolosAdministrasi mempertimbangkan ipk pada tb_dataverifikasi. Jika ada inputan ipk maka dibandingkan dengan tb_bahanverifikasi, jika tidak ada inputan ipk maka tidak dibandingkan
		// SELECT * FROM (SELECT a.*, IF(a.ket_akreditasipt IS NOT NULL AND a.ket_akreditasipt <> '', IF(a.ket_akreditasipt <= b.min_akreditasipt, 1, 0), 1) as status_akreditasi_kampus, IF(a.ket_akreditasiprodi IS NOT NULL AND a.ket_akreditasiprodi <> '', IF(a.ket_akreditasiprodi <= b.min_akreditasips, 1, 0), 1) as status_akreditasi_prodi, IF(a.ket_akreditasipt1 IS NOT NULL AND a.ket_akreditasipt1 <> '', IF(a.ket_akreditasipt1 <= b.min_akreditasipt1, 1, 0), 1) as status_akreditasi_kampus1, IF(a.ket_akreditasiprodi1 IS NOT NULL AND a.ket_akreditasiprodi1 <> '', IF(a.ket_akreditasiprodi1 <= b.min_akreditasips1, 1, 0), 1) as status_akreditasi_prodi1, IF(a.ket_akreditasipt2 IS NOT NULL AND a.ket_akreditasipt2 <> '', IF(a.ket_akreditasipt2 <= b.min_akreditasipt2, 1, 0), 1) as status_akreditasi_kampus2, IF(a.ket_akreditasiprodi2 IS NOT NULL AND a.ket_akreditasiprodi2 <> '', IF(a.ket_akreditasiprodi2 <= b.min_akreditasips2, 1, 0), 1) as status_akreditasi_prodi2, IF(a.ket_akreditasipt3 IS NOT NULL AND a.ket_akreditasipt3 <> '', IF(a.ket_akreditasipt3 <= b.min_akreditasipt3, 1, 0), 1) as status_akreditasi_kampus3, IF(a.ket_akreditasiprodi3 IS NOT NULL AND a.ket_akreditasiprodi3 <> '', IF(a.ket_akreditasiprodi3 <= b.min_akreditasips3, 1, 0), 1) as status_akreditasi_prodi3, IF(a.ket_transkripipk IS NOT NULL AND a.ket_transkripipk <> '', IF(a.ket_transkripipk >= b.ipk, 1, 0), 1) as status_ipk, IF(a.ket_transkripipk1 IS NOT NULL AND a.ket_transkripipk1 <> '', IF(a.ket_transkripipk1 >= b.ipk1, 1, 0), 1) as status_ipk1, IF(a.ket_transkripipk2 IS NOT NULL AND a.ket_transkripipk2 <> '', IF(a.ket_transkripipk2 >= b.ipk2, 1, 0), 1) as status_ipk2, IF(a.ket_transkripipk3 IS NOT NULL AND a.ket_transkripipk3 <> '', IF(a.ket_transkripipk3 >= b.ipk3, 1, 0), 1) as status_ipk3, IF(a.ket_toefl IS NOT NULL AND a.ket_toefl <> '', IF(LOWER(a.ket_jenistoefl) = 'ITP' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'Lain-lain' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'IELTS' AND a.ket_toefl >= 5.5, 1, 0))), 0) as status_toefl, b.min_akreditasipt as min_akreditasipt, b.min_akreditasipt1 as min_akreditasipt1, b.min_akreditasipt2 as min_akreditasipt2, b.min_akreditasipt3 as min_akreditasipt3, b.min_akreditasips as min_akreditasips, b.min_akreditasips1 as min_akreditasips1, b.min_akreditasips2 as min_akreditasips2, b.min_akreditasips3 as min_akreditasips3, b.ipk as min_ipk, b.ipk1 as min_ipk1, b.ipk2 as min_ipk2, b.ipk3 as min_ipk3 FROM tb_dataverifikasi a LEFT JOIN tb_bahanverifikasi b ON a.id_kualifikasi = b.id_kualifikasi WHERE a.id_kualifikasi = $idkualifikasi AND a.status_berkasadmin = 'ok') as result WHERE result.status_ipk = 1 AND result.status_ipk1 = 1 AND result.status_ipk2 = 1 AND result.status_ipk3 = 1 AND result.status_toefl = 1 AND result.status_akreditasi_kampus = 1 AND result.status_akreditasi_kampus1 = 1 AND result.status_akreditasi_kampus2 = 1 AND result.status_akreditasi_kampus3 = 1 AND result.status_akreditasi_prodi = 1 AND result.status_akreditasi_prodi1 = 1 AND result.status_akreditasi_prodi2 = 1 AND result.status_akreditasi_prodi3 = 1
		
		//tb_dataverifikasi dan tb_bhnverifikasi
		//query hitungJmlLolosAdministrasi mempertimbangkan ipk pada tb_dataverifikasi. Jika ada inputan ipk maka dibandingkan dengan tb_bahanverifikasi, jika tidak ada inputan ipk maka tidak dibandingkan
		function hitungJmlLolosAdministrasi($idkualifikasi){
			$query = $this->db->query("SELECT * FROM (SELECT a.*, IF(a.ket_akreditasipt IS NOT NULL AND a.ket_akreditasipt <> '', IF(a.ket_akreditasipt <= b.min_akreditasipt, 1, 0), 1) as status_akreditasi_kampus, IF(a.ket_akreditasiprodi IS NOT NULL AND a.ket_akreditasiprodi <> '', IF(a.ket_akreditasiprodi <= b.min_akreditasips, 1, 0), 1) as status_akreditasi_prodi, IF(a.ket_akreditasipt1 IS NOT NULL AND a.ket_akreditasipt1 <> '', IF(a.ket_akreditasipt1 <= b.min_akreditasipt1, 1, 0), 1) as status_akreditasi_kampus1, IF(a.ket_akreditasiprodi1 IS NOT NULL AND a.ket_akreditasiprodi1 <> '', IF(a.ket_akreditasiprodi1 <= b.min_akreditasips1, 1, 0), 1) as status_akreditasi_prodi1, IF(a.ket_akreditasipt2 IS NOT NULL AND a.ket_akreditasipt2 <> '', IF(a.ket_akreditasipt2 <= b.min_akreditasipt2, 1, 0), 1) as status_akreditasi_kampus2, IF(a.ket_akreditasiprodi2 IS NOT NULL AND a.ket_akreditasiprodi2 <> '', IF(a.ket_akreditasiprodi2 <= b.min_akreditasips2, 1, 0), 1) as status_akreditasi_prodi2, IF(a.ket_akreditasipt3 IS NOT NULL AND a.ket_akreditasipt3 <> '', IF(a.ket_akreditasipt3 <= b.min_akreditasipt3, 1, 0), 1) as status_akreditasi_kampus3, IF(a.ket_akreditasiprodi3 IS NOT NULL AND a.ket_akreditasiprodi3 <> '', IF(a.ket_akreditasiprodi3 <= b.min_akreditasips3, 1, 0), 1) as status_akreditasi_prodi3, IF(a.ket_transkripipk IS NOT NULL AND a.ket_transkripipk <> '', IF(a.ket_transkripipk >= b.ipk, 1, 0), 1) as status_ipk, IF(a.ket_transkripipk1 IS NOT NULL AND a.ket_transkripipk1 <> '', IF(a.ket_transkripipk1 >= b.ipk1, 1, 0), 1) as status_ipk1, IF(a.ket_transkripipk2 IS NOT NULL AND a.ket_transkripipk2 <> '', IF(a.ket_transkripipk2 >= b.ipk2, 1, 0), 1) as status_ipk2, IF(a.ket_transkripipk3 IS NOT NULL AND a.ket_transkripipk3 <> '', IF(a.ket_transkripipk3 >= b.ipk3, 1, 0), 1) as status_ipk3, IF(a.ket_toefl IS NOT NULL AND a.ket_toefl <> '', IF(LOWER(a.ket_jenistoefl) = 'ITP' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'Lain-lain' AND a.ket_toefl >= 550, 1, IF(LOWER(a.ket_jenistoefl) = 'IELTS' AND a.ket_toefl >= 5.5, 1, 0))), 0) as status_toefl, b.min_akreditasipt as min_akreditasipt, b.min_akreditasipt1 as min_akreditasipt1, b.min_akreditasipt2 as min_akreditasipt2, b.min_akreditasipt3 as min_akreditasipt3, b.min_akreditasips as min_akreditasips, b.min_akreditasips1 as min_akreditasips1, b.min_akreditasips2 as min_akreditasips2, b.min_akreditasips3 as min_akreditasips3, b.ipk as min_ipk, b.ipk1 as min_ipk1, b.ipk2 as min_ipk2, b.ipk3 as min_ipk3 FROM tb_dataverifikasi a LEFT JOIN tb_bahanverifikasi b ON a.id_kualifikasi = b.id_kualifikasi WHERE a.id_kualifikasi = $idkualifikasi AND a.status_berkasadmin = 'ok') as result WHERE result.status_ipk = 1 AND result.status_ipk1 = 1 AND result.status_ipk2 = 1 AND result.status_ipk3 = 1 AND result.status_toefl = 1 AND result.status_akreditasi_kampus = 1 AND result.status_akreditasi_kampus1 = 1 AND result.status_akreditasi_kampus2 = 1 AND result.status_akreditasi_kampus3 = 1 AND result.status_akreditasi_prodi = 1 AND result.status_akreditasi_prodi1 = 1 AND result.status_akreditasi_prodi2 = 1 AND result.status_akreditasi_prodi3 = 1");
			return $query;
		}
		
		function idnik($nik){
			$query = $this->db->query("select id_pelamar from tb_pelamar where ktp=".$nik." ");
			return $query;
		}
		
		function tbPelamarjoinTbDataVerifikasi($idpelamar){
			$query = $this->db->query("select * from tb_pelamar left join tb_dataverifikasi on tb_pelamar.id_pelamar = tb_dataverifikasi.id_pelamardataverifikasi");
			return $query;
		}
		
		function jmlpelamarper(){
			$query = $this->db->query("select * from tb_kualifikasi");
			return $query;
		}
		
		function jml_pelamarperformasi(){
			$query = $this->db->query("SELECT a.*, b.*, sum(CASE WHEN a.status NOT IN ('1', '3') then 1 ELSE 0 end) as ditolak, sum(CASE WHEN a.status IN ('3') then 1 ELSE 0 END  ) as diproses, sum(CASE WHEN a.status IN ('1') then 1 ELSE 0 END) as disetuju FROM tb_pelamar a right JOIN tb_kualifikasi b ON a.id_kualifikasi = b.id_kualifikasi GROUP BY b.id_kualifikasi");
			return $query;
		}
		
		function joinTbpelamardanTbdataverifikasi($idpelamar){
			$query = $this->db->query("select * from tb_pelamar join tb_dataverifikasi on tb_pelamar.id_pelamar = tb_dataverifikasi.id_pelamardataverifikasi where tb_pelamar.id_pelamar = $idpelamar");
			return $query;
		}
		
		function namapelamardankualifikasi($id){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.id_pelamar = ".$id." ");
			return $query;
		}
		
		function no_pendaftaran(){
			$query = $this->db->query('select no_pendaftaran from tb_pelamar where no_pendaftaran != NULL or no_pendaftaran != "" ')->num_rows()+1;
			return $query;
		}
		
		function Pelamar($nik){
			$query = $this->db->query("select * from tb_pelamar join file_upload on tb_pelamar.id_pelamar = file_upload.nik where tb_pelamar.id_pelamar = ".$nik." ");
			return $query;
		}
		
		function pilihanPendidikanTerakhir($nik){
			$query = $this->db->query("select * from tb_pelamar join ijazah on tb_pelamar.pendidikan_terakhir = ijazah.id where tb_pelamar.ktp = '$nik' ");
			return $query;
		}
		
		function pilihanAsalSekolah($pelamarasalsekolah){
			$query = $this->db->query("select asal_sekolah from tb_asalsekolah where asal_sekolah != '$pelamarasalsekolah'");
			return $query;
		}

		function getSelectedPublikasi($nik) {
			$this->db->select('id_jenispublikasi');
			$this->db->from('tb_publikasi');
			$this->db->where('nik', $nik);
			return $this->db->get()->row(); // Hanya ambil ID yang dipilih (jika ada)
		}
		
		function pilihanAgama($pelamaragama){
			$query = $this->db->query("select agama from tb_agama where agama != '$pelamaragama'");
			return $query;
		}
		
		function pilihanStatusKawin($status_kawin){
			$query = $this->db->query("select status_kawin from tb_status_kawin where status_kawin != '$status_kawin'");
			return $query;
		}
		
		function pilihanFormasi($formasi){
			$query = $this->db->query("select * from tb_kualifikasi where id_kualifikasi != '$formasi'");
			return $query;
		}
		
		function readTglbuka(){
			$query = $this->db->query("select tgl_buka from tb_jadwal where status='Aktif'");
			return $query;
		}
		
		function readTgltutup(){
			$query = $this->db->query("select tgl_tutup from tb_jadwal where status='Aktif'");
			return $query;
		}
		
		function readTgl(){
			$query = $this->db->query("select * from tb_jadwal where status='Aktif'");
			return $query;
		}

		function readLast($table,$id){
			$this->db->select($id.' as id');
			$this->db->from($table);
			$this->db->order_by($id, 'DESC');
			$this->db->limit('1');

			$query = $this->db->get('');

			foreach ($query->result() as $key) {
				$idtabel = $key->id;
			}

			return $idtabel;
		}

		function readDataPelamarPublikasi($nik) {
    $query = $this->db->query("
        SELECT tb_publikasi.*, 
               tb_jenispublikasi.jenis_publikasi, 
               file_uploadpublikasi.path_file 
        FROM tb_publikasi 
        LEFT JOIN tb_jenispublikasi ON tb_publikasi.id_jenispublikasi = tb_jenispublikasi.id_jenispublikasi 
        LEFT JOIN file_uploadpublikasi ON tb_publikasi.id_publikasi = file_uploadpublikasi.id_publikasi 
        WHERE tb_publikasi.nik = '$nik'
    ");
    return $query->result();
}

		function readDataPelamarPublikasiId($id){
			$query = $this->db->query("select * from tb_publikasi left join tb_jenispublikasi on tb_publikasi.id_jenispublikasi = tb_jenispublikasi.id_jenispublikasi where tb_publikasi.id_publikasi = '$id'");
			return $query;
		}

		function readDataPelamarPublikasiExceptId($id){
			$query = $this->db->query("select * from tb_jenispublikasi where id_jenispublikasi != '$id'");
			return $query;
		}

		function readDataPelamar($nik){
			$query = $this->db->query("select * from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		function readDataPelamarAsesor($no_dftr){
			$query = $this->db->query("select * from tb_pelamar where no_pendaftaran = '$no_dftr'");
			return $query;
		}
		
		function readDataPelamarId($id){
			$query = $this->db->query("select * from tb_pelamar where id_pelamar = '$id'");
			return $query;
		}
		
		function readDataVerifikasiPelamarId($id){
			$query = $this->db->query("select * from tb_pelamar left join tb_dataverifikasi on tb_pelamar.id_pelamar = tb_dataverifikasi.id_pelamardataverifikasi where tb_pelamar.id_pelamar = '$id'");
			return $query;
		}

		function getAllJenisPublikasi() {
			return $this->db->get('tb_jenispublikasi')->result(); // Ambil semua data dari tb_jenispublikasi
		}
		
		function readAgama($nik){
			$query = $this->db->query("select agama from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		function readAgamaAsesor($no_dftr){
			$query = $this->db->query("select agama from tb_pelamar where no_pendaftaran = '$no_dftr'");
			return $query;
		}
		
		function readStatusKawin($nik){
			$query = $this->db->query("select status_menikah from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		function readStatusKawinAsesor($no_dftr){
			$query = $this->db->query("select status_menikah from tb_pelamar where no_pendaftaran = '$no_dftr'");
			return $query;
		}
		
		function readAsalSekolah($nik){
			$query = $this->db->query("select asal_sekolah from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		function readAsalSekolah1($nik){
			$query = $this->db->query("select asal_sekolah1 from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		function readAsalSekolah2($nik){
			$query = $this->db->query("select asal_sekolah2 from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		function readAsalSekolah3($nik){
			$query = $this->db->query("select asal_sekolah3 from tb_pelamar where ktp = '$nik'");
			return $query;
		}
		
		//lolos skd skb tb_lolostahapdua
		function readstatuspelamarskdskb($nik){
			$query = $this->db->query("SELECT * FROM tb_lolostahapdua JOIN tb_pelamar ON tb_lolostahapdua.nik = tb_pelamar.ktp where tb_pelamar.ktp='$nik'");
			return $query;
		}
		//lolos skd skb tb_lolostahaptiga
		function readlolostahapskdskb($nik){
			$query = $this->db->query("select * from tb_lolostahaptiga left join tb_lolostahapdua on tb_lolostahaptiga.nik = tb_lolostahapdua.nik where tb_lolostahapdua.nik='$nik'");
			return $query;
		}

		//lolosfinal
		function readlolosfinal($nik){
			$query = $this->db->query("select * from tb_lolosfinal left join tb_lolostahapdua on tb_lolosfinal.nik = tb_lolostahapdua.nik where tb_lolostahapdua.nik='$nik'");
			return $query;
		}
		
		function readstatuspelamar($nik){
			$query = $this->db->query("select status from tb_pelamar where ktp='$nik'");
			return $query;
		}

		function readlolostahaponline(){
			$query = $this->db->query("select * from tb_pelamar where status = '1' order by id_kualifikasi asc");
			return $query;
		}

		function readfotopsertatahapdua(){
			$query = $this->db->query("select distinct nama_pelamar, jenis_kelamin, pendidikan, prodi, ipk, thn_lulus, nm_kampus, pendidikan1, prodi1, ipk1, thn_lulus1, nm_kampus1, pendidikan2, prodi2, ipk2, thn_lulus2, nm_kampus2, pendidikan3, prodi3, ipk3, thn_lulus3, nm_kampus3,kode_kualifikasi, nm_kualifikasi, penempatan, kategori_file, path_file from tb_lolostahapdua join tb_pelamar on tb_lolostahapdua.nik = tb_pelamar.ktp join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi join file_upload on tb_pelamar.id_pelamar = file_upload.nik where file_upload.kategori_file = 'foto' order by tb_lolostahapdua.kode_formasi asc, tb_lolostahapdua.nama_lengkap asc");
			return $query->result();
		}
	
		// foto / ijazah tok
		function readfotopsertatahaptiga(){
			$query = $this->db->query("select distinct tb_lolostahaptiga.noujian, tb_pelamar.nama_pelamar as nama_pelamarr, id_pelamar, jenis_kelamin, pendidikan, prodi, ipk, thn_lulus, nm_kampus, pendidikan1, prodi1, ipk1, thn_lulus1, nm_kampus1, pendidikan2, prodi2, ipk2, thn_lulus2, nm_kampus2, pendidikan3, prodi3, ipk3, thn_lulus3, nm_kampus3,kode_kualifikasi, nm_kualifikasi, penempatan, kategori_file, path_file from tb_lolostahaptiga left join tb_lolostahapdua on tb_lolostahaptiga.noujian = tb_lolostahapdua.noujian join tb_pelamar on tb_lolostahapdua.nik = tb_pelamar.ktp join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi join file_upload on tb_pelamar.id_pelamar = file_upload.nik where file_upload.kategori_file = 'ijazah' order by tb_lolostahaptiga.kode_formasi asc, tb_lolostahaptiga.nama_pelamar asc");
			return $query->result();
		}
		
		//lampiran kabeh
		// function readfotopsertatahaptiga(){
			// $query = $this->db->query("select distinct tb_lolostahaptiga.noujian, tb_pelamar.nama_pelamar as nama_pelamarr, id_pelamar, jenis_kelamin, pendidikan, prodi, ipk, thn_lulus, nm_kampus, pendidikan1, prodi1, ipk1, thn_lulus1, nm_kampus1, pendidikan2, prodi2, ipk2, thn_lulus2, nm_kampus2, pendidikan3, prodi3, ipk3, thn_lulus3, nm_kampus3,kode_kualifikasi, nm_kualifikasi, penempatan, kategori_file, path_file from tb_lolostahaptiga left join tb_lolostahapdua on tb_lolostahaptiga.noujian = tb_lolostahapdua.noujian join tb_pelamar on tb_lolostahapdua.nik = tb_pelamar.ktp join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi join file_upload on tb_pelamar.id_pelamar = file_upload.nik where file_upload.kategori_file = 'ijazah' order by tb_lolostahaptiga.kode_formasi asc, tb_lolostahaptiga.nama_pelamar asc");
			// return $query->result();
		// }

		function readlolostahapdua($nik){
			$query = $this->db->query("select * from tb_lolostahapdua join lokasi on tb_lolostahapdua.noujian = lokasi.noujian join tb_pelamar on lokasi.nodaftar = tb_pelamar.no_pendaftaran where tb_pelamar.ktp = ".$nik." ");
			return $query;
		}

		function readtb_lolostahapdua($nik){
			$query = $this->db->query("select * from tb_lolostahapdua where nik='$nik'");
			return $query;
		}

		function readformasipelamar($id_kualifikasi){
			$query = $this->db->query("select * from tb_pelamar where id_kualifikasi = ".$id_kualifikasi." ");
			return $query;
		}

		function readid_kualifikasi(){
			$query = $this->db->query("select id_kualifikasi from tb_kualifikasi");
			return $query;
		}

		// SELECT b.id_kualifikasi, a.id_pelamar, a.status FROM tb_kualifikasi b LEFT JOIN tb_pelamar a ON b.id_kualifikasi = a.id_kualifikasi ORDER BY b.id_kualifikasi

		//SELECT a.id_kualifikasi, b.*, COUNT(a.id_pelamar) as performasi from tb_pelamar a right JOIN tb_kualifikasi b ON a.id_kualifikasi = b.id_kualifikasi GROUP BY b.id_kualifikasi iki lumayan bener

		function readKeterangan($id){
			$query = $this->db->query("select keterangan_berkas from tb_pelamar where id_pelamar = ".$id."");
			return $query;
		}

		function readStatus($id){
			$query = $this->db->query("select status from tb_pelamar where id_pelamar = ".$id."");
			return $query;
		}

		function readnomorurut($nik){
			$query = $this->db->query("select id_pelamar from tb_pelamar where ktp = ".$nik."");
			return $query;
		}

		function readlastid(){
			$query = $this->db->query("select id_pelamar from tb_pelamar order by id_pelamar desc limit 1");
			return $query;
		}

		function readkongsi($id){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.id_pelamar= ".$id." ");
			return $query;
		}
		
		function readPelamarlolostahapsatu($id){
			$query = $this->db->query("select * from tb_lolostahapdua join tb_pelamar on tb_lolostahapdua.nik = tb_pelamar.ktp join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.id_pelamar =".$id." ");
			return $query;
		}

		function readcalon(){
			$query = $this->db->query("select * from tb_user where level != 1");
			return $query;
		}

		function readleveluser(){
			$query = $this->db->query("select * from tb_user where level = 1");
			return $query;
		}

		function readKualifikasi($nik){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.ktp = ".$nik."");
			return $query;
		}

		function readhal_admin(){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi left join tb_dataverifikasi on tb_pelamar.id_pelamar = tb_dataverifikasi.id_pelamardataverifikasi where tb_pelamar.status is not null order by case when tb_pelamar.status = 3 then 0 when tb_pelamar.status = 2 then 1 when tb_pelamar.status = 1 then 2 end");
			return $query;
		}
		
		function getDataVerifikasi(){
			$query = $this->db->query("select * from tb_bahanverifikasi join tb_kualifikasi on tb_bahanverifikasi.id_kualifikasi = tb_kualifikasi.id_kualifikasi");
			return $query;
		}

		public function readnik($nik){
			$readnik = $this->db->query("select * from tb_user where nik = ".$nik." ")->result();
			return $query;
		}

		public function readid($nik){
			$query = $this->db->query("select id_user from tb_user where nik = ".$nik." ");
			return $query;
		}		

		public function readverifikator($nik){
			$query = $this->db->query("select * from tb_user join tb_tugas on tb_user.id_user = tb_tugas.id_verifikator join tb_kualifikasi on tb_tugas.kode_formasi = tb_kualifikasi.id_kualifikasi join tb_pelamar on tb_tugas.kode_formasi = tb_pelamar.id_kualifikasi where tb_tugas.id_verifikator = ".$nik." and tb_pelamar.status is not null order by tb_pelamar.id_kualifikasi asc, tb_pelamar.status desc");
			return $query;
		}

		public function readsortingverifikator($nik){
			$query = $this->db->query("SELECT * FROM tb_kualifikasi JOIN tb_tugas ON tb_kualifikasi.id_kualifikasi = tb_tugas.kode_formasi JOIN tb_user ON tb_tugas.id_verifikator = tb_user.id_user WHERE tb_tugas.id_verifikator = ".$nik."");
			return $query;
		}

		function readLokasi($id){
			$query = $this->db->query("select * from tb_pelamar join lokasi on tb_pelamar.no_pendaftaran = lokasi.nodaftar where tb_pelamar.id_pelamar = ".$id."");
			return $query;
		}

		function readFile($id){
			$this->db->select('*');
			$this->db->from('file_upload');
			$this->db->where('file_upload.nik=', $id);
			$this->db->group_by('path_file');

			$query = $this->db->get('');

			return $query;
		}

		function readFilekartu($id){
			$this->db->select('*');
			$this->db->from('file_upload');
			$this->db->where('file_upload.nik=', $id);
			$this->db->where('file_upload.kategori_file=', 'foto');

			$query = $this->db->get('');

			return $query;
		}

		function sortformasi($formasi){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.id_kualifikasi = ".$formasi." and tb_pelamar.status is not null order by case when tb_pelamar.status = 3 then 0 when tb_pelamar.status = 2 then 1 when tb_pelamar.status = 1 then 2 end ");
			return $query;
		}

		public function sortformasi_verifikator($nik, $formasi){
			$query = $this->db->query("select * from tb_user join tb_tugas on tb_user.id_user = tb_tugas.id_verifikator join tb_kualifikasi on tb_tugas.kode_formasi = tb_kualifikasi.id_kualifikasi join tb_pelamar on tb_tugas.kode_formasi = tb_pelamar.id_kualifikasi where tb_tugas.id_verifikator = ".$nik." and tb_pelamar.status is not null and tb_pelamar.id_kualifikasi =".$formasi." order by tb_pelamar.id_kualifikasi asc, tb_pelamar.status desc");
			return $query;
		}

		public function sortstatus_verifikator($nik, $status){
			$query = $this->db->query("select * from tb_user join tb_tugas on tb_user.id_user = tb_tugas.id_verifikator join tb_kualifikasi on tb_tugas.kode_formasi = tb_kualifikasi.id_kualifikasi join tb_pelamar on tb_tugas.kode_formasi = tb_pelamar.id_kualifikasi where tb_tugas.id_verifikator = ".$nik." and tb_pelamar.status =".$status." order by tb_pelamar.id_kualifikasi asc, tb_pelamar.status desc");
			return $query;
		}

		public function sortstatus($status){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.status = ".$status." ");
			return $query;
		}

		public function sortall($formasi, $status){
			$query = $this->db->query("select * from tb_pelamar join tb_kualifikasi on tb_pelamar.id_kualifikasi = tb_kualifikasi.id_kualifikasi where tb_pelamar.status = ".$status." and tb_pelamar.id_kualifikasi = ".$formasi."");
			return $query;
		}

		function read_kualifikasi(){
			$query = $this->db->query("select * from tb_kualifikasi");
			return $query;
		}
                
		//export peserta
		//EXPORT
		function get_export_peserta() {
			$hasil = $this->db->query("SELECT *, b. unit_kerja FROM tb_pelamar a JOIN tb_kualifikasi b ON a.id_kualifikasi = b.id_kualifikasi join tb_dataverifikasi c on a.id_pelamar = c.id_pelamardataverifikasi WHERE a.no_pendaftaran IS NOT NULL");
			return $hasil;
		}
		function get_ijazah($id) {
			$hasil = $this->db->query("SELECT * FROM ijazah where id='$id'");
					return $hasil->row();
		}
		 function get_kualifikasi($id) {
			$hasil = $this->db->query("SELECT * FROM tb_kualifikasi where id_kualifikasi='$id'");
					return $hasil->row();
		}
	}
?>