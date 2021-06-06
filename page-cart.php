<?php get_header(); ?>
<?php if (have_posts()): ?>
    <?php while (have_posts()): the_post(); ?>
        <div class="cart_section">
            <div class="cart_custom">
                <h1>سبد خرید</h1>
            </div>
            <div class="cart_area">
                <?php the_content(); ?>
            </div>
        </div>

    <?php endwhile; ?>
<?php endif; ?>
<?php get_footer(); ?>