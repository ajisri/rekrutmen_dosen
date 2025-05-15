<nav class="navbar navbar-default navbar-static-top m-b-0" >
    <div class="navbar-header" style="background: #052c52">
        <div class="top-left-part" style="width: 30%">
            <!-- Logo -->
            <a class="logo" href="<?= site_url('') ?>">
                <!-- Logo icon image, you can use font-icon also --><b>
                <!--This is dark logo icon--><img src="<?= base_url('assets/undip.png') ?>" alt="home" class="dark-logo" width="30" style="margin-left: 5px;margin-bottom: 5px"/><!--This is light logo icon--><img src="<?= base_url('assets/undip.png') ?>" alt="home" class="light-logo" />
             </b>
                <!-- Logo text image you can use text also --><span class="hidden-xs">
                <!--This is dark logo text--><span style="margin-left: 8px;font-weight: bold">REKRUTMEN SDM UNDIP</span><!--This is light logo text--><img src="<?= base_url('assets/undip.png') ?>" alt="home" class="light-logo" />
             </span> </a>
        </div>
        <!-- /Logo -->
        <!-- Search input and Toggle icon -->
        <ul class="nav navbar-top-links navbar-left">
            <li><a href="javascript:void(0)" class="open-close waves-effect waves-light visible-xs"><i class="ti-close ti-menu"></i></a></li>
        </ul>
        <ul class="nav navbar-top-links navbar-right pull-right">
            <li class="dropdown">
                <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#"> <img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" alt="user-img" width="36" class="img-circle"><b class="hidden-xs"><?= strtoupper($this->session->userdata('nik')); ?></b><span class="caret"></span> </a>
                <ul class="dropdown-menu dropdown-user animated slideInDown">
                    <li>
                        <div class="dw-user-box">
                            <div class="u-img"><img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" alt="user" /></div>
                            <div class="u-text">
                                <h4><?= strtoupper($this->session->userdata('nik')); ?></h4>
                        </div>
                    </li>
                    <li role="separator" class="divider"></li>
                    <li><a href="#" data-toggle="modal" data-target=".logoutModal"><i class="fa fa-power-off"></i> <?= strtoupper($this->session->userdata('nik')) ?></a></li>
                </ul>
                <!-- /.dropdown-user -->
            </li>
            <!-- /.dropdown -->
        </ul>
    </div>
    <!-- /.navbar-header -->
    <!-- /.navbar-top-links -->
    <!-- /.navbar-static-side -->
</nav>