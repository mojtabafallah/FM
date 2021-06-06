<?php
/**
 * Related Products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/related.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.9.0
 */

if (!defined('ABSPATH')) {
    exit;
}

if ($related_products) : ?>



    <div class="container main_container">
        <div class="slider_offer slider_offer_2">

            <?php
            $heading = apply_filters('woocommerce_product_related_products_heading', __('Related products', 'woocommerce'));

            if ($heading) :
                ?>
                <div class="col-12 slider_offer_title">
                    <div class="slider_offer_border">
                        <a href="<?php  get_term_link( get_the_ID(), 'product_cat' );?>"> <span>مشاهده همه</span></a>
                        <h2><?php echo esc_html($heading); ?></h2>
                    </div>
                </div>
            <?php endif; ?>
            <div class="col-12">
                <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                    <?php woocommerce_product_loop_start(); ?>

                    <?php foreach ($related_products as $related_product) : ?>

                        <?php
                        $post_object = get_post($related_product->get_id());

                        setup_postdata($GLOBALS['post'] =& $post_object); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited, Squiz.PHP.DisallowMultipleAssignments.Found

                        wc_get_template_part('content-custom', 'product');
                        ?>

                    <?php endforeach; ?>

                    <?php woocommerce_product_loop_end(); ?>
                </div>
            </div>


        </div>

<?php
endif;

wp_reset_postdata();
?>
<div class="container main_container">
    <div class="col-12 login_section">
        <div class="col-12 col-sm-12  col-md-8 col-lg-7">
            <div class="farad_login_info">
                <h1>باشگاه مشتریان فردا مارکت</h1>
                <h3>از تخفیف ها و جدیدترین های فردا مارکت با خبر شوید :</h3>
            </div>
            <div class="login_form">
                <form action="">
                    <input type="text" placeholder="شماره موبایل یا ایمیل خود را وارد کنید">
                    <button>عضویت</button>
                </form>
            </div>

        </div>
        <div class="d-none d-md-block col-6 col-md-4 col-lg-5" style="padding: 0;">
            <div class="login_image">
                <img src="<?php echo \app\classes\Assets::image('Intersection 17.png')?>" alt="">
            </div>

        </div>

    </div>
</div>
    </div>