<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

use app\classes\Assets;

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
    echo get_the_password_form(); // WPCS: XSS ok.
    return;
}
?>
<div class="d-none d-sm-block col-sm-4 col-md-4 col-lg-2">
    <div class="product_subImages">
<?php     /**
 * Hook: woocommerce_before_single_product_summary.
 *
 * @hooked woocommerce_show_product_sale_flash - 10
 * @hooked woocommerce_show_product_images - 20
 */
do_action( 'woocommerce_before_single_product_summary' );?>
    </div>
</div>
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
    <div class="product_img">
        <?php $id_img= $product->get_image_id();
            $src=wp_get_attachment_url($id_img);?>
        <img class="image_main_product" src="<?php echo $src?>" alt="">
        <p id="user_id" style="display: none"><?php echo get_current_user_id(); ?></p>
        <p id="product_id" style="display: none"><?php echo get_the_ID(); ?></p>
        <ul id="close-social">

            <li><a href="#/" class="share"><span class="share"></span></a></li>
            <li><a href="#/" id="favorite" data-toggle="tooltip" data-placement="right"
                   title=" افزودن به علاقه‌مندی‌ها ">
                    <?php
                    $havemeta = get_user_meta(get_current_user_id(), 'favorites', false);
                    if (!empty($havemeta)) {


                        if (in_array(get_the_ID(), $havemeta)) {

                            echo "<i class='fas fa-heart' style='color: grey'></i>";
                        } else {

                            echo "<i class='fas fa-heart' style='color: red'></i>";
                        }
                    } else {
                        echo "<i class='fas fa-heart' style='color: grey'></i>";
                    }
                    ?>
                </a></li>

            <li><span id="msg_add_fav"></span></li>
            <div id="share-social" style="display:none">
                <a href=""><i class="fab fa-whatsapp"></i></a>
                <a href=""><i class="fab fa-telegram-plane"></i></a>
                <a href=""><i class="fab fa-linkedin-in"></i></a>
                <a href=""><i class="fab fa-facebook-f"></i></a>
                <a href=""><i class="fab fa-twitter"></i></a>
                <a href=""><i class="fab fa-instagram"></i></a>
            </div>
        </ul>
    </div>
</div>
<div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
    <?php
    /**
     * Hook: woocommerce_single_product_summary.
     *
     * @hooked woocommerce_template_single_title - 5
     * @hooked woocommerce_template_single_rating - 10
     * @hooked woocommerce_template_single_price - 10
     * @hooked woocommerce_template_single_excerpt - 20
     * @hooked woocommerce_template_single_add_to_cart - 30
     * @hooked woocommerce_template_single_meta - 40
     * @hooked woocommerce_template_single_sharing - 50
     * @hooked WC_Structured_Data::generate_product_data() - 60
     */
    do_action( 'woocommerce_single_product_summary' );
    ?>
</div>
<div class="col-xs-4 col-sm-4 col-md-4 col-lg-2">
    <div class="product_fearture_section">
        <div class="product_feature">
            <img src="<?php echo Assets::image('available in market.png') ?>" alt="">
            <span>موجود در انبار فردا مارکت</span>
        </div>
        <div class="product_feature">
            <img src="<?php echo Assets::image('24hoursupport.png') ?>" alt="">
            <span>موجود در انبار فردا مارکت</span>
        </div>
        <div class="product_feature">
            <img src="<?php echo Assets::image('buyGarentee.png') ?>" alt="">
            <span>موجود در انبار فردا مارکت</span>
        </div>
        <div class="product_feature">
            <img src="<?php echo Assets::image('originalProduct.png') ?>" alt="">
            <span>موجود در انبار فردا مارکت</span>
        </div>
        <div class="product_feature">
            <img src="<?php echo Assets::image('transformProduct.png') ?>" alt="">
            <span>موجود در انبار فردا مارکت</span>
        </div>

    </div>
</div>


<?php do_action( 'woocommerce_after_single_product' ); ?>

