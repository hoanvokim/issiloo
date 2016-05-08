<!-- Bootstrap modal -->
<div class="modal fade" id="faq_modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">FAQ Form</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="save_faq_form" class="form-horizontal">
                    <input type="hidden" value="" name="id"/>

                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Question</label>

                            <div class="col-md-9">
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><img class="lang-flag"
                                                                         src="<?php echo base_url(); ?>/webresources/images/flags/uk.png"
                                                                         alt="English"></span>
                                    <input name="enQuestion" id="enQuestion" placeholder="Question in English" class="form-control"
                                           type="text">
                                </div>
                                <span class="help-block"></span>

                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><img class="lang-flag"
                                                                         src="<?php echo base_url(); ?>/webresources/images/flags/vn.png"
                                                                         alt="English"></span>
                                    <input name="viQuestion" id="viQuestion" placeholder="Câu hỏi" class="form-control"
                                           type="text">
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Answer</label>

                            <div class="col-md-9">
                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><img class="lang-flag"
                                                                         src="<?php echo base_url(); ?>/webresources/images/flags/uk.png"
                                                                         alt="English"></span>
                                    <input name="enAnswer" id="enAnswer" placeholder="Answer in english" class="form-control"
                                           type="text">
                                </div>
                                <span class="help-block"></span>

                                <div class="input-group mar-btm">
                                    <span class="input-group-addon"><img class="lang-flag"
                                                                         src="<?php echo base_url(); ?>/webresources/images/flags/vn.png"
                                                                         alt="English"></span>
                                    <input name="viAnswer" id="viAnswer" placeholder="Câu trả lời" class="form-control"
                                           type="text">
                                </div>
                                <span class="help-block"></span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->