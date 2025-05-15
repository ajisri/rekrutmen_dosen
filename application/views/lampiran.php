<!DOCTYPE html>
<html lang="en">

<?php $this->load->view('header'); ?>

<body class="fix-header">
<!-- ============================================================== -->
<!-- Preloader -->
<!-- ============================================================== -->
<!--<div class="preloader">
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
                    <h4 class="page-title"><?= $title ?></h4>
				</div>
                <div class="col-lg-9 col-sm-8 col-md-8 col-xs-12">
                    <h4 class="pull-right"><?= $time ?></h4>
                </div>
            </div>	
		</div>
        <div class="container">
            
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- Different data widgets -->
            <!-- ============================================================== -->
            <!-- /.row -->    
            <!--row -->
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- wallet, & manage users widgets -->
            <!-- ============================================================== -->
            <!-- .row -->
            <?php
				$dateskrg = '2022-07-06 13:21:00';
				$datedaftar = $tabelpelamar->tgl_daftar;
                if($date <= $datetutup){
            ?>
            <div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<div class="row">
							<div class="col-md-12">
								<h3 class="box-title">
									C. Lampiran (Ukuran maksimal per file upload 400kb)
								</h3>
							</div> 
						</div>
						
						<?php
							$datee = date("Y-m-d");
							if ($datee >= $datebuka and $datee <= $datetutup) {
						?>
						<?php
							if($tabelpelamar->status_simpanformasi == 'ok'){
						?>
						<div class="row">
							<div class="col-sm-12">
								<div class="white-box">
										<div id="lampiran">
											<form id="add-lampiransuratlamaran" action="<?= site_url('PelamarCntrl/addSuratLamaranPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
												<label>Upload Surat Lamaran (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="lamaran[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
														<?php
															if(isset($lamaran)){
																$lamaran_en = base64_encode($this->encryption->encrypt($lamaran->path_file));
														?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
															<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('PelamarCntrl/preview_file/'.$lamaran_en); ?>" target="_blank" style="color:black;">Lihat</a>
															</button>
														<?php
															}else{
														?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
															<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranktp" action="<?= site_url('PelamarCntrl/addKtpPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
												<label>Upload KTP (JPG,JPEG,PNG):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="ktp[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($ktp)){
																$ktp_en = base64_encode($this->encryption->encrypt($ktp->path_file));
															?>
																	<?php
																		if($statuspelamar == NULL){
																	?>
																		<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
																	<?php
																		}else{
																	?>
																		<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
																	<?php
																		}
																	?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('PelamarCntrl/preview_file/'.$ktp_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																	if($statuspelamar == NULL){
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
																<?php
																	}else{
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
																<?php
																	}
																?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranfoto" action="<?= site_url('PelamarCntrl/addFotoPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Foto (Ukuran 4x6 berlatar belakang merah, bertipe JPG):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="foto[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($foto)){
																$foto_en = base64_encode($this->encryption->encrypt($foto->path_file));
															?>
																	<?php
																		if($statuspelamar == NULL){
																	?>
																		<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
																	<?php
																		}else{
																	?>
																		<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
																	<?php
																		}
																	?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('PelamarCntrl/preview_file/'.$foto_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																	if($statuspelamar == NULL){
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
																<?php
																	}else{
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
																<?php
																	}
																?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiransks" action="<?= site_url('PelamarCntrl/addSksPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Surat Keterangan Sehat (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="sks[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($sks)){
																$sks_en = base64_encode($this->encryption->encrypt($sks->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('PelamarCntrl/preview_file/'.$sks_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranskck" action="<?= site_url('PelamarCntrl/addSkckPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Surat Keterangan Catatan Kepolisian (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="skck[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($skck)){
																$skck_en = base64_encode($this->encryption->encrypt($skck->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$skck_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiransuratpernyataanbebasparpol" action="<?= site_url('PelamarCntrl/addSuratpernyataanbebasparpolPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Surat Pernyataan Tidak Pernah Menjadi Anggota dan Pengurus Organisasi Terlarang (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="suratpernyataanbebasparpol[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($suratpernyataanbebasparpol)){
																$suratpernyataanbebasparpol_en = base64_encode($this->encryption->encrypt($suratpernyataanbebasparpol->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																	<a href="<?= base_url('PelamarCntrl/preview_file/'.$suratpernyataanbebasparpol_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiransuratpernyataanbebasdariinstansi" action="<?= site_url('PelamarCntrl/addSuratpernyataanbebasdariinstansiPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Surat Pernyataan Bebas dari perjanjian/kontrak/ikatan instansi (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="suratpernyataanbebasdariinstansi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($suratpernyataanbebasdariinstansi)){
																$suratpernyataanbebasdariinstansi_en = base64_encode($this->encryption->encrypt($suratpernyataanbebasdariinstansi->path_file));
															?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else if($statuspelamar == '3'){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																	<a href="<?= base_url('PelamarCntrl/preview_file/'.$suratpernyataanbebasdariinstansi_en); ?>" target="_blank" style="color:black;">Lihat</a>
																</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else if($statuspelamar == '3' or $statuspelamar == '2' or $statuspelamar == '1' and $datedaftar < $dateskrg){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranijazah" action="<?= site_url('PelamarCntrl/addIjazahPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Scan Asli Ijazah Sarjana / Sarjana Terapan(PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="ijazah[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($ijazah)){
																$ijazah_en = base64_encode($this->encryption->encrypt($ijazah->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampirantranskrip" action="<?= site_url('PelamarCntrl/addTranskripPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Scan Asli Transkrip Sarjana / Sarjana Terapan(PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="transkrip[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($transkrip)){
																$transkrip_en = base64_encode($this->encryption->encrypt($transkrip->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												if(!empty($tabelpelamar->nomor_penyetaraan)){
											?>
											<form id="add-lampiranpenyetaraan" action="<?= site_url('PelamarCntrl/addPenyeteraanPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="penyetaraan">
													<label>Upload Penyetaraan Sarjana / Sarjana Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="penyetaraan[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($penyetaraan)){
																$penyetaraan_en = base64_encode($this->encryption->encrypt($penyetaraan->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												}else{}
											?>
											<?php
												if(!empty($tabelpelamar->akreditasi_kampus)){
													if($tabelpelamar->akreditasi_kampus != '0'){
											?>
											<form id="add-lampiranakreditasi" action="<?= site_url('PelamarCntrl/addAkreditasiPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasipt">
												<label>Upload Akreditasi PT Sarjana / Sarjana Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasi)){
																$akreditasi_en = base64_encode($this->encryption->encrypt($akreditasi->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranakreditasiprodi" action="<?= site_url('PelamarCntrl/addAkreditasiprodiPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasips">
													<label>Upload Akreditasi Prodi Sarjana / Sarjana Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi_prodi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasiprodi)){
																$akreditasiprodi_en = base64_encode($this->encryption->encrypt($akreditasiprodi->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
															?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
													}else{}
												}
											?>
											<?php
												if(!empty($tabelpelamar->pendidikan1)){
											?>
											<form id="add-lampiranijazah1" action="<?= site_url('PelamarCntrl/addIjazah1Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="ijazah1">
												<label>Upload Scan Asli Ijazah Sarjana Profesi (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="ijazah1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($ijazah1)){
																$ijazah1_en = base64_encode($this->encryption->encrypt($ijazah1->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah1_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampirantranskrip1" action="<?= site_url('PelamarCntrl/addTranskrip1Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="transkrip1">
												<label>Upload Scan Asli Transkrip Sarjana Profesi (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="transkrip1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($transkrip1)){
																$transkrip1_en = base64_encode($this->encryption->encrypt($transkrip1->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip1_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												if(!empty($tabelpelamar->nomor_penyetaraan1)){
											?>
											<form id="add-lampiranpenyetaraan1" action="<?= site_url('PelamarCntrl/addPenyetaraan1Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="penyetaraan1">
												<label>Upload Penyetaraan Sarjana Profesi (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="penyetaraan1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($penyetaraan1)){
																$penyetaraan1_en = base64_encode($this->encryption->encrypt($penyetaraan1->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan1_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												}else{}
											?>
											<?php
												if(!empty($tabelpelamar->akreditasi_kampus1)){
													if($tabelpelamar->akreditasi_kampus1 != '0'){
											?>
											<form id="add-lampiranakreditasi1" action="<?= site_url('PelamarCntrl/addAkreditasi1Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasipt1">
													<label>Upload Akreditasi PT Sarjana Profesi (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasi1)){
																$akreditasi1_en = base64_encode($this->encryption->encrypt($akreditasi1->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi1_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranakreditasiprodi1" action="<?= site_url('PelamarCntrl/addAkreditasiprodi1Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasips1">
													<label>Upload Akreditasi Prodi Sarjana Profesi (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi_prodi1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasiprodi1)){
																$akreditasiprodi1_en = base64_encode($this->encryption->encrypt($akreditasiprodi1->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi1_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
												<?php
													}else{}
												}
												}
												?>
											<form id="add-lampiranijazah2" action="<?= site_url('PelamarCntrl/addIjazah2Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Scan Asli Ijazah Magister / Magister Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="ijazah2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($ijazah2)){
																$ijazah2_en = base64_encode($this->encryption->encrypt($ijazah2->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah2_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampirantranskrip2" action="<?= site_url('PelamarCntrl/addTranskrip2Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Scan Asli Transkrip Magister / Magister Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="transkrip2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($transkrip2)){
																$transkrip2_en = base64_encode($this->encryption->encrypt($transkrip2->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip2_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												if(!empty($tabelpelamar->nomor_penyetaraan2)){
											?>
											<form id="add-lampiranpenyetaraan2" action="<?= site_url('PelamarCntrl/addPenyetaraan2Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
											<div class="col-md-12 m-b-10" id="penyetaraan2">
												<label>Upload Penyetaraaan Magister / Magister Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-9">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="penyetaraan2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-3">
														<?php
															if(isset($penyetaraan2)){
																$penyetaraan2_en = base64_encode($this->encryption->encrypt($penyetaraan2->path_file));
														?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan2_en); ?>" target="_blank" style="color:black;">Lihat</a>
																</button>
														<?php
															}else{
														?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
															<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
														<?php
															}
														?>
													</div>
												</div>
											</div>
											</form>
											<?php
												}else{}
											?>
											<?php
												if(!empty($tabelpelamar->akreditasi_kampus2)){
													if($tabelpelamar->akreditasi_kampus2 != '0'){
											?>
											<form id="add-lampiranakreditasi2" action="<?= site_url('PelamarCntrl/addAkreditasi2Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasipt2">
													<label>Upload Akreditasi PT Magister / Magister Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasi2)){
																$akreditasi2_en = base64_encode($this->encryption->encrypt($akreditasi2->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi2_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranakreditasiprodi2" action="<?= site_url('PelamarCntrl/addAkreditasiprodi2Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasips2">
													<label>Upload Akreditasi Prodi Magister / Magister Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi_prodi2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasiprodi2)){
																$akreditasiprodi2_en = base64_encode($this->encryption->encrypt($akreditasiprodi2->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi2_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												}else{}
											}
											?>
											<?php
												if($tabelpelamar->pendidikan_terakhir > 8){
											?>
											<form id="add-lampiranijazah3" action="<?= site_url('PelamarCntrl/addIjazah3Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Scan Asli Ijazah Doktor / Doktor Terapan:</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="ijazah3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($ijazah3)){
																$ijazah3_en = base64_encode($this->encryption->encrypt($ijazah3->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$ijazah3_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampirantranskrip3" action="<?= site_url('PelamarCntrl/addTranskrip3Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Scan Asli Transkrip Doktor / Doktor Terapan:</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="transkrip3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($transkrip3)){
																$transkrip3_en = base64_encode($this->encryption->encrypt($transkrip3->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$transkrip3_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												if(!empty($tabelpelamar->nomor_penyetaraan3)){
											?>
											<form id="add-lampiranpenyetaraan3" action="<?= site_url('PelamarCntrl/addPenyetaraan3Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="penyetaraan3">
													<label>Upload Penyetaraaan Doktor / Doktor Terapan (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="penyetaraan3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($penyetaraan3)){
																$penyetaraan3_en = base64_encode($this->encryption->encrypt($penyetaraan3->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$penyetaraan3_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												}else{}
											?>
											<?php
												if(!empty($tabelpelamar->akreditasi_kampus3)){
													if($tabelpelamar->akreditasi_kampus3 != '0'){
											?>
											<form id="add-lampiranakreditasi3" action="<?= site_url('PelamarCntrl/addAkreditasi3Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasipt3">
													<label>Upload Akreditasi PT Doktor (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasi3)){
																$akreditasi3_en = base64_encode($this->encryption->encrypt($akreditasi3->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasi3_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<form id="add-lampiranakreditasiprodi3" action="<?= site_url('PelamarCntrl/addAkreditasiprodi3Pelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10" id="akreditasips3">
													<label>Upload Akreditasi Prodi Doktor (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="akreditasi_prodi3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($akreditasiprodi3)){
																$akreditasiprodi3_en = base64_encode($this->encryption->encrypt($akreditasiprodi3->path_file));
															?>
																	<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
															<?php
																}else{
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
															<?php
																}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$akreditasiprodi3_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
															<?php
																if($statuspelamar == NULL){
															?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
															<?php
																}else{
															?>
															<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
															<?php
																}
															?>
																<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
											<?php
												}else{}
											}
											?>
											<?php
												}else{}
											?>
											<form id="add-lampiransertifikat" action="<?= site_url('PelamarCntrl/addSertifikatPelamar') ?>" method="POST" enctype="multipart/form-data" class="form-horizontal">
												<div class="col-md-12 m-b-10">
													<label>Upload Toefl (PDF):</label>
													<div class="form-group">
														<div class="col-md-9">
															<div class="fileinput fileinput-new input-group" data-provides="fileinput">
																<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
																<input type="file" name="sertifikat[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
															</div>
														</div>
														<div class="col-md-3">
															<?php
																if(isset($sertifikat)){
																$sertifikat_en = base64_encode($this->encryption->encrypt($sertifikat->path_file));
															?>
																<?php
																	if($statuspelamar == NULL){
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Edit</button>
																<?php
																	}else{
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Edit</button>
																<?php
																	}
																?>
																	<button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
																		<a href="<?= base_url('PelamarCntrl/preview_file/'.$sertifikat_en); ?>" target="_blank" style="color:black;">Lihat</a>
																	</button>
															<?php
																}else{
															?>
																<?php
																	if($statuspelamar == NULL){
																?>
																	<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
																<?php
																	}else{
																?>
																<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Upload</button>
																<?php
																	}
																?>
																	<button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
															<?php
																}
															?>
														</div>
													</div>
												</div>
											</form>
									</div>
								</div>
							</div>
						</div>
						<?php
							}else{
						?>
						<div class="row">
							<div class="col-sm-12">
								<div class="white-box">
									<div class="row">
										<div class="col-md-5">
										</div> 
									</div>
									<hr>
									<?= "Lengkapi data Formasi dan Pendidikan terlebih dahulu."?>
								</div>
							</div>
						</div>
						<?php
							}
						?>
						<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
						<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>-->
						<script type="text/javascript">
							$(document).ready(function() {
								$('#add-lampiransuratlamaran').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addSuratLamaranPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
						                    }else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
											}else{
												notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranktp').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addKtpPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
						                    }else if (data['return'] == 3) {
						                        notification._toast('Error','File harus bertipe jpg/jpeg/png','error');
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else{
												notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranfoto').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addFotoPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
						                    }else if (data['return'] == 3) {
						                        notification._toast('Error','File harus bertipe jpg/jpeg/png','error');
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else{
												notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiransks').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addSksPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
												notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranskck').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addSkckPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiransuratpernyataanbebasparpol').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addSuratpernyataanbebasparpolPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiransuratpernyataanbebasdariinstansi').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addSuratpernyataanbebasdariinstansiPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranijazah').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addIjazahPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampirantranskrip').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addTranskripPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranpenyetaraan').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addPenyetaraanPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasi').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasiPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasiprodi').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasiprodiPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranijazah1').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addIjazah1Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampirantranskrip1').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addTranskrip1Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranpenyetaraan1').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addPenyetaraan1Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasi1').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasi1Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasiprodi1').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasiprodi1Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranijazah2').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addIjazah2Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampirantranskrip2').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addTranskrip2Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranpenyetaraan2').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addPenyetaraan2Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasi2').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasi2Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasiprodi2').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasiprodi2Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranijazah3').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addIjazah3Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampirantranskrip3').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addTranskrip3Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranpenyetaraan3').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addPenyetaraan3Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasi3').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasi3Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiranakreditasiprodi3').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addAkreditasiprodi3Pelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
							$(document).ready(function() {
								$('#add-lampiransertifikat').submit(function(e){
						            e.preventDefault();
						            var formData = new FormData($(this)[0]);
						            $.ajax({
						                url: '<?= site_url('PelamarCntrl/addSertifikatPelamar') ?>',
						                data:formData,
						                type:'POST',
						                contentType: false,
						                processData: false,
						                success:function(data){
						                    if (data['return'] == 2) {
						                        notification._toast('Success','Input Data','success');
						                        setTimeout(function () {
													location.reload();
												}, 500);
											}else if (data['return'] == 4) {
						                        notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
											}else if (data['return'] == 5) {
						                        notification._toast('Error','File harus bertipe pdf','error');
						                    }else{
						                        notification._toast('Error','Gagal Menyimpan','error');
						                    }
						                }
						            });
						        });	
							});
							
						</script>
						<script type="text/javascript">
							$(document).ready(function() {
								$('.select2').select2();
							});
						</script>
						<?php
							}else{
								$newDate = date("d-m-Y H:i:s");
						?>
							Pendaftaran telah ditutup
						<?php
							}
						?>
					</div>
				</div>
			</div>
            <?php } else{ ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-5">
                                    <h3 class="box-title">Pendaftaran</h3>
                                </div> 
                            </div>
                            <hr>
                            <?= "Pendaftaran sudah tutup."?>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
        <!-- /.container-fluid -->
        <?php $this->load->view('footer'); ?>
    </div>
    <!-- ============================================================== -->
    <!-- End Page Content -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- End Wrapper -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- All Jquery -->
<!-- ============================================================== -->
<?php
	if($statuspelamar == NULL){
?>
<?php
	if($tabelpelamar->nama_pelamar == null){
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa pastikan file tersimpan.</div>
<?php
	}else{
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b><?= $tabelpelamar->nama_pelamar?>,</b> Jangan lupa pastikan file tersimpan.</div>
<?php
	}
?>
<?php
	}else{
?>
<div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Anda sudah submit pendaftaran!</h4> 
<!--<b><?= $tabelpelamar->nama_pelamar?>,</b> Anda sudah tidak bisa upload lampiran.-->
</div>
<?php
	}
?>
<script>
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php $this->load->view('scripts') ?>

</body>
</html>
