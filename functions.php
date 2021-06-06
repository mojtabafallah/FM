<?php


include 'constants.php';
require_once 'vendor/autoload.php';

use app\controller\MenuController;
use app\admin\config;
use Illuminate\Database\Capsule\Manager as Capsule;

//add_action('after_switch_theme', 'action_after_setup_theme');

add_action('after_setup_theme' , 'fardamarket_setup');
function fardamarket_setup()
{
    add_theme_support('woocommerce');
}

include get_template_directory().'/wc-custom.php';

/**************old code******************/


add_action('admin_menu', array(MenuController::class, 'my_menu_pages'));

function register_my_menu()
{
    register_nav_menu('header-menu', __('منوی اصلی سایت'));
}

add_action('init', 'register_my_menu');

function action_after_setup_theme()
{
    config::conection();
    $data = [
        array('increments', 'id'),
        array('string', 'title'),
        array('integer', 'parent'),
        array('longText', 'link'),
        array('boolean', 'mega'),
        array('text', 'image_mega'),
    ];
    config::$data = $data;
    config::create_table('market_menu');


    $data = [array('increments', 'id'), array('string', 'title'), array('text', 'link'), array('text', 'image'), array('text', 'des')];
    config::$data = $data;
    config::create_table('market_sliders');

    $data = [array('increments', 'id'), array('string', 'title'), array('text', 'image'), array('text', 'des')];
    config::$data = $data;
    config::create_table('market_sub_sliders');

    $data = [array('increments', 'id'), array('text', 'link'), array('text', 'image'), array('integer', 'position')];
    config::$data = $data;
    config::create_table('market_banners');

    $data = [array('increments', 'id'), array('text', 'image')];
    config::$data = $data;
    config::create_table('market_brand');
}


add_action('admin_head', 'my_custom_fonts');
function open_media()
{
    wp_enqueue_media();
}

add_action('admin_enqueue_scripts', 'open_media');
function my_custom_fonts()
{
    echo '<style>
  table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  
}
.edit_menu
{
display: none;
}
  </style>';
}


class AWP_Menu_Walker extends Walker_Nav_Menu
{
    public function start_el(&$output, $object, $depth = 0, $args = array(), $current_object_id = 0)
    {
        if ($depth == 2) {
//            $output .= '<li>' . $object->title . '</li>';
            $output .= '<div class="row">

                                            <div class="container-fluid megamenu">
                                                <div class="megamenu_title">
                                                    <span>نمایش همه دسته بندی مکمل غذایی</span>

                                                </div>
                                                <div class="col-3 col-md-4">
                                                    <ul>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>
                                                    </ul>
                                                </div>
                                                <div class="col-3 col-md-4">
                                                    <ul>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>
                                                        <li><a href="#">متن تستی</a></li>

                                                    </ul>
                                                </div>
                                                <div class="col-6 col-md-4 megamenu_image">
                                                    <img src="img/1347@2x.png" alt="">
                                                </div>
                                            </div>
                                        </div>';
        } else {
            parent::start_el($output, $object);
        }
    }
}




add_filter('woocommerce_add_to_cart_fragments', 'woocommerce_header_add_to_cart_fragment');
function woocommerce_header_add_to_cart_fragment($fragments)
{
    ob_start(); ?>
    <span class="number"><?php echo sprintf(_n('%d', '%d', WC()->cart->get_cart_contents_count()), WC()->cart->get_cart_contents_count()); ?></span>
    <?php $fragments['.number'] = ob_get_clean();
    return $fragments;
}

add_filter('woocommerce_product_single_add_to_cart_text', 'woo_custom_cart_button_text');
function woo_custom_cart_button_text()
{
    return __('افزودن به سبد', 'woocommerce');
}


//page navigation
function wp_pagination()
{
    global $wp_query;
    $big = 12345678;
    $page_format = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'type' => 'array'
    ));
    if (is_array($page_format)) {
        $paged = (get_query_var('paged') == 0) ? 1 : get_query_var('paged');
        echo '<div><ul>';
        echo '<li><span>' . $paged . ' از ' . $wp_query->max_num_pages . '</span></li>';
        foreach ($page_format as $page) {
            echo '<li>' . $page . '</li>';
        }
        echo '</ul></div>';
    }
}

if (isset($_POST['name_model'])) {
    global $wp_query;


    $loop = new WP_Query(array(
        'post_type' => 'product',
        's' => $_POST['name_model']
    ));
    $data = new \WP_Query(
        array(
            'post_type' => 'product',
            's' => $_POST['name_model']
        )
    );
    return $data;

}


function add_meta_slider_post()
{
    add_meta_box(
        'post_of_slider',
        'اسلایدر و بنر',
        'post_slider1',
        array('post', 'product'),
        'side'
    );
}

add_action('add_meta_boxes', 'add_meta_slider_post');

function post_slider1($post)
{

    $slider_product = get_post_meta($post->ID, 'enable_slider', true);
    echo '<lable for="slider">آیا در اسلایدر نمایش داده بشود؟</lable>';
    echo "<input id='slider' type='checkbox' name='slider'";
    if ($slider_product == "on") {
        echo "checked";
    }
    echo "> <br/><br/>";

    $banner_product = get_post_meta($post->ID, 'enable_banner', true);
    echo '<lable for="banner">آیا در بنر نمایش داده بشود؟</lable>';
    echo "<input id='banner' type='checkbox' name='banner'";
    if ($banner_product == "on") {
        echo "checked";
    }
    echo ">";

}


function save_post_slider($post_id)
{
    if (isset($_POST['slider'])) {
        update_post_meta($post_id, 'enable_slider', $_POST['slider']);
    } else {
        update_post_meta($post_id, 'enable_slider', 'off');
    }
    if (isset($_POST['banner'])) {
        update_post_meta($post_id, 'enable_banner', $_POST['banner']);
    } else {
        update_post_meta($post_id, 'enable_banner', 'off');
    }
}

add_action('save_post', 'save_post_slider');


function add_slider_col($col)
{
    $col['slider'] = "نمایش در اسلایدر";
    return $col;
}

add_filter('manage_product_posts_columns', 'add_slider_col');

function view_slider_col($col, $post_id)
{
    if ($col == 'slider') {
        $slider_enable = get_post_meta($post_id, 'enable_slider', true);
        if ($slider_enable=="on")
        echo '<span class="dashicons dashicons-yes-alt"></span>';
    }
}

add_action('manage_product_posts_custom_column', 'view_slider_col', 10, 2);


/*****************************************/

function aw_custom_meta_boxes($post_type, $post)
{
    add_meta_box(
        'aw-meta-box',
        'عکس ویژه برای اسلایدر و بنر',
        'render_aw_meta_box',
        array('post', 'product'), //post types here
        'side'
    );
}

add_action('add_meta_boxes', 'aw_custom_meta_boxes', 10, 2);

function render_aw_meta_box($post)
{
    $image = get_post_meta($post->ID, 'picture_special', true);
    ?>

    <p><a href="#" class="aw_upload_image_button button button-secondary"><?php _e('انتخاب عکس'); ?></a></p>
    <img src="<?php echo $image ?>" width="266px" height="266px"/>
    <p><input type="text" name="aw_custom_image" id="aw_custom_image" value="<?php echo $image; ?>"" /></p>

    <?php
}

function aw_include_script()
{
    if (!did_action('wp_enqueue_media')) {
        wp_enqueue_media();
    }
    wp_enqueue_script('awscript', get_stylesheet_directory_uri() . '/js/awscript.js', array('jquery'), null, false);
}

add_action('admin_enqueue_scripts', 'aw_include_script');


function aw_save_postdata($post_id)
{
    if (array_key_exists('aw_custom_image', $_POST)) {
        update_post_meta(
            $post_id,
            'picture_special',
            $_POST['aw_custom_image']
        );
    }
}

add_action('save_post', 'aw_save_postdata');

function add_banner_col($col)
{
    $col['banner'] = "نمایش در بنر";
    $col['picture_special']='عکس برای اسلایدر و بنر';
    return $col;
}

add_filter('manage_product_posts_columns', 'add_banner_col');

function view_banner_col($col, $post_id)
{
    if ($col == 'banner') {
        $banner_enable = get_post_meta($post_id, 'enable_banner', true);
        if ($banner_enable=="on")
        echo '<span class="dashicons dashicons-yes-alt"></span>';

    }
}

add_action('manage_product_posts_custom_column', 'view_banner_col', 10, 2);

function view_picture_special_col($col, $post_id)
{
    if ($col == 'picture_special') {

        $picture_special = get_post_meta($post_id, 'picture_special', true);
        if (!empty($picture_special))
        echo '<img width="50px" height="50px" src="'. $picture_special .'"/>';
    }
}

    add_action('manage_product_posts_custom_column', 'view_picture_special_col', 10, 2);

/****************/

function add_meta_box_banner()
{
    add_meta_box(
        'position_of_banner',
        'موقعیت بنر',
        'view_meta_box_banner',
        array('post', 'product'),
        'side'
    );
}

add_action('add_meta_boxes', 'add_meta_box_banner');

function view_meta_box_banner($post)
{
    $position_edit_banner = get_post_meta($post->ID, 'position_banner', true);
    ?>
    <select name="position_banner" id="position_banner">
        <option value>موقعیت بنر را انتخاب کنید</option>
        <option value="1" <?php if (isset($position_edit_banner)) if ($position_edit_banner == 1) echo 'selected' ?>>
            اولین بنر (بالا سمت چپ)
        </option>
        <option value="2"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 2) echo 'selected' ?>>
            دومین بنر (بالا سمت چپ)
        </option>
        <option value="3"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 3) echo 'selected' ?>>
            سومین بنر (پایین پیشنهادات سمت راست)
        </option>
        <option value="4"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 4) echo 'selected' ?>>
            چهارمین بنر (پایین پیشنهادات سمت چپ)
        </option>
        <option value="5"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 5) echo 'selected' ?>>
            پنجمین بنر (پایین محصولات پر فروش سمت راست)
        </option>
        <option value="6"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 6) echo 'selected' ?>>
            ششمین بنر (پایین محصولات پر فروش وسط)
        </option>
        <option value="7"<?php if (isset($position_edit_banner)) if ($position_edit_banner == 7) echo 'selected' ?>>
            هفتمین بنر (پایین محصولات پر فروش سمت چپ)
        </option>

    </select>
    <?php
}

function save_position_banner($post_id)
{
    if (array_key_exists('position_banner', $_POST)) {
        update_post_meta(
            $post_id,
            'position_banner',
            $_POST['position_banner']
        );
    }
}

add_action('save_post', 'save_position_banner');


/*count view*/

function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 بازدید";
    }
    return $count.' بازدید';
}
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Remove issues with prefetching adding extra views
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('بازدید');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

add_action( 'product_cat_add_form_fields', 'misha_add_term_fields' );

function misha_add_term_fields( $taxonomy ) {

    echo '
<hr>
<div class="form-field">
	<label for="misha-text">متن آیتم اول</label>
	<input type="text" name="name_item_top1" id="misha-text" />
	<p>اسم آیتم اول که در بالا نمایش داده میشود.</p>
	
	<label for="image_product1">آدرس عکس آیتم اول</label>	
	<input type="text" name="image_product1" id="image_product1" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category1" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product1">لینک آیتم اول</lable>
	<input type="text" name="link_product1" id="link_product1" />
	<p>لینک آیتم اول</p>
	</div> <hr>';

    echo '<div class="form-field">
	<label for="misha-text">متن آیتم دوم</label>
	<input type="text" name="name_item_top2" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product2">آدرس عکس آیتم دوم</label>	
	<input type="text" name="image_product2" id="image_product2" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	
	 <p><a href="#" id="btn_upload_category2" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product2">لینک آیتم دوم</lable>
	<input type="text" name="link_product2" id="link_product2" />
	<p> لینک آیتم دوم</p>
	</div><hr>';

    echo '<div class="form-field">
	<label for="misha-text">متن آیتم سوم</label>
	<input type="text" name="name_item_top3" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product3">آدرس عکس آیتم سوم</label>	
	<input type="text" name="image_product3" id="image_product3" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category3" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product3">لینک آیتم سوم</lable>
	<input type="text" name="link_product3" id="link_product3" />
	<p>لینک آیتم سوم</p>
	</div><hr>';

    echo '<div class="form-field">
	<label for="misha-text">متن آیتم چهارم</label>
	<input type="text" name="name_item_top4" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product4">آدرس عکس آیتم چهارم</label>	
	<input type="text" name="image_product4" id="image_product4" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category4" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product4">لینک آیتم چهارم</lable>
	<input type="text" name="link_product4" id="link_product4" />
	<p>لینک آیتم چهارم</p>
	</div><hr>';


    echo '<div class="form-field">
	<label for="misha-text">متن آیتم پنجم</label>
	<input type="text" name="name_item_top5" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product5">آدرس عکس آیتم پنجم</label>	
	<input type="text" name="image_product5" id="image_product5" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category5" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product5">لینک آیتم پنجم</lable>
	<input type="text" name="link_product5" id="link_product5" />
	<p>لینک آیتم پنجم</p>
	</div><hr>';

    echo '<div class="form-field">
	<label for="misha-text">متن آیتم ششم</label>
	<input type="text" name="name_item_top6" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product6">آدرس عکس آیتم ششم</label>
	<input type="text" name="image_product6" id="image_product6" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category6" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product6">لینک آیتم ششم</lable>
	<input type="text" name="link_product6" id="link_product6" />
	<p>لینک آیتم ششم</p>
	</div><hr>';

    echo '<div class="form-field">
	<label for="misha-text">متن آیتم هفتم</label>
	<input type="text" name="name_item_top7" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product7">آدرس عکس آیتم هفتم</label>
	<input type="text" name="image_product7" id="image_product7" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category7" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product7">لینک آیتم هفتم</lable>
	<input type="text" name="link_product7" id="link_product7" />
	<p>لینک آیتم هفتم</p>
	</div><hr>';
    echo '<div class="form-field">
	<label for="misha-text">متن آیتم هشتم</label>
	<input type="text" name="name_item_top8" id="misha-text" />
	<p>اسم آیتمی که در بالا نمایش داده میشود.</p>
	
	<label for="image_product8">آدرس عکس آیتم هشتم</label>
	<input type="text" name="image_product8" id="image_product8" />
	<p>آدرس عکسی که در بالا نمایش داده میشود.</p>
	 <p><a href="#" id="btn_upload_category8" class="button button-secondary">انتخاب عکس </a></p>
	<lable for="link_product8">لینک آیتم هشتم</lable>    
	<input type="text" name="link_product8" id="link_product8" />
	<p>لینک آیتم هشتم</p>
	</div>';
}

add_action( 'product_cat_edit_form_fields', 'misha_edit_term_fields', 10, 2 );

function misha_edit_term_fields( $term, $taxonomy ) {

    $value = get_term_meta( $term->term_id, 'name_item_top1', true );
    $value1 = get_term_meta( $term->term_id, 'image_product1', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top1', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم اول</label>
	</th>
	<td>    
		<input name="name_item_top1" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم اول را ویرایش کنید</p>
		
		<input name="image_product1" id="image_product1" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم اول را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category1" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product1" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم اول را ویرایش کنید</p>
	</td>
	</tr>';

    $value = get_term_meta( $term->term_id, 'name_item_top2', true );
    $value1 = get_term_meta( $term->term_id, 'image_product2', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top2', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم دوم</label>
	</th>
	<td>    
		<input name="name_item_top2" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم دوم را ویرایش کنید</p>
		
		<input name="image_product2" id="image_product2" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم دوم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category2" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product2" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم دوم را ویرایش کنید</p>
	</td>
	</tr>';

    $value = get_term_meta( $term->term_id, 'name_item_top3', true );
    $value1 = get_term_meta( $term->term_id, 'image_product3', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top3', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم سوم</label>
	</th>
	<td>    
		<input name="name_item_top3" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم سوم را ویرایش کنید</p>
		
		<input name="image_product3" id="image_product3" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم سوم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category3" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product3" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم سوم را ویرایش کنید</p>
	</td>
	</tr>';

    $value = get_term_meta( $term->term_id, 'name_item_top4', true );
    $value1 = get_term_meta( $term->term_id, 'image_product4', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top4', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم چهارم</label>
	</th>
	<td>    
		<input name="name_item_top4" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم چهارم را ویرایش کنید</p>
		
		<input name="image_product4" id="image_product4" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم چهارم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category4" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product4" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم چهارم را ویرایش کنید</p>
	</td>
	</tr>';

    $value = get_term_meta( $term->term_id, 'name_item_top5', true );
    $value1 = get_term_meta( $term->term_id, 'image_product5', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top5', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم پنجم</label>
	</th>
	<td>    
		<input name="name_item_top5" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم پنجم را ویرایش کنید</p>
		
		<input name="image_product5" id="image_product5" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم پنجم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category5" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product5" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم پنجم را ویرایش کنید</p>
	</td>
	</tr>';

    $value = get_term_meta( $term->term_id, 'name_item_top6', true );
    $value1 = get_term_meta( $term->term_id, 'image_product6', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top6', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم ششم</label>
	</th>
	<td>    
		<input name="name_item_top6" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم ششم را ویرایش کنید</p>
		
		<input name="image_product6" id="image_product6" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم ششم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category6" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product6" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم ششم را ویرایش کنید</p>
	</td>
	</tr>';


    $value = get_term_meta( $term->term_id, 'name_item_top7', true );
    $value1 = get_term_meta( $term->term_id, 'image_product7', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top7', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم هفتم</label>
	</th>
	<td>    
		<input name="name_item_top7" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم هفتم را ویرایش کنید</p>
		
		<input name="image_product7" id="image_product7" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم هفتم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category7" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product7" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم هفتم را ویرایش کنید</p>
	</td>
	</tr>';


    $value = get_term_meta( $term->term_id, 'name_item_top8', true );
    $value1 = get_term_meta( $term->term_id, 'image_product8', true );
    $value2 = get_term_meta( $term->term_id, 'link_item_top8', true );

    echo '<tr class="form-field">
	<th>
		<label for="misha-text">آیتم هشتم</label>
	</th>
	<td>    
		<input name="name_item_top8" id="misha-text" type="text" value="' . esc_attr( $value ) .'" />
		<p class="description">متن ایتم هشتم را ویرایش کنید</p>
		
		<input name="image_product8" id="image_product8" type="text" value="' . esc_attr( $value1 ) .'" />
		<p class="description">عکس ایتم هشتم را ویرایش کنید</p>
		 <p><a href="#" id="btn_upload_category8" class="button button-secondary">انتخاب عکس </a></p>
		
		<input name="link_product8" id="misha-text" type="text" value="' . esc_attr( $value2 ) .'" />
		<p class="description">لینک ایتم هشتم را ویرایش کنید</p>
	</td>
	</tr>';

}

add_action( 'created_product_cat', 'misha_save_term_fields' );
add_action( 'edited_product_cat', 'misha_save_term_fields' );

function misha_save_term_fields( $term_id ) {

    update_term_meta(
        $term_id,
        'name_item_top1',
        sanitize_text_field( $_POST[ 'name_item_top1' ] )
    );

    update_term_meta(
        $term_id,
        'image_product1',
        sanitize_text_field( $_POST[ 'image_product1' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top1',
        sanitize_text_field( $_POST[ 'link_product1' ] )
    );
    //*******
    update_term_meta(
        $term_id,
        'name_item_top2',
        sanitize_text_field( $_POST[ 'name_item_top2' ] )
    );

    update_term_meta(
        $term_id,
        'image_product2',
        sanitize_text_field( $_POST[ 'image_product2' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top2',
        sanitize_text_field( $_POST[ 'link_product2' ] )
    );
    //*********
    update_term_meta(
        $term_id,
        'name_item_top3',
        sanitize_text_field( $_POST[ 'name_item_top3' ] )
    );

    update_term_meta(
        $term_id,
        'image_product3',
        sanitize_text_field( $_POST[ 'image_product3' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top3',
        sanitize_text_field( $_POST[ 'link_product3' ] )
    );
    //*********
    update_term_meta(
        $term_id,
        'name_item_top4',
        sanitize_text_field( $_POST[ 'name_item_top4' ] )
    );

    update_term_meta(
        $term_id,
        'image_product4',
        sanitize_text_field( $_POST[ 'image_product4' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top4',
        sanitize_text_field( $_POST[ 'link_product4' ] )
    );
    //**********
    update_term_meta(
        $term_id,
        'name_item_top5',
        sanitize_text_field( $_POST[ 'name_item_top5' ] )
    );

    update_term_meta(
        $term_id,
        'image_product5',
        sanitize_text_field( $_POST[ 'image_product5' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top5',
        sanitize_text_field( $_POST[ 'link_product5' ] )
    );
    //***********
    update_term_meta(
        $term_id,
        'name_item_top6',
        sanitize_text_field( $_POST[ 'name_item_top6' ] )
    );

    update_term_meta(
        $term_id,
        'image_product6',
        sanitize_text_field( $_POST[ 'image_product6' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top6',
        sanitize_text_field( $_POST[ 'link_product6' ] )
    );
    //**********
    update_term_meta(
        $term_id,
        'name_item_top7',
        sanitize_text_field( $_POST[ 'name_item_top7' ] )
    );

    update_term_meta(
        $term_id,
        'image_product7',
        sanitize_text_field( $_POST[ 'image_product7' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top7',
        sanitize_text_field( $_POST[ 'link_product7' ] )
    );
    //*******
    update_term_meta(
        $term_id,
        'name_item_top8',
        sanitize_text_field( $_POST[ 'name_item_top8' ] )
    );

    update_term_meta(
        $term_id,
        'image_product8',
        sanitize_text_field( $_POST[ 'image_product8' ] )
    );

    update_term_meta(
        $term_id,
        'link_item_top8',
        sanitize_text_field( $_POST[ 'link_product8' ] )
    );



}


// ================================= Custom Post Type Taxonomies =================================
function crunchify_create_the_attaction_taxonomy() {
    register_taxonomy(
        'brand',  					// This is a name of the taxonomy. Make sure it's not a capital letter and no space in between
        'product',        			//post type name
        array(
            'hierarchical' => true,
            'label' => 'برند',  	//Display name
            'query_var' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'attraction')
        )
    );
}
add_action( 'init', 'crunchify_create_the_attaction_taxonomy');

//--------------- redirect to my account after login ---------------------------
    function redirect_after_login($user_login, $user)
    {
        $path = "Location: " . get_home_url() . '/my-account';
        header($path);
        exit;
    }

add_action('wp_login', 'redirect_after_login', 10, 2);


function custom_posts_per_page( $query ) {

    if ( $query->is_archive('cpt_name') || $query->is_category() ) {
        set_query_var('posts_per_page', 1);
    }
}
add_action( 'pre_get_posts', 'custom_posts_per_page' );