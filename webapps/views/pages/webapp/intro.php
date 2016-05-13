<?php $this->load->view('layout/webapp/header'); ?>

<?php $this->load->view('components/webapp/banner_start'); ?>

<!-- main container start -->

<div class="inner-container">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="tabs-container">

                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <?php $isFirst = FALSE;
                        foreach ($intros as $item) { ?>
                            <li role="presentation" <?php if (!$isFirst) {
                                echo 'class="active"';
                                $isFirst = TRUE;
                            } ?>><a href="#tab<?php echo $item['catId']; ?>" aria-controls="tab"
                                    role="tab"
                                    data-toggle="tab"><?php echo $item['viCatName']; ?></a></li>
                        <?php } ?>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <?php $isFirst = FALSE;
                        foreach ($intros as $item) { ?>
                            <div role="tabpanel" class="tab-pane fade <?php if (!$isFirst) {
                                echo 'active in';
                                $isFirst = TRUE;
                            } ?>" id="tab<?php echo $item['catId']; ?>">
                                <?php echo $item['viNewsContent']; ?>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- main container end -->

<?php $this->load->view('layout/webapp/footer'); ?>
