<?php $this->load->view('layout/webapp/header');  ?>

<?php $this->load->view('components/webapp/banner_start'); ?>

<!-- main container start -->
<div class="inner-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <!-- inner container start -->
                <div class="inner-container">
                    <div class="container">
                        <div id="masonry" class="row">


                            <?php foreach($anews as $news){?>
                                <!-- blog item start -->
                                <div class="col-md-12 grid-item">
                                    <div class="blog-item">
                                        <div class="entry-media">
                                            <img src="<?php echo base_url(); ?><?php echo $news['img_src']; ?>"
                                                                             alt=""/>
                                        </div>
                                        <div class="entry-content">
                                            <span class="entry-date"><a href="#"><?php echo date_format(new DateTime($news['created_date']),"d.m.Y"); ?></a></span>
                                            <h5><a href="<?php echo base_url(); ?>news/<?php echo $news['slug']; ?>"><?php echo $news['title']; ?></a></h5>
                                            <p><?php echo $news['summary']; ?></p>
                                            <div class="entry-meta">
                                                <span class="entry-comment"><a
                                                        href="#">12 Comments</a></span>
                                            </div>
                                            <a href="<?php echo base_url(); ?>news/<?php echo $news['slug']; ?>" class="btn btn-primary btn-xs"><?php echo $this->lang->line('READ_DETAIL'); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <!-- blog item end -->
                            <?php } ?>






                       
                        </div>

                        <div class="row">
                            <div class="col-sm-12 text-center">
                                <ul class="pagination">

                                    <?php if($total_page>10){ ?>
                                        <li><a href="#"><i class="ion ion-android-arrow-back"></i></a></li>
                                    <?php } ?>

                                    <?php for($i=1;$i<=$total_page;$i++){ ?>

                                        <li><a href="<?php echo base_url()."cat/".$slug."/$i"; ?>"><?php echo $i; ?></a></li>

                                    <?php } ?>

                                    <?php if($total_page>10){ ?>
                                        <li><a href="#"><i class="ion ion-android-arrow-forward"></i></a></li>
                                    <?php } ?>

                                </ul>
                            </div>
                        </div>


                    </div>
                </div>
                <!-- inner container end -->

            </div>
            <div class="col-sm-12 col-md-4">

                <?php foreach($relatednews as $item){ ?>
                    <!-- widget start -->
                    <div class="widget-box">
                        <h4><?php echo $item['cat_name']; ?></h4>
                        <ul class="list">

                            <?php $cnt = count($item['related_news']) >= 4 ? 4:count($item['related_news']);  ?>
                            <?php for($i=0;$i<$cnt;$i++){ ?>
                                <li><a href="<?php echo base_url(); ?>news/<?php echo $item['related_news'][$i]['slug']; ?>"><img src="<?php echo base_url(); ?><?php echo $item['related_news'][$i]['img_src']; ?>" alt=""/><?php echo $item['related_news'][$i]['title']; ?><br/>
                                        <small><?php echo date_format(new DateTime($item['related_news'][$i]['created_date']),"F d, Y");?></small>
                                    </a></li>
                            <?php } ?>


                        </ul>
                    </div>
                    <!-- widget end -->
                <?php } ?>


                <!--form-->
                <div class="inner-container">
                    <div class="container">
                        <div class="heading-text text-center text-uppercase">
                            <h3><?php echo $this->lang->line('REGISTER_CONSULT'); ?></h3>
                        </div>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <form class="contact-form" id="ContactForm" method="post" action="sendemail.php">
                                    <!--contact form-->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="name" class="form-control"
                                                       placeholder="<?php echo $this->lang->line('NAME'); ?>"
                                                       required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="<?php echo $this->lang->line('EMAIL'); ?>"
                                                       required="required">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control"
                                                       placeholder="<?php echo $this->lang->line('PHONE'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <input type="text" name="subject" class="form-control"
                                                       placeholder="<?php echo $this->lang->line('TITLE'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                        <textarea class="form-control" name="message" rows="10" placeholder="<?php echo $this->lang->line('CONTENT'); ?>"
                                                  required="required"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-primary"><?php echo $this->lang->line('SEND'); ?></button>
                                        </div>
                                    </div>
                                </form>
                                <!--end contact form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main container end -->

<?php $this->load->view('layout/webapp/footer'); ?>
