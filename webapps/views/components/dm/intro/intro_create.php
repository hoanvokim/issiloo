<?php $attributes = array('id' => 'myform'); echo form_open('intro-manager-create-submit', $attributes); ?>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tên tab</label>
    <input type="text" name="viTabName" class="form-control">
</div>

<!--Summernote-->
<!--===================================================-->
<textarea name="vicontent" id="contentsummernote" class="summernote"><p>Nhập nội dung...</p></textarea>
<!--===================================================-->
<!-- End Summernote -->
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "intro-manager/create-cancel" ?>" type="submit" class="btn btn-default btn-xs" onclick="return confirm('Bạn muốn thoát ra phải không?');"><i class="fa fa-close"></i> Huỷ</a>
</form>