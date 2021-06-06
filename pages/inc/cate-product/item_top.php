<div class="container main_container">
    <div class="col-12">
        <div class="supplement_sections">
            <?php
            $id_term = get_queried_object()->term_id;

            $arr1 = [];
            $name1 = get_term_meta($id_term, 'name_item_top1', true);
            $image1 = get_term_meta($id_term, 'image_product1', true);
            $link1 = get_term_meta($id_term, 'link_item_top1', true);
            $arr1[] = $name1;
            $arr1[] = $image1;
            $arr1[] = $link1;


            $arr2 = [];
            $name2 = get_term_meta($id_term, 'name_item_top2', true);
            $image2 = get_term_meta($id_term, 'image_product2', true);
            $link2 = get_term_meta($id_term, 'link_item_top2', true);
            $arr2[] = $name2;
            $arr2[] = $image2;
            $arr2[] = $link2;

            $arr3 = [];
            $name3 = get_term_meta($id_term, 'name_item_top3', true);
            $image3 = get_term_meta($id_term, 'image_product3', true);
            $link3 = get_term_meta($id_term, 'link_item_top3', true);
            $arr3[] = $name3;
            $arr3[] = $image3;
            $arr3[] = $link3;

            $arr4 = [];
            $name4 = get_term_meta($id_term, 'name_item_top4', true);
            $image4 = get_term_meta($id_term, 'image_product4', true);
            $link4 = get_term_meta($id_term, 'link_item_top4', true);
            $arr4[] = $name4;
            $arr4[] = $image4;
            $arr4[] = $link4;

            $arr5 = [];
            $name5 = get_term_meta($id_term, 'name_item_top5', true);
            $image5 = get_term_meta($id_term, 'image_product5', true);
            $link5 = get_term_meta($id_term, 'link_item_top5', true);
            $arr5[] = $name5;
            $arr5[] = $image5;
            $arr5[] = $link5;

            $arr6 = [];
            $name6 = get_term_meta($id_term, 'name_item_top6', true);
            $image6 = get_term_meta($id_term, 'image_product6', true);
            $link6 = get_term_meta($id_term, 'link_item_top6', true);
            $arr6[] = $name6;
            $arr6[] = $image6;
            $arr6[] = $link6;

            $arr7 = [];
            $name7 = get_term_meta($id_term, 'name_item_top7', true);
            $image7 = get_term_meta($id_term, 'image_product7', true);
            $link7 = get_term_meta($id_term, 'link_item_top7', true);
            $arr7[] = $name7;
            $arr7[] = $image7;
            $arr7[] = $link7;

            $arr8 = [];
            $name8 = get_term_meta($id_term, 'name_item_top8', true);
            $image8 = get_term_meta($id_term, 'image_product8', true);
            $link8 = get_term_meta($id_term, 'link_item_top8', true);
            $arr8[] = $name8;
            $arr8[] = $image8;
            $arr8[] = $link8;

            $arr_all[] = $arr1;
            $arr_all[] = $arr2;
            $arr_all[] = $arr3;
            $arr_all[] = $arr4;
            $arr_all[] = $arr5;
            $arr_all[] = $arr6;
            $arr_all[] = $arr7;
            $arr_all[] = $arr8;


            ?>
            <?php
            foreach ($arr_all as $item):
                ?>
                <a href="<?php echo $item[2] ?>">
                    <div class="supplemt">
                        <img src="<?php echo $item[1] ?>" alt="">
                        <span><?php echo $item[0] ?></span>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<!-- end of the suplement section -->