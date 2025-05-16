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
                                <h3 class="box-title" style="margin-top: 10px;margin-bottom: -10px"> Resume</h3><br><br>
                            </div>
							<?php
								$datee = date("Y-m-d");
								if($datee >= $datebuka and $datee >= $datetutup and $datee >= $datepengumuman and $statuspelamar == 1){
							?>
							<a href="<?= base_url('PelamarCntrl/cetakkartuujian?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-success btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Kartu Ujian</button></a>
							<?php
								}else{}
							?>
                        </div>
						<div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-info">
                            <div class="panel-wrapper collapse in" aria-expanded="true">
                                <div class="panel-body">
                                    <form class="form-horizontal" role="form">
                                        <div class="form-body">
                                            <h3 class="box-title">A. Identitas</h3>
											<button type="button" class="btn btn-info"><a href="<?= site_url('identitas') ?>"><span style="color: white">Edit</a></button>
											<hr class="m-t-0 m-b-40">
                                            <div class="row">
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Nama Lengkap:</label>
														<div class="">
														<?php
															if(isset($tabel->nama_pelamar)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $tabel->gelar_depan?> &nbsp;<?= $tabel->nama_pelamar?>,&nbsp;<?= $tabel->gelar_belakang?> </p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Tempat Lahir:</label>
														<div class="">
														<?php
															if(isset($tabel->tempat_lahir)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $tabel->tempat_lahir?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Tanggal Lahir:</label>
														<div class="">
														<?php
															if(isset($tabel->tanggal_lahir)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $tabel->tanggal_lahir?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Jenis Kelamin:</label>
														<div class="">
														<?php
															if(isset($tabel->jenis_kelamin)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $tabel->jenis_kelamin?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Agama:</label>
														<div class="">
														<?php
															if(isset($readagama->agama)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $readagama->agama?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Nomor Handphone:</label>
														<div class="">
														<?php
															if(isset($tabel->no_telepon)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $tabel->no_telepon?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label col-md-3">Status:</label>
														<div class="">
														<?php
															if(isset($status_kawin)){
														?>
															<div class="col-md-9">
																<p class="form-control-static"><?= $status_kawin?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
														</div>
													</div>
												</div>
                                                <!--/span-->
                                            </div>
											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label class="col-md-3">Alamat:</label>
														<?php
															if(isset($tabel->alamat)){
														?>
															<div class="col-md-12">
																<p class="form-control-static"><?= $tabel->alamat?></p>
															</div>
														<?php
															}else{
														?>
															<div class="col-md-9">
																<p class="form-control-static"> Tidak ada isi </p>
															</div>
														<?php
															}
														?>
													</div>
												</div>
											</div>
                                            <!--/row-->
											<br class="m-t-0 m-b-40">
                                            <h3 class="box-title">B. Formasi dan Pendidikan</h3>
											<button type="button" class="btn btn-info"><a href="<?= site_url('formasi') ?>"><span style="color: white">Edit</a></button>
                                            <hr class="m-t-0 m-b-40">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label class="control-label col-md-3">Formasi:</label>
                                                        <?php
															if(isset($tabelpelamar->id_kualifikasi)){
														?>
														<div class="col-md-9">
                                                            <p class="form-control-static"> <?= $formasipelamar->nm_kualifikasi ?> &nbsp;(<?= $formasipelamar->kode_kualifikasi ?>) &nbsp;(<?= $formasipelamar->penempatan ?>) </p>
                                                        </div>
														<?php
															}else{
														?>
															<div class="col-md-9">
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
                                                        <label class="control-label col-md-3">Pendidikan Terakhir:</label>
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
														?>
														<div class="col-md-9">
                                                            <p class="form-control-static"> <?= $pendidikan_terakhir?> </p>
                                                        </div>
														<?php
															}else{
														?>
															<div class="col-md-9">
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
														<label class="control-label col-md-3">Pendidikan:</label>
														<?php
															if(isset($tabelpelamar->pendidikan)){
																if($tabelpelamar->pendidikan == 'S1'){
																	$pendidikan = 'Sarjana';
																}else if($tabelpelamar->pendidikan == 'D4'){
																	$pendidikan = 'Sarjana Terapan';
																}
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $pendidikan?> </p>
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
														<label class="control-label col-md-3">Asal Pendidikan:</label>
														<?php
															if(isset($tabelpelamar->asal_sekolah)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah?> </p>
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
															if(isset($tabelpelamar->nm_kampus)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->nm_kampus?> </p>
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
												if($tabelpelamar->asal_sekolah == 'Luar Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Nomor Penyetaraan:</label>
														<?php
															if(isset($tabelpelamar->nomor_penyetaraan)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan?> </p>
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
												}else if($tabelpelamar->asal_sekolah == 'Dalam Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Akreditasi PT:</label>
														<?php
															if(!empty($tabelpelamar->akreditasi_kampus)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus?> </p>
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
															if(isset($tabelpelamar->prodi)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->prodi?> </p>
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
												if($tabelpelamar->asal_sekolah == 'Dalam Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Akreditasi Prodi:</label>
														<?php
															if(isset($tabelpelamar->akreditasi_prodi)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi?> </p>
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
															if(isset($tabelpelamar->ipk)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->ipk?> </p>
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
														<label class="control-label col-md-3">Tahun Lulus:</label>
														<?php
															if(isset($tabelpelamar->thn_lulus)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->thn_lulus?> </p>
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
														<label class="col-md-3">Judul Skripsi:</label>
														<?php
															if(isset($tabelpelamar->skripsi)){
														?>
														<div class="col-md-12">
															<p class="form-control-static"> <?= $tabelpelamar->skripsi?> </p>
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
												if($tabelpelamar->pend_profesi == 'Ya'){
											?>
											<hr class="m-t-0 m-b-40">
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Pendidikan:</label>
														<?php
															if(isset($tabelpelamar->pendidikan1)){
																if($tabelpelamar->pendidikan1 == 'S1 Profesi'){
																	$pendidikan1 = 'Sarjana Profesi';
																}else{
																	$pendidikan1 = '';
																}
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $pendidikan1?> </p>
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
														<label class="control-label col-md-3">Asal Pendidikan:</label>
														<?php
															if(isset($tabelpelamar->asal_sekolah1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah1?> </p>
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
															if(isset($tabelpelamar->nm_kampus1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->nm_kampus1?> </p>
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
												if($tabelpelamar->asal_sekolah1 == 'Luar Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Nomor Penyetaraan:</label>
														<?php
															if(isset($tabelpelamar->nomor_penyetaraan1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan1?> </p>
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
												}else if($tabelpelamar->asal_sekolah1 == 'Dalam Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Akreditasi PT:</label>
														<?php
															if(!empty($tabelpelamar->akreditasi_kampus1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus1?> </p>
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
															if(isset($tabelpelamar->prodi1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->prodi1?> </p>
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
												if($tabelpelamar->asal_sekolah1 == 'Dalam Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Akreditasi Prodi:</label>
														<?php
															if(isset($tabelpelamar->akreditasi_prodi1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi1?> </p>
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
															if(isset($tabelpelamar->ipk1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->ipk1?> </p>
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
														<label class="control-label col-md-3">Tahun Lulus:</label>
														<?php
															if(isset($tabelpelamar->thn_lulus1)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->thn_lulus1?> </p>
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
														<label class="col-md-3">Judul Skripsi:</label>
														<?php
															if(isset($tabelpelamar->skripsi1)){
														?>
														<div class="col-md-12">
															<p class="form-control-static"> <?= $tabelpelamar->skripsi1?> </p>
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
														<label class="control-label col-md-3">Pendidikan:</label>
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
														<div class="col-md-6">
															<p class="form-control-static"> <?= $pendidikan2?> </p>
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
														<label class="control-label col-md-3">Asal Pendidikan:</label>
														<?php
															if(isset($tabelpelamar->asal_sekolah2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->asal_sekolah2?> </p>
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
															if(isset($tabelpelamar->nm_kampus2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->nm_kampus2?> </p>
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
												if($tabelpelamar->asal_sekolah2 == 'Luar Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Nomor Penyetaraan:</label>
														<?php
															if(isset($tabelpelamar->nomor_penyetaraan2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->nomor_penyetaraan2?> </p>
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
												}else if($tabelpelamar->asal_sekolah2 == 'Dalam Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Akreditasi PT:</label>
														<?php
															if(!empty($tabelpelamar->akreditasi_kampus2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->akreditasi_kampus2?> </p>
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
															if(isset($tabelpelamar->prodi2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->prodi2?> </p>
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
												if($tabelpelamar->asal_sekolah2 == 'Dalam Negeri'){
											?>
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Akreditasi Prodi:</label>
														<?php
															if(isset($tabelpelamar->akreditasi_prodi2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->akreditasi_prodi2?> </p>
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
															if(isset($tabelpelamar->ipk2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->ipk2?> </p>
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
														<label class="control-label col-md-3">Tahun Lulus:</label>
														<?php
															if(isset($tabelpelamar->thn_lulus2)){
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->thn_lulus2?> </p>
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
														<label class="col-md-3">Judul Tesis:</label>
														<?php
															if(isset($tabelpelamar->tesis)){
														?>
														<div class="col-md-12">
															<p class="form-control-static"> <?= $tabelpelamar->tesis?> </p>
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
												if($datatingkatijazah == "6"){
											?>
											<hr class="m-t-0 m-b-40">
											<div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
														<label class="control-label col-md-3">Pendidikan:</label>
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
														<div class="col-md-6">
															<p class="form-control-static"> <?= $pendidikan3?> </p>
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
														?>
														<div class="col-md-6">
															<p class="form-control-static"> <?= $tabelpelamar->ipk3?> </p>
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
											<br class="m-t-0 m-b-40">
                                            <h3 class="box-title">C. Lampiran</h3>
											 <button type="button" class="btn btn-info"><a href="<?= site_url('lampiran') ?>"><span style="color: white">Edit</a></button>
                                            <hr class="m-t-0 m-b-40">
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
                                    </form>
									<hr>
									<div class="form-actions">
										<div class="row">
											<div class="col-md-12">
												<div class="row">
													<div class="col-md-offset-3 col-md-9">
														<?php
														$datee = date("Y-m-d");
														if($datee >= $datebuka and $datee <= $datetutup){
														?>
															<?php
																if($statuspelamar == NULL){
															?>
																<!--if 7 file syarat formalitas ada dan deteksi asalsekolah s1;pofesi;s2;s3 maka sesuaikan kondisi required file upload -->
																<?php
																	if(empty($lamaran->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitlamarankosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($ktp->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitktpkosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($foto->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitfotokosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($sks->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitskskosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($skck->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitskckkosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($suratpernyataanbebasparpol->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitsuratpernyataanbebasparpolkosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($suratpernyataanbebasdariinstansi->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitsuratpernyataanbebasdariinstansikosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($ijazah->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitijazahkosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($transkrip->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submittranskripkosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																
																	
																<!--pendidikan profesi-->
																
																<!-- -->
																
																<?php
																	}else if(empty($ijazah2->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitijazah2kosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else if(empty($transkrip2->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submittranskrip2kosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																
																	
																	<!-- Doktor -->
																	
																	<!-- -->
																	
																<?php
																	}else if(empty($sertifikat->path_file)){
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submittoeflkosongModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}else{
																?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitlamaranModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Submit Pendaftaran">Submit Pendaftaran</button></a>
																<?php
																	}
																?>
															<?php
																}else if($statuspelamar == 3){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Proses Verifikasi">Proses Verifikasi</button></a>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 2){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Proses Verifikasi">Proses Verifikasi</button></a>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 1){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Proses Verifikasi">Proses Verifikasi</button></a>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}
															?>
														<?php
														}else if($datee >= $datebuka and $datee >= $datetutup and $datee <= $datepengumuman){
														?>
															<?php
																if($statuspelamar == NULL){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Anda tidak submit pendaftaran">Anda tidak submit pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 3){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Proses Verifikasi">Proses Verifikasi</button></a>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 2){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Proses Verifikasi">Proses Verifikasi</button></a>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 1){
															?>
																<a href="#" class="pull-right"><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Proses Verifikasi">Proses Verifikasi</button></a>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}
															?>
														<?php
														}else if($datee >= $datebuka and $datee >= $datetutup and $datee >= $datepengumuman){
														?>	
															<?php
																if($statuspelamar == NULL){
															?>
																<a href="#" class="pull-right" data-toggle="modal" data-target="#submitlamaranModal" ><button type="button" class="btn btn-success dotip" data-toggle="tooltip" title="Anda tidak submit pendaftaran">Anda tidak submit pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 3){
															?>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 2){
															?>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}else if($statuspelamar == 1){
															?>
																<a href="<?= base_url('PelamarCntrl/cetak?id=').$tabelpelamar->id_pelamar ?>" target='_blank' class="pull-right"><button type="button" class="btn btn-warning btn-outline btn-md m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir Setelah Data Lengkap">Cetak Formulir Pendaftaran</button></a>
															<?php
																}
															?>
														<?php
														}
														?>
													</div>
												</div>
											</div>
											<div class="col-md-6"> </div>
										</div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--./row-->
            <!-- /.row -->
            <!--  -->
            <!--row -->
            <?php $this->load->view('modal-file'); ?>
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- wallet, & manage users widgets -->
            <!-- ============================================================== -->
            <!-- .row -->
            <div class="row">
                <!-- col-md-9 -->
                <!-- /col-md-3 -->
            </div>
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- Profile, & inbox widgets -->
            <!-- ============================================================== -->
            <!-- .row -->
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- calendar & todo list widgets -->
            <!-- ============================================================== -->

            <!-- ============================================================== -->
            <!-- Blog-component -->
            <!-- ============================================================== -->

        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<?php $this->load->view('footer'); ?>
                    </div>
                </div>
                </div>
			<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<?php
	if($tabel->nama_pelamar != null){
?>
<?php
	if($tabel->status_simpanidentitas == "ok" and $tabel->status_simpanformasi == "ok" and $tabel->status != NULL){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Data Anda sudah tersimpan!</h4> <b><?= $tabelpelamar->nama_pelamar?>,</b> Anda sudah submit pendaftaran.</div>
<?php
	}else if($tabel->status_simpanidentitas == "ok" and $tabel->status_simpanformasi == "ok" and $tabel->status == NULL){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Jika data dan berkas sudah lengkap, jangan lupa klik submit pendaftaran ya!</h4> Supaya data dan berkas yang diisikan bisa <b>diverifikasi</b>.</div>
<?php
	}else if($tabel->status_simpanidentitas == "" and $tabel->status_simpanformasi == "ok"){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa lengkapi data identitas.</div>
<?php
	}else if($tabel->status_simpanformasi == "" and $tabel->status_simpanidentitas == "ok"){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b><?= $tabelpelamar->nama_pelamar?>,</b> Jangan lupa lengkapi data formasi dan pendidikan.</div>
<?php
	}else if($tabel->status_simpanformasi == "" and $tabel->status_simpanidentitas == "" and $tabel->status == NULL){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa lengkapi data identitas dan formasi dan pendidikan.</div>
<?php
	}
?>
<?php
	}else{
?>
<?php
	if($tabel->status_simpanidentitas == "ok" and $tabel->status_simpanformasi == "ok" and $tabel->status == NULL){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Jika data dan berkas sudah lengkap, jangan lupa klik submit pendaftaran ya!</h4> Supaya data dan berkas yang diisikan bisa <b>diverifikasi</b>.</div>
<?php
	}else if($tabel->status_simpanidentitas == "" and $tabel->status_simpanformasi == "ok"){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa lengkapi data identitas.</div>
<?php
	}else if($tabel->status_simpanformasi == "" and $tabel->status_simpanidentitas == "ok"){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa lengkapi data formasi dan pendidikan.</div>
<?php
	}else if($tabel->status_simpanformasi == "" and $tabel->status_simpanidentitas == "" and $tabel->status == NULL){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa lengkapi data identitas dan formasi dan pendidikan.</div>
<?php
	}
?>
<?php
	}
?>
<script type="text/javascript">
$(".myadmin-alert .closed").click(function(event) {
	$(this).parents(".myadmin-alert").fadeToggle(350);
	return false;
});
/* Click to close */
$(".myadmin-alert-click").click(function(event) {
	$(this).fadeToggle(350);
	return false;
});
$("#alerttopright").fadeToggle(3550);
</script>
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
