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
                                <h4>Send us a Message</h4>
                                <p>Praesent fringilla ex at massa consectetur finibus. Nulla facilisi.Nulla rutrum nibh
                                    in accumsan venenatis. Duis laoreet est nec molestie volutpat.</p>

                                <form>
                                    <div class="form-group">
                                        <label>Name*</label>
                                        <input type="text" value="" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email*</label>
                                        <input type="email" value="" class="form-control" required/>
                                    </div>
                                    <div class="form-group">
                                        <label>Subject</label>
                                        <input type="text" value="" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Message*</label>
                                        <textarea class="form-control" required></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="submit" value="Send Message" class="btn btn-primary"/>
                                    </div>
                                </form>

                            </div>

                            <div class="col-md-4 col-md-offset-1 col-sm-6 col-sm-offset-0">
                                <div class="contact-details">
                                    <h4>Get in Touch</h4>
                                    <p>Praesent fringilla ex at massa consectetur finibus. Nulla facilisi.Nulla rutrum
                                        nibh in accumsan venenatis. Duis laoreet est nec molestie volutpat.</p>

                                    <h5><i class="ion ion-ios-location-outline"></i> ADDRESS</h5>
                                    <p>Sahadatpura, Kedia Market <br/>Mau 275101, U.P. India</p>

                                    <h5><i class="ion ion-ios-email-outline"></i> EMAIL</h5>
                                    <p><a href="mailto:email@yourdomain.com">email@yourdomain.com</a></p>

                                    <h5><i class="ion ion-ios-telephone-outline"></i> PHONE</h5>
                                    <p><a href="tel:1234567890">+91 - 123 456 7890</a></p>

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
    <div class="map-container">
        <div id="map-canvas"></div>
    </div>
    <!-- map container end -->


<?php $this->load->view('layout/webapp/footer'); ?>