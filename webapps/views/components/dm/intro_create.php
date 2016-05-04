<?php echo form_open('intro-manager-create-submit'); ?>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tên tab</label>
    <input type="text" name="viTabName" class="form-control">
</div>

<!--Summernote-->
<!--===================================================-->
<textarea name="viContent" class="summernote"><p>Nhập nội dung...</p></textarea>
<!--===================================================-->
<!-- End Summernote -->
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "intro-manager/create-cancel" ?>" type="submit" class="btn btn-default btn-xs"><i class="fa fa-close"></i> Huỷ</a>
</form>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 600,                 // set editor height
            minHeight: 400
        });
    });

    var postForm = function () {
        $('textarea[name="viContent"]').html($('#summernote').code());
    }
</script>