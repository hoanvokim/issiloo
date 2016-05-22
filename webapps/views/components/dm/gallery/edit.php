<?php echo form_open_multipart('gallery-corner-manager-update-gallery-submit'); ?>

<input type="hidden" id="hide" name="id" value="<?php echo $id; ?>">

<?php if ($hasImg == 0) { ?>
    <div class="form-group">
        <label for="upload_file">File upload</label>
        <input type='file' name='userfile' size='20'/>
        <br/>
        <i>Lưu ý: Hình ảnh size chuẩn: 2000px * 748px</i>
    </div>
<?php } else { ?>
    <div class="form-group">
        <label for="demo-vs-definput" class="control-label">Hình ảnh</label>
        <br/>
        <img src="<?php echo base_url() . $img_src; ?>" style="height: 100px;"/>
        <input type="hidden" id="hide" name="img_src" value="<?php echo $img_src; ?>"/>
        <button type="submit" class="btn btn-danger btn-xs" name="delete-img" style="margin-left: 15px;"><i
                class="fa fa-close"></i> Xoá
            ảnh
        </button>
    </div>
<?php } ?>

<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tiêu đề ảnh</label>
    <textarea name="vi_title" class="form-control">
        <?php echo $vi_title; ?>
    </textarea>
</div>

<button type="submit" class="btn btn-success btn" name="save"><i class="fa fa-save"></i> Lưu</button>
<button type="submit" class="btn btn-default btn" name="cancel"><i class="fa fa-close"></i> Huỷ</button>
<button type="submit" class="btn btn-danger btn-xs" name="delete"><i class="fa fa-close"></i> Xoá</button>
</form>
