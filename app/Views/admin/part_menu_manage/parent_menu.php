<h2>
    تنظیمات منو
</h2>
<?php

use app\controller\MenuController;

$menus = MenuController::get_all_menu();

?>

<table style="border: 1px solid">
    <thead>
    <tr>
        <th>
            شماره
        </th>
        <th>
            عنوان
        </th>
        <th>
           نام منو اصلی
        </th>
        <th>
            لینک
        </th>
        <th>
            مگا منو
        </th>

        <th>
            عملیات
        </th>
    </tr>
    <thead>
    <?php
    foreach ($menus

    as $menu): ?>



    <tbody>
    <form action="" method="post">
        <tr>
            <td><?php echo $menu->id ?></td>
            <td><?php echo $menu->title ?>
                <input class="edit_menu" type="text" name="title" value="<?php echo $menu->title ?>" id="title">
            </td>
            <td><?php echo $menu->parent ?>
                <select class="edit_menu" name="parent" id="parent">
                    <?php
                    $parents = MenuController::get_all_parent(); ?>
                    <option value="0"<?php if ($menu->parent == 0) echo 'selected' ?>>خود والد باشد</option>
                    <?php foreach ($parents as $parent): ?>
                        <option value="<?php echo $parent->id ?>" <?php if ($menu->parent == $parent->id) echo 'selected' ?>><?php echo $parent->title ?> </option>
                    <?php endforeach; ?>
                </select>
            </td>
            <td><?php echo '<a href=' . $menu->link . '>' . $menu->link . '</a>' ?>
                <input class="edit_menu" type="text" name="link" value="<?php echo $menu->link ?>" id="link">
            </td>
            <td><?php echo $menu->mega ?>
                <input class="edit_menu" type="checkbox" name="mega" id="mega" <?php if ($menu->mega) echo 'checked' ?>>
            </td>
            <td><img src="<?php echo $menu->image_mega ?>" alt="">
                <input type="text" class="edit_menu" name="image_mega" id="image_mega"
                       value="<?php echo $menu->image_mega ?>">
            </td>
            <td>

                <input type="hidden" name="id" value="<?php echo $menu->id ?>">
                <input name="delete_menu" type="submit" value="حذف">
                <input class="edit_menu" name="edit_menu" type="submit" value="اعمال تغییرات">

            </td>
        </tr>
    </form>
    </tbody>

    <?php endforeach; ?>
</table>
<div>
    <form action="" method="POST">
        <label for="title">عنوان منو
        </label>
        <input type="text" name="title" id="title">

        <label for="link">لینک منو
        </label>
        <input type="text" name="link" id="link">

        <label for="parent">منو والد
        </label>
        <select name="parent" id="parent">
            <?php
            $parents = MenuController::get_all_parent(); ?>
            <option value="0">خود والد باشد</option>
            <?php foreach ($parents as $parent): ?>
                <option value="<?php echo $parent->id ?>"><?php echo $parent->title ?></option>
            <?php endforeach; ?>
        </select>

        <label for="mega">مگا منو
        </label>
        <input type="checkbox" name="mega" id="mega">
        <a href="#" id="insert_image">open</a>
        <label for="image_mega">عکس مگا منو
        </label>
        <input type="text" name="image_mega" id="image_mega">

        <input name="add_parent_menu" type="submit" value="اضافه کردن">
        <a href="#" id="edit_menu">ویرایش</a>
    </form>
</div>


<script>
    jQuery(function ($) {
        $(document).ready(function () {
            $('#insert_image').click(function () {
                var gallery_window = wp.media({});
                gallery_window.open();
            });
            $('#edit_menu').click(function () {
                var element = document.getElementsByClassName("edit_menu");
                $(element).removeClass("edit_menu")
            });
        });
    });

    function close_edit() {
        var element = document.getElementsByClassName("edit_menu");
        $(element).addClass("edit_menu")

    }

</script>