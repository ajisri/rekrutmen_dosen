<html>
	<head>
	</head>
	<body>
		<!-- <body> -->
			<?php
				foreach ($datapesertawawancara as $hasil) {
                if ($hasil->pendidikan == 3) {
                    $pendidikane = "D4";
                } else if ($hasil->pendidikan == 4) {
                    $pendidikane = "S1";
                }
				if ($hasil->pendidikan1 == 5) {
                    $pendidikane1 = "S1 Profesi";
                }
                if ($hasil->pendidikan2 == 6) {
                    $pendidikane2 = "S2";
                } else if ($hasil->pendidikan2 == 7) {
                    $pendidikane2 = "S2 Terapan";
                }
                if ($hasil->pendidikan3 == 9) {
                    $pendidikane3 = "S3";
                } else if ($hasil->pendidikan3 == 10) {
                    $pendidikane3 = "S3 Terapan";
                }
			?>
			<table border='1' width="100%" style="border-collapse: collapse; font-family: ctimes; font-size: 16px" cellpadding="5">
				<tr>
					<td>
						Nama
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->nama_pelamarr ?>
					</td>
					<?php
						if (ISSET($hasil->path_file)) {
                    ?>
					<td rowspan="8">
						<img src="<?= site_url('')?><?= $hasil->path_file?>" style="margin-bottom: 25px; max-width: 100px">
					</td>
					<?php } else { ?>
					<td rowspan="8">
						<img src="<?= site_url('')?><?= $hasil->path_file?>" style="margin-bottom: 25px; max-width: 100px">
					</td>
					<?php } ?>
				</tr>
				<tr>
					<td>
						Nomor Ujian
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->noujian?>
					</td>
				</tr>
				<tr>
					<td>
						Jenis Kelamin
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->jenis_kelamin?>
					</td>
				</tr>
				<tr>
					<td>
						Pendidikan Sarjana / Sarjana Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($pendidikane); ?>
					</td>
				</tr>
				<tr>
					<td>
						Tahun Lulus Sarjana / Sarjana Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->thn_lulus?>
					</td>
				</tr>
				<tr>
					<td>
						Lulusan Sarjana / Sarjana Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->nm_kampus)?>
					</td>
				</tr>
				<tr>
					<td>
						IPK Sarjana / Sarjana Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->ipk)?>
					</td>
				</tr>
				<?php if($hasil->ipk1 != '' and $hasil->thn_lulus1 != ''){?>
				<tr>
					<td>
						Pendidikan Sarjana Profesi
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($pendidikane1); ?>
					</td>
				</tr>
				<tr>
					<td>
						Tahun Lulus Sarjana Profesi
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->thn_lulus1?>
					</td>
				</tr>
				<tr>
					<td>
						Lulusan Sarjana Profesi
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->nm_kampus1)?>
					</td>
				</tr>
				<tr>
					<td>
						IPK Sarjana Profesi
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->ipk1)?>
					</td>
				</tr>
				<?php }else{}?>
				<tr>
					<td>
						Pendidikan Magister / Magister Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($pendidikane2); ?>
					</td>
				</tr>
				<tr>
					<td>
						Tahun Lulus Magister / Magister Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->thn_lulus2?>
					</td>
				</tr>
				<tr>
					<td>
						Lulusan Magister / Magister Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->nm_kampus2)?>
					</td>
				</tr>
				<tr>
					<td>
						IPK Magister / Magister Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->ipk2)?>
					</td>
				</tr>
				<?php if($hasil->ipk3 != '' and $hasil->thn_lulus3 != ''){?>
				<tr>
					<td>
						Pendidikan Doktor / Doktor Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($pendidikane3); ?>
					</td>
				</tr>
				<tr>
					<td>
						Tahun Lulus Doktor / Doktor Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->thn_lulus3?>
					</td>
				</tr>
				<tr>
					<td>
						Lulusan Doktor / Doktor Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->nm_kampus3)?>
					</td>
				</tr>
				<tr>
					<td>
						IPK Doktor / Doktor Terapan
					</td>
					<td>
						:
					</td>
					<td>
						<?= strtoupper($hasil->ipk3)?>
					</td>
				</tr>
				<?php
				}else{}
				?>
				<tr>
					<td>
						Formasi yang dilamar
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->kode_kualifikasi." "."(".$hasil->nm_kualifikasi.")"?>
					</td>
				</tr>
				<tr>
					<td>
						Penempatan
					</td>
					<td>
						:
					</td>
					<td>
						<?= $hasil->penempatan?>
					</td>
				</tr>
				<tr>
					<td>
						Ijazah
					</td>
					<td>
						:
					</td>
					<td>
						
					</td>
				</tr>
			</table>
			<embed src="<?= site_url('')?><?= $hasil->path_file?>" type="application/pdf" width="100%" height="600px" />
			<iframe src="<?= site_url('')?><?= $hasil->path_file?>" width="600" height="400"></iframe>
			<pagebreak>
		<?php }?>
	</body>
</html>