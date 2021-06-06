<?php
get_header()?>


    <div class="container--header">

        <div class="col-12 col-xl-12" style="float: left">

            <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

                <?php setPostViews(get_the_ID());?>
                <?php the_content(); ?>

            <?php endwhile; endif; ?>
        </div>

    </div>

<?php get_footer(); ?>