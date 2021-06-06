<?php
include "../../../../../wp-config.php";
if (isset($_POST['name_model'])) {

    global $wp_query;


    $data = new \WP_Query(
        array(
            'post_type' => 'product',
            'orderby' => 'post_title',
            'order'   => 'DESC',
            's' => $_POST['name_model'],
            'order'
        )
    );
    $posts = $data->posts;
    foreach ($posts as $post) {

        echo '<li><img width="50px" height="50px" src="'.get_the_post_thumbnail_url().'" /> <a href="'.get_the_permalink().'">' . $post->post_title . '</a></li>';
    }

}

