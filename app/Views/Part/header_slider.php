<?php use app\classes\Assets;
use app\controller\BannerController;
use app\controller\SliderController;
use app\controller\SubsliderController;

?>
<div class="container main_container" style="padding: 16px;">
    <div class="col-md-12 col-lg-12 col-xl-8 product_images_custom">
        <div class="header_slider_custom">
            <div class="d-none d-lg-block">
                <div class="swiper-container gallery-top">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => ['product','post'],
                            'orderby'        => 'date',
                            'order'          => 'ASC',
                            'posts_per_page' => -1
                        );

                        $sliders = new WP_Query($args);

                        if ($sliders->have_posts()):     ?>

                            <?php while ($sliders->have_posts()): $sliders->the_post();?>
                                <?php $slider_enable = get_post_meta(get_the_ID(), 'enable_slider', true);
                                if ($slider_enable == "on"):

                                    $picture_special = get_post_meta(get_the_ID(), 'picture_special', true);
                                    ?>
                                    <div class="swiper-slide">
                                        <a href="<?php echo get_the_permalink() ?>"> <img
                                                src="<?php echo $picture_special ?>"
                                                alt="<?php the_title() ?>"/></a>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile;
                           wp_reset_postdata();
                            ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <!-- Add Arrows -->
                    <div class="swiper-button-next swiper-button-white"></div>
                    <div class="swiper-button-prev swiper-button-white"></div>
                </div>
                <div class="swiper-container gallery-thumbs">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => ['product','post'],
                            'posts_per_page' => -1
                        );
                        $sliders = new WP_Query($args);
                        if ($sliders->have_posts()):?>
                            <?php while ($sliders->have_posts()): $sliders->the_post(); ?>
                                <?php $slider_enable = get_post_meta(get_the_ID(), 'enable_slider', true);
                                if ($slider_enable == "on"):
                                    ?>
                                    <div class="swiper-slide">
                                        <span><?php the_title() ?></span>
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>

                </div>
            </div>
            <div class="d-block d-lg-none">
                <div class="swiper-container2 ">
                    <div class="swiper-wrapper">
                        <?php
                        $args = array(
                            'post_type' => ['product','post'],
                            'posts_per_page' => -1
                        );
                        $sliders = new WP_Query($args);
                        if ($sliders->have_posts()):?>
                            <?php while ($sliders->have_posts()): $sliders->the_post(); ?>
                                <?php $slider_enable = get_post_meta(get_the_ID(), 'enable_slider', true);
                                if ($slider_enable == "on"):
                                    $picture_special = get_post_meta(get_the_ID(), 'picture_special', true)
                                    ?>
                                    <div class="swiper-slide">
                                        <img src="<?php echo $picture_special ?>" alt="">
                                    </div>
                                <?php endif; ?>
                            <?php endwhile; ?>
                        <?php else: ?>
                        <?php endif; ?>
                    </div>
                    <!-- Add Pagination -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>

            </div>
            <?php $sub_slider = SubsliderController::get_all_data(SubsliderController::$table_name) ?>
            <div class="box_Section">

                <div class="col  col_first">

                    <div class="service_img">
                        <img src="<?php echo $sub_slider[0]->image ?>" alt="">
                    </div>
                    <div class="product_number">
                        <span><?php echo $sub_slider[0]->title ?></span>
                    </div>

                </div>

                <div class="col">

                    <div class="service_img">
                        <img src="<?php echo $sub_slider[1]->image ?>" alt="">
                    </div>
                    <div class="product_number">
                        <span><?php echo $sub_slider[1]->title ?></span>
                    </div>

                </div>

                <div class="col">

                    <div class="service_img">
                        <img src="<?php echo $sub_slider[2]->image ?>" alt="">
                    </div>
                    <div class="product_number">
                        <span><?php echo $sub_slider[2]->title ?></span>
                    </div>

                </div>


                <div class="col ">

                    <div class="service_img">
                        <img src="<?php echo $sub_slider[3]->image ?>" alt="">
                    </div>
                    <div class="product_number">
                        <span><?php echo $sub_slider[3]->title ?></span>
                    </div>

                </div>


                <div class="col col_last">

                    <div class="service_img">
                        <img src="<?php echo $sub_slider[4]->image ?>" alt="">
                    </div>
                    <div class="product_number">
                        <span><?php echo $sub_slider[4]->title ?></span>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <div class="col-md-12 col-lg-12 col-xl-4 banner_images">
        <div class="banner_box header_box_1">
            <?php
            $args = array(
                'post_type' => array('product', 'post'),
                'posts_per_page' => -1
            );
            $banners = new WP_Query($args);
            if ($banners->have_posts()): ?>
            <?php while ($banners->have_posts()):
            $banners->the_post(); ?>
            <?php $banner_enable = get_post_meta(get_the_ID(), 'enable_banner', true);

            if ($banner_enable == "on") {

                $picture_special = get_post_meta(get_the_ID(), 'picture_special', true);

                $position_banner = get_post_meta(get_the_ID(), 'position_banner', true);

            }
            if (isset($position_banner)):
            if($position_banner == 1):?>
            <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo $picture_special;
                ?>" alt=" ">

                <?php
                break;
                endif;
                endif;
                endwhile;
                endif; ?>


        </div>

        <div class="banner_box header_box_2">
            <?php
            $args = array(
                'post_type' => array('product', 'post'),
                'posts_per_page' => -1
            );
            $banners = new WP_Query($args);
            if ($banners->have_posts()): ?>
            <?php while ($banners->have_posts()):
            $banners->the_post(); ?>
            <?php $banner_enable = get_post_meta(get_the_ID(), 'enable_banner', true);

            if ($banner_enable == "on") {

                $picture_special = get_post_meta(get_the_ID(), 'picture_special', true);

                $position_banner = get_post_meta(get_the_ID(), 'position_banner', true);

            }
            if ($position_banner == 2): ?>
            <a href="<?php echo get_the_permalink(); ?>">
                <img src="<?php echo $picture_special;
                ?>" alt=" ">

                <?php
                break;
                endif;
                endwhile;
                endif; ?>
        </div>
    </div>
</div>

<!-- end of header slider -->