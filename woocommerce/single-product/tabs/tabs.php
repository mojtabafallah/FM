<?php
/**
 * Single Product tabs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product/tabs/tabs.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.8.0
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * Filter tabs and allow third parties to add their own.
 *
 * Each tab is an array containing title, callback and priority.
 *
 * @see woocommerce_default_product_tabs()
 */
$product_tabs = apply_filters('woocommerce_product_tabs', array());

if (!empty($product_tabs)) : ?>

    <div class="container main_container tab_custom">
        <div id="tabs" class="ui-tabs ui-corner-all ui-widget ui-widget-content">
            <ul role="tablist" class="ui-tabs-nav ui-corner-all ui-helper-reset ui-helper-clearfix ui-widget-header">
                <?php $counter=0;?>
                <?php foreach ($product_tabs as $key => $product_tab) : ?>
                    <li
                            aria-selected="true"
                            aria-expanded="true"
                            class="ui-tabs-tab ui-corner-top ui-state-default ui-tab <?php echo $counter==0 ? 'ui-tabs-active ui-state-active' : ''?>  <?php echo esc_attr($key); ?>_tab"
                            id="tab-title-<?php echo esc_attr($key); ?>"
                            role="tab" aria-controls="tab-<?php echo esc_attr($key); ?>">

                        <a
                                role="presentation"
                                tabindex="-1"
                                class="ui-tabs-anchor"
                                href="#tab-<?php echo esc_attr($key); ?>">
                            <?php echo wp_kses_post(apply_filters('woocommerce_product_' . $key . '_tab_title', $product_tab['title'], $key)); ?>
                        </a>
                    </li>
                <?php $counter++; endforeach; ?>
            </ul>
            <?php $counter=0;?>
            <?php foreach ($product_tabs as $key => $product_tab) : ?>


                <div role="tabpanel" class="ui-tabs-panel ui-corner-bottom ui-widget-content"
                     id="tab-<?php echo esc_attr($key); ?>" role="tabpanel"
                     style="<?php echo $counter==0 ? '' : 'display: none'?>"
                     aria-labelledby="tab-title-<?php echo esc_attr($key); ?>">
                    <?php
                    if (isset($product_tab['callback'])) {
                        call_user_func($product_tab['callback'], $key, $product_tab);
                    }
                    ?>
                </div>


            <?php  $counter++; endforeach; ?>

            <?php do_action('woocommerce_product_after_tabs'); ?>
        </div>
    </div>
<?php endif; ?>
