<?php $this->load->view('layout/webapp/header');  ?>

    <!-- main container start -->
    <div class="inner-container">
        <div class="container">

            <div class="row">
                <div class="col-sm-12 col-md-8">
                    <br><br><br><br><br><br>
                    <ul class="project-category" style="text-align: left; margin-left:20px;">
                        <li><a href="#" data-filter="" id="option1" class="active"><?php echo $keyword; ?></a></li>
                    </ul>
                    <p style="margin-left:20px; color:#2e4c95;"><?php echo $this->lang->line('SEARCH_RESULT'); ?><span style="font-weight: bold;font-size: 18px;"><?php echo $search_item_count; ?></span></p>
                    <br>
                </div>
            </div>


            <?php if($search_item_count > 0){ ?>
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

                                        <?php if($total_page > 5 && $cur_page>1){ ?>
                                            <li><a href="<?php echo base_url().'search/'.$keyword.'/'.($cur_page-1); ?>"><i class="ion ion-android-arrow-back"></i></a></li>
                                        <?php } ?>

                                        <?php if($total_page <= 12){ for($i=1;$i<=$total_page;$i++){ ?>

                                            <li <?php if($cur_page==$i){ echo "class='active'"; }?>><a href="<?php echo base_url()."search/".$keyword.'/'.$i; ?>"><?php echo $i; ?></a></li>

                                        <?php } }else{ ?>

                                            <?php if(($cur_page-1)>=1){ ?>
                                                <li <?php if($cur_page==1){ echo "class='active'"; }?>><a href="<?php echo base_url()."search/".$keyword.'/1'; ?>">1</a></li>
                                            <?php } ?>

                                            <?php if(($cur_page-2) > 1){ ?>
                                                <li><a href="#">..</a></li>
                                            <?php } ?>

                                            <?php if(($cur_page-1)>1){ ?>
                                                <li><a href="<?php echo base_url()."search/".$keyword.'/'.($cur_page-1); ?>"><?php echo ($cur_page - 1); ?></a></li>
                                            <?php } ?>

                                            <li class="active"><a href="<?php echo base_url()."search/".$keyword.'/'.($cur_page); ?>"><?php echo $cur_page; ?></a></li>

                                            <?php if(($cur_page+1)<$total_page){ ?>
                                                <li><a href="<?php echo base_url()."search/".$keyword.'/'.($cur_page+1); ?>"><?php echo ($cur_page + 1); ?></a></li>
                                            <?php } ?>

                                            <?php if(($cur_page+2) < $total_page){ ?>
                                                <li><a href="#">..</a></li>
                                            <?php } ?>

                                            <?php if(($cur_page+1)<=$total_page){ ?>
                                                <li <?php if($cur_page==$total_page){ echo "class='active'"; }?>><a href="<?php echo base_url()."search/".$keyword.'/'.$total_page; ?>"><?php echo $total_page; ?></a></li>
                                            <?php } ?>

                                        <?php } ?>

                                        <?php if($total_page > 5 && $cur_page<$total_page){ ?>
                                            <li><a href="<?php echo base_url().'search/'.$keyword.'/'.($cur_page+1); ?>"><i class="ion ion-android-arrow-forward"></i></a></li>
                                        <?php } ?>

                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                    <!-- inner container end -->

                </div>

            </div>
            <?php } ?>
    </div>
    </div>
    <!-- main container end -->

<?php $this->load->view('layout/webapp/footer'); ?>