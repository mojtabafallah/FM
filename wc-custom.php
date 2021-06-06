<?php

//add action for title product
remove_action('woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10);

add_action('woocommerce_shop_loop_item_title', function () {
    echo "
                                        <p>" . get_the_title() . "
                                        </p>
                                    ";
});


remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_show_product_loop_sale_flash', 10);
remove_action('woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_product_thumbnail', 10);
add_action('woocommerce_before_shop_loop_item_title', function () {
    ?>
    <div class="categorizing_product_custom_info">
    <div class="categorizing_product_custom_img">
        <?php echo woocommerce_get_product_thumbnail(); ?>
    </div>
    <?php

});
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5);
remove_action('woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_price', 10);


add_action('woocommerce_after_shop_loop_item_title', function () {
    global $post, $product;
    ?>
    </div>
    <div class="categorizing_product_custom_price">
        <span><?php  wc_get_template('loop/price.php')?></span>
    </div>

    <?php if ($product->is_on_sale()): ?>

        <span class="off">
            <?php
            $off = ($product->get_sale_price() * 100) / $product->get_regular_price();
            $off = 100 - $off;
            echo intval($off);
            ?>%</span>;
    <?php else: ?>
        <div class="categorizing_product_custom_sub_info">
            <span class="real_price"> </span>

        </div>

    <?php endif; ?>

    <?php
}, 10);


remove_action('woocommerce_before_shop_loop', 'woocommerce_result_count', 20);
remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


remove_action('woocommerce_before_main_content', 'woocommerce_breadcrumb', 20);

add_action('woocommerce_before_main_content', function () {
    ?>

    <?php
}, 20);

remove_action('woocommerce_after_shop_loop', 'woocommerce_pagination', 10);

remove_action('woocommerce_before_shop_loop', 'woocommerce_output_all_notices', 10);

add_action('woocommerce_before_main_content',function (){
    if (!is_product())
    {
        echo '<div class="container-fluid"><div class="col-12 ">';
        /**
         * Hook: woocommerce_sidebar.
         *
         * @hooked woocommerce_get_sidebar - 10
         */
        do_action( 'woocommerce_sidebar' );
    }else
    {
        echo '<div class="container main_container"><div class="col-12 product_info">';
    }
},10);

add_action('woocommerce_after_main_content',function ()
{

        echo "</div>";

},10);

add_filter('woocommerce_product_review_comment_form_args',function ($comment_form)
{
 //   var_dump($comment_form);
});

remove_action('woocommerce_single_product_summary','woocommerce_template_single_excerpt',20);


remove_action('woocommerce_cart_collaterals','woocommerce_cross_sell_display');

remove_action('woocommerce_before_shop_loop', 'woocommerce_catalog_ordering', 30);


add_action('order_customize', 'order_custom', 40);

function order_custom()
{
    ?>
    <form action="" method="get">

        <select name="order_by" id="">
            <option value="popularity"></option>
            <option value="rating"></option>
            <option value="date"></option>
            <option value="price"></option>
            <option value="price-desc"></option>
        </select>
    </form>
    <?php
}

/** pagation */




