<!DOCTYPE html>  
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('temp/plugins/images/Undip.png')?>">
<title>Rekrutmen SDM Universitas Diponegoro</title>
<!-- Bootstrap Core CSS -->
<link href="<?= base_url('temp/asset/bootstrap/dist/css/bootstrap.min.css') ?>" rel="stylesheet">
<!-- animation CSS -->
<link href="<?= base_url('temp/asset/css/animate.css') ?>" rel="stylesheet">
<!-- Custom CSS -->
<link href="<?= base_url('temp/asset/css/style.css') ?>" rel="stylesheet">
<!-- color CSS -->
<link href="<?= base_url('temp/asset/css/colors/blue.css') ?>" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn. com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box login-sidebar">
    <div class="white-box">
      <form class="form-horizontal" id="loginform" action="<?= site_url('IndexCntrl/loginProcess'); ?>" method="POST">
        <a href="javascript:void(0)" class="text-center db"><img src="<?= base_url('temp/plugins/images/Undip.png') ?>" width="30%" alt="Home" /><br/></a>
        <h4 class="text-center"></h4>
        <h4 class="text-center"></h4>
        <?php if ($report == 1) { ?> 
        <p class="text-center m-t-15" style="color: red">Username atau password salah !</p>
        <?php } ?>
        <div class="form-group m-t-20">
          <div class="col-xs-12">
            <input class="form-control" name="username" type="text" required="" placeholder="Username">
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control" name="password" type="password" required="" placeholder="Password">
          </div>
        </div>
        <!-- <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-left p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Remember me </label>
            </div>
            <a href="<?= site_url('IndexCntrl/forget') ?>" id="to-recover" class="text-dark pull-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a> </div>
        </div> -->
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-danger btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
          </div>
        </div>
        <a href="<?php echo base_url("KerjasamaCntrl/pendaftaran");?>"><button type="button" class="btn btn-success btn-outline btn-lg btn-block" data-toggle="tooltip" title="Register">Register</button>
          </a>
        <div class="row">
          <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
            <h4>Rekrutmen SDM Undip &copy @<?php echo date('Y');?></h4>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="<?= base_url('temp/plugins/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('temp/asset/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') ?>"></script>

<!--slimscroll JavaScript -->
<script src="<?= base_url('temp/asset/js/jquery.slimscroll.js') ?>"></script>
<!--Wave Effects -->
<script src="<?= base_url('temp/asset/js/waves.js') ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('temp/asset/js/custom.min.js') ?>"></script>
<!--Style Switcher -->
<script src="<?= base_url('temp/plugins/bower_components/styleswitcher/jQuery.style.switcher.js') ?>"></script>
</body>
</html>
