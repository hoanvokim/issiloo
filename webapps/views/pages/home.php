<?php $this->load->view('layout/webapp/header'); ?>
<!-- main container start -->

<div class="main-container">
    <div class="slogan-disabled">
        <div class="container jumbotron-v2">
            <div class="row">
                <span class="tlt animateText"><?php echo $slogan['value'] ?></span>
                <span class="infoText">
                    Hotline: <a href="tel:0901 879 877"> 0901 879 877</a><br/>
                </span>
                <span class="flags">
                    <img src="<?php echo base_url() . 'webresources/images/vn.png' ?>"/>
                    <img src="<?php echo base_url() . 'webresources/images/korea.png' ?>"/>
                </span>
            </div>
        </div>
    </div>
    <!-- slider container start -->
    <div class="slider-study-abroad-container" style="<?php if (!$sliders || count($sliders) == 0) {
        echo 'padding-top:0px';
    } ?>">
        <?php if ($sliders && count($sliders) > 0) { ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="slider">
                            <?php foreach ($sliders as $slider) { ?>
                                <li>
                                    <a href="<?php echo $slider['url']; ?>"><img
                                                src="<?php echo base_url() . $slider['img_src']; ?>"
                                                alt="<?php echo $slider['vi_content']; ?>"></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <!-- slider container end -->
    <div class="inner-container" style="margin-top:25px;">
        <div class="container">
            <div class="row">
                <div class="col-md-12 blog_news">
                    <!-- blog content start -->
                    <div class="col-md-12 blog_content">
                        <!-- single news area start -->
                        <div class="news col-md-6">
                            <div class="banner-block">
                                <a href="<?php echo base_url() . $duhochanquoc['slug']; ?>"> <img
                                            src="<?php echo base_url() . $duhochanquoc['img'] ?>"
                                            alt="<?php echo $duhochanquoc['vi_name'] ?>"> </a>
                                <div class="text-des-container">
                                    <div class="text-des">
                                        <h3><?php echo $duhochanquoc['vi_name'] ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- single news area end -->
                        <!-- single news area start -->
                        <div class="news col-md-6">
                            <div class="banner-block">
                                <a href="<?php echo base_url() . $daotaohanngu['slug']; ?>"> <img
                                            src="<?php echo base_url() . $daotaohanngu['img'] ?>"
                                            alt="<?php echo $daotaohanngu['vi_name'] ?>"> </a>
                                <div class="text-des-container">
                                    <div class="text-des">
                                        <h3><?php echo $daotaohanngu['vi_name'] ?></h3>
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

    <?php if ($features && count($features) > 0) { ?>
        <!-- feature container start -->
        <div class="inner-container" style="margin-top:25px;">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <div class="margin_bottom">
                            <h3><?php echo $featureslogan['value'] ?></h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($features as $feature) { ?>
                        <div class="col-md-<?php echo $featureCount; ?> col-sm-<?php echo $featureCount; ?> col-xs-12 text-center">
                            <div class="feature_detail">
                                <div>
                                    <img src="<?php echo $feature['img']; ?>" style="margin-top: 20px; width: 90px;"/>
                                </div>
                                <h5 style="margin-top: 20px;"><?php echo $feature['vi_des']; ?></h5>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!-- feature container end -->
    <?php } ?>

    <?php if ($last_news && count($last_news) > 0) { ?>
        <div class="news-inner-container">
            <div class="container">
                <a href="<?php echo base_url() . 'cat/tin-tuc-su-kien' ?>"><h3
                            class="col-header-color"><?php echo $this->lang->line('LASTEST_NEWS'); ?></h3></a>
                <hr class="divider"/>
                <div class="row mar-20">
                    <div class="col-md-12 blog_news">
                        <!-- blog content start -->
                        <div class="col-md-12 blog_content">
                            <!-- single news area start -->
                            <div class="news col-md-8">
                                <div class="banner-block">
                                    <a href="<?php echo base_url() . 'news/' . $last_news[0]['slug']; ?>"> <img
                                                src="<?php if (strripos($last_news[0]['img_src'], 'embed/') !== false || strripos($last_news[0]['img_src'], 'watch?v=') !== false) {
                                                    echo getThumbnailFromYoutubeLink($last_news[0]['img_src']);
                                                }
                                                else {
                                                    if (empty($last_news[0]['img_src'])) {
                                                        echo base_url() . 'webresources/images/banner0.jpg';
                                                    }
                                                    else {
                                                        echo base_url() . $last_news[0]['img_src'];
                                                    }
                                                }
                                                ?>"></a>
                                    <div class="text-des-container-news">
                                        <h6><?php echo $last_news[0]['title']; ?></h6>
                                    </div>
                                </div>
                            </div>
                            <!-- single news area end -->
                            <!-- single news area start -->
                            <div class="news col-md-4">
                                <?php for ($i = 1; $i < 4; $i++) { ?>
                                    <?php if ($i > (count($last_news) - 1)) {
                                        break;
                                    } ?>
                                    <div class="banner-block">
                                        <a href="<?php echo base_url() . 'news/' . $last_news[$i]['slug']; ?>"> <img
                                                    src="<?php if (strripos($last_news[$i]['img_src'], 'embed/') !== false || strripos($last_news[$i]['img_src'], 'watch?v=') !== false) {
                                                        echo getThumbnailFromYoutubeLink($last_news[$i]['img_src']);
                                                    }
                                                    else {
                                                        if (empty($last_news[$i]['img_src'])) {
                                                            echo base_url() . 'webresources/images/banner0.jpg';
                                                        }
                                                        else {
                                                            echo base_url() . $last_news[$i]['img_src'];
                                                        }
                                                    }
                                                    ?>"></a>
                                        <div class="text-des-container-news">
                                            <h6><?php echo $last_news[$i]['title']; ?></h6>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                            <!-- single news area end -->
                        </div>
                        <!-- blog content end -->
                    </div>
                </div>
                <div class="pull-right">
                    <a class="btn btn-default btn-xs"
                       href="<?php echo base_url() . 'cat/tin-tuc-su-kien' ?>"><?php echo $this->lang->line('READ_MORE_NEWS'); ?>
                        <i class="ion ion-ios-arrow-thin-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- inner container end -->
    <?php } ?>

    <?php if ($universities && count($universities) > 0) { ?>
        <!-- slider container start -->
        <div class="slider-university-container">
            <div class="container">
                <h3 class="col-header-color"><?php echo $this->lang->line('UNIVERSITY_INFO'); ?></h3>
                <hr class="divider"/>
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="recent-projects-slider2">
                            <?php foreach ($universities as $university) { ?>
                                <li>
                                    <div>
                                        <a href="<?php echo $university['url']; ?>"
                                           target="_blank"><img class="img-uni-logo"
                                                                src="<?php echo base_url() . $university['img_src']; ?>"/></a>
                                    </div>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- slider container end -->
    <?php } ?>

</div>
<!-- main container end -->
<?php $this->load->view('layout/webapp/footer'); ?>
