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