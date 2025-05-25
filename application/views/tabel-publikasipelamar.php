<?php
    $level = $this->session->userdata("level");
    $date = date("Y-m-d");
?>

<div class="table-responsive">
    <table id="tabel-pupelamar" class="display nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center" width="30%">Jenis Publikasi</th>
                <th class="text-center" width="30%">URL Publikasi</th>
                <th class="text-center" width="30%">File Upload</th>
                <th class="text-center" width="10%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($tabel as $value) {
                    $level = $this->session->userdata("level");
            ?>
            <tr>
                <td class="text-center"><?= $value->jenis_publikasi ?></td>
                <td class="text-center"><?= $value->url_publikasi ?></td>
                <td class="text-center">
                    <a href="<?= site_url('pelamarCntrl/dl_file?file=' . substr($value->path_file,1) )?>" class="editData" id="<?= $value->id_publikasi ?>" target="_blank"><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Lihat File"><i class="ti-file"></i></button></a>
                <?php
                    $level = $this->session->userdata('level');
                    if($level == ''){
                        echo 'Anda Belum Login';
                    }
                ?>
                </td>
                <td class="text-center">
                    <a href="#" class="editPublikasi" data-toggle="modal" data-target="#editPublikasiModal" id="<?=htmlspecialchars($value->id_publikasi); ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Edit Publikasi"><i class="ti-pencil-alt"></i></button></a>
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

    $('.editPublikasi').on('click',function(){
        id = $(this).attr('id');
        form = $('#edit-publikasipelamar');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/editPublikasi') ?>',
            data:{id:id},
            success:function(data){
                $('#editm-publikasi').html(data);
                tooltip._tooltip();
            }
        });
    });

    $('.hapusUser').on('click',function(){
        id = $(this).attr('id');
    });

    $(document).ready(function() {
    $('#tabel-pupelamar').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false });
    });
</script>