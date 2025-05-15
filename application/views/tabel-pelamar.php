<?php
    $level = $this->session->userdata("level");
    $date = date("Y-m-d");
?>

<div class="table-responsive">
    <table id="tabell-pelamar" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center" width="30%">Nama</th>
                <th class="text-center" width="30%">Lowongan</th>
                <th class="text-center" width="30%">Status</th>
                <th class="text-center" width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($tabel->result() as $value) {
                    $status = $value->status;
                    $level = $this->session->userdata("level");

                    if($status == 1){
                        $statuse = "Lolos Tahap Administrasi";
                    }else if($status == 2){
                        $statuse = "Tidak Lolos";
                    }else{
                        $statuse = "Sedang Proses";
                    }

                    if($lolostahaptiga == 4){
                        $statusskdskb = "Lolos Tahap SKD dan SKB";
                    }else  if($lolostahaptiga == 5){
                        $statusskdskb = "Tidak lolos tahap SKD dan SKB";
                    }


                    if($datefinal == 6){
                        $statusfinal = "Lolos";
                    }else  if($datefinal == 7){
                        $statusfinal = "Tidak lolos";
                    }
            ?>
            <tr>
                <td class="text-center"><?= $value->nama_pelamar ?></td>
                <td class="text-center"><?= $value->nm_kualifikasi.' ('.$value->kode_kualifikasi.')'.' ('.$value->penempatan.')' ?></td>
				<?php if($date >= $datepengumuman and $date < $dateskdskb){?>
                <td class="text-center"><?= $statuse?></td>
                <?php }else if($date >= $datepengumuman and $date >= $dateskdskb and $date < $pengumumanfinal){?>
                <td class="text-center"><?= $statusskdskb?></td>
            <?php }else if($date >= $datepengumuman and $date >= $dateskdskb and $date >= $pengumumanfinal){?>
                <td class="text-center"><?= $statusfinal?></td>
				<?php }else{?>
                <td class="text-center">Sedang Proses</td>
				<?php }?>
                <td class="text-center">
                    <a href="#" class="infoRekrut" data-toggle="modal" data-target="#infoRekrutmen" ><button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Informasi Rekrutmen"><i class="ti-more" ></i></button></a>
                <?php
                    if($level == 3 and $status == 1 and $date < $datepengumuman){
                ?>
                    <a href="<?= base_url('PelamarCntrl/cetak?id=').$value->id_pelamar ?>" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir"><i class="fa fa-print" ></i></button></a>

                <?php
                    }else if($level == 3 and $status == 1 and $date >= $datepengumuman){
                ?>
                    <a href="<?= base_url('PelamarCntrl/cetakkartuujian?id=').$value->id_pelamar ?>" class="filekartu" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak Kartu Ujian"><i class="ti ti-printer notify" data-icon="v"><span class="heartbit"></span><span class="point"></span></i><i class="fa fa-print"></i></button></a>

                    <a href="<?= base_url('PelamarCntrl/cetak?id=').$value->id_pelamar ?>" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir"><i class="fa fa-print" ></i></button></a>

                    <!--<a href="<?= base_url('PelamarCntrl/cetaklis?id=').$value->id_pelamar ?>" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak List"><i class="fa fa-print" ></i></button></a>
                    <a href="#" class="fileBerkas" data-toggle="modal" data-target="#fileModalPelamar" id="<?= $value->id_pelamar ?>" ><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="BERKAS"><i class="ti-files"></i></button></a>-->


                <?php
                    }else if($level == 3 and $status == 2 and $date < $datepengumuman){
                ?>
                    <a href="<?= base_url('PelamarCntrl/cetak?id=').$value->id_pelamar ?>" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir"><i class="fa fa-print" ></i></button></a>
				<?php
                    }else if($level == 3 and $status == 2 and $date >= $datepengumuman){
                ?>
                    <a href="<?= base_url('PelamarCntrl/cetak?id=').$value->id_pelamar ?>" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir"><i class="fa fa-print" ></i></button></a>
                    <!--<a href="#" class="fileBerkas" data-toggle="modal" data-target="#fileModalPelamar" id="<?= $value->id_pelamar ?>" ><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="BERKAS"><i class="ti-files"></i></button></a>-->
                <?php
                    }else if($level == 3 and $status != 1 and $status != 2) {
                ?>
                    <a href="<?= base_url('PelamarCntrl/cetak?id=').$value->id_pelamar ?>" target='_blank'><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Cetak Formulir"><i class="fa fa-print" ></i></button></a>
                <?php }?>
                <?php
                        $level = $this->session->userdata('level');
                        if($level == ''){
                            echo 'Anda Belum Login';
                        }
                    ?>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('.fileBerkas').on('click',function(){
        id = $(this).attr('id');
        form = $('#file-data');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getFileTable') ?>',
            data:{
                id:id
            },
            success:function(data){
                $('#file-pelamar').html(data);
                form.find('#id_file').val(id);
                tooltip._tooltip();
            }
        });
    });

    $(document).ready(function() {
    $('#tabell-pelamar').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false });
    });
</script>