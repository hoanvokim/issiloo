<?php $this->load->view('layout/webapp/header'); ?>

<?php $this->load->view('components/webapp/banner_start'); ?>

<!-- main container start -->
<div class="inner-container" style="margin-top:25px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12 blog_news">
                <!-- blog content start -->
                <div class="col-md-12 blog_content">
                    <!-- single news area start -->
                    <div class="news col-md-4">
                        <div class="news_img">
                            <img src="<?php echo $duhoctieng['img']; ?>"
                                 alt="<?php echo $duhoctieng['vi_name']; ?>" class="image img-responsive">
                            <div class="overlay">
                                <div class="text">
                                    <h3><?php echo $duhoctieng['vi_name'] ?></h3>
                                    <a href="<?php echo base_url() . $duhochanquoc['slug'] . '/' . $duhoctieng['slug']; ?>">Xem thêm <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single news area end -->
                    <!-- single news area start -->
                    <div class="news col-md-4">
                        <div class="news_img">
                            <img src="<?php echo $duhocnganh['img'] ?>"
                                 alt="<?php echo $duhocnganh['vi_name'] ?>" class="image img-responsive">
                            <div class="overlay">
                                <div class="text">
                                    <h3><?php echo $duhocnganh['vi_name'] ?></h3>
                                    <a href="<?php echo base_url() . $duhochanquoc['slug'] . '/' . $duhocnganh['slug']; ?>">Xem thêm <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single news area end -->
                    <!-- single news area start -->
                    <div class="news col-md-4">
                        <div class="news_img">
                            <img src="<?php echo $duhocnghe['img'] ?>"
                                 alt="<?php echo $duhocnghe['vi_name'] ?>" class="image img-responsive">
                            <div class="overlay">
                                <div class="text">
                                    <h3><?php echo $duhocnghe['vi_name'] ?></h3>
                                    <a href="<?php echo base_url() . $duhochanquoc['slug'] . '/' . $duhocnghe['slug']; ?>">Xem thêm <i
                                                class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- single news area end -->
                </div>
                <!-- blog content end -->
            </div>
        </div>
    </div>
</div>
<!-- main container end -->

<?php $this->load->view('layout/webapp/footer'); ?>
