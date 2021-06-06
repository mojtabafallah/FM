<?php /* Template Name: All Off */ ?>
<?php use app\controller\ProductController;

get_header(); ?>
    <div class="container main_container">
        <div class="col-12 breadcrumb_section">
            <ul>
                <li><a href="<?php echo home_url() ?>"> داروخانه آنلاین فردا مارکت </a></li>
                <li><a href="<?php echo get_the_permalink() ?>"><?php the_title() ?></a></li>
            </ul>
        </div>
    </div>
    <!-- end of breadercrumb section -->
    <div class="container main_container">
        <div class="col-12">
            <div class="supplement_sections">
                <?php
                $id_term = get_queried_object()->term_id;

                $arr1 = [];
                $name1 = get_term_meta($id_term, 'name_item_top1', true);
                $image1 = get_term_meta($id_term, 'image_product1', true);
                $link1 = get_term_meta($id_term, 'link_item_top1', true);
                $arr1[] = $name1;
                $arr1[] = $image1;
                $arr1[] = $link1;


                $arr2 = [];
                $name2 = get_term_meta($id_term, 'name_item_top2', true);
                $image2 = get_term_meta($id_term, 'image_product2', true);
                $link2 = get_term_meta($id_term, 'link_item_top2', true);
                $arr2[] = $name2;
                $arr2[] = $image2;
                $arr2[] = $link2;

                $arr3 = [];
                $name3 = get_term_meta($id_term, 'name_item_top3', true);
                $image3 = get_term_meta($id_term, 'image_product3', true);
                $link3 = get_term_meta($id_term, 'link_item_top3', true);
                $arr3[] = $name3;
                $arr3[] = $image3;
                $arr3[] = $link3;

                $arr4 = [];
                $name4 = get_term_meta($id_term, 'name_item_top4', true);
                $image4 = get_term_meta($id_term, 'image_product4', true);
                $link4 = get_term_meta($id_term, 'link_item_top4', true);
                $arr4[] = $name4;
                $arr4[] = $image4;
                $arr4[] = $link4;

                $arr5 = [];
                $name5 = get_term_meta($id_term, 'name_item_top5', true);
                $image5 = get_term_meta($id_term, 'image_product5', true);
                $link5 = get_term_meta($id_term, 'link_item_top5', true);
                $arr5[] = $name5;
                $arr5[] = $image5;
                $arr5[] = $link5;

                $arr6 = [];
                $name6 = get_term_meta($id_term, 'name_item_top6', true);
                $image6 = get_term_meta($id_term, 'image_product6', true);
                $link6 = get_term_meta($id_term, 'link_item_top6', true);
                $arr6[] = $name6;
                $arr6[] = $image6;
                $arr6[] = $link6;

                $arr7 = [];
                $name7 = get_term_meta($id_term, 'name_item_top7', true);
                $image7 = get_term_meta($id_term, 'image_product7', true);
                $link7 = get_term_meta($id_term, 'link_item_top7', true);
                $arr7[] = $name7;
                $arr7[] = $image7;
                $arr7[] = $link7;

                $arr8 = [];
                $name8 = get_term_meta($id_term, 'name_item_top8', true);
                $image8 = get_term_meta($id_term, 'image_product8', true);
                $link8 = get_term_meta($id_term, 'link_item_top8', true);
                $arr8[] = $name8;
                $arr8[] = $image8;
                $arr8[] = $link8;

                $arr_all[] = $arr1;
                $arr_all[] = $arr2;
                $arr_all[] = $arr3;
                $arr_all[] = $arr4;
                $arr_all[] = $arr5;
                $arr_all[] = $arr6;
                $arr_all[] = $arr7;
                $arr_all[] = $arr8;


                ?>
                <?php
                foreach ($arr_all as $item):
                    ?>
                    <a href="<?php echo $item[2] ?>">
                        <div class="supplemt">
                            <img src="<?php echo $item[1] ?>" alt="">
                            <span><?php echo $item[0] ?></span>
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- end of the suplement section -->
    <div class="col-12">
        <div class="col-12 col-md-12 col-lg-4 col-xl-3">
            <div class="sidebar">
                <div class="sidebar_title">
                    <h3>جستجوی پیشرفته</h3>
                </div>
                <div class="sidebar_search">
                    <form action="">
                        <input type="text" placeholder="نام محصول یا برند مورد نظر را بنویسید...">
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
                                <?php \app\controller\WcController::get_all_cat(); ?>
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
    <!-- end of the scroll to top section  -->
<?php get_footer(); ?>