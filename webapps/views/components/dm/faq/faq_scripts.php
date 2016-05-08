<script type="text/javascript">
    var save_method; //for save method string
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
    function create_faq_answer() {
        save_method = 'add';
        $('#save_faq_form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        $('#faq_modal_form').modal('show'); // show bootstrap modal
        $('.modal-title').text('Create answer'); // Set Title to Bootstrap modal title
    }

    function save() {
        $('#btnSave').text('saving...'); //change button text
        $('#btnSave').attr('disabled', true); //set button disable
        var url;

        if (save_method == 'add') {
            url = "<?php echo site_url('save-faq')?>";
        } else {
            url = "<?php echo site_url('update-faq')?>";
        }

        // ajax adding data to database
        $.ajax({
            url: url,
            type: "POST",
            data: $('#save_faq_form').serialize(),
            dataType: "JSON",
            success: function (data) {

                if (data.status) //if success close modal and reload ajax table
                {
                    $('#faq_modal_form').modal('hide');
                    reload_table();
                    alert("created a new user with id=" + data.id + " successfully!!!");
                }
                else {
                    for (var i = 0; i < data.inputerror.length; i++) {
                        $('[name="' + data.inputerror[i] + '"]').parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
                        $('[name="' + data.inputerror[i] + '"]').parent().next().addClass('has-error');
                        $('[name="' + data.inputerror[i] + '"]').parent().next().next().text(data.error_string[i]); //select span help-block class set text error string
                    }
                }
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable


            },
            error: function (jqXHR, textStatus, errorThrown) {
                alert('Error adding / update data');
                $('#btnSave').text('save'); //change button text
                $('#btnSave').attr('disabled', false); //set button enable

            }
        });
    }
</script>