<?php use app\classes\Assets; ?>
<div class="container main_container">
    <div class="slider_offer">
        <div class="col-12 slider_offer_title">
            <div class="slider_offer_border">
                <span>مشاهده همه</span>
                <h2>محصولات پرفروش</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>


                <?php
                $args = array(
                    'post_type' => 'product',
                    'posts_per_page' => 10,
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                );


                $loop = new WP_Query($args);
                if ($loop->have_posts()) {
                    while ($loop->have_posts()) : $loop->the_post();
                        global $product;
                        $id = $product->get_id();
//                        $data = $product->get_data();
//                        $date_from = $data['date_on_sale_from'];
//                        $date_to = $data['date_on_sale_to'];
//                        $data_from = (array)$date_from;
//                        $data_to = (array)$date_to;

                        ?>
                        <div class="slide">
                            <div class="c_carousel_custom">
                                <a href="<?php the_permalink(); ?>" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">
                                        <img
                                            <?php if ($product->get_date_on_sale_from()): ?>
                                                onload="setInterval(
                                                        function(){

                                                        maketimer2('<?php echo $product->get_date_on_sale_from() ?>' , '<?php echo $product->get_date_on_sale_to() ?>' , '<?php echo $id ?>')
                                                        }
                                                        , 1000);
                                                        "
                                            <?php endif; ?>
                                                src="<?php the_post_thumbnail_url('woocommerce_thumbnail') ?>"
                                                alt="">
                                    </div>
                                    <div class="c-product-box__title">
                                        <?php the_title(); ?>
                                    </div>
                                    <?php if ($product->is_on_sale()): ?>
                                        <div class="c-product-box__bottom">
                                            <span class="off_price"><?php echo $product->get_regular_price() ?>تومان </span>
                                            <div class="price_section">
                                                <span class="price"><?php echo $product->get_sale_price() ?>   تومان</span>
                                                <?php if ($product->get_date_on_sale_from()): ?>
                                                    <span class="time">
                                                <div class="days-<?php echo $id ?>">

                                                  </div>
                                            </span>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php else: ?>
                                        <div class="c-product-box__bottom">
                                            <div class="price_section">
                                                <span class="off_price"><?php echo $product->get_price() ?>   تومان</span>
                                                <div class="price_section">
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                </a>
                            </div>

                        </div>
                    <?php
                    endwhile;
                } else {
                    echo __('محصولی موجود نیست');
                }
                wp_reset_postdata();
                ?>


            </div>
        </div>
    </div>
</div>
<!--end of the best selling products -->