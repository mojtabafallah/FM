<?php use app\classes\Assets; ?>
<div class="container main_container" style="padding: 0;">
    <div class="col-12 slider1">
        <div class="col-3">
            <div class="off_Image">
                <img src="<?php echo Assets::image('off_img.png'); ?>" alt="">
                <?php      $url = null;
                $pages = get_pages(array(
                    'meta_key' => '_wp_page_template',
                    'meta_value' => 'all_off.php'
                ));
                if(isset($pages[0])) {
                    $url = get_page_link($pages[0]->ID);
                };
                ?>
                <a href="<?php echo $url?>">
                    <button>مشاهده همه</button>
                </a>

            </div>
        </div>
        <div class="col-9 col-md-9 slider1_custom">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                <?php
                $arg = array(
                    'post_type' => 'product',
                    'order' => 'DESC',
                    'post_status' => 'publish',
                    'posts_per_page' => -1,
                    'meta_query' => array(
                        'relation' => 'OR',
                        array(
                            'key' => '_sale_price',
                            'compare' => '>',
                            'type' => 'numeric'
                        ),
                        array(
                            'key' => '_min_variation_sale_price',
                            'compare' => '>',
                            'type' => 'numeric'
                        )
                    )

                );
                $posts = new WP_Query($arg);

                ?>
                <?php if ($posts->have_posts()) : ?>
                    <?php while ($posts->have_posts()) :
                        $posts->the_post(); ?>
                        <?php
                        global $product;
                        $id = $product->get_id();


                        ?>
                        <p id="demo"></p>
                        <div class="slide_custom">
                            <div class="c_carousel_custom">
                                <a href="<?php the_permalink(); ?>" class="c-prodcut-box__img">
                                    <div class="c-prodcut-box">

                                        <img
                                            <?php

                                            if ($product->get_sale_price()):
                                                if ($product->get_date_on_sale_from()): ?>

                                                    onload="
                                                            setInterval(
                                                            function(){
                                                            maketimer2('<?php echo $product->get_date_on_sale_from() ?>' , '<?php echo $product->get_date_on_sale_to() ?>' , '<?php echo $id ?>')
                                                            }
                                                            , 1000);"
                                                <?php endif; endif; ?>

                                                src="<?php the_post_thumbnail_url() ?>"
                                                alt="">

                                        <?php if ($product->get_price()):?>

                                        <span>
                                            <?php
                                            $off =round (($product->get_sale_price() * 100) / $product->get_regular_price());
                                            $off = 100 - $off;
                                            echo $off;
                                            ?>%
                                        </span>
<?php endif;?>

                                    </div>
                                    <div class="c-product-box__title">
                                        <?php the_title(); ?>
                                    </div>
                                    <div class="c-product-box__bottom">
                                        <div class="off_section">
                                            <span class="off_price"><?php echo $product->get_regular_price(); ?> تومان</span>
                                        </div>
                                        <div class="price_section">
                                            <span class="price"><?php echo $product->get_sale_price()  ?> تومان</span>
                                            <?php     if ($product->get_date_on_sale_from()): ?>
                                            <span class="time">
                                                <div class="countdown"></div>
                                                  <div class="days-<?php echo $id ?>">

                                                  </div>
                                            </span>
                                            <?php endif;?>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <?php wp_reset_postdata(); ?>
                <?php endif; ?>
            </div>
        </div>

    </div>

</div>
