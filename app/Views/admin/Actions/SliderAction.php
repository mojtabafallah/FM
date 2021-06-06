<?php

use app\controller\BannerController;
use app\controller\BrandController;
use app\controller\PostController;
use app\controller\SliderController;
use app\controller\SubsliderController;

if (isset($_POST['btn_add_slider']))
{
    $data = array(
        'title' => $_POST['title_slider'],
        'link' => $_POST['link_slider'],
        'image' => $_POST['image_slider'],
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::add($_POST['btn_add_slider'], $data, SliderController::class);
}
if (isset($_POST['btn_delete_slider']))
{
    PostController::delete($_POST['btn_delete_slider'], SliderController::class, $_POST['slider_id']);
}
if (isset($_POST['btn_edit_slider'])) {
    $slider = SliderController::get_one_data(SliderController::$table_name, $_POST['slider_id'], 'id');
    $id_edit_slider = $slider->id;
    $title_edit_slider = $slider->title;
    $image_edit_slider = $slider->image;
    $link_edit_slider = $slider->link;
}
if (isset($_POST['btn_edit_ok_slider']))
{
    $data = array(
        'title' => $_POST['title_slider'],
        'link' => $_POST['link_slider'],
        'image' => $_POST['image_slider'],
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::edit($_POST['btn_edit_ok_slider'], $data, 'id', $_POST['id_slider'], SliderController::class);
}

/************/
if (isset($_POST['btn_add_sub_slider']))
{
    $data = array(
        'title' => $_POST['title_sub_slider'],
        'image' => $_POST['image_sub_slider'],
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::add($_POST['btn_add_sub_slider'], $data, SubsliderController::class);
}
if (isset($_POST['btn_delete_sub_slider']))
{
    PostController::delete($_POST['btn_delete_sub_slider'], SubsliderController::class, $_POST['sub_slider_id']);
}
if (isset($_POST['btn_edit_sub_slider'])) {

    $sub_slider = SubsliderController::get_one_data(SubsliderController::$table_name, $_POST['sub_slider_id'], 'id');

    $id_edit_sub_slider = $sub_slider->id;
    $title_edit_sub_slider = $sub_slider->title;
    $image_edit_sub_slider = $sub_slider->image;
    $link_edit_sub_slider = $sub_slider->link;

}
if (isset($_POST['btn_edit_ok_sub_slider']))
{
    $data = array(
        'title' => $_POST['title_sub_slider'],
        'image' => $_POST['image_sub_slider'],
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::edit($_POST['btn_edit_ok_sub_slider'], $data, 'id', $_POST['id_sub_slider'], SubsliderController::class);
}

/**************/
if(isset($_POST['btn_add_banner']))
{
    $data = array(
        'link' => $_POST['link_banner'],
        'image' => $_POST['image_banner'],
        'position'=>$_POST['position_banner'],
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::add($_POST['btn_add_banner'],$data,BannerController::class);
}
if (isset($_POST['btn_delete_banner']))
{
    PostController::delete($_POST['btn_delete_banner'], BannerController::class, $_POST['banner_id']);
}
if (isset($_POST['btn_edit_banner'])) {

    $banner = BannerController::get_one_data(BannerController::$table_name, $_POST['banner_id'], 'id');

    $id_edit_banner = $banner->id;
    $link_edit_banner = $banner->link;
    $image_edit_banner = $banner->image;
    $position_edit_banner = $banner->position;

}
if (isset($_POST['btn_edit_ok_banner']))
{
    $data = array(
        'link' => $_POST['link_banner'],
        'image' => $_POST['image_banner'],
        'position' => $_POST['position_banner'],
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::edit($_POST['btn_edit_ok_banner'], $data, 'id', $_POST['id_banner'], BannerController::class);
}

/**************/
if(isset($_POST['btn_add_brand']))
{
    $data = array(
        'image' => $_POST['image_brand'],
        'created_at' => date("Y-m-d H:i:s"),
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::add($_POST['btn_add_brand'],$data,BrandController::class);
}
if (isset($_POST['btn_delete_brand']))
{
    PostController::delete($_POST['btn_delete_brand'], BrandController::class, $_POST['brand_id']);
}
if (isset($_POST['btn_edit_brand'])) {

    $brand = BrandController::get_one_data(BrandController::$table_name, $_POST['id_banner'], 'id');

    $id_edit_brand = $brand->id;
    $image_edit_brand = $brand->image;

}
if (isset($_POST['btn_edit_ok_brand']))
{
    $data = array(
        'image' => $_POST['image_brand'],
        'updated_at' => date("Y-m-d H:i:s"),
    );
    PostController::edit($_POST['btn_edit_ok_brand'], $data, 'id', $_POST['id_banner'], BrandController::class);
}