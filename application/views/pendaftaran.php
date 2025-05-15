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
                if($date <= $datetutup){
            ?>
            <div class="row">
				<div class="col-sm-12">
					<div class="white-box">
						<div class="row">
							<div class="col-md-12">
								<h3 class="box-title">Pendaftaran</h3>
							</div> 
						</div>
						<hr>
						
						<?php
							$datee = date("Y-m-d");
							if ($datee >= $datebuka and $datee <= $datetutup) {
						?>
						<div class="row">
							<div class="col-sm-12">
								<div class="white-box">
									<h3 class="m-b-30 font-13">Lengkapi Data Anda dengan Benar</h3>
									<ul class="nav customtab2 nav-tabs" role="tablist">
										<li role="presentation" class="">
											<a href="#identitas" aria-controls="Identitas" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span><span class="hidden-xs"> A. Identitas</span></a>
										</li>
										<li role="presentation" class="">
											<a href="#formasidanpendidikan" aria-controls="Formasi dan Pendidikan" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-user"></i></span><span class="hidden-xs"> B. Formasi dan Pendidikan</span></a>
										</li>
										<li role="presentation" class="">
											<a href="#riwayat_pekerjaan" aria-controls="Lampiran" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-file"></i></span><span class="hidden-xs"> C. Pengalaman Kerja</span></a>
										</li>
										<li role="presentation" class="">
											<a href="#lampiran" aria-controls="Lampiran" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-file"></i></span><span class="hidden-xs"> D. Lampiran (Maksimal masing-masing file 300 kb)</span></a>
										</li>
										<li role="presentation" class="">
											<a href="#persetujuan" aria-controls="Persetujuan" role="tab" data-toggle="tab" aria-expanded="false"><span class="visible-xs"><i class="ti-check"></i></span><span class="hidden-xs"> E. Resume</span></a>
										</li>
									</ul>
									<form id="add-identitas" class="form-horizontal">
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane fade" id="identitas">
												<div class="form-group">
													<div class="col-md-3">
														<label class="control-label">Gelar Depan :</label>
														<div class="">
															<input type="text" class="form-control" name="glrdpn" />
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Nama Lengkap :</label>
														<div class="">
															<input type="text" class="form-control" name="nama" />
														</div>
													</div>
													<div class="col-md-3">
														<label class="control-label">Gelar Belakang :</label>
														<div class="">
															<input type="text" class="form-control" name="glrblkg" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label">Tempat Lahir :</label>
														<div class="">
															<input type="text" class="form-control" name="tmpt_lahir" />
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Tanggal Lahir :</label>
														<div class="">
															<input type="date" class="form-control" name="tgl_lahir" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label class="control-label">Jenis Kelamin :</label>
														<div class="">
															<select type="text" class="form-control select2" name="jenis_kelamin" required>
																<option value="Laki-laki" selected="">Laki-laki</option>
																<option value="Perempuan">Perempuan</option>
															</select>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label class="control-label">Agama :</label>
														<div class="">
															<select type="text" class="form-control select2" name="agama" id="panel-heading" required>
																<option selected value="Islam">Islam</option>
																<option value="Kristen">Kristen</option>
																<option value="Katolik">Katholik</option>
																<option value="Hindu">Hindu</option>
																<option value="Buddha">Budha</option>
																<option value="Konghucu">Khonghucu</option>
															</select> 
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label class="control-label">Nomor Handphone :</label>
														<div class="">
															<input type="text" class="form-control" name="no_telepon" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label class="control-label">Status Kawin :</label>
														<div class="">
															<select type="text" class="form-control select2" name="status_menikah" id="panel-heading" required>
																<option selected value="1">Belum Kawin</option>
																<option value="2">Kawin</option>
																<option value="3">Cerai Hidup</option>
																<option value="4">Cerai Mati</option>
															</select> 
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<label class="control-label">Alamat :</label>
														<div class="">
															<textarea class="form-control" name="alamat" /></textarea>
														</div>
													</div>
												</div>
												<div class="col-md-2 pull-right">
													<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Simpan</button>
												</div>
											</form>
										</div>
										<!-- https://www.mynotescode.com/chained-dropdown-dengan-codeigniter -->
										<div role="tabpanel" class="tab-pane fade" id="formasidanpendidikan">
											<div class="form-group">
												<div class="col-md-12">
													<label class="control-label">Pilih Formasi:</label>
													<select id="namaFormasi" type="text" class="form-control select2" name="kualifikasi" onChange="namaFormasiHandler()">
														<option value="">Pilih Formasi</option>
														<?php foreach($tabel->result() as $row){?>
															<option  value="<?= $row->id_kualifikasi ?>"> <?= $row->nm_kualifikasi ?> &nbsp;(<?= $row->kode_kualifikasi ?>) &nbsp;(<?= $row->penempatan ?>)</option>
														<?php } ?>
													</select>
												</div>
											</div>
											<div class="form-group">
												<div class="col-md-12">
													<label class="control-label">Pendidikan Terakhir:</label><br />
													<select id="pendidikanterakhir" onChange="pendidikanTerakhirHandler()" type="text" class="form-control select2" name="asal_sekolah3" required>
														<option value="0">Pilih Pendidikan Terakhir</option>
														<?php foreach($tabelijazah->result() as $row){?>
															<option  value="<?= $row->id ?>"> <?= $row->ijazah ?></option>
														<?php } ?>
													</select>
													<script>
														function pendidikanTerakhirHandler() {
															if (document.getElementById("pendidikanterakhir").value == "9") {
																document.getElementById("pendidikan3").required = true;
																document.getElementById("asalpendidikan3").required = true;
																document.getElementById("nm_pt3").required = true;
																document.getElementById("akreditasi-kampusss").required = true;
																document.getElementById("jurusan3").required = true;
																document.getElementById("akreditasi-prodiii").required = true;
																document.getElementById("ipk3").required = true;
																document.getElementById("thn_lulus3").required = true;
																document.getElementById("disertasi3").required = true;
																$("#pendidikan3").show();
																$("#asalpendidikan3").show();
																$("#nm_pt3").show();
																$("#akreditasi-kampusss").show();
																$("#jurusan3").show();
																$("#akreditasi-prodiii").show();
																$("#ipk3").show();
																$("#thn_lulus3").show();
																$("#disertasi3").show();
															}else if(document.getElementById("pendidikanterakhir").value == "10"){
																document.getElementById("pendidikan3").required = true;
																document.getElementById("pendidikan3").required = true;
																document.getElementById("asalpendidikan3").required = true;
																document.getElementById("nm_pt3").required = true;
																document.getElementById("akreditasi-kampusss").required = true;
																document.getElementById("jurusan3").required = true;
																document.getElementById("akreditasi-prodiii").required = true;
																document.getElementById("ipk3").required = true;
																document.getElementById("thn_lulus3").required = true;
																document.getElementById("disertasi3").required = true;
																$("#pendidikan3").show();
																$("#asalpendidikan3").show();
																$("#nm_pt3").show();
																$("#akreditasi-kampusss").show();
																$("#jurusan3").show();
																$("#akreditasi-prodiii").show();
																$("#ipk3").show();
																$("#thn_lulus3").show();
																$("#disertasi3").show();
															}else if(document.getElementById("pendidikanterakhir").value == "11"){
																document.getElementById("pendidikan3").required = true;
																document.getElementById("pendidikan3").required = true;
																document.getElementById("asalpendidikan3").required = true;
																document.getElementById("nm_pt3").required = true;
																document.getElementById("akreditasi-kampusss").required = true;
																document.getElementById("jurusan3").required = true;
																document.getElementById("akreditasi-prodiii").required = true;
																document.getElementById("ipk3").required = true;
																document.getElementById("thn_lulus3").required = true;
																document.getElementById("disertasi3").required = true;
																$("#pendidikan3").show();
																$("#asalpendidikan3").show();
																$("#nm_pt3").show();
																$("#akreditasi-kampusss").show();
																$("#jurusan3").show();
																$("#akreditasi-prodiii").show();
																$("#ipk3").show();
																$("#thn_lulus3").show();
																$("#disertasi3").show();
															}else {
																document.getElementById("pendidikan3").required = false;
																document.getElementById("pendidikan3").required = false;
																document.getElementById("asalpendidikan3").required = false;
																document.getElementById("nm_pt3").required = false;
																document.getElementById("akreditasi-kampusss").required = false;
																document.getElementById("jurusan3").required = false;
																document.getElementById("akreditasi-prodiii").required = false;
																document.getElementById("ipk3").required = false;
																document.getElementById("thn_lulus3").required = false;
																document.getElementById("disertasi3").required = false;
																$("#pendidikan3").hide();
																$("#asalpendidikan3").hide();
																$("#nm_pt3").hide();
																$("#akreditasi-kampusss").hide();
																$("#jurusan3").hide();
																$("#akreditasi-prodiii").hide();
																$("#ipk3").hide();
																$("#thn_lulus3").hide();
																$("#disertasi3").hide();
															}
														}
													</script>
												</div>
												<script>
													function namaFormasiHandler() {
														if ( document.getElementById("namaFormasi").value != "16") {
															document.getElementById("pendidikan_profesi").required = false;
															document.getElementById("asalpendidikan_profesi").required = false;
															document.getElementById("namapt_profesi").required = false;
															document.getElementById("ps_profesi").required = false;
															document.getElementById("ipk_profesi").required = false;
															document.getElementById("thnlulus_profesi").required = false;
															document.getElementById("skripsi1_profesi").required = false;
															document.getElementById("select-akreditasi-prodi1").required = false;
															document.getElementById("select-akreditasi-kampus1").required = false;
															// document.getElementById("ijazah1").required = false;
															$("#pendidikan_profesi").hide();
															$("#asalpendidikan_profesi").hide();
															$("#nm_kampus3").hide();
															$("#jurusan3").hide();
															$("#ipk3").hide();
															$("#thnlulus3").hide();
															$("#skripsi1_profesi").hide();
															$("#akreditasi-kampus1").hide();
															$("#akreditasi-prodi1").hide();
															$("#ijazah1").hide();
															$("#transkrip1").hide();
															$("#akreditasipt1").hide();
															$("#akreditasips1").hide();
															$("#penyetaraan1").hide();
														} else {
															document.getElementById("pendidikan_profesi").required = true;
															document.getElementById("asalpendidikan_profesi").required = true;
															document.getElementById("namapt_profesi").required = true;
															document.getElementById("ps_profesi").required = true;
															document.getElementById("ipk_profesi").required = true;
															document.getElementById("thnlulus_profesi").required = true;
															document.getElementById("skripsi1_profesi").required = true;
															document.getElementById("select-akreditasi-kampus1").required = true;
															document.getElementById("select-akreditasi-prodi1").required = true;
															// document.getElementById("ijazah1").required = true;
															$("#pendidikan3").show();
															$("#asalpendidikan3").show();
															$("#namapt_profesi").show();
															$("#ps_profesi").show();
															$("#ipk_profesi").show();
															$("#thnlulus_profesi").show();
															$("#skripsi1_profesi").show();
															$("#akreditasi-kampus1").show();
															$("#akreditasi-prodi1").show();
															$("#ijazah1").show();
															$("#transkrip1").show();
															$("#akreditasipt1").show();
															$("#akreditasips1").show();
															$("#penyetaraan1").show();
														}
													}
												</script> 
											</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label">Pendidikan:</label><br />
														<label class="control-label">(Sarjana / Sarjana Terapan)</label>
														<div class="">
															<select type="text" class="form-control select2" name="pendidikan" required>
																<option value="3" selected="">D4</option>
																<option value="4">S1</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Asal Pendidikan Sarjana:</label><br />
														<label class="control-label">(Dalam Negeri / Luar Negeri)</label>
															<select id="select-asal-pendidikan" onChange="asalPendidikanHandler()" type="text" class="form-control select2" name="asal_sekolah" required>
																<option value="0" selected="">Pilih</option>
																<option value="1">Dalam Negeri</option>
																<option value="2">Luar Negeri</option>
															</select>
															<script>
																function asalPendidikanHandler() {
																	if ( document.getElementById("select-asal-pendidikan").value == "2") {
																		document.getElementById("select-akreditasi-kampus").required = false;
																		document.getElementById("select-akreditasi-prodi").required = false;
																		// document.getElementById("form-group akreditasi-kampus").style.visibility = "hidden";
																		// document.getElementById("form-group akreditasi-prodi").style.visibility = "hidden";
																		$("#akreditasi-kampus").hide();
																		$("#akreditasi-prodi").hide();
																		$("#akreditasipt").hide();
																		$("#akreditasips").hide();
																		$("#penyetaraan").show();
																		// document.getElementById("akreditasipt").style.visibility = "hidden";
																		// document.getElementById("akreditasips").style.visibility = "hidden";
																		// document.getElementById("penyetaraan").style.visibility = "visible";
																	} else {
																		document.getElementById("select-akreditasi-kampus").required = true;
																		document.getElementById("select-akreditasi-prodi").required = true;
																		// document.getElementById("form-group akreditasi-kampus").style.visibility = "visible";
																		// document.getElementById("form-group akreditasi-prodi").style.visibility = "visible";
																		$("#akreditasi-kampus").show();
																		$("#akreditasi-prodi").show();
																		$("#akreditasipt").show();
																		$("#akreditasips").show();
																		$("#penyetaraan").hide();
																		// document.getElementById("akreditasipt").style.visibility = "visible";
																		// document.getElementById("akreditasips").style.visibility = "visible";
																		// document.getElementById("penyetaraan").style.visibility = "hidden";
																	}
																}
															</script>
													</div>
													<div class="col-md-6">
														<label class="control-label">Nama PT :</label><br />
														<label class="control-label">(Sarjana / Sarjana Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="nm_kampus" />
														</div>
													</div>
													<div id="akreditasi-kampus">
														<div class="col-md-6">
															<label class="control-label">Akreditasi PT</label><br />
															<label class="control-label">(Sarjana / Sarjana Terapan)</label>
															<div class="">
																<select id="select-akreditasi-kampus" type="text" class="col-xs-3 form-control select2" name="akreditasi_kampus" required>
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Program Studi:</label><br />
														<label class="control-label">(Sarjana / Sarjana Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="jurusan" />
														</div>
													</div>
													<div id="akreditasi-prodi">
														<div class="col-md-6">
															<label class="control-label">Akreditasi Program Studi</label><br />
															<label class="control-label">(Sarjana / Sarjana Terapan)</label>
															<div class="">
																<select id="select-akreditasi-prodi" type="text" class="col-xs-3 form-control select2" name="akreditasi_jurusan" required>
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">IPK:</label><br />
														<label class="control-label">(Sarjana / Sarjana Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="ipk" />
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Tahun Lulus:</label><br />
														<label class="control-label">(Sarjana / Sarjana Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="thn_lulus" />
														</div>
													</div>
													<div class="col-md-12">
														<label class="control-label">Judul Skripsi:</label><br />
														<label class="control-label">(Sarjana / Sarjana Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="skripsi" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="col-sm-5 control-label">Pendidikan Profesi:</label>
														<div class="col-sm-3">
															<select id="pendidikanprofesi" onChange="pendidikanProfesiHandler()" type="text" class="form-control select2" name="profesi" required>
																<option value="1">Ya</option>
																<option value="2">Tidak</option>
															</select>
														</div>
														<script>
															function pendidikanProfesiHandler(){
																if(document.getElementById("pendidikanprofesi").value == "2"){
																	document.getElementById("pendidikan_profesi").required = false;
																	document.getElementById("asalpendidikan_profesi").required = false;
																	document.getElementById("namapt_profesi").required = false;
																	document.getElementById("akreditasi-kampus1").required = false;
																	document.getElementById("ps_profesi").required = false;
																	document.getElementById("akreditasi-prodi1").required = false;
																	document.getElementById("ipk_profesi").required = false;
																	document.getElementById("thnlulus_profesi").required = false;
																	document.getElementById("skripsi1_profesi").required = false;
																	$("#pendidikan_profesi").hide();
																	$("#asalpendidikan_profesi").hide();
																	$("#namapt_profesi").hide();
																	$("#akreditasi-kampus1").hide();
																	$("#ps_profesi").hide();
																	$("#akreditasi-prodi1").hide();
																	$("#ipk_profesi").hide();
																	$("#thnlulus_profesi").hide();
																	$("#skripsi1_profesi").hide();
																}else{
																	document.getElementById("pendidikan_profesi").required = true;
																	document.getElementById("asalpendidikan_profesi").required = true;
																	document.getElementById("namapt_profesi").required = true;
																	document.getElementById("akreditasi-kampus1").required = true;
																	document.getElementById("ps_profesi").required = true;
																	document.getElementById("akreditasi-prodi1").required = true;
																	document.getElementById("ipk_profesi").required = true;
																	document.getElementById("thnlulus_profesi").required = true;
																	document.getElementById("skripsi1_profesi").required = true;
																	$("#pendidikan_profesi").show();
																	$("#asalpendidikan_profesi").show();
																	$("#namapt_profesi").show();
																	$("#akreditasi-kampus1").show();
																	$("#ps_profesi").show();
																	$("#akreditasi-prodi1").show();
																	$("#ipk_profesi").show();
																	$("#thnlulus_profesi").show();
																	$("#skripsi1_profesi").show();
																}
															}
														</script>
													</div>
												</div>
												<div class="form-group">
													<div id="pendidikan_profesi">
														<div class="col-md-6">
															<label class="control-label">Pendidikan:</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<select type="text" class="form-control" name="pendidikan1" required>
																	<option value="5">S1 Profesi</option>
																</select>
															</div>
														</div>
													</div>
													<div id="asalpendidikan_profesi" >
														<div class="col-md-6">
															<label class="control-label">Asal Pendidikan:</label><br />
															<label class="control-label">(Dalam Negeri / Luar Negeri)</label>
															<div class="">
																<select id="select-asal-pendidikan1" onChange="asalPendidikan1Handler()" type="text" class="form-control select2" name="asal_sekolah1" required>
																	<option value="0" selected="">Pilih</option>
																	<option value="1">Dalam Negeri</option>
																	<option value="2">Luar Negeri</option>
																</select>
																<script>
																	function asalPendidikan1Handler() {
																		if ( document.getElementById("select-asal-pendidikan1").value == "2") {
																			document.getElementById("select-akreditasi-kampus1").required = false;
																			document.getElementById("select-akreditasi-prodi1").required = false;
																			// document.getElementById("form-group akreditasi-kampus").style.visibility = "hidden";
																			// document.getElementById("form-group akreditasi-prodi").style.visibility = "hidden";
																			$("#akreditasi-kampus1").hide();
																			$("#akreditasi-prodi1").hide();
																			$("#akreditasipt1").hide();
																			$("#akreditasips1").hide();
																			$("#penyetaraan1").show();
																			// document.getElementById("akreditasipt").style.visibility = "hidden";
																			// document.getElementById("akreditasips").style.visibility = "hidden";
																			// document.getElementById("penyetaraan").style.visibility = "visible";
																		} else {
																			document.getElementById("select-akreditasi-kampus1").required = true;
																			document.getElementById("select-akreditasi-prodi1").required = true;
																			// document.getElementById("form-group akreditasi-kampus").style.visibility = "visible";
																			// document.getElementById("form-group akreditasi-prodi").style.visibility = "visible";
																			$("#akreditasi-kampus1").show();
																			$("#akreditasi-prodi1").show();
																			$("#akreditasipt1").show();
																			$("#akreditasips1").show();
																			$("#penyetaraan1").hide();
																			// document.getElementById("akreditasipt").style.visibility = "visible";
																			// document.getElementById("akreditasips").style.visibility = "visible";
																			// document.getElementById("penyetaraan").style.visibility = "hidden";
																		}
																	}
																</script>
															</div>
														</div>
													</div>
													<div id="namapt_profesi">
														<div class="col-md-6">
															<label class="control-label">Nama PT :</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<input type="text" class="col-xs-3 form-control" name="nm_kampus1" />
															</div>
														</div>
													</div>
													<div id="akreditasi-kampus1">
														<div class="col-md-6">
															<label class="control-label">Akreditasi PT</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<select id="select-akreditasi-kampus1" type="text" class="col-xs-3 form-control select2" name="akreditasi_kampus1" required>
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div id="ps_profesi" >
														<div class="col-md-6">
															<label class="control-label">Program Studi:</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<input type="text" class="col-xs-3 form-control" name="jurusan1" />
															</div>
														</div>
													</div>
													<div id="akreditasi-prodi1">
														<div class="col-md-6">
															<label class="control-label">Akreditasi Program Studi</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<select id="select-akreditasi-prodi1" type="text" class="col-xs-3 form-control select2" name="akreditasi_jurusan1" required>
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div id="ipk_profesi">
														<div class="col-md-6">
															<label class="control-label">IPK:</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<input type="text" class="col-xs-3 form-control" name="ipk1" />
															</div>
														</div>
													</div>
													<div id="thnlulus_profesi">
														<div class="col-md-6">
															<label class="control-label">Tahun Lulus:</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<input type="text" class="col-xs-3 form-control" name="thn_lulus1" />
															</div>
														</div>
													</div>
													<div id="skripsi1_profesi" >
														<div class="col-md-12">
															<label class="control-label">Judul Tugas Akhir:</label><br />
															<label class="control-label">(Sarjana Profesi)</label>
															<div class="">
																<input type="text" class="col-xs-3 form-control" name="skripsi1" />
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label">Pendidikan:</label><br />
														<label class="control-label">(Magister / Magister Terapan)</label>
														<div class="">
															<select type="text" class="form-control select2" name="pendidikan2" required>
																<option value="6" selected="">S2</option>
																<option value="7">S2 Terapan</option>
																<option value="8">SP 1</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Asal Pendidikan:</label><br />
														<label class="control-label">(Dalam Negeri / Luar Negeri)</label>
														<div class="">
															<select id="select-asal-pendidikann" onChange="asalPendidikannHandler()" type="text" class="form-control select2" name="asal_sekolah2" required>
																<option value="0" selected="">Pilih</option>
																<option value="1">Dalam Negeri</option>
																<option value="2">Luar Negeri</option>
															</select>
															<script>
																function asalPendidikannHandler() {
																	if ( document.getElementById("select-asal-pendidikann").value == "2") {
																		document.getElementById("select-akreditasi-kampuss").required = false;
																		document.getElementById("select-akreditasi-prodii").required = false;
																		$("#form-group akreditasi-kampuss").hide();
																		// $("#akreditasips").hide();
																		// document.getElementById("form-group akreditasi-kampuss").style.visibility = "hidden";
																		// document.getElementById("form-group akreditasi-prodii").style.visibility = "hidden";
																		$("#akreditasi-kampuss").hide();
																		$("#akreditasi-prodii").hide();
																		$("#akreditasipt2").hide();
																		$("#akreditasips2").hide();
																		$("#penyetaraan2").show();
																		// document.getElementById("akreditasipt2").style.visibility = "hidden";
																		// document.getElementById("akreditasips2").style.visibility = "hidden";
																		// document.getElementById("penyetaraan2").style.visibility = "visible";
																	} else {
																		document.getElementById("select-akreditasi-kampuss").required = true;
																		document.getElementById("select-akreditasi-prodii").required = true;
																		// document.getElementById("form-group akreditasi-kampuss").style.visibility = "visible";
																		// document.getElementById("form-group akreditasi-prodii").style.visibility = "visible";
																		$("#akreditasi-kampuss").show();
																		$("#akreditasi-prodii").show();
																		$("#akreditasipt2").show();
																		$("#akreditasips2").show();
																		$("#penyetaraan2").hide();
																		// document.getElementById("akreditasipt2").style.visibility = "visible";
																		// document.getElementById("akreditasips2").style.visibility = "visible";
																		// document.getElementById("penyetaraan2").style.visibility = "hidden";
																	}
																}
															</script>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Nama Perguruan Tinggi:</label><br />
														<label class="control-label">(Magister / Magister Terapan)</label>
														<div class="">
															<input type="text" class="form-control" name="nm_kampus2" />
														</div>
													</div>
													<div id="akreditasi-kampuss">
														<div class="col-md-6">
															<label class="control-label">Akreditasi Perguruan Tinggi:</label><br />
															<label class="control-label">(Magister / Magister Terapan)</label>
															<div class="">
																<select id="select-akreditasi-kampuss" type="text" class="form-control select2" name="akreditasi_kampus2" required>
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Program Studi:</label><br />
														<label class="control-label">(Magister / Magister Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="jurusan2" />
														</div>
													</div>
													<div id="akreditasi-prodii">
														<div class="col-md-6">
															<label class="control-label">Akreditasi Program Studi:</label><br />
															<label class="control-label">(Magister / Magister Terapan)</label>
															<div class="">
																<select id="select-akreditasi-prodii" type="text" class="form-control select2" name="akreditasi_jurusan2" required>
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">IPK:</label><br />
														<label class="control-label">(Magister / Magister Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="ipk2" />
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Tahun Lulus:</label><br />
														<label class="control-label">(Magister / Magister Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="thn_lulus2" />
														</div>
													</div>
													<div class="col-md-12">
														<label class="control-label">Judul Tesis:</label><br />
														<label class="control-label">(Magister / Magister Terapan)</label>
														<div class="">
															<input type="text" class="col-xs-3 form-control" name="tesis" />
														</div>
													</div>
												</div>
												<div class="form-group">
													<div id="pendidikan3">
														<div class="col-md-6">
															<label class="control-label">Pendidikan:</label><br />
															<label class="control-label">(Doktor / Doktor Terapan)</label>
															<div class="">
																<select type="text" class="form-control select2" name="pendidikan3">
																	<option value="9" selected="">S3</option>
																	<option value="10">S3 Terapan</option>
																	<option value="11">SP 2</option>
																</select>
															</div>
														</div>
													</div>
													<div id="asalpendidikan3">
														<div class="col-md-6">
															<label class="control-label">Asal Pendidikan:</label><br />
															<label class="control-label">(Dalam Negeri / Luar Negeri)</label>
															<div class="">
																<select id="select-asal-pendidikannn" onChange="asalPendidikannnHandler()" type="text" class="form-control select2" name="asal_sekolah3" required>
																	<option value="0" selected="">Pilih</option>
																	<option value="1">Dalam Negeri</option>
																	<option value="2">Luar Negeri</option>
																</select>
																<script>
																	function asalPendidikannnHandler() {
																		if ( document.getElementById("select-asal-pendidikannn").value == "2") {
																			document.getElementById("select-akreditasi-kampusss").required = false;
																			document.getElementById("select-akreditasi-prodiii").required = false;
																			// document.getElementById("form-group akreditasi-kampusss").style.visibility = "hidden";
																			// document.getElementById("form-group akreditasi-prodiii").style.visibility = "hidden";
																			$("#akreditasi-kampusss").hide();
																			$("#akreditasi-prodiii").hide();
																			$("#akreditasipt3").hide();
																			$("#akreditasips3").hide();
																			$("#penyetaraan3").show();
																			// document.getElementById("akreditasipt3").style.visibility = "hidden";
																			// document.getElementById("akreditasips3").style.visibility = "hidden";
																			// document.getElementById("penyetaraan3").style.visibility = "visible";
																		} else {
																			document.getElementById("select-akreditasi-kampusss").required = true;
																			document.getElementById("select-akreditasi-prodiii").required = true;
																			// document.getElementById("form-group akreditasi-kampusss").style.visibility = "visible";
																			// document.getElementById("form-group akreditasi-prodiii").style.visibility = "visible";
																			$("#akreditasi-kampusss").show();
																			$("#akreditasi-prodiii").show();
																			$("#akreditasipt3").show();
																			$("#akreditasips3").show();
																			$("#penyetaraan3").hide();
																			// document.getElementById("akreditasipt3").style.visibility = "visible";
																			// document.getElementById("akreditasips3").style.visibility = "visible";
																			// document.getElementById("penyetaraan3").style.visibility = "hidden";
																		}
																	}
																</script>
															</div>
														</div>
													</div>
													<div id="nm_pt3">
														<div class="col-md-6">
															<label class="control-label">Nama Perguruan Tinggi:</label><br />
															<label class="control-label">(Doktor / Doktor Terapan)</label>
															<div class="">
																<input type="text" class="form-control" name="nm_kampus3" placeholder="Optional / Formasi Doktor / Doktor Terapan" />
															</div>
														</div>
													</div>
													<div id="akreditasi-kampusss">
														<div class="col-md-6">
															<label class="control-label">Akreditasi Perguruan Tinggi:</label><br />
															<label class="control-label">(Doktor / Doktor Terapan)</label>
															<div class="">
																<select id="select-akreditasi-kampusss" type="text" class="form-control select2" name="akreditasi_kampus3">
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6" id="jurusan3">
														<label class="control-label">Program Studi:</label><br />
														<label class="control-label">(Doktor / Doktor Terapan)</label>
														<div class="">
															<input type="text" class="form-control" name="jurusan3" placeholder="Optional / Formasi Doktor / Doktor Terapan"/>
														</div>
													</div>
													<div id="akreditasi-prodiii">
														<div class="col-md-6">
															<label class="control-label">Akreditasi Program Studi:</label><br />
															<label class="control-label">(Doktor / Doktor Terapan)</label>
															<div class="">
																<select id="select-akreditasi-prodiii" type="text" class="form-control select2" name="akreditasi_jurusan3">
																	<option value="0">Pilih</option>
																	<option value="A">A</option>
																	<option value="B">B</option>
																</select>
															</div>
														</div>
													</div>
													<div class="col-md-6" id="ipk3">
														<label class="control-label">IPK:</label><br />
														<label class="control-label">(Doktor / Doktor Terapan)</label>
														<div class="">
															<input type="text" class="form-control" name="ipk3" placeholder="Optional / Formasi Doktor / Doktor Terapan"/>
														</div>
													</div>
													<div class="col-md-6" id="thn_lulus3">
														<label class="control-label">Tahun Lulus:</label><br />
														<label class="control-label">(Doktor / Doktor Terapan)</label>
														<div class="">
															<input type="text" class="form-control" name="thn_lulus3" placeholder="Optional / Formasi Doktor / Doktor Terapan" />
														</div>
													</div>
													<div class="col-md-12" id="disertasi3">
														<label class="control-label">Disertasi:</label><br />
														<label class="control-label">(Doktor / Doktor Terapan)</label>
														<div class="">
															<input type="text" class="form-control" name="desertasi" placeholder="Optional / Formasi Doktor / Doktor Terapan"/>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-6">
														<label class="control-label">Jenis Toefl:</label><br />
														<div class="">
															<select id="select-jenis_toefl" type="text" class="form-control select2" name="jenis_toefl">
																<option value="0">Pilih</option>
																<option value="A">IELTS</option>
																<option value="B">ITP</option>
															</select>
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Nilai TOEFL atau setara:</label>
														<div class="">
															<input type="text" class="form-control" name="toefl" />
														</div>
													</div>
													<div class="col-md-6">
														<label class="control-label">Tanggal Terbit Toefl:</label>
														<div class="">
															<input type="date" class="form-control" name="tgl_sert_terbit" />
														</div>
													</div>
												</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="riwayat_pekerjaan">
											<div class="row">
												<div class="col-sm-12">
													<div class="white-box">
														<div class="row">
																<div class="col-sm-12">
																	<div class="col-md-8 pull-right">
																		<a class="pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#addUserModal">
																			<span class="circle circle-sm bg-success di" data-toggle="tooltip" title="Tambah User" data-placement="bottom"><i class="ti-plus"></i></span>
																		</a>
																	</div>
																</div>
														</div>
														<hr>
														<div id="tabel-data">

														</div>
													</div>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="lampiran">
											<div class="col-md-12">
											<label>Upload Surat Lamaran (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="lamaran[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
											<label>Upload KTP (JPG,JPEG,PNG):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="ktp[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Foto (Ukuran 4x6 berlatar belakang merah, bertipe JPG):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="foto[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Surat Keterangan Sehat (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="sks[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Surat Keterangan Catatan Kepolisian (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="skck[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Scan Asli Ijazah Sarjana / Sarjana Terapan (File digabung dan bertipe PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="ijazah[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Scan Asli Transkrip Sarjana / Sarjana Terapan (File digabung dan bertipe PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="transkrip[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="penyetaraan">
												<label>Upload Penyetaraan Sarjana / Sarjana Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="penyetaraan[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasipt">
											<label>Upload Akreditasi PT Sarjana / Sarjana Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasips">
												<label>Upload Akreditasi Prodi Sarjana / Sarjana Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi_prodi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="ijazah1">
											<label>Upload Scan Asli Ijazah Sarjana Profesi (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="ijazah1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="transkrip1">
											<label>Upload Scan Asli Transkrip Sarjana Profesi (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="transkrip1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="penyetaraan1">
											<label>Upload Penyetaraan Sarjana Profesi (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="penyetaraan1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasipt1">
												<label>Upload Akreditasi PT Sarjana Profesi (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasips1">
												<label>Upload Akreditasi Prodi Sarjana Profesi (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi_prodi1[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Scan Asli Ijazah Magister / Magister Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="ijazah2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Scan Asli Transkrip Magister / Magister Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="transkrip2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="penyetaraan2">
												<label>Upload Penyetaraaan Magister / Magister Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="penyetaraan2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasipt2">
												<label>Upload Akreditasi PT Magister / Magister Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasips2">
												<label>Upload Akreditasi Prodi Magister / Magister Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi_prodi2[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Scan Asli Ijazah dan Transkrip Doktor (File digabung dan bertipe PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="ijazah3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="penyetaraan3">
												<label>Upload Penyetaraaan Doktor / Doktore Terapan (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="penyetaraan3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasipt3">
												<label>Upload Akreditasi PT Doktor (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasips3">
												<label>Upload Akreditasi Prodi Doktor (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="akreditasi_prodi3[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12" id="akreditasips3">
												<label>Upload Surat Pernyataan Tidak Pernah Menjadi Anggota dan Pengurus Organisasi Terlarang (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="suratpernyataanbebasparpol[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
											<div class="col-md-12">
												<label>Upload Toefl (PDF):</label>
												<div class="form-group">
													<div class="col-md-10">
														<div class="fileinput fileinput-new input-group" data-provides="fileinput">
															<div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
															<input type="file" name="sertifikat[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
														</div>
													</div>
													<div class="col-md-2">
														<button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Upload</button>
													</div>
												</div>
											</div>
										</div>
										<div role="tabpanel" class="tab-pane fade" id="persetujuan">
											<div class="form-group">
												<div class="col-md-12">
													<label class="col-xs-12 control-label"></label>
													<div class="col-xs-12">
														<h4><b>Dengan ini menyatakan bahwa data yang saya isikan adalah yang sebenar-benarnya. 
														Saya setuju dengan segala ketentuan yang ditetapkan oleh panitia penerimaan Universitas Diponegoro 
														dan bersedia menerima sanksi pembatalan kelulusan apabila data yang isikan tidak benar.<b/></h4>
														<br /><h4><b>Dengan klik "Daftar", anda telah menyetujui pernyataan yang ada. Cek kembali data yang anda masukkan dengan teliti, anda tidak dapat mengubah data yang telah anda masukkan.</b></h4>
														<h4><b>Klik Daftar</b></h4>
													</div>
													<br><hr><br><br><br><br><br>
													<button type="submit" name="submit" class="btn btn-outline btn-success btn-lg btn-block waves-effect waves-light">Daftar</button>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
						<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
						<script src="<?php echo base_url('temp/plugins/bower_components/jquery.blockUI.js')?>"></script>
						<script type="text/javascript">
							$(document).ready(function() {
								$('#add-identitas').submit(function(e){
									e.preventDefault();
									var formData = new FormData($(this)[0]);
										swal({
											title: "Apakah Anda Yakin?",
											text: "",
											type: "warning",
											showCancelButton: true,
											confirmButtonColor: "#DD6B55",
											confirmButtonText: "Ya, Simpan!",
											// cancelButtonText: "Tidak, Ubah!",
											closeOnConfirm: true,
											closeOnCancel: false,
											// timer: 7500
										},
										function (isConfirm) {
										$.blockUI.defaults.baseZ = 1000;
										$(document).ajaxStart(function () {
											$.blockUI({css: {
													border: 'none',
													padding: '25px',
													backgroundColor: '#000',
													'-webkit-border-radius': '10px',
													'-moz-border-radius': '10px',
													opacity: .5,
													color: '#fff',
													'z-index': '1200'
												}, message: '<h2 style="color:white">Harap tunggu...</h2>Proses upload data', });
										});

										$(document).ajaxStop($.unblockUI);
											if (isConfirm) {
												$.ajax({
													url: '<?= site_url('PelamarCntrl/addIdentitasPelamar') ?>',
													data:formData,
													type:'POST',
													contentType: false,
													processData: false,
													success: function (data) {
														if (data['return'] == 2) {
															swal("Sukses", "data anda telah terdaftar, Silahkan cetak Formulir dan Cek List pada menu Cetak.", "success");
															window.location = 'pendaftaran';
														}else{
															swal({
															  title:"Peringatan",
															  text:"Gagal Melengkapi berkas, pastikan koneksi internet stabil",
															  type: "warning",
															  showCancelButton: false,
															  confirmButtonText: "Ubah",
															  closeOnConfirm: true,
															})
														}
													},
												});
											} else {
												swal("Ubah Data", "error");
											}
										});

										return false;
									});
								});
						</script>
						<script type="text/javascript">
							function getTabel() {
								$.ajax({
									url:'PelamarCntrl/getTabelRiwayatKerja',
									data:
									{ 
										send:true,
									},
									success:function(data){
										$("#tabel-data").html(data);
										tooltip._tooltip();
									}
								});
							}
							
							$(document).ready(function() {
								getTabel();
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<?php $this->load->view('scripts') ?>

</body>
</html>
