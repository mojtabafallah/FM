<?php
/**
 * Orders
 *
 * Shows orders on the account page.
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/orders.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.7.0
 */

defined('ABSPATH') || exit;

do_action('woocommerce_before_account_orders', $has_orders); ?>

<?php if ($has_orders) : ?>

    <!-- بخش سفارش های من -->


    <!-- <div class="no_order">
        <img src="img/d4fa2ec1.svg" alt="">
        <span>سفارشی وجود ندارد</span>
    </div> -->



    <div id="orderCustom" class="user_order order_user_default">
        <h1>تاریخچه سفارشات</h1>
        <div class="order_exist">
            <div class="order_exist_header">
                <?php foreach (wc_get_account_orders_columns() as $column_id => $column_name) : ?>
                    <span class="nobr"><?php echo esc_html($column_name); ?></span>
                <?php endforeach; ?>
            </div>


            <div class="order_exist_prodcut">
                <?php
                foreach ($customer_orders->orders as $customer_order) {
                    $order = wc_get_order($customer_order); // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                    $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                    ?>
                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-<?php echo esc_attr($order->get_status()); ?> order">
                        <?php foreach (wc_get_account_orders_columns() as $column_id => $column_name) : ?>
                            <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-<?php echo esc_attr($column_id); ?>"
                                data-title="<?php echo esc_attr($column_name); ?>">
                                <?php if (has_action('woocommerce_my_account_my_orders_column_' . $column_id)) : ?>
                                    <?php do_action('woocommerce_my_account_my_orders_column_' . $column_id, $order); ?>

                                <?php elseif ('order-number' === $column_id) : ?>
                                    <div>
                                        <a href="<?php echo esc_url($order->get_view_order_url()); ?>">
                                            <?php echo esc_html(_x('#', 'hash before order number', 'woocommerce') . $order->get_order_number()); ?>
                                        </a>
                                    </div>

                                <?php elseif ('order-date' === $column_id) : ?>

                                    <span><time datetime="<?php echo esc_attr($order->get_date_created()->date('c')); ?>"><?php echo esc_html(wc_format_datetime($order->get_date_created())); ?></time></span>

                                <?php elseif ('order-status' === $column_id) : ?>
                                    <span>
                                       <?php echo esc_html(wc_get_order_status_name($order->get_status())); ?>
                                    </span>


                                <?php elseif ('order-total' === $column_id) : ?>
                                <span>
                                    <?php
                                    /* translators: 1: formatted order total 2: total order items */
                                    echo wp_kses_post(sprintf(_n('%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce'), $order->get_formatted_order_total(), $item_count));
                                    ?>
                                    </span>


                                <?php elseif ('order-actions' === $column_id) : ?>
                                <?php
                                $actions = wc_get_account_orders_actions($order);

                                if (!empty($actions)) {
                                foreach ($actions

                                as $key => $action) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                ?>
                                <div class="order_options">
                                    <?php
                                    echo '<a href="' . esc_url($action['url']) . '" ><button>' . esc_html($action['name']) . '</button></a>';
                                    echo "</div>";
                                    }
                                    }
                                    ?>
                                    <?php endif; ?>
                            </td>
                        <?php endforeach; ?>
                    </tr>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>


    <?php// do_action('woocommerce_before_account_orders_pagination'); ?>

    <?php if (1 < $customer_orders->max_num_pages) : ?>
        <div class="">
            <?php if (1 !== $current_page) : ?>
                <a class="woocommerce-button woocommerce-button--previous woocommerce-Button woocommerce-Button--previous button"
                   href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page - 1)); ?>"><?php esc_html_e('Previous', 'woocommerce'); ?></a>
            <?php endif; ?>

            <?php if (intval($customer_orders->max_num_pages) !== $current_page) : ?>
                <a class="woocommerce-button woocommerce-button--next woocommerce-Button woocommerce-Button--next button"
                   href="<?php echo esc_url(wc_get_endpoint_url('orders', $current_page + 1)); ?>"><?php esc_html_e('Next', 'woocommerce'); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

<?php else : ?>
    <div class="woocommerce-message woocommerce-message--info woocommerce-Message woocommerce-Message--info woocommerce-info">
        <a class="woocommerce-Button button"
           href="<?php echo esc_url(apply_filters('woocommerce_return_to_shop_redirect', wc_get_page_permalink('shop'))); ?>">بازگشت
            به فروشگاه</a>
        سفارشی ثبت نشده است.
    </div>
<?php endif; ?>

<?php //do_action('woocommerce_after_account_orders', $has_orders); ?>
