<?php $this->load->view('layout/webapp/header'); ?>
<!-- main container start -->
<div class="main-container">

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

    <?php if ($aImpNews && count($aImpNews) > 0) { ?>
        <!-- inner container start -->
        <div class="inner-container">
            <div class="container">
                <div class="row service-layout">

                    <?php foreach ($aImpNews as $item) { ?>

                        <div class="col-md-4 col-sm-12">
                            <div>
                                <h4 class="col-header">
                                    <?php if ($item['cat_id'] == $this->config->item('hoc_tieng_han')) {
                                        echo '<img src="' . base_url() . 'webresources/images/hoctienghan.png" style="width: 50px;" />   ';
                                        echo $this->lang->line('HOC_TIENG_HAN');
                                    }
                                    else if ($item['cat_id'] == $this->config->item('hoc_bong')) {
                                        echo '<img src="' . base_url() . 'webresources/images/hocbong.png" style="width: 50px;" />   ';
                                        echo $item['cat_name'];
                                    }
                                    else {
                                        echo '<img src="' . base_url() . 'webresources/images/duhoc.png" style="width: 50px;" />   ';
                                        echo $item['cat_name'];
                                    } ?></h4>
                                <div class="widget-box">
                                    <ul class="list">

                                        <?php foreach ($item['related_news'] as $news_item) { ?>
                                            <li><a href="<?php echo base_url() . 'news/' . $news_item['slug']; ?>">
                                                    <img
                                                        src="<?php echo base_url(); ?><?php if (empty($news_item['img_src'])) {
                                                            echo 'webresources/images/banner0.jpg';
                                                        }
                                                        else {
                                                            echo $news_item['img_src'];
                                                        } ?>"
                                                        alt=""/>
                                                    <?php echo $news_item['title'] ?><br/>
                                                    <small><?php echo date_format(new DateTime($news_item['created_date']), "F d, Y"); ?></small>
                                                </a></li>
                                        <?php } ?>

                                    </ul>
                                </div>
                                <?php if ($item['count_news'] > 4) { ?>
                                    <div class="pull-right"><a
                                            href="<?php echo base_url() . 'cat/' . $item['cat_slug']; ?>"
                                            class="btn btn-default btn-xs"><?php echo $this->lang->line('READ_MORE'); ?>
                                            <i
                                                class="ion ion-ios-arrow-thin-right"></i></a></div>
                                <?php } ?>
                            </div>
                        </div>

                    <?php } ?>


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
                <div class="row">
                    <div class="col-sm-12">
                        <ul class="recent-projects-slider">

                            <?php foreach ($universities as $university) { ?>

                                <li>
                                    <div class="project-box">
                                        <div class="row">
                                            <div class="col-md-6 text-center">
                                                <div class="project-img-box">
                                                    <ul class="projects-slider">

                                                        <?php foreach ($university['gallery'] as $item) { ?>

                                                            <li><img
                                                                    src="<?php echo base_url(); ?>/<?php echo $item['img_src']; ?>"
                                                                    alt=""/></li>

                                                        <?php } ?>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="col-md-6 padding-top--large">
                                                <h3><?php echo $university['title']; ?></h3>
                                                <p><?php echo $university['description']; ?></p>

                                                <h4>Website -
                                                    <small><a href="<?php echo $university['url']; ?>"
                                                              target="_blank"><?php echo $university['url']; ?></a>
                                                    </small>
                                                </h4>
                                                <!--<p><a href="#"
                                                  class="btn btn-primary"><?php echo $this->lang->line('READ_DETAIL'); ?>
                                                    <i
                                                        class="ion ion-ios-arrow-thin-right"></i></a></p> -->
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
    <?php } ?>

    <?php if ($last_news && count($last_news) > 0) { ?>
        <div class="news-inner-container">
            <div class="container">
                <h3 class="col-header-color"><?php echo $this->lang->line('LASTEST_NEWS'); ?></h3>

                <div class="row mar-50">
                    <div class="col-sm-6">
                        <div class="img-responsive">
                            <a href="<?php echo base_url() . 'news/' . $last_news[0]['slug']; ?>">
                                <img
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
                                    ?>"
                                    width="600px;">
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <a href="<?php echo base_url() . 'news/' . $last_news[0]['slug']; ?>"><h4>
                                <strong><?php echo $last_news[0]['title']; ?></strong></h4></a>
                        <h6 class="posted-date"><?php echo $this->lang->line('POST_DATE'); ?>:
                            <i><?php echo date_format(new DateTime($last_news[0]['created_date']), "d/m/Y"); ?></i></h6>
                        <div class="simple-summary"><?php echo $last_news[0]['summary']; ?><a
                                href="<?php echo base_url() . 'news/' . $last_news[0]['slug']; ?>"
                                data-toggle="tooltip"
                                data-placement="bottom"
                                data-original-title="Xem chi tiết"
                                style="margin-left: 10px;"><i class="ion ion-ios-arrow-thin-right"></i></a></div>
                    </div>
                </div>

                <div class="row">
                    <?php for ($i = 1; $i < 4; $i++) { ?>

                        <?php if ($i > (count($last_news) - 1)) {
                            break;
                        } ?>
                        <div class="col-md-4 col-sm-6">
                            <div class="service-box">
                                <a href="<?php echo base_url() . 'news/' . $last_news[$i]['slug']; ?>"><h4>
                                        <strong><?php echo $last_news[$i]['title']; ?></strong></h4></a>
                                <h6 class="posted-date"><?php echo $this->lang->line('POST_DATE'); ?>:
                                    <i><?php echo date_format(new DateTime($last_news[$i]['created_date']), "d/m/Y"); ?></i>
                                </h6>
                                <div><?php echo $last_news[$i]['summary']; ?>
                                    <a href="<?php echo base_url() . 'news/' . $last_news[$i]['slug']; ?>"
                                       data-toggle="tooltip" data-placement="bottom"
                                       data-original-title="Xem chi tiết" style="margin-left: 10px;"><i
                                            class="ion ion-ios-arrow-thin-right"></i></a>
                                </div>
                            </div>
                        </div>

                    <?php } ?>
                </div>
                <!--<div class="pull-right"><a class="btn btn-default btn-xs"><?php echo $this->lang->line('READ_MORE_NEWS'); ?>
                    <i
                        class="ion ion-ios-arrow-thin-right"></i></a></div>  -->
            </div>
        </div>
        <!-- inner container end -->
    <?php } ?>

    <?php if ($video_image && count($video_image) > 0) { ?>
        <div class="feature-container mar-60">
            <div class="container">
                <h3 class="col-header-color"
                    style="margin-bottom: -1px;"><?php echo $this->lang->line('SHARING_VIDEO'); ?></h3>
                <div class="feature-slider">

                    <?php for ($i = 0;
                               $i < count($video_image);
                               $i++) { ?>
                        <div class="feature-box dark">
                            <div class="white-paper">
                                <?php if (strpos($video_image[$i]['img_src'], 'youtube') == false) { ?>
                                    <img src="<?php echo base_url() . $video_image[$i]['img_src']; ?> " style="padding-top: 10px;"/>
                                    <div style="padding: 10px;">
                                        <img class="pull-left" src="<?php echo base_url() . 'webresources/images/image-icon.png' ?>" style="padding-top: 5px; width: 30px;"/>
                                        <p style="text-align: left;padding-left: 37px;"><?php echo $video_image[$i]['title']; ?></p>
                                    </div>
                                <?php }
                                else { ?>
                                    <a href="<?php echo $video_image[$i]['img_src']; ?>" target="_blank">
                                        <img src="<?php echo $video_image[$i]['youtube']; ?>" alt="" style="padding-top: 10px;"/>
                                    </a>
                                    <div style="padding: 10px;">
                                        <img class="pull-left" src="<?php echo base_url() . 'webresources/images/youtube-icon.png' ?>" style="padding-top: 5px; width: 30px;"/>
                                        <p style="text-align: left;padding-left: 37px;"><?php echo $video_image[$i]['title']; ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>

    <?php } ?>

    <!--form-->
    <div class="inner-container">
        <div class="container">
            <div class="col-md-6 col-sm-12">
                <div class="form-bg">
                    <div class="heading-text text-center text-uppercase" style="padding-top: 20px; color: white;">
                        <h3><?php echo $this->lang->line('CONTACT_WITH_US'); ?></h3>
                    </div>

                    <p class="message <?php echo $status; ?>"><?php if ($status == 'error') {
                            echo $this->lang->line('MESSAGE_ERROR');
                        }
                        elseif ($status == 'success') {
                            echo $this->lang->line('CONTACT_SUCCESS');
                        }
                        else {
                            echo '';
                        } ?></p>

                    <div class="row" style="height: 410px;">
                        <div class="col-md-10 col-md-offset-1">
                            <form class="contact-form" id="ContactForm" method="post"
                                  action="<?php echo base_url(); ?>">
                                <!--contact form-->
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" name="consult_name" class="form-control"
                                                   placeholder="<?php echo $this->lang->line('NAME'); ?> *"
                                                   required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" name="consult_email" class="form-control"
                                                   placeholder="<?php echo $this->lang->line('EMAIL'); ?> *"
                                                   required="required">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="consult_phone" class="form-control"
                                                   placeholder="<?php echo $this->lang->line('PHONE'); ?> *">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" name="consult_subject" class="form-control"
                                                   placeholder="<?php echo $this->lang->line('TITLE'); ?> *">
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                        <textarea class="form-control" name="consult_content" rows="10"
                                                  placeholder="<?php echo $this->lang->line('CONTENT'); ?> *"
                                                  required="required"></textarea>
                                        </div>
                                        <input type="submit" value="<?php echo $this->lang->line('SEND'); ?>"
                                               name="btn_consult_send" class="btn btn-primary"/>
                                    </div>
                                </div>
                            </form>
                            <!--end contact form-->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12" style="margin-left: 70px;">
                <div class="heading-text text-center text-uppercase" style="padding-top: 20px;">
                    <h3><?php echo $this->lang->line('SOCIAL'); ?></h3>
                </div>
                <div style="margin-left: auto; margin-right: auto;">
                    <div class="fb-page" data-href="https://www.facebook.com/issiloo.edu.vn" data-tabs="timeline"
                         data-width="420" data-height="200" data-small-header="false" data-adapt-container-width="true"
                         data-hide-cover="false" data-show-facepile="true">
                        <div class="fb-xfbml-parse-ignore">
                            <blockquote cite="https://www.facebook.com/issiloo.edu.vn"><a
                                    href="https://www.facebook.com/issiloo.edu.vn">Hàn ngữ ISSILOO</a></blockquote>
                        </div>
                    </div>
                    <div>
                        <img src="<?php echo base_url() . 'webresources/images/zalo.jpg' ?>"
                             style="width: 420px; margin-top: 40px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main container end -->

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) {
            return;
        }
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1463519310579697";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php $this->load->view('layout/webapp/footer'); ?>
