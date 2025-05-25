<input type="hidden" id="idpublikasi" value="<?= $tabel->id_publikasi?>" name="id">
<div class="col-md-3">
    <div class="form-group">
        <label for="editjenis_publikasi" class="control-label">Jenis Publikasi:</label>
        <select type="text" class="form-control select2" name="editjenis_publikasi" data-placeholder="Pilih">
            <option selected value="<?= $tabel->id_jenispublikasi ?>"><?= $tabel->jenis_publikasi ?></option>
            <?php 
                foreach ($tabelresult as $row){
            ?>
                    <option value="<?= $row->id_jenispublikasi?>"><?= $row->jenis_publikasi ?></option>
            <?php }?>
        </select>
    </div>
</div>
<div class="col-md-9">
    <div class="form-group">
        <label for="url_publikasi" class="control-label">URL:</label>
        <input type="text" class="form-control" value="<?= $tabel->url_publikasi ?>" id="url_publikasi" name="editurl_publikasi" required> 
    </div>
</div>

<div class="col-md-12">
    <div class="form-group">
        <div class="col-md-8" style="margin-left: -12px;">
            <div class="form-group">
                <label>Upload Bukti Publikasi (PDF):</label>
                <div class="fileinput fileinput-new input-group" data-provides="fileinput">
                    <div class="form-control" data-trigger="fileinput"> <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div> <span class="input-group-addon btn btn-default btn-file"> <span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span>
                    <input type="file" name="publikasi[]" multiple> </span> <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                </div>
            </div>
            </div>
        </div>
        <div class="col-md-4">
            <?php
                if(isset($publikasi)){
                $publikasi_en = base64_encode($this->encryption->encrypt($publikasi->path_file));
            ?>
                <button type="button" class="fcbtn btn btn-outline btn-warning btn-1d waves-effect waves-light">
                    <a href="<?= base_url('PelamarCntrl/preview_file/'.$publikasi_en); ?>" target="_blank" style="color:black;">Lihat</a>
                </button>
            <?php
                }else{
            ?>
                <button type="submit" disabled class="fcbtn btn btn-outline btn-default btn-1d waves-effect waves-light">Belum Upload</button>
            <?php
                }
            ?>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
        $('select.form-select').select2();
    });
</script>