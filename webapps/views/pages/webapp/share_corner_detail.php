<?php $this->load->view('layout/webapp/header');  ?>

<?php $this->load->view('components/webapp/banner_start'); ?>


<!-- main container start -->
<div class="inner-container" style="margin-top: 30px;">
    <div class="container">
        <div class="row">
            <?php if($detail != -1){ ?>
                <!-- inner container start -->
                <div class="inner-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="project-sidebar-widget">
                                    <h3><?php echo $detail['title']; ?></h3>
                                    <p><?php echo $detail['summary']; ?></p>
                                </div>


                               <!-- <div class="project-sidebar-widget">
                                    <h4>Website</h4>
                                    <h6><a href="#" target="_blank">www.website-url.com</a></h6>
                                </div>

                                <div class="project-sidebar-widget">
                                    <h4>Our Approach</h4>
                                    <p>Duis laoreet est nec molestie volutpat. Pellentesque eu condimentum turpis.
                                        Praesent fringilla ex at massa consectetur finibus. Nulla facilisi.Nulla
                                        rutrum nibh in accumsan venenatis. Duis laoreet est nec molestie
                                        volutpat.</p>
                                </div> -->


                            </div>


                            <div class="col-md-8">
                                <?php if($is_video==false){ ?>
                                    <div class="project-screens screen-slider">
                                        <?php foreach($img_galleries as $item){ ?>
                                            <img src="<?php echo base_url().$item['img_src']; ?>" alt="" />
                                        <?php } ?>
                                    </div>


                                <?php }else{ ?>

                                    <iframe width="100%" height="450"
                                            src="<?php echo $link_embed; ?>">
                                    </iframe>

                                <?php } ?>

                                <div class="project-nav">
                                    <?php if($cur_post>0){ ?>
                                        <a href="<?php echo base_url().'news/'.$lst_post[$cur_post-1]['slug']; ?>" class="prev-project btn btn-primary">
                                            <i class="ion ion-ios-undo"></i> <?php echo $this->lang->line('PREVIOUS_POST'); ?></a>
                                    <?php } ?>

                                    <?php if($cur_post < $max_post){ ?>
                                        <a href="<?php echo base_url().'news/'.$lst_post[$cur_post+1]['slug']; ?>" class="next-project btn btn-primary"><?php echo $this->lang->line('NEXT_POST'); ?>
                                            <i class="ion ion-ios-redo"></i></a>
                                    <?php } ?>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            <!-- inner container end -->
            <?php } ?>
        </div>
    </div>
</div>
<!-- main container end -->


<?php $this->load->view('layout/webapp/footer'); ?>
