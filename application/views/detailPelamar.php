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
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title">Profil Pelamar</h4>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12">
                        <div class="white-box">
                            <div class="tengah">
                                <div class="overlay-box">
                                    <?php
                                        foreach($tabel_file->result() as $value){
                                    ?>
                                    <div class="user-content">
                                        <!-- <a href="javascript:void(0)"><img src="<?= site_url('')?><?= $value->path_file?>" width="30%"></a> -->
                                    <?php }?>

                                    <?php
                                        foreach($query->result() as $row){
                                            $nama_pelamar = $row->nama_pelamar;
                                            $status = $row->status;
                                            $kualifikasi = $row->nm_kualifikasi;
                                            $kode_kualifikasi = $row->kode_kualifikasi;
                                            $penempatan = $row->penempatan;

                                            if($status == 1){
                                            $statuse = "Lolos";
                                            }else if($status == 2){
                                                $statuse = "Tidak Lolos";
                                            }else{
                                                $statuse = "Sedang Proses";
                                            }

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

                                            // if($row->id_kualifikasi == 1){
                                            //     $kualifikasi = 'FKT-01';
                                            // }else{
                                            //     $kualifikasi = 'FKT-02';
                                            // }

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
                                        <!-- <h4 class="text-white"><?= $nama_pelamar?></h4> -->
                                    <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="user-btm-box">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Nomor Pendatfaran :</label>
                                        <input type="text" class="form-control" value="<?= $row->no_pendaftaran?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Nomor KTP :</label>
                                        <input type="text" class="form-control" value="<?= $row->ktp?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Nama Pelamar :</label>
                                        <input type="text" class="form-control" value="<?= $row->gelar_depan?>&nbsp;<?= $row->nama_pelamar?>&nbsp;<?= $row->gelar_belakang?>" disabled> 
                                    </div>
                                </div>                        
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Jenis Kelamin :</label>
                                        <input type="texttext" class="form-control" value="<?= $row->jenis_kelamin?>" name="jml_barang" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Tempat Lahir :</label>
                                        <input type="text" class="form-control" value="<?= $row->tempat_lahir?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Tanggal Lahir :</label>
                                        <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($row->tanggal_lahir)).' (Umur: ' . $y . ' th ' . $m . ' bln ' . $d . ' hari)';?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Agama :</label>
                                        <input type="texttext" class="form-control" value="<?= $row->agama?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Email :</label>
                                        <input type="text" class="form-control" value="<?= $row->email?>" disabled> 
                                    </div>
                                </div>                               
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Nomor HP :</label>
                                        <input type="text" class="form-control" value="<?= $row->no_telepon?>" disabled> 
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Alamat :</label>
										<textarea class="form-control" disabled="" rows="2"><?= $row->alamat?></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-16 col-xs-12">
                                <div class="white-box">
                                    <table class="table" id="table-file">
                                    <thead>
                                        <tr>
                                            <th width="3%">No</th>
                                            <th width="40%" class="text-center">Nama File</th>
                                            <th width="10%" class="text-center">File</th>
                                            <!-- <th width="30%">Keterangan</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if($tabel_file2->result()){
                                            $i = 0;
                                            foreach($tabel_file2->result() as $value){
                                            $i++;
                                            ?>
                                            <tr>
                                                <td width="3%"><?= $i ?></td>
                                                <td width="40%"><?= $value->nama_file ?></td>
                                                <td width="10%" class="text-center">
                                                    <a href="<?= site_url('')?><?= $value->path_file?> " class="editData" id="<?= $value->id_file ?>" target="_blank"><button type="button" class="btn btn-success btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Lihat File"><i class="ti-file"></i></button></a>
                                                </td>
                                                <!-- <td class="form-group">
                                                    <select type="text" class="form-control select2" name="kesesuaian[]" id="panel-heading" required>
                                                        <option value="Sesuai Kualifikasi">Sesuai Kualifikasi</option>
                                                        <option value="Tidak Sesuai Kualifikasi">Tidak Sesuai Kualifikasi</option>
                                                    </select>  
                                                </td> -->
                                                <input type="hidden" class="form-control" name="nik[]" value="<?= $value->id_file?>">
                                            </tr>
                                            <?php }
                                        }else{ ?>
                                        <tr>
                                            <td colspan="3" class="text-center">No Data Available</td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-xs-12">
                        <div class="white-box">
                            <div class="user-btm-box">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Kualifikasi :</label>
                                        <input type="text" class="form-control" value="<?= $kualifikasi ?>&nbsp;(<?= $kode_kualifikasi?>-<?= $penempatan?>)" disabled> 
                                    </div>
                                </div>
								<?php if($row->ipk1 == '' and $row->thn_lulus1 == ''){?>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Jenjang Pendidikan :</label>
                                        <textarea class="form-control" disabled="" rows="15">-<?= $pendidikane?>&nbsp;<?= $row->prodi?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Skripsi:&nbsp;<?= $row->skripsi?><?=("\n")?><?=("\n")?>-<?= $pendidikane2?>&nbsp;<?= $row->prodi2?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus2?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Tesis:&nbsp;<?= $row->tesis?><?=("\n")?><?=("\n")?><?php if($row->ipk3 == '' and $row->thn_lulus3 == ''){}else{ ?> -<?= $pendidikane3?>&nbsp;<?= $row->prodi3?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus3?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Disertasi:&nbsp;<?= $row->desertasi?><?php }?>
                                        </textarea>
                                    </div>
                                </div>
								<?php }else{?>
								<div class="col-md-12">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Jenjang Pendidikan :</label>
                                        <textarea class="form-control" disabled="" rows="15">-<?= $pendidikane?>&nbsp;<?= $row->prodi?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Skripsi:&nbsp;<?= $row->skripsi?><?=("\n")?><?=("\n")?>-<?= $pendidikane?>&nbsp;<?= $row->prodi1?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi1?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus1?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus1?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk1?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus1?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Tugas Akhir:&nbsp;<?= $row->skripsi1?><?=("\n")?><?=("\n")?>-<?= $pendidikane2?>&nbsp;<?= $row->prodi2?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus2?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus2?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus2?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Tesis:&nbsp;<?= $row->tesis?><?=("\n")?><?=("\n")?><?=("\n")?><?php if($row->ipk3 == '' and $row->thn_lulus3 == ''){}else{ ?>-<?= $pendidikane3?>&nbsp;<?= $row->prodi3?>&nbsp;(Akreditasi PS:&nbsp;<?= $row->akreditasi_prodi3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?= $row->nm_kampus3?>&nbsp;(Akreditasi PT:&nbsp;<?= $row->akreditasi_kampus3?>)<?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IPK:&nbsp;<?= $row->ipk3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Tahun Lulus:&nbsp;<?= $row->thn_lulus3?><?=("\n")?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Judul Disertasi:&nbsp;<?= $row->desertasi?><?php }?>
                                        </textarea>
                                    </div>
                                </div>
								<?php }?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Skor Toefl :</label>
                                        <input type="text" class="form-control" value="<?= $row->toefl?>" disabled>
                                    </div>
                                </div>
								<div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nama" class="control-label">Tanggal Terbit Sertifikat Toefl :</label>
                                        <input type="text" class="form-control" value="<?= $row->tgl_sert_terbit?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!--<?php
							$level = $this->session->userdata("level");
							if($level != 4){
						?>
                        <div class="white-box">
                            <div class="user-btm-box">
                                    <div class="col-md-12 col-xs-12">
                                        <form id="ubah-status">
                                        <div class="white-box">
                                            <table class="table" id="table-file">
                                                <tbody>
                                                    <?php
                                                        $status = $row->status;
                                                        if($status == 1){
                                                            $statuse = "LOLOS";
                                                        }else if($status == 2){
                                                            $statuse = "TIDAK LOLOS";
                                                        }else{
                                                            $statuse = "SEDANG PROSES";
                                                        }
                                                        if($row->status == 3){
                                                    ?>
                                                    <div class="form-group">
                                                        <label for="nama" class="control-label">Status</label><br>
                                                        <a href="#" class="setuju" data-toggle="modal" data-target=".setujuModal" ><button type="button" id="cekstatussetuju" class="btn btn-success btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-check"></i>&nbsp Loloskan Pelamar</button></a>
                                                        <a href="#" class="tolak" data-toggle="modal" data-target=".tolakModal" ><button type="button" id="cekstatustidak" class="btn btn-danger btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-close"></i>&nbsp Tidak Loloskan Pelamar</button></a>
                                                            <select type="text" class="form-control" name="status" required>
                                                                <option value="1" selected="">Lolos</option>
                                                                <option value="2">Tidak Lolos</option>
                                                            </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="nama" class="control-label">Keterangan</label><br>
                                                        <textarea class="form-control" name="keterangan" id="panel-heading" placeholder="ex. Toefl tidak sesuai kualifikasi (dibawah 500)" required></textarea>
                                                    </div>
                                                    <input type="hidden" class="form-control" name="id" value="<?= $row->id_pelamar?>">
                                                </tbody>
                                            </table>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success waves-effect waves-light">Verifikasi</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <?php
                                    }else if($row->status == 1){
                                ?>
                                <div class="form-horizontal col-sm-12 col-xs-12">
                                    <div class="form-group col text-center">
                                        <img src="<?= site_url('')?><?= $tabel_file->row()->path_file?>" style="margin-bottom: 25px; max-width: 100px">
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" style="text-align: left">Keterangan Pelamar</label>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-success btn-outline btn-lg btn-block m-r-5 dotip input-lg" data-toggle="tooltip"> <?= $statuse?></button> </div>
                                    </div>
                                </div>
                                <?php }else if($row->status == 2){?>
                                <div class="form-horizontal col-sm-12 col-xs-12">
                                    <?php
                                        if(ISSET($tabel_file->row()->path_file))
                                            {
                                    ?>
                                    <div class="form-group col text-center">
                                        <img src="<?= site_url('')?><?= $tabel_file->row()->path_file?>" style="margin-bottom: 25px; max-width: 100px">
                                    </div>
                                    <?php }else{?>
                                        <div class="form-group col text-center">
                                        <img src="" style="margin-bottom: 25px; max-width: 100px">
										</div>
                                    </td>
                                    <?php }?>
                                    <div class="form-group">
                                        <label class="col-sm-4 control-label" style="text-align: left">Keterangan Pelamar</label>
                                        <div class="col-sm-12">
                                            <button type="button" class="btn btn-danger btn-outline btn-lg btn-block m-r-5 dotip input-lg" data-toggle="tooltip"> <?= $statuse?></button>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                </div>
                            </div>
                        <?php
							} else {}
						?>
						</div>-->
                    </div>
                </div>
            </div>
        </div>
    <!-- jQuery -->
    <?php $this->load->view('scripts') ?>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#ubah-status').submit(function(e){
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
                            url: '<?= site_url('PelamarCntrl/verifikasi1') ?>',
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
        });
</script>
