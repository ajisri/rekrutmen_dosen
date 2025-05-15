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
                                <h3 class="box-title" style="margin-top: 10px;margin-bottom: -10px">Pengalaman Kerja</h3><br><br>
                            </div>
                        </div>
						<div class="row">
                            <div class="col-sm-12">
                                <div class="col-sm-12">
                                    <div class="col-md-8 pull-right">
                                        <a class="pull-right" href="javascript:void(0)" data-toggle="modal" data-target="#addPengalamanModal">
                                            <span class="circle circle-sm bg-success di" data-toggle="tooltip" title="Tambah" data-placement="bottom"><i class="ti-plus"></i></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div id="tabel-data">

                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            <!--  -->
            <!--row -->
            <?php $this->load->view('modal-useradmin'); ?>
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
            url:'PelamarCntrl/getTabelPengalamanKerja',
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
        //ajax edit data
        $('#edit-user').submit(function(e){
            e.preventDefault();
            var formData = new FormData($(this)[0]);
            $.ajax({
                url: '<?= site_url('UserCntrl/editData') ?>',
                data:formData,
                type:'POST',
                contentType: false,
                processData: false,
                success:function(data){
                    if (data['return'] == 1) {
                        notification._toast('Error','NIK sudah ada','error');
                    }else{
                        getTabel('#tabel-data');
                        $('#editUserModal').modal('hide');
                        notification._toast('Success','Update Data','success');
                    }
                }
            });
        });
        $('.js-example-basic-multiple').select2();
    });
    
</script>
</body>
</html>
