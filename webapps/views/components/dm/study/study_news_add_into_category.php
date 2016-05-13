<?php echo form_open_multipart('news-manager-add-news-into-category-submit'); ?>
<input type="hidden" id="hide" name="newsId" value="<?php if (!empty($newsId)) {
    echo $newsId;
} ?>">
<!--Default Tabs (Left Aligned)-->
<!--===================================================-->
<div class="tab-base" xmlns="http://www.w3.org/1999/html">
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
                        <label for="demo-vs-definput" class="control-label">Bài viết của phân nhóm</label>
                        <select class="form-control selectpicker" name="catId">
                            <?php foreach ($categories as $category) { ?>
                                <option
                                    value="<?php echo $category['id'] ?>" <?php
                                if (!empty($currentCategory) && strcasecmp($category['id'], $currentCategory) == 0) {
                                    echo 'selected';
                                }
                                ?>><?php echo $category['vi_name'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <?php if (!empty($img_src)) { ?>
                            <input type="hidden" id="hide" name="img_src" value="<?php echo $img_src; ?>">
                            <img src="<?php echo base_url() . $img_src; ?> " width="600px;"/>
                            <br/>
                        <?php } ?>
                        <label for="upload_file">Thay hình? </label>
                        <input type='file' name='userfile' size='20'/>
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
                        <input type="text" name="slug" class="form-control" value=" <?php if (!empty($slug)) {
                            echo $slug;
                        } ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Tiêu đề [SEO]</label>
                        <input type="text" name="title_header" class="form-control"
                               value="<?php if (!empty($title_header)) {
                                   echo $title_header;
                               } ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Đặc tả [SEO]</label>
                        <input type="text" name="description_header"
                               class="form-control" value="<?php if (!empty($description_header)) {
                            echo $description_header;
                        } ?>"/>
                    </div>
                    <div class="form-group">
                        <label for="demo-vs-definput" class="control-label">Từ khoá [SEO]</label>
                        <input type="text" name="keyword_header"
                               class="form-control" value="<?php if (!empty($keyword_header)) {
                            echo $keyword_header;
                        } ?>"/>
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
                <textarea name="visummary" id="sumsummernote" class="summernote"><?php if (!empty($summary)) {
                        echo $summary;
                    } else {
                        echo 'Nhập nội dung rút gọn...';
                    } ?></textarea>
            </div>

        </div>

        <div id="demo-lft-tab-3" class="tab-pane fade">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Tên bài viết</label>
                <input type="text" name="vititle" class="form-control"> <?php if (!empty($vititle)) {
                    echo $vititle;
                } ?> </input>
            </div>

            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Nội dung bài viết</label>
                <textarea name="vicontent" id="contentsummernote" class="summernote"><?php if (!empty($content)) {
                        echo $content;
                    } else {
                        echo 'Nhập nội dung...';
                    } ?></textarea>
            </div>
        </div>
    </div>
</div>
<!--===================================================-->
<!--End Default Tabs (Left Aligned)-->
<button type="submit" class="btn btn-success btn-xs"><i class="fa fa-save"></i> Lưu</button>
<a href="<?php echo base_url() . "news-manager/add-news-cancel" ?>" type="submit" class="btn btn-default btn-xs"><i
        class="fa fa-close"></i> Huỷ</a>
<?php if (!empty($newsId)) { ?>
    <a href="<?php echo base_url() . "study-manager/delete-news-category/" . $newsId; ?>"
       class="btn btn-danger btn-xs"><i class="fa fa-close"></i> Xoá</a>
<?php } ?>
</form>
<script>
    $(document).ready(function () {
        $('.summernote').summernote({
            height: 600,                 // set editor height
            minHeight: 400
        });
    });

    // DROPZONE.JS
    // =================================================================
    // Require Dropzone
    // http://www.dropzonejs.com/
    // =================================================================
    Dropzone.options.demoDropzone = { // The camelized version of the ID of the form element
        // The configuration we've talked about above
        autoProcessQueue: false,
        //uploadMultiple: true,
        //parallelUploads: 25,
        //maxFiles: 25,

        // The setting up of the dropzone
        init: function () {
            var myDropzone = this;
            //  Here's the change from enyo's tutorial...
            //  $("#submit-all").click(function (e) {
            //  e.preventDefault();
            //  e.stopPropagation();
            //  myDropzone.processQueue();
            //
            //}
            //    );

        }

    }


    var postForm = function () {
        $('textarea[name="visummary"]').html($('#sumsummernote').code());
        $('textarea[name="vicontent"]').html($('#contentsummernote').code());
    }
</script>