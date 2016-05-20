<?php echo form_open_multipart('news-manager-create-news-submit'); ?>
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
                        <label for="upload_file">File upload</label>
                        <input type='file' name='userfile' size='20'/>
                        <br/>
                        <i>Lưu ý: Hình ảnh size chuẩn: 1200px * 686px</i>
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
                        <input type="text" name="slug" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Tiêu đề [SEO]</label>
                        <input type="text" name="title_header" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Đặc tả [SEO]</label>
                        <input type="text" name="description_header" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Từ khoá [SEO]</label>
                        <input type="text" name="keyword_header" class="form-control">
                    </div>
                </div>
            </div>
            <?php if ($tags != null): ?>
                <div class="panel-body">
                    <div class="form-group">
                        <label for="packing">Tags</label>
                        <select class="form-control select2 populate" multiple="multiple" id="tags_dropdown"
                                name="tags[]">
                            <?php foreach ($tags as $tag): ?>
                                <option value="<?php echo $tag['id'] ?>"><?php echo $tag['name'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
            <?php endif ?>
        </div>
        <div id="demo-lft-tab-2" class="tab-pane fade">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Tóm tắt</label>
                <textarea name="visummary" id="sumsummernote" class="summernote"><p>Nhập nội dung rút gọn...</p></textarea>
            </div>

        </div>

        <div id="demo-lft-tab-3" class="tab-pane fade">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Tên bài viết</label>
                <input type="text" name="vititle" class="form-control">
            </div>

            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Nội dung bài viết</label>
                <textarea name="vicontent" id="contentsummernote" class="summernote"><p>Nhập nội dung...</p></textarea>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Tabs (Left Aligned)-->
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "news-manager/create-news-cancel" ?>" type="submit" class="btn btn-default btn-xs"><i
        class="fa fa-close"></i> Huỷ</a>
</form>