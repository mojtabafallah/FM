<?php
/**
 * Product Loop Start
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/loop/loop-start.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://docs.woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     3.3.0
 */

if (!defined('ABSPATH')) {
    exit;
}
?>
<?php if (!is_product()): ?>
<div class="col-12 col-md-12 col-lg-8 col-xl-9 columns-<?php echo esc_attr(wc_get_loop_prop('columns')); ?>">
    <div class="categorizing">
        <div class="categorizing_options">
            <ul>
                <li><span>مرتب سازی بر اساس :</span></li>
                <form action="" method="get">
                    <li><a href="?orderby=rating" class="active">پرفروش ترین</a></li>
                    <li><a href="?orderby=popularity">محبوب ترین</a></li>
                    <li><a href="?orderby=date">جدید ترین</a></li>
                    <li><a href="?orderby=price-desc">گران ترین</a></li>
                    <li><a href="?orderby=price">ارزان ترین</a></li>
                </form>
            </ul>
        </div>
        <div class="categorizing_product">
            <?php endif; ?>
