<?php
/**
 * Single Product Price
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/price.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

global $product;

?>
<?php if ($product->is_on_sale()): ?>
    <div class="product_price">
        <span class="real_price"><?php echo $product->get_sale_price()?>تومان</span>
        <span class="product_price_off"><?php
            $off = ($product->get_sale_price() * 100) / $product->get_regular_price();
            $off = 100 - $off;
            echo $off;
            ?>%</span>

    </div>

    <div class="product_realPrice">
        <span>تومان </span>
        <span class="price"><?php echo $product->get_regular_price()?></span>
    </div>
<?php else: ?>
    <div class="product_realPrice">
        <span>تومان </span>
        <span class="price"><?php echo $product->get_price()?></span>
    </div>
<?php endif; ?>

<!--<p class="--><?php //echo esc_attr(apply_filters('woocommerce_product_price_class', 'price')); ?><!--">--><?php //echo $product->get_price_html(); ?><!--</p>-->
