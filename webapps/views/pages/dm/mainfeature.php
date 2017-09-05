<!DOCTYPE html>
<html lang="en">

<head>
    <title><?php echo $title ?></title>
    <?php $this->load->view('layout/dm/header'); ?>
</head>

<body>
<div id="container" class="effect mainnav-lg navbar-fixed mainnav-fixed">
    <div class="boxed">

        <!--CONTENT CONTAINER-->
        <!--===================================================-->
        <section id="content-container">
            <?php $this->load->view('layout/dm/breadcrumb'); ?>

            <!--Page content-->
            <!--===================================================-->
            <div id="page-content">
                <div claass="row">
                    <div class="invoice-inner">
                        <div class="row">
                            <div class="col-xs-6">
                                <h3>Du học Hàn Quốc & Đào tạo hàn ngữ</h3>
                            </div>
                        </div>
                        <hr>

                        <?php echo form_open_multipart('update-mainfeature-submit'); ?>
                        <div class="row">
                            <div class="col-xs-6">

                                <h3>Du học Hàn Quốc</h3>
                                <?php if ($duhochanquocHasImg == 0) { ?>
                                    <div class="form-group">
                                        <label for="upload_file">File upload</label>
                                        <input type='file' name='userfileDuhoc' size='30'/>
                                        <br/>
                                        <i>Lưu ý: Hình ảnh size chuẩn: 200px * 200px</i>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="demo-vs-definput" class="control-label">Hình ảnh</label>
                                        <br/>
                                        <img src="<?php echo base_url() . $duhochanquoc['img']; ?>" style="height: 100px;"/>
                                        <input type="hidden" id="hide" name="duhochanquocimg" value="<?php echo $duhochanquoc['img']; ?>"/>
                                        <button type="submit" class="btn btn-danger btn-xs" name="delete-img-duhoc" style="margin-left: 15px;"><i
                                                    class="fa fa-close"></i> Xoá ảnh
                                        </button>
                                    </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-success" name="save-duhoc"><i class="fa fa-save"></i> Lưu</button>
                            </div>
                            <div class="col-xs-6">
                                <h3>Đào tạo hàn ngữ</h3>
                                <?php if ($daotaohannguHasImg == 0) { ?>
                                    <div class="form-group">
                                        <label for="upload_file">File upload</label>
                                        <input type='file' name='userfileDaotao' size='30'/>
                                        <br/>
                                        <i>Lưu ý: Hình ảnh size chuẩn: 200px * 200px</i>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="demo-vs-definput" class="control-label">Hình ảnh</label>
                                        <br/>
                                        <img src="<?php echo base_url() . $daotaohanngu['img']; ?>" style="height: 100px;"/>
                                        <input type="hidden" id="hide" name="daotaohannguimg" value="<?php echo $daotaohanngu['img']; ?>"/>
                                        <button type="submit" class="btn btn-danger btn-xs" name="delete-img-daotao" style="margin-left: 15px;"><i
                                                    class="fa fa-close"></i> Xoá ảnh
                                        </button>
                                    </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-success" name="save-daotao"><i class="fa fa-save"></i> Lưu</button>

                            </div>
                            <hr/>
                            <div class="col-xs-6">
                                <h3>Banner mặc định</h3>
                                <?php if ($defaultbannerHasImg == 0) { ?>
                                    <div class="form-group">
                                        <label for="upload_file">File upload</label>
                                        <input type='file' name='userfileDefaultbanner' size='30'/>
                                        <br/>
                                        <i>Lưu ý: Hình ảnh size chuẩn: 200px * 200px</i>
                                    </div>
                                <?php } else { ?>
                                    <div class="form-group">
                                        <label for="demo-vs-definput" class="control-label">Hình ảnh</label>
                                        <br/>
                                        <img src="<?php echo base_url() . $defaultbanner['value']; ?>" style="height: 100px;"/>
                                        <input type="hidden" id="hide" name="defaultbannerimg" value="<?php echo $defaultbanner['value']; ?>"/>
                                        <button type="submit" class="btn btn-danger btn-xs" name="delete-img-defaultbanner" style="margin-left: 15px;"><i
                                                    class="fa fa-close"></i> Xoá ảnh
                                        </button>
                                    </div>
                                <?php } ?>
                                <button type="submit" class="btn btn-success" name="save-defaultbanner"><i class="fa fa-save"></i> Lưu</button>

                            </div>
                        </div>
                        </form>
                    </div>
                </div>
                <!--===================================================-->
                <!--End page content-->

        </section>
        <!--===================================================-->
        <!--END CONTENT CONTAINER-->

        <?php $this->load->view('layout/dm/navigation'); ?>

    </div>

    <?php $this->load->view('layout/dm/footer_bar'); ?>

</div>
<!--===================================================-->
<!-- END OF CONTAINER -->

<?php $this->load->view('layout/dm/footer'); ?>
</body>
</html>
