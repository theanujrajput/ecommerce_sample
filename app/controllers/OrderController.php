<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/8/14
 * Time: 11:22 AM
 */
class OrderController extends BaseController
{
    function __construct(ProductService $productService, OrderService $orderService,
                         CartService $cartService, ComboService $comboService, UserService $userService)
    {
        $this->productService = $productService;
        $this->orderService = $orderService;
        $this->cartService = $cartService;
        $this->comboService = $comboService;
        $this->userService = $userService;
        $this->beforeFilter('auth_user');

    }

    public function getIndex()
    {
        $data['items'] = $this->cartService->getCartContents();
        $data['total_price'] = $this->cartService->getTotalPrice();
        $user_id = AppUtil::getCurrentUserId();
        $data['user'] = $this->userService->getUser($user_id, null, null);
        return View::make('frontoffice.user.order_summary', $data);
    }


    //todo:check how will be item notes be created
    public function getCreateOrder()
    {
        try {

            //Auth::loginUsingId(1);
            $items_array = array();

            $user_id = AppUtil::getCurrentUserId();
            $net_value = $this->cartService->getTotalPrice();
            $final_value = $net_value; //todo:check whether net value and final value will be same
            $order_notes = null; //todo:check how will order notes be created

            $cart_items = $this->cartService->getCartContents();

            //if the cart is empty return user back
            if ($this->cartService->getTotalItems() == 0) {
                return "Cart is empty";
            }

            foreach ($cart_items as $item) {

                $custom_id = $item->id;
                $array = explode("_", $custom_id);
                $item_type = $array[0];
                $id = $array[1];

                if ($item_type == "product") {

                    $product = $this->productService->getProduct($id, null, null, null);
                    $data = array(
                        'product_id' => $id,
                        'product_type' => 'product',
                        'offer_price' => $product->list_price, //todo:change this list price to offer price
                        'list_price' => $product->list_price,
                        'qty' => $item->qty
                    );
                    $items_array[] = $data;

                } elseif ($item_type == "combo") {


                    $combo = $this->comboService->getCombo($id);
                    $data = array(
                        'product_id' => $id,
                        'product_type' => 'combo',
                        'offer_price' => $combo->combo_price,
                        'list_price' => null,
                        'qty' => $item->qty
                    );
                    $items_array[] = $data;
                }
            }

            $order = $this->orderService->createOrder($user_id, $net_value, $final_value, $order_notes, $items_array);

            if ($order) {
                Event::fire("order.success", array('order' => $order));
                $this->cartService->destroy();
                echo "Order has been created successfully";
            } else {
                Event::fire("order.fail", array());
                echo "Error while creating order";
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    public function getTest()
    {
        dd('test');
    }


}