<?php
    foreach($query->result() as $row){
        if($row->pendidikan == "D4"){
			$pendidikane = "D4";
		}else if($row->pendidikan == "S1"){
			$pendidikane = "S1";
		}
		if($row->pendidikan1 == "S1 Profesi"){
			$pendidikane1 = "S1 Profesi";
		}
		if($row->pendidikan2 == "S2"){ 
			$pendidikane2 = "S2";
		}else if($row->pendidikan2 == "S2 Terapan"){ 
			$pendidikane2 = "S2 Terapan";
		}else if($row->pendidikan2 == "SP-1"){ 
			$pendidikane2 = "SP-1";
		}
		if($row->pendidikan3 == "S3"){ 
			$pendidikane3 = "S3";
		}else if($row->pendidikan3 == "S3 Terapan"){ 
			$pendidikane3 = "S3 Terapan";
		}else if($row->pendidikan3 == "SP-2"){ 
			$pendidikane3 = "SP-2";
		}

        $tanggal = new DateTime($row->tanggal_lahir);

        // tanggal hari ini
        $today = new DateTime('2022-01-01');

        // tahun
        $y = $today->diff($tanggal)->y;

        // bulan
        $m = $today->diff($tanggal)->m;

        // hari
        $d = $today->diff($tanggal)->d;
?>
<!-- <div class="col-md-12">
    <div class="form-group">
        <label for="nama" class="control-label">Nama Pelamar :</label>
        <input type="text" class="form-control" value="<?= $row->nama_pelamar?>&nbsp;(<?=$pendidikane.'-'.$row->prodi ?>;&nbsp;<?= $pendidikane2.'-'.$row->prodi2?>)<?php if($row->ipk3 != 0){?>;&nbsp;<?php $pendidikane3.'-'.$row->prodi3;}else{}?>" disabled>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="nama" class="control-label">Formasi:</label>
        <input type="text" class="form-control" value="<?= $row->nm_kualifikasi ?>&nbsp;(<?= $row->kode_kualifikasi?>-<?= $row->penempatan?>)" disabled> 
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="nama" class="control-label">Tanggal Lahir :</label>
        <input type="text" class="form-control" value="<?= date('d-m-Y', strtotime($row->tanggal_lahir)).' (Umur: ' . $y . ' th ' . $m . ' bln ' . $d . ' hari)';?>" disabled>
    </div>
</div>
<div class="col-md-12">
    <div class="form-group">
        <label for="nama" class="control-label">Syarat Jenjang dan Pendidikan :</label>
        <textarea class="form-control" rows="6" value="" disabled><?= $row->jenjang?><?=("\n")?>Syarat Pendidikan Awal:&nbsp;<?= $row->syarat_pend_awal?><?=("\n")?>Syarat Pendidikan Akhir:&nbsp;<?= $row->syarat_pend_akhir?></textarea>
    </div>
</div>
<?php }?>-->
<div class="col-md-12">
    <div class="form-group">
        <table class="table" id="table-file" border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th style="text-align: left">Nama File</th>
                    <th style="text-align: left">File</th>
                    <!-- <th width="30%">Keterangan</th> -->
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
                        <td style="text-align: left"><?= $value->nama_file ?></td>
                        <td style="text-align: left">
                            <a href="<?= site_url('')?><?= $value->path_file?> " class="editData" id="<?= $value->id_file ?>" target="_blank"><button type="button" class="btn btn-success btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Lihat File"><i class="ti-file"></i></button></a>
                            <!-- <a href="#" class="tolakMou" data-toggle="modal" data-target=".tolakMouModal" id="<?=htmlspecialchars($value->id_kerjasama); ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Tolak MOU"><i class="ti-close"></i></button></a> -->
                        </td>
                        <!-- <td class="form-group">
                            <select type="text" class="form-control select2" name="kesesuaian[]" id="panel-heading" required>
                                <option value="Sesuai Kualifikasi">Sesuai Kualifikasi</option>
                                <option value="Tidak Sesuai Kualifikasi">Tidak Sesuai Kualifikasi</option>
                            </select>  
                        </td> -->
                        <input type="hidden" class="form-control" name="nik[]" value="<?= $value->id_file?>">
                    </tr>
                    <?php }
                }else{ ?>
                <tr>
                    <td colspan="3" class="text-center">No Data Available</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>
<hr>
<!--<div class="col-md-6">
    <div class="form-group">
        <label for="nama" class="control-label">Keterangan </label>
        <textarea class="form-control keterangan" name="keterangan" id="keterangan" placeholder="Isikan alasan diloloskan atau tidak diloloskan" required></textarea>
    </div>
</div>
<input type="hidden" class="form-control" name="id" value="<?= $tabel?>">

 <div class="col-md-6">
    <div class="form-group">
        <a href="#" class="setuju" data-toggle="modal" data-target=".setujuModal" id="<?= $tabel?>"><button type="button" id="cekstatussetuju" class="btn btn-success btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-check"></i>&nbsp; Loloskan Pelamar</button></a>
        <a href="#" class="tolak" data-toggle="modal" data-target=".tolakModal" id="<?= $tabel?>"><button type="button" id="cekstatustidak" class="btn btn-danger btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-close"></i>&nbsp; Tidak Loloskan Pelamar</button></a>
    </div>
</div>

<?php
    foreach($query->result() as $row){
        $status = $row->status;

        if($status == 1){
            $statuse = "Lolos";
        }else if($status == 2){
            $statuse = "Tidak Lolos";
        }else{
            $statuse = "Sedang Proses";
        }

        if($status == '3'){
?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama" class="control-label">Keterangan Pelamar :</label>
                <span><button type="button" id="info-status" class="btn btn-default btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip">SEDANG PROSES</button></span>
            </div>
            <button type="submit" class="btn btn-success g-brd-main--hover g-bg-main--hover g-font-weight-900 text-uppercase g-px-25 g-py-20 waves-effect waves-light">Verifikasi</button>
        </div>
    </div>
<?php 
    }elseif($status == 1){
?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama" class="control-label">Keterangan Pelamar :</label>
                <span><button type="button" id="info-status" class="btn btn-success btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-check"></i></button></span>
            </div>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light">Verifikasi</button>
    </div>
<?php 
    }elseif($status == 2){
?>
    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="nama" class="control-label">Keterangan Pelamar :</label>
                <span><button type="button" id="info-status" class="btn btn-danger btn-outline btn-sm m-r-5 dotip" data-toggle="tooltip"><i class="ti-close"></i></button></span>
            </div>
        </div>
        <button type="submit" class="btn btn-success waves-effect waves-light">Verifikasi</button>
    </div>
<?php
    }
?>
<?php }?>-->