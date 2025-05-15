<table class="table" id="table-file">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama File</th>
            <th>File</th>
        </tr>
    </thead>
    <tbody>
        <?php 
        if($tabel_file->result()){
        $i = 0;
            foreach($tabel_file->result() as $value){
            $i++;
            ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $value->nama_file ?></td>
                <td>
                    <a href="<?= site_url('')?><?= $value->path_file?> " class="editData" id="<?= $value->id_file ?>" target="_blank"><button type="button" class="btn btn-success btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Lihat File"><i class="ti-file"></i></button></a>
                    <!-- <a href="#" class="tolakMou" data-toggle="modal" data-target=".tolakMouModal" id="<?=htmlspecialchars($value->id_kerjasama); ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Tolak MOU"><i class="ti-close"></i></button></a> -->
                </td>
            </tr>
            <?php }
        }else{ ?>
        <tr>
            <td colspan="3" class="text-center">No Data Available</td>
        </tr>
        <?php } ?>
    </tbody>
</table>

<!-- <div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="nama" class="control-label">Keterangan Berkas :</label>
            
        </div>
    </div>
</div> -->