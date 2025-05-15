<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/undip.png') ?>">
    <title><?= $title ?></title>
    <!-- Bootstrap Core CSS -->
    <link href="<?= base_url('temp/asset/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
    <!-- Menu CSS -->
    <link href="<?= base_url('temp/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.css') ?>" rel="stylesheet">
    <!-- toast CSS -->
    <link href="<?= base_url('temp/plugins/bower_components/toast-master/css/jquery.toast.css') ?>" rel="stylesheet">
    <!-- morris CSS -->
    <link href="<?= base_url('temp/plugins/bower_components/morrisjs/morris.css') ?>" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="<?= base_url('temp/plugins/bower_components/chartist-js/dist/chartist.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('temp/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css') ?>" rel="stylesheet">
    <!-- Calendar CSS -->
    <link href="<?= base_url('temp/plugins/bower_components/calendar/dist/fullcalendar.css') ?>" rel="stylesheet" />
    <!-- animation CSS -->
    <link href="<?= base_url('temp/asset/css/animate.css') ?>" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url('temp/asset/css/style.css') ?>" rel="stylesheet">
    <!-- color CSS -->
    <link href="<?= base_url('temp/asset/css/colors/default.css') ?>" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

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
        <?php $this->load->view('navbar'); ?>
        <!-- End Top Navigation -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php
            if($this->session->userdata("level") != 1 and $this->session->userdata("level") != 4){
        ?>
        <?php $this->load->view('sidebar');?>
        <?php
            }else{
                $this->load->view('sidebar_pendaftaran');
            }
        ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page Content -->
        <!-- ============================================================== -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row bg-title">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                        <h4 class="page-title"><?= $title ?></h4> </div>
                    <div class="col-lg-7 col-sm-8 col-md-8 col-xs-12">
                        <h4 class="pull-right"><?= $time ?></h4>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-md-12 col-xs-12">
                        <div class="white-box">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="user-bg" style="height: 350px"> 
                                        <div class="overlay-box" style="background: url(assets/img/kerjasama.jpeg);display: block;background-size: cover;background-position: center;height: 100% ">
                                            <div class="row" style="margin-top: 20px">
                                                <div class="col-sm-12 col-md-12 col-lg-12" style="">
                                                    <div class="user-content" style="margin-left: 10px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <h3 class="text-center" style="margin-top: 40px">SELAMAT DATANG DI REKRUTMEN TENAGA DOSEN</h3>
                                    <h3 class="text-center" style="margin-top: 10px">UNIVERSITAS DIPONEGORO</h3>
                                    <?php
                                        $level = $this->session->userdata('level');
                                    ?>
                                    <?php
                                        if($level == 1 or $level == 4){
                                    ?>
                                    <div class="col text-center" style="margin-top:5px;">
                                        <a href="<?= base_url('pelamar') ?>" class=""><button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button></a>
                                        <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Pelamar</p>
                                    </div>
                                    <?php
                                        }else if($this->session->userdata('level') == 2){
                                    ?>
                                    <div class="col text-center" style="margin-top:5px;">
                                        <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><a href="<?= base_url('pelamar') ?>" class=""><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button></a>
                                        <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Pelamar</p>
                                    </div>
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar == '' and $date < $datetutup){ ?>
									<div class="col text-center" style="margin-top:5px;">
										<a href="<?= site_url('identitas') ?>"><button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
										<p class="animated bounceInDown col text-center" style="font-size: 18px;margin-top: 10px;color: black;">Pendaftaran</p>
									</div>
									<!-- pendaftaran berkas telah ditutup -->
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar == '' and $date > $datetutup){ ?>
									<div class="col text-center" style="margin-top:5px;">
										<button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #FF0000;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
										<p class="animated bounceInDown col text-center" style="font-size: 18px;margin-top: 10px;">Pendaftaran ditutup</p>
									</div>
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar != '' and $date < $datetutup and $date < $dateumumadministrasi){ ?>
									<div class="col text-center" style="margin-top:5px;">
										<button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Proses Verifikasi</p>
									</div>
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar != '' and $date > $datetutup and $date < $dateumumadministrasi){ ?>
									<div class="col text-center" style="margin-top:5px;">
										<button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Proses Verifikasi</p>
									</div>
									<!-- Lolos administrasi setelah tanggal pengumuman -->
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar == 1 and $date >= $dateumumadministrasi and $date < $dateskdskb){ ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                                    <script type="text/javascript">
                                        swal(
                                          'Selamat Anda Lolos Tahap Seleksi Administrasi, Silahkan download kartu ujian pada menu resume',
                                          'Pantau laman kepegawaian.undip.ac.id untuk jadwal tes berikutnya',
                                         'success'
                                        )
                                    </script>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Lolos Tahap Berikutnya</p>
                                        </div>
                                    </div>
                                    <!-- Lolos SKD SKB setelah tanggal pengumuman -->
                                <?php }else if($this->session->userdata('level') == 3 and $lolostahaptiga == 4 and $date >= $dateumumadministrasi and $date >= $dateskdskb and $date < $datefinal){ ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                                    <script type="text/javascript">
                                        swal(
                                          'Selamat Anda Lolos Tahap SKD dan SKB',
                                          'Pantau laman kepegawaian.undip.ac.id untuk jadwal tes berikutnya',
                                         'success'
                                        )
                                    </script>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Lolos Tahap Berikutnya</p>
                                        </div>
                                    </div>
                                    <!-- Lolos FINAL setelah tanggal pengumuman -->
                                <?php }else if($this->session->userdata('level') == 3 and $lolosfinal == 6 and $date >= $dateumumadministrasi and $date >= $dateskdskb and $date >= $datefinal){ ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                                    <script type="text/javascript">
                                        swal(
                                          'Selamat Anda diterima sebagai calon dosen tetap Universitas Diponegoro Tahun <?= date("Y"); ?>',
                                          'Pantau laman kepegawaian.undip.ac.id untuk pengumuman selanjutnya',
                                         'success'
                                        )
                                    </script>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Lolos Tahap Berikutnya</p>
                                        </div>
                                    </div>
                                   	<!-- Lolos administrasi sebelum tanggal pengumuman -->
                                    <?php }else if($this->session->userdata('level') == 3 and $statuspelamar == 1 and $date < $dateumumadministrasi){ ?>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Proses Verifikasi</p>
                                        </div>
                                    </div>
                                    <!-- tidak lolos administrasi setelah tanggal pengumuman -->
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar == 2 and $date >= $dateumumadministrasi and $date < $dateskdskb){ ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                                    <script type="text/javascript">
                                        swal(
                                          'Maaf Anda Tidak Lolos',
                                          'Terima kasih atas partisipasi Saudara dalam proses rekrutmen Tenaga Dosen PU Non ASN Universitas Diponegoro Tahun <?= date("Y"); ?>',
                                          'error'
                                        )
                                    </script>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #FF0000;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
										<p class="animated bounceInDown col text-center" style="font-size: 18px;margin-top: 10px;">Tidak Lolos</p>
                                        </div>
                                    </div>
                                    <!-- tidak lolos skd skb setelah tanggal pengumuman -->
                                    <?php }else if($this->session->userdata('level') == 3 and $lolostahaptiga == 5 and $date >= $dateumumadministrasi and $date >= $dateskdskb and $date < $datefinal){ ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                                    <script type="text/javascript">
                                        swal(
                                          'Maaf Anda Tidak Lolos Tahap SKD SKB',
                                          'Terima kasih atas partisipasi Saudara dalam proses rekrutmen Tenaga Dosen PU Non ASN Universitas Diponegoro Tahun <?= date("Y"); ?>',
                                          'error'
                                        )
                                    </script>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;"></p>
                                        </div>
                                    </div>
                                    <!-- tidak lolos final setelah tanggal pengumuman -->
                                    <?php }else if($this->session->userdata('level') == 3 and $lolosfinal == 7 and $date >= $dateumumadministrasi and $date > $dateskdskb and $date >= $datefinal){ ?>

                                    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
                                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
                                    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
                                    <script type="text/javascript">
                                        swal(
                                          'Maaf Anda Tidak Lolos Seleksi Akhir',
                                          'Terima kasih atas partisipasi Saudara dalam proses rekrutmen Tenaga Dosen PU Non ASN Universitas Diponegoro Tahun <?= date("Y"); ?>',
                                          'error'
                                        )
                                    </script>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;"></p>
                                        </div>
                                    </div>
                                    <!-- tidak lolos administrasi sebelum tanggal pengumuman -->
									<?php }else if($this->session->userdata('level') == 3 and $statuspelamar == 2 and $date < $dateumumadministrasi){ ?>
                                    <div class="user-btm-box" style="margin-top: 10px">
                                        <div class="col text-center" style="margin-top:5px;">
                                            <button type="button" class="btn btn-default btn-circle btn-xl" style="width: 115px;height: 115px;border-radius: 57px;font-size: 50px;background-color: #00FF7F;"><i class="fa fa-pencil-square-o text-white" style="margin-left: 7px"></i></button>
                                            <p class="col text-center" style="font-size: 18px;margin-top: 15px;">Proses Verifikasi</p>
                                        </div>
                                    </div>
                                    <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    if($level == 1 or $level == 2){
                ?>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <div class="row row-in">
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-success"><i class="ti-check"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?= $terima ?>
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Pelamar Disetujui Administrasi</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">100% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-info"><i class=" ti-reload"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?= $proses ?>
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Proses Verifikasi</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%"> 
                                                    <span class="sr-only">100% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-danger"><i class=" ti-close"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?= $tolak ?>
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Pelamar Ditolak Administrasi</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">100% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-lg-3 col-sm-6 row-in-br">
                                    <ul class="col-in">
                                        <li>
                                            <span class="circle circle-md bg-warning"><i class=" ti-thumb-up"></i></span>
                                        </li>
                                        <li class="col-last">
                                            <h3 class="counter text-right m-t-15">
                                                <?= $akuntrdftr?>
                                            </h3>
                                        </li>
                                        <li class="col-middle">
                                            <h4>Akun Terdaftar</h4>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                                    <span class="sr-only">100% Complete (success)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                 <div class= "row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h2 class="box-title m-b-0">Data Pelamar per Formasi</h2>
                            <p class="text-muted m-b-30"></p>
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <tr>
                                        <td><h4><b>Total Pelamar</b></h4></td>
                                        <td class="text-center"><h4><b><?= $total?></b></h4></td>
                                        <td></td><td></td><td></td><td></td>
                                    </tr>
                                </table>
                                <table id="tabell-pelamar" class="table table-striped">
                                    <thead>
                                        <tr>
											<th>No</th>
                                            <th>Kode Formasi</th>
                                            <th width="20%">Nama Formasi</th>
                                            <th width="15%">Syarat Pendidikan Awal</th>
											<th width="15%">Syarat Pendidikan Akhir</th>
                                            <th>Jumlah Kebutuhan</th>
                                            <th>Jumlah Pelamar</th>
                                            <th>Jumlah Pelamar Lolos Administrasi</th>
                                            <th>Jumlah Pelamar Tidak Lolos Administrasi</th>
                                            <th>Belum Verifikasi</th>
                                            <th>Penempatan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
											<?php
												$no = 0;
												foreach ($sorting->result() as $row) {
													$no++;
											?>
											<td><?= $no ?></td>
                                            <td><?= $row->kode_kualifikasi?></td>
                                            <td><?= $row->nm_kualifikasi?>&nbsp;(<?= $row->penempatan?>)</td>
                                            <td><?= $row->syarat_pend_awal?></td>
                                            <td><?= $row->syarat_pend_akhir?></td>
                                            <td><?= $row->jml_kebutuhan?></td>
                                            <td><?= $row->disetuju + $row->ditolak +  $row->diproses?></td>
                                            <td><b style="color:green"><?= $row->disetuju?></b></td>
                                            <td><b style="color:red"><?= $row->ditolak?></b></td>
                                            <td><b style="color:gray"><?= $row->diproses?></td>
                                            <td><?= $row->penempatan?></td>
                                        </tr>
											<?php
												}
											?>
                                    </tbody>
                                </table>
                                <table class="table table-striped">
                                    <tr>
                                        <td><h4><b>Total Pelamar</b></h4></td>
                                        <td class="text-center"><h4><b><?= $total?></b></h4></td>
                                        <td></td><td></td><td></td><td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                 </div>

                <?php }?>

                
                <!--row -->
                <!-- /.row -->
                
                <!-- ============================================================== -->
                <!-- end right sidebar -->
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
    <?php $this->load->view('scripts'); ?>
</body>
<script>
    $(document).ready(function() {
        $('#tabell-pelamar').dataTable({
            "bPaginate": false,
            "bLengthChange": false,
            "bFilter": true,
            "bInfo": false,
            "stateSave": false,
            "bAutoWidth": false 
        });
    });
</script>
</html>
