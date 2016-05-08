<div id="page-content">

    <div class="row">
        <div class="col-lg-9">
            <div class="well">
                <form action="#" id="dm_faq_search_form">
                    <div class="input-group">
                        <input type="text" name="inputSearchValue" class="form-control" placeholder="Search...">

                        <div class="input-group-btn">
                            <button id="btnFaqSearch" class="btn btn-info btn-md" type="button"
                                    onclick="dm_faq_execute_search();">Search
                            </button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="panel">
                <div class="panel-body">

                    <!-- GENERAL -->
                    <!--===================================================-->
                    <h3 class="pad-all bord-btm text-thin">General</h3>

                    <div id="demo-acc-faq" class="panel-group accordion">
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
                    <!--===================================================-->
                </div>
            </div>
        </div>
    </div>
</div>