<!--<header>-->
<!--    <div class="container">-->
<!--        <div class="row">-->
<!--            <div class="col-sm-12">-->
<!--                <div class="logo"><a href="--><?php //echo base_url(); ?><!--" class="animsition-link"><img-->
<!--                            src="--><?php //echo base_url(); ?><!--webresources/images/logo-line-white.png"-->
<!--                            alt="ISSILOO"/></a></div>-->
<!---->
<!---->
<!--                <div class="nav-menu-icon"><a href="#"><i></i></a></div>-->
<!--                <nav>-->
<!--                    <ul class="menu">-->
<!--                        <li><a class="active"-->
<!--                               href="--><?php //echo base_url(); ?><!--">--><?php //echo $this->lang->line('MENU_HOME'); ?><!--</a>-->
<!--                        </li>-->
<!--                        --><?php //echo $menustr; ?>
<!--                        <li>-->
<!--                            <a href="--><?php //echo base_url() . 'contact'; ?><!--">--><?php //echo $this->lang->line('MENU_CONTACT'); ?><!--</a>-->
<!--                        </li>-->
<!--                        <li>-->
<!--                            <form method="post" action="--><?php //echo base_url() . 'search/' ?><!--" class="search-form">-->
<!--                                <div class="form-group has-feedback">-->
<!--                                    <label for="search" class="sr-only">Search</label>-->
<!--                                    <input type="text" class="form-control" id="search_keyword" name="search_keyword"-->
<!--                                           placeholder="search">-->
<!--                                    <span class="fa fa-search form-control-feedback"></span>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                </nav>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</header>-->
<!--header end-->

<div class="topbar">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <ul class="contactinfo" style="text-align: center;">
                    <li><a href="tel:0898 084 080"><img id="banner-ad" src="<?php echo base_url().'webresources/images/banner1.png'; ?>" style="width: 70%;"/></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<header class="navigation affix-top" id="nav" data-spy="affix">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo"><a href="<?php echo base_url(); ?>" class="animsition-link"><img
                            src="<?php echo base_url(); ?>webresources/images/logo-line-white.png"
                            alt="ISSILOO"/></a></div>


                <div class="nav-menu-icon"><a href="#"><i></i></a></div>
                <nav class="fixed-collapse-navbar">
                    <ul class="menu nav navbar-nav navbar-right">
                        <li><a class="active"
                               href="<?php echo base_url(); ?>"><?php echo $this->lang->line('MENU_HOME'); ?></a>
                        </li>
                        <?php echo $menustr; ?>
                        <li>
                            <a href="<?php echo base_url() . 'contact'; ?>"><?php echo $this->lang->line('MENU_CONTACT'); ?></a>
                        </li>
                        <li>
                            <form method="post" action="<?php echo base_url() . 'search/' ?>" class="search-form">
                                <div class="form-group has-feedback">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" id="search_keyword" name="search_keyword"
                                           placeholder="search">
                                    <span class="fa fa-search form-control-feedback"></span>
                                </div>
                            </form>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</header>
<!--header end-->