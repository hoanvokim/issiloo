<!--JAVASCRIPT-->
<!--=================================================-->
<script src="<?php echo base_url(); ?>webresources/plugins/pace/pace.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/vendors/jquery/jquery-2.1.4.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/vendors/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/summernote/summernote.min.js"></script>
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.1/summernote.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/js/jquery-ui.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/js/scripts.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--webresources/dm/js/demo/homepage-2.js"></script>-->
<script src="<?php echo base_url(); ?>webresources/dm/js/demo/wizard.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/js/demo/jasmine.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/js/demo/form-wizard.js"></script>
<script src="<?php echo base_url(); ?>webresources/dm/js/demo/tables-datatables.js"></script>

<script src="<?php echo base_url(); ?>webresources/dm/js/demo/form-component.js"></script>

<script src="<?php echo base_url(); ?>webresources/plugins/parsley/parsley.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/fast-click/fastclick.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/datatables/media/js/jquery.dataTables.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/datatables/media/js/dataTables.bootstrap.js"></script>
<script
    src="<?php echo base_url(); ?>webresources/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/skycons/skycons.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/jquery-steps/jquery-steps.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/masked-input/bootstrap-inputmask.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/bootstrap-datepicker/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/bootstrap-validator/bootstrapValidator.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/bootstrap-wizard/jquery.bootstrap.wizard.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/bootstrap-tagsinput/bootstrap-tagsinput.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/tag-it/tag-it.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/chosen/chosen.jquery.min.js"></script>
<!--<script src="--><?php //echo base_url(); ?><!--webresources/plugins/noUiSlider/jquery.nouislider.all.min.js"></script>-->
<script src="<?php echo base_url(); ?>webresources/plugins/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/dropzone/dropzone.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/select2/js/select2.js" type="text/javascript"></script>
<script>
    $(document).ready(function () {
        $("#tags_dropdown").select2({
            tags: true,
            placeholder: "Hãy chọn tag",
            allowClear: true
        });

        $('.message').fadeOut(7000);

    });
</script>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 600,                 // set editor height
            minHeight: 400
        });
    });

    var postForm = function () {
        $('textarea[name="visummary"]').html($('#sumsummernote').code());
        $('textarea[name="vicontent"]').html($('#contentsummernote').code());
        $('textarea[name="faqAnswer"]').html($('#summernote').code());
    }
</script>