<!--NAVBAR-->
<!--===================================================-->
<header id="navbar">
    <div id="navbar-container" class="boxed">

        <!--Brand logo & name-->
        <!--================================-->
        <div class="navbar-header">
            <a href="admin.html" class="navbar-brand"> <i class="fa fa-cube brand-icon"></i>
                <div class="brand-title"><span class="brand-text">Admin</span></div>
            </a>
        </div>
        <!--================================-->
        <!--End brand logo & name-->

        <!--Navbar Dropdown-->
        <!--================================-->
        <div class="navbar-content clearfix">
            <ul class="nav navbar-top-links pull-left">
                <!--Navigation toogle button-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="tgl-menu-btn">
                    <a class="mainnav-toggle" href="#"> <i class="fa fa-navicon fa-lg"></i> </a>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End Navigation toogle button-->
            </ul>
            <ul class="nav navbar-top-links pull-right">
                <!--Language selector-->
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <li class="dropdown">
                    <a id="demo-lang-switch" class="lang-selector dropdown-toggle" href="#" data-toggle="dropdown">
                            <span class="lang-selected"> <img class="lang-flag" src="<?php echo base_url(); ?>webresources/dm/img/flags/united-kingdom.png"
                                                              alt="English"> <span class="lang-id">EN</span> <span
                                    class="lang-name">English</span> </span>
                    </a>

                    <!--Language selector menu-->
                    <ul class="head-list dropdown-menu with-arrow">
                        <li>
                            <!--English-->
                            <a href="#" class="active"> <img class="lang-flag" src="<?php echo base_url(); ?>webresources/dm/img/flags/united-kingdom.png"
                                                             alt="English"> <span class="lang-id">EN</span> <span
                                    class="lang-name">English</span> </a>
                        </li>
                        <li>
                            <!--Spain-->
                            <a href="#"> <img class="lang-flag" src="<?php echo base_url(); ?>webresources/dm/img/flags/vietnam.png" alt="Spain"> <span
                                    class="lang-id">VN</span> <span class="lang-name">Việt Nam</span> </a>
                        </li>
                        <li>
                            <!--Spain-->
                            <a href="#"> <img class="lang-flag" src="<?php echo base_url(); ?>webresources/dm/img/flags/korea.png" alt="Spain"> <span
                                    class="lang-id">KR</span> <span class="lang-name">Korea</span> </a>
                        </li>
                    </ul>
                </li>
                <!--~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~-->
                <!--End language selector-->
            </ul>
        </div>
        <!--================================-->
        <!--End Navbar Dropdown-->

    </div>
</header>
<!--===================================================-->
<!--END NAVBAR-->