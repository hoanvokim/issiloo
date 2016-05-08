<div id="faqList" class="panel-group accordion">
    <?php foreach ($faqs as $faq): ?>
        <div class="panel panel-trans pad-top">

            <!-- Question -->
            <div class="text-semibold pad-hor text-lg">
                <a href="#demo-acc-faq1" data-toggle="collapse" data-parent="#demo-acc-faq"><i
                        class="fa fa-bullhorn"></i> <?php echo $faq->vi_question;?></a>

                <p class="media-heading">
                    <small>Added by Alex Smith <i class="fa fa-clock-o"></i> Today 2:40 pm -
                        24.06.2014
                    </small>
                </p>
            </div>


            <!-- Answer -->
            <div id="demo-acc-faq1" class="collapse in">
                <div class="pad-all">
                    <?php echo $faq->vi_answer;?>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>