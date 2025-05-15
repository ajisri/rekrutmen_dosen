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
                        <div class="form-group">
                            <label for="nama" class="control-label">NIK (Username):</label>
                            <input type="text" class="form-control" name="nik" required> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="infojam" class="control-label">Password:</label>
                            <input type="password" class="form-control" name="password_user" required> 
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-12 col-md-12">
                                <div class="form-group">
                                    <label for="nama" class="control-label">Tugas Verifikasi:</label>
                                    <select class="select2 m-b-10 select2-multiple" multiple="multiple" name="tugas[]" data-placeholder="Choose">
                                        <?php foreach($formasi as $val){ ?>
                                            <option value="<?= $val->id_kualifikasi ?>"><?= $val->kode_kualifikasi.' '.$val->nm_kualifikasi ?></option>
                                        <?php } ?>
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

<div id="pilihkualifikasiModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">PILIH TUGAS VERIFIKASI</h4> </div>
            <div class="modal-body">
                <span id="success_result"></span>
                <form action="#" id="pilih-kualifikasi" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div id="file-pilihkualifikasi">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Pilih</button>
            </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade hapusUserModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Hapus User</h5> </div>
            <div class="modal-body">
                <h4>Apakah anda yakin untuk menghapus user ?</h4>
                <small style="color: red">semua data user akan ikut terhapus</small>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <a type="button" class="btn btn-danger waves-effect waves-light" id="hapus-user">Hapus</a>
            </div>
        </div>
    </div>
</div>

<div id="editUserModal" class="modal fade" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit User</h4> </div>
            <div class="modal-body">
                <form id="edit-user" action="<?= base_url('UserCntrl/editData')?>" id="edit-useradmin" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div id="edit-tugasuser">

                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success waves-effect waves-light" id="edit-user">Edit</button>
            </form>
            </div>
        </div>
    </div>
</div>