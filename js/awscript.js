jQuery(function($){
    $('body').on('click', '.aw_upload_image_button', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس ویژه',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,
                    type : 'image'
                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#aw_custom_image').val(attachment.url);
            })
                .open();
    });
});


jQuery(function($){
    $('body').on('click', '#btn_upload_category1', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product1').val(attachment.url);
            })
                .open();
    });
});

jQuery(function($){
    $('body').on('click', '#btn_upload_category2', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product2').val(attachment.url);
            })
                .open();
    });
});

jQuery(function($){
    $('body').on('click', '#btn_upload_category3', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product3').val(attachment.url);
            })
                .open();
    });
});


jQuery(function($){
    $('body').on('click', '#btn_upload_category4', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product4').val(attachment.url);
            })
                .open();
    });
});


jQuery(function($){
    $('body').on('click', '#btn_upload_category5', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product5').val(attachment.url);
            })
                .open();
    });
});


jQuery(function($){
    $('body').on('click', '#btn_upload_category6', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product6').val(attachment.url);
            })
                .open();
    });
});


jQuery(function($){
    $('body').on('click', '#btn_upload_category7', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product7').val(attachment.url);
            })
                .open();
    });
});


jQuery(function($){
    $('body').on('click', '#btn_upload_category8', function(e){
        e.preventDefault();

        var button = $(this),
            aw_uploader = wp.media({
                title: 'انتخاب عکس',
                library : {
                    uploadedTo : wp.media.view.settings.post.id,

                },
                button: {
                    text: 'استفاده از این عکس'
                },
                multiple: false
            }).on('select', function() {
                var attachment = aw_uploader.state().get('selection').first().toJSON();
                $('#image_product8').val(attachment.url);
            })
                .open();
    });
});