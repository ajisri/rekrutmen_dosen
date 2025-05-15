<div class="navbar-default sidebar" role="navigation">
    <div class="sidebar-nav slimscrollsidebar">
        <div class="sidebar-head">
            <h3><span class="fa-fw open-close"><i class="ti-menu hidden-xs"></i><i class="ti-close visible-xs"></i></span> <span class="hide-menu">Menu</span></h3> </div>
        <ul class="nav" id="side-menu">
            <li class="user-pro">
                <a href="" class="waves-effect">
                    <img src="<?= base_url('temp/plugins/images/users/default.jpg') ?>" alt="user-img" class="img-circle">
                    <span class="hide-menu"> <?= strtoupper($this->session->userdata('nik')) ?></span>
                </a>
            </li>
            <li class="devider"></li>
            <li> <a href="<?= site_url('dashboard') ?>" class="waves-effect"><i class="mdi mdi-home fa-fw" data-icon="v"></i> <span class="hide-menu"> Home</span></a>
            </li>
        <?php if ($this->session->userdata('level') == 1) {?>
            <li class="devider"></li>
            <li> <a href="<?= site_url('bahan_verifikasi') ?>" class="waves-effect"><i class="fa fa-building fa-fw" data-icon="v"></i> <span class="hide-menu"> Kelola Bahan Verifikasi</span></a></li>
			<li class="devider"></li>
			<li> <a href="<?= site_url('pelamar') ?>" class="waves-effect"><i class="fa fa-credit-card fa-fw" data-icon="v"></i> <span class="hide-menu"> Kelola Pelamar</span></a></li>
            <!--<?= site_url('pelamarlolosonline') ?>-->
			<li> <a href="<?= site_url('pelamarlolosonline') ?>" class="waves-effect"><i class="fa fa-print fa-fw" data-icon="v"></i> <span class="hide-menu"> Buat Nomor Ujian</span></a>
            <!--<?= site_url('pelamartahaptiga') ?>-->
			<li> <a href="<?= site_url('pelamartahaptiga') ?>" class="waves-effect"><i class="mdi mdi-account fa-fw" data-icon="v"></i> <span class="hide-menu"> Data SKD & SKB</span></a>
            <!--<?= site_url('pelamartahapempat') ?>-->
            <li> <a href="<?= site_url('pelamartahapempat') ?>" class="waves-effect"><i class="fa-fw" data-icon="v">W</i> <span class="hide-menu"> Data Wawancara</span></a>    
            <li> <a href="<?= site_url('user') ?>" class="waves-effect"><i class="mdi mdi-account-multiple fa-fw" data-icon="v"></i> <span class="hide-menu"> User</span></a>
        <?php }else if($this->session->userdata('level') == 2){ ?>
            <li class="devider"></li>
            <li> <a href="<?= site_url('PelamarCntrl') ?>" class="waves-effect"><i class="fa fa-credit-card fa-fw" data-icon="v"></i> <span class="hide-menu"> Kelola Pelamar</span></a>
        <?php }else if ($this->session->userdata('level') == 3){?>
            <li class="devider"></li>
            <li> <a href="<?= site_url('pelamar') ?>" class="waves-effect"><i class="fa fa-files-o fa-fw" data-icon="v"><span class="heartbit"></span><span class="point"></span></i> <span class="hide-menu"> Cetak Kartu Ujian</span></a>
		<!-- asesor -->
        <?php }else if($this->session->userdata('level') == 4){ ?>
            <li class="devider"></li>
            <li> <a href="<?= site_url('PelamarCntrl') ?>" class="waves-effect"><i class="fa fa-credit-card fa-fw" data-icon="v"></i> <span class="hide-menu"> Resume Pelamar</span></a>
        <?php } ?>
            <li class="devider"></li>
            <li><a href="javascript:void(0)" data-toggle="modal" data-target=".logoutModal" class="waves-effect"><i class="mdi mdi-logout fa-fw"></i> <span class="hide-menu">Log out</span></a></li>
            <li class="devider"></li>
        </ul>
    </div>
</div>
<div class="modal fade logoutModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-body">
                <h5>Apakah anda yakin untuk logout ?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <a type="button" class="btn btn-danger waves-effect waves-light" href="<?= site_url('logout') ?>">Logout</a>
            </div>
        </div>
    </div>
</div>