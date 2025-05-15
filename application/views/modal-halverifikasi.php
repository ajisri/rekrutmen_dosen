<div id="infoBhnModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content modal-lg">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">Info</h4> </div>
            <div class="modal-body">
                <form id="info-bahan" novalidate="" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Kode Formasi :</label>
                            <input type="text" class="form-control" id="infokode_kualifikasi" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PT Sarjana / Sarjana Terapan:</label>
                            <input type="text" class="form-control" id="info_akreditasipt" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PS Sarjana / Sarjana Terapan:</label>
                            <input type="text" class="form-control" id="info_akreditasips" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal IPK PS Sarjana / Sarjana Terapan:</label>
                            <input type="number" class="form-control" id="info_ipk" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PT Sarjana Profesi:</label>
                            <input type="text" class="form-control" id="info_akreditasipt1" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PS Sarjana Profesi:</label>
                            <input type="text" class="form-control" id="info_akreditasips1" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal IPK Sarjana Profesi:</label>
                            <input type="number" class="form-control" id="info_ipk1" disabled> 
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PT Magister / Magister Terapan:</label>
                            <input type="text" class="form-control" id="info_akreditasipt2" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PS Magister / Magister Terapan:</label>
                            <input type="text" class="form-control" id="info_akreditasips2" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal IPK Magister / Magister Terapan:</label>
                            <input type="number" class="form-control" id="info_ipk2" disabled> 
                        </div>
                    </div>
					<div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PT IPK Doktor / Doktor Terapan:</label>
                            <input type="text" class="form-control" id="info_akreditasipt3" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal Akreditasi PS IPK Doktor / Doktor Terapan:</label>
                            <input type="text" class="form-control" id="info_akreditasips3" disabled> 
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nama" class="control-label">Minimal IPK Doktor / Doktor Terapan:</label>
                            <input type="number" class="form-control" id="info_ipk3" disabled> 
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Jenis Toefl</label>
                            <input type="number" class="form-control" id="info_jenistoefl" disabled> 
                        </div>
                    </div>
					<div class="col-md-6">
                        <div class="form-group">
                            <label for="nama" class="control-label">Skor Toefl</label>
                            <input type="number" class="form-control" id="info_skortoefl" disabled> 
                        </div>
                    </div>
                    <!-- <div class="col-md-12">
                        <div class="form-group">
                            <label for="nama" class="control-label">Deskripsi :</label>
                            <textarea class="form-control" id="infodeskripsi" name="deskripsi" disabled=""></textarea>
                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
            </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade verifikasiBhnModal" tabindex="-1" role="dialog" aria-labelledby="addOrder" aria-hidden="true" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h5 class="modal-title">Verifikasi Pelamar sesuai Formasi</h5> </div>
            <div class="modal-body">
                <form id="hal-data" enctype="multipart/form-data">
                <h4>Apakah anda yakin untuk <b>MELAKUKAN VERIFIKASI</b> ?</h4>
                <small style="color: red; font-size: 9px">Anda akan <b>MEMVERIFIKASI SELURUH PELAMAR FORMASI:</b></small>
                <input type="hidden" class="form-control" id="idbahanverifikasi">
                <input type="text" class="form-control" id="kode_formasi" disabled>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default waves-effect" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-danger waves-effect waves-light" id="verifikasi-pelamarbybhn">Iya!</button>
            </div>
        </div>
    </div>
</div>