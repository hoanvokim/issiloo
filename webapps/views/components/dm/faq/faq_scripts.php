<script type="text/javascript">
    function dm_faq_execute_search() {
        $('#btnFaqSearch').text('searching...'); //change button text
        $('#btnFaqSearch').attr('disabled', true); //set button disable
        //Ajax Load data from ajax
        $.ajax({
            url: "<?php echo site_url('faq-execute-search');?>",
            type: "POST",
            data: $('#dm_faq_search_form').serialize(),
            dataType: "JSON",
            success: function (data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    //reload list questions and answers
                    $('#faqList').html(data);
                    alert("Search successfully!!!");
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error search faq occur');
                $('#btnFaqSearch').text('Search'); //change button text
                $('#btnFaqSearch').attr('disabled', false); //set button enable

            }
        });
    }
</script>