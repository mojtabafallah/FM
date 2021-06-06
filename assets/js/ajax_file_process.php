<?php
if (isset($_POST['product_id']))
{
    include "../../../../../wp-load.php";
//    $user_id= get_current_user_id();
    $havemeta = get_user_meta($_POST['user_id'], 'favorites', false);
   if (!empty( $havemeta))
   {
       if (in_array($_POST['product_id'], $havemeta) )
       {
           delete_user_meta($_POST['user_id'],'favorites',$_POST['product_id']);
           echo "<i id='heart' class='fas fa-heart' style='color: grey'></i>";
       }else
       {
           add_user_meta($_POST['user_id'],'favorites',$_POST['product_id']);
           echo "<i id='heart' class='fas fa-heart' style='color: red'></i>";
       }
   }else
   {
       add_user_meta($_POST['user_id'],'favorites',$_POST['product_id']);
       echo "<i id='heart' class='fas fa-heart' style='color: red'></i>";
   }



}
if (isset($_POST['add_to_cart']))
{
   
    include "../../../../../wp-load.php";
    global $woocommerce;

    $product_id = $_POST['add_to_cart'];

    $found = false;

    //check if product already in cart
    if ( sizeof( WC()->cart->get_cart() ) > 0 ) {
        foreach ( WC()->cart->get_cart() as $cart_item_key => $values ) {
            $_product = $values['data'];
            if ( $_product->id == $product_id )
                $found = true;
        }
        // if product not found, add it
        if ( ! $found )
            WC()->cart->add_to_cart( $product_id );
    } else {
        // if no products in cart, add it
        WC()->cart->add_to_cart( $product_id );
    }



    echo " <i id='add-check' class='far fa-check-circle'></i> به سبد خرید اضافه شد";
}