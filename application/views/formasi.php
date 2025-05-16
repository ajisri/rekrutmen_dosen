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
                    if ($date <= $datetutup) {
                        ?>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="white-box">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3 class="box-title">
                                                B. Formasi dan Pendidikan
                                            </h3>
                                        </div> 
                                    </div>
                                    <?php
                                    $datee = date("Y-m-d");
                                    if ($datee >= $datebuka and $datee <= $datetutup) {
                                        ?>
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="white-box">
                                                    <form id="add-formasi" action="#" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                        <div id="formasi">
                                                            <div class="form-group m-b-10">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Pilih Formasi:</label>
                                                                    <select id="namaFormasi" class="form-control select2" name="kualifikasi" onChange="namaFormasiHandler()">
                                                                        <?php
                                                                        if (isset($tabelpelamar->id_kualifikasi)) {
                                                                            ?>
                                                                            <option value="<?= $tabelpelamar->id_kualifikasi ?>"><?= $formasinyapelamar->nm_kualifikasi ?> &nbsp;(<?= $formasinyapelamar->kode_kualifikasi ?>)&nbsp;(<?= $formasinyapelamar->penempatan ?>)&nbsp;(<?= $formasinyapelamar->unit_kerja ?>)&nbsp;(<?= $formasinyapelamar->keterangan ?>)&nbsp;(<?= $formasinyapelamar->lokasi ?>)</option>
                                                                            <?php
                                                                            foreach ($datapilihanformasi as $get) {
                                                                                ?>
                                                                                <option value="<?= $get->id_kualifikasi ?>"><?= $get->nm_kualifikasi ?> &nbsp;(<?= $get->kode_kualifikasi ?>) &nbsp;(<?= $get->penempatan ?>)&nbsp;(<?= $get->unit_kerja ?>)<?php if ($get->keterangan == 'null') { ?>&nbsp;(<?= $get->lokasi; ?>)<?php } else { ?>&nbsp;(<?= $get->keterangan ?>)&nbsp;(<?=
                                                                                        $get->lokasi;
                                                                                    }
                                                                                    ?>)</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <option value="0" selected="" >Pilih Formasi</option>
                                                                            <?php foreach ($tabel->result() as $row) { ?>
                                                                                <option  value="<?= $row->id_kualifikasi ?>"> <?= $row->nm_kualifikasi ?> &nbsp;(<?= $row->kode_kualifikasi ?>) &nbsp;(<?= $row->penempatan ?>)&nbsp;(<?= $row->unit_kerja ?>)<?php if ($row->keterangan == 'null') { ?>&nbsp;(<?= $row->lokasi; ?>)<?php } else { ?>&nbsp;(<?= $row->keterangan ?>)&nbsp;(<?=
                                                                                        $row->lokasi;
                                                                                    }
                                                                                    ?>)</option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-10">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Pendidikan yang digunakan untuk melamar:</label><br />
                                                                    <select id="pendidikanterakhir" onChange="pendidikanTerakhirHandler()" class="form-control select2" name="pendidikan_terakhir">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->pendidikan_terakhir)) {
                                                                            ?>
                                                                            <option value="<?= $pilihanpendidikanterakhir->id ?>"> <?= $pilihanpendidikanterakhir->jenjang ?> </option>
                                                                            <?php
                                                                            foreach ($datajenjang as $rowjenjang) {
                                                                                ?>
                                                                                <option value="<?= $rowjenjang->id ?>"> <?= $rowjenjang->jenjang ?> </option>
                                                                                <?php
                                                                            }
                                                                            ?>

                                                                            <?php
                                                                            if ($jenjangpelamar->jenjang == '3' and $tabelpelamar->asal_sekolah3 == 'Luar Negeri') {
                                                                                ?>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                <script>
                                                                                $(document).ready(function () {
                                                                                    $("#pendidikan3").show();
                                                                                    $("#asalpendidikan3").show();
                                                                                    $("#nm_pt3").show();
                                                                                    $("#nomor_penyetaraan3").show();
                                                                                    $("#akreditasi-kampusss").hide();
                                                                                    $("#jurusan3").show();
                                                                                    $("#akreditasi-prodiii").hide();
                                                                                    $("#ipk3").show();
                                                                                    $("#thn_lulus3").show();
                                                                                    $("#disertasi3").show();
                                                                                });
                                                                                </script>
                                                                                <?php
                                                                            } else if ($jenjangpelamar->jenjang == '3' and $tabelpelamar->asal_sekolah3 == 'Dalam Negeri') {
                                                                                ?>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                <script>
                                                                                $(document).ready(function () {
                                                                                    $("#pendidikan3").show();
                                                                                    $("#asalpendidikan3").show();
                                                                                    $("#nm_pt3").show();
                                                                                    $("#nomor_penyetaraan3").hide();
                                                                                    $("#akreditasi-kampusss").show();
                                                                                    $("#jurusan3").show();
                                                                                    $("#akreditasi-prodiii").show();
                                                                                    $("#ipk3").show();
                                                                                    $("#thn_lulus3").show();
                                                                                    $("#disertasi3").show();
                                                                                });
                                                                                </script>
                                                                                <?php
                                                                            } else if ($jenjangpelamar->jenjang != '3') {
                                                                                ?>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                <script>
                                                                                $(document).ready(function () {
                                                                                    $("#pendidikan3").hide();
                                                                                    $("#asalpendidikan3").hide();
                                                                                    $("#nm_pt3").hide();
                                                                                    $("#nomor_penyetaraan3").hide();
                                                                                    $("#akreditasi-kampusss").hide();
                                                                                    $("#jurusan3").hide();
                                                                                    $("#akreditasi-prodiii").hide();
                                                                                    $("#ipk3").hide();
                                                                                    $("#thn_lulus3").hide();
                                                                                    $("#disertasi3").hide();
                                                                                });
                                                                                </script>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <option value="">Pilih Pendidikan Terakhir</option>
                                                                            <?php foreach ($tabelijazah->result() as $row) { ?>
                                                                                <option  value="<?= $row->id ?>"> <?= $row->jenjang ?></option>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </select>
                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
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
                                                                                $("#nomor_penyetaraan3").hide();
                                                                                $("#akreditasi-kampusss").show();
                                                                                $("#jurusan3").show();
                                                                                $("#akreditasi-prodiii").show();
                                                                                $("#ipk3").show();
                                                                                $("#thn_lulus3").show();
                                                                                $("#disertasi3").show();
                                                                            } else if (document.getElementById("pendidikanterakhir").value == "10") {
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
                                                                                $("#nomor_penyetaraan3").hide();
                                                                                $("#jurusan3").show();
                                                                                $("#akreditasi-prodiii").show();
                                                                                $("#ipk3").show();
                                                                                $("#thn_lulus3").show();
                                                                                $("#disertasi3").show();
                                                                            } else if (document.getElementById("pendidikanterakhir").value == "11") {
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
                                                                                $("#nomor_penyetaraan3").hide();
                                                                                $("#jurusan3").show();
                                                                                $("#akreditasi-prodiii").show();
                                                                                $("#ipk3").show();
                                                                                $("#thn_lulus3").show();
                                                                                $("#disertasi3").show();
                                                                            } else {
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
                                                                                $("#nomor_penyetaraan3").hide();
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
                                                                    // function namaFormasiHandler() {
                                                                    // if ( document.getElementById("namaFormasi").value != "16") {
                                                                    // document.getElementById("pendidikan_profesi").required = false;
                                                                    // document.getElementById("asalpendidikan_profesi").required = false;
                                                                    // document.getElementById("namapt_profesi").required = false;
                                                                    // document.getElementById("ps_profesi").required = false;
                                                                    // document.getElementById("ipk_profesi").required = false;
                                                                    // document.getElementById("thnlulus_profesi").required = false;
                                                                    // document.getElementById("skripsi1_profesi").required = false;
                                                                    // document.getElementById("select-akreditasi-prodi1").required = false;
                                                                    // document.getElementById("select-akreditasi-kampus1").required = false;
                                                                    // // document.getElementById("ijazah1").required = false;
                                                                    // $("#pendidikan_profesi").hide();
                                                                    // $("#asalpendidikan_profesi").hide();
                                                                    // $("#nm_kampus3").hide();
                                                                    // $("#jurusan3").hide();
                                                                    // $("#ipk3").hide();
                                                                    // $("#thnlulus3").hide();
                                                                    // $("#skripsi1_profesi").hide();
                                                                    // $("#akreditasi-kampus1").hide();
                                                                    // $("#akreditasi-prodi1").hide();
                                                                    // $("#ijazah1").hide();
                                                                    // $("#transkrip1").hide();
                                                                    // $("#akreditasipt1").hide();
                                                                    // $("#akreditasips1").hide();
                                                                    // $("#nomor_penyetaraan1").hide();
                                                                    // } else {
                                                                    // document.getElementById("pendidikan_profesi").required = true;
                                                                    // document.getElementById("asalpendidikan_profesi").required = true;
                                                                    // document.getElementById("namapt_profesi").required = true;
                                                                    // document.getElementById("ps_profesi").required = true;
                                                                    // document.getElementById("ipk_profesi").required = true;
                                                                    // document.getElementById("thnlulus_profesi").required = true;
                                                                    // document.getElementById("skripsi1_profesi").required = true;
                                                                    // document.getElementById("select-akreditasi-kampus1").required = true;
                                                                    // document.getElementById("select-akreditasi-prodi1").required = true;
                                                                    // // document.getElementById("ijazah1").required = true;
                                                                    // $("#pendidikan3").show();
                                                                    // $("#asalpendidikan3").show();
                                                                    // $("#namapt_profesi").show();
                                                                    // $("#ps_profesi").show();
                                                                    // $("#ipk_profesi").show();
                                                                    // $("#thnlulus_profesi").show();
                                                                    // $("#skripsi1_profesi").show();
                                                                    // $("#akreditasi-kampus1").show();
                                                                    // $("#akreditasi-prodi1").show();
                                                                    // $("#ijazah1").show();
                                                                    // $("#transkrip1").show();
                                                                    // $("#akreditasipt1").show();
                                                                    // $("#akreditasips1").show();
                                                                    // $("#nomor_penyetaraan1").show();
                                                                    // }
                                                                    // }
                                                                </script> 
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-6 m-b-5">
                                                                    <label class="control-label">Riwayat Pendidikan:</label><br/>
                                                                    <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                    <div class="">
                                                                        <select class="form-control select2" name="pendidikan">
                                                                            <?php
                                                                            if (isset($tabelpelamar->pendidikan)) {
                                                                                ?>
                                                                                <option value="<?= $tabelpelamar->pendidikan ?>" selected=""><?= $tabelpelamar->pendidikan ?></option>
                                                                                <?php
                                                                                if ($tabelpelamar->pendidikan == "D4") {
                                                                                    ?>
                                                                                    <option value="S1">S1</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->pendidikan == "S1") {
                                                                                    ?>
                                                                                    <option value="D4">D4</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <option value="0" selected="">Pilih</option>
                                                                                <option value="D4">D4</option>
                                                                                <option value="S1">S1</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 m-b-5">
                                                                    <label class="control-label">Asal Pendidikan Sarjana:</label><br />
                                                                    <label class="control-label">(Dalam Negeri / Luar Negeri)</label>
                                                                    <select id="select-asal-pendidikan" onChange="asalPendidikanHandler()" type="text" class="form-control select2" name="asal_sekolah">
                                                                        <?php
                                                                        if (isset($tabelpelamar->asal_sekolah)) {
                                                                            ?>
                                                                            <option value="<?= $tabelpelamar->asal_sekolah ?>" selected><?= $tabelpelamar->asal_sekolah ?></option>
                                                                            <?php
                                                                            if ($tabelpelamar->asal_sekolah == "Dalam Negeri") {
                                                                                ?>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                <script>
                                                                                $(document).ready(function () {
                                                                                    $(".nomor_penyetaraan").hide();
                                                                                    $(".akreditasi-kampus").show();
                                                                                    $(".akreditasi-prodi").show();
                                                                                    $(".ipk").show();
                                                                                });
                                                                                </script>
                                                                                <option value="Luar Negeri">Luar Negeri</option>
                                                                                <?php
                                                                            } else if ($tabelpelamar->asal_sekolah == "Luar Negeri") {
                                                                                ?>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                <script>
                                                                                $(document).ready(function () {
                                                                                    $(".nomor_penyetaraan").show();
                                                                                    $(".akreditasi-kampus").hide();
                                                                                    $(".akreditasi-prodi").hide();
                                                                                    // $(".ipk").hide();
                                                                                });
                                                                                </script>
                                                                                <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                            <script>
                                                                            $(document).ready(function () {
                                                                                $(".nomor_penyetaraan").hide();
                                                                            });
                                                                            </script>
                                                                            <option value="0" selected="">Pilih</option>
                                                                            <option value="Dalam Negeri">Dalam Negeri</option>
                                                                            <option value="Luar Negeri">Luar Negeri</option>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                    <script>
                                                                        function asalPendidikanHandler() {
                                                                            if (document.getElementById("select-asal-pendidikan").value == "Luar Negeri") {
                                                                                document.getElementById("select-akreditasi-kampus").required = false;
                                                                                document.getElementById("select-akreditasi-prodi").required = false;
                                                                                // document.getElementById("form-group akreditasi-kampus").style.visibility = "hidden";
                                                                                // document.getElementById("form-group akreditasi-prodi").style.visibility = "hidden";
                                                                                $("#akreditasi-kampus").hide();
                                                                                $("#akreditasi-prodi").hide();
                                                                                $("#akreditasipt").hide();
                                                                                $("#akreditasips").hide();
                                                                                // $("#ipk").hide();
                                                                                $("#nomor_penyetaraan").show();
                                                                                // document.getElementById("akreditasipt").style.visibility = "hidden";
                                                                                // document.getElementById("akreditasips").style.visibility = "hidden";
                                                                                // document.getElementById("penyetaraan").style.visibility = "visible";
                                                                            } else if (document.getElementById("select-asal-pendidikan").value == "Dalam Negeri") {
                                                                                document.getElementById("select-akreditasi-kampus").required = true;
                                                                                document.getElementById("select-akreditasi-prodi").required = true;
                                                                                // document.getElementById("form-group akreditasi-kampus").style.visibility = "visible";
                                                                                // document.getElementById("form-group akreditasi-prodi").style.visibility = "visible";
                                                                                $("#akreditasi-kampus").show();
                                                                                $("#akreditasi-prodi").show();
                                                                                $("#akreditasipt").show();
                                                                                $("#akreditasips").show();
                                                                                $("#ipk").show();
                                                                                $("#nomor_penyetaraan").hide();
                                                                                // document.getElementById("akreditasipt").style.visibility = "visible";
                                                                                // document.getElementById("akreditasips").style.visibility = "visible";
                                                                                // document.getElementById("penyetaraan").style.visibility = "hidden";
                                                                            } else if (document.getElementById("select-asal-pendidikan").value == "0") {
                                                                                $(".nomor_penyetaraan").hide();
                                                                            }
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Nama PT :</label><br />
                                                                    <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabelpelamar->nm_kampus)) {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="nm_kampus" value="<?= $tabelpelamar->nm_kampus ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="nm_kampus" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div id="nomor_penyetaraan" class="nomor_penyetaraan">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Nomor Penyetaraan :</label><br />
                                                                        <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (isset($tabelpelamar->nomor_penyetaraan)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan" value="<?= $tabelpelamar->nomor_penyetaraan ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-kampus" class="akreditasi-kampus">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi PT</label><br />
                                                                        <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-kampus" class="col-xs-3 form-control select2" name="akreditasi_kampus">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_kampus)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_kampus == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus ?></option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_kampus == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus ?></option>
                                                                                        <option value="A">A</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A</option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Program Studi:</label><br />
                                                                    <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabelpelamar->prodi)) {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="jurusan" value="<?= $tabelpelamar->prodi ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="jurusan" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-prodi" class="akreditasi-prodi">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi Program Studi</label><br />
                                                                        <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-prodi" class="col-xs-3 form-control select2" name="akreditasi_jurusan">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_prodi)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_prodi == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi ?></option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_prodi == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi ?></option>
                                                                                        <option value="A">A</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A</option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div id="ipk" class="ipk">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">IPK:(Khusus Lulusan Luar Negeri, Jika tidak ada IPK maka abaikan)</label><br />
                                                                        <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (isset($tabelpelamar->ipk)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="ipk" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" value="<?= $tabelpelamar->ipk ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="ipk" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" placeholder="contoh: 3.00 (gunakan titik)"/>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tahun Lulus:</label><br />
                                                                    <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabelpelamar->thn_lulus)) {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="thn_lulus" value="<?= $tabelpelamar->thn_lulus ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="thn_lulus" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Judul Skripsi:</label><br />
                                                                    <label class="control-label">(Sarjana / Sarjana Terapan)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabelpelamar->skripsi)) {
                                                                            ?>
                                                                            <textarea class="form-control" name="skripsi" /><?= $tabelpelamar->skripsi ?></textarea>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <textarea class="form-control" name="skripsi" /></textarea>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-6">
                                                                    <label class="col-sm-5 control-label">Pendidikan Profesi:</label>
                                                                    <div class="col-sm-3">
                                                                        <select id="pendidikanprofesi" onChange="pendidikanProfesiHandler()" type="text" class="form-control select2" name="pend_profesi">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->pend_profesi)) {
                                                                                ?>
                                                                                <option value="<?= $tabelpelamar->pend_profesi ?>" selected><?= $tabelpelamar->pend_profesi ?></option>
                                                                                <?php
                                                                                if ($tabelpelamar->pend_profesi == "Ya") {
                                                                                    ?>
                                                                                    <option value="Tidak">Tidak</option>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".a").show();
                                                                                    });
                                                                                    </script>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->pend_profesi == "Tidak") {
                                                                                    ?>
                                                                                    <option value="Ya">Ya</option>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".a").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".a").hide();
                                                                                    });
                                                                                </script>
                                                                                <option value="0" selected="">Pilih</option>
                                                                                <option value="Ya">Ya</option>
                                                                                <option value="Tidak">Tidak</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                    <script>
                                                                        function pendidikanProfesiHandler() {
                                                                            if (document.getElementById("pendidikanprofesi").value == "Tidak") {
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
                                                                                $("#nomor_penyetaraan1").hide();
                                                                                $("#ipk_profesi").hide();
                                                                                $("#thnlulus_profesi").hide();
                                                                                $("#skripsi1_profesi").hide();
                                                                            } else if (document.getElementById("pendidikanprofesi").value == "Ya") {
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
                                                                                $("#nomor_penyetaraan1").hide();
                                                                                $("#ipk_profesi").show();
                                                                                $("#thnlulus_profesi").show();
                                                                                $("#skripsi1_profesi").show();
                                                                            } else {
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
                                                                                $("#nomor_penyetaraan1").hide();
                                                                                $("#ipk_profesi").hide();
                                                                                $("#thnlulus_profesi").hide();
                                                                                $("#skripsi1_profesi").hide();
                                                                            }
                                                                        }
                                                                    </script>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div id="pendidikan_profesi" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Pendidikan:</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <select type="text" class="form-control select2" name="pendidikan1">
                                                                                <?php
                                                                                if (!empty($tabelpelamar->pendidikan1)) {
                                                                                    ?>
                                                                                    <option value="S1 Profesi">S1 Profesi</option>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="" >Pilih</option>
                                                                                    <option value="S1 Profesi">S1 Profesi</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="asalpendidikan_profesi" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Asal Pendidikan:</label><br />
                                                                        <label class="control-label">(Dalam Negeri / Luar Negeri)</label>
                                                                        <div class="">
                                                                            <select id="select-asal-pendidikan1" onChange="asalPendidikan1Handler()" type="text" class="form-control select2" name="asal_sekolah1">
                                                                                <?php
                                                                                if (!empty($tabelpelamar->asal_sekolah1)) {
                                                                                    ?>
                                                                                    <option value="<?= $tabelpelamar->asal_sekolah1 ?>" selected><?= $tabelpelamar->asal_sekolah1 ?></option>
                                                                                    <?php
                                                                                    if ($tabelpelamar->asal_sekolah1 == "Dalam Negeri") {
                                                                                        ?>
                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                        <script>
                                                                                        $(document).ready(function () {
                                                                                            $("#nomor_penyetaraan1").hide();
                                                                                            $("#akreditasi-kampus1").show();
                                                                                            $("#akreditasi-prodi1").show();
                                                                                            $("#ipk_profesi").show();
                                                                                        });
                                                                                        </script>
                                                                                        <option value="Luar Negeri">Luar Negeri</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->asal_sekolah1 == "Luar Negeri") {
                                                                                        ?>
                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                        <script>
                                                                                        $(document).ready(function () {
                                                                                            $("#nomor_penyetaraan1").show();
                                                                                            $("#akreditasi-kampus1").hide();
                                                                                            $("#akreditasi-prodi1").hide();
                                                                                            // $("#ipk_profesi").hide();
                                                                                        });
                                                                                        </script>
                                                                                        <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <script>
                                                                                function asalPendidikan1Handler() {
                                                                                    if (document.getElementById("select-asal-pendidikan1").value == "Luar Negeri") {
                                                                                        document.getElementById("select-akreditasi-kampus1").required = false;
                                                                                        document.getElementById("select-akreditasi-prodi1").required = false;
                                                                                        // document.getElementById("form-group akreditasi-kampus").style.visibility = "hidden";
                                                                                        // document.getElementById("form-group akreditasi-prodi").style.visibility = "hidden";
                                                                                        $("#akreditasi-kampus1").hide();
                                                                                        $("#akreditasi-prodi1").hide();
                                                                                        $("#akreditasipt1").hide();
                                                                                        $("#akreditasips1").hide();
                                                                                        // $("#ipk_profesi").hide();
                                                                                        $("#nomor_penyetaraan1").show();
                                                                                        // document.getElementById("akreditasipt").style.visibility = "hidden";
                                                                                        // document.getElementById("akreditasips").style.visibility = "hidden";
                                                                                        // document.getElementById("penyetaraan").style.visibility = "visible";
                                                                                    } else if (document.getElementById("select-asal-pendidikan1").value == "Dalam Negeri") {
                                                                                        document.getElementById("select-akreditasi-kampus1").required = true;
                                                                                        document.getElementById("select-akreditasi-prodi1").required = true;
                                                                                        // document.getElementById("form-group akreditasi-kampus").style.visibility = "visible";
                                                                                        // document.getElementById("form-group akreditasi-prodi").style.visibility = "visible";
                                                                                        $("#akreditasi-kampus1").show();
                                                                                        $("#akreditasi-prodi1").show();
                                                                                        $("#akreditasipt1").show();
                                                                                        $("#akreditasips1").show();
                                                                                        $("#ipk_profesi").show();
                                                                                        $("#nomor_penyetaraan1").hide();
                                                                                        // document.getElementById("akreditasipt").style.visibility = "visible";
                                                                                        // document.getElementById("akreditasips").style.visibility = "visible";
                                                                                        // document.getElementById("penyetaraan").style.visibility = "hidden";
                                                                                    } else {
                                                                                        $("#nomor_penyetaraan1").hide();
                                                                                    }
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div id="namapt_profesi" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Nama PT :</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->nm_kampus1)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nm_kampus1" value="<?= $tabelpelamar->nm_kampus1 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nm_kampus1" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="nomor_penyetaraan1" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Nomor Penyetaraan</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->nomor_penyetaraan1)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan1" value="<?= $tabelpelamar->nomor_penyetaraan1 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan1" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-kampus1" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi PT</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-kampus1" type="text" class="col-xs-3 form-control select2" name="akreditasi_kampus1">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_kampus1)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_kampus1 == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus1 ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus1 ?></option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_kampus1 == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus1 ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus ?></option>
                                                                                        <option value="A">A</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A</option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div id="ps_profesi" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Program Studi:</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->prodi1)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="jurusan1" value="<?= $tabelpelamar->prodi1 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="jurusan1" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-prodi1" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi Program Studi</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-prodi1" type="text" class="col-xs-3 form-control select2" name="akreditasi_jurusan1">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_prodi1)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_prodi1 == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi1 ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi1 ?></option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_prodi1 == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi1 ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi1 ?></option>
                                                                                        <option value="A">A</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A</option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div id="ipk_profesi" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">IPK:(Khusus Lulusan Luar Negeri, Jika tidak ada IPK maka abaikan)</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->ipk1)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" name="ipk1" value="<?= $tabelpelamar->ipk1 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" name="ipk1" placeholder="contoh: 3.25 (gunakan titik)"/>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="thnlulus_profesi" class="a">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Tahun Lulus:</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->thn_lulus1)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="thn_lulus1" value="<?= $tabelpelamar->thn_lulus1 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>	
                                                                                <input type="text" class="col-xs-3 form-control" name="thn_lulus1" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div id="skripsi1_profesi" class="a">
                                                                    <div class="col-md-12">
                                                                        <label class="control-label">Judul Tugas Akhir:</label><br />
                                                                        <label class="control-label">(Sarjana Profesi)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->skripsi1)) {
                                                                                ?>
                                                                                <textarea class="form-control" name="skripsi1" /><?= $tabelpelamar->skripsi1 ?></textarea>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <textarea class="form-control" name="skripsi1" /></textarea>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Pendidikan:</label><br />
                                                                    <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                    <div class="">
                                                                        <select type="text" class="form-control select2" name="pendidikan2">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->pendidikan2)) {
                                                                                ?>
                                                                                <option value="<?= $tabelpelamar->pendidikan2 ?>" selected=""><?= $tabelpelamar->pendidikan2 ?></option>
                                                                                <?php
                                                                                if ($tabelpelamar->pendidikan2 == "S2") {
                                                                                    ?>
                                                                                    <option value="S2 Terapan">S2 Terapan</option>
                                                                                    <option value="SP-1">SP-1</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->pendidikan2 == "S2 Terapan") {
                                                                                    ?>
                                                                                    <option value="S2">S2</option>
                                                                                    <option value="SP-1">SP-1</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->pendidikan2 == "SP-1") {
                                                                                    ?>
                                                                                    <option value="S2">S2</option>
                                                                                    <option value="S2 Terapan">S2 Terapan</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <option value="0" selected="">Pilih</option>
                                                                                <option value="S2">S2</option>
                                                                                <option value="S2 Terapan">S2 Terapan</option>
                                                                                <option value="SP-1">SP-1</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Asal Pendidikan:</label><br />
                                                                    <label class="control-label">(Dalam Negeri / Luar Negeri)</label>
                                                                    <div class="">
                                                                        <select id="select-asal-pendidikann" onChange="asalPendidikannHandler()" type="text" class="form-control select2" name="asal_sekolah2">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->asal_sekolah2)) {
                                                                                ?>
                                                                                <option value="<?= $tabelpelamar->asal_sekolah2 ?>" selected><?= $tabelpelamar->asal_sekolah2 ?></option>
                                                                                <?php
                                                                                if ($tabelpelamar->asal_sekolah2 == "Dalam Negeri") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $("#nomor_penyetaraan2").hide();
                                                                                        $("#akreditasi-kampuss").show();
                                                                                        $("#akreditasi-prodii").show();
                                                                                        $("#ipk2").show();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->asal_sekolah2 == "Luar Negeri") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $("#nomor_penyetaraan2").show();
                                                                                        $("#akreditasi-kampuss").hide();
                                                                                        $("#akreditasi-prodii").hide();
                                                                                        // $("#ipk2").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                <script>
                                                                                $(document).ready(function () {
                                                                                    $("#nomor_penyetaraan2").hide();
                                                                                });
                                                                                </script>
                                                                                <option value="0" selected="">Pilih</option>
                                                                                <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                <option value="Luar Negeri">Luar Negeri</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <script>
                                                                            function asalPendidikannHandler() {
                                                                                if (document.getElementById("select-asal-pendidikann").value == "Luar Negeri") {
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
                                                                                    // $("#ipk2").hide();
                                                                                    $("#nomor_penyetaraan2").show();
                                                                                    // document.getElementById("akreditasipt2").style.visibility = "hidden";
                                                                                    // document.getElementById("akreditasips2").style.visibility = "hidden";
                                                                                    // document.getElementById("penyetaraan2").style.visibility = "visible";
                                                                                } else if (document.getElementById("select-asal-pendidikann").value == "Dalam Negeri") {
                                                                                    document.getElementById("select-akreditasi-kampuss").required = true;
                                                                                    document.getElementById("select-akreditasi-prodii").required = true;
                                                                                    // document.getElementById("form-group akreditasi-kampuss").style.visibility = "visible";
                                                                                    // document.getElementById("form-group akreditasi-prodii").style.visibility = "visible";
                                                                                    $("#akreditasi-kampuss").show();
                                                                                    $("#akreditasi-prodii").show();
                                                                                    $("#akreditasipt2").show();
                                                                                    $("#akreditasips2").show();
                                                                                    $("#ipk2").show();
                                                                                    $("#nomor_penyetaraan2").hide();
                                                                                    // document.getElementById("akreditasipt2").style.visibility = "visible";
                                                                                    // document.getElementById("akreditasips2").style.visibility = "visible";
                                                                                    // document.getElementById("penyetaraan2").style.visibility = "hidden";
                                                                                } else if (document.getElementById("select-asal-pendidikann").value == "0") {
                                                                                    $("#nomor_penyetaraan2").hide();
                                                                                }
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Nama Perguruan Tinggi:</label><br />
                                                                    <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->nm_kampus2)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="nm_kampus2" value="<?= $tabelpelamar->nm_kampus2 ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>	
                                                                            <input type="text" class="form-control" name="nm_kampus2" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div id="nomor_penyetaraan2">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Nomor Penyetaraan</label><br />
                                                                        <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->nomor_penyetaraan2)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan2" value="<?= $tabelpelamar->nomor_penyetaraan2 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan2" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-kampuss">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi Perguruan Tinggi:</label><br />
                                                                        <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-kampuss" type="text" class="form-control select2" name="akreditasi_kampus2">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_kampus2)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_kampus2 == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus2 ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus2 ?></option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_kampus2 == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus2 ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus2 ?></option>
                                                                                        <option value="A">A</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A</option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Program Studi:</label><br />
                                                                    <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->prodi2)) {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="jurusan2" value="<?= $tabelpelamar->prodi2 ?>"/>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="jurusan2" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-prodii">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi Program Studi:</label><br />
                                                                        <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-prodii" type="text" class="form-control select2" name="akreditasi_jurusan2">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_prodi2)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_prodi2 == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi2 ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi2 ?></option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_prodi2 == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi2 ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi2 ?></option>
                                                                                        <option value="A">A</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A</option>
                                                                                        <option value="B">B</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A</option>
                                                                                    <option value="B">B</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div id="ipk2" class="ipk2">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">IPK:(Khusus Lulusan Luar Negeri, Jika tidak ada IPK maka abaikan)</label><br />
                                                                        <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->ipk2)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" name="ipk2" value="<?= $tabelpelamar->ipk2 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>	
                                                                                <input type="text" class="col-xs-3 form-control" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" name="ipk2" placeholder="contoh: 3.25 (gunakan titik)"/>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tahun Lulus:</label><br />
                                                                    <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->thn_lulus2)) {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="thn_lulus2" value="<?= $tabelpelamar->thn_lulus2 ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="thn_lulus2" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Judul Tesis:</label><br />
                                                                    <label class="control-label">(Magister / Magister Terapan / Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->tesis)) {
                                                                            ?>
                                                                            <textarea class="form-control" name="tesis" /><?= $tabelpelamar->tesis ?></textarea>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <textarea class="form-control" name="tesis" /></textarea>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <hr>	
                                                            <div class="form-group m-b-5">
                                                                <div id="pendidikan3" class="pendidikan3">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Pendidikan:</label><br />
                                                                        <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                        <div class="">
                                                                            <select class="form-control select2" name="pendidikan3">
                                                                                <?php
                                                                                if (!empty($tabelpelamar->pendidikan3)) {
                                                                                    ?>
                                                                                    <option value="<?= $tabelpelamar->pendidikan3 ?>" selected=""><?= $tabelpelamar->pendidikan3 ?></option>
                                                                                    <?php
                                                                                    if ($tabelpelamar->pendidikan3 == "S3") {
                                                                                        ?>
                                                                                        <option value="S3 Terapan">S3 Terapan</option>
                                                                                        <option value="SP-2">SP-2</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->pendidikan3 == "S3 Terapan") {
                                                                                        ?>
                                                                                        <option value="S3">S3</option>
                                                                                        <option value="SP-2">SP-2</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->pendidikan3 == "SP-2") {
                                                                                        ?>
                                                                                        <option value="S3">S3</option>
                                                                                        <option value="S3 Terapan">S3 Terapan</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="S3">S3</option>
                                                                                    <option value="S3 Terapan">S3 Terapan</option>
                                                                                    <option value="SP-2">SP-2</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="asalpendidikan3">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Asal Pendidikan:</label><br />
                                                                        <label class="control-label">(Dalam Negeri / Luar Negeri)</label>
                                                                        <div class="">
                                                                            <select id="select-asal-pendidikannn" onChange="asalPendidikannnHandler()" class="form-control select2" name="asal_sekolah3">
                                                                                <?php
                                                                                if (!empty($tabelpelamar->asal_sekolah3)) {
                                                                                    ?>
                                                                                    <option value="<?= $tabelpelamar->asal_sekolah3 ?>" selected><?= $tabelpelamar->asal_sekolah3 ?></option>
                                                                                    <?php
                                                                                    if ($tabelpelamar->asal_sekolah3 == "Dalam Negeri") {
                                                                                        ?>
                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                        <script>
                                                                                        $(document).ready(function () {
                                                                                            $("#pendidikan3").show();
                                                                                            $("#asalpendidikan3").show();
                                                                                            $("#nm_pt3").show();
                                                                                            $("#nomor_penyetaraan3").hide();
                                                                                            $("#akreditasi-kampusss").show();
                                                                                            $("#jurusan3").show();
                                                                                            $("#akreditasi-prodiii").show();
                                                                                            $("#ipk3").show();
                                                                                            $("#thn_lulus3").show();
                                                                                            $("#disertasi3").show();
                                                                                        });
                                                                                        </script>
                                                                                        <option value="Luar Negeri">Luar Negeri</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->asal_sekolah3 == "Luar Negeri") {
                                                                                        ?>
                                                                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                        <script>
                                                                                        $(document).ready(function () {
                                                                                            $("#pendidikan3").show();
                                                                                            $("#asalpendidikan3").show();
                                                                                            $("#nm_pt3").show();
                                                                                            $("#nomor_penyetaraan3").show();
                                                                                            $("#akreditasi-kampusss").hide();
                                                                                            $("#jurusan3").show();
                                                                                            $("#akreditasi-prodiii").hide();
                                                                                            $("#ipk3").show();
                                                                                            $("#thn_lulus3").show();
                                                                                            $("#disertasi3").show();
                                                                                        });
                                                                                        </script>
                                                                                        <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $("#nomor_penyetaraan3").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="Dalam Negeri">Dalam Negeri</option>
                                                                                    <option value="Luar Negeri">Luar Negeri</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <script>
                                                                                function asalPendidikannnHandler() {
                                                                                    if (document.getElementById("select-asal-pendidikannn").value == "Luar Negeri") {
                                                                                        document.getElementById("select-akreditasi-kampusss").required = false;
                                                                                        document.getElementById("select-akreditasi-prodiii").required = false;
                                                                                        // document.getElementById("form-group akreditasi-kampusss").style.visibility = "hidden";
                                                                                        // document.getElementById("form-group akreditasi-prodiii").style.visibility = "hidden";
                                                                                        $("#akreditasi-kampusss").hide();
                                                                                        $("#akreditasi-prodiii").hide();
                                                                                        $("#akreditasipt3").hide();
                                                                                        $("#akreditasips3").hide();
                                                                                        $("#ipk3").show();
                                                                                        $("#nomor_penyetaraan3").show();
                                                                                        // document.getElementById("akreditasipt3").style.visibility = "hidden";
                                                                                        // document.getElementById("akreditasips3").style.visibility = "hidden";
                                                                                        // document.getElementById("penyetaraan3").style.visibility = "visible";
                                                                                    } else if (document.getElementById("select-asal-pendidikannn").value == "Dalam Negeri") {
                                                                                        document.getElementById("select-akreditasi-kampusss").required = true;
                                                                                        document.getElementById("select-akreditasi-prodiii").required = true;
                                                                                        // document.getElementById("form-group akreditasi-kampusss").style.visibility = "visible";
                                                                                        // document.getElementById("form-group akreditasi-prodiii").style.visibility = "visible";
                                                                                        $("#akreditasi-kampusss").show();
                                                                                        $("#akreditasi-prodiii").show();
                                                                                        $("#akreditasipt3").show();
                                                                                        $("#akreditasips3").show();
                                                                                        $("#ipk3").show();
                                                                                        $("#nomor_penyetaraan3").hide();
                                                                                        // document.getElementById("akreditasipt3").style.visibility = "visible";
                                                                                        // document.getElementById("akreditasips3").style.visibility = "visible";
                                                                                        // document.getElementById("penyetaraan3").style.visibility = "hidden";
                                                                                    } else {
                                                                                        $("#nomor_penyetaraan3").hide();
                                                                                    }
                                                                                }
                                                                            </script>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div id="nm_pt3">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Nama Perguruan Tinggi:</label><br />
                                                                        <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->nm_kampus3)) {
                                                                                ?>
                                                                                <input type="text" class="form-control" name="nm_kampus3" value="<?= $tabelpelamar->nm_kampus3 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="form-control" name="nm_kampus3" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="nomor_penyetaraan3">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Nomor Penyetaraan</label><br />
                                                                        <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                        <div class="">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->nomor_penyetaraan3)) {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan3" value="<?= $tabelpelamar->nomor_penyetaraan3 ?>" />
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <input type="text" class="col-xs-3 form-control" name="nomor_penyetaraan3" />
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-kampusss">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi Perguruan Tinggi:</label><br />
                                                                        <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-kampusss" class="form-control select2" name="akreditasi_kampus3">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_kampus3)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_kampus3 == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus3 ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus3 ?></option>
                                                                                        <option value="B">B / Baik Sekali</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_kampus3 == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_kampus3 ?>" selected="" ><?= $tabelpelamar->akreditasi_kampus3 ?></option>
                                                                                        <option value="A">A / Unggul</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A / Unggul</option>
													                                    <option value="B">B / Baik Sekali</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A / Unggul</option>
													                                <option value="B">B / Baik Sekali</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div class="col-md-6" id="jurusan3">
                                                                    <label class="control-label">Program Studi:</label><br />
                                                                    <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->prodi3)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="jurusan3" value="<?= $tabelpelamar->prodi3 ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="jurusan3" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div id="akreditasi-prodiii">
                                                                    <div class="col-md-6">
                                                                        <label class="control-label">Akreditasi Program Studi:</label><br />
                                                                        <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                        <div class="">
                                                                            <select id="select-akreditasi-prodiii" class="form-control select2" name="akreditasi_jurusan3">
                                                                                <?php
                                                                                if (isset($tabelpelamar->akreditasi_prodi3)) {
                                                                                    ?>
                                                                                    <?php
                                                                                    if ($tabelpelamar->akreditasi_prodi3 == "A") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi3 ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi3 ?></option>
                                                                                        <option value="B">B / Baik Sekali</option>
                                                                                        <?php
                                                                                    } else if ($tabelpelamar->akreditasi_prodi3 == "B") {
                                                                                        ?>
                                                                                        <option value="<?= $tabelpelamar->akreditasi_prodi3 ?>" selected="" ><?= $tabelpelamar->akreditasi_prodi3 ?></option>
                                                                                        <option value="A">A / Unggul</option>
                                                                                        <?php
                                                                                    } else {
                                                                                        ?>
                                                                                        <option value="0" selected="">Pilih</option>
                                                                                        <option value="A">A / Unggul</option>
													                                    <option value="B">B / Baik Sekali</option>
                                                                                        <?php
                                                                                    }
                                                                                    ?>
                                                                                    <?php
                                                                                } else {
                                                                                    ?>
                                                                                    <option value="0" selected="">Pilih</option>
                                                                                    <option value="A">A / Unggul</option>
													                                <option value="B">B / Baik Sekali</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div class="col-md-6" id="ipk3">
                                                                    <label class="control-label">IPK:(Khusus Lulusan Luar Negeri, Jika tidak ada IPK maka abaikan)</label><br />
                                                                    <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->ipk3)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" name="ipk3" value="<?= $tabelpelamar->ipk3 ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="form-control" pattern="[0-9]*\.?[0-9]*" title="Gunakan angka dan titik!" name="ipk3" placeholder="contoh: 3.5 (gunakan titik)"/>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6" id="thn_lulus3">
                                                                    <label class="control-label">Tahun Lulus:</label><br />
                                                                    <label class="control-label">(Doktor / Doktor Terapan)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->thn_lulus3)) {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="thn_lulus3" value="<?= $tabelpelamar->thn_lulus3 ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="col-xs-3 form-control" name="thn_lulus3" />
                                                                            <?php
                                                                        }
                                                                        ?>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">	
                                                                <div class="col-md-12" id="disertasi3">
                                                                    <label class="control-label">Disertasi:</label><br />
                                                                    <label class="control-label">(Doktor / Doktor Terapan / Sub Spesialis)</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->desertasi)) {
                                                                            ?>
                                                                            <textarea class="form-control" name="desertasi" /><?= $tabelpelamar->desertasi ?></textarea>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <textarea class="form-control" name="desertasi" /></textarea>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                    <hr>
                                                                </div>
                                                            </div>
                                                            <div class="form-group m-b-5">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Jenis Toefl:</label><br />
                                                                    <div class="">
                                                                        <select id="select-jenis_toefl" onChange="jenisToeflHandler()" class="form-control select2" name="jenis_toefl">
                                                                            <?php
                                                                            if (!empty($tabelpelamar->jenis_toefl)) {
                                                                                ?>
                                                                                <option value="<?= $tabelpelamar->jenis_toefl ?>" selected><?= $tabelpelamar->jenis_toefl ?></option>
                                                                                <?php
                                                                                if ($tabelpelamar->jenis_toefl == "IELTS") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".toefl-lainlain").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="ITP">ITP</option>
                                                                                    <option value="IBT">TOEFL IBT</option>
                                                                                    <option value="TOEIC">TOEIC</option>
                                                                                    <option value="Lain-lain">Lain-lain</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->jenis_toefl == "ITP") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".toefl-lainlain").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="IELTS">IELTS</option>
                                                                                    <option value="IBT">TOEFL IBT</option>
                                                                                    <option value="TOEIC">TOEIC</option>
                                                                                    <option value="Lain-lain">Lain-lain</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->jenis_toefl == "IBT") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".toefl-lainlain").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="IELTS">IELTS</option>
                                                                                    <option value="IBT">TOEFL ITP</option>
                                                                                    <option value="TOEIC">TOEIC</option>
                                                                                    <option value="Lain-lain">Lain-lain</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->jenis_toefl == "TOEIC") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".toefl-lainlain").hide();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="IELTS">IELTS</option>
                                                                                    <option value="IBT">TOEFL ITP</option>
                                                                                    <option value="IBT">TOEFL IBT</option>
                                                                                    <option value="Lain-lain">Lain-lain</option>
                                                                                    <?php
                                                                                } else if ($tabelpelamar->jenis_toefl == "Lain-lain") {
                                                                                    ?>
                                                                                    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
                                                                                    <script>
                                                                                    $(document).ready(function () {
                                                                                        $(".toefl-lainlain").show();
                                                                                    });
                                                                                    </script>
                                                                                    <option value="IELTS">IELTS</option>
                                                                                    <option value="IBT">TOEFL ITP</option>
                                                                                    <option value="IBT">TOEFL IBT</option>
                                                                                    <option value="Lain-lain">Lain-lain</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <option value="" selected="">Pilih</option>
                                                                                <option value="IELTS">IELTS</option>
                                                                                <option value="ITP">TOEFL ITP</option>
                                                                                <option value="IBT">TOEFL IBT</option>
                                                                                <option value="TOEIC">TOEIC</option>
                                                                                <option value="Lain-lain">Lain-lain</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                        <script>
                                                                            function jenisToeflHandler() {
                                                                                if (document.getElementById("select-jenis_toefl").value == "Lain-lain") {
                                                                                    $(".toefl-lainlain").show();
                                                                                } else {
                                                                                    $(".toefl-lainlain").hide();
                                                                                }
                                                                            }
                                                                        </script>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6 toefl-lainlain">
                                                                    <label class="control-label">Jenis Toefl Lainnya:</label>
                                                                    <?php
                                                                    if ($tabelpelamar->jenis_toefl == "Lain-lain") {
                                                                        ?>
                                                                        <input type="text" class="form-control" name="toefl_lainnya" value="<?= $tabelpelamar->toefl_lainnya ?>" />
                                                                        <?php
                                                                    } else {
                                                                        ?>
                                                                        <input type="text" class="form-control" name="toefl_lainnya" />
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Skor TOEFL:</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->toefl)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="toefl" value="<?= $tabelpelamar->toefl ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="toefl" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tanggal Terbit Toefl:</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (!empty($tabelpelamar->tgl_sert_terbit)) {
                                                                            ?>
                                                                            <input type="date" class="form-control" name="tgl_sert_terbit" value="<?= $tabelpelamar->tgl_sert_terbit ?>" />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="date" class="form-control" name="tgl_sert_terbit" />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" value="ok" name="status_simpanformasi">
                                                            <div class="col-md-2 pull-right">
                                                                <?php
                                                                if ($statuspelamar == NULL and $status_simpanformasi == "") {
                                                                    ?>
                                                                    <button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Simpan</button>
                                                                    <?php
                                                                } else if ($statuspelamar == NULL and $status_simpanformasi == "ok") {
                                                                    ?>
                                                                    <button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Update</button>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Simpan</button>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
                                    <script type="text/javascript">
                                                                            $(document).ready(function () {
                                                                                $('#add-formasi').submit(function (e) {
                                                                                    e.preventDefault();
                                                                                    var formData = new FormData($(this)[0]);
                                                                                    $.ajax({
                                                                                        url: '<?= site_url('PelamarCntrl/addFormasiPelamar') ?>',
                                                                                        data: formData,
                                                                                        type: 'POST',
                                                                                        contentType: false,
                                                                                        processData: false,
                                                                                        success: function (data) {
                                                                                            if (data['return'] == 1) {
                                                                                                notification._toast('Error', 'Formasi tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 2) {
                                                                                                notification._toast('Error', 'Pendidikan Terakhir tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 3) {
                                                                                                notification._toast('Error', 'Pendidikan (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 4) {
                                                                                                notification._toast('Error', 'Asal Pendidikan (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 5) {
                                                                                                notification._toast('Error', 'Nama PT (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 6) {
                                                                                                notification._toast('Error', 'Akreditasi PT (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 7) {
                                                                                                notification._toast('Error', 'Nomor Penyetaraan (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 8) {
                                                                                                notification._toast('Error', 'Program Studi (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 9) {
                                                                                                notification._toast('Error', 'Akreditasi Program Studi (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 10) {
                                                                                                notification._toast('Error', 'IPK (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 11) {
                                                                                                notification._toast('Error', 'Tahun Lulus (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 12) {
                                                                                                notification._toast('Error', 'Skripsi (Sarjana / Sarjana Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 13) {
                                                                                                notification._toast('Error', 'Pendidikan Profesi tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 14) {
                                                                                                notification._toast('Error', 'Pendidikan (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 15) {
                                                                                                notification._toast('Error', 'Asal Pendidikan (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 16) {
                                                                                                notification._toast('Error', 'Nama PT (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 17) {
                                                                                                notification._toast('Error', 'Akreditasi PT (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 18) {
                                                                                                notification._toast('Error', 'Nomor Penyetaraan (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 19) {
                                                                                                notification._toast('Error', 'Program Studi (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 20) {
                                                                                                notification._toast('Error', 'Akreditasi Program Studi (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 21) {
                                                                                                notification._toast('Error', 'IPK (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 22) {
                                                                                                notification._toast('Error', 'Tahun Lulus (Sarjana Profesi) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 23) {
                                                                                                notification._toast('Error', 'Tugas Akhir Profesi tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 24) {
                                                                                                notification._toast('Error', 'Pendidikan (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 25) {
                                                                                                notification._toast('Error', 'Asal Pendidikan (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 26) {
                                                                                                notification._toast('Error', 'Nama PT (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 27) {
                                                                                                notification._toast('Error', 'Akreditasi PT (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 28) {
                                                                                                notification._toast('Error', 'Nomor Penyetaraan (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 29) {
                                                                                                notification._toast('Error', 'Program Studi (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 30) {
                                                                                                notification._toast('Error', 'Akreditasi Program Studi (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 31) {
                                                                                                notification._toast('Error', 'IPK (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 32) {
                                                                                                notification._toast('Error', 'Tahun Lulus (Magister / Magister Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 33) {
                                                                                                notification._toast('Error', 'Tesis tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 34) {
                                                                                                notification._toast('Error', 'Pendidikan (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 35) {
                                                                                                notification._toast('Error', 'Asal Pendidikan (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 36) {
                                                                                                notification._toast('Error', 'Nama PT (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 37) {
                                                                                                notification._toast('Error', 'Akreditasi PT (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 38) {
                                                                                                notification._toast('Error', 'Nomor Penyetaraan (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 39) {
                                                                                                notification._toast('Error', 'Program Studi (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 40) {
                                                                                                notification._toast('Error', 'Akreditasi Program Studi (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 41) {
                                                                                                notification._toast('Error', 'IPK (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 42) {
                                                                                                notification._toast('Error', 'Tahun Lulus (Doktor / Doktor Terapan) tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 43) {
                                                                                                notification._toast('Error', 'Desertasi tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 44) {
                                                                                                notification._toast('Error', 'Jenis Toefl tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 45) {
                                                                                                notification._toast('Error', 'Skor Toefl tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 46) {
                                                                                                notification._toast('Error', 'Jenis Toefl Lainnya tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 47) {
                                                                                                notification._toast('Error', 'Tanggal Terbit Toefl tidak boleh kosong', 'error');
                                                                                            } else if (data['return'] == 48) {
                                                                                                notification._toast('Success', 'Data Tersimpan', 'success');
                                                                                                setTimeout(function () {
                                                                                                    window.location.href = "lampiran";
                                                                                                }, 1500);
                                                                                            } else {
                                                                                                notification._toast('Error', 'Gagal Menyimpan', 'error');
                                                                                            }
                                                                                        }
                                                                                    });
                                                                                });
                                                                            });
                                                                            $(document).ready(function () {
                                                                                $('select.form-select').select2();
                                                                            });
                                    </script>
                                    <?php
                                } else {
                                    $newDate = date("d-m-Y H:i:s");
                                    ?>
                                    Pendaftaran telah ditutup
                                    <?php
                                }
                                ?>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h3 class="box-title">Pendaftaran</h3>
                                    </div> 
                                </div>
                                <hr>
                                <?= "Pendaftaran sudah tutup." ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
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
    if ($status_simpanformasi == "ok" and $statuspelamar != NULL) {
        ?>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Data Anda sudah tersimpan!</h4> <b><?= $tabelpelamar->nama_pelamar ?>,</b> Anda sudah submit pendaftaran.</div>
        <?php
    } elseif ($status_simpanformasi == "ok" and $statuspelamar == NULL) {
        ?>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Data Anda sudah tersimpan!</h4> <b><?= $tabelpelamar->nama_pelamar ?>,</b> Jangan lupa submit pendaftaran.</div>
        <?php
    } else {
        ?>
        <?php
        if ($tabelpelamar->nama_pelamar == null) {
            ?>
            <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa klik simpan.</div>
            <?php
        } else {
            ?>
            <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b><?= $tabelpelamar->nama_pelamar ?>,</b> Jangan lupa klik simpan.</div>
                <?php
            }
            ?>
            <?php
        }
        ?>
    <script>
        $(".myadmin-alert .closed").click(function (event) {
            $(this).parents(".myadmin-alert").fadeToggle(350);
            return false;
        });
        /* Click to close */
        $(".myadmin-alert-click").click(function (event) {
            $(this).fadeToggle(350);
            return false;
        });
        $("#alerttopright").fadeToggle(3550);
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <?php $this->load->view('scripts') ?>

</body>
</html>
