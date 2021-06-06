<?php include "single_breadcrumb.php" ?>
<div class="container main_container">
    <div class="col-12 product_info">
        <div class="d-none d-sm-block  col-sm-4 col-md-4 col-lg-2">
            <div class="product_subImages">
                <?php

                use app\classes\Assets;

                $args = array(
                    'post_type' => 'product',
                    'meta_key' => 'total_sales',
                    'orderby' => 'meta_value_num',
                );

                global $product;
                $product_id = $product->get_id();

                $product = new WC_product($product_id);
                $attachment_ids = $product->get_gallery_image_ids();

                foreach ($attachment_ids as $attachment_id) {
                    // Display the image URL
                    ?>
                    <img class="small_image_product"
                         src="<?php echo $Original_image_url = wp_get_attachment_url($attachment_id) ?>" alt="">
                    <?php


                    // Display Image instead of URL
                    // echo wp_get_attachment_image($attachment_id, 'full');

                }
                ?>

            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
            <div class="product_img">
                <?php
                global $product;
                $id = $product->get_id();


                $data = $product->get_data();

                //var_dump($data);
                ?>
                <img class="image_main_product" src="<?php the_post_thumbnail_url() ?>" alt="">
                <p id="user_id" style="display: none"><?php echo get_current_user_id(); ?></p>
                <p id="product_id" style="display: none"><?php echo get_the_ID(); ?></p>
                <ul id="close-social">

                    <li><a href="#/" class="share"><span class="share"></span></a></li>
                    <li><a href="#/" id="favorite" data-toggle="tooltip" data-placement="right"
                           title=" افزودن به علاقه‌مندی‌ها ">
                            <?php
                            $havemeta = get_user_meta(get_current_user_id(), 'favorites', false);
                            if (!empty($havemeta)) {


                                if (in_array(get_the_ID(), $havemeta)) {

                                    echo "<i class='fas fa-heart' style='color: grey'></i>";
                                } else {

                                    echo "<i class='fas fa-heart' style='color: red'></i>";
                                }
                            } else {
                                echo "<i class='fas fa-heart' style='color: grey'></i>";
                            }
                            ?>
                        </a></li>

                    <li><span id="msg_add_fav"></span></li>
                    <div id="share-social" style="display:none">
                        <a href=""><i class="fab fa-whatsapp"></i></a>
                        <a href=""><i class="fab fa-telegram-plane"></i></a>
                        <a href=""><i class="fab fa-linkedin-in"></i></a>
                        <a href=""><i class="fab fa-facebook-f"></i></a>
                        <a href=""><i class="fab fa-twitter"></i></a>
                        <a href=""><i class="fab fa-instagram"></i></a>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col-xs-7 col-sm-7 col-md-7 col-lg-4">
            <div class="product_title">

                <h2>   <?php the_title(); ?></h2>

            </div>
            <div class="product_title">
                <?php


                //    $brands = get_the_terms(get_the_ID(), 'brand');

                ?>
                <span>   <?php

                    $taxonomy = 'brand';
                    $orderby = 'name';
                    $show_count = 0;      // 1 for yes, 0 for no
                    $pad_counts = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no
                    $title = '';
                    $empty = 0;

                    $args = array(
                        'taxonomy' => $taxonomy,
                        'orderby' => $orderby,
                        'show_count' => $show_count,
                        'pad_counts' => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li' => $title,
                        'hide_empty' => $empty
                    );
                    $all_categories = get_categories($args);
                    foreach ($all_categories as $cat) {
                        if ($cat->category_parent == 0) {
                            $category_id = $cat->term_id;
                            echo '<a href="' . get_term_link($cat->slug, 'brand') . '">' . $cat->name . '</a>';

                            $args2 = array(
                                'taxonomy' => $taxonomy,
                                'child_of' => 0,
                                'parent' => $category_id,
                                'orderby' => $orderby,
                                'show_count' => $show_count,
                                'pad_counts' => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li' => $title,
                                'hide_empty' => $empty
                            );
                            $sub_cats = get_categories($args2);
                            if ($sub_cats) {
                                foreach ($sub_cats as $sub_category) {
                                    echo $sub_category->name;
                                }
                            }
                        }
                    }

                    ?>نام برند</span>
                <span>             <?php

                    $taxonomy = 'product_cat';
                    $orderby = 'name';
                    $show_count = 0;      // 1 for yes, 0 for no
                    $pad_counts = 0;      // 1 for yes, 0 for no
                    $hierarchical = 1;      // 1 for yes, 0 for no
                    $title = '';
                    $empty = 0;

                    $args = array(
                        'taxonomy' => $taxonomy,
                        'orderby' => $orderby,
                        'show_count' => $show_count,
                        'pad_counts' => $pad_counts,
                        'hierarchical' => $hierarchical,
                        'title_li' => $title,
                        'hide_empty' => $empty
                    );
                    $all_categories = get_categories($args);
                    foreach ($all_categories as $cat) {
                        if ($cat->category_parent == 0) {
                            $category_id = $cat->term_id;
                            echo '<a href="' . get_term_link($cat->slug, 'product_cat') . '">' . $cat->name . '</a>';

                            $args2 = array(
                                'taxonomy' => $taxonomy,
                                'child_of' => 0,
                                'parent' => $category_id,
                                'orderby' => $orderby,
                                'show_count' => $show_count,
                                'pad_counts' => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li' => $title,
                                'hide_empty' => $empty
                            );
                            $sub_cats = get_categories($args2);
                            if ($sub_cats) {
                                foreach ($sub_cats as $sub_category) {
                                    echo $sub_category->name;
                                }
                            }
                        }
                    }

                    ?>

                    دسته</span>

            </div>

            <div class="product_details">
                <?php
                global $product;
                $attributes = $product->get_attributes();
                if (!empty($attributes)) {
                    $data1 = [];
                    foreach ($attributes as $attribute) {
                        $data1[] = $attribute->get_data();
                    }
                    echo $data1[0]['name'];
                    echo ":";
                    $dd = $data1[0]['options'];
                    foreach ($dd as $d)
                        echo $d;
                } else {
                    echo "ویژگی درج نشده است";
                }

                ?>


                <div class="product_information_custom">
                    <span class="read_more">  <i class="fa fa-plus"></i> مشاهده موارد بیشتر</span>
                    <span class="read_less">  <i class="fa fa-minus"></i> بستن</span>
                    <div class="product_more_information">

                        <?php
                        global $product;
                        $attributes = $product->get_attributes();
                        $data1 = [];
                        foreach ($attributes as $attribute) {
                            $data1[] = $attribute->get_data();
                        }

                        foreach ($data1 as $d) {
                            $name = $d['name'];
                            echo "   <span>$name :";
                            $option = $d['options'];
                            foreach ($option as $opt) {
                                echo " $opt ";
                            }
                            echo "</span>";
                        }
                        ?>

                    </div>
                </div>

                <div class="product_price">
                    <?php if (!empty($data['sale_price'])): ?>
                        <span class="real_price"><?php echo $data['regular_price'] ?>تومان</span>
                        <span class="product_price_off"> <?php
                            $off = ($data['sale_price'] * 100) / $data['regular_price'];
                            $off = 100 - $off;
                            echo $off;
                            ?>%</span>
                    <?php endif; ?>

                </div>
                <div class="product_realPrice">
                    <span class="price"><?php if (!empty($data['sale_price'])) echo $data['sale_price']; else echo $data['regular_price']; ?></span>
                    <span>تومان </span>
                </div>
                <div class="buy_button">
                    <a href="#/">
                        <button id="add_to_cart"><span class="fa fa-plus"></span>افزودن به سبد خرید</button>
                    </a>
                </div>
                <p id="added_to_cart">

                </p>
            </div>
        </div>
        <div class="col-xs-4 col-sm-4 col-md-4 col-lg-2">
            <div class="product_fearture_section">
                <div class="product_feature">
                    <img src="<?php echo Assets::image('available in market.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('24hoursupport.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('buyGarentee.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('originalProduct.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>
                <div class="product_feature">
                    <img src="<?php echo Assets::image('transformProduct.png') ?>" alt="">
                    <span>موجود در انبار فردا مارکت</span>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- end of product section -->