<?php
get_header();
if (is_product_category()) {


    include 'pages/category_product.php';


} else {
    ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php
    if (have_posts()):
        while (have_posts()):
        the_post();
        the_content();
        endwhile;
    endif;
}

?>

<?php get_footer(); ?>