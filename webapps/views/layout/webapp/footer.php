<footer>
    <!--footer-upper start-->
    <div class="footer-upper">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-sm-12">
                    <h5><a href="#"><img src="<?php echo base_url(); ?>webresources/images/logo-line-white-2.png"
                                         alt="ISSILOO"
                                         class="footer-logo"/></a></h5>
                    <address>
                        <p>
                            <i class="ion ion-ios-location-outline"></i> <?php echo $this->lang->line('ISSI_ADDRESS_STREET'); ?>
                        </p>

                        <p>
                            <i class="ion ion-ios-at-outline" style="font-size: 25px;"></i> <a
                                href="mailto:kr-info@issiloo.edu.vn">kr-info@issiloo.edu.vn</a><br/>
                            <i class="ion ion-ios-telephone-outline"></i> Phone: <a
                                href="tel:(08) 3517 1099"><?php echo $this->lang->line('ISSI_PHONE'); ?></a><br/>
                            <i class="ion ion-ios-telephone-outline"></i> Hotline: <a href="tel:0898 084 080">0898 084
                                080</a><br/>
                        </p>

                    </address>
                </div>
                <div class="col-md-4 col-sm-12 text-right">
                    <h5><i class="ion ion-email"></i> <?php echo $this->lang->line('WORKING_TIME'); ?></h5>
                    <p class="open"><i
                            class="ion ion-ios-alarm-outline"></i> <?php echo $this->lang->line('MONDAY_FRIDAY'); ?>
                        <br/><?php echo $this->lang->line('MORNING_EVENING'); ?></p>
                    <br/>
                    <div class="col-md-6 col-sm-6 pull-right">
                        <ul class="social-links" style="margin-right: -20px;">
                            <li><a href="https://www.facebook.com/issiloo.edu.vn/" target="_blank" title="Facebook">
                                    <img src="<?php echo base_url() . 'webresources/images/fb.png' ?>"
                                         style="width: 35px;"/></a></li>
                            <li><a href="https://www.facebook.com/issiloo.edu.vn/" target="_blank" title="Facebook">
                                    <img src="<?php echo base_url() . 'webresources/images/youtube.png' ?>"
                                         style="width: 35px;"/></a></li>
                            <li><a href="https://www.facebook.com/issiloo.edu.vn/" target="_blank" title="Facebook">
                                    <img src="<?php echo base_url() . 'webresources/images/zalo.png' ?>"
                                         style="width: 35px;"/></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--footer-upper end-->
</footer><!--footer end-->

</div> <!-- end of animsition -->

<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/animsition.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/slick.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/jquery.countTo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/imagesloaded.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/masonry-3.1.4.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/masonry.filter.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/jquery.vide.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/custom.js"></script>

<script>
    (function (i, s, o, g, r, a, m) {
        i['GoogleAnalyticsObject'] = r;
        i[r] = i[r] || function () {
                (i[r].q = i[r].q || []).push(arguments)
            }, i[r].l = 1 * new Date();
        a = s.createElement(o),
            m = s.getElementsByTagName(o)[0];
        a.async = 1;
        a.src = g;
        m.parentNode.insertBefore(a, m)
    })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');

    ga('create', 'UA-77858450-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>