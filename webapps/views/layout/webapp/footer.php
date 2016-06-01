<footer>
    <!--footer-upper start-->
    <div class="footer-upper">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-sm-12">
                    <h5><a href="#"><img src="<?php echo base_url(); ?>webresources/images/logo-line-white-2.png"
                                         alt="ISSILOO"
                                         class="footer-logo"/></a></h5>
                    <div style="width: 100%">
                        <ul class="social-links">
                            <li><a href="https://www.facebook.com/issiloo.edu.vn/" target="_blank" title="Facebook">
                                    <img src="<?php echo base_url() . 'webresources/images/fb.png' ?>"
                                         style="width: 45px;"/></a></li>
                            <li><a href="https://www.youtube.com/channel/UCypJRV59K16kc0AEjuCPJ9Q" target="_blank" title="Youtube">
                                    <img src="<?php echo base_url() . 'webresources/images/youtube.png' ?>"
                                         style="width: 45px;"/></a></li>
                            <li><a href="http://zaloapp.com/qr/p/fwc7rp42pe1x" target="_blank" title="Zalo">
                                    <img src="<?php echo base_url() . 'webresources/images/zalo.png' ?>"
                                         style="width: 45px;"/></a></li>
                        </ul>
                    </div>
                    <br/>
                </div>
                <div class="col-md-7 col-sm-12">
                    <div class="col-md-7 col-sm-12 text-left">
                        <h4><?php echo $this->lang->line('CONTACT_WITH_US'); ?></h4>
                        <address>
                            <p>
                                <i class="ion ion-ios-location-outline"></i> <?php echo $this->lang->line('ISSI_ADDRESS_STREET'); ?>
                            </p>

                            <p>
                                <i class="ion ion-ios-at-outline" style="font-size: 25px;"></i> <a
                                    href="mailto:kr-info@issiloo.edu.vn">kr-info@issiloo.edu.vn</a><br/>
                                <i class="ion ion-ios-telephone-outline"></i> Phone: <a
                                    href="tel:(08) 3517 1099"><?php echo $this->lang->line('ISSI_PHONE'); ?></a><br/>
                                <i class="ion ion-ios-telephone-outline"></i> Hotline: <a href="tel:0898 084 080">0898
                                                                                                                  084
                                                                                                                  080</a><br/>
                            </p>

                        </address>
                        <br/>
                    </div>
                    <div class="col-md-5 col-sm-12 text-right">
                        <h4><?php echo $this->lang->line('WORKING_TIME'); ?></h4>
                        <p class="open"><i
                                class="ion ion-ios-alarm-outline"></i> <?php echo $this->lang->line('MONDAY_FRIDAY'); ?>
                            <br/><?php echo $this->lang->line('MORNING_EVENING'); ?></p>

                        <p class="open"><i
                                class="ion ion-ios-alarm-outline"></i> <?php echo $this->lang->line('SATURDAY'); ?>
                            <br/><?php echo $this->lang->line('MORNING_NOON'); ?></p>

                        <br/>
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
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/slick.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/jquery.countTo.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/scroll.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/imagesloaded.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/masonry-3.1.4.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/masonry.filter.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/jquery.vide.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>webresources/js/custom.js"></script>

<!--Gmaps [ OPTIONAL ]-->
<script src="https://maps.googleapis.com/maps/api/js?v=3"></script>
<script src="<?php echo base_url(); ?>webresources/plugins/gmaps/gmaps.js"></script>
<!--Map Example [ SAMPLE ]-->
<script src="<?php echo base_url(); ?>webresources/dm/js/demo/misc-gmaps.js"></script>



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
<script type='text/javascript' data-cfasync='false'>window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '5fafbfea-65b9-4347-8f02-d4b6215668ae', f: true }); done = true; } }; })();</script>
</body>
</html>