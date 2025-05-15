<html>
    <head>
    </head>
    <body onload="window.print()">
        <!-- <body> -->
        <table width="100%" border="0" style="font-size: 19px">
            <tr>
                <td rowspan="3" >
                    <img class="g-width-1" src="<?= base_url('assets/undip.png') ?>" alt="Logo" style="width:85px; height:100px; display:block; margin-left: auto; margin-right: auto;">
                </td>
                <td  style="text-align: center" height="30px">
                    <b>FORMULIR REGISTRASI</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <b>PENERIMAAN CALON PEGAWAI</b>
                </td>
            </tr>
            <tr>
                <td style="text-align: center">
                    <b>UNIVERSITAS DIPONEGORO</b>
                </td>
            </tr>
        </table>
        <br>
        <hr>
        <br>
        <table border="1" style="border-collapse: collapse; font-size: 16px"  cellpadding="10" width="100%">
            <tr style="height:30px;">
                <td width="35%">Nomor Pendaftaran</td>
                <td width="40%"> <?= $hasil->no_pendaftaran ?></td>
                <?php
                if (ISSET($tabel_file->row()->path_file)) {
                    ?>
                    <td rowspan="14" valign="top" width="20%">
                        <img src="<?= site_url('') ?><?= $tabel_file->row()->path_file ?>" style="margin-bottom: 25px; max-width: 100px">
                    </td>
                <?php } else { ?>
                    <td rowspan="14" valign="top" width="20%">
                        <img src="" style="margin-bottom: 25px; max-width: 100px">
                    </td>
                <?php } ?>
            </tr>
            <tr style="height:30px;">
                <td>Nama Lengkap</td>
                <td width="50%"> <?= $hasil->nama_pelamar ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Nomor Induk Kependudukan</td>
                <td width="50%"> <?= $hasil->ktp ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Agama</td>
                <td width="50%"> <?= $hasil->agama ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Tempat, Tanggal Lahir</td>

                <?php
                // $sql =  $this->db->query("SELECT TIMESTAMPDIFF( YEAR,  `tanggal_lahir` , DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' ) ) AS  `tahun` , TIMESTAMPDIFF(MONTH , CONCAT( (DATE_FORMAT(  `tanggal_lahir` ,  '%Y' ) + TIMESTAMPDIFF( YEAR,  `tanggal_lahir` , DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' ) ) ) ,  '-', (DATE_FORMAT(  `tanggal_lahir` ,  '%m-%d' ) )), DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' )) AS  `bulan` , TIMESTAMPDIFF(DAY , ADDDATE(CONCAT( (DATE_FORMAT(  `tanggal_lahir` ,  '%Y' ) + TIMESTAMPDIFF( YEAR,  `tanggal_lahir` , DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' ) ) ) ,  '-', (DATE_FORMAT(  `tanggal_lahir` ,  '%m-%d' ) ) ) , INTERVAL TIMESTAMPDIFF(MONTH , CONCAT( (DATE_FORMAT(  `tanggal_lahir` ,  '%Y' ) + TIMESTAMPDIFF( YEAR,  `tanggal_lahir` , DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' ) ) ) ,  '-', (DATE_FORMAT(  `tanggal_lahir` ,  '%m-%d' ) )), DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' ))MONTH), DATE_FORMAT(  '2019-10-01',  '%Y-%m-%d' )) AS  `hari` ,  `tanggal_lahir` FROM tb_pelamar where tb_pelamar.id_pelamar = ".$hasil->id_pelamar."");
                // foreach($sql->result() as $row){
                // 	$tahun = $row->tahun;
                // 	$bulan = $row->bulan;
                // 	$hari = $row->hari; 
                // }
                // tanggal lahir
                $tanggal = new DateTime($hasil->tanggal_lahir);

                // tanggal hari ini
                $today = new DateTime('2022-07-01');

                // tahun
                $y = $today->diff($tanggal)->y;

                // bulan
                $m = $today->diff($tanggal)->m;

                // hari
                $d = $today->diff($tanggal)->d;
                ?>
                <td width="50%"> <?= $hasil->tempat_lahir . ', ' . date('d-m-Y', strtotime($hasil->tanggal_lahir)) . ' <br> Umur: ' . $y . ' tahun ' . $m . ' bulan ' . $d . ' hari'; ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Alamat Tempat Tinggal</td>
                <td width="50%"> <?= $hasil->alamat ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Alamat Email</td>
                <td width="50%"> <?= $hasil->email ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Nomor HP</td>
                <td width="50%"> <?= $hasil->no_telepon ?></td>
            </tr>
            <tr style="height:30px;">
                <td>Pendidikan Jenjang Sarjana / Sarjana Terapan</td>
                <?php
				if($hasil->pendidikan == "D4"){
					$pendidikane = "D4";
				}else if($hasil->pendidikan == "S1"){
					$pendidikane = "S1";
				}
				if($hasil->pendidikan1 == "S1 Profesi"){
					$pendidikane1 = "S1 Profesi";
				}
				if($hasil->pendidikan2 == "S2"){ 
					$pendidikane2 = "S2";
				}else if($hasil->pendidikan2 == "S2 Terapan"){ 
					$pendidikane2 = "S2 Terapan";
				}else if($hasil->pendidikan2 == "SP-1"){ 
					$pendidikane2 = "SP-1";
				}
				if($hasil->pendidikan3 == "S3"){ 
					$pendidikane3 = "S3";
				}else if($hasil->pendidikan3 == "S3 Terapan"){ 
					$pendidikane3 = "S3 Terapan";
				}else if($hasil->pendidikan3 == "SP-2"){ 
					$pendidikane3 = "SP-2";
				}
                ?>
								
                <td width="50%">Jenjang:&nbsp;<?= $pendidikane ?><br>Nama Perguruan Tinggi:&nbsp;<?= $hasil->nm_kampus ?><br>Nama Program Studi:&nbsp;<?= $hasil->prodi ?><?php if($hasil->nomor_penyetaraan != ""){ ?><br>Nomor Penyetaraan:&nbsp;<?= $hasil->nomor_penyetaraan;?><br>IPK:&nbsp;<?= $hasil->ipk; }else{ ?><br>Akreditasi Program Studi:&nbsp;<?= $hasil->akreditasi_prodi; }?><?php if($hasil->nomor_penyetaraan != ""){}else{?><br>Akreditasi Perguruan Tinggi:&nbsp;<?= $hasil->akreditasi_kampus; ?><br>IPK:&nbsp;<?= $hasil->ipk; } ?><br>Tahun Lulus:&nbsp;<?= $hasil->thn_lulus?></td>
            </tr>
			<?php
				if($hasil->pend_profesi == "Tidak"){}else{
			?>
			<tr style="height:30px;">
                <td>Pendidikan Jenjang Sarjana Profesi</td>
                <td width="50%">Jenjang:&nbsp;<?= $pendidikane1 ?><br>Nama Perguruan Tinggi:&nbsp;<?= $hasil->nm_kampus1 ?><br>Nama Program Studi:&nbsp;<?= $hasil->prodi1 ?><?php if($hasil->nomor_penyetaraan1 != ""){ ?><br>Nomor Penyetaraan:&nbsp;<?= $hasil->nomor_penyetaraan1; ?><br>IPK:&nbsp;<?= $hasil->ipk1;?><?php }else{ ?><br>Akreditasi Program Studi:&nbsp;<?= $hasil->akreditasi_prodi1; }?><?php if($hasil->nomor_penyetaraan1 != ""){}else{?><br>Akreditasi Perguruan Tinggi:&nbsp;<?= $hasil->akreditasi_kampus1; ?><br>IPK:&nbsp;<?= $hasil->ipk1; } ?><br>Tahun Lulus:&nbsp;<?= $hasil->thn_lulus1?></td>
            </tr>
			<?php
				}
			?>
            <tr style="height:30px;">
                <td>Pendidikan Jenjang Magister / Magister Terapan</td>
                <td width="50%">Jenjang:&nbsp;<?= $pendidikane2 ?><br>Nama Perguruan Tinggi:&nbsp;<?= $hasil->nm_kampus2 ?><br>Nama Program Studi:&nbsp;<?= $hasil->prodi2 ?><?php if($hasil->nomor_penyetaraan2 != ""){ ?><br>Nomor Penyetaraan:&nbsp;<?= $hasil->nomor_penyetaraan2;?><br>IPK:&nbsp;<?= $hasil->ipk2;?><?php }else{ ?><br>Akreditasi Program Studi:&nbsp;<?= $hasil->akreditasi_prodi2; }?><?php if($hasil->nomor_penyetaraan2 != ""){}else{?><br>Akreditasi Perguruan Tinggi:&nbsp;<?= $hasil->akreditasi_kampus2; ?><br>IPK:&nbsp;<?= $hasil->ipk2; } ?><br>Tahun Lulus:&nbsp;<?= $hasil->thn_lulus2?></td>
            </tr>
            <?php
            if ($hasil->prodi3 == '') {} else {
                ?>
                <tr style="height:30px;">
                    <td>Pendidikan Jenjang Doktor / Doktor Terapan</td>
                    <td width="50%">Jenjang:&nbsp;<?= $pendidikane3 ?><br>Nama Perguruan Tinggi:&nbsp;<?= $hasil->nm_kampus3 ?><br>Nama Program Studi:&nbsp;<?= $hasil->prodi3 ?><?php if($hasil->nomor_penyetaraan3 != ""){ ?><br>Nomor Penyetaraan:&nbsp;<?= $hasil->nomor_penyetaraan3;?><br>IPK:&nbsp;<?= $hasil->ipk3; ?><?php }else{ ?><br>Akreditasi Program Studi:&nbsp;<?= $hasil->akreditasi_prodi3; }?><?php if($hasil->nomor_penyetaraan3 != ""){}else{?><br>Akreditasi Perguruan Tinggi:&nbsp;<?= $hasil->akreditasi_kampus3; } ?><br>IPK:&nbsp;<?= $hasil->ipk3; ?><br>Tahun Lulus:&nbsp;<?= $hasil->thn_lulus3?></td>
                </tr>
            <?php } ?>
            <?php if ($hasil->toefl != '') {
                ?>
                <tr style="height:30px;">
                    <td>Toefl <?= $hasil->jenis_toefl?></td>
                    <td width="50%"> <?= $hasil->toefl ?></td>
                </tr>
            <?php } ?>
            <tr style="height:30px;">
                <td>Formasi</td>
                <td width="50%"> <?= $hasil->nm_kualifikasi . ' ' . '(' . $hasil->kode_kualifikasi . ')' . ' (' . $hasil->penempatan . ')' ?></td>
            </tr>
        </table>
        <?php
        $waktu = date('l, d-m-Y', strtotime("now"));
        $date = date('d');
        $d = date('D');
        $m = date('M');
        $y = date('Y');

        if ($d == 'Sun') {
            $hari = 'Minggu';
        } else if ($d == 'Mon') {
            $hari = 'Senin';
        } else if ($d == 'Tue') {
            $hari = 'Selasa';
        } else if ($d == 'Wed') {
            $hari = 'Rabu';
        } else if ($d == 'Thu') {
            $hari = 'Kamis';
        } else if ($d == 'Fri') {
            $hari = 'Jumat';
        } else if ($d == 'Sat') {
            $hari = 'Sabtu';
        }

        if ($m == 'Jan') {
            $bulan = 'Januari';
        } else if ($m == 'Feb') {
            $bulan = 'Februari';
        } else if ($m == 'Mar') {
            $bulan = 'Maret';
        } else if ($m == 'Apr') {
            $bulan = 'April';
        } else if ($m == 'May') {
            $bulan = 'Mei';
        } else if ($m == 'Jun') {
            $bulan = 'Juni';
        } else if ($m == 'Jul') {
            $bulan = 'Juli';
        } else if ($m == 'Aug') {
            $bulan = 'Agustus';
        } else if ($m == 'Sep') {
            $bulan = 'September';
        } else if ($m == 'Oct') {
            $bulan = 'Oktober';
        } else if ($m == 'Nov') {
            $bulan = 'November';
        } else if ($m == 'Dec') {
            $bulan = 'Desember';
        }
        ?>
        <br>
        <table border="0" width="100%" style="font-size: 16px">
            <tr>
                <td colspan="2" style="padding-bottom: 50px; text-align: justify;" >
                    Dengan ini menyatakan bahwa data yang saya isikan adalah yang sebenar-benarnya. 
                    Saya setuju dengan segala ketentuan yang ditetapkan oleh panitia penerimaan Universitas Diponegoro 
                    dan bersedia menerima sanksi pembatalan kelulusan apabila data yang isikan tidak benar.

                </td>
            </tr>
            <tr>
                <td >
                </td>
                <td width="50%">
                    <?= $hari . ', ' . $date . ' ' . $bulan . ' ' . $y ?>
                    <br>
                    <br>
                    <br>
                    <br>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                </td>
                <td>
                    <?= $hasil->nama_pelamar ?>
                </td>
            </tr>
        </table>
    </body>
</html>