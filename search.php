<?php use app\classes\Assets;
use app\controller\SearchController;

get_header(); ?>

<?php
$result_search = $_GET['s'];
//global $wp_query;
//$big = 999999999; // need an unlikely integer
//echo paginate_links(array(
//    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
//    'format' => '?paged=%#%',
//
//    'current' => max(1, get_query_var('paged')),
//    'total' => $wp_query->max_num_pages
//));


?>

<div class="container main_container">
    <div class="col-12 breadcrumb_section">
        <ul>
            <li><a href="#"> جستجو بر اساس </a></li>
            <li><a href="#"><?php echo $result_search ?> </a></li>
        </ul>
    </div>
</div>
<!-- end of breadercrumb section -->

<div class="col-12">
 
    <div class="col-12 col-md-12 col-lg-8 col-xl-9">
        <div class="categorizing">

            <div class="categorizing_product">
                <?php


                if ($wp_query->have_posts()) :
                    while ($wp_query->have_posts()):
                        $wp_query->the_post();
                        if (get_post_type() == "product"):
                            global $product;

                            $id = $product->get_id();
                            $data = $product->get_data();
                            ?>
                            <a href="<?php the_permalink(); ?>">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="categorizing_product_custom">
                                        <div class="categorizing_product_custom_img">
                                            <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                        </div>
                                        <div class="categorizing_product_custom_info">
                                            <p> <?php the_title(); ?></p>
                                        </div>
                                        <div class="categorizing_product_custom_price">
                                            <span><?php echo $data['regular_price'] ?>تومان </span>
                                        </div>
                                        <div class="categorizing_product_custom_sub_info">
                                            <span class="real_price"><?php echo $data['sale_price'] ?>   تومان</span>
                                            <span class="time">01:22:36</span>
                                        </div>
                                        <span class="off">  <?php
                                            $off = ($data['sale_price'] * 100) / $data['regular_price'];
                                            $off = 100 - $off;
                                            echo $off;
                                            ?>%</span>
                                    </div>
                                </div>
                            </a>
                        <?php
                        endif;
                    endwhile;
                else:
                    echo __('محصولی موجود نیست');
                endif;
                ?>

            </div>

            <div class="col-12">
                <nav class="woocommerce-pagination">
                    <?php wp_pagination(); ?>
                </nav>
            </div>
        </div>
    </div>
</div>

<div class="container main_container">
    <div class="slider_offer slider_offer_2">
        <div class="col-12 slider_offer_title">
            <div class="slider_offer_border">
                <span>مشاهده همه</span>
                <h2>محصولات مرتبط</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>

                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">

                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>

                        </a>
                    </div>
                </div>

                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end of the related product -->
<div class="container main_container">
    <div class="col-12 login_section">
        <div class="col-12 col-sm-12  col-md-8 col-lg-7">
            <div class="farad_login_info">
                <h1>باشگاه مشتریان فردا مارکت</h1>
                <h3>از تخفیف ها و جدیدترین های فردا مارکت با خبر شوید :</h3>
            </div>
            <div class="login_form">
                <form action="">
                    <input type="text" placeholder="شماره موبایل یا ایمیل خود را وارد کنید">
                    <button>عضویت</button>
                </form>
            </div>

        </div>
        <div class="d-none d-md-block col-6 col-md-4 col-lg-5" style="padding: 0;">
            <div class="login_image">
                <img src="img/Intersection 17.png" alt="">
            </div>

        </div>

    </div>
</div>
</div>
<!-- end of login section -->
<div class="container main_container">
    <div class="slider_offer slider_offer_2">
        <div class="col-12 slider_offer_title">
            <div class="slider_offer_border">
                <span>مشاهده همه</span>
                <h2>محصولات مکمل</h2>
            </div>
        </div>
        <div class="col-12">
            <div class="carousel carousel_custom" data-flickity='{ "contain": true }'>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent off_percent_2">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price ">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent off_percent_2">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price ">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent off_percent_2">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price ">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>
                                    <span class="off_percent off_percent_2">30%</span>
                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
                </div>
                <div class="slide">
                    <div class="c_carousel_custom">
                        <a href="#" class="c-prodcut-box__img">
                            <div class="c-prodcut-box">

                                <img src="img/11542575902017111412.png" alt="">
                            </div>
                            <div class="c-product-box__title c-product-box__title_2">
                                پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم
                            </div>
                            <div class="c-product-box__bottom">
                                <div class="off_section">
                                    تومان <span class="off_price">164/700 </span>

                                </div>
                                <div class="price_section">

                                    <span class="price">  164/700 </span>

                                </div>
                            </div>
                    </div>
                    </a>
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

<?php get_footer(); ?>
