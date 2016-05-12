<?php echo form_open('faq-manager-create-faq-submit'); ?>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tên tag</label>
    <input type="text" name="faqQuestion" class="form-control">
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tóm tắt</label>
    <textarea name="faqAnswer" id="sumsummernote" class="summernote"><p>Hãy nhập câu trả lời...</p></textarea>
</div>
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "faq-manager/create-faq-cancel" ?>" type="submit" class="btn btn-default btn-xs"><i class="fa fa-close"></i> Huỷ</a>
</form>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 600,                 // set editor height
            minHeight: 400
        });
    });

    // DROPZONE.JS
    // =================================================================
    // Require Dropzone
    // http://www.dropzonejs.com/
    // =================================================================
    Dropzone.options.demoDropzone = { // The camelized version of the ID of the form element
        // The configuration we've talked about above
        autoProcessQueue: false,
        //uploadMultiple: true,
        //parallelUploads: 25,
        //maxFiles: 25,

        // The setting up of the dropzone
        init: function() {
            var myDropzone = this;
            //  Here's the change from enyo's tutorial...
            //  $("#submit-all").click(function (e) {
            //  e.preventDefault();
            //  e.stopPropagation();
            //  myDropzone.processQueue();
            //
            //}
            //    );

        }

    }


    var postForm = function () {
        $('textarea[name="faqAnswer"]').html($('#summernote').code());
    }
</script>