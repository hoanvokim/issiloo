<?php $this->load->view('layout/webapp/header');  ?>

    <!--banner-container start-->
    <div class="inner-banner-container mar-20" style="background-image:url(../../../../assets/upload/images/webapp/banner1.jpg)">
        <div class="banner-title">
            <h1><?php echo $this->lang->line('CONTACT_BANNER_TITLE'); ?></h1>
            <h2><?php echo $this->lang->line('CONTACT_MESSAGE'); ?></h2>
        </div>
    </div>
    <!--banner-container end-->

    <!-- main container start -->
    <div class="inner-container">
        <div class="container">
            <div class="row">
                <!-- inner container start -->
                <div class="inner-container">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6 col-sm-6">
                                <h4><?php echo $this->lang->line('CONTACT_WITH_US'); ?></h4>

                                <p class="message <?php echo $status; ?>"><?php if($status=='error'){ echo $this->lang->line('MESSAGE_ERROR'); }elseif($status=='success'){ echo $this->lang->line('CONTACT_SUCCESS'); }else{ echo ''; } ?></p>

                                <form method="post" action="<?php echo base_url().'contact'; ?>">
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('NAME'); ?>*</label>
                                        <input type="text" value="" name="sender_name" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('EMAIL'); ?>*</label>
                                        <input type="email" value="" name="sender_email" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('TITLE'); ?></label>
                                        <input type="text" value="" name="sender_subject" class="form-control" required="required" />
                                    </div>
                                    <div class="form-group">
                                        <label><?php echo $this->lang->line('CONTENT'); ?>*</label>
                                        <textarea class="form-control" name="sender_content" required="required"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="<?php echo $this->lang->line('SEND'); ?>" name="btn_send" class="btn btn-primary"/>
                                    </div>
                                </form>

                            </div>

                            <div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-0">
                                <div class="contact-details">
                                    <h4></h4>
                                    <p><?php echo $this->lang->line('ISSI_INTRO'); ?></p>

                                    <h5><i class="ion ion-ios-location-outline"></i> <?php echo $this->lang->line('ADDRESS'); ?></h5>
                                    <p><?php echo $this->lang->line('ISSI_ADDRESS_STREET'); ?><br/><?php echo $this->lang->line('ISSI_ADDRESS_CITY'); ?></p>

                                    <h5><i class="ion ion-ios-email-outline"></i> <?php echo $this->lang->line('EMAIL'); ?></h5>
                                    <p><a href="mailto:email@yourdomain.com"><?php echo $this->lang->line('ISSI_EMAIL'); ?></a></p>

                                    <h5><i class="ion ion-ios-telephone-outline"></i> <?php echo $this->lang->line('PHONE'); ?></h5>
                                    <p><?php echo $this->lang->line('ISSI_PHONE'); ?></p>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- inner container end -->
            </div>
        </div>
    </div>
    <!-- main container end -->

    <!-- map container start -->
    <!--<div class="map-container">
        <div id="map-canvas"></div>
    </div>-->

    <iframe src="https://www.google.com/maps/d/embed?mid=101P52VXby25wQAz2RPMoPdJamQk" width="100%" height="550"></iframe>
    <!-- map container end -->


<?php $this->load->view('layout/webapp/footer'); ?>