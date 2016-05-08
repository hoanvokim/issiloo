<div id="faqList" class="panel-group accordion">
    <?php foreach ($faqs as $faq): ?>
        <div class="panel panel-trans pad-top">

            <!-- Question -->
            <div class="text-semibold pad-hor text-lg">
                <a href="#demo-acc-faq1" data-toggle="collapse" data-parent="#demo-acc-faq"><i
                        class="fa fa-bullhorn"></i> <?php echo $faq->vi_question; ?></a>

                <p class="media-heading">
                    <small>Added by Alex Smith <i class="fa fa-clock-o"></i> Today 2:40 pm -
                        24.06.2014
                    </small>
                </p>
            </div>


            <!-- Answer -->
            <div id="demo-acc-faq1" class="collapse in">
                <?php if (isset($faq->vi_answer)): ?>
                    <div class="pad-all">
                        <?php echo $faq->vi_answer; ?>
                    </div>
                    <p class="media-heading">
                        <a class="btn btn-info"
                           onclick="create_faq_answer();"><i
                                class="icon-pencil"></i><span>Edit</span></a>
                        <a href="<?php echo base_url('delete-faq') . '/' . $faq->id; ?>"
                           class="btn btn-danger"><i
                                class="icon-trash"></i><span>Delete</span></a>
                    </p>
                <?php else: ?>
                    <p class="media-heading">
                        <a class="btn btn-primary" onclick="create_faq_answer();"><i class="icon-plus"></i><span>Add answer</span></a>
                    </p>
                <?php endif; ?>

            </div>
        </div>
    <?php endforeach; ?>
</div>