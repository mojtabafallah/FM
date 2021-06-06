<?php
get_header() ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <?php setPostViews(get_the_ID()); ?>


    <!-- end of header -->
    <div class="col-12" style="padding: 0;">
        <div class="article_breadCrumb">
            <h1><?php echo get_the_title() ?></h1>
            <ul>
                <li><a href="<?php echo home_url(); ?>">فروشگاه فردا مارکت</a></li>
                <?php $category = get_categories();
                $category_name = "";
                ?>
                <?php foreach ($category as $cat): ?>
                    <li><a href="<?php echo home_url() . '/category/' . $cat->slug ?>"><?php echo $cat->name ?></a></li>
                    <?php $category_name = $cat->name; ?>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>

    <div class="container-fluid main_container">
        <div class="article_section_custom_1">
            <div class="article_search_custom">
                <span class="fa fa-search"></span>

            </div>
            <div id="main-aritcle" class="col-12 col-lg-7">
                <div class="article">
                    <div class="article_title">
                        <h1><?php echo get_the_title(); ?></h1>
                        <div class="author">
                            <span>نویسنده :</span>
                            <span><?php echo get_the_author(); ?></span>
                        </div>
                        <div class="date">
                            <span>تاریخ :</span>
                            <span><?php echo get_the_date(); ?> </span><i class="fa fa-clock-o"></i>
                        </div>
                    </div>
                    <div class="article_author">
                        <div class="category">
                            <span>دسته بندی :</span>
                            <span> <?php $category = (get_categories()) ?>
                                <?php foreach ($category as $cat): ?>
                                    <a href="<?php echo home_url() . '/category/' . $cat->slug ?>"><?php echo $cat->name ?></a>

                                <?php endforeach; ?></span>

                        </div>
                    </div>
                    <div class="article_image_2">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                    </div>
                    <div class="article_content">
                        <?php the_content(); ?>
                    </div>

                    <div class="blockquoteSection">
                        <blockquote>
                            <?php the_excerpt(); ?>
                        </blockquote>
                    </div>
                    <div class="view">
                        <span class="fa fa-eye"></span> <?php echo get_post_meta(get_the_ID(), 'post_views_count', true); ?>
                        بازدید
                    </div>
                    <div class="stick">
                        <span> برچسب : </span>
                        <div>
                            <?php
                            $tags = get_tags(array(
                                'hide_empty' => false
                            ));

                            foreach ($tags as $tag) {
                                echo '<span>' . $tag->name . '</span>';
                            }

                            ?>
                        </div>
                    </div>
                </div>
                <div style="display: none">
                    <p id="author-comment"><?php $current_user = wp_get_current_user();
                        echo $current_user->nickname; ?></p>
                    <p id="email-comment"><?php $current_user = wp_get_current_user();
                        echo $current_user->user_email; ?></p>
                    <p id="post-comment"><?php echo get_the_ID(); ?></p>
                    <p id="home-comment"><?php echo home_url() ?></p>

                </div>

                <div class="comment_section">
                    <?php comment_form_title(); ?>
                    <form action="<?php echo home_url() ?>/wp-comments-post.php" method="post">
                        <div class="col-12 col-md-6" style="padding: 0;">
                            <textarea name="comment" id="" cols="30" rows="10" placeholder="نظر شما"></textarea>
                        </div>
                        <div class="col-12 col-md-6" style="padding-left: 0;">
                            <label for="">نام و نام خانوادگی خود را بنویسید</label>
                            <input name="author" type="text" placeholder="نام"
                                   value="<?php $current_user = wp_get_current_user();
                                   echo $current_user->nickname; ?>">

                            <label for="">ایمیل خود را بنویسید</label>

                            <input name="email" type="email" placeholder="ایمیل"
                                   value="<?php $current_user = wp_get_current_user();
                                   echo $current_user->user_email; ?>">
                            <label for="" class="checkBoxCustom">
                                ذخیره نام و ایمیل
                            </label>
                            <input type="checkbox">

                            <button name="submit" type="submit">ارسال نظر</button>
                        </div>

                        <input type="hidden" name="comment_post_ID" value="<?php echo get_the_ID(); ?>"
                               id="comment_post_ID">

                        <input type="hidden" name="comment_parent" id="comment_parent"
                               value="<?php echo isset($_GET['replytocom']) ? $_GET['replytocom'] : 0 ?>">
                    </form>
                </div>

                <?php
                $id_post = get_the_ID();
                $comments = get_comments(
                    array(
                        'post_id' => $id_post,
                        'order' => 'ASC'
                    )
                );

                if (!empty($comments)) {
                    ?>
                    <div class="comment_reply">
                        <?php
                        foreach ($comments as $comment) { ?>

                            <?php if ($comment->comment_parent == 0): ?>
                                <div class="col-12 col-sm-4">
                                    <div class="comment_reply_image">
                                        <?php
                                        echo get_avatar($comment->user_id) ?>
                                        <span class="date">
                                   <?php echo $comment->comment_date; ?>
                                </span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-8" style="padding: 0;">
                                    <div class="comment_answer">
                                        <p><?php echo $comment->comment_content ?>
                                        </p>
                                        <?php
                                        $post_id = get_the_ID();
                                        $comment_id = get_comment_ID();


                                        $max_depth = get_option('thread_comments_depth');

                                        $default = array(
                                            'reply_text' => __('Reply'),
                                            'login_text' => __('Log in to Reply'),
                                            'depth' => 1,
                                            'before' => '',
                                            'after' => '',
                                            'max_depth' => $max_depth
                                        );
                                        ?>
                                        <button id="btn_replay-<?php echo $comment->comment_ID ?>"
                                                class="btn-replay"><?php comment_reply_link($default, $comment_id, $post_id); ?></button>
                                    </div>
                                </div>
                            <?php endif; ?>

                            <?php foreach ($comments as $comment1) { ?>
                                <?php if ($comment->comment_ID == $comment1->comment_parent): ?>
                                <div style="
    width: 100%;
    margin-right: 12%;
">
                                    <div class="col-12 col-sm-4" >
                                        <div class="comment_reply_image">
                                            <?php
                                            echo get_avatar($comment1->user_id) ?>
                                            <span class="date">
                                   <?php echo $comment1->comment_date; ?>
                                </span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-sm-8" style="padding: 0;">
                                        <div class="comment_answer">
                                            <p><?php echo $comment1->comment_content ?>
                                            </p>
                                            <?php
                                            $post_id = get_the_ID();
                                            $comment_id = get_comment_ID();


                                            $max_depth = get_option('thread_comments_depth');

                                            $default = array(
                                                'reply_text' => __('Reply'),
                                                'login_text' => __('Log in to Reply'),
                                                'depth' => 1,
                                                'before' => '',
                                                'after' => '',
                                                'max_depth' => $max_depth
                                            );
                                            ?>
                                            <button id="btn_replay-<?php echo $comment1->comment_ID ?>"
                                                    class="btn-replay"><?php comment_reply_link($default, $comment_id, $post_id); ?></button>
                                        </div>
                                    </div>
                                </div>
                                <?php endif; ?>

                            <?php } ?>


                        <?php } ?>

                    </div>
                    <?php
                } else {
                    ?>

                    <div class="col-12 col-sm-4">
                        <div class="comment_reply_image">
                            <img src="" alt="">
                            <span class="date">

                                </span>
                        </div>
                    </div>
                    <div class="col-12 col-sm-8" style="padding: 0;">


                    </div>

                <?php } ?>
                <div id="main-replay">

                </div>
            </div>

            <div class="article_related_post">
                <div class="article_related_post_title">
                    <h4>مطالب مرتبط </h4>
                </div>
                <?php
                $post_related = new WP_Query(
                    [
                        'category_name' => $category_name,
                        'posts_per_page' => 3,
                        'orderby' => 'date',
                        'order' => 'DESC'
                    ]
                ) ?>
                <?php if ($post_related->have_posts()):while ($post_related->have_posts()): $post_related->the_post(); ?>

                    <div class="article_related_post_custom">
                        <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                        <div class="article_related_post_custom_info">
                            <a href="<?php echo get_the_permalink(); ?>">
                                <span><?php echo get_the_title(); ?></span>
                            </a>
                            <span><?php echo get_the_date(); ?><span class="fa fa-clock-o"></span></span>
                        </div>
                    </div>

                <?php endwhile; endif; ?>
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
<?php endwhile;
endif; ?>

<?php get_footer(); ?>