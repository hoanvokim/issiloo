<?php echo form_open('news-manager-write-submit'); ?>

<!--Default Tabs (Left Aligned)-->
<!--===================================================-->
<div class="tab-base">
    <!--Nav Tabs-->
    <ul class="nav nav-tabs">
        <li class="active">
            <a data-toggle="tab" href="#demo-lft-tab-1"> Tổng quan </a>
        </li>
        <li>
            <a data-toggle="tab" href="#demo-lft-tab-2"> Tóm tắt bài viết</a>
        </li>
        <li>
            <a data-toggle="tab" href="#demo-lft-tab-3"> Nội dung bài viết</a>
        </li>
    </ul>
    <!--Tabs Content-->
    <div class="tab-content">
        <div id="demo-lft-tab-1" class="tab-pane fade active in">
            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">Tổng quan</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Bài viết của phân nhóm </label>
                        <select class="form-control selectpicker" name="catId">
                            <?php foreach ($categories as $category) { ?>
                                <option value="<?php echo $category['id'] ?>"><?php echo $category['vi_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Upload hình ảnh</label>
                        <form id="demo-dropzone" action="#" class="dropzone">
                            <div class="dz-default dz-message">
                                <div class="dz-icon icon-wrap icon-circle icon-wrap-md"><i class="fa fa-cloud-upload fa-2x"></i></div>
                                <div>
                                    <p class="dz-text">Drop files to upload</p>
                                    <p class="text-muted">or click to pick manually</p>
                                </div>
                            </div>
                            <div class="fallback">
                                <input name="file" type="file" multiple/>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="panel">
                <div class="panel-heading">
                    <h3 class="panel-title">SEO</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Đường dẫn trên thanh địa chỉ</label>
                        <input type="text" name="viTabName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Tiêu đề [SEO]</label>
                        <input type="text" name="viTabName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Đặc tả [SEO]</label>
                        <input type="text" name="viTabName" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Từ khoá [SEO]</label>
                        <input type="text" name="viTabName" class="form-control">
                    </div>
                </div>
            </div>


        </div>
        <div id="demo-lft-tab-2" class="tab-pane fade">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Tóm tắt</label>
                <textarea name="viContent" class="summernote"><p>Nhập nội dung...</p></textarea>
            </div>

        </div>

        <div id="demo-lft-tab-3" class="tab-pane fade">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Tên bài viết</label>
                <input type="text" name="viTabName" class="form-control">
            </div>

            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Nội dung bài viết</label>
                <textarea name="viContent" class="summernote"><p>Nhập nội dung...</p></textarea>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Tabs (Left Aligned)-->
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "intro-manager/create-cancel" ?>" type="submit" class="btn btn-default btn-xs"><i class="fa fa-close"></i> Huỷ</a>
</form>