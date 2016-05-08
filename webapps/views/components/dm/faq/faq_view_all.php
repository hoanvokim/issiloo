<div id="page-content">

    <div class="row">
        <div class="col-lg-9">
            <div class="well">
                <form action="#" id="dm_faq_search_form">
                    <div class="input-group">
                        <input type="text" name="inputSearchValue" id="inputSearchValue" class="form-control"
                               placeholder="Search...">

                        <div class="input-group-btn">
                            <button id="btnFaqSearch" class="btn btn-info btn-md" type="button"
                                    onclick="dm_faq_execute_search();"><i class="icon-search"></i>Search
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

                    <?php $this->load->view('components/dm/faq/faq_results'); ?>
                    <!--===================================================-->
                </div>
            </div>
        </div>
    </div>
</div>