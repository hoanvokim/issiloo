<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo"><a href="index.html" class="animsition-link"><img src="<?php echo base_url(); ?>webresources/images/logo-line.png"
                                                                                    alt="ISSILOO"/></a></div>
                <div class="nav-menu-icon"><a href="#"><i></i></a></div>
                <nav>
                    <ul class="menu">
                        <li><a class="active" href="<?php echo base_url(); ?>"><?php echo $this->lang->line('MENU_HOME'); ?></a></li>
                        <li><a href="gioi-thieu.html"><?php echo $this->lang->line('MENU_INTRODUCE'); ?></a></li>
                        <?php echo $menustr; ?>
                        <li><a href="lien-he.html"><?php echo $this->lang->line('MENU_CONTACT'); ?></a></li>
                        <li>
                            <form action="" class="search-form">
                                <div class="form-group has-feedback">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" name="search" id="search"
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
