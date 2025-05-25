<div class="modal fade hapusUserModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Hapus Publikasi</h5> </div>
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

<div id="editPublikasiModal" class="modal fade" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Edit Publikasi</h4> </div>
            <div class="modal-body">
                <form id="edit-publikasipelamar" action="<?= base_url('UserCntrl/editData')?>" id="edit-publikasi" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div id="editm-publikasi">

                        </div>
                    </div>  
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-success waves-effect waves-light" id="editf-publikasi">Edit</button>
            </form>
            </div>
        </div>
    </div>
</div>