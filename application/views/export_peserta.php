<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=DataPeserta.xls");
header("Pragma: no-cache");
header("Expires: 0");
?>
<style> .str{ mso-number-format:\@; } </style>

<table border='0' width="100%">
    <tr>
        <td colspan="20"><center><h3>REKAP DATA PESERTA REKRUTMEN DOSEN</h3></center></td>
</tr>
<tr>
    <td colspan="20">
<center>Update terakhir tanggal <?php
    $tanggal = mktime(date("m"), date("d"), date("Y"));
    $tglsekarang = date("d-m-Y", $tanggal);
    echo $tglsekarang;
    ?>
</center>
</td>
</tr>

<tr>
    <td colspan="20"></td>
</tr>
</table>
<table border='1' width="100%">

    <tr>
        <td><b><center>NO</center></b></td>
        <td><b><center>NO PENDAFTARAN</center></b></b></td>
        <td><b><center>KODE KUALIFIKASI</center></b></td>
        <td><b><center>FAKULTAS</center></b></td>
        <td><b><center>NIK</center></b></td>
        <td><b><center>NAMA LENGKAP</center></b></td>
        <td><b><center>GELAR DEPAN</center></b></td>
        <td><b><center>GELAR BELAKANG</center></b></td>
        <td><b><center>TEMPAT LAHIR</center></b></td>
        <td><b><center>TGL LAHIR</center></b></td>
        <td><b><center>EMAIL</center></b></td>
        <td><b><center>JENIS KELAMIN</center></b></td>
        <td><b><center>AGAMA</center></b></td>
        <td><b><center>STATUS MENIKAH</center></b></td>
        <td><b><center>NO TELP</center></b></td>
        <td><b><center>ALAMAT</center></b></td>
        <td><b><center>PENDIDIKAN (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>NAMA KAMPUS (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>AKREDITASI INSTITUSI (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>AKREDITASI PRODI (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>TH LULUS (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>IPK (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>JUDUL SKRIPSI (SARJANA / SARJANA TERAPAN)</center></b></td>
        <td><b><center>PENDIDIKAN (SARJANA PROFESI)</center></b></td>
        <td><b><center>NAMA KAMPUS (SARJANA PROFESI)</center></b></td>
        <td><b><center>AKREDITASI INSTITUSI (SARJANA PROFESI)</center></b></td>
        <td><b><center>AKREDITASI PRODI (SARJANA PROFESI)</center></b></td>
        <td><b><center>TH LULUS(SARJANA PROFESI)</center></b></td>
        <td><b><center>IPK(SARJANA PROFESI)</center></b></td>
        <td><b><center>JUDUL SKRIPSI (SARJANA PROFESI)</center></b></td>
        <td><b><center>PENDIDIKAN (MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>NAMA KAMPUS (MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>AKREDITASI INSTITUSI (MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>AKREDITASI PRODI (MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>TH LULUS(MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>IPK(MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>JUDUL TESIS (MAGISTER / MAGISTER TERAPAN / SPESIALIS)</center></b></td>
        <td><b><center>PENDIDIKAN (DOKTOR / DOKTOR TERAPAN / SUB SPESIALIS)</center></b></td>
        <td><b><center>NAMA KAMPUS (DOKTOR / DOKTOR TERAPAN / SUB SPESIALIS)</center></b></td>
        <td><b><center>AKREDITASI INSTITUSI (DOKTOR / DOKTOR TERAPAN / SUB SPESIALIS)</center></b></td>
        <td><b><center>AKREDITASI PRODI (DOKTOR / DOKTOR TERAPAN / SUB SPESIALIS)</center></b></td>
        <td><b><center>TH LULUS(DOKTOR / DOKTOR TERAPAN / SUB SPESIALIS)</center></b></td>
        <td><b><center>IPK(DOKTOR / DOKTOR TERAPAN / SUB SPESIALIS)</center></b></td>
        <td><b><center>JUDUL DISERTASI</center></b></td>
        <td><b><center>STATUS BERKAS IJAZAH SARJANA/SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>PRODI SARJANA / SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS TRANSKRIP SARJANA/SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>IPK SARJANA / SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PT SARJANA/SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PT SARJANA / SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PRODI SARJANA/SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PRODI SARJANA / SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS PENYETARAAN SARJANA/SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
        <td><b><center>NOMOR PENYETARAAN SARJANA / SARJANA TERAPAN (VERIFIKATOR)</center></b></td>
		<td><b><center>STATUS BERKAS IJAZAH SARJANA PROFESI (VERIFIKATOR)</center></b></td>
		<td><b><center>PRODI SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS TRANSKRIP SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>IPK SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PT SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PT SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PRODI SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PRODI SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS PENYETARAAN SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>NOMOR PENYETARAAN SARJANA PROFESI (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS IJAZAH MAGISTER/MAGISTER TERAPAN/SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>PRODI MAGISTER / MAGISTER TERAPAN / SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS TRANSKRIP MAGISTER/MAGISTER TERAPAN/SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>IPK MAGISTER / MAGISTER TERAPAN / SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PT MAGISTER/MAGISTER TERAPAN/SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PT MAGISTER / MAGISTER TERAPAN / SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PRODI MAGISTER/MAGISTER TERAPAN/SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PRODI MAGISTER / MAGISTER TERAPAN / SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS PENYETARAAN MAGISTER/MAGISTER TERAPAN/SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>NOMOR PENYETARAAN MAGISTER / MAGISTER TERAPAN / SPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS IJAZAH DOKTOR/DOKTOR TERAPAN/SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>PRODI DOKTOR / DOKTOR TERAPAN / SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS TRANSKRIP DOKTOR/DOKTOR TERAPAN/SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>IPK DOKTOR / DOKTOR TERAPAN / SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PT DOKTOR/DOKTOR TERAPAN/SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PT DOKTOR / DOKTOR TERAPAN / SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS AKREDITASI PRODI DOKTOR/DOKTOR TERAPAN/SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>AKREDITASI PRODI DOKTOR / DOKTOR TERAPAN / SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS PENYETARAAN DOKTOR/DOKTOR TERAPAN/SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>NOMOR PENYETARAAN DOKTOR / DOKTOR TERAPAN / SUBSPESIALIS (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS TOEFL (VERIFIKATOR)</center></b></td>
        <td><b><center>JENIS TOEFL (VERIFIKATOR)</center></b></td>
        <td><b><center>SKOR TOEFL (VERIFIKATOR)</center></b></td>
        <td><b><center>LEMBAGA PENERBIT TOEFL (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS SURAT LAMARAN (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS KTP (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS FOTO (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS SURAT KETERANGAN SEHAT (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS SURAT KETERANGAN CATATAN KEPOLISIAN (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS SURAT PERNYATAAN BEBAS PARTAI POLITIK (VERIFIKATOR)</center></b></td>
        <td><b><center>STATUS BERKAS SURAT PERNYATAAN BEBAS DARI INSTANSI (VERIFIKATOR)</center></b></td>
        <td><b><center>CATATAN BERKAS TOEFL (VERIFIKATOR)</center></b></td>
        <!--<td><b><center>CATATAN BERKAS ADMINISTRASI</center></b></td>
        <td><b><center>CATATAN BERKAS SARJANA</center></b></td>
        <td><b><center>CATATAN BERKAS SARJANA PROFESI</center></b></td>
        <td><b><center>CATATAN BERKAS MAGISTER</center></b></td>
        <td><b><center>CATATAN BERKAS DOKTOR</center></b></td>-->
        <td><b><center>STATUS BERKAS KESELURUHAN</center></b></td>
        <td><b><center>STATUS</center></b></td>
        <td><b><center>VERIFIKATOR</center></b></td>
        <td><b><center>KETERANGAN</center></b></td>
        <td><b><center>TGL DAFTAR</center></b></td>
    </tr>
    <?php
    $i = 1;
    if ($peserta != null) {
        foreach ($peserta as $data) {
            //status
            if ($data->status == '1') {
                $statusp = "Lolos Administrasi";
            } else if ($data->status == '2') {
                $statusp = "Tidak Lolos Administrasi";
			 } else if ($data->status == '3') {
                $statusp = "Proses Verifikasi";
            } else {
                $statusp = "Belum submit pendaftaran";
            }
            //pendidikan
            $qpendidikan = $this->Modelpelamar->get_ijazah($data->pendidikan);
            if (!empty($qpendidikan)) {
                $pendidikan = $qpendidikan->ijazah;
            } else {
                $pendidikan = '';
            }
            //pendidikan 1
            $qpendidikan1 = $this->Modelpelamar->get_ijazah($data->pendidikan1);
            if (!empty($qpendidikan1)) {
                $pendidikan1 = $qpendidikan1->ijazah;
            } else {
                $pendidikan1 = '';
            }
            //pendidikan 2
            $qpendidikan2 = $this->Modelpelamar->get_ijazah($data->pendidikan2);
            if (!empty($qpendidikan2)) {
                $pendidikan2 = $qpendidikan2->ijazah;
            } else {
                $pendidikan2 = '';
            }

            //pendidikan 3
            $qpendidikan3 = $this->Modelpelamar->get_ijazah($data->pendidikan3);
            if (!empty($qpendidikan3)) {
                $pendidikan3 = $qpendidikan3->ijazah;
            } else {
                $pendidikan3 = '';
            }

            //kualifikasi
            $qkualifikasi = $this->Modelpelamar->get_kualifikasi($data->id_kualifikasi);
            if (!empty($qkualifikasi)) {
                $kualifikasi = $qkualifikasi->kode_kualifikasi;
            } else {
                $kualifikasi = '';
            }
            ?>
            <tr>    
                <td><center><?php echo $i; ?></center> </td>
        <td class="str">'<?= $data->no_pendaftaran; ?></td>
        <td><center><?= $kualifikasi; ?></center></td>
        <td><?= $data->unit_kerja; ?></td>

        <td class="str">'<?= $data->ktp; ?></td>
        <td><?= $data->nama_pelamar; ?></td>
        <td><?= $data->gelar_depan; ?></td>
        <td><?= $data->gelar_belakang; ?></td>
        <td><?= $data->tempat_lahir; ?></td>
        <td><?= $data->tanggal_lahir; ?></td>
        <td><?= $data->email; ?></td>
        <td><?= $data->jenis_kelamin; ?></td>
        <td><?= $data->agama; ?></td>
        <td><?= $data->status_menikah; ?></td>
        <td>'<?= $data->no_telepon; ?></td>
        <td><?= $data->alamat; ?></td>
        <td><?= $pendidikan; ?></td>
        <td><?= $data->nm_kampus; ?></td>
        <td><?= $data->akreditasi_kampus; ?></td>
        <td><?= $data->akreditasi_prodi; ?></td>
        <td><?= $data->thn_lulus; ?></td>
        <td><?= $data->ipk; ?></td>
        <td><?= $data->skripsi; ?></td>
        <td><?= $pendidikan1; ?></td>
        <td><?= $data->nm_kampus1; ?></td>
        <td><?= $data->akreditasi_kampus1; ?></td>
        <td><?= $data->akreditasi_prodi1; ?></td>
        <td><?= $data->thn_lulus1; ?></td>
        <td><?= $data->ipk1; ?></td>
        <td><?= $data->skripsi1; ?></td>
        <td><?= $pendidikan2; ?></td>
        <td><?= $data->nm_kampus2; ?></td>
        <td><?= $data->akreditasi_kampus2; ?></td>
        <td><?= $data->akreditasi_prodi2; ?></td>
        <td><?= $data->thn_lulus2; ?></td>
        <td><?= $data->ipk2; ?></td>
        <td><?= $data->tesis; ?></td>
        <td><?= $pendidikan3; ?></td>
        <td><?= $data->nm_kampus3; ?></td>
        <td><?= $data->akreditasi_kampus3; ?></td>
        <td><?= $data->akreditasi_prodi3; ?></td>
        <td><?= $data->thn_lulus3; ?></td>
        <td><?= $data->ipk3; ?></td>
        <td><?= $data->desertasi; ?></td>
        <td><?= $data->verif_ijazah; ?></td>
        <td><?= $data->ket_ijazahprodi; ?></td>
        <td><?= $data->verif_transkrip; ?></td>
        <td><?= $data->ket_transkripipk; ?></td>
        <td><?= $data->verif_akreditasipt; ?></td>
        <td><?= $data->ket_akreditasipt; ?></td>
        <td><?= $data->verif_akreditasiprodi; ?></td>
        <td><?= $data->ket_akreditasiprodi; ?></td>
        <td><?= $data->verif_penyetaraan; ?></td>
        <td><?= $data->ket_penyetaraan; ?></td>
        <td><?= $data->verif_ijazah1; ?></td>
        <td><?= $data->ket_ijazahprodi1; ?></td>
        <td><?= $data->verif_transkrip1; ?></td>
        <td><?= $data->ket_transkripipk1; ?></td>
        <td><?= $data->verif_akreditasipt1; ?></td>
        <td><?= $data->ket_akreditasipt1; ?></td>
        <td><?= $data->verif_akreditasiprodi1; ?></td>
        <td><?= $data->ket_akreditasiprodi1; ?></td>
        <td><?= $data->verif_penyetaraan1; ?></td>
        <td><?= $data->ket_penyetaraan1; ?></td>
        <td><?= $data->verif_ijazah2; ?></td>
        <td><?= $data->ket_ijazahprodi2; ?></td>
        <td><?= $data->verif_transkrip2; ?></td>
        <td><?= $data->ket_transkripipk2; ?></td>
        <td><?= $data->verif_akreditasipt2; ?></td>
        <td><?= $data->ket_akreditasipt2; ?></td>
        <td><?= $data->verif_akreditasiprodi2; ?></td>
        <td><?= $data->ket_akreditasiprodi2; ?></td>
        <td><?= $data->verif_penyetaraan2; ?></td>
        <td><?= $data->ket_penyetaraan2; ?></td>
        <td><?= $data->verif_ijazah3; ?></td>
        <td><?= $data->ket_ijazahprodi3; ?></td>
        <td><?= $data->verif_transkrip3; ?></td>
        <td><?= $data->ket_transkripipk3; ?></td>
        <td><?= $data->verif_akreditasipt3; ?></td>
        <td><?= $data->ket_akreditasipt3; ?></td>
        <td><?= $data->verif_akreditasiprodi3; ?></td>
        <td><?= $data->ket_akreditasiprodi3; ?></td>
        <td><?= $data->verif_penyetaraan3; ?></td>
        <td><?= $data->ket_penyetaraan3; ?></td>
        <td><?= $data->verif_toefl; ?></td>
        <td><?= $data->ket_jenistoefl; ?></td>
        <td><?= $data->ket_toefl; ?></td>
        <td><?= $data->ket_lembagapenerbit; ?></td>
        <td><?= $data->verif_lamaran; ?></td>
        <td><?= $data->verif_ktp; ?></td>
        <td><?= $data->verif_foto; ?></td>
        <td><?= $data->verif_sks; ?></td>
        <td><?= $data->verif_skck; ?></td>
        <td><?= $data->verif_suratpernyataanbebasparpol; ?></td>
        <td><?= $data->verif_suratpernyataanbebasdariinstansi; ?></td>
		<td>
			Status Berkas Toefl:&nbsp;<?= $data->verif_toefl; ?><br>
			Jenis Toefl:&nbsp;<?= $data->ket_jenistoefl; ?><br>
			Skor Toefl:&nbsp;<?= $data->ket_toefl; ?><br>
			<?php
				if($data->ket_jenistoefl == 'Lain-lain'){
			?>
			Lembaga Penerbit:&nbsp;<?= $data->ket_lembagapenerbit; ?>
			<?php
				}else{}
			?>
		</td>
		<!--<td>
			Lamaran:&nbsp;<?= $data->verif_lamaran; ?><br>
			KTP:&nbsp;<?= $data->verif_ktp; ?><br>
			Foto:&nbsp;<?= $data->verif_foto; ?><br>
			Surat Keterangan Sehat:&nbsp;<?= $data->verif_sks; ?><br>
			Surat Keterangan Catatan Kepolisian:&nbsp;<?= $data->verif_skck; ?><br>
			Surat Pernyatataan Bebas Organisasi Terlarang:&nbsp;<?= $data->verif_suratpernyataanbebasparpol; ?><br>
			Surat Pernyatataan Tidak Terikat dari Instansi:&nbsp;<?= $data->verif_suratpernyataanbebasdariinstansi; ?><br>
		</td>
		<td>
			Status Berkas Ijazah Sarjana:&nbsp;<?= $data->verif_ijazah; ?><br>
			Nama Prodi sesuai Ijazah Sarjana:&nbsp;<?= $data->ket_ijazahprodi; ?><br>
			Status Berkas Transkrip Sarjana:&nbsp;<?= $data->verif_transkrip; ?><br>
			IPK sesuai Transkrip Sarjana:&nbsp;<?= $data->ket_transkripipk; ?><br>
			Status Berkas Akreditasi PT Sarjana:&nbsp;<?= $data->verif_akreditasipt; ?><br>
			Akreditasi PT Sarjana:&nbsp;<?= $data->ket_akreditasipt; ?><br>
			Status Berkas Akreditasi PS Sarjana:&nbsp;<?= $data->verif_akreditasiprodi; ?><br>
			Akreditasi PS Sarjana:&nbsp;<?= $data->ket_akreditasiprodi; ?><br>
			Status Berkas Penyetaraan Sarjana:&nbsp;<?= $data->verif_penyetaraan; ?><br>
			Penyetaraan Sarjana:&nbsp;<?= $data->ket_penyetaraan; ?><br>
		</td>
			<?php
				if(empty($dataa->pendidikan1)){
			?>
		<td>
		Status Berkas Ijazah Sarjana Profesi:&nbsp;-<br>
		Nama Prodi sesuai Ijazah Sarjana Profesi:&nbsp;-<br>
		Status Berkas Transkrip Sarjana Profesi:&nbsp;-<br>
		IPK sesuai Transkrip Sarjana Profesi:&nbsp;-<br>
		Status Berkas Akreditasi PT Sarjana Profesi:&nbsp;-<br>
		Akreditasi PT Sarjana Profesi:&nbsp;-<br>
		Status Berkas Akreditasi PS Sarjana Profesi:&nbsp;-<br>
		Akreditasi PS Sarjana Profesi:&nbsp;-<br>
		Status Berkas Penyetaraan Sarjana Profesi:&nbsp;-<br>
		Penyetaraan Sarjana Profesi:&nbsp;-<br>
		<?php
			}else{
		?>
		</td>
		<td>
			Status Berkas Ijazah Sarjana Profesi:&nbsp;<?= $data->verif_ijazah1; ?><br>
			Nama Prodi sesuai Ijazah Sarjana Profesi:&nbsp;<?= $data->ket_ijazahprodi1; ?><br>
			Status Berkas Transkrip Sarjana Profesi:&nbsp;<?= $data->verif_transkrip1; ?><br>
			IPK sesuai Transkrip Sarjana Profesi:&nbsp;<?= $data->ket_transkripipk1; ?><br>
			Status Berkas Akreditasi PT Sarjana Profesi:&nbsp;<?= $data->verif_akreditasipt1; ?><br>
			Akreditasi PT Sarjana Profesi:&nbsp;<?= $data->ket_akreditasipt1; ?><br>
			Status Berkas Akreditasi PS Sarjana Profesi:&nbsp;<?= $data->verif_akreditasiprodi1; ?><br>
			Akreditasi PS Sarjana Profesi:&nbsp;<?= $data->ket_akreditasiprodi1; ?><br>
			Status Berkas Penyetaraan Sarjana Profesi:&nbsp;<?= $data->verif_penyetaraan1; ?><br>
			Penyetaraan Sarjana Profesi:&nbsp;<?= $data->ket_penyetaraan1; ?><br>
		</td>
		<?php
			}
		?>
		<td>
			Status Berkas Ijazah Magister:&nbsp;<?= $data->verif_ijazah2; ?><br>
			Nama Prodi sesuai Ijazah Magister:&nbsp;<?= $data->ket_ijazahprodi2; ?><br>
			Status Berkas Transkrip Magister:&nbsp;<?= $data->verif_transkrip2; ?><br>
			IPK sesuai Transkrip Magister:&nbsp;<?= $data->ket_transkripipk2; ?><br>
			Status Berkas Akreditasi PT Magister:&nbsp;<?= $data->verif_akreditasipt2; ?><br>
			Akreditasi PT Magister:&nbsp;<?= $data->ket_akreditasipt2; ?><br>
			Status Berkas Akreditasi PS Magister:&nbsp;<?= $data->verif_akreditasiprodi2; ?><br>
			Akreditasi PS Magister:&nbsp;<?= $data->ket_akreditasiprodi2; ?><br>
			Status Berkas Penyetaraan Magister:&nbsp;<?= $data->verif_penyetaraan2; ?><br>
			Penyetaraan Magister:&nbsp;<?= $data->ket_penyetaraan2; ?><br>
		</td>
		<?php
			if(empty($dataa->pendidikan3)){
		?>
		<td>
			Status Berkas Ijazah Doktor:&nbsp;-<br>
			Nama Prodi sesuai Ijazah Doktor:&nbsp;-<br>
			Status Berkas Transkrip Doktor:&nbsp;-<br>
			IPK sesuai Transkrip Doktor:&nbsp;-<br>
			Status Berkas Akreditasi PT Doktor:&nbsp;-<br>
			Akreditasi PT Doktor:&nbsp;-<br>
			Status Berkas Akreditasi PS Doktor:&nbsp;-<br>
			Akreditasi PS Doktor:&nbsp;-<br>
			Status Berkas Penyetaraan Doktor:&nbsp;-<br>
			Penyetaraan Doktor:&nbsp;-<br>
		</td>
		<?php
			}else{
		?>
		<td>
			Status Berkas Ijazah Doktor:&nbsp;<?= $data->verif_ijazah3; ?><br>
			Nama Prodi sesuai Ijazah Doktor:&nbsp;<?= $data->ket_ijazahprodi3; ?><br>
			Status Berkas Transkrip Doktor:&nbsp;<?= $data->verif_transkrip3; ?><br>
			IPK sesuai Transkrip Doktor:&nbsp;<?= $data->ket_transkripipk3; ?><br>
			Status Berkas Akreditasi PT Doktor:&nbsp;<?= $data->verif_akreditasipt3; ?><br>
			Akreditasi PT Doktor:&nbsp;<?= $data->ket_akreditasipt3; ?><br>
			Status Berkas Akreditasi PS Doktor:&nbsp;<?= $data->verif_akreditasiprodi3; ?><br>
			Akreditasi PS Doktor:&nbsp;<?= $data->ket_akreditasiprodi3; ?><br>
			Status Berkas Penyetaraan Doktor:&nbsp;<?= $data->verif_penyetaraan3; ?><br>
			Penyetaraan Doktor:&nbsp;<?= $data->ket_penyetaraan3; ?><br>
		</td>
		<?php
			}
		?>-->
        <td><?= $data->status_berkasadmin; ?></td>
        <td><center><?= $statusp; ?></center></td>
        <td><center>'<?= $data->nik_verifikator; ?></center></td>
        <td><?= $data->keterangan_berkas; ?></td>
        <td><?= $data->tgl_daftar; ?></td>


        </tr>
        <?php
        $i++;
    }
}
?>
</table>