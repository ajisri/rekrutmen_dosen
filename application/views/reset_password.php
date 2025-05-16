<!DOCTYPE html>  
<html lang="en">
    <?php include('headweb.php'); ?>
<!--    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url(); ?>assets/plugins/images/logo_undip.png">
        <title>Rekrutmen Undip - Reset Password</title>
         Bootstrap Core CSS 
        <link href="<?php echo base_url(); ?>assets/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
         animation CSS 
        <link href="<?php echo base_url(); ?>assets/css/animate.css" rel="stylesheet">
         Custom CSS 
        <link href="<?php echo base_url(); ?>assets/css/style.css" rel="stylesheet">
         color CSS 
        <link href="<?php echo base_url(); ?>assets/css/colors/blue.css" id="theme"  rel="stylesheet">
        alerts CSS 
        <link href="<?php echo base_url(); ?>assets/plugins/bower_components/sweetalert/sweetalert.css" rel="stylesheet" type="text/css">
         HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries 
         WARNING: Respond.js doesn't work if you view the page via file:// 
        [if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]
    </head>-->


<body style="margin:0px; background: #f8f8f8; ">
    <div width="100%" style="background: #f8f8f8; padding: 0px 0px; font-family:arial; line-height:28px; height:100%;  width: 100%; color: #514d6a;">
        <div style="max-width: 700px; padding:20px 0;  margin: 0px auto; font-size: 14px">
            <table border="0" cellpadding="0" cellspacing="0" style="width: 100%; margin-bottom: 20px">
                <tbody>
                    <tr>
                        <td style="vertical-align: top; padding-bottom:10px;" align="center">
                            <img style="width:80px" src="<?= base_url('assets/undip.png') ?>" alt="Admin Responsive web app kit" style="border:none">
                            <br/><br/>
                            <!-- <img src="<?php echo base_url(); ?>assets/plugins/images/si_pak.png" alt="admin Responsive web app kit" style="border:none"></a> --> <h3>REKRUTMEN SDM UNDIP</h3>
                        </td>
                    </tr>
                </tbody>
            </table>
            <div style="padding: 40px; background: #fff;">
                <table border="0" cellpadding="0" cellspacing="0" style="width: 100%;">
                    <tbody>
                        <tr>
                            <td><b>Hi,</b>
                                <p>Silakan klik tombol dibawah ini untuk melakukan reset password anda.</p>
                    <center>
                        <form id="formreset">
                            <input type="hidden" value="<?= $email ?>" name="email" id="email"/>
                            <input type="submit" class="btn btn-info btn-lg" value="RESET PASSWORD"/>
                        </form>
                        <!--<a href="<?php echo base_url(); ?>index.php/user" style="display: inline-block; padding: 11px 30px; margin: 20px 0px 30px; font-size: 15px; color: #fff; background: #1e88e5; border-radius: 60px; text-decoration:none;"> RESET PASSWORD </a>-->
                    </center>
                    <br/>
                    <b>- Thanks (Admin)</b> </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div style="text-align: center; font-size: 12px; color: #b2b2b5; margin-top: 20px">
                <p>  <a href="http://www.dsdm.undip.ac.id" target="_blank">2020 &copy; Direktorat Sumber Daya Undip</a></p>
            </div>
        </div>
    </div>
<!--     jQuery 
    <script src="<?php echo base_url(); ?>assets/plugins/bower_components/jquery/dist/jquery.min.js"></script>

     Bootstrap Core JavaScript 
    <script src="<?php echo base_url(); ?>assets/bootstrap/dist/js/bootstrap.min.js"></script>
     Menu Plugin JavaScript 
    <script src="<?php echo base_url(); ?>assets/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js"></script>

    slimscroll JavaScript 
    <script src="<?php echo base_url(); ?>assets/js/jquery.slimscroll.js"></script>
    Wave Effects 
    <script src="<?php echo base_url(); ?>assets/js/waves.js"></script>
     Custom Theme JavaScript 
    <script src="<?php echo base_url(); ?>assets/js/custom.min.js"></script>
    Style Switcher 
    <script src="<?php echo base_url(); ?>assets/plugins/bower_components/styleswitcher/jQuery.style.switcher.js"></script>
     Sweet-Alert  
    <script src="<?php echo base_url(); ?>assets/plugins/bower_components/sweetalert/sweetalert.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js"></script>
    Block UI
    <script src="<?php echo base_url(); ?>assets/plugins/bower_components/jquery.blockUI.js"></script>-->
<!-- JS Global Compulsory -->
        <script src="<?= base_url('assets/vendor/jquery/jquery.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/jquery-migrate/jquery-migrate.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/popper.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/bootstrap/bootstrap.min.js') ?>"></script>

        <!-- JS Implementing Plugins -->
        <script src="<?= base_url('assets/vendor/hs-megamenu/src/hs.megamenu.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/dzsparallaxer/dzsparallaxer.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/dzsparallaxer/dzsscroller/scroller.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/dzsparallaxer/advancedscroller/plugin.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/fancybox/jquery.fancybox.min.js') ?>"></script>
        <script src="<?= base_url('assets/vendor/slick-carousel/slick/slick.js') ?>"></script>

        <!-- JS Unify -->
        <script src="<?= base_url('assets/js/hs.core.js') ?>"></script>
        <script src="<?= base_url('assets/js/components/hs.header.js') ?>"></script>
        <script src="<?= base_url('assets/js/helpers/hs.hamburgers.js') ?>"></script>
        <script src="<?= base_url('assets/js/components/hs.dropdown.js') ?>"></script>
        <script src="<?= base_url('assets/js/components/hs.popup.js') ?>"></script>
        <script src="<?= base_url('assets/js/components/hs.carousel.js') ?>"></script>
        <script src="<?= base_url('assets/js/components/hs.go-to.js') ?>"></script>

        <!-- JS Customization -->
        <script src="<?= base_url('assets/js/custom.js') ?>"></script>
        <script src="<?php echo base_url('temp/plugins/bower_components/sweetalert/sweetalert.min.js'); ?>"></script>
        <script src="<?php echo base_url('temp/plugins/bower_components/sweetalert/jquery.sweet-alert.custom.js'); ?>"></script>
    <script>
        $(document).ready(function() {
            //        $(document).ajaxStart(function () {
            //            Pace.restart();
            //        });
            //    $.blockUI();
            $.blockUI.defaults.baseZ = 4000;
            $(document).ajaxStart(function() {
                $.blockUI({css: {
                        border: 'none',
                        padding: '25px',
                        backgroundColor: '#000',
                        '-webkit-border-radius': '10px',
                        '-moz-border-radius': '10px',
                        opacity: .5,
                        color: '#fff',
                        'z-index': '1200'
                    }, message: '<h4>PROCESSING...</h4><br>Please Wait', });
            });

            $(document).ajaxStop($.unblockUI);
        });
    </script>
    <script type="text/javascript">



        $(document).ready(function() {
            $('.modal').css('overflow-y', 'auto');
            //                $(document).ajaxStop($.unblockUI); 

            //UPDATE DATA
            $('#formreset').on('submit', function(e) {
                //                    $.blockUI();
                $("#btnSubmit").val('Please wait ...').attr("disabled", true);
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url('index.php/IndexCntrl/reset_password_post') ?>",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: false,
                    success: function(hasil) {
                        console.log(hasil);
                        dt = JSON.parse(hasil);

                        if (dt['result'] === true) {
                            swal({
                                title: "Berhasil",
                                text: "Username & Password baru telah terkirim ke email <?= $email ?> \n \n *Jika tidak ada pada folder inbox, silakan periksa pada folder spam",
                                button: "OK",
                                type: 'success'
                            }, function() {
                                window.location.href = "<?php echo base_url('index.php/IndexCntrl') ?>"
                            });
                        } else if (dt['result'] === "email_not_found") {
                            swal({
                                title: "GAGAL",
                                text: "Email anda tidak terdaftar dalam sistem. ",
                                button: "OK",
                                type: 'error'
                            }, function() {
                                window.location.reload();
                            });
                        } else {
                            swal({
                                title: "GAGAL",
                                text: "Something Wrong",
                                button: "OK",
                                type: 'error'
                            }, function() {
                                window.location.reload();
                            });
                        }


                    }
                });
                return false;
            });

        });

    </script>
</body>
</html>
