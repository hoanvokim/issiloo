<?php echo form_open('university-manager-update-university-submit'); ?>

<input type="hidden" id="hide" name="uniId" value="<?php echo $uniId; ?>">
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tên trường đại học</label>
    <input type="text" name="uniTitle" class="form-control" value="<?php echo $uniTitle; ?>">
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Mô tả trường đại học</label>
    <input type="text" name="uniDes" class="form-control" value="<?php echo $uniDes; ?>">
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Url</label>
    <input type="text" name="url" class="form-control" value="<?php echo $url; ?>">
</div>

<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "university-manager/update-university-cancel" ?>" type="submit"
   class="btn btn-default btn-xs"><i
        class="fa fa-close"></i> Huỷ</a>
<a href="<?php echo base_url() . "program-manager/delete-program/" . $uniId; ?>"
   class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Xoá</a>
</form>