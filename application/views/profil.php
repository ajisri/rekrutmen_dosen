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
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- Different data widgets -->
                <!-- ============================================================== -->
                
                <div class="row">
                    <form action="<?= site_url('UserCntrl/updateprofil') ?>" method="POST" enctype="multipart/form-data">
                        <div class="col-md-4 col-xs-12 text-center">
                            <div class="white-box">
                                <img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" alt="user-img" width="300">
                            </div>
                        </div>
                        <div class="col-md-8 col-xs-12">
                            <div class="white-box">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 class="box-title m-b-0">Profil User</h3>
                                    </div>
                                </div>
                                <hr>
                                <?php if ($this->input->get('false') == 1) {?>
                                <div class="col-md-12 text-center">
                                    <p class="text-danger">Tidak dapat mengupdate email, Email sudah terdaftar. </p>
                                </div>
                            <?php }?>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Username: </label>
                                        <input type="text" class="form-control" id="username" name="username" value="<?= $this->session->userdata('username') ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name" class="control-label">Email: </label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?= $this->session->userdata('email') ?>" required> 
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="phone" class="control-label">New Password:</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Your new password" value="">
                                    </div>  
                                </div>
                                <div class="row">
                                    <div class="col-md-12">      
                                        <button type="submit" id="btn-simpan" class="btn btn-success waves-effect waves-light pull-right">Update</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.row -->

                <!--row -->
                <!-- /.row -->
                <!-- ============================================================== -->
                <!-- wallet, & manage users widgets -->
                <!-- ============================================================== -->
                <!-- .row -->
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
        function getData() {
            $.ajax({
                url:'<?= site_url('KelolaCntrl/getUser')?>',
                data:
                { 
                    send:true,
                },
                success:function(data){
                    $('#tabel-data').html(data);
                    tooltip._tooltip();
                }
            });
        }
        $(document).ready(function() {
            getData();
            //date
            jQuery('#tanggal_berita').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            jQuery('#edittanggal_berita').datepicker({
                autoclose: true,
                todayHighlight: true
            });
            //add
            $('#add-form').submit(function(e){
                e.preventDefault();
                form = $(this);
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?= site_url('KelolaCntrl/addUser') ?>',
                    data:formData,
                    type:'POST',
                    contentType: false,
                    processData: false,
                    success:function(data){
                        if (data['return'] == 1) {
                            notification._toast('Error','Username sudah ada','error');
                        }else{
                            getData();
                            $('#addData').modal('hide');
                            notification._toast('Success','Tambah User','success');
                        }
                    }
                });
            });
            $('#edit-form').submit(function(e){
                e.preventDefault();
                form = $(this);
                var formData = new FormData($(this)[0]);
                $.ajax({
                    url: '<?= site_url('KelolaCntrl/editUser') ?>',
                    data:formData,
                    type:'POST',
                    contentType: false,
                    processData: false,
                    success:function(){
                        getData()
                        $('#editData').modal('hide');
                        notification._toast('Success','Edit User','success');
                    }
                });
            });
            $('#hapus-button').on('click',function(){
                $.ajax({
                    url: '<?= site_url('KelolaCntrl/hapusUser') ?>',
                    data:{id:id
                    },
                    success:function(){
                        getData();
                        $('.hapusData').modal('hide');
                        notification._toast('Success','Hapus User','success');
                    }
                });
            });
            

        });
    </script>
</body>
</html>
