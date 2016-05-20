<?php $attributes = array('enctype' => 'multipart/form-data');
echo form_open('university-manager-update-university-submit', $attributes); ?>

<input type="hidden" id="hide" name="uniId" value="<?php echo $uniId; ?>">
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Tên trường đại học</label>
    <input type="text" name="uniTitle" class="form-control" value="<?php echo $uniTitle; ?>">
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Mô tả trường đại học</label>
    <textarea type="text" name="uniDes" class="form-control" style="height: 150px;"><?php echo $uniDes; ?></textarea>
</div>
<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Url</label>
    <input type="text" name="url" class="form-control" value="<?php echo $url; ?>">
</div>

<div class="form-group">
    <label for="demo-vs-definput" class="control-label">Hình ảnh</label>
    <div class="tab-base">

        <!--Nav Tabs-->
        <ul class="nav nav-tabs">
            <li class="active">
                <a data-toggle="tab" href="#demo-lft-tab-1"> Duyệt ảnh </a>
            </li>
            <li>
                <a data-toggle="tab" href="#demo-lft-tab-2">Thêm ảnh</a>
            </li>
        </ul>

        <!--Tabs Content-->
        <div class="tab-content">
            <div id="demo-lft-tab-1" class="tab-pane fade active in">
                <?php foreach ($images as $img) { ?>
                    <div class="checkbox">
                        <label class="form-checkbox form-icon">
                            <input type="checkbox" name="deleteimg[]" value="<?php echo $img['id'] ?>"> <img
                                src="<?php echo base_url() . $img['img_src'] ?>"
                                style="height: 50px;"> <?php echo $img['vi_title'] ?></label>
                    </div>
                <?php } ?>
                <button type="submit" class="btn btn-danger btn-xs" name="delete-img"><i class="fa fa-close"></i> Xoá
                    ảnh
                </button>
            </div>
            <div id="demo-lft-tab-2" class="tab-pane fade">

                <div class="form-group">
                    <label for="upload_file">File upload</label>
                    <input type="file" multiple name="userfile[]"/>
                    <br/>
                    <i>Lưu ý: Hình ảnh size chuẩn: 608px * 349px</i>
                    <br/>
                    <br/>
                    <button type="submit" class="btn btn-success btn-xs" name="add-img"><i class="fa fa-save"></i> Thêm
                        ảnh
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-success btn-xs" name="save"><i class="fa fa-save"></i> Lưu</button>
<button type="submit" class="btn btn-default btn-xs" name="cancel"><i class="fa fa-close"></i> Huỷ</button>
<button type="submit" class="btn btn-danger btn-xs" name="delete"><i class="fa fa-close"></i> Xoá</button>
</form>