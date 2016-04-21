<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 overflow">
                <div class="social-icons pull-right">
                    <ul class="nav nav-pills">
                        <li><a href=""><i class="fa fa-facebook"></i></a></li>
                        <li><a href=""><i class="fa fa-twitter"></i></a></li>
                        <li><a href=""><i class="fa fa-google-plus"></i></a></li>
                        <li>
                            <?php
                            $attributes = array('id' => 'languageForm');
                            echo form_open('switchlanguage', $attributes);
                            ?>
                            <input type="hidden" name="redirurl" value="<?php echo $_SERVER['REQUEST_URI']; ?>"/>
                            <input type="checkbox"
                                   id="languageToggle"
                                   name="languageToggle"
                                <?php
                                if (strcasecmp($_SESSION["activeLanguage"], "en") == 0) {
                                    ?>
                                    checked
                                    <?php
                                }
                                ?>
                                   data-toggle="toggle"
                                   data-style="slow"
                                   data-on="<i class='fa fa-language'></i> Eng &nbsp;&nbsp;"
                                   data-off="<i class='fa fa-language'></i> Vie &nbsp;&nbsp;"
                                   data-size="mini"/>
                            </form
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-inverse" role="banner">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <a class="navbar-brand" href="<?php echo site_url('home'); ?>">
                    <h1><img src="<?php echo base_url(); ?>/webresources/images/flag.png" alt="logo"></h1>
                </a>

            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a
                            href="<?php echo site_url('home'); ?>"><?php echo $this->lang->line('MENU_HOME'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('product'); ?>"><?php echo $this->lang->line('MENU_PRODUCT'); ?></a>
                    </li>
                    <li class="dropdown"><a
                            href="<?php echo site_url('introduce'); ?>"><?php echo $this->lang->line('MENU_ABOUT'); ?>
                            <i
                                class="fa fa-angle-down"></i></a>
                        <ul role="menu" class="sub-menu">

                            <li>
                                <a href="<?php echo site_url('ourbusiness'); ?>"><?php echo $this->lang->line('MENU_BUSINESS'); ?> </a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('photos'); ?>"><?php echo $this->lang->line('MENU_PHOTOS'); ?></a>
                            </li>
                            <li>
                                <a href="<?php echo site_url('introduce'); ?>"><?php echo $this->lang->line('MENU_ABOUT'); ?></a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="<?php echo site_url('newsandevents'); ?>"><?php echo $this->lang->line('MENU_NEWS_EVENTS'); ?></a></a>
                    </li>
                    <li><a href="<?php echo site_url('career'); ?>"><?php echo $this->lang->line('MENU_CAREER'); ?></a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('contact'); ?>"><?php echo $this->lang->line('MENU_CONTACT'); ?></a>
                    </li>
                </ul>
            </div>

            <div class="search">
                <form role="form" name="userinput" action="<?php echo base_url(); ?>webapp/search_controller/find" method="post">
                    <i class="fa fa-search"></i>
                    <div class="field-toggle">
                        <input name="name" type="text" class="search-form" autocomplete="off" placeholder="Search">
                    </div>
                </form>
            </div>
        </div>
    </div>
</header>