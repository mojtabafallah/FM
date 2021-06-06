<?php use app\classes\Assets;
use app\controller\BannerController; ?>
<div class="container main_container">
    <div class="banner">
        <?php
        $args = array(
            'post_type' => array('product', 'post'),
            'posts_per_page'=>-1
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
                if ($position_banner == 5): ?>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="col-12 col-md-4 banner_col4_custom_1">
                            <img src="<?php echo $picture_special;
                            ?>" alt="">
                        </div>
                    </a>
                    <?php
                    break;
                endif;
            endwhile;
        endif; ?>

        <?php
        $args = array(
            'post_type' => array('product', 'post'),
            'posts_per_page'=>-1
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
                if ($position_banner == 6): ?>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="col-12 col-md-4 banner_col4_custom_1">
                            <img src="<?php echo $picture_special;
                            ?>" alt="">
                        </div>
                    </a>
                    <?php
                    break;
                endif;
            endwhile;
        endif; ?>
        <?php
        $args = array(
            'post_type' => array('product', 'post'),
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
                if ($position_banner == 7): ?>
                    <a href="<?php echo get_the_permalink(); ?>">
                        <div class="col-12 col-md-4 banner_col4_custom_1">
                            <img src="<?php echo $picture_special;
                            ?>" alt="">
                        </div>
                    </a>
                    <?php
                    break;
                endif;
            endwhile;
        endif; ?>
    </div>
</div>
<!-- end of the second banner Images -->