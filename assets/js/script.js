jQuery(document).ready(function () {
    // jQuery(".btn-replay").click(function (event) {
    //     var id = event.target.id;
    //     var pos = id.indexOf('-');
    //     id = id.substr(pos + 1);
    //     var author = jQuery("#author-comment").text();
    //     var home = jQuery("#home-comment").text();
    //     var email = jQuery("#email-comment").text();
    //     var post = jQuery("#post-comment").text();
    //     jQuery("#main-replay").empty();
    //     jQuery("#main-replay").append('<div class="comment_section">\n' +
    //         '                    <form action="' + home + '/wp-comments-post.php" method="post">\n' +
    //         '                        <div class="col-12 col-md-6" style="padding: 0;">\n' +
    //         '                            <textarea name="comment" id="" cols="30" rows="10" placeholder="نظر شما"></textarea>\n' +
    //         '                        </div>\n' +
    //         '                        <div class="col-12 col-md-6" style="padding-left: 0;">\n' +
    //         '                            <label for="">نام و نام خانوادگی خود را بنویسید</label>\n' +
    //         '                            <input name="author" type="text" placeholder="نام"\n' +
    //         '                                   value="' + author + '">\n' +
    //         '\n' +
    //         '                            <label for="">ایمیل خود را بنویسید</label>\n' +
    //         '\n' +
    //         '                            <input name="email" type="email" placeholder="ایمیل"\n' +
    //         '                                   value="' + email + '">\n' +
    //         '                            <label for="" class="checkBoxCustom">\n' +
    //         '                                ذخیره نام و ایمیل\n' +
    //         '                            </label>\n' +
    //         '                            <input type="checkbox">\n' +
    //         '\n' +
    //         '                            <button name="submit" type="submit">ارسال نظر</button>\n' +
    //         '                        </div>\n' +
    //         '\n' +
    //         '                        <input type="hidden" name="comment_post_ID" value="' + post + '"\n' +
    //         '                               id="comment_post_ID">\n' +
    //         '                        <input type="hidden" name="comment_parent" id="comment_parent" value="' + id + '">\n' +
    //         '                    </form>\n' +
    //         '                </div>')
    // });

    jQuery("#favorite").click(function () {

        var user_id = jQuery('#user_id').text();
        var product_id = jQuery('#product_id').text();
        var data = new FormData();
        data.append('user_id', user_id);
        data.append('product_id', product_id);
        var xhr = new XMLHttpRequest();
        xhr.open('POST', ' http://localhost:81/fm/wp-content/themes/FardaMarket/assets/js/ajax_file_process.php', true);
        xhr.onload = function () {
            // do something to response
            jQuery("#favorite").html(this.responseText);

        };
        xhr.send(data);

    });

    jQuery("#add_to_cart").click(function () {

        var product_id = jQuery('#product_id').text();
        var data = new FormData();
        data.append('add_to_cart', product_id);

        var xhr = new XMLHttpRequest();
        xhr.open('POST', ' http://localhost:81/fm/wp-content/themes/FardaMarket/assets/js/ajax_file_process.php', true);
        xhr.onload = function () {
            // do something to response
            jQuery("#added_to_cart").html(this.responseText);

        };
        xhr.send(data);

    });

    jQuery(".small_image_product").click(function () {


        jQuery(".image_main_product").attr("src", this.src);

        jQuery(".small_image_product").removeClass('active');
        jQuery(this).addClass('active');

    });
    jQuery(".ui-tabs-anchor").click(function () {

        jQuery(".ui-tabs-panel").hide();
        var id = jQuery(this).closest('li').attr('id');
        var c = jQuery(this).closest('li').attr('class');




        jQuery('.ui-tabs-tab').removeClass('ui-tabs-active ui-state-active');


        jQuery("#" + id).toggleClass('ui-tabs-active ui-state-active');

        id = id.replace('-title', '');
        var dd = "#" + id;
        jQuery(dd).show();
    });
});