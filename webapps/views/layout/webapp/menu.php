<header>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="logo"><a href="<?php echo base_url(); ?>" class="animsition-link"><img src="<?php echo base_url(); ?>webresources/images/logo-line-2.png"
                                                                                    alt="ISSILOO"/></a></div>

                <div class="hotline">
                    <strong> <i class="fa fa-phone"></i> Phone: </strong>  <strong style="color: red;">08 3517 1098 - 08 3517 1099</strong> <i class="fa fa-phone" style="margin-left: 10px;"></i> Hotline: </strong>  <strong style="color: red;">0898 084 080</strong>
                </div>
                <div class="nav-menu-icon"><a href="#"><i></i></a></div>
                <nav>
                    <ul class="menu">
                        <li><a class="active" href="<?php echo base_url(); ?>"><?php echo $this->lang->line('MENU_HOME'); ?></a></li>
                        <?php echo $menustr; ?>
                        <li><a href="<?php echo base_url().'contact'; ?>"><?php echo $this->lang->line('MENU_CONTACT'); ?></a></li>
                        <li>
                            <form method="post" action="<?php echo base_url().'search/' ?>" class="search-form">
                                <div class="form-group has-feedback">
                                    <label for="search" class="sr-only">Search</label>
                                    <input type="text" class="form-control" id="search_keyword" name="search_keyword" id="search"
                                           placeholder="search" onkey>
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
