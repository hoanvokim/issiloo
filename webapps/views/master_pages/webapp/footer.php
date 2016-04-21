<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 text-center bottom-separator">
                <img src="<?php echo base_url(); ?>/webresources/images/home/under.png" class="img-responsive inline" alt="">
            </div>
            <div class="col-md-3 col-sm-12">
                <div class="testimonial bottom">
                    <h2><?php echo $this->lang->line('USER_ACCESS'); ?></h2>
                    <div class="list-group">
                        <a class="list-group-item"><i class="fa fa-user fa-fw"></i>&nbsp; <?php echo $this->lang->line('ONLINE'); ?>: 12</a>
                        <a class="list-group-item"><i class="fa fa-certificate fa-fw"></i>&nbsp; <?php echo $this->lang->line('ACCESSED'); ?>: 12930</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <div class="contact-info bottom">
                    <h2><?php echo $this->lang->line('CONTACT_INFO'); ?></h2>
                    <div class="list-group">
                        <a class="list-group-item"><i class="fa fa-barcode fa-fw"></i>&nbsp; <?php echo $this->lang->line('COMPANY_CODE'); ?>: <?php echo $this->lang->line('COMPANY_CODE_VALUE'); ?></a>
                        <a class="list-group-item"><i class="fa fa-user fa-fw"></i>&nbsp; <?php echo $this->lang->line('COMPANY_NAME'); ?>: <?php echo $this->lang->line('COMPANY_NAME_VALUE'); ?></a>
                        <a class="list-group-item"><i class="fa fa-user fa-fw"></i>&nbsp; <?php echo $this->lang->line('COMPANY_SHORTNAME'); ?>: <?php echo $this->lang->line('COMPANY_SHORTNAME_VALUE'); ?></a>
                        <a class="list-group-item"><i class="fa fa-road fa-fw"></i>&nbsp; <?php echo $this->lang->line('ADDRESS'); ?>: <?php echo $this->lang->line('ADDRESS_VALUE'); ?></a>
                        <a class="list-group-item"><i class="fa fa-phone fa-fw"></i>&nbsp; <?php echo $this->lang->line('PHONE'); ?>: <?php echo $this->lang->line('PHONE_VALUE'); ?></a>
                        <a class="list-group-item"><i class="fa fa-fax fa-fw"></i>&nbsp; <?php echo $this->lang->line('FAX'); ?>: <?php echo $this->lang->line('FAX_VALUE'); ?></a>
                        <a class="list-group-item"><i class="fa fa-google fa-fw"></i>&nbsp; <?php echo $this->lang->line('EMAIL'); ?>: <?php echo $this->lang->line('EMAIL_VALUE'); ?></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-12">
                <div class="contact-form bottom">
                    <h2><?php echo $this->lang->line('SEND_MESSAGE'); ?></h2>
                    <form id="main-contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="<?php echo $this->lang->line('NAME'); ?>">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required"
                                   placeholder="<?php echo $this->lang->line('EMAIL'); ?>">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="8"
                                      placeholder="<?php echo $this->lang->line('TEXT'); ?>"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-submit" value="<?php echo $this->lang->line('SEND'); ?>">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="copyright-text text-center">
                    <p>&copy; Copyright - BaSeaFood & The Spring Solutions.</p>
                    <p>Designed by <a target="_blank" href="http://www.baseafood.vn">The Spring</a></p>
                </div>
            </div>
        </div>
    </div>
</footer>