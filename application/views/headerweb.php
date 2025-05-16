<header id="js-header" class="u-header u-header--sticky-top u-header--toggle-section u-header--change-appearance u-shadow-v19">
        <div class="u-header__section g-bg-white g-transition-0_3 g-py-10">
          <nav class="js-mega-menu navbar navbar-expand-lg ">
            <div class="container">
              <!-- Logo -->
              <a class="navbar-brand g-pl-15" href="<?= base_url() ?>">
                <img class="g-width-50" src="<?= base_url('assets/undip.png') ?>" alt="Logo" >
              </a>
              <!-- End Logo -->

              <!-- Responsive Toggle Button -->
              <button class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pos-abs g-top-10 g-right-0 g-pa-0 g-mt-2" type="button"
                      aria-label="Toggle navigation"
                      aria-expanded="false"
                      aria-controls="navBar"
                      data-toggle="collapse"
                      data-target="#navBar">
                <span class="hamburger hamburger--slider g-px-15">
                  <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                  </span>
                </span>
              </button>
              <!-- End Responsive Toggle Button -->

              <!-- Navigation -->
              <div id="navBar" class="collapse navbar-collapse align-items-center flex-sm-row">
                <ul class="navbar-nav ml-auto g-pb-30 g-pb-0--lg">
                  <li class="nav-item g-mx-15 g-mx-3--lg g-mb-5 g-mb-0--lg">
                    <a class="nav-link rounded g-color-twitter--hover g-bg-transparent g-bg-main--hover g-font-secondary g-font-weight-600 g-font-size-18 g-px-14 g-py-10" href="<?= base_url() ?>">
                      Home
                    </a>
                  </li>
                  </li>
                  <li class="nav-item g-mx-15 g-mx-3--lg g-mb-5 g-mb-0--lg">
                    <a class="nav-link rounded g-color-twitter--hover g-bg-transparent g-bg-main--hover g-font-secondary g-font-weight-600 g-font-size-18 g-px-14 g-py-10" data-toggle="modal" data-target="#panduan">
                      Panduan
                    </a>
                  </li>
                  <li class="nav-item g-mx-15 g-mx-3--lg g-mb-5 g-mb-0--lg">
                    <a class="nav-link rounded g-color-twitter--hover g-bg-transparent g-bg-main--hover g-font-secondary g-font-weight-600 g-font-size-18 g-px-14 g-py-10" href="<?= base_url('lupa') ?>">
                      Lupa Password
                    </a>
                  </li>
                  
                  <?php
                    //if ($date >= $dateawal and $date < $dateakhir) {
                  //?>
                    <li class="nav-item g-mx-15 g-mx-3--lg g-mb-5 g-mb-0--lg">
                    <a class="nav-link rounded g-color-twitter--hover g-bg-transparent g-bg-main--hover g-font-secondary g-font-weight-600 g-font-size-18 g-px-14 g-py-10" href="<?=  site_url('register') ?>">
                      Pendaftaran
                    </a>
                  </li>
                  <?php
                    //}
                  //?>

                  <?php if($this->session->userdata('username') != null){?>
                    <li class="nav-item g-mx-15 g-mx-3--lg g-mb-5 g-mb-0--lg">
                      <a class="nav-link d-inline-block rounded g-brd-around g-brd-2 g-brd-primary g-color-primary--hover g-bg-transparent g-bg-main--hover g-font-weight-600 g-font-size-15 g-px-20 g-py-8" href="<?= site_url('dashboard') ?>">
                        <?= $this->session->userdata('username') ?>
                      </a>
                    </li>
                  <?php }else{ ?>
                    <li class=" nav-item g-mx-15 g-mx-3--lg g-mb-5 g-mb-0--lg" data-animation-in="fadeIn" data-animation-out="fadeOut" data-position="right">
                      <a id="" class="nav-link rounded g-color-twitter--hover g-bg-transparent g-bg-main--hover g-font-secondary g-font-weight-600 g-font-size-18 g-px-14 g-py-10" href="<?= site_url('login') ?>" aria-haspopup="true" aria-expanded="false">Login</a>
                         <!--  <?php
                            $date = date("Y-m-d H:i:s");
                            $dateawal = date('Y-m-d H:i:s', strtotime("16-12-2021"));
                    		$dateakhir = date('Y-m-d H:i:s', strtotime("25-01-2022"));
                          ?> -->
                          <!-- <?php
                            if ($date >= $dateawal and $date < $dateakhir) {
                          ?>
                          <div class="text-center mb-3">
                            <h3 class="h5">Belum memiliki akun ?</h3>
                          </div>

                          <div class="row no-gutters">
                            <div class="col">
                              <a class="btn btn-block u-btn-twitter g-font-weight-600 g-font-size-12 text-uppercase g-rounded-left-0 g-rounded-right-3 g-px-25 g-py-13" href="<?= base_url('register') ?>">
                                Register
                              </a>
                            </div>
                          </div>
                        <?php }?> -->
                    </li>
                  <?php }?>
                </ul>
              </div>
              <!-- End Navigation -->
            </div>
          </nav>
        </div>
      </header>

      <div id="panduan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4> </div>
                <div class="modal-body">
                    <div class="row">
                    	<div class="col-md-12">
                        <div class="form-group">
                          <label for="nama" class="control-label"><b style="color:red">Penting. Gunakan Laptop / Komputer untuk submit pendaftaran dan pastikan koneksi internet anda stabil</b></label>
							<label for="nama" class="control-label"><b style="color:red">Penting. Pantau pengumuman resmi untuk melihat kode lowongan.</b></label>
                            <label for="nama" class="control-label"><b style="color:red">Penting. Siapkan terlebih dahulu berkas yang telah discan sebelum melakukan pengisian data</b></label>
							<label for="nama" class="control-label"><b style="color:red">Download Surat Pernyataan Tidak Pernah Menjadi Anggota dan Pengurus Organisasi Terlarang <a href="<?php echo base_url('assets/file/pengumuman/Surat Pernyataan bebas parpol.docx') ?>" target="_blank">Disini</a><br></b></label>
							<label for="nama" class="control-label"><b style="color:red">Download Surat Pernyataan Bebas dari perjanjian/kontrak/ikatan instansi <a href="<?php echo base_url('assets/file/pengumuman/Surat Pernyataan bebas dari instansi.docx') ?>" target="_blank">Disini</a><br></b></label>
						</div>
                        <div class="form-group">
                            <label for="nama" class="control-label">Berkas yang perlu discan: KTP Asli, Ijazah dan Transkrip Asli (sesuai persyaratan), Akreditasi Perguruan Tinggi (Khusus lulusan dalam negeri), Akreditasi Prodi (Khusus lulusan dalam negeri), Penyetaraan Ijazah dari Kementerian (Khusus lulusan luar negeri), Surat Lamaran, Surat Keterangan Sehat, Surat Keterangan Catatan Kepolisian (yang masih berlaku), Surat Pernyataan Tidak Pernah Mejadi Anggota Dan Pengurus Organisasi Terlarang, Surat Pernyataan Bebas dari ikatan instansi, dan Pas photo dengan latar belakang merah</label>
                <!-- <label for="nama" class="control-label">Pelamar dengan syarat Sarjana Profesi bisa diisikan pada form Sarjana dengan format "nama </label> -->
                        </div>
                        <div class="form-group">
                            <label for="nama" class="control-label">Ukuran masing-masing file maksimal 400 Kb dengan format PDF atau JPG</label>
                        </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">1. Persiapan Pendaftaran (Menggunakan Komputer/ Laptop) </label>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">2. Masukan NIK (Nomor Induk Kependudukan)</label>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">3. Masukan Email</label>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">4. Masukan Password Anda</label>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">5. Lengkapi isian pendaftaran</label>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">6. Upload semua dokumen yang dibutuhkan</label>
                          </div>
                      </div>
                      <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">7. Submit Lamaran pada menu Resume (Setuju dengan ketentuan yang ada)</label>
                          </div>
                      </div>
					  <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">8. Pantau secara berkala laman <a href="http://dsdm.undip.ac.id" "target"="_blank">Direktorat Sumber Daya Universitas Diponegoro</a> dan <a href="https://dsdm.undip.ac.id/" "target"="_blank">Rekrutmen SDM Universitas Diponegoro untuk update informasi seputar rekrutmen.</b></a></label>
                          </div>
                      </div>
                      <!-- <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">8. Wajib untuk cetak formulir dan cek list</label>
                          </div>
                      </div> -->
                      <div class="col-md-12">
                          <div class="form-group">
                              <!--<label for="nama" class="control-label"><b style="color:red">Gunakan browser terbaru</b></label>-->
                              <!--<label for="nama" class="control-label"><b style="color:red">Harap sesuaikan dengan petunjuk.</b></label><br>-->
                              <label for="nama" class="control-label"><b style="color:red">Perbarui informasi secara berkala pada laman <a href="http://dsdm.undip.ac.id" "target"="_blank">Direktorat Sumber Daya Universitas Diponegoro</a> dan <a href="https://dsdm.undip.ac.id/" "target"="_blank">Rekrutmen SDM Universitas Diponegoro.</b></a></label><br>
                              <!-- <label for="nama" class="control-label"><b style="color:red">Bantuan : 083110110095</b></label> -->
                              <!-- <label for="nama" class="control-label"><b>Bagi Pelamar yang sudah mengisi form isian pendaftaran, namun pada menu cetak (setelah login) tetap kosong, silahkan isi form pendaftaran kembali </b></label>
                              <label for="nama" class="control-label"><b>Bagi Pelamar yang sudah mencetak formulir, diharapkan mencetak formulir ulang sebelum tanggal 3 Oktober 2019 </b></label> -->

                          </div>
                      </div>
                      <!-- <div class="col-md-12">
                          <div class="form-group">
                              <label for="nama" class="control-label">Deskripsi :</label>
                              <textarea class="form-control" id="infodeskripsi" name="deskripsi" disabled=""></textarea>
                          </div>
                      </div> -->
                    </div>
                </div>
                <div class="modal-footer">
                </form>
                </div>
            </div>
        </div>
    </div>

    <div id="penutupan" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title"></h4> </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h4><b><p class="text-center">Pendaftaran Ditutup</p></b></h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                </form>
                </div>
            </div>
        </div>
    </div>