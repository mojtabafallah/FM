<?php


use app\Views\Views;

include 'bootstrap.php'?>


<?php get_header();?>
<?php  Views::render('header_slider');?>
<?php  Views::render('first_slider');?>
<?php  Views::render('offer_slider');?>
<?php  Views::render('banner_image');?>
<?php  Views::render('best_selling_product');?>
<?php  Views::render('banner_image2');?>
<?php  Views::render('most_visit');?>
<?php  Views::render('best_brand');?>
<div class="container main_container">
    <div class="go_top_section">
        <div onclick="goTop()">
            <i class="fa fa-chevron-circle-up"></i>
            <span>بازگشت به بالا</span>
        </div>
    </div>
</div>
<!-- end of the scroll to top section  -->

<?php get_footer(); ?>
