<?php echo form_open_multipart('sharing-manager-create-sharing-submit'); ?>
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
                <div class="panel-body">
                    <div class="form-group">
                        <div class="tab-base">
                            <!--Nav Tabs-->
                            <ul class="nav nav-tabs">
                                <li class="active">
                                    <a data-toggle="tab" href="#demo-lft-tab-4">Ảnh</a>
                                </li>
                                <li>
                                    <a data-toggle="tab" href="#demo-lft-tab-5">Video</a>
                                </li>
                            </ul>

                            <!--Tabs Content-->
                            <div class="tab-content">
                                <div id="demo-lft-tab-4" class="tab-pane fade active in">
                                    <div class="form-group">
                                        <label for="upload_file">File upload</label>
                                        <input type='file' name='albumFile' size='20'/>
                                    </div>
                                </div>
                                <div id="demo-lft-tab-5" class="tab-pane fade">
                                    <div class="form-group">
                                        <label>Youtube link</label>
                                        <input type="text" name="img_src" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>

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

            <div class="panel">
                <div class="panel-body">
                    <div class="form-group">
                        <label for="upload_file">Ảnh trong album chia sẽ</label>
                        <input type="file" multiple name="userfile[]"/>
                    </div>
                    <?php if ($tags != null): ?>
                        <div class="form-group">
                            <label for="packing">Tags</label>
                            <select class="form-control select2 populate" multiple="multiple" id="tags_dropdown"
                                    name="tags[]">
                                <?php foreach ($tags as $tag): ?>
                                    <option value="<?php echo $tag['id'] ?>"><?php echo $tag['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                    <?php endif ?>
                </div>
            </div>


        </div>
        <div id="demo-lft-tab-2" class="tab-pane fade">
            <div class="form-group">
                <label for="demo-vs-definput" class="control-label">Tóm tắt</label>
                <textarea name="visummary" id="sumsummernote"
                          class="summernote"><p>Nhập nội dung rút gọn...</p></textarea>
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
<button type="submit" class="btn btn-success btn" name="save"><i class="fa fa-save"></i> Lưu</button>
<button type="submit" class="btn btn-default btn" name="cancel"><i class="fa fa-close"></i> Huỷ</button>
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