<?php
/* Template Name: Login And Register */

use app\classes\Assets;


use app\classes\RemotePost;

include(THEME_PATH . "/app/classes/RemotePost.php");
session_start();
$remotePost = new RemotePost("mojtaba13730", "1250345261");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>ثبت نام یا ورود</title>
    <link rel="stylesheet" href="<?php echo Assets::css('bootstrap-rtl.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('swiper_bundle.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('flickity.min.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('style.css') ?>">
    <link rel="stylesheet" href="<?php echo Assets::css('responsive.css') ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<?php
if (isset($_POST['next'])) {
    ($remotePost->SendCode($_POST['mobile'], "سایت فردا مارکت"));
    $_SESSION['mobile'] = $_POST['mobile'];
    ?>
    <script type="text/javascript">
        jQuery(function () {
            $('#tabs-22').trigger('click');
        });
    </script>
    <?php

}
if (isset($_POST['next_ok_code'])) {
    $check = ($remotePost->IsCodeValid($_SESSION['mobile'], $_POST['code']));
    if ($check) {
        ?>
        <script type="text/javascript">
            jQuery(function () {
                $('#tabs-22').trigger('click');
            });
        </script>
    <?php
    }else
    {
    ?>
        <script type="text/javascript">
            alert("کد اعتبار سنجی اشتباه است.")
        </script>
        <?php
    }
}
if (isset($_POST['btn_finish'])) {
    if ($_POST['password'] == $_POST['repassword']) {
        wp_create_user($_SESSION['mobile'], $_POST['repassword']);
        $path = "Location:" . get_home_url() . '/my-account/';
        header($path);
        exit;

    } else {
        ?>
        <script type="text/javascript">
            alert("کلمه عبور یکسان نیست.")
        </script>
        <?php
    }

}
?>
<body>
<div class="container main_container">
    <div class="col-12 user_Regestration">
        <div class="col-10 user_section">
            <div class="col-12  col-sm-12 col-md-7 col-lg-7" style="padding: 0;">
                <div id="tab2" class="tab_custom2">
                    <ul>
                        <li><a href="#tabs-1">ورود</a></li>
                        <li><a id="tabs-22" href="#tabs-2">ثبت نام</a></li>
                    </ul>
                    <div id="tabs-1">

                        <?php
                        /**
                         * Login Form
                         *
                         * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
                         *
                         * HOWEVER, on occasion WooCommerce will need to update template files and you
                         * (the theme developer) will need to copy the new files to your theme to
                         * maintain compatibility. We try to do this as little as possible, but it does
                         * happen. When this occurs the version of the template file will be bumped and
                         * the readme will list any important changes.
                         *
                         * @see     https://docs.woocommerce.com/document/template-structure/
                         * @package WooCommerce\Templates
                         * @version 4.1.0
                         */

                        if (!defined('ABSPATH')) {
                            exit; // Exit if accessed directly.
                        }

                        do_action('woocommerce_before_customer_login_form'); ?>

                        <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

                        <div class="u-columns col2-set" id="customer_login">

                            <div class="u-column1 col-1">

                                <?php endif; ?>


                                <form action="" method="post">
                                    <?php do_action('woocommerce_login_form_start'); ?>
                                    <input type="text" name="username" placeholder="" required
                                           value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"><span
                                            class="phone"></span> <span
                                            class="enter_user_mobile enter_user_mobile_1">شماره موبایل یا ایمیل خود را وارد کنید</span>
                                    <input type="password" placeholder="" name="password" required><span
                                            class="password"></span><span class="enter_user_password">رمز عبور خود را وارد کنید</span>
                                    <?php do_action('woocommerce_login_form'); ?>
                                    <div class="user_remember_pass">

                                        <label class="checkbox_container">به خاطر داشتن
                                            <input name="rememberme" type="checkbox">
                                            <span class="checkmark"></span>
                                        </label>
                                        <?php wp_nonce_field('woocommerce-login', 'woocommerce-login-nonce'); ?>
                                        <a href="<?php echo esc_url(wp_lostpassword_url()); ?>"> <label for=""
                                                                                                        style="font-family: IRANSans_medium;">رمز
                                                عبور خود را فراموش کردید؟</label></a>
                                    </div>
                                    <button type="submit" name="login">ورود</button>
                                    <?php do_action('woocommerce_login_form_end'); ?>
                                    <div class="rule">
                                        <p>
                                            با ورود و یا ثبت نام در سایت فردامارکت شما<span><a href="#">   شرایط و قوانین </a></span>
                                            استفاده از سرویس های سایت و <span> <a
                                                        href="#">    قوانین حریم خصوصی </a> </span> آن را می‌پذیرید.


                                        </p>
                                    </div>
                                </form>

                                <form class="woocommerce-form woocommerce-form-login login">


                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="username"><?php esc_html_e('Username or email address', 'woocommerce'); ?>
                                            &nbsp;<span class="required">*</span></label>
                                        <input type="text"
                                               class="woocommerce-Input woocommerce-Input--text input-text"
                                               id="username"
                                               autocomplete="username"/><?php // @codingStandardsIgnoreLine ?>
                                    </p>
                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="password"><?php esc_html_e('Password', 'woocommerce'); ?>
                                            &nbsp;<span class="required">*</span></label>
                                        <input class="woocommerce-Input woocommerce-Input--text input-text"
                                               type="password" id="password" autocomplete="current-password"/>
                                    </p>


                                    <p class="form-row">
                                        <label class="woocommerce-form__label woocommerce-form__label-for-checkbox woocommerce-form-login__rememberme">
                                            <input class="woocommerce-form__input woocommerce-form__input-checkbox"
                                                   type="checkbox" id="rememberme" value="forever"/>
                                            <span><?php esc_html_e('Remember me', 'woocommerce'); ?></span>
                                        </label>

                                        <button class="woocommerce-button button woocommerce-form-login__submit"
                                                value="<?php esc_attr_e('Log in', 'woocommerce'); ?>"><?php esc_html_e('Log in', 'woocommerce'); ?></button>
                                    </p>
                                    <p class="woocommerce-LostPassword lost_password">
                                        <?php esc_html_e('Lost your password?', 'woocommerce'); ?>
                                    </p>


                                </form>

                                <?php if ('yes' === get_option('woocommerce_enable_myaccount_registration')) : ?>

                            </div>

                            <div class="u-column2 col-2">

                                <h2><?php esc_html_e('Register', 'woocommerce'); ?></h2>

                                <form method="post"
                                      class="woocommerce-form woocommerce-form-register register" <?php do_action('woocommerce_register_form_tag'); ?> >

                                    <?php do_action('woocommerce_register_form_start'); ?>

                                    <?php if ('no' === get_option('woocommerce_registration_generate_username')) : ?>

                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="reg_username"><?php esc_html_e('Username', 'woocommerce'); ?>
                                                &nbsp;<span class="required">*</span></label>
                                            <input type="text"
                                                   class="woocommerce-Input woocommerce-Input--text input-text"
                                                   name="username" id="reg_username" autocomplete="username"
                                                   value="<?php echo (!empty($_POST['username'])) ? esc_attr(wp_unslash($_POST['username'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                                        </p>

                                    <?php endif; ?>

                                    <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                        <label for="reg_email"><?php esc_html_e('Email address', 'woocommerce'); ?>
                                            &nbsp;<span class="required">*</span></label>
                                        <input type="email"
                                               class="woocommerce-Input woocommerce-Input--text input-text"
                                               name="email" id="reg_email" autocomplete="email"
                                               value="<?php echo (!empty($_POST['email'])) ? esc_attr(wp_unslash($_POST['email'])) : ''; ?>"/><?php // @codingStandardsIgnoreLine ?>
                                    </p>

                                    <?php if ('no' === get_option('woocommerce_registration_generate_password')) : ?>

                                        <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                            <label for="reg_password"><?php esc_html_e('Password', 'woocommerce'); ?>
                                                &nbsp;<span class="required">*</span></label>
                                            <input type="password"
                                                   class="woocommerce-Input woocommerce-Input--text input-text"
                                                   name="password" id="reg_password" autocomplete="new-password"/>
                                        </p>

                                    <?php else : ?>

                                        <p><?php esc_html_e('A password will be sent to your email address.', 'woocommerce'); ?></p>

                                    <?php endif; ?>

                                    <?php do_action('woocommerce_register_form'); ?>

                                    <p class="woocommerce-form-row form-row">
                                        <?php wp_nonce_field('woocommerce-register', 'woocommerce-register-nonce'); ?>
                                        <button type="submit"
                                                class="woocommerce-Button woocommerce-button button woocommerce-form-register__submit"
                                                name="register"
                                                value="<?php esc_attr_e('Register', 'woocommerce'); ?>"><?php esc_html_e('Register', 'woocommerce'); ?></button>
                                    </p>

                                    <?php do_action('woocommerce_register_form_end'); ?>

                                </form>

                            </div>

                        </div>
                    <?php endif; ?>

                        <?php do_action('woocommerce_after_customer_login_form'); ?>
                    </div>
                    <div id="tabs-2">
                        <?php if (isset($_POST['next'])): ?>

                            <form id="msform" action="" method="post">
                                <!-- start step two form -->
                                <fieldset>
                                    <div class="authentication_code">
                                        <p>کد احراز هویت شما به شماره <span>   <?php echo $_POST['mobile'] ?></span>
                                            ارسال شد <br>آن را وارد کنید:</p>

                                    </div>
                                    <div class="number_authentication_section">

                                        <input name="code" type="text">

                                    </div>


                                    <input type="submit" name="next_ok_code" class="next action-button"
                                           value="ادامه"/>

                                    <div class="rule">
                                        <p>
                                            با ورود و یا ثبت نام در سایت فردامارکت
                                            شما<span> <a> شرایط و قوانین </a> </span>
                                            استفاده از سرویس های سایت و <span> <a>   قوانین حریم خصوصی </a></span>
                                            آن را می‌پذیرید.
                                        </p>
                                    </div>
                                </fieldset>
                            </form>
                            <!-- end step two form -->
                        <?php endif; ?>
                        <!-- start step three form -->
                        <?php if (isset($_POST['next_ok_code']) && $check): ?>
                            <form id="msform" action="" method="post">
                                <fieldset>
                                    <div class="phone_email_section">
                                        <input name="password" type="password" placeholder="" required
                                               class="password1"><span
                                                class="password password1"></span> <span
                                                class="enter_user_mobile enter_user_mobile_3">رمز عبور خود را وارد کنید</span>
                                        <input name="repassword" type="password" placeholder="" required
                                               class="password2"><span
                                                class="password password2"></span><span class="repeat_passoword">رمز عبور خود را تکرار کنید</span>
                                    </div>

                                    <input type="submit" name="btn_finish" class="next action-button"
                                           value="ثبت نام"/>
                                    <div class="rule">
                                        <p>
                                            با ورود و یا ثبت نام در سایت فردامارکت
                                            شما<span> <a> شرایط و قوانین </a> </span>
                                            استفاده از سرویس های سایت و <span> <a>   قوانین حریم خصوصی </a></span>
                                            آن را می‌پذیرید.
                                        </p>
                                    </div>

                                </fieldset>
                                <!-- end step three form -->
                            </form>
                        <?php endif; ?>
                        <form id="msform" action="" method="post">
                            <!-- start progressbar -->
                            <ul id="progressbar">
                                <li class="active"><span>1</span></li>
                                <li><span>2</span></li>
                                <li><span>3</span></li>
                            </ul>
                            <!-- end progressbar -->
                            <!-- start step one form -->
                            <fieldset>

                                <div class="phone_email_section">
                                    <select name="webmenu" id="webmenu">
                                        <option value="98"
                                                data-image="<?php echo Assets::image('iranFlag.png') ?>"></option>
                                        <option value="98"
                                                data-image="<?php echo Assets::image('iranFlag.png') ?>"></option>
                                        <option value="98"
                                                data-image="<?php echo Assets::image('iranFlag.png') ?>"></option>

                                    </select>

                                    <input type="text" placeholder="" name="mobile" required
                                           class="enter_user_mobile_input"> <span
                                            class="enter_user_mobile enter_user_mobile_2">شماره موبایل یا ایمیل خود را وارد کنید</span>
                                </div>


                                <input type="submit" name="next" class="next action-button" value="ادامه"/>

                                <div class="rule">
                                    <p>
                                        با ورود و یا ثبت نام در سایت فردامارکت
                                        شما<span> <a> شرایط و قوانین </a> </span> استفاده از سرویس های سایت و <span> <a>   قوانین حریم خصوصی </a></span>
                                        آن را می‌پذیرید.
                                    </p>
                                </div>

                            </fieldset>
                        </form>
                        <!-- end step one form -->


                    </div>

                </div>

            </div>
            <div class="col-4 d-none d-md-block col-md-5 col-lg-5 doctor_section">
                <div>
                    <div class="pharmecy_img">
                        <img src="<?php echo Assets::image('pharmecy.png"') ?> alt="">
                    </div>
                    <div class="welcome_to_fadra">
                        <span>خوش آمدید</span>
                    </div>
                    <div class="farda_logo_welcome">
                        <img src="<?php echo Assets::image('farda_log.png') ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="<?php echo Assets::js('bootstrap.min.js'); ?> "></script>
<script src="<?php echo Assets::js('jquery.min.js'); ?> "></script>
<script src="<?php echo Assets::js('popper.min.js'); ?>"></script>

<script src="<?php echo Assets::js('swiper_bundle.js'); ?>"></script>
<script src="<?php echo Assets::js('myfunction.js'); ?>"></script>
<script src="<?php echo Assets::js('flickity.pkgd.min.js'); ?>"></script>
<script src="<?php echo Assets::js('jquery-ui.js'); ?>"></script>
<script src="<?php echo Assets::js('jquery.easing.min.js'); ?>"></script>
<script src="<?php echo Assets::js('jquery.dd.min.js'); ?>"></script>
<script src="<?php echo Assets::js('theia-sticky-sidebar.js"'); ?>"></script>

</html>

