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
</script>