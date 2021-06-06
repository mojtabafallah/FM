<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
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

defined('ABSPATH') || exit;

global $product;

// Ensure visibility.
if (empty($product) || !$product->is_visible()) {
    return;
}
?>

<div class="slide">

    <div <?php wc_product_class('c_carousel_custom', $product); ?>>
        <a href="<?php the_permalink(); ?>" class="c-prodcut-box__img">
            <div class="c-prodcut-box">
                <img src="<?php the_post_thumbnail_url(); ?>" alt="">
            </div>
            <div class="c-product-box__title c-product-box__title_2">

                <?php the_title()?>
            </div>
            <?php if ($product->get_price()): ?>
                <?php if ($product->is_on_sale()): ?>

                    <div class="c-product-box__bottom">
                        <div class="off_section">
                            تومان <span class="off_price"><?php echo $product->get_sale_price() ?> </span>
                            <span class="off_percent"><?php
                                $off = ($product->get_sale_price() * 100) / $product->get_regular_price();
                                $off = 100 - $off;
                                echo $off;
                                ?>%</span>
                        </div>
                        <div class="price_section">

                            <span class="price">  <?php echo $product->get_regular_price() ?> </span>

                        </div>
                    </div>
                <?php else: ?>
                    <div class="c-product-box__bottom">
                        <div class="off_section">
                            تومان <span class="off_price"><?php echo $product->get_regular_price() ?> </span>

                        </div>
                        <div class="price_section">

                            <span class="price">  </span>

                        </div>
                    </div>
                <?php endif; ?>
            <?php else: ?>
                <div class="c-product-box__bottom">
                    <div class="off_section">
                        <span class="off_price">نا موجود </span>

                    </div>
                    <div class="price_section">

                        <span class="price">  </span>

                    </div>
                </div>
            <?php endif; ?>
        </a>

    </div>
</div>
