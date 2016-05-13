<?php $attributes = array('enctype' => 'multipart/form-data');
echo form_open('university-manager-create-university-submit', $attributes); ?>

<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tên trường đại học</label>
    <input type="text" name="uniTitle" class="form-control">
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Mô tả trường đại học</label>
    <textarea type="text" name="uniDes" class="form-control" style="height: 150px;"></textarea>
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Url</label>
    <input type="text" name="url" class="form-control">
</div>
<div class="form-group">
    <label for="upload_file">File upload</label>
    <input type="file" multiple name="userfile[]"/>
</div>

<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "university-manager/create-university-cancel" ?>" type="submit"
   class="btn btn-default btn-xs"><i
        class="fa fa-close"></i> Huỷ</a>
</form>