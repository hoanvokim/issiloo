<!--MAIN NAVIGATION-->
<!--===================================================-->
<nav id="mainnav-container">
    <div id="mainnav">

        <!--Menu-->
        <!--================================-->
        <div id="mainnav-menu-wrap">
            <div class="nano">
                <div class="nano-content">
                    <ul id="mainnav-menu" class="list-group">
                        <li class="list-header">Tổng quát</li>
                        <li>
                            <a href="<?php echo site_url('admin'); ?>">
                                <i class="fa fa-dashboard"></i>
                                            <span class="menu-title">
												<strong>Xem tổng quan</strong>
											</span>
                            </a>
                        </li>
                        <li>

                            <a href="<?php echo site_url('manage-intro'); ?>">
                                <i class="fa fa-info-circle"></i>
                                <span class="menu-title">Giới thiệu</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('manage-news'); ?>">
                                <i class="fa fa-newspaper-o"></i>
                                <span class="menu-title">Tin Tức</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('manage-sharing'); ?>">
                                <i class="fa fa-share-alt"></i>
                                <span class="menu-title">Góc chia sẽ</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('manage-faq'); ?>">
                                <i class="fa fa-question-circle-o"></i>
                                <span class="menu-title">Hỏi đáp</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('manage-tag'); ?>">
                                <i class="fa fa-search"></i>
                                <span class="menu-title">Từ khoá tìm kiếm</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="list-header">Du Học</li>
                        <li>
                            <a href="<?php echo site_url('manage-study-category'); ?>">
                                <i class="fa fa-spinner"></i>
                                <span class="menu-title">Xem tất cả Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('study-manager/create-category'); ?>">
                                <i class="fa fa-plus-circle"></i>
                                <span class="menu-title">Thêm Category</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('news-manager/add-news'); ?>">
                                <i class="fa fa-plus-circle"></i>
                                <span class="menu-title">Viết bài mới</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('add-university'); ?>">
                                <i class="fa fa-plus-circle"></i>
                                <span class="menu-title">Thêm trường đại học</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="list-header">Trung tâm Hàn Ngữ</li>
                        <li>
                            <a href="<?php echo site_url('add-program'); ?>">
                                <i class="fa fa-product-hunt"></i>
                                <span class="menu-title">Chương trình đào tạo</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('add-schedule'); ?>">
                                <i class="fa fa-calendar"></i>
                                <span class="menu-title">Thời khoá biểu</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="list-header">Settings</li>
                        <li>
                            <a href="<?php echo base_url(); ?>logout"> <i class="fa fa-sign-out fa-fw"></i> Logout </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!--================================-->
        <!--End menu-->

    </div>
</nav>
<!--===================================================-->
<!--END MAIN NAVIGATION-->
