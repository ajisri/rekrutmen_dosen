<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('header'); ?>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<!-- <div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" />
    </svg>
</div> -->
<!-- ============================================================== -->
<!-- Wrapper -->
<!-- ============================================================== -->
<div id="wrapper">
    <!-- ============================================================== -->
    <!-- Topbar header - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <?php $this->load->view('navbar'); ?>
    <!-- End Top Navigation -->
    <!-- ============================================================== -->
    <!-- Left Sidebar - style you can find in sidebar.scss  -->
    <!-- ============================================================== -->
    <?php $this->load->view('sidebar'); ?>
    <!-- ============================================================== -->
    <!-- End Left Sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- Page Content -->
    <!-- ============================================================== -->
    <div id="page-wrapper">
        <div class="container-fluid">
            <div class="row bg-title">
                <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><?= $title ?></h4> </div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <h4 class="pull-right"><?= $date ?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		</div>
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- Different data widgets -->
            <!-- ============================================================== -->
		<div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="box-title" style="margin-top: 10px;margin-bottom: -10px"> Resume Pelamar</h3><br><br>
                            </div>
							<div class="col-sm-12">
								<div class="row">
									<form action="<?= base_url('hal_asesor'); ?>" method="POST" enctype="multipart/form-data">
										<div class="form-group">
											<div class="col-md-12">
												<div class="col-md-6">
													<input type="text" class="form-control" name="nomor_pendaftaran" placeholder="Isikan Nomor Pendaftaran" />
												</div>
												<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Cari</button>
											</div>
										</div>
									</form>
								</div>
                            </div>
                        </div>
						</br>
						<br class="m-t-0 m-b-40">
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-xs-12">
					<?php
						if($nmr_daftar == ''){}else{
					?>
					<div class="white-box">
						<div class="panel-body" style="text-align: center">
							<div class="user-content">
								<?php
									if(isset($foto)){
								?>
								<a href="javascript:void(0)"></a><a href="<?= site_url('')?><?= $foto->path_file?>" data-toggle="lightbox" data-gallery="multiimages"><img src="<?= site_url('')?><?= $foto->path_file?>" alt="user-img" class="img img-thumbnail" style="max-width: 120px"></a>
								<?php
									}else{
								?>
								<a href="javascript:void(0)"></a><a href="<?= base_url('temp/plugins/images/users/default.jpg') ?>" data-toggle="lightbox" data-gallery="multiimages"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" alt="user-img" class="img img-thumbnail" style="max-width: 120px"></a>
								<?php
									}
								?>
								<hr style="border-color: rgb(43 102 152 / 49%); margin-top: 10px; margin-bottom: 20px; border: 0; border-top: 1px solid #2b669859;">
								<h4 class="text-black">
									<?php
										if(isset($tabelpelamar->nama_pelamar)){
									?>
									<?= $tabelpelamar->nama_pelamar?>
									<?php
										}else{
									?>
									Tidak ada isi
									<?php
										}
									?>
								</h4>
								<h5 class="text-black">
									<?php
										if(isset($tabelpelamar->no_pendaftaran)){
									?>
									<?= $tabelpelamar->no_pendaftaran?>
									<?php
										}else{
									?>
									Tidak ada isi
									<?php
										}
									?>
								</h5>
								<h5 class="text-black">
									<?php
										if(isset($tabelpelamar->email)){
									?>
									<?= $tabelpelamar->email?>
									<?php
										}else{
									?>
									Tidak ada isi
									<?php
										}
									?>
								</h5>
							</div>
							<hr style="border-color: rgb(43 102 152 / 49%); margin-top: 30px; margin-bottom: -7px; border: 0; border-top: 1px solid #2b669859;">
						</div>
						<div class="user-btm-box">
							<div class="col-md-12">
								<p class="text-black"><strong>Pendidikan Terakhir: </strong></p>
								<h4>
								<?php
									if(!empty($tabelpelamar->pendidikan_terakhir)){
										if($tabelpelamar->pendidikan_terakhir == '1'){
											$pendidikan_terakhir = 'SMA Sederajat';
										}else if($tabelpelamar->pendidikan_terakhir == '2'){
											$pendidikan_terakhir = 'Diploma';
										}else if($tabelpelamar->pendidikan_terakhir == '3'){
											$pendidikan_terakhir = 'Sarjana Terapan';
										}else if($tabelpelamar->pendidikan_terakhir == '4'){
											$pendidikan_terakhir = 'Sarjana';
										}else if($tabelpelamar->pendidikan_terakhir == '5'){
											$pendidikan_terakhir = 'Sarjana Profesi';
										}else if($tabelpelamar->pendidikan_terakhir == '6'){
											$pendidikan_terakhir = 'Magister';
										}else if($tabelpelamar->pendidikan_terakhir == '7'){
											$pendidikan_terakhir = 'Magister Terapan';
										}else if($tabelpelamar->pendidikan_terakhir == '8'){
											$pendidikan_terakhir = 'Dokter Spesialis';
										}else if($tabelpelamar->pendidikan_terakhir == '9'){
											$pendidikan_terakhir = 'Doktor';
										}else if($tabelpelamar->pendidikan_terakhir == '10'){
											$pendidikan_terakhir = 'Doktor Terapan';
										}else if($tabelpelamar->pendidikan_terakhir == '11'){
											$pendidikan_terakhir = 'Dokter Sub Spesialis';
										}
										
										if($pendidikan_terakhir == '6' or $pendidikan_terakhir == '7' or $pendidikan_terakhir == '8'){
											$proditerakhir = $tabelpelamar->prodi2;
										}else if($pendidikan_terakhir == '9' or $pendidikan_terakhir == '10' or $pendidikan_terakhir == '11'){
											$proditerakhir = $tabelpelamar->prodi3;	
										}
								?>
										<p><?= $pendidikan_terakhir?> </p>
								<?php
									}else{
								?>
								Tidak ada isi
								<?php
									}
								?>
								</h4>
								<br class="g-mb-20">
								<p class="text-black"><strong>Formasi: </strong></p>
								<h4>
								<?php
									if(isset($tabelpelamar->id_kualifikasi)){
								?>
								<?= $formasipelamar->nm_kualifikasi ?> &nbsp;(<?= $formasipelamar->kode_kualifikasi ?>) <br class="g-mb-20">(<?= $formasipelamar->penempatan ?>)</br>
								<?php
									}else{
								?>
								Tidak ada isi
								<?php
									}
								?>
								</h4>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8 col-xs-12">
                    <div class="white-box">
                        <ul class="nav nav-tabs tabs customtab">
                            <li class="tab active">
                                <a href="#profile" data-toggle="tab"> <span class="visible-xs"><i class="fa fa-user"></i></span> <span class="hidden-xs">Profil</span> </a>
                            </li>
                            <li class="tab">
                                <a href="#pendidikan" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Pendidikan Sarjana</span> </a>
                            </li>
							<?php
								if(isset($tabelpelamar->pend_profesi)){
									if($tabelpelamar->pend_profesi == 'Ya'){
							?>
							<li class="tab">
                                <a href="#pendidikanProfesi" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Pendidikan Profesi</span> </a>
                            </li>
							<?php
									}
								}
							?>
							<li class="tab">
                                <a href="#pendidikanMagister" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Pendidikan Magister</span> </a>
                            </li>
							<?php
								if($datatingkatijazah == "6"){
							?>
							<li class="tab">
                                <a href="#pendidikanDoktor" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Pendidikan Doktor</span> </a>
                            </li>
							<?php
								}
							?>
                            <li class="tab">
                                <a href="#lampiran" data-toggle="tab" aria-expanded="false"> <span class="visible-xs"><i class="fa fa-cog"></i></span> <span class="hidden-xs">Lampiran</span> </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="profile">
                                <div class="row">
                                    <div class="col-md-12 col-xs-6 b-r"> <strong>Nama Lengkap</strong>
                                        <br>
                                        <p class="text-muted">
											<?php
												if(isset($tabelpelamar->nama_pelamar)){
											?>
											<?= $tabelpelamar->gelar_depan?> &nbsp;<?= $tabelpelamar->nama_pelamar?>,&nbsp;<?= $tabelpelamar->gelar_belakang?>
											<?php
												}else{
											?>
											Tidak ada isi
											<?php
												}
											?>
										</p>
                                    </div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"> <strong>Tempat, Tanggal Lahir</strong>
										<br>
										<p class="text-muted">
											<?php
												if(isset($tabelpelamar->tanggal_lahir)){
													$tanggal = new DateTime($tabelpelamar->tanggal_lahir);

													// tanggal hari ini
													$today = new DateTime('2022-07-01');

													// tahun
													$y = $today->diff($tanggal)->y;

													// bulan
													$m = $today->diff($tanggal)->m;

													// hari
													$d = $today->diff($tanggal)->d;
											?>
												<?= $tabelpelamar->tempat_lahir?>, &nbsp;<?= date('d-m-Y', strtotime($tabelpelamar->tanggal_lahir)).' (Umur: ' . $y . ' th ' . $m . ' bln ' . $d . ' hari)';?>
											<?php
												}else{
											?>
												Tidak ada isi
											<?php
												}
											?>
										</p>
									</div>
									<div class="col-md-5 m-t-30 col-xs-6 b-r"> <strong>Jenis Kelamin</strong>
										<br>
										<p class="text-muted">
											<?php
												if(isset($tabelpelamar->jenis_kelamin)){
											?>
											<?= $tabelpelamar->jenis_kelamin?>
											<?php
												}else{
											?>
											Tidak ada isi
											<?php
												}
											?>
										</p>
									</div>
									<div class="col-md-7 m-t-30 col-xs-4 b-r"> <strong>Status Menikah</strong>
										<br>
										<p class="text-muted">
											<?php
												if(isset($status_kawin)){
											?>
												<?= $status_kawin?>
											<?php
												}else{
											?>
											Tidak ada isi
											<?php
												}
											?>
										</p>
									</div>
									<div class="col-md-12 m-t-30 col-xs-4 b-r"> <strong>Agama</strong>
										<br>
										<p class="text-muted">
											<?php
												if(isset($readagama->agama)){
											?>
											<?= $readagama->agama?>
											<?php
												}else{
											?>
												Tidak ada isi
											<?php
												}
											?>
										</p>
									</div>
                                    <div class="col-md-5 m-t-30 col-xs-4 b-r"> <strong>No. HP</strong>
                                        <br>
                                        <p class="text-muted">
											<?php
												if(isset($tabelpelamar->no_telepon)){
											?>
											<?= $tabelpelamar->no_telepon?>
											<?php
												}else{
											?>
											Tidak ada isi
											<?php
												}
											?>
										</p>
                                    </div>
                                    <div class="col-md-7 m-t-30 col-xs-6 b-r"> <strong>Email</strong>
                                        <br>
                                        <p class="text-muted">
											<?php
												if(isset($tabelpelamar->email)){
											?>
											<?= $tabelpelamar->email?>
											<?php
												}else{
											?>
											Tidak ada isi
											<?php
												}
											?>
										</p>
                                    </div>
									<div class="col-md-12 m-t-20 col-xs-6 b-r"> <strong>Alamat</strong>
                                        <br>
                                        <p class="text-muted">
											<?php
												if(isset($tabelpelamar->alamat)){
											?>
											<?= $tabelpelamar->alamat?>
											<?php
												}else{
											?>
											Tidak ada isi
											<?php
												}
											?>
										</p>
                                    </div>
								</div>
							</div>
                            <div class="tab-pane" id="pendidikan">
                                <div class="row">
									<div class="col-md-12 m-t-30 col-xs-6 b-r"> <strong>Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->pendidikan)){
												if($tabelpelamar->pendidikan == 'S1'){
													$pendidikan = 'Sarjana';
												}else if($tabelpelamar->pendidikan == 'D4'){
													$pendidikan = 'Sarjana Terapan';
												}
										?>
											<p class="form-control-static"> <?= $pendidikan?> </p>
										<?php
											}else{
										?>
										<p>Tidak ada isi</p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"> <strong>Asal Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->asal_sekolah)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Nama Perguruan Tinggi</strong>
										<?php
											if(isset($tabelpelamar->nm_kampus)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->nm_kampus?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										if(isset($tabelpelamar->asal_sekolah)){
										if($tabelpelamar->asal_sekolah == 'Luar Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Nomor Penyetaraan</strong>
										<?php
											if(isset($tabelpelamar->nomor_penyetaraan)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else if($tabelpelamar->asal_sekolah == 'Dalam Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Akreditasi Perguruan Tinggi</strong>
										<?php
											if(!empty($tabelpelamar->akreditasi_kampus)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}
										}else{}
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Program Studi</strong>
										<?php
											if(isset($tabelpelamar->prodi)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->prodi?> </p>
										<?php
											}else{
										?>
												<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										if(isset($tabelpelamar->asal_sekolah)){
										if($tabelpelamar->asal_sekolah == 'Dalam Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Akreditasi Program Studi</strong>
										<?php
											if(isset($tabelpelamar->akreditasi_prodi)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else{}
										}else{}
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>IPK</strong>
										<?php
											if(isset($tabelpelamar->ipk)){
												if(!empty($tabelpelamar->ipk)){
										?>
													<p class="form-control-static"> <?= $tabelpelamar->ipk?> </p>
												<?php
													}else{
												?>
												<p class="form-control-static"> Tidak ada IPK </p>
												<?php
													}
												?>
										<?php
											}else{
										?>
										<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Tahun Lulus</strong>
										<?php
											if(isset($tabelpelamar->thn_lulus)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->thn_lulus?> </p>
										<?php
											}else{
										?>
												<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Judul Skripsi</strong>
										<?php
											if(isset($tabelpelamar->skripsi)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->skripsi?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="pendidikanProfesi">
                                <div class="row">
									<?php
										if(isset($tabelpelamar->pend_profesi)){
										if($tabelpelamar->pend_profesi == 'Ya'){
									?>
									<!-- <hr class="m-t-0 m-b-40"> -->
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->pendidikan1)){
												if($tabelpelamar->pendidikan1 == 'S1 Profesi'){
													$pendidikan1 = 'Sarjana Profesi';
												}else{
													$pendidikan1 = '';
												}
										?>
											<p class="form-control-static"> <?= $pendidikan1?> </p>
										<?php
											}else{
										?>
												<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Asal Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->asal_sekolah1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Nama Perguruan Tinggi</strong>
										<?php
											if(isset($tabelpelamar->nm_kampus1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->nm_kampus1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										if($tabelpelamar->asal_sekolah1 == 'Luar Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Nomor Penyetaraan</strong>
										<?php
											if(isset($tabelpelamar->nomor_penyetaraan1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else if($tabelpelamar->asal_sekolah1 == 'Dalam Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Akreditasi Perguruan Tinggi</strong>
										<?php
											if(!empty($tabelpelamar->akreditasi_kampus1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Program Studi</strong>
										<?php
											if(isset($tabelpelamar->prodi1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->prodi1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										if($tabelpelamar->asal_sekolah1 == 'Dalam Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Akreditasi Studi</strong>
										<?php
											if(isset($tabelpelamar->akreditasi_prodi1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else{}
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>IPK</strong>
										<?php
											if(isset($tabelpelamar->ipk1)){
												if(!empty($tabelpelamar->ipk1)){
										?>
													<p class="form-control-static"> <?= $tabelpelamar->ipk1?> </p>
												<?php
													}else{
												?>
												<p class="form-control-static"> Tidak ada IPK </p>
												<?php
													}
												?>
										<?php
											}else{
										?>
										<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Tahun Lulus</strong>
										<?php
											if(isset($tabelpelamar->thn_lulus1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->thn_lulus1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Judul Skripsi</strong>
										<?php
											if(isset($tabelpelamar->skripsi1)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->skripsi1?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else{}
										}else{}
									?>
								</div>
							</div>
							<div class="tab-pane" id="pendidikanMagister">
                                <div class="row">
									<!--<hr class="m-t-0 m-b-40">-->
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->pendidikan2)){
												if($tabelpelamar->pendidikan2 == 'S2'){
													$pendidikan2 = 'Magister';
												}else if($tabelpelamar->pendidikan2 == 'S2 Terapan'){
													$pendidikan2 = 'Magister Terapan';
												}else{
													$pendidikan2 = 'Dokter Spesialis';
												}
										?>
											<p class="form-control-static"> <?= $pendidikan2?> </p>
										<?php
											}else{
										?>
												<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Asal Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->asal_sekolah2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah2?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Nama Perguruan Tinggi</strong>
										<?php
											if(isset($tabelpelamar->nm_kampus2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->nm_kampus2?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
									if(isset($tabelpelamar->asal_sekolah2)){
										if($tabelpelamar->asal_sekolah2 == 'Luar Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Nomor Penyetaraan</strong>
										<?php
											if(isset($tabelpelamar->nomor_penyetaraan2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan2?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else if($tabelpelamar->asal_sekolah2 == 'Dalam Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Akreditasi Pergururan Tinggi</strong>
										<?php
											if(!empty($tabelpelamar->akreditasi_kampus2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus2?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}
									}else{}
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Program Studi</strong>
										<?php
											if(isset($tabelpelamar->prodi2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->prodi2?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
									if(isset($tabelpelamar->asal_sekolah2)){
										if($tabelpelamar->asal_sekolah2 == 'Dalam Negeri'){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Akreditasi Program Studi</strong>
										<?php
											if(isset($tabelpelamar->akreditasi_prodi2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi2?> </p>
										<?php
											}else{
										?>
												<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<?php
										}else{}
									}else{}
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>IPK</strong>
										<?php
											if(isset($tabelpelamar->ipk2)){
												if(!empty($tabelpelamar->ipk2)){
										?>
													<p class="form-control-static"> <?= $tabelpelamar->ipk2?> </p>
												<?php
													}else{
												?>
												<p class="form-control-static"> Tidak ada IPK </p>
												<?php
													}
												?>
										<?php
											}else{
										?>
										<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Tahun Lulus</strong>
										<?php
											if(isset($tabelpelamar->thn_lulus2)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->thn_lulus2?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Judul Tesis</strong>
										<?php
											if(isset($tabelpelamar->tesis)){
										?>
											<p class="form-control-static"> <?= $tabelpelamar->tesis?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
								</div>
							</div>
							<div class="tab-pane" id="pendidikanDoktor">
                                <div class="row">
									<?php
										if($datatingkatijazah == "6"){
									?>
									<div class="col-md-12 m-t-30 col-xs-6 b-r"><strong>Pendidikan</strong>
										<?php
											if(isset($tabelpelamar->pendidikan3)){
												if($tabelpelamar->pendidikan3 == 'S3'){
													$pendidikan3 = 'Doktor';
												}else if($tabelpelamar->pendidikan3 == 'S3 Terapan'){
													$pendidikan3 = 'Doktor Terapan';
												}else{
													$pendidikan3 = 'Dokter Sub Spesialis';
												}
										?>
											<p class="form-control-static"> <?= $pendidikan3?> </p>
										<?php
											}else{
										?>
											<p class="form-control-static"> Tidak ada isi </p>
										<?php
											}
										?>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Asal Pendidikan:</label>
												<?php
													if(isset($tabelpelamar->asal_sekolah3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Nama PT:</label>
												<?php
													if(isset($tabelpelamar->nm_kampus3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->nm_kampus3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
										if($tabelpelamar->asal_sekolah3 == 'Luar Negeri'){
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Nomor Penyetaraan:</label>
												<?php
													if(isset($tabelpelamar->nomor_penyetaraan3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
										}else if($tabelpelamar->asal_sekolah3 == 'Dalam Negeri'){
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Akreditasi PT:</label>
												<?php
													if(!empty($tabelpelamar->akreditasi_kampus3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
										}
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Program Studi:</label>
												<?php
													if(isset($tabelpelamar->prodi3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->prodi3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
										if($tabelpelamar->asal_sekolah3 == 'Dalam Negeri'){
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Akreditasi Prodi:</label>
												<?php
													if(isset($tabelpelamar->akreditasi_prodi3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
										}else{}
									?>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">IPK:</label>
												<?php
													if(isset($tabelpelamar->ipk3)){
														if(!empty($tabelpelamar->ipk3)){
												?>
															<p class="form-control-static"> <?= $tabelpelamar->ipk3?> </p>
														<?php
															}else{
														?>
														<p class="form-control-static"> Tidak ada IPK </p>
														<?php
															}
														?>
												<?php
													}else{
												?>
												<p class="form-control-static"> Tidak ada isi </p>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Tahun Lulus:</label>
												<?php
													if(isset($tabelpelamar->thn_lulus3)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->thn_lulus3?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<div class="form-group">
												<label class="col-md-3">Judul Desertasi:</label>
												<?php
													if(isset($tabelpelamar->desertasi)){
												?>
												<div class="col-md-12">
													<p class="form-control-static"> <?= $tabelpelamar->desertasi?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<?php
										}else{}
									?>
									<hr class="m-t-0 m-b-40">
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Jenis Toefl:</label>
												<?php
													if(isset($tabelpelamar->jenis_toefl)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->jenis_toefl?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Skor Toefl:</label>
												<?php
													if(isset($tabelpelamar->toefl)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->toefl?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<div class="form-group">
												<label class="control-label col-md-3">Tanggal Terbit Toefl:</label>
												<?php
													if(isset($tabelpelamar->tgl_sert_terbit)){
												?>
												<div class="col-md-6">
													<p class="form-control-static"> <?= $tabelpelamar->tgl_sert_terbit?> </p>
												</div>
												<?php
													}else{
												?>
													<div class="col-md-6">
														<p class="form-control-static"> Tidak ada isi </p>
													</div>
												<?php
													}
												?>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="tab-pane" id="lampiran">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Surat Lamaran</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($lamaran)){
													$lamaran_en = base64_encode($this->encryption->encrypt($lamaran->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$lamaran_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!--<a href="<?= site_url('')?><?= $lamaran->path_file?>" target="_blank" style="color:black;">Lihat</a>-->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">KTP</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($ktp)){
													$ktp_en = base64_encode($this->encryption->encrypt($ktp->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$ktp_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!--<a href="<?= site_url('')?><?= $ktp->path_file?>" target="_blank" style="color:black;">Lihat</a>-->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Foto</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($foto)){
													$foto_en = base64_encode($this->encryption->encrypt($foto->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$foto_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!--<a href="<?= site_url('')?><?= $foto->path_file?>" target="_blank" style="color:black;">Lihat</a>-->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Surat Keterangan Sehat</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($sks)){
													$sks_en = base64_encode($this->encryption->encrypt($sks->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$sks_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $sks->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Surat Keterangan Catatan Kepolisian</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($skck)){
													$skck_en = base64_encode($this->encryption->encrypt($skck->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$skck_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $skck->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Surat Pernyataan Tidak Pernah Menjadi Anggota dan Pengurus Organisasi Terlarang</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($suratpernyataanbebasparpol)){
													$suratpernyataanbebasparpol_en = base64_encode($this->encryption->encrypt($suratpernyataanbebasparpol->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$suratpernyataanbebasparpol_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $suratpernyataanbebasparpol->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Surat Pernyataan Bebas dari perjanjian/kontrak/ikatan instansi</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($suratpernyataanbebasdariinstansi)){
													$suratpernyataanbebasdariinstansi_en = base64_encode($this->encryption->encrypt($suratpernyataanbebasdariinstansi->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$suratpernyataanbebasdariinstansi_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $suratpernyataanbebasdariinstansi->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Ijazah Sarjana / Sarjana Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($ijazah)){
													$ijazah_en = base64_encode($this->encryption->encrypt($ijazah->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $ijazah->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Transkrip Sarjana / Sarjana Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($transkrip)){
													$transkrip_en = base64_encode($this->encryption->encrypt($transkrip->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $transkrip->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									if(!empty($tabelpelamar->nomor_penyetaraan)){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Penyetaraan Sarjana / Sarjana Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($penyetaraan)){
													$penyetaraan_en = base64_encode($this->encryption->encrypt($penyetaraan->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $penyetaraan->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									}else{}
								?>
								<?php
									if(!empty($tabelpelamar->akreditasi_kampus)){
										if($tabelpelamar->akreditasi_kampus != '0'){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi PT Sarjana / Sarjana Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasi)){
													$akreditasi_en = base64_encode($this->encryption->encrypt($akreditasi->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasi->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi Prodi Sarjana / Sarjana Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasiprodi)){
													$akreditasiprodi_en = base64_encode($this->encryption->encrypt($akreditasiprodi->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasiprodi->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
										}else{}
									}
								?>
								<?php
									if(!empty($tabelpelamar->pendidikan1)){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Ijazah Sarjana Profesi</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($ijazah1)){
													$ijazah1_en = base64_encode($this->encryption->encrypt($ijazah1->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah1_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $ijazah1->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Transkrip Sarjana Profesi</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($transkrip1)){
													$transkrip1_en = base64_encode($this->encryption->encrypt($transkrip1->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip1_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $transkrip1->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									if(!empty($tabelpelamar->nomor_penyetaraan1)){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Penyetaraan Sarjana Profesi</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($penyetaraan1)){
													$penyetaraan1_en = base64_encode($this->encryption->encrypt($penyetaraan1->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan1_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $penyetaraan1->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									}else{}
								?>
								<?php
									if(!empty($tabelpelamar->akreditasi_kampus1)){
										if($tabelpelamar->akreditasi_kampus1 != '0'){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi PT Sarjana Profesi</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasi1)){
													$akreditasi1_en = base64_encode($this->encryption->encrypt($akreditasi1->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi1_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasi1->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi Prodi Sarjana Profesi</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasiprodi1)){
													$akreditasiprodi1_en = base64_encode($this->encryption->encrypt($akreditasiprodi1->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi1_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasiprodi1->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
										}else{}
									}
								}
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Ijazah Magister / Magister Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($ijazah2)){
													$ijazah2_en = base64_encode($this->encryption->encrypt($ijazah2->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah2_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $ijazah2->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Transkrip Magister / Magister Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($transkrip2)){
													$transkrip2_en = base64_encode($this->encryption->encrypt($transkrip2->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip2_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $transkrip2->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									if(!empty($tabelpelamar->nomor_penyetaraan2)){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Penyetaraaan Magister / Magister Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($penyetaraan2)){
													$penyetaraan2_en = base64_encode($this->encryption->encrypt($penyetaraan2->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan2_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $penyetaraan2->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									}else{}
								?>
								<?php
									if(!empty($tabelpelamar->akreditasi_kampus2)){
										if($tabelpelamar->akreditasi_kampus2 != '0'){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi PT Magister / Magister Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasi2)){
													$akreditasi2_en = base64_encode($this->encryption->encrypt($akreditasi2->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi2_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasi2->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi Prodi Magister / Magister Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasiprodi2)){
													$akreditasiprodi2_en = base64_encode($this->encryption->encrypt($akreditasiprodi2->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi2_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasiprodi2->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									}else{}
								}
								?>
								<?php
									if($tabelpelamar->pendidikan_terakhir > 8){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Ijazah Doktor / Doktor Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($ijazah3)){
													$ijazah3_en = base64_encode($this->encryption->encrypt($ijazah3->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah3_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $ijazah3->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Transkrip Doktor / Doktor Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($transkrip3)){
													$transkrip3_en = base64_encode($this->encryption->encrypt($transkrip3->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip3_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $transkrip3->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									if(!empty($tabelpelamar->nomor_penyetaraan3)){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Penyetaraaan Doktor / Doktor Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($penyetaraan3)){
													$penyetaraan3_en = base64_encode($this->encryption->encrypt($penyetaraan3->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan3_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $penyetaraan3->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									}else{}
								?>
								<?php
									if(!empty($tabelpelamar->akreditasi_kampus3)){
										if($tabelpelamar->akreditasi_kampus3 != '0'){
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi PT Doktor / Doktor Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasi3)){
													$akreditasi3_en = base64_encode($this->encryption->encrypt($akreditasi3->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi3_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasi3->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                                <br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Akreditasi Prodi Doktor / Doktor Terapan</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($akreditasiprodi3)){
													$akreditasiprodi3_en = base64_encode($this->encryption->encrypt($akreditasiprodi3->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi3_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $akreditasiprodi3->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
								<?php
									}else{}
								}
								?>
								<?php
									}else{}
								?>
								<br class="g-pb-45">
								<div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
											<label class="col-md-3">Toefl</label>
											<label class="col-md-1">:</label>
											<?php
												if(isset($sertifikat)){
													$sertifikat_en = base64_encode($this->encryption->encrypt($sertifikat->path_file));
											?>
											<div class="col-md-6">
												<button type="button" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">
													<a href="<?= base_url('PelamarCntrl/preview_file/'.$sertifikat_en); ?>" target="_blank" style="color:black;">Lihat</a>
													<!-- <a href="<?= site_url('')?><?= $sertifikat->path_file?>" target="_blank" style="color:black;">Lihat</a> -->
												</button>
											</div>
											<?php
												}else{
											?>
												<div class="col-md-6">
													<button type="submit" disabled class="fcbtn btn btn-danger btn-1d waves-effect waves-light">Belum Upload</button>
												</div>
											<?php
												}
											?>
                                        </div>
                                    </div>
                                </div>
                            </div>
						</div>
                	</div>
				</div>
				<?php
					}
				?>
        </div>
		<?php $this->load->view('footer'); ?>
    </div>
</div>
			<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php $this->load->view('scripts') ?>
<!-- Datatable -->

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit-data').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: '<?= site_url('PelamarCntrl/submitData') ?>',
                data:formData,
                type:'POST',
                contentType: false,
                processData: false,
                success:function(data){
                    if (data['return'] == 1) {
                        notification._toast('Error','Gagal Menyimpan...','error');
                    }else{
                        $('#submitlamaranModal').modal('hide');
						setTimeout(function () {
							window.location.href = "resume";
						}, 200);
                        notification._toast('Success','Anda telah terdaftar','success');
                    }
                }
            });
        });
        $('.js-example-basic-multiple').select2();
    });
    
</script>
</body>
</html>
