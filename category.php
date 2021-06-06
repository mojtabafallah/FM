<?php get_header(); ?>
<div class="container-fluid container main_container">
    <div class="col-12 breadcrumb_section">
        <?php woocommerce_breadcrumb(); ?>
        <ul>
            <li><a href="#"> داروخانه آنلاین فردا مارکت </a></li>
            <li><a href="#">مکمل ها </a></li>
        </ul>
    </div>

</div>
<!-- end of breadercrumb section -->
<div class="container-fluid">
    <div class="col-12">
        <div class="col-12 col-md-12 col-lg-4 col-xl-3">
            <div class="latest_article">
                <div class="article_custome">
                    <h4 class="latest_article_title">اخرین مقالات</h4>
                    <?php $new_post = new WP_Query([
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'orderby' => 'date',
                        'order' => 'DESC',
                    ]) ?>
                    <?php
                    if ($new_post->have_posts()):
                        while ($new_post->have_posts()): $new_post->the_post();
                            ?>
                            <div class="latest_article_option">
                                <?php the_post_thumbnail('thumbnail'); ?>

                                <h4><?php the_title() ?></h4>
                                <p><?php the_excerpt(); ?> </p>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; ?>


                </div>
                <div class="search_category search_category_custom">
                    <div class="border_custom">
                        <div class="search_category_title collapsed search_category_title_custom" data-toggle="collapse"
                             data-target="#collapse">
                            <h3>نمایش بر اساس دسته بندی</h3>
                            <span class="arrow_custom"></span>
                        </div>
                        <div class="collapse" id="collapse">
                            <div class="search_category_title">

                                <span class="choosing_barand">دسته بندی خود را انتخاب کنید</span>
                            </div>
                            <div class="search_category_options">

                                <ul>
                                    <?php $cats = get_categories(); ?>
                                    <?php foreach ($cats as $cat): ?>
                                        <li>
                                            <label class="checkbox_container checkbox_container_container2">
                                                <span class="option"><?php echo $cat->name ?> </span>
                                                <input type="checkbox">
                                                <span class="checkmark"></span>
                                            </label>

                                        </li>
                                    <?php endforeach; ?>

                                </ul>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-12 col-md-12 col-lg-8 col-xl-9">
            <div class="article_search">
                <div class="article_search_form">
                    <form action="">
                        <input type="text" placeholder="جست و جو در مقاله ها...">
                        <button></button>
                    </form>
                </div>
                <div class="article_search_category_section">
                    <?php

                    $category = get_queried_object();
                    $category->term_id;

                    $posts = new WP_Query([
                        'type_post' => 'post',
                        'cat' => $category->term_id,
                        'posts_per_page' => 6,
                        'paged' => get_query_var('paged', 1)
                    ])
                    ?>
                    <?php if ($posts->have_posts()): ?>
                        <?php while ($posts->have_posts()):$posts->the_post(); ?>
                            <div class="article_search_category">

                                <div class="col-12 col-md-5 col-lg-4" style="padding: 0;">
                                    <a href="<?php the_permalink(); ?>">
                                        <div class="article_search_category_image_custom">
                                            <?php the_post_thumbnail('medium'); ?>
                                        </div>
                                    </a>
                                </div>

                                <div class="col-12 col-md-7 col-lg-8 article_search_category_title">
                                    <a href="<?php the_permalink(); ?>">
                                        <h4><?php the_title() ?></h4>
                                    </a>
                                    <span><?php the_date() ?></span>
                                </div>
                                <div class="col-12 col-md-7 col-lg-8 article_search_category_info">
                                    <span class="article_title"><?php echo $category->name ?></span>
                                    <div class="article_study_custom">
                                        <span class="article_study"> <i class="article_study"></i>  15دقیقه</span>
                                        <div>
                                            <span class="like"><i class="like"></i>  25لایک</span>
                                            <?php $count = get_comment_count(get_the_ID()) ?>
                                            <span class="comment"> <i
                                                        class="comment"></i>  دیدگاه <?php echo $count['approved'] ?></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-7 col-lg-8 article_search_category_text">
                                    <p>
                                        <?php the_excerpt(); ?>
                                    </p>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_query();
                        wp_reset_postdata(); ?>

                            <div class="col-12">
                                <nav class="woocommerce-pagination">
                                    <ul class="page-numbers">


                                        <?php echo paginate_links(array(
                                                'total'=>$posts->max_num_pages,

                                            'type' => 'list'
                                        )); ?>


                                    </ul>
                                </nav>
                            </div>

                    <?php endif; ?>


                </div>

            </div>
        </div>
    </div>
</div>


<!-- end of suplementary section -->
<div class="container-fluid container_custom">
    <div class="go_top_section">
        <div onclick="goTop()">
            <i class="fa fa-chevron-circle-up"></i>
            <span>بازگشت به بالا</span>
        </div>
    </div>
</div>
<!-- end of the scroll to top section  -->

<?php get_footer(); ?>
