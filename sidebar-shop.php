<div class="col-12 col-md-12 col-lg-4 col-xl-3">
    <div class="sidebar">
        <div class="sidebar_title">
            <h3>جستجوی پیشرفته</h3>
        </div>
        <div class="sidebar_search">
            <form action="">
                <input type="text" name="s" placeholder="نام محصول یا برند مورد نظر را بنویسید...">
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
                        <?php
                        $terms = get_terms(array(
                            'taxonomy' => 'product_cat',
                            'hide_empty' => false,
                        ));


                        ?>

                        <ul>
                            <?php foreach ($terms as $term): ?>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option"><?php echo $term->name ?></span>
                                        <input type="checkbox" id="<?php echo $term->term_id ?>">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                            <?php endforeach; ?>

                        </ul>

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

                        <ul>
                            <?php
                            $terms = get_terms(array(
                                'taxonomy' => 'brand',
                                'hide_empty' => false,
                            ));
                            ?>
                            <?php foreach ($terms as $term): ?>
                                <li>
                                    <label class="checkbox_container checkbox_container_container2">
                                        <span class="option"><?php echo $term->name;?></span>
                                        <input type="checkbox" value="<?php echo $term->term_id?>">
                                        <span class="checkmark"></span>
                                    </label>

                                </li>
                            <?php endforeach; ?>


                        </ul>

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
                            <input type="range" min="0" max="5000000" value="0" step="1" id="lower"/><input type="range"
                                                                                                            min="0"
                                                                                                            max="5000000"
                                                                                                            value="99999999"
                                                                                                            step="1"
                                                                                                            id="upper"/>
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