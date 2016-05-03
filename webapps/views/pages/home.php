<?php $this->load->view('layout/webapp/header'); ?>

<!-- main container start -->
<div class="main-container">
    <!-- slider container start -->
    <div class="slider-study-abroad-container">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <ul class="recent-projects recent-projects-slider">
                        <?php foreach ($sliders as $slider) { ?>
                            <li>
                                <img src="<?php echo base_url(); ?>/<?php echo $slider['img_src']; ?>">
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- slider container end -->

    <!-- inner container start -->
    <div class="inner-container">
        <div class="container">
            <div class="row service-layout">
                <div class="col-md-4 col-sm-12">
                    <div>
                        <h4 class="col-header"><i class="fa fa-plane"></i> <?php echo $dhhq; ?></h4>
                        <div class="widget-box">
                            <ul class="list">

                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <li><a href="xem-chi-tiet.html"><img src="<?php echo base_url(); ?>/<?php echo $adhhq[$i]['img_src']; ?>"
                                                                         alt=""/>
                                            <?php echo $adhhq[$i]['title'] ?><br/>
                                            <small><?php echo date_format(new DateTime($adhhq[$i]['created_date']), "F d, Y"); ?></small>
                                        </a></li>
                                <?php } ?>


                            </ul>
                        </div>
                        <?php if (count($adhhq) > 4) { ?>
                            <div class="pull-right"><a
                                    class="btn btn-default btn-xs"><?php echo $this->lang->line('READ_MORE'); ?><i
                                        class="ion ion-ios-arrow-thin-right"></i></a></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div>
                        <h4 class="col-header"><i class="fa fa-trophy"></i><?php echo $hbdh; ?></h4>
                        <div class="widget-box">
                            <ul class="list">

                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <li><a href="xem-chi-tiet.html"><img src="<?php echo base_url(); ?>/<?php echo $ahbdh[$i]['img_src']; ?>"
                                                                         alt=""/>
                                            <?php echo $ahbdh[$i]['title']; ?><br/>
                                            <small><?php echo date_format(new DateTime($ahbdh[$i]['created_date']), "F d, Y"); ?></small>
                                        </a></li>
                                <?php } ?>

                            </ul>
                        </div>
                        <?php if (count($ahbdh) > 4) { ?>
                            <div class="pull-right"><a
                                    class="btn btn-default btn-xs"><?php echo $this->lang->line('READ_MORE'); ?><i
                                        class="ion ion-ios-arrow-thin-right"></i></a></div>
                        <?php } ?>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div>
                        <h4 class="col-header"><i class="fa fa-leanpub"></i><?php echo $hth; ?></h4>
                        <div class="widget-box">
                            <ul class="list">

                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <li><a href="xem-chi-tiet.html"><img src="<?php echo base_url(); ?>/<?php echo $ahth[$i]['img_src']; ?>"
                                                                         alt=""/>
                                            <?php echo $ahth[$i]['title']; ?><br/>
                                            <small><?php echo date_format(new DateTime($ahth[$i]['created_date']), "F d, Y"); ?></small>
                                        </a></li>
                                <?php } ?>

                            </ul>
                        </div>
                        <?php if (count($ahth) > 4) { ?>
                            <div class="pull-right"><a
                                    class="btn btn-default btn-xs"><?php echo $this->lang->line('READ_MORE'); ?><i
                                        class="ion ion-ios-arrow-thin-right"></i></a></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- inner container end -->

    <!-- slider container start -->
    <div class="slider-study-abroad-container">
        <div class="container">
            <h3 class="col-header-color"><?php echo $this->lang->line('UNIVERSITY_INFO'); ?></h3>
            <div class="row">
                <div class="col-sm-12">
                    <ul class="recent-projects recent-projects-slider">

                        <?php foreach ($universities as $university) { ?>

                            <li>
                                <div class="project-box">
                                    <div class="row">
                                        <div class="col-md-6 text-center">
                                            <div class="project-img-box">
                                                <img src="<?php echo base_url(); ?>webresources/images/imac.png" alt=""
                                                     class="imac-img"/>
                                                <div class="imac-img-content projects-slides">

                                                    <?php foreach ($university['gallery'] as $item) { ?>

                                                        <div><img
                                                                src="<?php echo base_url(); ?>/<?php echo $item['img_src']; ?>"
                                                                alt=""/></div>

                                                    <?php } ?>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 padding-top--large">
                                            <h3><?php echo $university['title']; ?></h3>
                                            <p><?php echo $university['description']; ?></p>

                                            <h4>Website -
                                                <small><a href="http://www.KOGURYEO.com"
                                                          target="_blank"><?php echo $university['url']; ?></a>
                                                </small>
                                            </h4>
                                            <p><a href="#"
                                                  class="btn btn-primary"><?php echo $this->lang->line('READ_DETAIL'); ?>
                                                    <i
                                                        class="ion ion-ios-arrow-thin-right"></i></a></p>
                                        </div>
                                    </div>
                            </li>

                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- slider container end -->

    <div class="news-inner-container">
        <div class="container">
            <h3 class="col-header-color"><?php echo $this->lang->line('LASTEST_NEWS'); ?></h3>

            <div class="row mar-50">
                <div class="col-sm-6">
                    <div class="img-responsive">
                        <a href="#">
                            <img src="<?php echo $last_news[0]['img_src']; ?>"
                                 width="500px;">
                        </a>
                    </div>
                </div>
                <div class="col-sm-6">
                    <a href="#"><h4><strong><?php echo $last_news[0]['title']; ?></strong></h4></a>
                    <h6 class="posted-date"><?php echo $this->lang->line('POST_DATE'); ?>:
                        <i><?php echo date_format(new DateTime($last_news[0]['created_date']), "d/m/Y"); ?></i></h6>
                    <p><?php echo $last_news[0]['summary']; ?> <a href="#"
                                                                  data-toggle="tooltip"
                                                                  data-placement="bottom"
                                                                  data-original-title="Xem chi tiết"
                                                                  style="margin-left: 10px;"><i
                                class="ion ion-ios-arrow-thin-right"></i></a></p>
                </div>
            </div>

            <div class="row">
                <?php for ($i = 1; $i < 4; $i++) { ?>

                    <div class="col-md-4 col-sm-6">
                        <div class="service-box">
                            <a href="#"><h4><strong><?php echo $last_news[$i]['title']; ?></strong></h4></a>
                            <h6 class="posted-date"><?php echo $this->lang->line('POST_DATE'); ?>:
                                <i><?php echo date_format(new DateTime($last_news[$i]['created_date']), "d/m/Y"); ?></i>
                            </h6>
                            <p><?php echo $last_news[$i]['summary']; ?>
                                <a href="#" data-toggle="tooltip" data-placement="bottom"
                                   data-original-title="Xem chi tiết" style="margin-left: 10px;"><i
                                        class="ion ion-ios-arrow-thin-right"></i></a>
                            </p>
                        </div>
                    </div>

                <?php } ?>
            </div>
            <div class="pull-right"><a class="btn btn-default btn-xs"><?php echo $this->lang->line('READ_MORE_NEWS'); ?>
                    <i
                        class="ion ion-ios-arrow-thin-right"></i></a></div>
        </div>
    </div>
    <!-- inner container end -->

    <div class="feature-container mar-60">
        <h3 class="col-header-color" style="margin-bottom: -1px;">Chia sẽ hình ảnh và video.</h3>
        <div class="feature-box-container feature-slider">

            <?php for ($i = 0;
            $i < count($video_image);
            $i++){ ?>

            <?php if ($i % 2 == 0){ ?>
            <div class="feature-box">
                <?php }else{ ?>
                <div class="feature-box dark">
                    <?php } ?>

                    <img src="<?php echo $video_image[$i]['img_src']; ?>"/>
                    <p><?php echo $video_image[$i]['title']; ?></p>
                </div>
                <?php } ?>

            </div>
        </div>

        <!--form-->
        <div class="inner-container mar-30">
            <div class="container">
                <div class="heading-text text-center text-uppercase">
                    <h3>Hãy để chúng tôi giúp bạn</h3>
                </div>
                <div class="row">
                    <div class="col-md-10 col-md-offset-1">
                        <form class="contact-form" id="ContactForm" method="post" action="sendemail.php">
                            <!--contact form-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="text" name="name" class="form-control" placeholder="Tên *"
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" name="email" class="form-control" placeholder="E-mail *"
                                               required="required">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control"
                                               placeholder="Điện thoại *">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <input type="text" name="subject" class="form-control" placeholder="Tiêu đề">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea class="form-control" name="message" rows="10" placeholder="Nội dung"
                                                  required="required"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Gửi</button>
                                </div>
                            </div>
                        </form>
                        <!--end contact form-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- main container end -->

    <?php $this->load->view('layout/webapp/footer'); ?>
