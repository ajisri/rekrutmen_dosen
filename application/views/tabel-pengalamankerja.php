<div class="table-responsive">
    <table id="tabel-pengalamankerja" class="display wrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Perusahaan</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Tanggal Masuk</th>
                <th class="text-center">Tanggal Selesai</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="text-left"></td>
                <td class="text-left"></td>
                <td class="text-left"></td>
                <td class="text-left"></td>
                <td class="text-left"></td>
                <td class="text-center">
                    <a href="#" class="editPengalaman" data-toggle="modal" data-target="#editPengalamanModal"><button type="button" class="btn btn-success btn-outline dotip" data-toggle="tooltip" title="Edit">Edit</button></a>
					<a href="#" class="hapusPengalaman" data-toggle="modal" data-target=".hapusPengalamanModal" id=""><button type="button" class="btn btn-danger btn-outline dotip" data-toggle="tooltip" title="Hapus">Hapus</button></a>
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
    $('#tabel-pengalamankerja').dataTable({
        "bPaginate": false,
        "bLengthChange": true,
        "bFilter": false,
        "bInfo": false,
        "stateSave": false,
        "bAutoWidth": true });
    });
</script>