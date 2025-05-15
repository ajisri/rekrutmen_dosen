<div class="table-responsive">
    <table id="tabel-user" class="display wrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Nama</th>
                <th class="text-center">NIK (Username)</th>
                <th class="text-center wrap">Tugas (ID Kualifikasi)</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=0; 
            foreach ($tabel->result() as $value) {
            $no++;    ?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td class="text-left" width="15%"><?= $value->nm_user ?></td>
                <td class="text-center"><?= $value->nik ?></td>
                <td class="text-left wrap" width="15%"><?= $value->kualifikasi ?></td>
                <td class="text-center">
                    <a href="#" class="pilihkualifikasi" data-toggle="modal" data-target="#pilihkualifikasiModal" id="<?= $value->id_user ?>"><button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5 dotip" data-toggle="tooltip" title="Pilih tugas kualifikasi"><i class="ti-hand-point-up"></i></button></a>
                    <a href="#" class="editUser" data-toggle="modal" data-target="#editUserModal" id="<?=htmlspecialchars($value->id_user); ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Edit User"><i class="ti-pencil-alt"></i></button></a>
                    <a href="#" class="hapusUser" data-toggle="modal" data-target=".hapusUserModal" id="<?=htmlspecialchars($value->id_user); ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Hapus User"><i class="icon-trash"></i></button></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
    $('.pilihkualifikasi').on('click',function(){
        id = $(this).attr('id');
        form = $('#pilih-kualifikasi');
        $.ajax({
            url:'<?= site_url('UserCntrl/getKualifikasi') ?>',
            data:{
                id:id
            },
            success:function(data){
                $('#file-pilihkualifikasi').html(data);
                form.find("#id").val(id);
                tooltip._tooltip();
            }
        });
    });

    $('.fileBerkas').on('click',function(){
        id = $(this).attr('id');
        kategori = $(this).attr('kategori');
        form = $('#file-data');
        $.ajax({
            url:'<?= site_url('PengajuanCntrl/getFileAjuan') ?>',
            data:{
                id:id,
                kategori:kategori 
            },
            success:function(data){
                $('#file-ajuan').html(data);
                form.find('#kategori_file').val(kategori);
                form.find('#id_file').val(id);
                tooltip._tooltip();
            }
        });
    });

    $('.editUser').on('click',function(){
        id = $(this).attr('id');
        form = $('#edit-user');
        $.ajax({
            url:'<?= site_url('UserCntrl/edit') ?>',
            data:{id:id},
            success:function(data){
                $('#edit-tugasuser').html(data);
                tooltip._tooltip();
            }
        });
    });

    $('.hapusUser').on('click',function(){
        id = $(this).attr('id');
    });

    $('#tabel-user').DataTable({  
    });
</script>