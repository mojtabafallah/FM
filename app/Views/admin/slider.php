<?php use app\controller\BannerController;
use app\controller\BrandController;
use app\controller\PostController;
use app\controller\SliderController;
use app\controller\SubsliderController;

\app\classes\Assets::css('bootstrap-rtl.min');

require_once 'Actions/SliderAction.php'

?>

<h1>مدیریت اسلایدر</h1>

<!--slider-->
<div class="col-12">
    <form action="" method="post">

        <lable for="title_slider">عنوان اسلایدر</lable>
        <input id="title_slider" name="title_slider" placeholder="عنوان اسلایدر را وارد نمایید"
               type="text">

        <lable for="image_slider">عکس اسلایدر</lable>
        <input id="image_slider" name="image_slider" placeholder="لینک عکس اسلایدر را وارد نمایید"
               type="text">

        <lable for="link_slider">لینک اسلایدر</lable>
        <input id="link_slider" name="link_slider" placeholder="عنوان اسلایدر را وارد نمایید"
               type="text">

        <input class="button-primary" name="btn_add_slider" type="submit" value="اضافه کردن">

    </form>
</div>
<div class="col12">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان اسلایدر</th>
            <th scope="col">عکس اسلایدر</th>
            <th scope="col">لینک اسلایدر</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php $sliders = SliderController::get_all_data(SliderController::$table_name) ?>
        <?php foreach ($sliders as $slider): ?>
            <tr>
                <th scope="row"><?php echo $slider->id ?></th>
                <td><?php echo $slider->title ?></td>
                <td>
                    <img width="300px" src="<?php echo $slider->image ?>" alt="">
                </td>

                <td><a href=" <?php echo $slider->link ?>"><?php echo $slider->link ?> </a></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="slider_id" value="<?php echo $slider->id ?>">
                        <input class="button-primary" type="submit" name="btn_delete_slider" value="حذف">
                        <input class="button-primary" type="submit" name="btn_edit_slider" value="ویرایش">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col-12">
    <form action="" method="post">
        <lable for="id_slider">آیدی اسلایدر</lable>
        <input id="id_slider" name="id_slider" readonly
               value="<?php if (isset($id_edit_slider)) echo $id_edit_slider ?>"
               type="text">
        <lable for="title_slider">عنوان اسلایدر</lable>
        <input id="title_slider" name="title_slider" placeholder="عنوان اسلایدر را وارد نمایید"
               value="<?php if (isset($title_edit_slider)) echo $title_edit_slider ?>" type="text">

        <lable for="image_slider">عکس اسلایدر</lable>
        <input id="image_slider" name="image_slider" placeholder="لینک عکس اسلایدر را وارد نمایید"
               value="<?php if (isset($image_edit_slider)) echo $image_edit_slider ?>" type="text">

        <lable for="link_slider">لینک اسلایدر</lable>
        <input id="link_slider" name="link_slider" placeholder="عنوان اسلایدر را وارد نمایید"
               value="<?php if (isset($link_edit_slider)) echo $link_edit_slider ?>" type="text">

        <input class="button-primary" name="btn_edit_ok_slider" type="submit" value="تایید کردن">

    </form>
</div>

<h1>مدیریت زیر اسلایدر</h1>
<!--sub-slider-->
<div class="col-12">
    <form action="" method="post">

        <lable for="title_sub_slider">عنوان زیر اسلایدر</lable>
        <input id="title_sub_slider" name="title_sub_slider" placeholder="عنوان زیر اسلایدر را وارد نمایید"
               type="text">

        <lable for="image_sub_slider">عکس زیر اسلایدر</lable>
        <input id="image_sub_slider" name="image_sub_slider" placeholder="لینک عکس زیر اسلایدر را وارد نمایید"
               type="text">
        <input class="button-primary" name="btn_add_sub_slider" type="submit" value="اضافه کردن">

    </form>
</div>
<div class="col12">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عنوان زیر اسلاید</th>
            <th scope="col">عکس زیر اسلایدر</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php $sub_sliders = SubsliderController::get_all_data(SubsliderController::$table_name) ?>
        <?php foreach ($sub_sliders as $sub_slider): ?>
            <tr>
                <th scope="row"><?php echo $sub_slider->id ?></th>
                <td><?php echo $sub_slider->title ?></td>
                <td>
                    <img width="200px" src="<?php echo $sub_slider->image ?>" alt="">
                </td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="sub_slider_id" value="<?php echo $sub_slider->id ?>">
                        <input class="button-primary" type="submit" name="btn_delete_sub_slider" value="حذف">
                        <input class="button-primary" type="submit" name="btn_edit_sub_slider" value="ویرایش">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col-12">
    <form action="" method="post">
        <lable for="id_sub_slider">آیدی اسلایدر</lable>
        <input id="id_sub_slider" name="id_sub_slider" readonly
               value="<?php if (isset($id_edit_sub_slider)) echo $id_edit_sub_slider ?>"
               type="text">

        <lable for="title_sub_slider">عنوان زیر اسلایدر</lable>
        <input id="title_sub_slider" name="title_sub_slider" placeholder="عنوان زیر اسلایدر را وارد نمایید"
               value="<?php if (isset($title_edit_sub_slider)) echo $title_edit_sub_slider ?>" type="text">

        <lable for="image_sub_slider">عکس زیر اسلایدر</lable>
        <input id="image_sub_slider" name="image_sub_slider" placeholder="لینک عکس زیر اسلایدر را وارد نمایید"
               value="<?php if (isset($image_edit_sub_slider)) echo $image_edit_sub_slider ?>" type="text">
        <input class="button-primary" name="btn_edit_ok_sub_slider" type="submit" value="تایید کردن">

    </form>
</div>

<h1>مدیریت بنرها </h1>
<!--banners-->
<div class="col-12">
    <form action="" method="post">
        <lable for="link_banner">لینک بنر</lable>
        <input id="link_banner" name="link_banner" placeholder="لینک بنر را وارد نمایید"
               type="text">

        <lable for="image_banner">عکس بنر</lable>
        <input id="image_banner" name="image_banner" placeholder="لینک عکس بنر را وارد نمایید"
               type="text">

        <lable for="position_banner"> موقعیت بنر </lable>
        <select name="position_banner" id="position_banner">
            <option value>موقعیت بنر را انتخاب کنید</option>
            <option value="1">اولین بنر (بالا سمت چپ)</option>
            <option value="2">دومین بنر (بالا سمت چپ)</option>
            <option value="3">سومین بنر (پایین پیشنهادات سمت راست)</option>
            <option value="4">چهارمین بنر (پایین پیشنهادات سمت چپ)</option>
            <option value="5">پنجمین بنر (پایین محصولات پر فروش سمت راست)</option>
            <option value="6">ششمین بنر (پایین محصولات پر فروش وسط)</option>
            <option value="7">هفتمین بنر (پایین محصولات پر فروش سمت چپ)</option>
        </select>
        <input class="button-primary" name="btn_add_banner" type="submit" value="اضافه کردن">
    </form>
</div>
<div class="col12">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">لینک بنر</th>
            <th scope="col">عکس بنر</th>
            <th scope="col">موقعیت</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php $banners = BannerController::get_all_data(BannerController::$table_name) ?>
        <?php foreach ($banners as $banner): ?>
            <tr>
                <th scope="row"><?php echo $banner->id ?></th>
                <td><?php echo $banner->link ?></td>
                <td>
                    <img width="200px" src="<?php echo $banner->image ?>" alt="">
                </td>
                <td><?php echo $banner->position ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="banner_id" value="<?php echo $banner->id ?>">
                        <input class="button-primary" type="submit" name="btn_delete_banner" value="حذف">
                        <input class="button-primary" type="submit" name="btn_edit_banner" value="ویرایش">
                    </form>
                </td>
            </tr>
        <?php endforeach;


        ?>
        </tbody>
    </table>
</div>
<div class="col-12">
    <form action="" method="post">
        <lable for="id_banner">آیدی بنر</lable>
        <input id="id_banner" name="id_banner" readonly
               value="<?php if (isset($id_edit_banner)) echo $id_edit_banner ?>"
               type="text">

        <lable for="link_banner">لینک بنر</lable>
        <input id="link_banner" name="link_banner"
               value="<?php if (isset($link_edit_banner)) echo $link_edit_banner ?>"
               type="text">

        <lable for="image_banner">عکس بنر</lable>
        <input id="image_banner" name="image_banner" placeholder="لینک عکس بنر را وارد نمایید"
               value="<?php if (isset($image_edit_banner)) echo $image_edit_banner ?>"
               type="text">

        <lable for="position_banner"> موقعیت بنر </lable>
        <select name="position_banner" id="position_banner">
            <option value>موقعیت بنر را انتخاب کنید</option>
            <option value="1" <?php if(isset($position_edit_banner))if($position_edit_banner==1) echo 'selected'?>>اولین بنر (بالا سمت چپ) </option>
            <option value="2"<?php if(isset($position_edit_banner))if($position_edit_banner==2) echo 'selected'?>>دومین بنر (بالا سمت چپ) </option>
            <option value="3"<?php if(isset($position_edit_banner))if($position_edit_banner==3) echo 'selected'?>>سومین بنر (پایین پیشنهادات سمت راست) </option>
            <option value="4"<?php if(isset($position_edit_banner))if($position_edit_banner==4) echo 'selected'?>>چهارمین بنر (پایین پیشنهادات سمت چپ) </option>
            <option value="5"<?php if(isset($position_edit_banner))if($position_edit_banner==5) echo 'selected'?>>پنجمین بنر (پایین محصولات پر فروش سمت راست) </option>
            <option value="6"<?php if(isset($position_edit_banner))if($position_edit_banner==6) echo 'selected'?>>ششمین بنر (پایین محصولات پر فروش وسط) </option>
            <option value="7"<?php if(isset($position_edit_banner))if($position_edit_banner==7) echo 'selected'?>>هفتمین بنر (پایین محصولات پر فروش سمت چپ) </option>
        </select>

        <input class="button-primary" name="btn_edit_ok_banner" type="submit" value="تایید کردن">


    </form>
</div>

<h1>مدیریت برندها </h1>
<!--brand-->
<div class="col-12">
    <form action="" method="post">
        <lable for="image_brand">عکس برند</lable>
        <input id="image_brand" name="image_brand" placeholder="لینک عکس برند را وارد نمایید"
               type="text">
        <input class="button-primary" name="btn_add_brand" type="submit" value="اضافه کردن">
    </form>
</div>
<div class="col12">
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">عکس برند</th>
            <th scope="col">عملیات</th>
        </tr>
        </thead>
        <tbody>
        <?php $brands = BrandController::get_all_data(BrandController::$table_name) ?>
        <?php foreach ($brands as $brand): ?>
            <tr>
                <th scope="row"><?php echo $brand->id ?></th>

                <td>
                    <img width="200px" src="<?php echo $brand->image ?>" alt="">
                </td>

                <td>
                    <form action="" method="post">
                        <input type="hidden" name="id_banner" value="<?php echo $brand->id ?>">
                        <input class="button-primary" type="submit" name="btn_delete_brand" value="حذف">
                        <input class="button-primary" type="submit" name="btn_edit_brand" value="ویرایش">
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
<div class="col-12">
    <form action="" method="post">
        <lable for="id_brand">آیدی برند</lable>
        <input id="id_brand" name="id_banner" readonly
               value="<?php if (isset($id_edit_brand)) echo $id_edit_brand ?>"
               type="text">


        <lable for="image_brand">عکس برند</lable>
        <input id="image_brand" name="image_brand" placeholder="لینک عکس بنر را وارد نمایید"
               value="<?php if (isset($image_edit_brand)) echo $image_edit_brand ?>"
               type="text">


        <input class="button-primary" name="btn_edit_ok_brand" type="submit" value="تایید کردن">


    </form>
</div>