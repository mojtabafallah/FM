<!DOCTYPE html>
<html lang="en">
<?php use app\classes\Assets;
use app\classes\Custom_walker;
use app\controller\MenuController; ?>
<head>
    <?php wp_head(); ?>
    <meta charset="UTF-8">
    <title><?php the_title()?></title>
    <link rel="stylesheet" href="<?php echo Assets::css('bootstrap-rtl.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo Assets::css('swiper_bundle.min.css'); ?>">

    <link rel="stylesheet" href="<?php echo Assets::css('font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('flickity.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('style.css'); ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('responsive.css'); ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('simple-scrollbar.css'); ?>">

    <link rel="stylesheet" href="<?php echo Assets::css('all.css'); ?>">


</head>

<body>

<div class="col-12 " style="padding: 0;">
    <div class="layout"></div>
    <header>
        <div class="container main_container" style="padding: 0;">
            <div class="row_custom">
                <div class="header">
                    <div class="col-12 col-md-3 col-lg-2 col-xl-1 header_logo">
                        <a href="<?php echo home_url() ?>">
                            <img src="<?php echo Assets::image('Group 16541@2x.png'); ?>" alt="">
                        </a>
                    </div>
                    <div class="col-12 col-md-8 col-lg-4  header_form_section">

                        <form action="<?php echo home_url() ?>" role="search" method="get" class="header_form">
                            <input type="text" name="s" id="search_input" autocomplete="off"
                                   placeholder="دنبال چی می گردی ؟"
                                   value="<?php if (isset($_GET['s'])) echo $_GET['s'] ?>">
                            <div class="search_result">
                                <ul class="search_result_category">
                                    <li><a href="#">نتیجه جست و جو در دسته بندی <span
                                                class="search_result_category_link">(لینک)</span></a></li>
                                </ul>
                                <ul id="search_result_info" class="search_result_info">
                                    <li><a href="#">مکمل بدنسازی لورم ایپسوم 1</a></li>
                                    <li><a href="#">مکمل بدنسازی لورم ایپسوم 2</a></li>
                                    <li><a href="#">مکمل بدنسازی لورم ایپسوم 3</a></li>
                                </ul>
                            </div>
                            <button class=""><i class="fa fa-search"></i></button>
                            <span class="fa fa-times"></span>
                        </form>
                    </div>

                    <div class="col-12 col-lg-5  header_login">
                        <?php if (!is_user_logged_in()): ?>
                            <a href="<?php echo get_site_url() . '/ورود' ?>">
                                <button><span class="login_btn"></span>
                                    ورود به حساب کاربری


                                </button>
                            </a>
                        <?php else: ?>
                            <a href="<?php echo get_site_url() . '/my-account' ?>">
                                <button><span class="login_btn"></span>

                                    حساب کاربری من


                                </button>
                            </a>
                        <?php  endif; ?>
                        <span class="divider"></span>
                        <a href="<?php echo get_site_url() . '/cart' ?>">
                            <button class="cart_btn"><span class="cart_custom"></span> سبد خرید</button>

                        </a>

                    </div>

                </div>
            </div>

        </div>

        <div class="container main_container" style="padding: 0;">
            <div class="row_custom">
                <div class="col-12 d-block d-md-none">
                    <div class="col-12 bar_custom">
                        <span class="fa fa-bars "></span>
                    </div>
                    <div class="menu_bar">
                        <div class="menubar_close_section">

                            <span class="fa fa-close" id="close"></span>

                        </div>

                        <nav>
                            <form action="">
                                <input type="text" placeholder="دنبال چی میگردی">
                                <button><span class="fa fa-search"></span></button>
                            </form>
                            <ul>
                                <li><a href="#">نمونه تستی</a></li>
                                <li><a href="#">نمونه تستی</a></li>
                                <li><a href="#">نمونه تستی</a></li>
                                <li><a href="#">نمونه تستی</a></li>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>

            <div class="header d-none d-md-block">
                <div class="col-12 col-xl-8">
                    <nav>
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'header-menu',
                            'menu_class'=>'main_menu',
                            'walker'=> new Custom_walker()
                        )); ?>
                    </nav>
                </div>
            </div>
        </div>
    </header>

    <div class="container main_container">
        <div class="col-12 breadcrumb_section">
            <ul>
                <li><a href="#">  داروخانه آنلاین فردا مارکت     </a></li>
                <li><a href="#">مکمل ها  </a></li>
            </ul>
        </div>

    </div>
    <!-- end of breadercrumb section -->

    <div class="container main_container">
        <div class="col-12">
            <div class="supplement_sections">
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>
                <a href="">
                    <div class="supplemt">
                        <img src="img/Group 16431.png" alt="">
                        <span>مکمل های تقویتی</span>
                    </div>
                </a>



            </div>
        </div>
    </div>
    <!-- end of the suplement section -->