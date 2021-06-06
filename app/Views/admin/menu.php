<?php

use app\controller\MenuController;
use app\Views\Views;

if (isset($_POST['add_parent_menu'])) {
    unset($_POST['add_parent_menu']);
    MenuController::add_new_menu($_POST);
}

if (isset($_POST['delete_menu'])) {
    MenuController::delete_menu($_POST['id']);
}
if (isset($_POST['edit_menu'])) {

    unset($_POST['edit_menu']);
    MenuController::edit_menu($_POST['id'], $_POST);
}

?>
<h1>تنظیمات منو</h1>
<?php Views::render_admin('part_menu_manage/parent_menu'); ?>