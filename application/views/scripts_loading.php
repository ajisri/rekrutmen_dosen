<!--Block UI-->
<script src="<?php echo base_url(); ?>temp/plugins/bower_components/jquery.blockUI.js"></script>
<script>
    $(document).ready(function () {
//        $(document).ajaxStart(function () {
//            Pace.restart();
//        });
        $.blockUI.defaults.baseZ = 4000;
        $(document).ajaxStart(function () {
            $.blockUI({css: {
                    border: 'none',
                    padding: '25px',
                    backgroundColor: '#000',
                    '-webkit-border-radius': '10px',
                    '-moz-border-radius': '10px',
                    opacity: .5,
                    color: '#fff',
                    'z-index': '1200'
                }, message: '<h2 style="color:white">LOADING...</h2>Please Wait', });
        });

        $(document).ajaxStop($.unblockUI);
    });
</script>
