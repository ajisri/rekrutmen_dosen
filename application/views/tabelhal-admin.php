<div class="table-responsive">
    <table id="tabell-pelamar" class="display table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center" width="5%">No.</th>
                <th class="text-left" width="20%">Nama</th>
                <!-- <th class="text-center" width="15%">Pendidikan Terakhir</th> -->
                <th class="text-center" width="20%">Lowongan</th>
                <!-- berkas verifikasi -->
                <th class="text-center" width="10%">Berkas</th>
                <!--<th class="text-center" width="20%">Keterangan</th>-->
                <th class="text-center" width="10%">Status</th>
                <th class="text-center" width="20%">Verifikator</th>                
                <th class="text-center" width="25%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $no = 0;
                foreach ($tabel->result() as $value) {
                    $status = $value->status;
                    $level = $this->session->userdata("level");

                    if($status == 1){
                        $statuse = "Lolos";
                    }else if($status == 2){
                        $statuse = "Tidak Lolos";
                    }else{
                        $statuse = "Sedang Proses";
                    }

                    if($value->pendidikan == "D4"){
                        $pendidikane = "D4";
                    }else if($value->pendidikan == "S1"){
                        $pendidikane = "S1";
                    }
                    if($value->pendidikan1 == "S1 Profesi"){
                        $pendidikane1 = "S1 Profesi";
                    }
                    if($value->pendidikan2 == "S2"){ 
                        $pendidikane2 = "S2";
                    }else if($value->pendidikan2 == "S2 Terapan"){ 
                        $pendidikane2 = "S2 Terapan";
                    }else if($value->pendidikan2 == "SP-1"){ 
                        $pendidikane2 = "SP-1";
                    }
                    if($value->pendidikan3 == "S3"){ 
                        $pendidikane3 = "S3";
                    }else if($value->pendidikan3 == "S3 Terapan"){ 
                        $pendidikane3 = "S3 Terapan";
                    }else if($value->pendidikan3 == "SP-2"){ 
                        $pendidikane3 = "SP-2";
                    }
                    $no++;
            ?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td class="text-left"><?= $value->nama_pelamar ?></td>
                <td class="text-left"><?= $value->nm_kualifikasi?>&nbsp;<?= $value->kode_kualifikasi ?>&nbsp;(<?= $value->unit_kerja?>)</td>
				<td class="text-center">
                    <a href="#" class="fileBerkas" data-toggle="modal" data-target="#fileModal" data-backdrop="static" data-keyboard="false" id="<?= $value->id_pelamar ?>" status="<?= $statuse ?>" keterangan="<?= $value->keterangan_berkas ?>"><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="BERKAS"><i class="ti-files"></i></button></a>
                </td>
                <!-- <?php
                    if($status != "3"){
                ?>
                <td class="text-center">
                    <a href="#" class="fileBer" data-toggle="modal" data-target="#fileModalAdmin" data-backdrop="static" data-keyboard="false" id="<?= $value->id_pelamar ?>" statusipun="<?= $statuse ?>" ><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="BERKAS"><i class="ti-files"></i></button></a>
                </td>
				<?php
                    }else if($level == "4"){
                ?>
                <td class="text-center">
                    <a href="#" class="fileBer" data-toggle="modal" data-target="#fileModalAdmin" data-backdrop="static" data-keyboard="false" id="<?= $value->id_pelamar ?>" statusipun="<?= $statuse ?>" ><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="BERKAS"><i class="ti-files"></i></button></a>
                </td>
                <?php
                    }else{
                ?>
                <td class="text-center">
                    <a href="#" class="fileBerkas" data-toggle="modal" data-target="#fileModal" data-backdrop="static" data-keyboard="false" id="<?= $value->id_pelamar ?>" status="<?= $statuse ?>" keterangan="<?= $value->keterangan_berkas ?>"><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="BERKAS"><i class="ti-files"></i></button></a>
                </td>
                <?php }?> -->
                <!--<td class="text-center">
					<a href="#" class="infoPelamar" data-toggle="modal" data-target="#infoPelamarModal" id="<?= $value->id_pelamar; ?>"><button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Info Pelamar"><i class="ti-more"></i></button></a>
					<?= $value->keterangan_berkas ?>
				</td>-->
                <td class="text-center"><?= $statuse ?></td>
                <td class="text-center"><?= $value->verifikator ?></td>
                <td class="text-center" width="10%">
                    <?php
                        if($this->session->userdata('level') == 1 or $this->session->userdata('level') == 2 and $statuse != 3){
                    ?>
						<a href="<?= base_url('PelamarCntrl/hal_verifikasi?id=').$value->id_pelamar ?>"><button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Verifikasi Pelamar"><i class="fa fa-pencil-square-o" ></i></button></a>
                        <a href="<?= base_url('PelamarCntrl/detail?id=').$value->id_pelamar ?>"><button type="button" class="btn btn-primary btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Detail Pelamar"><i class="fa fa-info" ></i></button></a>
                        <a href="#" class="bukaakses" data-toggle="modal" data-target=".bukaaksesModal" data-backdrop="static" data-keyboard="false" id="<?= $value->id_pelamar ?>" nama="<?= $value->nama_pelamar?>"><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Edit Status Pelamar"><i class="fa fa-openid" ></i></button></a>
                    <?php
                        }else if($this->session->userdata('level') == 4 ){
                    ?>
                        <a href="<?= base_url('PelamarCntrl/detail?id=').$value->id_pelamar ?>"><button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Detail Pelamar"><i class="fa fa-info" ></i></button></a>
                    <?php
                        }else{
                    ?>
                        <button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Harap Cetak Formulir"><i class="ti-more" ></i></button>
                    <?php }?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>-->
<script type="text/javascript">
    // function refresh() {
    //     setTimeout(function() {
    //           $('div#file-hal_admin').load ('PelamarCntrl/getDatadua?id=$value->id_pelamar', 'update=true', refresh);
    //     }, 500);
    // }

    // $('.setuju').on('click',function(){
    //     id = $(this).attr('id');
    // });

    // $('.tolak').on('click',function(){
    //     id = $(this).attr('id');
    // });

    $('.bukaakses').on('click',function(){
        id = $(this).attr('id');
        nama = $(this).attr('nama');
        form = $('#info-nama');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getData') ?>',
            data:{
                id:id,
            },
            success:function(data){
                form.find("#nama_pelamar").val(nama);
            }
        });
    });

    // $(document).ready (function () {
    //     $('div#file-hal_admin').load ('PelamarCntrl/getData', 'update=true', refresh);
    // });

    $('.fileBer').on('click',function(){
        id = $(this).attr('id');
        statusipun = $(this).attr('statusipun');
        keterangan = $(this).attr('keterangan');
        form = $('#file-dataa');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getFileadmin') ?>',
            data:{
                id:id,
                statusipun:statusipun,
                keterangan:keterangan
            },
            success:function(data){
                $('#file-admin').html(data);
                form.find('#id').val(id);
                form.find('#statusipun').val(statusipun);
                form.find('#keterangan').val(keterangan);
                tooltip._tooltip();
            }
        });
    });

    $('.infoPelamar').on('click',function(){
        id = $(this).attr('id');
        form = $('#info-ajuan');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getDataPelamardanVerifikasi') ?>',
            data:{id:id},
            success:function(data){
                form.find("#infono_pendaftaran").val(data['no_pendaftaran']);
                form.find("#infoktp").val(data['ktp']);
                form.find("#infokualifikasi").val(data['kualifikasi']);
                form.find("#infogelar_depan").val(data['gelar_depan']);
                form.find("#infonama_pelamar").val(data['nama_pelamar']);
                form.find("#infogelar_belakang").val(data['gelar_belakang']);
                form.find("#infotempat_lahir").val(data['tempat_lahir']);
                form.find("#infotanggal_lahir").val(data['tanggal_lahir']);
                form.find("#infoemail").val(data['email']);
                form.find("#infojenis_kelamin").val(data['jenis_kelamin']);
                form.find("#infoagama").val(data['agama']);
                form.find("#infono_telepon").val(data['no_telepon']);
                form.find("#infopendidikan").val(data['pendidikan']);
                form.find("#infonmr_ijazah").val(data['no_ijazah']);
                form.find("#infonm_kampus").val(data['nm_kampus']);
                form.find("#infoakreditasi_kampus").val(data['akreditasi_kampus']);
                form.find("#infoakreditasi_jurusan").val(data['akreditasi_jurusan']);
                form.find("#infoipk").val(data['ipk']);
                form.find("#infojurusan").val(data['jurusan']);
                form.find("#infothn_lulus").val(data['thn_lulus']);
                form.find("#infotoefl").val(data['toefl']);
                form.find("#verif_lamaran").val(data['verif_lamaran']);
                form.find("#verif_ktp").val(data['verif_ktp']);
                form.find("#verif_foto").val(data['verif_foto']);
                form.find("#verif_sks").val(data['verif_sks']);
                form.find("#verif_skck").val(data['verif_skck']);
                form.find("#verif_suratpernyataanbebasparpol").val(data['verif_suratpernyataanbebasparpol']);
                form.find("#idpelamar").val(data['id_pelamar']);
            }
        });
    });

    $('.fileBerkas').on('click',function(){
        id = $(this).attr('id');
        status = $(this).attr('status');
        form = $('#file-data');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getFileTableadmin') ?>',
            data:{
                id:id,
                status:status
            },
            success:function(data){
                $('#file-hal_admin').html(data);
                form.find('#id_file').val(id);
                form.find('#status').val(status);
                tooltip._tooltip();
            }
        });
    });

    $(document).ready(function() {
    $('#tabell-pelamar').dataTable({
        "bPaginate": true,
        "bLengthChange": true,
        "bFilter": true,
        "bInfo": true,
        "stateSave": true,
        "bAutoWidth": true });
    });
    $('#table-admin').dataTable({ stateSave: true });
</script>