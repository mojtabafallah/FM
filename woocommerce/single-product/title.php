<?php
/**
 * Single Product title
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/title.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see        https://docs.woocommerce.com/document/template-structure/
 * @package    WooCommerce\Templates
 * @version    1.6.4
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}


the_title('<div class="product_title"><h2>', '</h2></div>');
?>
<div class="product_title">
    <?php $term = get_the_terms(get_the_ID(), 'brand');
    $cate = get_the_terms(get_the_ID(), 'product_cat');

    ?>

    <?php if ($term != null) foreach ($term as $t): ?>
        <span> <a href="<?php echo $t->slug ?>"><?php echo $t->name ?></a>نام برند</span>
    <?php endforeach; ?>
    <?php if ($cate != null) foreach ($cate as $c): ?>
        <span> <a href="<?php echo $c->slug ?>"><?php echo $c->name; ?></a>دسته</span>
    <?php endforeach; ?>

</div>
<div class="product_details">
    <?php echo get_the_excerpt() ?>


</div>