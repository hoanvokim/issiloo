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
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <!--<ul class="project-category">
                                        <li><a href="#" data-filter="" id="option1" class="active">Du học</a></li>
                                        <li><a href="#" data-filter="one" id="option1">Hàn Quốc</a></li>
                                        <li><a href="#" data-filter="two" id="option2">Úc</a></li>
                                        <li><a href="#" data-filter="three" id="option3">Koguryeo</a></li>
                                        <li><a href="#" data-filter="four" id="option4">Busan</a></li>
                                    </ul>  -->

                                    <br>

                                    <div id="masonry" class="row">

                                        <?php foreach($anews as $news){ ?>

                                            <div data-filter="one" class="col-md-4 col-sm-6 grid-item">
                                                <?php if($news['youtube_thumbnail']===false){ ?>
                                                    <img src="<?php echo base_url().$news['img_src']; ?>" alt="" style="min-height: 200px;min-width:200px;"/>
                                                <?php }else{ ?>
                                                    <img src="<?php echo $news['youtube_thumbnail']; ?>" alt="" style="min-height: 200px;min-width:200px;"/>
                                                <?php } ?>
                                                <a href="<?php echo base_url().'news/'.$news['slug']; ?>" class="portfolio-hover">
                                                    <div class="portfolio-hover-content">
                                                        <h4 style="text-transform: lowercase;letter-spacing: 1px;"><?php echo $news['title']; ?></h4>
                                                    </div>
                                                </a>
                                            </div>


                                        <?php } ?>

                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <ul class="pagination">

                                                <?php if($total_page > 5 && $cur_page>1){ ?>
                                                    <li><a href="<?php echo base_url().'cat/'.$slug.'/'.($cur_page-1); ?>"><i class="ion ion-android-arrow-back"></i></a></li>
                                                <?php } ?>

                                                <?php if($total_page <= 12){ for($i=1;$i<=$total_page;$i++){ ?>

                                                    <li <?php if($cur_page==$i){ echo "class='active'"; }?>><a href="<?php echo base_url()."cat/".$slug."/$i"; ?>"><?php echo $i; ?></a></li>

                                                <?php } }else{ ?>

                                                    <?php if(($cur_page-1)>=1){ ?>
                                                        <li <?php if($cur_page==1){ echo "class='active'"; }?>><a href="<?php echo base_url()."cat/".$slug; ?>">1</a></li>
                                                    <?php } ?>

                                                    <?php if(($cur_page-2) > 1){ ?>
                                                        <li><a href="#">..</a></li>
                                                    <?php } ?>

                                                    <?php if(($cur_page-1)>1){ ?>
                                                        <li><a href="<?php echo base_url()."cat/".$slug."/".($cur_page-1); ?>"><?php echo ($cur_page - 1); ?></a></li>
                                                    <?php } ?>

                                                    <li class="active"><a href="<?php echo base_url()."cat/".$slug."/".($cur_page); ?>"><?php echo $cur_page; ?></a></li>

                                                    <?php if(($cur_page+1)<$total_page){ ?>
                                                        <li><a href="<?php echo base_url()."cat/".$slug."/".($cur_page+1); ?>"><?php echo ($cur_page + 1); ?></a></li>
                                                    <?php } ?>

                                                    <?php if(($cur_page+2) < $total_page){ ?>
                                                        <li><a href="#">..</a></li>
                                                    <?php } ?>

                                                    <?php if(($cur_page+1)<=$total_page){ ?>
                                                        <li <?php if($cur_page==$total_page){ echo "class='active'"; }?>><a href="<?php echo base_url()."cat/".$slug."/$total_page"; ?>"><?php echo $total_page; ?></a></li>
                                                    <?php } ?>

                                                <?php } ?>

                                                <?php if($total_page > 5 && $cur_page<$total_page){ ?>
                                                    <li><a href="<?php echo base_url().'cat/'.$slug.'/'.($cur_page+1); ?>"><i class="ion ion-android-arrow-forward"></i></a></li>
                                                <?php } ?>

                                            </ul>
                                        </div>
                                    </div>

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

                            <p class="message <?php echo $status; ?>"><?php if($status=='error'){ echo $this->lang->line('MESSAGE_ERROR'); }elseif($status=='success'){ echo $this->lang->line('CONTACT_SUCCESS'); }else{ echo ''; } ?></p>


                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <form class="contact-form" id="ContactForm" method="post" action="<?php echo base_url().'cat/'.$slug.'/'.$cur_page; ?>">
                                        <!--contact form-->
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="consult_name" class="form-control"
                                                           placeholder="<?php echo $this->lang->line('NAME'); ?> *"
                                                           required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="email" name="consult_email" class="form-control"
                                                           placeholder="<?php echo $this->lang->line('EMAIL'); ?> *"
                                                           required="required">
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <input type="text" name="consult_phone" class="form-control"
                                                           placeholder="<?php echo $this->lang->line('PHONE'); ?>">
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
                                                    <textarea class="form-control" name="consult_content" rows="10" placeholder="<?php echo $this->lang->line('CONTENT'); ?> *"
                                                              required="required"></textarea>
                                                </div>
                                                <input type="submit" value="<?php echo $this->lang->line('SEND'); ?>" name="btn_consult_send" class="btn btn-primary"/>
                                            </div>
                                        </div>
                                    </form>
                                    <!--end contact form-->
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