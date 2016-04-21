<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/AdminLTE/app.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/AdminLTE/dashboard.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>webresources/dashboard/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>webresources/vendor/select2/js/select2.js" type="text/javascript"></script>
<script>
    $(document).ready(function() { $("#tags_dropdown").select2(); });
</script>
<script type="text/javascript">
    $(function () {
        $("#example1").dataTable();
        $('#example2').dataTable({
            "bPaginate": true,
            //"bLengthChange": false,
            //"bFilter": false,
            "bSort": false,
            "bInfo": true,
            "bAutoWidth": false
        });
        $('#upload_file').change(function () {
            var e = document.getElementById("image_dropdown");
            var image_name = e.options[e.selectedIndex].text;
            console.log('image_name:' + image_name);
            var postData = {'image_selected': image_name};

            $.ajax({
                url: "<?php echo base_url(); ?>get-image/",
                async: true,
                type: "POST",
                cache: false,
                data: postData,
                success: function (data) {
                    setTimeout(function () {
                        var path = '<?php echo base_url(); ?>' + data;
                        $("#product_image").attr("src", path);
                        console.log('data:' + path);
                    }, 2000);
                }
            });
        });
        // Replace the <textarea id="editor1"> with a CKEditor
        // instance, using default configuration.
        CKEDITOR.replace('news_en_content_editor');
        CKEDITOR.replace('news_vi_content_editor');
    });
</script>