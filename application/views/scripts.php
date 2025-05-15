<script src="<?= base_url('temp/plugins/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= base_url('temp/asset/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Menu Plugin JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js') ?>"></script>
<!--slimscroll JavaScript -->
<script src="<?= base_url('temp/asset/js/jquery.slimscroll.js') ?>"></script>
<!--Wave Effects -->
<script src="<?= base_url('temp/asset/js/waves.js') ?>"></script>
<!--Counter js -->
<script src="<?= base_url('temp/plugins/bower_components/waypoints/lib/jquery.waypoints.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/counterup/jquery.counterup.min.js') ?>"></script>
<!--Morris JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/raphael/raphael-min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/morrisjs/morris.js') ?>"></script>
<!-- chartist chart -->
<script src="<?= base_url('temp/plugins/bower_components/chartist-js/dist/chartist.min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js') ?>"></script>
<!-- Calendar JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/moment/moment.js') ?>"></script>
<script src='<?= base_url('temp/plugins/bower_components/calendar/dist/fullcalendar.min.js') ?>'></script>
<script src="<?= base_url('temp/plugins/bower_components/calendar/dist/cal-init.js') ?>"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= base_url('temp/asset/js/jasny-bootstrap.js')?>"></script>
<script src="<?= base_url('temp/asset/js/custom.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/datatables/jquery.dataTables.min.js')?>"></script>
<!-- start - This is for export functionality only -->
<script src="https://cdn.datatables.net/buttons/1.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.2/js/buttons.print.min.js"></script>
<!-- Select Script -->
<script src="<?= base_url('temp/plugins/bower_components/switchery/dist/switchery.min.js'); ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/custom-select/custom-select.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('temp/plugins/bower_components/bootstrap-select/bootstrap-select.min.js'); ?>" type="text/javascript"></script>
<script src="<?= base_url('temp/plugins/bower_components/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'); ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.min.js'); ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?= base_url('temp/plugins/bower_components/multiselect/js/jquery.multi-select.js'); ?>"></script>

<script src="<?= base_url('temp/plugins/bower_components/moment/moment.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/toast-master/js/jquery.toast.js') ?>"></script>
<!-- Clock Plugin JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/clockpicker/dist/bootstrap-clockpicker.js') ?>"></script>
<!-- Color Picker Plugin JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asColor.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/jquery-asColorPicker-master/libs/jquery-asGradient.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/jquery-asColorPicker-master/dist/jquery-asColorPicker.min.js') ?>"></script>
<!-- Date Picker Plugin JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/bootstrap-datepicker/bootstrap-datepicker.min.js') ?>"></script>
<!-- Date range Plugin JavaScript -->
<script src="<?= base_url('temp/plugins/bower_components/timepicker/bootstrap-timepicker.min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<script src="<?= base_url('temp/asset/js/cbpFWTabs.js') ?>"></script>

<script src="<?= base_url('temp/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/jquery-wizard-master/libs/formvalidation/formValidation.min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/jquery-wizard-master/libs/formvalidation/bootstrap.min.js') ?>"></script>

<script src="<?= base_url('temp/plugins/bower_components/sweetalert/sweetalert.min.js') ?>"></script>

<script src="<?= base_url('temp/plugins/bower_components/jquery-wizard-master/dist/jquery-wizard.min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/peity/jquery.peity.min.js') ?>"></script>
<script src="<?= base_url('temp/plugins/bower_components/peity/jquery.peity.init.js') ?>"></script>

<script src="<?= base_url('temp/plugins/bower_components/repeat-form/repeater.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('temp/plugins/bower_components/jquery.blockUI.js')?>"></script>

<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    </script>

<script type="text/javascript">
(function() {
    [].slice.call(document.querySelectorAll('.sttabs')).forEach(function(el) {
        new CBPFWTabs(el);
    });
})();
//script
var notification = {
    _toast : function(heading, text, icon){
        $.toast({
            heading: heading,
            text: text,
            position: 'top-right',
            loaderBg: '#fff',
            icon: icon,
            hideAfter: 3500
        });
    }
};

var notificationn = {
    _toastt : function(heading, text, icon){
        $.toast({
            heading: heading,
            text: text,
            position: 'top-right',
            loaderBg: '#fff',
            icon: icon,
            hideAfter: false
        });
    }
};

var tooltip = {
    _tooltip : function(){
        $('.dotip').tooltip({
            content: function () {
                return $(this).prop('title');
            }
        });
    }
};
function getData(url) {
    $.ajax({
        url:'<?= site_url() ?>'+url,
        data:{
            send:true 
        },
        success:function(data){
            $('#tabel-data').html(data);
            tooltip._tooltip();
        }
    });
};

function getSort(url,formasi){
    $.ajax({
        url:'<?= site_url() ?>'+url,
        data:{
            formasi:formasi,
            status:status
        },
        success:function(data){
            $('#tabel-admin').html(data);
            tooltip._tooltip();
        }
    });
};

function getAnj(url,nama){
    $.ajax({
        url:'<?= site_url() ?>'+url,
        data:{
            nama:nama
        },
        success:function(data){
            $('#tabel-data').html(data);
            tooltip._tooltip();
        }
    });
};

$(document).ready(function() {
    level = '<?= $this->session->userdata('level') ?>';
    if (level == 1) {
        idnotif = 0;
    }else{
        idnotif = '<?= $this->session->userdata('iduser') ?>';
    }
    // setInterval(function() {
    //      $.ajax({
    //         url:'DashCntrl/getNotif',
    //         data:
    //         {
    //             id:idnotif,
    //             kategori:1,
    //         },
    //         success:function(data){
    //             if (data['status'] == 1) {
    //                 notification._toast('Info',data['jumlah']+' Permohonan Pengadaan Obat baru diajukan','info');
    //                 $('.notify').html('<span class="heartbit"></span><span class="point"></span>');
    //                 $('.notifpengadaan').html(data['jumlah']);
    //             }else if(data['status'] == 0){
                    
    //             }
    //         }
    //     });
    // }, 10000);

    $('.kliknotif').on('click',function(){
        $('.notify').html('');
    });

    jQuery(document).ready(function() {
        $('#pre-selected-options').multiSelect();
        $(".select2").select2();
    });
})
</script>
