<!--banner-container start-->
<div class="inner-banner-container" style="
<?php
if (!empty($detail['img_src'])) {
    echo 'background-image:url(' . base_url() . $detail['img_src'];
} else
    if (empty($defaultbanner['value'])) {
        echo 'background-image:url(' . base_url() . 'webresources/images/banner0-header.jpg)';
    } else {
        echo 'background-image:url(' . base_url() . $defaultbanner['value'] . ')';
    }
?>
        ">
</div>
<!--banner-container end-->