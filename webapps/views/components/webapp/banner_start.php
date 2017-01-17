<!--banner-container start-->
<div class="inner-banner-container" style="
    <?php
    if(empty($banner_bg))  {
        echo 'background-image:url('.base_url().'webresources/images/banner0-header.jpg)';
    } else {
        echo 'background-image:url('.base_url().$banner_bg .')';
    }
    ?>
     ">
</div>
<!--banner-container end-->