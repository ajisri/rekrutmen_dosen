<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('header'); ?>

<body class="fix-header">
    <!-- ============================================================== -->
    <!-- Preloader -->
    <!-- ============================================================== -->
    <div class="preloader">
        <svg class="circular" viewBox="25 25 50 50">
            <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
        </svg>
    </div>
    <!-- ============================================================== -->
    <!-- Wrapper -->
    <!-- ============================================================== -->
   <div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php $this->load->view('navbar_pendaftaran'); ?>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php $this->load->view('sidebar_pendaftaran'); ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-md-12">
                        <h4 class="page-title">Profil Pelamar</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="white-box">
                            <div class="tengah">
                                <div class="overlay-box">
                                    <?php
										foreach($query->result() as $row){
											if($row->pendidikan == "D4"){
												$pendidikane = "D4";
											}else if($row->pendidikan == "S1"){
												$pendidikane = "S1";
											}
											
											if($row->pendidikan1 == "S1 Profesi"){
												$pendidikane1 = "S1 Profesi";
											}
											
											if($row->pendidikan2 == "S2"){ 
												$pendidikane2 = "S2";
											}else if($row->pendidikan2 == "S2 Terapan"){ 
												$pendidikane2 = "S2 Terapan";
											}else if($row->pendidikan2 == "SP-1"){ 
												$pendidikane2 = "SP-1";
											}
											if($row->pendidikan3 == "S3"){ 
												$pendidikane3 = "S3";
											}else if($row->pendidikan3 == "S3 Terapan"){ 
												$pendidikane3 = "S3 Terapan";
											}else if($row->pendidikan3 == "SP-2"){ 
												$pendidikane3 = "SP-2";
											}

											$tanggal = new DateTime($row->tanggal_lahir);

											// tanggal hari ini
											$today = new DateTime('2022-07-01');

											// tahun
											$y = $today->diff($tanggal)->y;

											// bulan
											$m = $today->diff($tanggal)->m;

											// hari
											$d = $today->diff($tanggal)->d;
									?>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-12">
									<div class="form-group">
										<label for="nama" class="control-label">Nama Pelamar :</label>
										<input type="text" class="form-control" value="<?= $row->gelar_depan?>&nbsp;<?= $row->nama_pelamar?>&nbsp;<?= $row->gelar_belakang?>" disabled>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="nama" class="control-label">Tanggal Lahir :</label>
										<input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($row->tanggal_lahir)).' (Umur: ' . $y . ' th ' . $m . ' bln ' . $d . ' hari)';?>" disabled>
									</div>
								</div>
								<?php if($row->ipk1 == '' and $row->thn_lulus1 == ''){?>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Jenjang Pendidikan :</label>
                                        <textarea class="form-control" disabled="" rows="12">-<?= $pendidikane?>&nbsp;<?= $row->prodi?><?php if($row->nomor_penyetaraan == ""){ ?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk?><?=("\n")?><?php }else{?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Penyetaraan:&nbsp;<?= $row->nomor_penyetaraan?><?=("\n")?><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Skripsi:&nbsp;<?= $row->skripsi?><?=("\n")?>-<?= $pendidikane2?>&nbsp;<?= $row->prodi2?><?php if($row->nomor_penyetaraan2 == ""){ ?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus2?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk2?><?=("\n")?><?php }else{?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Penyetaraan:&nbsp;<?= $row->nomor_penyetaraan2?><?=("\n")?><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Tesis:&nbsp;<?= $row->tesis?><?=("\n")?><?php if($row->ipk3 == '' and $row->thn_lulus3 == ''){}else{ ?> -<?= $pendidikane3?>&nbsp;<?= $row->prodi3?><?php if($row->nomor_penyetaraan3 == ""){ ?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus3?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk3?><?=("\n")?><?php }else{?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Penyetaraan:&nbsp;<?= $row->nomor_penyetaraan3?><?=("\n")?><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Disertasi:&nbsp;<?= $row->desertasi?><?php }?>
                                        </textarea>
                                    </div>
                                </div>
								<?php }else{?>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Jenjang Pendidikan :</label>
                                        <textarea class="form-control" disabled="" rows="15">-<?= $pendidikane?>&nbsp;<?= $row->prodi?><?php if($row->nomor_penyetaraan == ""){ ?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk?><?=("\n")?><?php }else{?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Penyetaraan:&nbsp;<?= $row->nomor_penyetaraan?><?=("\n")?><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Skripsi:&nbsp;<?= $row->skripsi?><?=("\n")?>-<?= $pendidikane1?>&nbsp;<?= $row->prodi1?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi1?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus1?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus1?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk1?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus1?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Tugas Akhir:&nbsp;<?= $row->skripsi1?><?=("\n")?>-<?= $pendidikane2?>&nbsp;<?= $row->prodi2?><?php if($row->nomor_penyetaraan2 == ""){ ?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus2?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk2?><?=("\n")?><?php }else{?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Penyetaraan:&nbsp;<?= $row->nomor_penyetaraan2?><?=("\n")?><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Tesis:&nbsp;<?= $row->tesis?><?=("\n")?><?php if($row->ipk3 == '' and $row->thn_lulus3 == ''){}else{ ?> -<?= $pendidikane3?>&nbsp;<?= $row->prodi3?><?php if($row->nomor_penyetaraan3 == ""){ ?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus3?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk3?><?=("\n")?><?php }else{?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nomor Penyetaraan:&nbsp;<?= $row->nomor_penyetaraan3?><?=("\n")?><?php } ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Disertasi:&nbsp;<?= $row->desertasi?><?php }?>
                                        </textarea>
                                    </div>
                                </div>
								<?php }?>
								 <div class="col-md-12">
									<div class="form-group">
										<label for="nama" class="control-label">
											Toefl
											<?php
												if($row->toefl == 'Lain-lain'){
											?>
											<?= $row->jenis_toefl?>&nbsp;<?= $row->toefl_lainnya?>
											<?php
												}else{
													echo $row->jenis_toefl;
												}
											?>
										</label>
										<input type="text" class="form-control" value="<?= $row->toefl?>" disabled>
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="nama" class="control-label">Formasi:</label>
										<input type="text" class="form-control" value="<?= $row->nm_kualifikasi ?>&nbsp;(<?= $row->kode_kualifikasi?>-<?= $row->penempatan?>)" disabled> 
									</div>
								</div>
								<div class="col-md-12">
									<div class="form-group">
										<label for="nama" class="control-label">Syarat Jenjang dan Pendidikan :</label>
										<textarea class="form-control" rows="6" value="" disabled><?= $row->jenjang?><?=("\n")?>Syarat Pendidikan Awal:&nbsp;<?= $row->syarat_pend_awal?><?=("\n")?>Syarat Pendidikan Akhir:&nbsp;<?= $row->syarat_pend_akhir?></textarea>
									</div>
								</div>
								<?php }?>
								<div class="col-md-16 col-xs-12">
								<form id="ubah-status2">
									<div class="white-box">
										<table class="table" id="table-file" border="1">
										<thead>
											<tr>
												<th width="1%" class="text-center">No</th>
												<th width="20%" class="text-center">Kategori File</th>
												<th width="10%" class="text-center">File</th>
												<th width="30%" class="text-center">Verifikasi Berkas</th>
											</tr>
										</thead>
										<tbody>
											<?php 
											if($tabel_file2->result()){
												?>
												<tr>
													<td class="text-center">1</td>
													<td>Surat Lamaran</td>
													<td class="text-center">
														<?php
															if(isset($lamaran)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $lamaran->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_lamaran" required>
															<?php
																if($tablePelamar->verif_lamaran == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_lamaran?>" selected="" ><?= $tablePelamar->verif_lamaran?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_lamaran == 'Tidak Sesuai dengan kategori file'){
															?>
															<option value="<?= $tablePelamar->verif_lamaran?>" selected="" ><?= $tablePelamar->verif_lamaran?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_lamaran == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_lamaran?>" selected="" ><?= $tablePelamar->verif_lamaran?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<?php
																}else{
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="text-center">2</td>
													<td>Kartu Tanda Penduduk</td>
													<td class="text-center">
														<?php
															if(isset($ktp)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $ktp->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_ktp" required>
															<?php
																if($tablePelamar->verif_ktp == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_ktp?>" selected="" ><?= $tablePelamar->verif_ktp?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Umur melebihi batas persyaratan">Umur melebihi batas persyaratan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_ktp == 'Tidak Sesuai dengan kategori file'){
															?>
															<option value="<?= $tablePelamar->verif_ktp?>" selected="" ><?= $tablePelamar->verif_ktp?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Umur melebihi batas persyaratan">Umur melebihi batas persyaratan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_ktp == 'Umur melebihi batas persyaratan'){
															?>
															<option value="<?= $tablePelamar->verif_ktp?>" selected="" ><?= $tablePelamar->verif_ktp?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_ktp == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_ktp?>" selected="" ><?= $tablePelamar->verif_ktp?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Umur melebihi batas persyaratan">Umur melebihi batas persyaratan</option>
															<?php
																}else{
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Umur melebihi batas persyaratan">Umur melebihi batas persyaratan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="text-center">3</td>
													<td>Foto</td>
													<td class="text-center">
														<?php
															if(isset($foto)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $foto->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_foto" required>
															<?php
																if($tablePelamar->verif_foto == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_foto?>" selected="" ><?= $tablePelamar->verif_foto?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_foto == 'Tidak Sesuai dengan kategori file'){
															?>
															<option value="<?= $tablePelamar->verif_foto?>" selected="" ><?= $tablePelamar->verif_foto?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_foto == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_foto?>" selected="" ><?= $tablePelamar->verif_foto?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<?php
																}else{
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="text-center">4</td>
													<td>Surat Keterangan Sehat</td>
													<td class="text-center">
														<?php
															if(isset($sks)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $sks->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_sks" required>
															<?php
																if($tablePelamar->verif_sks == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tidak Sesuai dengan kategori file'){
															?>
															
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari enam bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari tujuh bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari delapan bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari sembilan bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari sepuluh bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari sebelas bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tanggal periksa lebih dari dua belas bulan'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_sks == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_sks?>" selected="" ><?= $tablePelamar->verif_sks?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<?php
																}else if (empty($tablePelamar->verif_sks)){
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tanggal periksa lebih dari enam bulan">Tanggal periksa lebih dari enam bulan</option>
															<option value="Tanggal periksa lebih dari tujuh bulan">Tanggal periksa lebih dari tujuh bulan</option>
															<option value="Tanggal periksa lebih dari delapan bulan">Tanggal periksa lebih dari delapan bulan</option>
															<option value="Tanggal periksa lebih dari sembilan bulan">Tanggal periksa lebih dari sembilan bulan</option>
															<option value="Tanggal periksa lebih dari sepuluh bulan">Tanggal periksa lebih dari sepuluh bulan</option>
															<option value="Tanggal periksa lebih dari sebelas bulan">Tanggal periksa lebih dari sebelas bulan</option>
															<option value="Tanggal periksa lebih dari dua belas bulan">Tanggal periksa lebih dari dua belas bulan</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="text-center">5</td>
													<td>Surat Keterangan Catatan Kepolisian</td>
													<td class="text-center">
														<?php
															if(isset($skck)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $skck->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_skck" required>
															
															<?php
																if($tablePelamar->verif_skck == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_skck?>" selected="" ><?= $tablePelamar->verif_skck?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Kadaluwarsa">Kadaluwarsa</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_skck == 'Tidak Sesuai dengan kategori file'){
															?>
															<option value="<?= $tablePelamar->verif_skck?>" selected="" ><?= $tablePelamar->verif_skck?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Kadaluwarsa">Kadaluwarsa</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_skck == 'Kadaluwarsa'){
															?>
															<option value="<?= $tablePelamar->verif_skck?>" selected="" ><?= $tablePelamar->verif_skck?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_skck == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_skck?>" selected="" ><?= $tablePelamar->verif_skck?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Kadaluwarsa">Kadaluwarsa</option>
															<?php
																}else{
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Kadaluwarsa">Kadaluwarsa</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="text-center">6</td>
													<td>Surat Pernyataan Bebas Parpol / Organisasi Terlarang</td>
													<td class="text-center">
														<?php
															if(isset($suratpernyataanbebasparpol)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $suratpernyataanbebasparpol->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_suratpernyataanbebasparpol" required>
															<?php
																if($tablePelamar->verif_suratpernyataanbebasparpol == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_suratpernyataanbebasparpol?>" selected="" ><?= $tablePelamar->verif_suratpernyataanbebasparpol?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_suratpernyataanbebasparpol == 'Tidak Sesuai dengan kategori file'){
															?>
															<option value="<?= $tablePelamar->verif_suratpernyataanbebasparpol?>" selected="" ><?= $tablePelamar->verif_suratpernyataanbebasparpol?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_suratpernyataanbebasparpol == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_suratpernyataanbebasparpol?>" selected="" ><?= $tablePelamar->verif_suratpernyataanbebasparpol?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<?php
																}else{
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
												<tr>
													<td class="text-center">7</td>
													<td>Surat Pernyataan Bebas Ikatan Instansi</td>
													<td class="text-center">
														<?php
															if(isset($suratpernyataanbebasdariinstansi)){
														?>
														<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
															<a href="<?= base_url('')?><?= $suratpernyataanbebasdariinstansi->path_file?>" target="_blank" style="color:white;">Lihat</a>
														</button>
														<?php
															}else{
														?>
														<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</td>
													<td>
														<select type="text" class="form-control select2" name="verif_suratpernyataanbebasdariinstansi" required>
															<?php
																if($tablePelamar->verif_suratpernyataanbebasdariinstansi == 'Sesuai'){
															?>
															<option value="<?= $tablePelamar->verif_suratpernyataanbebasdariinstansi?>" selected="" ><?= $tablePelamar->verif_suratpernyataanbebasdariinstansi?></option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_suratpernyataanbebasdariinstansi == 'Tidak Sesuai dengan kategori file'){
															?>
															<option value="<?= $tablePelamar->verif_suratpernyataanbebasdariinstansi?>" selected="" ><?= $tablePelamar->verif_suratpernyataanbebasdariinstansi?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}else if($tablePelamar->verif_suratpernyataanbebasdariinstansi == 'Tidak Ada'){
															?>
															<option value="<?= $tablePelamar->verif_suratpernyataanbebasdariinstansi?>" selected="" ><?= $tablePelamar->verif_suratpernyataanbebasdariinstansi?></option>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<?php
																}else{
															?>
															<option value="Sesuai">Sesuai</option>
															<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
															<option value="Tidak Ada">Tidak Ada</option>
															<?php
																}
															?>
														</select>
													</td>
												</tr>
											<?php
												}else{
											?>
											<tr>
												<td colspan="3" class="text-center">No Data Available</td>
											</tr>
											<?php } ?>
										</tbody>
									</table>
									</div>
								</div>
								<div class="col-md-16 col-xs-12">
									<div class="white-box">
										<table class="table" id="table-file" border="1">
											<thead>
												<tr>
													<th width="3%" class="text-center">#</th>
													<th width="30%" class="text-center">Kategori File</th>
													<th width="10%" class="text-center">File</th>
													<th width="15%" class="text-center">Verifikasi Berkas</th>
													<th width="40%" class="text-center">Isian Verifikator</th>
												</tr>
											</thead>
											<tbody>
												<?php 
												if($tabel_file2->result()){
													$i = 0;
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Ijazah Sarjana / Sarjana Terapan</td>
														<td class="text-center">
															<?php
																if(isset($ijazah)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $ijazah->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_ijazah" required>
																<?php
																	if($tablePelamar->verif_ijazah == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah?>" selected="" ><?= $tablePelamar->verif_ijazah?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah?>" selected="" ><?= $tablePelamar->verif_ijazah?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah == 'Jenjang Pendidikan tidak sesuai persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah?>" selected="" ><?= $tablePelamar->verif_ijazah?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah == 'Menggunakan SKL'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah?>" selected="" ><?= $tablePelamar->verif_ijazah?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah == 'Nama Program Studi Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah?>" selected="" ><?= $tablePelamar->verif_ijazah?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah?>" selected="" ><?= $tablePelamar->verif_ijazah?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_ijazahprodi)){
															?>
															<input type="text" class="form-control" name="verifikator_ijazah" placeholder="Isikan Nama Prodi Sarjana"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_ijazah" value="<?= $tablePelamar->ket_ijazahprodi; ?>" placeholder="Isikan Nama Prodi Sarjana"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Transkrip Sarjana / Sarjana Terapan</td>
														<td class="text-center">
															<?php
																if(isset($transkrip)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $transkrip->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_transkrip" required>
																<?php
																	if($tablePelamar->verif_transkrip == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip?>" selected="" ><?= $tablePelamar->verif_transkrip?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip?>" selected="" ><?= $tablePelamar->verif_transkrip?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip == 'Menggunakan Transkrip sementara'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip?>" selected="" ><?= $tablePelamar->verif_transkrip?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip == 'IPK Kurang dari persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip?>" selected="" ><?= $tablePelamar->verif_transkrip?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip?>" selected="" ><?= $tablePelamar->verif_transkrip?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_transkripipk)){
															?>
															<input type="text" class="form-control" name="verifikator_transkrip" placeholder="Isikan IPK Sarjana" />
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_transkrip" value="<?= $tablePelamar->ket_transkripipk; ?>" placeholder="Isikan IPK Sarjana" />
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														if(!empty($tabelpelamar->nomor_penyetaraan)){
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Penyetaraan</td>
														<td class="text-center">
															<?php
																if(isset($penyetaraan)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $penyetaraan->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_penyetaraan" required>
																<?php
																	if($tablePelamar->verif_penyetaraan == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan?>" selected="" ><?= $tablePelamar->verif_penyetaraan?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan?>" selected="" ><?= $tablePelamar->verif_penyetaraan?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan?>" selected="" ><?= $tablePelamar->verif_penyetaraan?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_penyetaraan)){
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan" placeholder="Isikan No. Penyetaraan Sarjana"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan" value="<?= $tablePelamar->ket_penyetaraan; ?>" placeholder="Isikan No. Penyetaraan Sarjana"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}else{
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Perguruan Tinggi pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasi)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasi->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasi" required>
																<?php
																	if($tablePelamar->verif_akreditasipt == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt?>" selected="" ><?= $tablePelamar->verif_akreditasipt?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt?>" selected="" ><?= $tablePelamar->verif_akreditasipt?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt?>" selected="" ><?= $tablePelamar->verif_akreditasipt?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt?>" selected="" ><?= $tablePelamar->verif_akreditasipt?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if($tablePelamar->ket_akreditasipt == '' and $tablePelamar->ket_akreditasiptsaatlulus == ''){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi" placeholder="Isi Akreditasi PT Sajana sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasisaatlulus" placeholder="Isi Akreditasi PT Sajana pada saat lulus"/>
															<?php
																}else if($tablePelamar->ket_akreditasipt != '' and $tablePelamar->ket_akreditasiptsaatlulus == ''){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi" value="<?= $tablePelamar->ket_akreditasipt; ?>" placeholder="Isi Akreditasi PT Sajana sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasisaatlulus" placeholder="Isi Akreditasi PT Sajana pada saat lulus"/>
															<?php
																}else if($tablePelamar->ket_akreditasipt == '' and $tablePelamar->ket_akreditasiptsaatlulus != ''){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi" placeholder="Isi Akreditasi PT Sajana sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasisaatlulus" value="<?= $tablePelamar->ket_akreditasiptsaatlulus; ?>" placeholder="Isi Akreditasi PT Sajana pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi" value="<?= $tablePelamar->ket_akreditasipt; ?>" placeholder="Isi Akreditasi PT Sajana sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasisaatlulus" value="<?= $tablePelamar->ket_akreditasiptsaatlulus; ?>" placeholder="Isi Akreditasi PT Sajana pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Prodi pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasiprodi)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasiprodi->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasiprodi" required>
																<?php
																	if($tablePelamar->verif_akreditasiprodi == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi" value="<?= $tablePelamar->ket_akreditasiprodi; ?>" placeholder="Isi Akreditasi PS Sajana sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodisaatlulus" value="<?= $tablePelamar->ket_akreditasiprodisaatlulus; ?>" placeholder="Isi Akreditasi PS Sajana pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi" placeholder="Isi Akreditasi PS Sajana sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodisaatlulus" placeholder="Isi Akreditasi PS Sajana pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}
													?>
													<?php
														if($tabelpelamar->pend_profesi == "Ya"){
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Ijazah Sarjana Profesi</td>
														<td class="text-center">
															<?php
																if(isset($ijazah1)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $ijazah1->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_ijazah1" required>
																<?php
																	if($tablePelamar->verif_ijazah1 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah1?>" selected="" ><?= $tablePelamar->verif_ijazah1?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah1 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah1?>" selected="" ><?= $tablePelamar->verif_ijazah1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah1 == 'Jenjang Pendidikan tidak sesuai persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah1?>" selected="" ><?= $tablePelamar->verif_ijazah1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah1 == 'Menggunakan SKL'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah1?>" selected="" ><?= $tablePelamar->verif_ijazah1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah1 == 'Nama Program Studi Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah1?>" selected="" ><?= $tablePelamar->verif_ijazah1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah1 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah1?>" selected="" ><?= $tablePelamar->verif_ijazah1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_ijazahprodi1)){
															?>
															<input type="text" class="form-control" name="verifikator_ijazah1" placeholder="Isikan Nama Prodi Profesi" />
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_ijazah1" value="<?= $tablePelamar->ket_ijazahprodi1; ?>" placeholder="Isikan Nama Prodi Profesi" />
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Transkrip Sarjana Profesi</td>
														<td class="text-center">
															<?php
																if(isset($transkrip1)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $transkrip1->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_transkrip1" required>
																<?php
																	if($tablePelamar->verif_transkrip1 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip1?>" selected="" ><?= $tablePelamar->verif_transkrip1?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip1 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip1?>" selected="" ><?= $tablePelamar->verif_transkrip1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip1 == 'Menggunakan Transkrip sementara'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip1?>" selected="" ><?= $tablePelamar->verif_transkrip1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip1 == 'IPK Kurang dari persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip1?>" selected="" ><?= $tablePelamar->verif_transkrip1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip1 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip1?>" selected="" ><?= $tablePelamar->verif_transkrip1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_transkripipk1)){
															?>
															<input type="text" class="form-control" name="verifikator_transkrip1" placeholder="Isikan IPK Profesi"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_transkrip1" value="<?= $tablePelamar->ket_transkripipk1; ?>" placeholder="Isikan IPK Profesi"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														if(!empty($tabelpelamar->nomor_penyetaraan1)){
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Penyetaraan Sarjana Profesi</td>
														<td class="text-center">
															<?php
																if(isset($penyetaraan1)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $penyetaraan1->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_penyetaraan1" required>
																<?php
																	if($tablePelamar->verif_penyetaraan1 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan1?>" selected="" ><?= $tablePelamar->verif_penyetaraan1?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan1 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan1?>" selected="" ><?= $tablePelamar->verif_penyetaraan1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan1 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan1?>" selected="" ><?= $tablePelamar->verif_penyetaraan1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_penyetaraan1)){
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan1" placeholder="Isikan No. Penyetaraan Profesi">
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan1" value="<?= $tablePelamar->ket_penyetaraan1; ?>" placeholder="Isikan No. Penyetaraan Profesi">
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}else{
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Perguruan Tinggi Sarjana Profesi pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasi1)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasi1->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasi1" required>
																<?php
																	if($tablePelamar->verif_akreditasipt1 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt1?>" selected="" ><?= $tablePelamar->verif_akreditasipt1?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt1 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt1?>" selected="" ><?= $tablePelamar->verif_akreditasipt1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt1 == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt1?>" selected="" ><?= $tablePelamar->verif_akreditasipt1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt1 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt1?>" selected="" ><?= $tablePelamar->verif_akreditasipt1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi1" value="<?= $tablePelamar->ket_akreditasipt1; ?>" placeholder="Isi Akreditasi PT Sajana Profesi sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasi1saatlulus" value="<?= $tablePelamar->ket_akreditasipt1saatlulus; ?>" placeholder="Isi Akreditasi PT Sajana Profesi pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi1" placeholder="Isi Akreditasi PT Sajana Profesi sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasi1saatlulus" placeholder="Isi Akreditasi PT Sajana Profesi pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Prodi Sarjana Profesi pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasiprodi1)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasiprodi1->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasiprodi1" required>
																<?php
																	if($tablePelamar->verif_akreditasiprodi1 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi1?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi1?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi1 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi1?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi1 == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi1?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi1 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi1?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi1?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi1" value="<?= $tablePelamar->ket_akreditasiprodi1; ?>" placeholder="Isi Akreditasi PS Sajana Profesi sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi1saatlulus" value="<?= $tablePelamar->ket_akreditasiprodi1saatlulus; ?>" placeholder="Isi Akreditasi PS Sajana Profesi pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi1" placeholder="Isi Akreditasi PS Sajana Profesi sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi1saatlulus" placeholder="Isi Akreditasi PS Sajana Profesi pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}
													?>
													<?php
														}else{}
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Ijazah Magister / Magister Terapan</td>
														<td class="text-center">
															<?php
																if(isset($ijazah2)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $ijazah2->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_ijazah2" required>
																<?php
																	if($tablePelamar->verif_ijazah2 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah2?>" selected="" ><?= $tablePelamar->verif_ijazah2?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah2 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah2?>" selected="" ><?= $tablePelamar->verif_ijazah2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah2 == 'Jenjang Pendidikan tidak sesuai persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah2?>" selected="" ><?= $tablePelamar->verif_ijazah2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah2 == 'Menggunakan SKL'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah2?>" selected="" ><?= $tablePelamar->verif_ijazah2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah2 == 'Nama Program Studi Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah2?>" selected="" ><?= $tablePelamar->verif_ijazah2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah2 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah2?>" selected="" ><?= $tablePelamar->verif_ijazah2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_ijazahprodi2)){
															?>
															<input type="text" class="form-control" name="verifikator_ijazah2" placeholder="Isikan Nama Prodi Magister"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_ijazah2" value="<?= $tablePelamar->ket_ijazahprodi2; ?>" placeholder="Isikan Nama Prodi Magister"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Transkrip Magister / Magister Terapan</td>
														<td class="text-center">
															<?php
																if(isset($transkrip2)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $transkrip2->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_transkrip2" required>
																<?php
																	if($tablePelamar->verif_transkrip2 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip2?>" selected="" ><?= $tablePelamar->verif_transkrip2?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip2 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip2?>" selected="" ><?= $tablePelamar->verif_transkrip2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip2 == 'Menggunakan Transkrip sementara'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip2?>" selected="" ><?= $tablePelamar->verif_transkrip2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip2 == 'IPK Kurang dari persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip2?>" selected="" ><?= $tablePelamar->verif_transkrip2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip2 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip2?>" selected="" ><?= $tablePelamar->verif_transkrip2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_transkripipk2)){
															?>
															<input type="text" class="form-control" name="verifikator_transkrip2" placeholder="Isikan IPK Magister"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_transkrip2" value="<?= $tablePelamar->ket_transkripipk2; ?>" placeholder="Isikan IPK Magister"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														if(!empty($tabelpelamar->nomor_penyetaraan2)){
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Penyetaraan Magister / Magister Terapan</td>
														<td class="text-center">
															<?php
																if(isset($penyetaraan2)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $penyetaraan2->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_penyetaraan2" required>
																<?php
																	if($tablePelamar->verif_penyetaraan2 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan2?>" selected="" ><?= $tablePelamar->verif_penyetaraan2?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan2 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan2?>" selected="" ><?= $tablePelamar->verif_penyetaraan2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan2 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan2?>" selected="" ><?= $tablePelamar->verif_penyetaraan2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_penyetaraan2)){
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan2" placeholder="Isikan No. Penyetaraan" />
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan2" value="<?= $tablePelamar->ket_penyetaraan2; ?>" placeholder="Isikan No. Penyetaraan" />
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}else{
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Perguruan Tinggi Magister / Magister Terapan pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasi2)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasi2->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasi2" required>
																<?php
																	if($tablePelamar->verif_akreditasipt2 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt2?>" selected="" ><?= $tablePelamar->verif_akreditasipt2?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt2 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt2?>" selected="" ><?= $tablePelamar->verif_akreditasipt2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt2 == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt2?>" selected="" ><?= $tablePelamar->verif_akreditasipt2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt2 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt2?>" selected="" ><?= $tablePelamar->verif_akreditasipt2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi2" value="<?= $tablePelamar->ket_akreditasipt2; ?>" placeholder="Isi Akreditasi PT Magister sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasi2saatlulus" value="<?= $tablePelamar->ket_akreditasipt2saatlulus; ?>" placeholder="Isi Akreditasi PT Magister pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi2" placeholder="Isi Akreditasi PT Magister sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasi2saatlulus" placeholder="Isi Akreditasi PT Magister pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Prodi Magister / Magister Terapan pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasiprodi2)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasiprodi2->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasiprodi2" required>
																<?php
																	if($tablePelamar->verif_akreditasiprodi2 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi2?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi2?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi2 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi2?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi2 == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi2?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi2 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi2?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi2?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi2" value="<?= $tablePelamar->ket_akreditasiprodi2; ?>" placeholder="Isi Akreditasi PS Magister sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi2saatlulus" value="<?= $tablePelamar->ket_akreditasiprodi2saatlulus; ?>" placeholder="Isi Akreditasi PS Magister pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi2" placeholder="Isi Akreditasi PS Magister sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi2saatlulus" placeholder="Isi Akreditasi PS Magister pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}
													?>
													<?php
														if($tabelpelamar->pendidikan_terakhir > 8){
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Ijazah Doktor / Doktor Terapan</td>
														<td class="text-center">
															<?php
																if(isset($ijazah3)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $ijazah3->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_ijazah3" required>
																<?php
																	if($tablePelamar->verif_ijazah3 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah3?>" selected="" ><?= $tablePelamar->verif_ijazah3?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah3 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah3?>" selected="" ><?= $tablePelamar->verif_ijazah3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah3 == 'Jenjang Pendidikan tidak sesuai persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah3?>" selected="" ><?= $tablePelamar->verif_ijazah3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah3 == 'Menggunakan SKL'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah3?>" selected="" ><?= $tablePelamar->verif_ijazah3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah3 == 'Nama Program Studi Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah3?>" selected="" ><?= $tablePelamar->verif_ijazah3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_ijazah3 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_ijazah3?>" selected="" ><?= $tablePelamar->verif_ijazah3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Jenjang Pendidikan tidak sesuai persyaratan">Jenjang Pendidikan tidak sesuai persyaratan</option>
																<option value="Menggunakan SKL">Menggunakan SKL</option>
																<option value="Nama Program Studi Tidak Sesuai dengan persyaratan">Nama Program Studi Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_ijazahprodi3)){
															?>
															<input type="text" class="form-control" name="verifikator_ijazah3" placeholder="Isikan nama Prodi"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_ijazah3" value="<?= $tablePelamar->ket_ijazahprodi3; ?>" placeholder="Isikan nama Prodi"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Transkrip Doktor / Doktor Terapan</td>
														<td class="text-center">
															<?php
																if(isset($transkrip3)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $transkrip3->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_transkrip3" required>
																<?php
																	if($tablePelamar->verif_transkrip3 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip3?>" selected="" ><?= $tablePelamar->verif_transkrip3?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip3 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip3?>" selected="" ><?= $tablePelamar->verif_transkrip3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip3 == 'Menggunakan Transkrip sementara'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip3?>" selected="" ><?= $tablePelamar->verif_transkrip3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip3 == 'IPK Kurang dari persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip3?>" selected="" ><?= $tablePelamar->verif_transkrip3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_transkrip3 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_transkrip3?>" selected="" ><?= $tablePelamar->verif_transkrip3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Menggunakan Transkrip sementara">Menggunakan Transkrip sementara</option>
																<option value="IPK Kurang dari persyaratan">IPK Kurang dari persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_transkripipk3)){
															?>
															<input type="text" class="form-control" name="verifikator_transkrip3" placeholder="Isikan IPK Doktor"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_transkrip3" value="<?= $tablePelamar->ket_transkripipk3; ?>" placeholder="Isikan IPK Doktor"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														if(!empty($tabelpelamar->nomor_penyetaraan3)){
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Penyetaraan Doktor / Doktor Terapan</td>
														<td class="text-center">
															<?php
																if(isset($penyetaraan3)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $penyetaraan3->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_penyetaraan3" required>
																<?php
																	if($tablePelamar->verif_penyetaraan3 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan3?>" selected="" ><?= $tablePelamar->verif_penyetaraan3?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan3 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan3?>" selected="" ><?= $tablePelamar->verif_penyetaraan3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_penyetaraan3 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_penyetaraan3?>" selected="" ><?= $tablePelamar->verif_penyetaraan3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(empty($tablePelamar->ket_penyetaraan3)){
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan3" placeholder="Isikan No. Penyetaraan Doktor" />
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_penyetaraan3" value="<?= $tablePelamar->ket_penyetaraan3; ?>" placeholder="Isikan No. Penyetaraan Doktor" />
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}else{
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Perguruan Tinggi Doktor / Doktor Terapan pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasi3)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasi3->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasi3" required>
																<?php
																	if($tablePelamar->verif_akreditasipt3 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt3?>" selected="" ><?= $tablePelamar->verif_akreditasipt3?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt3 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt3?>" selected="" ><?= $tablePelamar->verif_akreditasipt3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt3 == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt3?>" selected="" ><?= $tablePelamar->verif_akreditasipt3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasipt3 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasipt3?>" selected="" ><?= $tablePelamar->verif_akreditasipt3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar->ket_akreditasipt3)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi3" value="<?= $tablePelamar->ket_akreditasipt3; ?>" placeholder="Isi Akreditasi PT Doktor sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasi3saatlulus" value="<?= $tablePelamar->ket_akreditasipt3saatlulus?>" placeholder="Isi Akreditasi PT Doktor pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasi3" placeholder="Isi Akreditasi PT Doktor sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasi3saatlulus" placeholder="Isi Akreditasi PT Doktor pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<tr>
														<td class="text-center">*</td>
														<td>Akreditasi Prodi Doktor / Doktor Terapan pada saat lulus</td>
														<td class="text-center">
															<?php
																if(isset($akreditasiprodi3)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $akreditasiprodi3->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_akreditasiprodi3" required>
																<?php
																	if($tablePelamar->verif_akreditasiprodi3 == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi3?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi3?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi3 == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi3?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi3 == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi3?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_akreditasiprodi3 == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_akreditasiprodi3?>" selected="" ><?= $tablePelamar->verif_akreditasiprodi3?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if(isset($tablePelamar->ket_akreditasiprodi3)){
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi3" value="<?= $tablePelamar->ket_akreditasiprodi3; ?>" placeholder="Isi Akreditasi PS Doktor sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi3saatlulus" value="<?= $tablePelamar->ket_akreditasiprodi3saatlulus; ?>" placeholder="Isi Akreditasi PS Doktor pada saat lulus"/>
															<?php
																}else{
															?>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi3" placeholder="Isi Akreditasi PS Doktor sesuai file upload"/>
															<br>
															<input type="text" class="form-control" name="verifikator_akreditasiprodi3saatlulus" placeholder="Isi Akreditasi PS Doktor pada saat lulus"/>
															<?php
																}
															?>
														</td>
													</tr>
													<?php
														}
													?>
													<?php
														}else{}
													?>
													<tr>
														<td class="text-center">*</td>
														<td>Toefl
														<?php 
															if($tabelpelamar->jenis_toefl == "Lain-lain"){
																echo $tabelpelamar->jenis_toefl.' ('.$tabelpelamar->toefl_lainnya.')';
															}else{
																echo $tabelpelamar->jenis_toefl;
															}
														?>
														</td>
														<td class="text-center">
															<?php
																if(isset($sertifikat)){
															?>
															<button type="button" class="fcbtn btn btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('')?><?= $sertifikat->path_file?>" target="_blank" style="color:white;">Lihat</a>
															</button>
															<?php
																}else{
															?>
															<button disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</td>
														<td>
															<select type="text" class="form-control select2" name="verif_sertifikat" required>
																<?php
																	if($tablePelamar->verif_toefl == 'Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_toefl?>" selected="" ><?= $tablePelamar->verif_toefl?></option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_toefl == 'Tidak Sesuai dengan kategori file'){
																?>
																<option value="<?= $tablePelamar->verif_toefl?>" selected="" ><?= $tablePelamar->verif_toefl?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_toefl == 'Tidak Sesuai dengan persyaratan'){
																?>
																<option value="<?= $tablePelamar->verif_toefl?>" selected="" ><?= $tablePelamar->verif_toefl?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}else if($tablePelamar->verif_toefl == 'Tidak Ada'){
																?>
																<option value="<?= $tablePelamar->verif_toefl?>" selected="" ><?= $tablePelamar->verif_toefl?></option>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<?php
																	}else{
																?>
																<option value="Sesuai dengan persyaratan">Sesuai dengan persyaratan</option>
																<option value="Tidak Sesuai dengan kategori file">Tidak Sesuai dengan kategori file</option>
																<option value="Tidak Sesuai dengan persyaratan">Tidak Sesuai dengan persyaratan</option>
																<option value="Tidak Ada">Tidak Ada</option>
																<?php
																	}
																?>
															</select>
														</td>
														<td>
															<?php
																if($tabelpelamar->jenis_toefl == "Lain-lain"){
															?>
															<input type="hidden" name="verifikator_jenistoefl" value="<?= $tabelpelamar->toefl_lainnya?>"/>
															<input type="text" class="form-control" name="verifikator_sertifikat" value="<?= $tablePelamar->ket_toefl; ?>" placeholder="Isikan skor toefl"/>
															<br>
															<input type="text" class="form-control" name="verifikator_konversiitp" value="<?= $tablePelamar->ket_konversiitp; ?>" placeholder="Isikan skor konversi ke ITP"/>
															<br>
															<input type="text" class="form-control" name="verifikator_lembagapenerbit" value="<?= $tablePelamar->ket_lembagapenerbit; ?>" placeholder="Isikan lembaga penerbit toefl"/>
															<?php
																}else if($tabelpelamar->jenis_toefl == "IBT" or $tabelpelamar->jenis_toefl == "TOEIC"){
															?>
															<input type="text" class="form-control" name="verifikator_sertifikat" value="<?= $tablePelamar->ket_toefl; ?>" placeholder="Isikan skor toefl"/>
															<br>
															<input type="text" class="form-control" name="verifikator_konversiitp" value="<?= $tablePelamar->ket_konversiitp; ?>" placeholder="Isikan skor konversi ke ITP"/>
															<?php
																}else{
															?>
															<input type="hidden" name="verifikator_jenistoefl" value="<?= $tabelpelamar->jenis_toefl?>"/>
															<input type="text" class="form-control" value="<?= $tablePelamar->ket_toefl; ?>" name="verifikator_sertifikat" placeholder="Isikan skor toefl"/>
															<?php
																}
															?>
															
														</td>
													</tr>
												<?php
													}else{
												?>
												<tr>
													<td colspan="3" class="text-center">No Data Available</td>
												</tr>
												<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<hr>
								<div class="col-md-12">
									<div class="white-box">
										<?php
											foreach($query->result() as $row){
												$status = $row->status;

												if($status == 1){
													$statuse = "Lolos";
												}else if($status == 2){
													$statuse = "Tidak Lolos";
												}else{
													$statuse = "Sedang Proses";
												}

												if($status == '3'){
										?>
										<input type="hidden" class="form-control" name="id" value="<?= $idpelamar?>">
										<div class="col-md-12">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="nama" class="control-label">Status</label><br>
													<select type="text" class="form-control select2" name="status" required>
														<option value="1" selected="">Lolos</option>
														<option value="2">Tidak Lolos</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
										<div class="col-md-12">
											<div class="col-md-6">
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="nama" class="control-label">Keterangan Pelamar :</label>
													<span><button type="button" id="info-status" class="btn btn-default btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip">SEDANG PROSES</button></span>
												</div>
												<button type="submit" class="btn btn-success g-brd-main--hover g-bg-main--hover g-font-weight-900 text-uppercase g-px-25 g-py-20 waves-effect waves-light">Simpan</button>
											</div>
											</form>
										</div>
										</div>
										<?php 
											}elseif($status == 1){
										?>
											<div class="row">
											<div class="col-md-12">
											<div class="col-md-6">
											</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="nama" class="control-label">Keterangan Pelamar :</label>
														<span><button type="button" id="info-status" class="btn btn-success btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-check"></i><?= $statuse?></button></span>
													</div>
													<!--<button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>-->
												</div>
											</div>
											</div>
										<?php 
											}elseif($status == 2){
										?>
											<div class="row">
											<div class="col-md-12">
											<div class="col-md-6">
											</div>
												<div class="col-md-6">
													<div class="form-group">
														<label for="nama" class="control-label">Keterangan Pelamar :</label>
														<span><button type="button" id="info-status" class="btn btn-danger btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-close"></i><?= $statuse?></button></span>
													</div>
													<!--<button type="submit" class="btn btn-success waves-effect waves-light">Simpan</button>-->
												</div>
											</div>
											</div>
										<?php
											}
										?>
										<?php }?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php $this->load->view('modal-filehal_admin'); ?>
            <?php $this->load->view('modal-fileadmin'); ?>
			</div>
			<?php $this->load->view('footer'); ?>
        </div>
    <!-- jQuery -->
    <?php $this->load->view('scripts') ?>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ubah-status2').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
                swal({
                    title: "Apakah Anda Yakin?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Ya!",
                    cancelButtonText: "Tidak, Ubah!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
			function (isConfirm) {
				if (isConfirm) {
					$.ajax({
						url: '<?= site_url('PelamarCntrl/verifikasi2') ?>',
						data:formData,
						type:'POST',
						contentType: false,
						processData: false,
						success: function (data) {
							if (data['return'] == 2){
								swal("Sukses", "Status Pelamar Telah Berubah.", "success");
								window.location.href = "";
							}
						},
					});
				} else {
					swal("Ubah Data", "error");
				}
			});

			return false;
		});
		
		$('#slimtest4').slimScroll({
            color: '#00f',
            size: '10px',
            height: '1000px',
            alwaysVisible: true
        });

		
    });
</script>
