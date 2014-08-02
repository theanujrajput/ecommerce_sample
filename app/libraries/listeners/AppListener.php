<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/10/14
 * Time: 4:44 PM
 */

Event::listen("order.success", function ($data) {
    return false;
});

Event::listen("order.fail", function ($data) {
    return false;
});


Event::listen('user.register', function ($data) {

});

Event::listen('user.forgot_password', function ($password, $email, $user_id) {

    $data = array(
        'password' => $password,
        'email' => $email,
        'user_id' => $user_id
    );

    Mail::send('emails.forgotpassword', $data, function ($mail) use ($data) {

        $mail->to($data['email'])->subject('Your password has been changed successfully');

    });

});


//fires the event as soon as the user is logged in
Event::listen("user.logged_in", function () {

    //transfer the session cart items to database cart
    $user_id = AppUtil::getCurrentUserId();
    $items = Cart::content();
    if (sizeof($items) != 0) {
        foreach ($items as $item) {
            $custom_id = $item->id;
            $item_type_array = explode('_', $custom_id);

            $item_type = $item_type_array[0];
            $id = $item_type_array[1];
            $qty = $item->qty;

            $cartRepo = new EloquentCartRepository();

            if ($item_type == 'product') {

                $productRepo = new EloquentProductRepository();
                $product = $productRepo->getProductBasicInfo($id, null, null, null);
                $price = $product->list_price; //todo:check whether this price is list price or offer price

                $item = $cartRepo->getItem('product', $id, $user_id);

                if (isset($item)) { //item already exists in database just update it

                    $existing_qty = $item->qty;
                    $new_qty = $existing_qty + $qty;
                    $cartRepo->updateCart('product', $id, $user_id, $user_id, $new_qty, $price);

                } else { //create a new cart item
                    $cartRepo->addItem('product', $id, $user_id, $qty, $price);
                }

            } else {

                $comboRepo = new EloquentComboRepository();
                $combo = $comboRepo->getCombo($id);
                $price = $combo->combo_price;

                $item = $this->cartRepo->getItem('combo', $id, $user_id);
                $cartRepo = new EloquentCartRepository();
                if (isset($item)) { //item already exists in database just update it

                    $existing_qty = $item->qty;
                    $new_qty = $existing_qty + $qty;
                    $cartRepo->updateCart('combo', $id, $user_id, $user_id, $new_qty, $price);

                } else { //create a new cart item
                    $cartRepo->addItem('combo', $id, $user_id, $qty, $price);
                }
            }
        }
    }
    Cart::destroy(); //empty the whole session cart

});