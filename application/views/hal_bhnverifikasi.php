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
                                Data Formasi
                                </h3><br><br>
                            </div>
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
            <?php $this->load->view('modal-halverifikasi'); ?>
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
            url:'PelamarCntrl/getTabelhal_bhnverifikasi',
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
        $('#verifikasi-pelamarbybhn').click(function(){
            $.ajax({
                url:'<?= site_url('PelamarCntrl/hitungJmlLolos/') ?>',
                data:{
                    id:id
                },
                success:function(data){
                    getTabel('PelamarCntrl/getTabelhal_bhnverifikasi');
					notification._toast('Success','Proses berhasil','success');
					$('.verifikasiBhnModal').modal('hide');
					console.log(id);
                }
            });
        });
		
        $('#slimtest4').slimScroll({
            color: '#00f',
            size: '10px',
            height: '1000px',
            alwaysVisible: true
        });

    });
</script>
</body>
</html>
