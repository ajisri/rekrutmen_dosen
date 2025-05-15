<table class="table" id="table-file">
    <div class="col-sm-12">
        <input type="hidden" value="<?= $id?>" name="id">
        <!-- Repeater Html Start -->
        <div id="repeater">
            <!-- Repeater Heading -->
            <div class="repeater-heading">
                <button type="button" class="btn btn-info pt-5 pull-right repeater-add-btn">
                    Tambah Kualifikasi
                </button>
            </div>
            <div class="clearfix"></div>
            <!-- Repeater Items -->
            <div class="items" data-group="test">
                <!-- Repeater Content -->
                <div class="item-content">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="level" class="control-label">Pilih Kode Kualifikasi:</label>
                                <select type="text" class="form-control" data-skip-name="true" name="kualifikasi[]" required>
                                    <option selected>Pilih Kode Kualifikasi</option>
                                    <?php foreach($tabel->result() as $val){ 
                                        $kode = $val->kode_kualifikasi;
                                        $nm_kualifikasi = $val->nm_kualifikasi;
                                    ?>
                                        <option value="<?= $val->id_kualifikasi ?>"><?= $kode; ?> (<?= $nm_kualifikasi?>)</option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Repeater Remove Btn -->
                <div class="pull-right repeater-remove-btn">
                    <button type="button" onclick="$(this).parents('.items').remove()" class="btn btn-danger remove-btn">
                        Hapus Kualifikasi
                    </button>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <!-- Import repeater js  -->
    <script>
        /* Create Repeater */
        $("#repeater").createRepeater({
            showFirstItemToDefault: true,
            allowClear: true
        });

        $(".select2").select2();
    </script>
</table>
                    