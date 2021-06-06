<?php /* Template Name: Account User */ ?>
<?php
get_header();?>
<div class="user_panel_section">
    <div class="user_panel">
        <div class="user_options">
            <ul>
                <li id="orderCustom" class="userop"><a class="myorders active">سفارش های من</a></li>
                <li id="myfavourite" class="userop"> <a class="myfavourite">لیست ها</a></li>
                <li id="myaddress" class="userop">
                    <a class="myaddress">نشانی ها</a>
                </li>
                <li id="myorderDetails" class="userop"><a class="myorderDetails">جزئیات حساب</a></li>
                <li><a class="exit">خروج</a></li>
            </ul>
        </div>
        <div class="user_option2">
            <!-- بخش سفارش های من -->
            <div id="orderCustom" class="user_order order_user_default">
                <h1>تاریخچه سفارشات</h1>
                <!-- <div class="no_order">
                    <img src="img/d4fa2ec1.svg" alt="">
                    <span>سفارشی وجود ندارد</span>
                </div> -->
                <div class="order_exist">
                    <div class="order_exist_header">
                        <span>سفارش</span>
                        <span>تاریخ</span>
                        <span>وضعیت</span>
                        <span>مجموع</span>
                        <span>عملیات</span>
                    </div>
                    <?php
                    $user_id=   get_current_user_id();
                    $args = array(
                        'customer_id' => $user_id
                    );
                    $orders = wc_get_orders($args);
                 //   var_dump($orders);

                    ?>
                    <?php if(!empty($orders)):?>
                    <?php foreach ($orders as $order) :
                            $item_count = $order->get_item_count() - $order->get_item_count_refunded();
                   ?>
                    <div class="order_exist_prodcut">
                        <div>
                            <img src="img/NoPath - Copy (18).png " alt="">
                        </div>
                        <span><?php echo $order->order_date;?></span>
                        <span><?php echo esc_html( wc_get_order_status_name( $order->get_status() ) ); ?></span>
                        <span><?php echo wp_kses_post( sprintf( _n( '%1$s for %2$s item', '%1$s for %2$s items', $item_count, 'woocommerce' ), $order->get_formatted_order_total(), $item_count ) );?></span>
                        <div class="order_options">
                            <?php
                            $actions = wc_get_account_orders_actions( $order );

                            if ( ! empty( $actions ) ) {
                                foreach ( $actions as $key => $action ) { // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
                                    echo '<a href="' . esc_url( $action['url'] ) . '" class="woocommerce-button button ' . sanitize_html_class( $key ) . '">' . esc_html( $action['name'] ) . '</a>';
                                }
                            }
                            ?>

                        </div>
                    </div>
                    <?php  endforeach;?>
                    <?php else:?>
                        <div class="no_order">
                            <img src="img/d4fa2ec1.svg" alt="">
                            <span>سفارشی وجود ندارد</span>
                        </div>
                    <?php endif;?>

                </div>

            </div>
            <!-- بخش لیست علاقه مندی ها -->
            <div id="myfavourite" class="user_order">
                <div class="myfavourite_section">
                    <h1>کالاهای مورد علاقه</h1>
                    <div class="myfavourite_section_custom">
                        <img src="img/NoPath - Copy (18).png " alt="">
                        <p>پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم</p>
                        <div class="myfavourite_price">
                            <span class="first_price">4599000</span>
                            <span class="off">49%</span>
                            <span class="real_price">2349000 <span>تومان</span></span>
                        </div>
                    </div>
                    <div class="myfavourite_section_custom">
                        <img src="img/NoPath - Copy (18).png " alt="">
                        <p>پودر سوپر وی ( شکلاتی ) کارن حجم: ۱۰۰۰ گرم</p>
                        <div class="myfavourite_price">
                            <span class="first_price">4599000</span>
                            <span class="off">49%</span>
                            <span class="real_price">2349000 <span>تومان</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- بخش نشانی ها -->
            <div id="myaddress" class="user_order">
                <div class="myaddress_custom">
                    <h1>نشانی ها</h1>
                    <div class="myaddress_location">
                        <p> تهران , تهران ,برج میلاد </p>
                        <div class="user_personalInfo">
                            <span class="provice">تهران , تهران</span>
                            <span class="postalcode">۷۵۱۱۳۹۶۵۷۳</span>
                            <span class="phone">۰۹۱۲۳۴۵۶۷۸۹</span>
                            <span class="username">اسم کاربر</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- بخش جزئیات حساب -->
            <div id="myorderDetails" class="user_order">
                <div class="myorderDetails_custom">
                    <h1>اطلاعات شخصی</h1>
                    <div class="myorderDetails_info">
                        <div>
                            <span>نام</span>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <span>نام خانوادگی</span>
                            <input type="text" name="" id="">
                        </div>
                        <div>
                            <span>ادرس ایمیل</span>
                            <input type="email" name="" id="">
                        </div>
                        <fieldset>
                            <legend>تغییر گذرواژه</legend>
                            <span>گذرواژه پیشین</span>
                            <input type="text">
                            <span>گذرواژه جدید</span>
                            <input type="text">
                            <span>تکرار گذرواژه جدید</span>
                            <input type="text">
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<?php get_footer();?>
