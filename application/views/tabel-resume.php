<div class="table-responsive">
    <table id="tabel-resume" class="display wrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">Data</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-left">A. Identitas</td>
                <td class="text-center">
                    <a href="#" class="infoIdentitas" data-toggle="modal" data-target="#infoIdentitasModal" id=""><button type="button" class="btn btn-info btn-outline dotip" data-toggle="tooltip" title="Detail Identitas">Detail</button></a>
                    <a href="#" class="editIdentitas" data-toggle="modal" data-target="#editIdentitasModal"><button type="button" class="btn btn-success btn-outline dotip" data-toggle="tooltip" title="Edit Identitas">Edit</button></a>
                </td>
            </tr>
            <tr>
                <td class="text-left">B. Formasi dan Pendidikan</td>
                <td class="text-center">
                    <a href="#" class="infoFormasi" data-toggle="modal" data-target="#infoFormasiModal" id=""><button type="button" class="btn btn-info btn-outline dotip" data-toggle="tooltip" title="Detail Formasi dan Pendidikan">Detail</button></a>
                    <a href="#" class="editFormasi" data-toggle="modal" data-target="#editFormasiModal"><button type="button" class="btn btn-success btn-outline dotip" data-toggle="tooltip" title="Edit Formasi dan Pendidikan">Edit</button></a>
                </td>
            </tr>
            <tr>
                <td class="text-left">C. Pengalaman Kerja</td>
                <td class="text-center">
                    <a href="#" class="infoPengalaman" data-toggle="modal" data-target="#infoPengalamanModal" id=""><button type="button" class="btn btn-info btn-outline dotip" data-toggle="tooltip" title="Detail Pengalaman Kerja">Detail</button></a>
                    <a href="#" class="editUser" data-toggle="modal" data-target="#editUserModal"><button type="button" class="btn btn-success btn-outline dotip" data-toggle="tooltip" title="Edit Pengalaman Kerja">Edit</button></a>
                </td>
            </tr>
            <tr>
                <td class="text-left">D. Lampiran</td>
                <td class="text-center">
                    <a href="#" class="infoLampiran" data-toggle="modal" data-target="#infoLampiranModal" id=""><button type="button" class="btn btn-info btn-outline dotip" data-toggle="tooltip" title="Detail Lampiran">Detail</button></a>
                    <a href="#" class="editLampiran" data-toggle="modal" data-target="#editLampiranModal"><button type="button" class="btn btn-success btn-outline dotip" data-toggle="tooltip" title="Edit Lampiran">Edit</button></a>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<script type="text/javascript">
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

    $(document).ready(function() {
    $('#tabel-resume').dataTable({
        "bPaginate": false,
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": false,
        "stateSave": false,
        "bAutoWidth": true });
    });
</script>