<html>
	<head>
	</head>
	<body>
		<!-- <body> -->
			<table width="100%" border="0" style="font-size: 19px">
				<tr>
					<td rowspan="3" >
						<img class="g-width-1" src="<?= base_url('assets/undip.png') ?>" alt="Logo" style="width:85px; height:100px; display:block; margin-left: auto; margin-right: auto;">
					</td>
					<td style="text-align: center" height="30px">
						<b>KARTU UJIAN</b>
					</td>
				</tr>
				<tr>
					<td style="text-align: center">
						<b>PENERIMAAN TENAGA DOSEN PU NON ASN TAHUN 2022</b>
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
				<td>Nomor Ujian</td>
				<td width="50%"><?= $query->noujian?></td>
				<?php
					if (ISSET($tabel_file->row()->path_file)) {
				?>
				<td rowspan="6" valign="top" width="20%">
					<img src="<?= site_url('')?><?= $tabel_file->row()->path_file?>" style="margin-bottom: 25px; max-width: 100px">
				</td>
				<?php } else { ?>
				<td rowspan="6" valign="top" width="20%">
					<img src="<?= site_url('')?><?= $tabel_file->row()->path_file?>" style="margin-bottom: 25px; max-width: 100px">
				</td>
				<?php } ?>
			</tr>
			<tr style="height:30px;">
				<td>Nama Lengkap</td>
				<td width="50%"> <?= $query->nama_pelamar?></td>
			</tr>
			<!--<tr style="height:30px;">
				<td>Lokasi Ujian</td>
				<td height="90px"><?= $lokasi->lokasiujian?></td>
			</tr>
			<tr style="height:30px;">
				<td>Gedung Ujian</td>
				<td height="90px"><?= $lokasi->gedungujian?></td>
			</tr>
			<tr style="height:30px;">
				<td>Ruang Ujian</td>
				<td height="90px"><?= $lokasi->ruangujian?></td>
			</tr>-->
			<tr>
				<td>Formasi</td>
				<td height="90px"><?= $query->kode_kualifikasi ?> <?= $query->penempatan?> </td>
			</tr>
			<tr>
				<td>Kelompok Ujian</td>
				<td height="90px"> Kelompok <?= $query->kelompok_ujian ?> </td>
			</tr>
			<tr>
				<td>Lokasi</td>
				<td height="90px"> Silahkan pantau laman https://kepegawaian.undip.ac.id/ </td>
			</tr>
		</table>
		<table>
			<tr style="height:30px;" width="300px">
				<td height="200px"> 
					<h4 style="text-align: center; float: left">TANDA TANGAN PENGAWAS<br><br><br><br><br><br><br><br>
					(............................................)
				</td>
				<td width=60%></td>
				<td height="200px" width="300px"> 
					<h4 style="text-align: center; float: right">TANDA TANGAN PESERTA<br><br><br><br><br><br><br><br>
					<?= $query->nama_pelamar?>
				</td>
			</tr>
		</table>
		<?php
			$waktu =  date('l, d-m-Y', strtotime("now"));
			$date = date('d');
			$d = date('D');
			$m = date('M');
			$y = date('Y');

			if($d == 'Sun'){
				$hari = 'Minggu';
			}else if($d == 'Mon'){
				$hari = 'Senin';
			}else if($d == 'Tue'){
				$hari = 'Selasa';
			}else if($d == 'Wed'){
				$hari = 'Rabu';
			}else if($d == 'Thu'){
				$hari = 'Kamis';
			}else if($d == 'Fri'){
				$hari = 'Jumat';
			}else if($d == 'Sat'){
				$hari = 'Sabtu';
			}

			if($m == 'Jan'){
				$bulan = 'Januari';
			}else if($m == 'Feb'){
				$bulan = 'Februari';
			}else if($m == 'Mar'){
				$bulan = 'Maret';
			}else if($m == 'Apr'){
				$bulan = 'April';
			}else if($m == 'May'){
				$bulan = 'Mei';
			}else if($m == 'Jun'){
				$bulan = 'Juni';
			}else if($m == 'Jul'){
				$bulan = 'Juli';
			}else if($m == 'Aug'){
				$bulan = 'Agustus';
			}else if($m == 'Sep'){
				$bulan = 'September';
			}else if($m == 'Oct'){
				$bulan = 'Oktober';
			}else if($m == 'Nov'){
				$bulan = 'November';
			}else if($m == 'Dec'){
				$bulan = 'Desember';
			}
		?>
		<br>
		<table border="0" width="100%" style="font-size: 10px">
			<tr>
				<td colspan="2" style="padding-bottom: 50px; text-align: justify;" >
					Kartu ini dicetak pada <?= $hari.', '.$date.' '.$bulan.' '.$y?> jam <?= date("H:i")?>
				</td>
			</tr>
		</table>
	</body>
</html>