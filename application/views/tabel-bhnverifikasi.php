<div class="table-responsive">
    <table id="tabel-user" class="display wrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th class="text-center">No.</th>
                <th class="text-center">Kode Formasi</th>
                <th class="text-center">Nama Formasi </th>
                <th class="text-center">Fakultas </th>
                <th class="text-center">Jml Total </th>
                <th class="text-center">Jml Lolos </th>
                <th class="text-center">Jml Tdk Lolos </th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no=0; 
            foreach ($bhnverif->result() as $value) {
            $no++;    ?>
            <tr>
                <td class="text-center"><?= $no ?></td>
                <td class="text-center" width="15%"><?= $value->kode_kualifikasi ?></td>
                <td class="text-center"><?= $value->nm_kualifikasi?>&nbsp;(<?= $value->penempatan?>)</td>
                <td class="text-center" width="15%"><?= $value->unit_kerja ?></td>
                <td class="text-center" width="10%"><?= $value->jml_total ?></td>
                <td class="text-center" width="10%"><?= $value->jml_lolos ?></td>
                <td class="text-center" width="10%"><?= $value->jml_tidaklolos ?></td>
                <td class="text-center" width="15%">
                    <a href="#" class="infoBhn" data-toggle="modal" data-target="#infoBhnModal" id="<?=htmlspecialchars($value->id_bhnverifikasi); ?>"><button type="button" class="btn btn-info btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Info"><i class="ti-info"></i></button></a>
                    <a href="#" class="editBhn" data-toggle="modal" data-target="#editBhnModal" id="<?=htmlspecialchars($value->id_bhnverifikasi); ?>"><button type="button" class="btn btn-success btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Edit"><i class="ti-pencil-alt"></i></button></a>
                    <a href="#" class="hapusBhn" data-toggle="modal" data-target=".hapusBhnModal" id="<?=htmlspecialchars($value->id_bhnverifikasi); ?>"><button type="button" class="btn btn-danger btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Hapus"><i class="icon-trash"></i></button></a>
                    <a href="#" class="verifikasibhnPelamar" data-toggle="modal" data-target=".verifikasiBhnModal" data-backdrop="static" data-keyboard="false" id="<?=$value->id_bhnverifikasi; ?>" kategori="<?=$value->id_kualifikasi; ?>"><button type="button" class="btn btn-warning btn-outline btn-circle btn-sm m-r-5" data-toggle="tooltip" title="Verifikasi"><i class="ti-target"></i></button></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script type="text/javascript">
	$('.infoBhn').on('click',function(){
        id = $(this).attr('id');
        form = $('#info-bahan');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getBahan') ?>',
            data:{id:id},
            success:function(data){
                form.find("#infoid_kualifikasi").val(data['id_kualifikasi']);
                form.find("#infokode_kualifikasi").val(data['kode_kualifikasi']);
                form.find("#info_akreditasipt").val(data['min_akreditasipt']);
                form.find("#info_akreditasips").val(data['min_akreditasips']);
                form.find("#info_ipk").val(data['ipk']);
                form.find("#info_akreditasipt1").val(data['min_akreditasipt1']);
                form.find("#info_akreditasips1").val(data['min_akreditasips1']);
				form.find("#info_ipk1").val(data['ipk1']);
                form.find("#info_akreditasipt2").val(data['min_akreditasipt2']);
                form.find("#info_akreditasips2").val(data['min_akreditasips2']);
                form.find("#info_ipk2").val(data['ipk2']);
                form.find("#info_akreditasipt3").val(data['min_akreditasipt3']);
                form.find("#info_akreditasips3").val(data['min_akreditasips3']);
                form.find("#info_ipk3").val(data['ipk3']);
                form.find("#info_itp").val(data['itp']);
                form.find("#info_ielts").val(data['ielts']);
                form.find("#info_lainlainnya").val(data['lainlainnya']);
                form.find("#info_skor_itp").val(data['skor_itp']);
                form.find("#info_skor_ielts").val(data['skor_ielts']);
                form.find("#info_skor_lain").val(data['skor_lain']);
                form.find("#idbhnverifikasi").val(data['id_bhnverifikasi']);
            }
        });
    });
	
    $('.editBhn').on('click',function(){
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
	
	$('.verifikasibhnPelamar').on('click',function(){
        id = $(this).attr('id');
        kategori = $(this).attr('kategori');
        form = $('#hal-data');
        $.ajax({
            url:'<?= site_url('PelamarCntrl/getBahanVerifikasi') ?>',
            data:{
                id:id,
				kategori:kategori,
            },
            success:function(data){
                form.find("#idbahanverifikasi").val(data['id_bhnverifikasi']);
                form.find("#kode_formasi").val(data['kode_kualifikasi']);
				console.log(kategori);
            }
        });
    });

    $('.hapusBhnModal').on('click',function(){
        id = $(this).attr('id');
    });

    $('#tabel-user').DataTable({  
    });
</script>