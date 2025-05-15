<input type="hidden" id="iduser" value="<?= $tabel->id_user?>" name="id">
<div class="col-md-6">
    <div class="form-group">
        <label for="nama" class="control-label">NIK :</label>
        <input type="text" class="form-control" value="<?= $tabel->nik ?>" id="nik" name="editnik" required> 
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="nama" class="control-label">Nama:</label>
        <input type="text" class="form-control" value="<?= $tabel->nm_user ?>" id="nama" name="editnm_user" required> 
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="infojam" class="control-label">Password:</label> 
        <input type="text" class="form-control" value="<?= $tabel->password_tampil ?>" id="password" name="editpassword">
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="nama" class="control-label">Tugas Verifikasi:</label>
        <select class="js-example-basic-multiple" multiple="multiple" name="edittugas[]" data-placeholder="Pilih">
            <?php 
                foreach ($formasi as $row){
            ?>
                    <option value="<?= $row->id_kualifikasi?>" <?= in_array($row->id_kualifikasi, $listkualifikasi) ? 'selected' : '' ?>><?= $row->kode_kualifikasi.' '.$row->nm_kualifikasi?></option>
                }
            <?php }?>
        </select>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>