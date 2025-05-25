<!DOCTYPE html>
<html lang="en">

    <?php include('headweb.php'); ?>

    <body>
        <main>
            <!-- Header -->
            <?php include('headerweb.php'); ?>
            <!-- End Header -->

            <div class="container g-pt-10">
          <div class="row justify-content-between align-items-center">
            <div class="col-md-6 col-lg-7 g-mb-80">
              <!-- Content Info -->
              <!--<div class="mb-0">
                <h1 class="g-color-white g-font-weight-600 g-font-size-50 mb-3">Rekrutmen SDM Undip</h1>
                <h1 class="g-color-white g-font-weight-600 g-font-size-50 mb-3">Register</h1>
              </div>-->
              <!-- End Content Info -->
            </div>
          </div>
        </div>
            <!-- End Promo Banner -->

            <!-- Breadcrumbs -->
            <section class="g-brd-bottom g-brd-gray-light-v4 g-py-30">
        <div class="container">
          <ul class="d-flex justify-content-between u-list-inline">
            <li class="list-inline-item g-mr-15">
              <a class="u-link-v5 g-color-text g-pr-10" href="#">Home</a>
              <i class="g-color-gray-light-v2 g-ml-5 fa fa-angle-right"></i>
            </li>
            <li class="list-inline-item g-color-primary">
              <span>Lupa Password</span>
            </li>
            <li class="list-inline-item ml-auto">
              
            </li>
          </ul>
        </div>
      </section>
            <!-- End Breadcrumbs -->
		<div class="dzsparallaxer auto-init height-is-based-on-content use-loading mode-scroll loaded dzsprx-readyall" data-options='{direction: "reverse", settings_mode_oneelement_max_offset: "150"}'></div>
			<div class="container g-pt-50">
				<div class="row justify-content-between align-items-center">
      
            <!-- Hire Us -->
            <div class="col-lg-6 g-mb-30">
			  <div class="container g-pb-140 g-pt-20">
				<div class="row justify-content-center">
				  <div class="col-lg-9">
                        <div class="col-xs-12">
                            <!--<h3>Reset Password</h3>-->
                            <!-- <p class="text-muted g-font-size-13">Masukkan Email dan instruksi akan disampaikan di email anda! </p>-->
                        </div>
                        <!-- Hire Us Form -->
                        <!--<form id="add-user" action="#" method="POST" enctype="multipart/form-data">-->
                        <form id="add-user" method='POST'>
                            <!-- Forms -->
                            <li class="row no-gutters g-brd-gray-light-v4 g-py-20">
                                <div class="col-sm-4 g-mb-30 g-mb-0--sm">
                                    <h3 class="h5 mb-0">NIK</h3>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control g-brd-gray-light-v3 g-bg-secondary g-px-20 g-py-14" type="text" name="nik" id="nik" maxlength="16" minlength="16" placeholder="Masukkan NIK" required>
                                </div>
                            </li>
                            <li class="row no-gutters g-brd-gray-light-v4 g-py-40">
                                <div class="col-sm-4 g-mb-30 g-mb-0--sm">
                                    <h3 class="h5 mb-0">Password Baru</h3>
                                </div>
                                <div class="col-sm-8">
                                    <input class="form-control g-brd-gray-light-v3 g-bg-secondary g-px-20 g-py-14" type="text" name="password" id="email_reset" placeholder="Masukkan Password Baru" required>
                                </div>
                            </li>

                            <!--                <li class="row no-gutters g-brd-bottom g-brd-gray-light-v4 g-py-50">
                                              <div class="col-sm-6 g-mb-30 g-mb-0--sm">
                                                <h3 class="h5 mb-0">Password Baru</h3>
                                              </div>
                                              <div class="col-sm-6">
                                                <input class="form-control g-brd-gray-light-v3 g-bg-secondary g-px-20 g-py-14" type="password" name="password" placeholder="Masukkan Password Baru" required>
                                              </div>
                                            </li>-->
                            <!-- End Advanced File Input -->
                            </ul>
                            <!-- End File Inputs -->

                            <button class="btn btn-block u-btn-primary g-brd-main--hover g-bg-main--hover g-font-weight-600 text-uppercase g-px-25 g-py-20" type="submit">
                                Reset Password
                            </button>
                        </form>
                        <!-- End Hire Us Form -->
                    </div>
                </div>
				  </div>
				  </div>
				  <div class="col-lg-6 g-mb-170 g-pt-10">
					<img class="img-fluid" src="<?= base_url('assets/img/19721b.jpeg')?>" style="width: 90%; display: block; border-radius: 8px;">
				  </div>
				  </div>
				   </div>
					</div>
            <!-- End Hire Us -->

            <!-- Promo Block -->

            <!-- End Promo Block -->

            <!-- Footer -->
            <?php include('footerweb.php') ?>
            <!-- End Footer -->

            <!-- Go to Top -->
            <a class="js-go-to u-go-to-v1 g-width-40 g-height-40 g-color-primary g-bg-main-opacity-0_5 g-bg-main--hover g-bg-main--focus g-font-size-12 rounded" href="#" data-type="fixed" data-position='{
               "bottom": 15,
               "right": 15
               }' data-offset-top="400" data-compensation="#js-header" data-show-effect="zoomIn">
                <i class="hs-icon hs-icon-arrow-top"></i>
            </a>
            <!-- End Go to Top -->
        </main>

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
        <?php include('scripts_loading.php'); ?>
        <!-- JS Plugins Init. -->
        <script type="text/javascript">
            $(document).ready(function () {
                $('#add-user').submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData($(this)[0]);
                    $.ajax({
                        url: '<?= site_url('PelamarCntrl/lupa') ?>',
                        data: formData,
                        type: 'POST',
                        contentType: false,
                        processData: false,
                        success: function (data) {
                            if (data['return'] == '2') {
                                setTimeout(function () {
                                    swal({
                                        title: "Success!",
                                        text: "Password Berhasil dirubah",
                                        type: "success"
                                    }, function () {
                                        window.location = "login";
                                    });
                                }, 1000);
                            }

                        }
                    });
                });
            });

            $(document).on('ready', function () {
                // initialization of header
                $.HSCore.components.HSHeader.init($('#js-header'));
                $.HSCore.helpers.HSHamburgers.init('.hamburger');

                // initialization of HSMegaMenu component
                $('.js-mega-menu').HSMegaMenu({
                    event: 'hover',
                    pageContainer: $('.container'),
                    breakpoint: 991
                });

                // initialization of HSDropdown component
                $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                    afterOpen: function () {
                        $(this).find('input[type="search"]').focus();
                    }
                });

                // initialization of popups
                $.HSCore.components.HSPopup.init('.js-fancybox');

                // initialization of carousel
                $.HSCore.components.HSCarousel.init('.js-carousel');

                // initialization of go to
                $.HSCore.components.HSGoTo.init('.js-go-to');
            });
        </script>

        <script type="text/javascript">



        $(document).ready(function () {
            $('.modal').css('overflow-y', 'auto');
//                $(document).ajaxStop($.unblockUI); 

            //UPDATE DATA
            $('#recoverform').on('submit', function (e) {
                var email_reset = $('#email_reset').val();
                var nik = $('#nik').val();
//                    $.blockUI();
//                    $("#btnSubmit").val('Please wait ...').attr("disabled", true);
                e.preventDefault();
                $.ajax({
                    url: "<?php echo base_url('index.php/IndexCntrl/email_reset_password_validation') ?>",
                    type: "POST",
                    data: new FormData(this),
                    processData: false,
                    contentType: false,
                    cache: false,
                    async: true,
                    success: function (hasil) {
                        console.log(hasil);
                        dt = JSON.parse(hasil);
                        $('[name="email_reset"]').val("");
                        $('[name="nik"]').val("");
                        if (dt['result'] === true) {
                            swal({
                                title: "Berhasil",
                                text: "Buka email " + email_reset + " untuk mereset password \n \n *Jika tidak ada pada folder inbox, silakan periksa pada folder spam.",
                                button: "OK",
                                type: 'success'
                            }, function () {
                                window.location.href = "<?php echo base_url('index.php/IndexCntrl') ?>"
                            });
                        } else if (dt['result'] === "email_not_found") {
                            swal({
                                title: "GAGAL",
                                text: "Email & NIK anda tidak terdaftar dalam sistem. ",
                                button: "OK",
                                type: 'error'
                            }, function () {
                                window.location.reload();
                            });
                        } else {
                            swal({
                                title: "GAGAL",
                                text: "Something Wrong",
                                button: "OK",
                                type: 'error'
                            }, function () {
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
