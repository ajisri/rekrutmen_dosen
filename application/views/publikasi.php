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
                                                C. Publikasi
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
                                                    <form id="add-publikasi" action="#" method="POST" enctype="multipart/form-data" class="form-horizontal">
                                                        <input type="hidden" value="ok" name="status_simpanpublikasi">
                                                        <div id="publikasi">
                                                            <div class="form-group">
                                                                <div class="col-md-3">
                                                                    <label class="control-label">Jenis Publikasi:</label>
                                                                    <select class="form-control select2" name="publikasi" required>
                                                                        <option value="" disabled selected>Pilih Jenis Publikasi</option>
                                                                        <?php foreach ($all_publikasi as $publikasi): ?>
                                                                            <option 
                                                                                value="<?= $publikasi->id_jenispublikasi ?>"
                                                                                <?= ($selected_id == $publikasi->id_jenispublikasi) ? 'selected' : '' ?>
                                                                            >
                                                                                <?= $publikasi->jenis_publikasi ?>
                                                                            </option>
                                                                        <?php endforeach; ?>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-9">
                                                                    <label class="control-label">URL Publikasi (URL Abstrak Artikel) :</label>
                                                                    <div class="">
                                                                        <?php
                                                                        if (isset($tabel->url_publikasi)) {
                                                                            ?>
                                                                            <input type="text" class="form-control" name="url_publikasi" value="<?= $tabel->url_publikasi ?>"  />
                                                                            <?php
                                                                        } else {
                                                                            ?>

                                                                            <input type="text" class="form-control" name="url_publikasi"  />
                                                                            <?php
                                                                        }
                                                                        ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12 m-b-10">
                                                                    <label>Upload Bukti Publikasi (PDF):</label>
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                                                                                <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                                                                                <input type="file" name="publikasi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="pull-right" style="margin-top: -30px">
                                                                <?php
                                                                if ($statuspelamar == NULL) {
                                                                    ?>
                                                                    <button type="submit" id="<?= $nik ?>" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Simpan</button>
                                                                    <?php
                                                                } else if ($statuspelamar == NULL and $status_simpanpublikasi == "ok") {
                                                                    ?>
                                                                    <button type="submit" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light">Update</button>
                                                                    <?php
                                                                } else if ($date >= $datetutup) {
                                                                    ?>
                                                                    <button type="submit" id="<?= $nik ?>" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Simpan</button>
                                                                    <?php
                                                                } else {
                                                                    ?>
                                                                    <button type="submit" id="<?= $nik ?>" class="fcbtn btn btn-outline btn-success btn-1d waves-effect waves-light" disabled>Simpan</button>
                                                                    <?php
                                                                }
                                                                ?>
                                                            </div>
                                                        </div>
                                                    </form>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <br>
                                                    <h3><b>Tabel Publikasi</b></h3>
                                                    <div id="tabel-datapublikasi">

                                                    </div>
                                                    <button type="button" class="fcbtn btn btn-outline btn-info btn-1d waves-effect waves-light pull-right" onclick="nextPage()">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php $this->load->view('modal-publikasi'); ?>
                                    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
                                    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
                                    <script type="text/javascript">
                                        function nextPage() {
                                            window.location.href = "lampiran";
                                        }
                                        $(document).ready(function () {
                                            $('#add-publikasi').submit(function (e) {
                                                e.preventDefault();
                                                var formData = new FormData($(this)[0]);
                                                $.ajax({
                                                    url: '<?= site_url('PelamarCntrl/addPublikasiPelamar') ?>',
                                                    data: formData,
                                                    type: 'POST',
                                                    contentType: false,
                                                    processData: false,
                                                    success: function (data) {
                                                        if (data['return'] == 1) {
                                                            notification._toast('Error', 'Jenis Publikasi tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 2) {
                                                            notification._toast('Error', 'URL Publikasi tidak boleh kosong', 'error');
                                                        } else if (data['return'] == 3) {
                                                            notification._toast('Error', 'File Upload tidak boleh kosong', 'error');
                                                        }else if (data['return'] == 4) {
                                                            notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
                                                        }else if (data['return'] == 5) {
                                                            notification._toast('Error','File harus bertipe pdf','error');
                                                        }else if (data['return'] == 6) {
                                                            notification._toast('Success', 'Data tersimpan', 'success');
                                                            setTimeout(function () {
                                                                window.location.href = "publikasi";
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
    if ($status_simpanpublikasi == "ok" and $statuspelamar != NULL) {
        ?>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-success myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>publikasi Anda sudah tersimpan!</h4> <b><?= $tabel->nama_pelamar ?>,</b> Anda sudah submit pendaftaran.</div>
        <?php
    } else if ($status_simpanpublikasi == "ok" and $statuspelamar == NULL) {
        ?>
        <div id="alerttopright" class="myadmin-alert myadmin-alert-img alert-info myadmin-alert-top-right"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" class="img" alt="img"><a href="#" class="closed">&times;</a><h4>Publikasi Anda sudah tersimpan!</h4> <b><?= $tabel->nama_pelamar ?>,</b> Jangan lupa <b>submit pendaftaran</b> pada <b>Resume</b>.</div>
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
    <script type="text/javascript">
    function getTabelpublikasipelamar(){
        $.ajax({
            url:'PelamarCntrl/getTabelpublikasipelamar',
            data:
            { 
                send:true,
            },
            success:function(data){
                $("#tabel-datapublikasi").html(data);
                tooltip._tooltip();
            }
        });
    }

    //ajax edit data
    $('#edit-publikasipelamar').submit(function(e){
        e.preventDefault();
        var formData = new FormData($(this)[0]);
        $.ajax({
            url: '<?= site_url('PelamarCntrl/editPublikasiPelamar') ?>',
            data:formData,
            type:'POST',
            contentType: false,
            processData: false,
            success:function(data){
                if (data['return'] == 1) {
                    notification._toast('Error', 'Jenis Publikasi tidak boleh kosong', 'error');
                } else if (data['return'] == 2) {
                    notification._toast('Error', 'URL Publikasi tidak boleh kosong', 'error');
                } else if (data['return'] == 3) {
                    notification._toast('Error', 'File Upload tidak boleh kosong', 'error');
                }else if (data['return'] == 4) {
                    notification._toast('Error','Ukuran file harus kurang dari 400 kb','error');
                }else if (data['return'] == 5) {
                    notification._toast('Error','File harus bertipe pdf','error');
                }else if (data['return'] == 6) {
                    notification._toast('Success', 'Data tersimpan', 'success');
                    setTimeout(function () {
                        window.location.href = "publikasi";
                    }, 1500);
                } else {
                    notification._toast('Error', 'Gagal Menyimpan', 'error');
                }
            }
        });
    });
    //ajax hapus data
    $('#hapus-user').click(function(){
        $.ajax({
            url:'<?= site_url('UserCntrl/hapusData') ?>',
            data:{
                id:id
            },
            success:function(data){
                getTabel();
                $('.hapusUserModal').modal('hide');
                notification._toast('Success','Delete Data','success');
            }
        });
    });

    $(document).ready(function() {
        getTabelpublikasipelamar();
    });
</script>

</body>
</html>
