<script type="text/javascript">
    function dm_faq_execute_search() {
        $('#btnFaqSearch').text('searching...'); //change button text
        $('#btnFaqSearch').attr('disabled', true); //set button disable

        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('faq-execute-search');?>",
            type: "POST",
            data: $('#dm_faq_search_form').serialize(),
            dataType: "html",
            success: function (data) {
                $('#faqList').html(data);
                $('#btnFaqSearch').text('Search'); //change button text
                $('#btnFaqSearch').attr('disabled', false); //set button enable
            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error search faq occur');
                $('#btnFaqSearch').text('Search'); //change button text
                $('#btnFaqSearch').attr('disabled', false); //set button enable

            }
        });
    }
    function create_faq_answer(){
        $('#save_faq_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#faq_modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Create answer'); // Set Title to Bootstrap modal title
    }
</script>