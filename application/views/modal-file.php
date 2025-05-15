<div id="addUserModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Tambah User</h4> </div>
            <div class="modal-body">
                <form id="add-user" action="#" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama:</label>
                            <input type="text" class="form-control" name="nama_user" required> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-md-12">
                                <div class="form-group">
                                    <label for="nama" class="control-label">Tugas Verifikasi:</label>
                                    <select class="select2 m-b-10 select2-multiple" multiple="multiple" name="tugas[]" data-placeholder="Choose">
                                        <!--<?php foreach($formasi as $val){ ?>
                                            <option value="<?= $val->id_kualifikasi ?>"><?= $val->kode_kualifikasi.' '.$val->nm_kualifikasi ?></option>
                                        <?php } ?>-->
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Tambah</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="fileModalPelamar" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">FILE BERKAS <?= $title ?></h4> </div>
                <div class="modal-body">
                    <form id="file-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                        </div>
                        <div class="col-md-12">
                            <div id="file-pelamar">

                            </div>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="infoRekrutmen" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">INFO</h4> </div>
                <div class="modal-body">
                    <form id="file-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>Pengumuman tanggal tes dapat dilihat pada laman <a href="https://kepegawaian.undip.ac.id/hasil-verifikasi-berkas-online-peserta-tes-seleksi-tenaga-kependidikan-kontrak-universitas-diponegoro-tahun-2020/" target="_blank"> https://kepegawaian.undip.ac.id/</a></p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Tutup</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitlamaranModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Persetujuan</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
								Dengan ini menyatakan bahwa data yang saya isikan adalah yang sebenar-benarnya. 
								Saya setuju dengan segala ketentuan yang ditetapkan oleh panitia penerimaan Universitas Diponegoro 
								dan bersedia menerima sanksi pembatalan kelulusan apabila data yang diisikan tidak benar.<b/></h4>
                                <br /><h5><b>Dengan klik "Submit Data", anda telah menyetujui pernyataan yang ada. Cek kembali data yang anda masukkan dengan teliti, anda tidak dapat mengubah data yang telah anda submit.</b></h5>
							</p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Submit Data</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitlamarankosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Surat Lamaran tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitktpkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File KTP tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitfotokosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Foto tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitskskosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Surat Keterangan Sehat tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitskckkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Surat Keterangan Catatan Kepolisian tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitsuratpernyataanbebasparpolkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Surat Pernyataan bebas dari organisasi terlarang tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitsuratpernyataanbebasdariinstansikosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Surat Pernyataan Bebas dari ikatan instansi tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitijazahkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Ijazah Sarjana tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submittranskripkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Transkrip Sarjana tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitpenyetaraankosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Penyeteraan Sarjana tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasiptkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Perguruan Tinggi Sarjana tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasipskosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Program Studi Sarjana tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitijazah1kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Ijazah Sarjana Profesi tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submittranskrip1kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Transkrip Sarjana Profesi tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitpenyetaraan1kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Penyeteraan Sarjana Profesi tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasipt1kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Perguruan Tinggi Sarjana Profesi tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasips1kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Program Studi Sarjana Profesi tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitijazah2kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Ijazah Magister tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submittranskrip2kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Transkrip Magister tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitpenyetaraan2kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Penyeteraan Magister tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasipt2kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Perguruan Tinggi Magister tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasips2kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Program Studi Magister tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitijazah3kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Ijazah Doktor tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submittranskrip3kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Transkrip Doktor tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitpenyetaraan3kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Penyeteraan Doktor tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasipt3kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Perguruan Tinggi Doktor tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submitakreditasips3kosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Akreditasi Program Studi Doktor tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div id="submittoeflkosongModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
                <div class="modal-body">
                    <form id="submit-data" action="#" method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-12">
                            <p>
                               <h5><b>File Sertifikat Toefl tidak ada.</b></h5>
                            </p>
                        </div>
                    </div>
                </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Periksa Kembali</button>
            </form>
            </div>
        </div>
    </div>
</div>