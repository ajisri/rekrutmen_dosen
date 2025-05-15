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
                <div class="col-lg-6 col-md-4 col-sm-4 col-xs-12">
                    <h4 class="page-title"><?= $title ?></h4> </div>
                <div class="col-lg-6 col-sm-8 col-md-8 col-xs-12">
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
                                <h3 class="box-title" style="margin-top: 10px;margin-bottom: -10px">Data Pendaftaran dan Cetak</h3>
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
            <?php $this->load->view('modal-file'); ?>
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
    function getTabelpelamar(){
        $.ajax({
            url:'PelamarCntrl/getTabelpelamar',
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
        getTabelpelamar();
    });
</script>
</body>
</html>
