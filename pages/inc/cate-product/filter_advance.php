<?php
if (isset($_POST['item_search'])):
    $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
    $cate = get_queried_object();
    $cateID = $cate->term_id;
    $search_by_name = new WP_Query(
        array(
            'post_type' => 'product',
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
            'posts_per_page' => '1',
            'paged' => $paged,
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field' => 'term_id', //This is optional, as it defaults to 'term_id'
                    'terms' => $cateID,
                    'operator' => 'IN' // Possible values are 'IN', 'NOT IN', 'AND'.
                ),
                array(
                    'taxonomy' => 'product_visibility',
                    'field' => 'slug',
                    'terms' => 'exclude-from-catalog', // Possibly 'exclude-from-search' too
                    'operator' => 'NOT IN'
                )
            ),
            'orderby' => 'post_title',
            'order' => 'DESC',
            's' => $_POST['item_search'],

        )
    );

endif;


?>
<div class="col-12">
    <div class="col-12 col-md-12 col-lg-4 col-xl-3">
        <div class="sidebar">
            <div class="sidebar_title">
                <h3>جستجوی پیشرفته</h3>
            </div>
            <div class="sidebar_search">
                <form action="" method="post">
                    <input type="text" name="item_search" placeholder="نام محصول یا برند مورد نظر را بنویسید...">
                    <button></button>
                </form>
            </div>

            <div class="search_category">
                <div class="border_custom">
                    <div class="search_category_title collapsed search_category_title_custom" data-toggle="collapse"
                         data-target="#collapse">
                        <h3>دسته بندی</h3>
                        <span class="arrow_custom"></span>
                    </div>
                    <div class="collapse" id="collapse">
                        <div class="search_category_title">

                            <span class="choosing_barand">دسته بندی خود را انتخاب کنید</span>
                        </div>
                        <div class="search_category_options">
                            <?php use app\controller\ProductController;

                            \app\controller\WcController::get_all_cat(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of the search category -->
            <div class="search_category">
                <div class="border_custom">
                    <div class="search_category_title collapsed search_category_title_custom" data-toggle="collapse"
                         data-target="#collapse1">
                        <h3>برند</h3>
                        <span class="arrow_custom"></span>
                    </div>
                    <div class="collapse" id="collapse1">
                        <div class="search_category_title">

                            <span class="choosing_barand">برند خود را انتخاب کنید</span>
                        </div>
                        <div class="search_category_options">
                            <?php \app\controller\WcController::get_all_brand(); ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end of the banner category -->
            <div class="price_filter">

                <div class="price_category_title collapsed" data-toggle="collapse" data-target="#collapse2">
                    <h3>محدوده قیمت</h3>
                    <span class="arrow_custom"></span>
                </div>
                <div class="collapse collapse_custom" id="collapse2">
                    <div class="price">
                        <div class="sidebar--content">
                            <div class="price-field">
                                <input type="range" min="0" max="5000000" value="0" step="1" id="lower"/><input
                                        type="range" min="0" max="5000000" value="99999999" step="1" id="upper"/>
                            </div>
                            <div class="col-6">
                                <div class="to"></div>
                            </div>
                            <div class="col-6" style="text-align: left;">
                                <div class="from"></div>
                            </div>
                            <button type="button" class="priceFilter" onclick="window.location.href =
        '?min_price=' +
        document.querySelector('.toPrice').innerHTML + 'تومان' +
        '&max_price=' +
        document.querySelector('.fromPrice').innerHTML + 'تومان';">
                                <i class="fa fa-filter"></i>اعمال کن
                            </button>
                        </div>
                    </div>

                </div>

            </div>
            <div class="available_product">
                <div class="available_product_custom">
                    <span>فقط کالا های موجود</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="available_product">
                <div class="available_product_custom">
                    <span>ارسال رایگان</span>
                    <label class="switch">
                        <input type="checkbox" checked>
                        <span></span>
                    </label>
                </div>
            </div>
            <div class="available_product">
                <div class="available_product_custom">
                    <span>تخفیف خورده</span>
                    <label class="switch">
                        <input type="checkbox">
                        <span></span>
                    </label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-8 col-xl-9">
        <div class="categorizing">
            <div class="categorizing_options">
                <ul>
                    <li><span>مرتب سازی بر اساس :</span></li>
                    <li><a href="#" class="active">پرفروش ترین</a></li>
                    <li><a href="#">محبوب ترین</a></li>
                    <li><a href="#">جدید ترین</a></li>
                    <li><a href="#">گران ترین</a></li>
                    <li><a href="#">ارزان ترین</a></li>
                </ul>
            </div>
            <?php if (isset($search_by_name)): ?>
                <div class="categorizing_product">
                    <?php if ($search_by_name->have_posts()): ?>

                        <?php while ($search_by_name->have_posts()): $search_by_name->the_post(); ?>
                            <a href="<?php echo get_the_permalink(); ?>">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="categorizing_product_custom">
                                        <div class="categorizing_product_custom_img">
                                            <img <?php if (!empty($product->get_date_on_sale_from()) && !empty($product->get_date_on_sale_to())): ?>
                                                onload="setInterval(
                                                    function(){

                                                    maketimer2('<?php echo $product->get_date_on_sale_from(); ?>' , '<?php echo $product->get_date_on_sale_to(); ?>' , '<?php echo $id ?>')
                                                    }
                                                    , 1000);
                                                    "
                                            <?php endif; ?> src="<?php echo get_the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="categorizing_product_custom_info">
                                            <p><?php echo get_the_title(); ?>
                                            </p>
                                        </div>
                                        <div class="categorizing_product_custom_price">
                                            <span>تومان <?php echo $product->get_regular_price(); ?> </span>
                                        </div>
                                        <div class="categorizing_product_custom_sub_info">
                                            <span class="real_price">تومان<?php echo $product->get_sale_price(); ?></span>
                                            <span class="days-<?php echo get_the_ID() ?>"></span>
                                        </div>
                                        <?php
                                        if (!empty($product->get_sale_price())):?>

                                            <span class="off">
                                                <?php
                                                $off = ($product->get_sale_price() * 100) / $product->get_regular_price();
                                                $off = 100 - $off;
                                                echo $off;
                                                ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </a>

                        <?php endwhile; ?>
  <?php
                        wp_reset_postdata();
                        ?>
                    <?php endif; ?>

                </div>
                <div class="col-12">




                    <nav class="woocommerce-pagination">

                        <?php wp_pagination(); ?>
                    </nav>
                </div>
            <?php endif; ?>
            <?php if (isset($search_by_name)): ?>
                <div class="categorizing_product">
                    <?php
                    $cate = get_queried_object();
                    $cateID = $cate->term_id;
                    $product1 = ProductController::get_all_product_by_category_id($cateID);
                    global $product;
                    ?>
                    <?php if ($product1->have_posts()): ?>
                        <?php while ($product1->have_posts()): $product1->the_post(); ?>
                            <a href="<?php echo get_permalink() ?>">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="categorizing_product_custom">
                                        <div class="categorizing_product_custom_img">
                                            <img src="<?php echo get_the_post_thumbnail_url() ?>" alt="">
                                        </div>
                                        <div class="categorizing_product_custom_info">
                                            <p><?php echo the_title() ?>
                                            </p>
                                        </div>
                                        <div class="categorizing_product_custom_price">
                                            <span>تومان <?php echo $product->get_regular_price(); ?> </span>
                                        </div>
                                        <div class="categorizing_product_custom_sub_info">
                                            <span class="real_price">تومان<?php echo $product->get_sale_price(); ?></span>
                                            <span class="time">01:22:36</span>
                                        </div>
                                        <span class="off">30%</span>
                                    </div>
                                </div>
                            </a>
                        <?php endwhile; ?>
                    <?php endif; ?>
                </div>
                <div class="col-12">
                    <nav class="woocommerce-pagination">
                        <ul class="page-numbers">
                            <li>
                                <a class="prev page-numbers" href="https://shamyas.ir/shop/shop/page/1/"></a>
                            </li>
                            <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/1/">1</a></li>
                            <li><span aria-current="page" class="page-numbers current">2</span></li>
                            <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/3/">3</a></li>
                            <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/4/">4</a></li>
                            <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/5/">5</a></li>
                            <li><a class="page-numbers" href="https://shamyas.ir/shop/shop/page/6/">6</a></li>
                            <li>
                                <a class="next page-numbers" href="https://shamyas.ir/shop/shop/page/3/"></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>