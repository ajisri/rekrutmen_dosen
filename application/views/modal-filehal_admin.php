<div id="fileModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">FILE BERKAS <?= $title ?></h4> 
            </div> -->
                <div class="modal-body">
                    <div id="slimtest4">
                        <?php
                            $level = $this->session->userdata('level');
                            if($level == 1){
                        ?>
                        <form id="form_keterangan" enctype="multipart/form-data">
                        <?php
                            }else if($level == 2){
                        ?>
                        <form id="form_keterangan_verifikator" enctype="multipart/form-data">
                        <?php
                            }
                        ?>
                        <div class="row">
                            <div class="col-md-12">
                                <div id="file-hal_admin">

                                </div>
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

<div id="infoPelamarModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info Pelamar</h4> </div>
            <div class="modal-body">
                <form id="info-ajuan" novalidate="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Surat Lamaran :</label>
                            <input type="text" class="form-control" id="verif_lamaran" disabled> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">KTP :</label>
                            <input type="text" class="form-control" id="verif_ktp" disabled> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Foto :</label>
                            <input type="text" class="form-control" id="verif_foto" disabled> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Surat Keterangan Sehat :</label>
                            <input type="text" class="form-control" id="verif_sks" disabled> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Surat Keterangan Catatan Kepolisian :</label>
                            <input type="text" class="form-control" id="verif_skck" disabled> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Surat Pernyataan Bebas Partai Politik :</label>
                            <input type="text" class="form-control" id="verif_suratpernyataanbebasparpol" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Tempat Lahir :</label>
                            <input type="text" class="form-control" id="infotempat_lahir" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Tanggal Lahir (Di atas 1 Oktober 1989):</label>
                            <input type="text" class="form-control" id="infotanggal_lahir" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Email :</label>
                            <input type="text" class="form-control" id="infoemail" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Jenis Kelamin :</label>
                            <input type="texttext" class="form-control" id="infojenis_kelamin" name="jml_barang" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Agama :</label>
                            <input type="texttext" class="form-control" id="infoagama" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nomor HP :</label>
                            <input type="text" class="form-control" id="infono_telepon" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Pendidikan Terakhir :</label>
                            <input type="text" class="form-control" id="infopendidikan" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nomor Ijazah :</label>
                            <input type="text" class="form-control" id="infonmr_ijazah" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Nama Kampus :</label>
                            <input type="text" class="form-control" id="infonm_kampus" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Akreditasi Kampus :</label>
                            <input type="text" class="form-control" id="infoakreditasi_kampus" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Jurusan :</label>
                            <input type="text" class="form-control" id="infojurusan" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Akreditasi Jurusan :</label>
                            <input type="text" class="form-control" id="infoakreditasi_jurusan" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">IPK :</label>
                            <input type="text" class="form-control" id="infoipk" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Tahun Lulus :</label>
                            <input type="text" class="form-control" id="infothn_lulus" disabled> 
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">TOEFL :</label>
                            <input type="text" class="form-control" id="infotoefl" disabled> 
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

<div class="modal fade bukaaksesModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Buat Berita Acara</h5> </div>
            <div class="modal-body">
                <form id="info-nama" enctype="multipart/form-data">
                <h4>Apakah anda yakin untuk <b>MENGUBAH STATUS</b> PELAMAR?</h4>
                <small style="color: red">Anda akan <b>MENGUBAH STATUS a.n </b></small>
                <input type="text" class="form-control" id="nama_pelamar" disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="buka-pelamar">Iya!</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade setujuModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">KESIMPULAN</h5> </div>
            <div class="modal-body">
                <h4>Apakah anda yakin untuk <b>MELOLOSKAN</b> PELAMAR ?</h4>
                <small style="color: red">Anda akan <b>MELOLOSKAN</b> PELAMAR</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <?php
                    $level = $this->session->userdata('level');
                    if($level == 1){
                ?>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="setuju-pelamar">Iya</button>
                <?php
                    }else if($level == 2){
                ?>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="setuju-verifikator">Iya</button>
                <?php }?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade tolakModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">KESIMPULAN</h5> </div>
            <div class="modal-body">
                <h4>Apakah anda yakin untuk <b>TIDAK MELOLOSKAN</b> PELAMAR ?</h4>
                <small style="color: red">Anda akan <b>TIDAK MELOLOSKAN</b> PELAMAR</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <?php
                    $level = $this->session->userdata('level');
                    if($level == 1){
                ?>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="tolak-pelamar">Iya</button>
                <?php
                    }else if($level == 2){
                ?>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="tolak-verifikator">Ya, Tolak Pelamar</button>
                <?php }?>
            </div>
        </div>
    </div>
</div>