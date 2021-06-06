<?php use app\classes\Assets;
use app\controller\BrandController; ?>
<div class="container main_container">
    <div class="slider_offer logo_slider">
        <div class="col-12 slider_offer_title">
            <div class="slider_offer_border">
                <span>مشاهده همه</span>
                <h2>برترین برندها</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                <?php $brands = BrandController::get_all_data(BrandController::$table_name) ?>
                <?php foreach ($brands as $brand): ?>
                    <div class="col_custom">
                        <img width="100" height="100" src="<?php echo $brand->image ?>" alt="">
                    </div>
                <?php endforeach; ?>


            </div>

        </div>

    </div>
</div>
<!-- end of the the best brands -->