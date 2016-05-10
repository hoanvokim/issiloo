<?php $this->load->view('layout/webapp/header');  ?>

<?php $this->load->view('components/webapp/banner_start'); ?>

<!-- inner container start -->
<div class="inner-container">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- blog item start -->

                <div class="single-post">
                    <div class="entry-content">
                        <!--<h4><a href="single-post.html"><?php echo $detail['title']; ?></a></h4>-->
                        <div>
                            <?php echo $detail['content']; ?>
                        </div>
                    </div>
                </div>
                <!-- blog item end -->

                <!-- author details start -->
                <!--<div class="blog-author">
                    <div class="desc">
                        <p class="author-socials pull-right">
                            <a target="_blank" href="#" title="Facebook" data-toggle="tooltip" data-placement="top"><i
                                    class="ion ion-social-facebook"></i></a>
                            <a target="_blank" href="#" title="Twitter" data-toggle="tooltip"
                               data-placement="top"><i class="ion ion-social-twitter"></i></a>
                            <a target="_blank" href="#" title="Pinterest" data-toggle="tooltip"
                               data-placement="top"><i class="ion ion-social-pinterest"></i></a>
                            <a target="_blank" href="#" title="Google Plus" data-toggle="tooltip"
                               data-placement="top"><i class="ion ion-social-googleplus"></i></a>
                            <a target="_blank" href="#" title="Dribble" data-toggle="tooltip"
                               data-placement="top"><i class="ion ion-social-dribbble"></i></a>
                            <a target="_blank" href="#" title="Instagram" data-toggle="tooltip"
                               data-placement="top"><i class="ion ion-social-instagram"></i></a>

                        </p>


                    </div>
                </div>-->
                <!-- author details end -->

                <!-- post nav start -->
                <div class="post-nav">
                    <?php if($cur_post > 0){ ?>
                        <h4 class="prev-post"><a href="<?php echo base_url().'news/'.$lst_post[$cur_post-1]['slug']; ?>" class="btn btn-primary btn-block"><i
                                    class="ion ion-ios-undo"></i> <?php echo $this->lang->line('PREVIOUS_POST'); ?></a></h4>
                    <?php } ?>

                    <?php if($cur_post < $max_post){ ?>
                        <h4 class="next-post"><a href="<?php echo base_url().'news/'.$lst_post[$cur_post+1]['slug']; ?>" class="btn btn-primary btn-block"><?php echo $this->lang->line('NEXT_POST'); ?> <i
                                    class="ion ion-ios-redo"></i></a></h4>
                    <?php } ?>

                </div>
                <!-- post nav end -->


                <div id="fb-root"></div>
                <script>(function(d, s, id) {
                        var js, fjs = d.getElementsByTagName(s)[0];
                        if (d.getElementById(id)) return;
                        js = d.createElement(s); js.id = id;
                        js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=1463519310579697";
                        fjs.parentNode.insertBefore(js, fjs);
                    }(document, 'script', 'facebook-jssdk'));</script>

                <div class="fb-comments" data-href="http://issiloo.edu.vn" data-numposts="5"></div>
            </div>

            <div class="col-md-4 sidebar">

                <!-- widget start -->
                <div class="widget-box">
                    <ul class="list">
                        <?php foreach($news_sidebar as $item){ ?>

                            <li><a href="<?php echo base_url(); ?>news/<?php echo $item['slug']; ?>"><img src="<?php echo base_url(); ?><?php echo $item['img_src']; ?>" alt=""/> <?php echo $item['title']; ?><br/>
                                    <small><?php echo date_format(new DateTime($item['created_date']),"F d, Y"); ?></small>
                                </a></li>

                        <?php } ?>

                    </ul>
                </div>
                <!-- widget end -->

                <!-- widget start -->
                <div class="widget-box">
                    <h4>Tags</h4>
                    <div class="tag-box">
                        <?php foreach($tagnews as $item){ ?>
                            <a href="<?php echo base_url(); ?>tag/<?php echo $item['tag_id']; ?>"><?php echo $item['tag_name']; ?></a>
                        <?php } ?>
                    </div>
                </div>
                <!-- widget end -->


            </div>
        </div>

    </div>
</div>
<!-- inner container end -->


<?php $this->load->view('layout/webapp/footer'); ?>
