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
                                                A. Identitas
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
                                                    <?php
                                                    $a = $this->input->get('balasan');
                                                    if ($a == '1') {
                                                        ?>
                                                        <h4 class="text-center text-danger g-py-40">Gelar Depan Tidak Boleh Kosong</h4>
                                                    <?php } ?>
                                                    <form id="add-identitas" action="#" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                        <div id="identitas">
                                                            <div class="form-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label">Gelar Depan :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->gelar_depan)) {
                                                                            ?>
                                                                            <input type="text" id="gelar_depan" class="form-control" name="glrdpn" value="<?= $tabel->gelar_depan ?>"  />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" id="gelar_depan" class="form-control" name="glrdpn"  />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Nama Lengkap :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->nama_pelamar)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="nama" value="<?= $tabel->nama_pelamar ?>"  />
                                                                            <?php
                                                                        } else {
                                                                            ?>

                                                                            <input type="text" class="form-control" name="nama"  />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <label class="control-label">Gelar Belakang :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->gelar_belakang)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="glrblkg" value="<?= $tabel->gelar_belakang ?>"  />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="glrblkg"  />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tempat Lahir :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->tempat_lahir)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="tmpt_lahir" value="<?= $tabel->tempat_lahir ?>" required />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="tmpt_lahir" value="<?= $tabel->tempat_lahir ?>" required />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label class="control-label">Tanggal Lahir :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->tanggal_lahir)) {
                                                                            ?>
                                                                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $tabel->tanggal_lahir ?>" required />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="date" class="form-control" name="tgl_lahir" value="<?= $tabel->tanggal_lahir ?>" required />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Jenis Kelamin :</label>
                                                                    <div class="">
                                                                        <select type="text" class="form-control select2" name="jenis_kelamin" required>
                                                                            <?php
                                                                            if (isset($tabel->jenis_kelamin)) {
                                                                                ?>
                                                                                <option value="<?= $tabel->jenis_kelamin ?>"><?= $tabel->jenis_kelamin ?></option>
                                                                                <?php
                                                                                if ($tabel->jenis_kelamin == "Laki-laki") {
                                                                                    ?>
                                                                                    <option value="Perempuan">Perempuan</option>
                                                                                    <?php
                                                                                } else if ($tabel->jenis_kelamin == "Perempuan") {
                                                                                    ?>
                                                                                    <option value="Laki-laki">Laki-laki</option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                                <?php
                                                                            } else {
                                                                                ?>
                                                                                <option selected value="">Pilih</option>
                                                                                <option value="Laki-laki">Laki-laki</option>
                                                                                <option value="Perempuan">Perempuan</option>
                                                                                <?php
                                                                            }
                                                                            ?>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Agama :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($readagama->agama)) {
                                                                            ?>
                                                                            <select type="text" class="form-control select2" name="agama" id="panel-heading" required>
                                                                                <option selected value="<?= $readagama->agama ?>"><?= $readagama->agama ?></option>
                                                                                <?php
                                                                                foreach ($pilihanagama as $row) {
                                                                                    ?>
                                                                                    <option value="<?= $row->agama ?>"><?= $row->agama ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <select type="text" class="form-control select2" name="agama" id="panel-heading" required>
                                                                                <option selected value="">Pilih</option>
                                                                                <?php
                                                                                foreach ($agama as $row) {
                                                                                    ?>
                                                                                    <option value="<?= $row->agama ?>"><?= $row->agama ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Nomor Handphone / No. Whatsapp (aktif) :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->no_telepon)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="no_telepon" value="<?= $tabel->no_telepon ?>" required />
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="no_telepon" required />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Status Kawin :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($status_kawin)) {
                                                                            ?>
                                                                            <select type="text" class="form-control select2" name="status_menikah" id="panel-heading" required>
                                                                                <option selected value="<?= $status_kawin ?>"><?= $status_kawin ?></option>
                                                                                <?php
                                                                                foreach ($pilihanstatuskawin as $pilihandatastatuskawin) {
                                                                                    ?>
                                                                                    <option value="<?= $pilihandatastatuskawin->status_kawin ?>"><?= $pilihandatastatuskawin->status_kawin ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <select type="text" class="form-control select2" name="status_menikah" id="panel-heading" required>
                                                                                <option selected value="">Pilih</option>
                                                                                <?php
                                                                                foreach ($datastatuskawin as $data) {
                                                                                    ?>
                                                                                    <option value="<?= $data->status_kawin ?>"><?= $data->status_kawin ?></option>
                                                                                    <?php
                                                                                }
                                                                                ?>
                                                                            </select>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label class="control-label">Alamat :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->alamat)) {
                                                                            ?>
                                                                            <textarea class="form-control" name="alamat" required /><?= $tabel->alamat ?></textarea>
                                                                            <?php
                                                                        } else {
                                                                            ?>
                                                                            <textarea class="form-control" name="alamat" required /></textarea>
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <input type="hidden" value="ok" name="status_simpanidentitas">
                                                            <div class="col-md-2 pull-right">
                                                                <?php
                                                                if ($statuspelamar == NULL) {
                                                                    ?>
                                                                    <button type="submit" id="<?= $nik ?>" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Simpan</button>
                                                                    <?php
                                                                } else if ($statuspelamar == NULL and $status_simpanidentitas == "ok") {
                                                                    ?>
                                                                    <button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Update</button>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <button type="submit" id="<?= $nik ?>" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Simpan</button>
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
                                            $('#add-identitas').submit(function (e) {
                                                e.preventDefault();
                                                var formData = new FormData($(this)[0]);
                                                $.ajax({
                                                    url: '<?= site_url('PelamarCntrl/addIdentitasPelamar') ?>',
                                                    data: formData,
                                                    type: 'POST',
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                        if (data['return'] == 1) {
                                                            notification._toast('Error', 'Nama Lengkap tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 2) {
                                                            notification._toast('Error', 'Gelar Belakang tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 3) {
                                                            notification._toast('Error', 'Tempat Lahir tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 4) {
                                                            notification._toast('Error', 'Tanggal Lahir tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 5) {
                                                            notification._toast('Error', 'Jenis Kelamin tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 6) {
                                                            notification._toast('Error', 'Status Menikah tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 7) {
                                                            notification._toast('Error', 'Agama tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 8) {
                                                            notification._toast('Error', 'Nomor Handphone tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 9) {
                                                            notification._toast('Error', 'Alamat tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 10) {
                                                            notification._toast('Success', 'Data tersimpan', 'success');
                                                            setTimeout(function () {
                                                                window.location.href = "formasi";
                                                            }, 1500);
                                                        } else {
                                                            notification._toast('Error', 'Gagal Menyimpan', 'error');
                                                        }
                                                    }
                                                });
                                            });
                                        });
                                    </script>
                                    <script type="text/javascript">
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
    if ($status_simpanidentitas == "ok" and $statuspelamar != NULL) {
        ?>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-success myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Identitas Anda sudah tersimpan!</h4> <b><?= $tabel->nama_pelamar ?>,</b> Anda sudah submit pendaftaran.</div>
        <?php
    } else if ($status_simpanidentitas == "ok" and $statuspelamar == NULL) {
        ?>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Identitas Anda sudah tersimpan!</h4> <b><?= $tabel->nama_pelamar ?>,</b> Jangan lupa <b>submit pendaftaran</b> pada <b>Resume</b>.</div>
        <?php
    } else {
        ?>
        <?php
        if ($tabel->nama_pelamar == null) {
            ?>
            <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b>Hi!,</b> Jangan lupa klik simpan.</div>
            <?php
        } else {
            ?>
            <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-warning myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4></h4> <b><?= $tabel->nama_pelamar ?>,</b> Jangan lupa klik simpan.</div>
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
