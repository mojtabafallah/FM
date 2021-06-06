<?php
namespace app\controller;
class WcController
{
    public static function get_all_cat()
    {
        echo '<ul>';
        $taxonomy     = 'product_cat';
        $orderby      = 'name';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no
        $title        = '';
        $empty        = 0;

        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty

        );
        $all_categories = get_categories( $args );
        foreach ($all_categories as $cat) {

                $category_id = $cat->term_id;
                echo '
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option"> '.$cat->name.'  </span>
                                        <input type="checkbox" value="'.$category_id.'">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                  ';


        }
        echo '</ul>';
    }
    public static function get_all_brand()
    {
        echo '<ul>';
        $taxonomy     = 'brand';
        $orderby      = 'name';
        $show_count   = 0;      // 1 for yes, 0 for no
        $pad_counts   = 0;      // 1 for yes, 0 for no
        $hierarchical = 1;      // 1 for yes, 0 for no
        $title        = '';
        $empty        = 0;

        $args = array(
            'taxonomy'     => $taxonomy,
            'orderby'      => $orderby,
            'show_count'   => $show_count,
            'pad_counts'   => $pad_counts,
            'hierarchical' => $hierarchical,
            'title_li'     => $title,
            'hide_empty'   => $empty
        );
        $all_categories = get_categories( $args );
        foreach ($all_categories as $cat) {
            if($cat->category_parent == 0) {
                $category_id = $cat->term_id;
                echo '
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option"> '.$cat->name.'  </span>
                                        <input type="checkbox">
                                        <span class="checkmark"></span>
                                    </label>
                                </li>
                  ';

                $args2 = array(
                    'taxonomy'     => $taxonomy,
                    'child_of'     => 0,
                    'parent'       => $category_id,
                    'orderby'      => $orderby,
                    'show_count'   => $show_count,
                    'pad_counts'   => $pad_counts,
                    'hierarchical' => $hierarchical,
                    'title_li'     => $title,
                    'hide_empty'   => $empty
                );
                $sub_cats = get_categories( $args2 );
                if($sub_cats) {
                    foreach($sub_cats as $sub_category) {
                        echo  $sub_category->name ;
                    }
                }
            }
        }
        echo '</ul>';
    }
}