<?php use app\classes\Assets; ?>
<footer>
    <div class="container main_container">
        <div class="service_features">
            <div class="service_section">
                <div class="col-sm-6 col-md-3 service_features_info">
                    <img src="<?php echo Assets::image('Group 16436.png'); ?>" alt="">
                    <span>مشاوره و پشتیبان</span>
                </div>
                <div class="col-sm-6 col-md-3 service_features_info">
                    <img src="<?php echo Assets::image('Group 16438.png'); ?>" alt="">
                    <span>خرید مطمئن و با کیفیت</span>
                </div>
                <div class="col-sm-6 col-md-3 service_features_info">
                    <img src="<?php echo Assets::image('Group 16439.png'); ?>" alt="">
                    <span>تضمین اصالت کالا</span>
                </div>
                <div class="col-sm-6 col-md-3 service_features_info">
                    <img src="<?php echo Assets::image('Group 16440.png'); ?>" alt="">
                    <span>ارسال سریع به سراسر ایران</span>
                </div>
            </div>
        </div>
        <div class="farda_footer">
            <div class="footer_section">
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 newest_article">
                    <h2>جدید ترین مطالب و مقالات فردا مارکت</h2>
                    <div class="article_section">
                        <?php
                         $args=array(
                           'post_type'=>'post',
                           'order_by'=>'date',
                             'posts_per_page' => 3
                         );
                         $new_post=new WP_Query($args);
                         if ($new_post->have_posts()):?>
                         <?php while ($new_post->have_posts()): $new_post->the_post();?>
                                 <a href="<?php the_permalink();?>">
                                     <div class="article">
                                         <img src="<?php the_post_thumbnail_url(); ?>" alt="">
                                         <figure>
                                             <h3><?php the_title()?></h3>
                                             <p><?php the_excerpt();?></p>
                                             <span>بیشتر  بخوانید</span>
                                         </figure>
                                     </div>
                                 </a>
                                 <?php endwhile;?>
                        <?php endif;?>

                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-4 instegram_section">
                    <h2>اینستگرام فردا مارکت</h2>
                    <div class="instegram_images">
                        <a href="#">
                            <div class="col-6 col-md-3 instegram_img">
                                <img src="<?php echo Assets::image('instegram_sample_img.png'); ?>" alt="">
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-6 col-md-3 instegram_icon">
                                <img src="<?php echo Assets::image('instegram_img.png'); ?>" alt="">
                                <span>Join Us</span>
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-6 col-md-3 instegram_img">
                                <img src="<?php echo Assets::image('instegram_sample_img.png'); ?>" alt="">
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-6 col-md-3 instegram_img">
                                <img src="<?php echo Assets::image('instegram_sample_img.png'); ?>" alt="">
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-6 col-md-3 instegram_img">
                                <img src="<?php echo Assets::image('instegram_sample_img.png'); ?>" alt="">
                            </div>
                        </a>
                        <a href="#">
                            <div class="col-6 col-md-3 instegram_img">
                                <img src="<?php echo Assets::image('instegram_sample_img.png'); ?>" alt="">
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-lg-12 col-xl-4 newsletter_section">
                    <h2>از تخفیف‌ها و جدیدترین‌های فردامارکت باخبر شوید:</h2>
                    <div class="newsletter_form">
                        <form action="#">
                            <input type="text" placeholder="شماره موبایل یا ایمیل خود را وارد کنید ...">
                            <button type="submit"></button>
                        </form>
                    </div>
                    <div class="farda_socialmedia_section">
                        <h4>شبکه های اجتماعی فردا مارکت :</h4>
                        <div class="social_media_icon">
                            <ul>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-telegram"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="farda_pharmecy">
                <h2>فروشگاه و داروخانه انلاین فردا مارکت</h2>
                <p>
                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحـان گرافیک است،
                    چاپگرها و متـون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد
                    نیاز، و کاربردهای متنـوع با پیشرو در زبان فارسی ایجاد کرد،
                    در این صورت می توان امــید داشت که تــمام و دشواری موجود در ارائه راهکارها، و شرایط سخــت تایپ به
                    پایان رسد و زمان مورد نیاز شامل حروفـــچینی دستـاوردهای اصلی، و جوابگوی سوالات پیوســـته اهل دنیای
                    موجود طراحی اساسا مورد استفاده
                    قرار گیرد.
                </p>
            </div>
            <div class="col-12 col-sm-12 col-md-6 farda_footer_bottom">
                <img src="img/Group 16541@2x.png" alt="">
                <div class="farda_footer_bottom_info">
                    <span>هفت روز هفته ، ۲۴ ساعت شبانه‌روز پاسخگوی شما هستیم  </span>
                    <span>شماره تماس : ۶۱5۰۰۰۰ - ۰۲۱</span>
                    <span class="email_custom">Fardamarket@gmail.com</span>
                </div>

            </div>
            <div class="col-sm-12 col-md-6 farda_footer_nemad">
                <img src="img/zarinPal.png" alt="">
                <img src="img/logo.png" alt="">
                <img src="img/logo (1).png" alt="">
            </div>
        </div>
    </div>
</footer>
</div>
</body>
<script src="<?php echo Assets::js('jquery.min.js'); ?> "></script>
<script src="<?php echo Assets::js('popper.min.js'); ?>"></script>
<script src="<?php echo Assets::js('bootstrap.min.js'); ?> "></script>
<script src="<?php echo Assets::js('swiper_bundle.js'); ?>"></script>
<script src="<?php echo Assets::js('theia-sticky-sidebar.js'); ?>"></script>

<script src="<?php echo Assets::js('flickity.pkgd.min.js'); ?>"></script>
<script src="<?php echo Assets::js('jquery-ui.js'); ?>"></script>
<script src="<?php echo Assets::js('jquery.dd.min.js'); ?>"></script>
<script src="<?php echo Assets::js('myfunction.js'); ?>"></script>
<script src="<?php echo Assets::js('simple-scrollbar.min.js'); ?>"></script>
<script src="<?php echo Assets::js('script.js'); ?>"></script>




<script type="text/javascript">

        $('#search_input').keyup(function () {
            var data=  $('#search_input').val();

            $.ajax({
                type: 'post',
                url: ' http://localhost:81/fm/wp-content/themes/fardamarket/app/controller/getdata.php',
                data: {name_model: data},
                success: function (response) {
                    $('.search_result').css("visibility","unset")
                        .css("opacity","100");

                    $('#search_result_info')
                        .empty()
                        .append(response);
                }
            });

        });
        $('body').click(function () {

            $('.search_result').css("visibility","hidden")
                .css("opacity","0");
        });
</script>

<?php wp_footer(); ?>
</html>