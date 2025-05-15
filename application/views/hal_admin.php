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
                <div class="col-lg-5 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><?= $title ?></h4> </div>
                <div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">
                    <h4 class="pull-right"><?= $date ?></h4>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <!-- ============================================================== -->
            <!-- Different data widgets -->
            <!-- ============================================================== -->
			
            <div class="row">
                <div class="col-sm-12">
                    <div class="white-box">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="box-title" style="margin-top: 10px;margin-bottom: -10px">
                                Data Pendaftar
                                </h3><br><br>
                            </div>
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="col-md-2"></div>
                                    <?php
                                        $lvl = $this->session->userdata('level');
                                        if($lvl == 1){
                                    ?>
									<div class="row">
										<form id="add-honor" action="#" method="POST" enctype="multipart/form-data">
											<div class="col-md-3">
												<div class="form-group">
													<select type="text" class="form-control" id="sortformasi" name="formasi" required>
														<option value="all">Semua Formasi</option>
														<?php foreach($kualifikasi as $val){ ?>
															<option value="<?= $val->id_kualifikasi ?>"> <?= $val->nm_kualifikasi?>&nbsp;<?=$val->kode_kualifikasi?>&nbsp;(<?= $val->unit_kerja?>)</option>
														<?php } ?>
													</select> 
												</div>
											</div>
											<div class="col-md-3">
												<div class="form-group">
													<select type="text" class="form-control" id="sortstatus" name="status" required>
														<option value="all">Status Pelamar</option>
														<option value="3">Sedang Proses</option>
														<option value="1">Lolos</option>
														<option value="2">Tidak Lolos</option>
													</select> 
												</div>
											</div>
										</form>
									</div>
                                    <?php
                                        }else if($lvl == 2){
                                    ?>
                                    <form id="add-honor" action="#" method="POST" enctype="multipart/form-data">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select type="text" class="form-control" id="sortformasi" name="formasi" required>
                                                    <option value="all">Semua Formasi</option>
                                                    <?php foreach($kualifikasi as $val){ ?>
                                                        <option value="<?= $val->id_kualifikasi ?>"> <?= $val->nm_kualifikasi?>&nbsp;<?=$val->kode_kualifikasi?>&nbsp;(<?= $val->unit_kerja?>)</option>
                                                    <?php } ?>
                                                </select> 
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <select type="text" class="form-control" id="sortstatus" name="status" required>
                                                    <option value="all">Status Pelamar</option>
													<option value="3">Sedang Proses</option>
                                                    <option value="1">Lolos</option>
                                                    <option value="2">Tidak Lolos</option>
                                                </select> 
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                        }else{}
                                    ?>
                                </div>
                            </div>
							<?php
								if($lvl == 1){
							?>
                            <div class="col-md-12 text-right">
                                <a href="<?php base_url() ?>/index.php/PelamarCntrl/export_peserta" ><button class="btn btn-info waves-effect waves-light" type="button" style="margin-bottom: 3px"><span class="btn-label"><i class="fa fa-download"></i></span>Download Excel</button></a>
                            </div>
								<?php }else{}?>
                        </div>
                        <hr>
                        <div id="tabel-admin">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!--  -->
            <!--row -->
            <?php $this->load->view('modal-filehal_admin'); ?>
            <?php $this->load->view('modal-fileadmin'); ?>
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
<?php $this->load->view('scripts') ?>
<!-- Datatable -->

<script type="text/javascript">
    function getTabel() {
        $.ajax({
            url:'PelamarCntrl/getTabelhal_admin',
            data:
            { 
                send:true,
            },
            success:function(data){
                $("#tabel-admin").html(data);
                tooltip._tooltip();
            }
        });
    }

    $(document).ready(function() {
        getTabel();
        $('#buka-pelamar').click(function(){
            $.ajax({
                url:'<?= site_url('PelamarCntrl/bukaPelamar/') ?>',
                data:{
                    id:id
                },
                success:function(data){
                    getTabel('PelamarCntrl/getTabel');
					// swal("Sukses", "Status Pelamar Telah Berubah.", "success");
					notification._toast('Success','Status berhasil diubah','success');
					$('.bukaaksesModal').modal('show');
                }
            });
        });

        $('#verifikasi-berkas').click(function(){
            $.ajax({
                url:'<?= site_url('PelamarCntrl/verifikasi/') ?>',
                data:{
                    id:id
                },
                success:function(data){
                    notification._toast('Success','Berhasil, Verifikasi','success');
                }
            });
        });

        $('#form_keterangan').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('pelamarCntrl/verifikasi') ?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    dt = JSON.parse(data);
                    $('[name="keterangan"]').val("");
                    $('#fileModal').modal('hide');
                    formasi = $('#sortformasi').val();
                    status = $('#sortstatus').val();
                    getSort('pelamarCntrl/sorting', formasi, status);
                    notification._toast('Success','Berhasil, Pelamar berhasil diverifikasi','success');
                }
            });
            return false;
        });

        // Verifikasi dari verifikator
        $('#form_keterangan_verifikator').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('pelamarCntrl/verifikasi') ?>",
                data: new FormData(this),
                processData: false,
                contentType: false,
                cache: false,
                async: false,
                success: function (data) {
                    console.log(data);
                    dt = JSON.parse(data);
                    $('[name="keterangan"]').val("");
                    $('#fileModal').modal('hide');
                    getTabel('PelamarCntrl/getTabel');
                    notification._toast('Success','Berhasil, Pelamar berhasil diverifikasi','success');
                }
            });
            return false;
        });

        $('#setuju-pelamar').click(function(){
            var keterangan = $('#keterangan').val();
            $.ajax({
                url:'<?= site_url('PelamarCntrl/setujuPelamar/') ?>',
                data:{
                    id:id,

                },
                success:function(data){
                    // $(".keterangan").hide();
                    $('[name="keterangan"]').prop('required',false);
                	// $("#cekstatussetuju").prop('disabled', true);
                    $('#info-status').html('Lolos');
                    // getTabel('PelamarCntrl/getTabel');
                    formasi = $('#sortformasi').val();
                    status = $('#sortstatus').val();
                    getSort('pelamarCntrl/sorting', formasi, status);
                    $('.setujuModal').modal('hide');
                    notification._toast('Success','Berhasil, Pelamar lolos','success');
                }
            });
        });
        // setuju dari verifikator
        $('#setuju-verifikator').click(function(){
            var keterangan = $('#keterangan').val();
            $.ajax({
                url:'<?= site_url('PelamarCntrl/setujuPelamar/') ?>',
                data:{
                    id:id,

                },
                success:function(data){
                    // $(".keterangan").hide();
                    $('[name="keterangan"]').prop('required',false);
                    // $("#cekstatussetuju").prop('disabled', true);
                    $('#info-status').html('Lolos');
                    getTabel('PelamarCntrl/getTabel');
                    // formasi = $('#sortformasi').val();
                    // status = $('#sortstatus').val();
                    // getSort('pelamarCntrl/sorting', formasi, status);
                    $('.setujuModal').modal('hide');
                    notification._toast('Success','Berhasil, Pelamar lolos','success');
                }
            });
        });

        $('#tolak-pelamar').click(function(){
            $.ajax({
                url:'<?= site_url('PelamarCntrl/tolakPelamar/') ?>',
                data:{
                    id:id
                },
                success:function(data){
                    $('[name="keterangan"]').prop('required',true);
                	// $("#cekstatustidak").prop('disabled', true);
                    $('#info-status').html('Tidak Lolos');
                    // getTabel('PelamarCntrl/getTabel');
                    formasi = $('#sortformasi').val();
                    status = $('#sortstatus').val();
                    getSort('pelamarCntrl/sorting', formasi, status);
                    $('.tolakModal').modal('hide');
                    notification._toast('Success','Pelamar tidak lolos','success');
                }
            });
        });
        // Tolak dari verifikator
        $('#tolak-verifikator').click(function(){
            $.ajax({
                url:'<?= site_url('PelamarCntrl/tolakPelamar/') ?>',
                data:{
                    id:id
                },
                success:function(data){
                    $('[name="keterangan"]').prop('required',true);
                    // $("#cekstatustidak").prop('disabled', true);
                    $('#info-status').html('Tidak Lolos');
                    getTabel('PelamarCntrl/getTabel');
                    // formasi = $('#sortformasi').val();
                    // status = $('#sortstatus').val();
                    // getSort('pelamarCntrl/sorting', formasi, status);
                    $('.tolakModal').modal('hide');
                    notification._toast('Success','Pelamar tidak lolos','success');
                }
            });
        });

        $('#sortformasi').on('change', function(){
            formasi = $(this).val();
            status = $('#sortstatus').val();
            getSort('pelamarCntrl/sorting', formasi, status);
        });

        $('#sortstatus').on('change', function(){
            status = $(this).val();
            formasi = $('#sortformasi').val();
            getSort('pelamarCntrl/sorting', formasi, status);
        });

         $('#slimtest4').slimScroll({
            color: '#00f',
            size: '10px',
            height: '1000px',
            alwaysVisible: true
        });

    });
	$(document).ready(function() {
    $('#tabell-pelamar').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        "stateSave": true,
        "bAutoWidth": true });
    });
    $('#table-admin').dataTable({ stateSave: true });
</script>
</body>
</html>
