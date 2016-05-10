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
                                    <ul class="project-category">
                                        <li><a href="#" data-filter="" id="option1" class="active">Du học</a></li>
                                        <li><a href="#" data-filter="one" id="option1">Hàn Quốc</a></li>
                                        <li><a href="#" data-filter="two" id="option2">Úc</a></li>
                                        <li><a href="#" data-filter="three" id="option3">Koguryeo</a></li>
                                        <li><a href="#" data-filter="four" id="option4">Busan</a></li>
                                    </ul>

                                    <div id="masonry" class="row">

                                        <?php foreach($anews as $news){ ?>

                                            <div data-filter="one" class="col-md-4 col-sm-6 grid-item">
                                                <img src="<?php echo base_url().$news['img_src']; ?>" alt="" style="min-height: 200px;min-width:200px;"/>
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


                </div>
            </div>
        </div>
    </div>
    <!-- main container end -->

<?php $this->load->view('layout/webapp/footer'); ?>