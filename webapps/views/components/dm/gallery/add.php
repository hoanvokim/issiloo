<?php echo form_open_multipart('gallery-corner-manager-create-gallery-submit'); ?>

<div class="form-group">
    <label for="upload_file">File upload</label>
    <input type='file' name='userfile' size='20'/>
    <br/>
    <i>Lưu ý: Hình ảnh size chuẩn: 2000px * 748px</i>
</div>

<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tiêu đề ảnh</label>
    <textarea name="vi_title" class="form-control"></textarea>
</div>

<button type="submit" class="btn btn-success btn-xs" name="save"><i class="fa fa-save"></i> Lưu</button>
<button type="submit" class="btn btn-default btn-xs" name="cancel"><i class="fa fa-close"></i> Huỷ</button>
</form>
