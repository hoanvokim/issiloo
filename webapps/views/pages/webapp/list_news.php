<?php $this->load->view('layout/webapp/header'); ?>

<?php $this->load->view('components/webapp/banner_start'); ?>

<!-- main container start -->
<div class="inner-container" style="margin-top: 30px;">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <!-- inner container start -->
                <div class="inner-container">
                    <div class="container">
                        <div id="masonry" class="row">

                        <?php if($anews && count($anews) > 0){ ?>
                            <?php foreach ($anews as $news) { ?>
                                <!-- blog item start -->
                                <div class="col-md-12 grid-item">
                                    <div class="blog-item">
                                        <div class="entry-media">
                                            <img src="<?php echo base_url(); ?><?php if(empty($news['img_src'])){echo 'webresources/images/banner0.jpg';} else { echo $news['img_src'];} ?>"
                                                 alt=""/>
                                        </div>
                                        <div class="entry-content">
                                            <span class="entry-date"><a href="#"><?php echo date_format(new DateTime($news['created_date']),"d.m.Y"); ?></a></span>
                                            <h5><a href="<?php echo base_url(); ?>news/<?php echo $news['slug']; ?>"><?php echo $news['title']; ?></a></h5>
                                            <div style="padding: 15px;"><?php echo $news['summary']; ?></div>
                                            <br>
                                            <a href="<?php echo base_url(); ?>news/<?php echo $news['slug']; ?>" class="btn btn-primary btn-xs"><?php echo $this->lang->line('READ_DETAIL'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog item end -->
                            <?php }
                        } ?>


                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <ul class="pagination">

                                    <?php if ($total_page > 5 && $cur_page > 1) { ?>
                                        <li>
                                            <a href="<?php echo base_url() . 'cat/' . $slug . '/' . ($cur_page - 1); ?>"><i
                                                    class="ion ion-android-arrow-back"></i></a></li>
                                    <?php } ?>

                                    <?php if ($total_page <= 12) {
                                        for ($i = 1; $i <= $total_page; $i++) { ?>

                                            <li <?php if ($cur_page == $i) {
                                                echo "class='active'";
                                            } ?>>
                                                <a href="<?php echo base_url() . "cat/" . $slug . "/$i"; ?>"><?php echo $i; ?></a>
                                            </li>

                                        <?php }
                                    } else { ?>

                                        <?php if (($cur_page - 1) >= 1) { ?>
                                            <li <?php if ($cur_page == 1) {
                                                echo "class='active'";
                                            } ?>><a href="<?php echo base_url() . "cat/" . $slug; ?>">1</a></li>
                                        <?php } ?>

                                        <?php if (($cur_page - 2) > 1) { ?>
                                            <li><a href="#">..</a></li>
                                        <?php } ?>

                                        <?php if (($cur_page - 1) > 1) { ?>
                                            <li>
                                                <a href="<?php echo base_url() . "cat/" . $slug . "/" . ($cur_page - 1); ?>"><?php echo($cur_page - 1); ?></a>
                                            </li>
                                        <?php } ?>

                                        <li class="active"><a
                                                href="<?php echo base_url() . "cat/" . $slug . "/" . ($cur_page); ?>"><?php echo $cur_page; ?></a>
                                        </li>

                                        <?php if (($cur_page + 1) < $total_page) { ?>
                                            <li>
                                                <a href="<?php echo base_url() . "cat/" . $slug . "/" . ($cur_page + 1); ?>"><?php echo($cur_page + 1); ?></a>
                                            </li>
                                        <?php } ?>

                                        <?php if (($cur_page + 2) < $total_page) { ?>
                                            <li><a href="#">..</a></li>
                                        <?php } ?>

                                        <?php if (($cur_page + 1) <= $total_page) { ?>
                                            <li <?php if ($cur_page == $total_page) {
                                                echo "class='active'";
                                            } ?>>
                                                <a href="<?php echo base_url() . "cat/" . $slug . "/$total_page"; ?>"><?php echo $total_page; ?></a>
                                            </li>
                                        <?php } ?>

                                    <?php } ?>

                                    <?php if ($total_page > 5 && $cur_page < $total_page) { ?>
                                        <li>
                                            <a href="<?php echo base_url() . 'cat/' . $slug . '/' . ($cur_page + 1); ?>"><i
                                                    class="ion ion-android-arrow-forward"></i></a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- inner container end -->

            </div>
            <div class="col-sm-12 col-md-4">

                <?php if($relatednews && count($relatednews) > 0){
                    foreach ($relatednews as $item) { ?>
                    <!-- widget start -->
                    <div class="widget-box">
                        <h4><?php echo $item['cat_name']; ?></h4>
                        <ul class="list">

                            <?php $cnt = count($item['related_news']) >= 4 ? 4 : count($item['related_news']); ?>
                            <?php for ($i = 0; $i < $cnt; $i++) { ?>
                                <li>
                                    <a href="<?php echo base_url(); ?>news/<?php echo $item['related_news'][$i]['slug']; ?>"><img
                                            src="<?php echo base_url(); ?><?php if(empty($item['related_news'][$i]['img_src'])){echo 'webresources/images/img_default.jpg';} else { echo $item['related_news'][$i]['img_src'];} ?>"
                                            alt=""/><?php echo $item['related_news'][$i]['title']; ?><br/>
                                        <small><?php echo date_format(new DateTime($item['related_news'][$i]['created_date']), "F d, Y"); ?></small>
                                    </a></li>
                            <?php } ?>


                        </ul>
                    </div>
                    <!-- widget end -->
                <?php }
                } ?>


                <!--register form-->
                <div class="inner-container">
                    <div class="container">
                        <div class="form-bg-large">
                            <div class="heading-text text-center text-uppercase" style="padding-top: 20px; color: white;">
                                <h3><?php echo $this->lang->line('REGISTER_CONSULT'); ?></h3>
                            </div>

                            <p class="message <?php echo $status; ?>"><?php if ($status == 'error') {
                                    echo $this->lang->line('MESSAGE_ERROR');
                                } elseif ($status == 'success') {
                                    echo $this->lang->line('CONTACT_SUCCESS');
                                } else {
                                    echo '';
                                } ?></p>

                            <div class="row" style="height: 405px;">
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
                                                    <input type="text" name="subject" class="form-control" name="consult_phone"
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
                </div> <!-- register consult -->
                <!-- end regiter consult -->
            </div>
        </div>
    </div>
</div>
<!-- main container end -->

<?php $this->load->view('layout/webapp/footer'); ?>
