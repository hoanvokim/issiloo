/**
 * Created with IntelliJ IDEA.
 * User: NhuTran
 * Date: 5/8/16
 * Time: 4:43 PM
 * To change this template use File | Settings | File Templates.
 */
<script type="text/javascript">
function edit_user(id) {
    save_method = 'update';
    $('#user_form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
    url: "<?php echo site_url('update-user');?>/" + id,
    type: "GET",
    dataType: "JSON",
    success: function (data) {

    $('[name="id"]').val(data.id);
    $('[name="userName"]').val(data.username);
    $('[name="password"]').val(data.password);
    $('[name="firstName"]').val(data.firstname);
    $('[name="lastName"]').val(data.lastname);
    $('[name="email"]').val(data.email);
    $('#user_modal_form').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Edit user'); // Set title to Bootstrap modal title

    },
error: function (jqXHR, textStatus, errorThrown) {
    alert('Error get data from ajax');
    }
});
}
</script>