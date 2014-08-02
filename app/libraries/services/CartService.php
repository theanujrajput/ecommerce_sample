<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 1/22/14
 * Time: 11:01 AM
 */
class CartService
{

    function __construct(iProductRepository $productRepo, iComboRepository $comboRepo, iCartRepository $cartRepo)
    {
        $this->productRepo = $productRepo;
        $this->comboRepo = $comboRepo;
        $this->cartRepo = $cartRepo;
    }


    /** [ADD PRODUCT IN SESSION CART]
     * accepts the product_id and quantity and adds to session cart
     * @param int $id
     * @param int $quantity
     * @param $qty_changed
     * @throws Exception
     * @internal param float|int $price
     */
    public function addProduct($id, $quantity, $qty_changed)
    {
        try {

            $custom_id = CartService::createCustomId("product", $id);
            $row_id = $this->getRowId($custom_id);

//          $id = CartService::getIdFromCustomId($custom_id);
            $product = $this->productRepo->getProduct($id, null, null, null);
            $name = $product->name;
            $price = $product->list_price; //todo:check whether this will be offer_price or list_price

            if ($row_id) {
                $this->updateItem("product", $id, $quantity, $qty_changed);
            } else {
                Cart::add(array('id' => $custom_id, 'name' => $name, 'qty' => $quantity, 'price' => $price));
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** [ADD PRODUCT IN DATABASE CART]
     * @param $id
     * @param $quantity
     * @param $qty_changed
     * @throws Exception
     */
    public function addProductToDbCart($id, $quantity, $qty_changed)
    {
        try {

            $product = $this->productRepo->getProduct($id, null, null, null);
            $price = $product->list_price; //todo:check whether this will be offer_price or list_price

            $user_id = AppUtil::getCurrentUserId();
            $item = $this->cartRepo->getItem('product', $id, $user_id);

            //item already exists in database just update it
            if (isset($item)) {
                if ($qty_changed == true) { //if the qty is changed take the changed quantity as it is
                    $new_quantity = $quantity;
                } else { //if the qty is not changed add it with existing quantity
                    $existing_quantity = $item->qty;
                    $new_quantity = $existing_quantity + $quantity;
                }
                $this->cartRepo->updateCart('product', $id, $user_id, $new_quantity, $price);

            } //item is new add it to database cart
            else {
                $this->cartRepo->addItem('product', $id, $user_id, $quantity, $price);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /**[ADD COMBO IN SESSION CART]
     * accepts the combo_id and quantity and adds to cart
     * @param int $id
     * @param int $quantity
     * @param $qty_changed
     * @throws Exception
     * @internal param float|int $price
     */
    public function addCombo($id, $quantity, $qty_changed)
    {
        try {
            $custom_id = CartService::createCustomId("combo", $id);
            $row_id = $this->getRowId($custom_id);

            $id = CartService::getIdFromCustomId($custom_id);
            $combo = $this->comboRepo->getCombo($id);
            $name = $combo->name;
            $price = $combo->combo_price;

            if ($row_id) {
                $this->updateItem("combo", $id, $quantity, $qty_changed);
            } else {
                Cart::add(array('id' => $custom_id, 'name' => $name, 'qty' => $quantity, 'price' => $price));
            }
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** [ADD COMBO IN DATABASE CART]
     * @param $id
     * @param $quantity
     * @param $qty_changed
     * @throws Exception
     */
    public function addComboToDbCart($id, $quantity, $qty_changed)
    {
        try {

            $combo = $this->comboRepo->getCombo($id);
            $price = $combo->combo_price; //todo:check whether this price is correct or not

            $user_id = AppUtil::getCurrentUserId();
            $item = $this->cartRepo->getItem('combo', $id, $user_id);

            if (isset($item)) { //item already exists in database just update it

                if ($qty_changed == true) { //if the qty is changed take the changed quantity as it is
                    $new_quantity = $quantity;
                } else { //if the qty is not changed add it with existing quantity
                    $existing_quantity = $item->qty;
                    $new_quantity = $existing_quantity + $quantity;
                }
                $this->cartRepo->updateCart('combo', $id, $user_id, $new_quantity, $price);

            } else { //item is new add it to database cart
                $this->cartRepo->addItem('combo', $id, $user_id, $quantity, $price);
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /** returns all the items present in the cart
     * @return mixed
     */
    public function getCartContents()
    {
        if (AppUtil::isUserLoggedIn()) {
            $user_id = AppUtil::getCurrentUserId();
            $result = $this->cartRepo->getCartContents($user_id);

            $cart = array();
            foreach ($result as $row) {

                $item_type = $row->item_type;
                $item_id = $row->item_id;

                if ($item_type == 'product') {
                    $product = $this->productRepo->getProductBasicInfo($item_id, null, null, null);
                    $name = $product->name;
                } else {
                    $combo = $this->comboRepo->getCombo($item_id);
                    $name = $combo->name;
                }
                $cart[] = array(
                    'id' => $item_type . '_' . $item_id,
                    'name' => $name,
                    'qty' => $row->qty,
                    'price' => $row->price,
                    'subtotal' => $row->subtotal
                );
            }
            return $cart;
        } else {
            return Cart::content();
        }

    }


    private function updateItem($item_type, $item_id, $quantity, $qty_changed)
    {
        $custom_id = CartService::createCustomId($item_type, $item_id);
        $row_id = $this->getRowId($custom_id);

        if ($qty_changed == true) {
            $new_quantity = $quantity;
        } else {
            $cart = Cart::get($row_id);
            $existing_quantity = $cart->qty;
            $new_quantity = $existing_quantity + $quantity;
        }

        Cart::update($row_id, $new_quantity);
    }


//    public function updateItemInDbCart($id, $item_type, $quantity)
//    {
//        $user_id = AppUtil::getCurrentUserId();
//        if ($item_type == 'product') {
//            $product = $this->productRepo->getProductBasicInfo($id, null, null, null);
//            if (isset($product)) {
//                $price = $product->list_price; //todo:check whether this price is list price or offer price
//                $this->cartRepo->updateCart($item_type, $id, $user_id, $quantity, $price);
//            }
//        } else if ($item_type == 'combo') {
//            $combo = $this->comboRepo->getCombo($id);
//            if (isset($combo)) {
//                $price = $combo->combo_price; //todo:check whether this price should be combo price or the price in combo_products table will be used
//                $this->cartRepo->updateCart($item_type, $id, $user_id, $quantity, $price);
//            }
//        }
//    }

    public function removeItem($id, $item_type)
    {
        $custom_id = CartService::createCustomId($item_type, $id);
        $row_id = $this->getRowId($custom_id);
        if ($row_id) {
            Cart::remove($row_id);
            return true;
        } else {
            return false;
        }
    }

    public function removeItemFromDbCart($id, $item_type)
    {
        $user_id = AppUtil::getCurrentUserId();
        $this->cartRepo->removeItem($item_type, $id, $user_id);
    }


    /** returns row_id by custom_id
     * @param string $custom_id
     * @return null
     */
    public function getRowId($custom_id)
    {
        $result = Cart::search(array("id" => $custom_id));
        $row_id = $result ? $result[0] : null;
        return $row_id;
    }

    /** returns the total price
     * @return mixed
     */
    public function getTotalPrice()
    {
        if (AppUtil::isUserLoggedIn()) {
            $user_id = AppUtil::getCurrentUserId();
            return $this->cartRepo->getTotalPrice($user_id);
        } else {
            return Cart::total();
        }
    }

    /** return the total items in the session cart
     * @return mixed
     */
    public function getTotalItems()
    {
        if (AppUtil::isUserLoggedIn()) {

            $user_id = AppUtil::getCurrentUserId();
            return $this->cartRepo->getTotalItems($user_id);

        } else {
            return Cart::count();
        }
    }

    public static function createCustomId($name, $id)
    {
        return $name . "_" . $id;
    }

    public static function getIdFromCustomId($custom_id)
    {
        $array = explode("_", $custom_id);
        return $array[1];
    }

    public function getCartItemsRowsHtml()
    {
        $total_price = self::getTotalPrice();


        if (AppUtil::isUserLoggedIn()) {
            $user_id = AppUtil::getCurrentUserId();
            $items = $this->cartRepo->getCartContents($user_id);
            $logged_in = true;
        } else {
            $logged_in = false;
            $items = Cart::content();
        }


        $total_items = sizeof($items);

        $place_order = URL::to('user/address');

        $top = "<section id= columns  class= clearfix >
               <div class= container >
            <div class= row-fluid >
                <section id= center_column  class= \"span12 content_items \"  data-total-items=" . $total_items . " >

                    <div class= \"contenttop row-fluid\" >
                        <div class= \"white-color \" style= \"background-color:#1a6be1; padding:6px;\" >
                            <button type= button  class= \"close white-color\">
                            </button>
                            <h1 id= cart_title  class= \"title_category white-color\"  style= margin-bottom:0px; >Cart</h1>
                        </div>

                        <div id= order-detail-content  class= \"table_block margin-top10 \">
                            <table id= cart_summary  class= std >
                                <thead>
                                <tr>
                                    <th class= cart_product first_item >Product</th>
                                    <th class= cart_description item  >Item</th>
                                    <th class= cart_quantity item >Qty</th>
                                    <th class= cart_total item >Price</th>
                                    <th class= sub_total item >Sub Total</th>
                                    <th class= cart_delete last_item >&nbsp;</th>
                                </tr>
                                </thead>

                                <tbody class= cart_items >";

        $bottom = "</tbody>
                            </table>

                             <div class= \"clearfix row-fluid\"  id= customer_cart_total >
                                <div class=\" span12 pull-right\" >
                                    <table class= std >
                                        <tfoot>
                                          <tr class= cart_total_price >
                                            <td colspan= 5  id= cart_voucher  class= cart_voucher  width= 70% >
                                                <form
                                                    action=
                                                    method= post  id= voucher >
                                                    <fieldset>
                                                        <p></p>

                                                        <h3>GIFT/LOYALITY/DISCOUNT COUPON</h3>

                                                        <p></p>

                                                        <p><label for= discount_name >Enter your coupon code if you have
                                                                one.</label></p>

                                                        <p class= \"discount_name_block \" >
                                                            <input type= text  class= \"discount_name margin-bottom0\"
                                                                   id= discount_name  name= discount_name  value=  >

                                                            <input type= hidden  name= submitDiscount ><input
                                                                type= submit  name= submitAddDiscount  value= OK
                                                                class= button ></p>
                                                    </fieldset>
                                                </form>
                                            </td>
                                            <td colspan= 2>
                                                <h3 class=display-inline-block >Amount Payable
                                                    <span id=total_price ><span class= WebRupee
                                                                                 style= \"display:inline-block; padding-left:6px;\" >Rs.</span>" . $total_price . "</span>
                                                </h3>
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <div style= display:inline-block >
                                        <h3 style= display:inline-block; >Need Help? </h3>

                                        <p style= display:inline-block; ><i class= icon-phone ></i>1800-180-1998 or <a
                                                href= # >Contact us</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <p class= cart_navigation ><a href=" . $place_order . " class= \"exclusive standard-checkout \"
                                                      title= Next >Place Order »</a>
                            <a class= button_large
                               title= Continue shopping >« Continue shopping</a>
                        </p>

                    </div>
                </section>
            </div>
          </div>
        </section>";

        $inner = $this->getCartItemsInnerHtml($items, $logged_in);
        return $top . $inner . $bottom;

    }

    private function getCartItemsInnerHtml($items, $logged_in)
    {
        $inner_html = "";

        foreach ($items as $item) {

            if ($logged_in == true) {
                $item_id = $item->id;
                $item_type = $item->item_type;
            } else {
                $custom_id = $item->id;
                $item_type_array = explode('_', $custom_id);
                $item_type = $item_type_array[0];
                $item_id = $item_type_array[1];
            }

            if ($item_type == "product") {

                $product_id = $item_id;
                $product = $this->productRepo->getProduct($product_id, null, null, null);
                $images = $product->images;
                $image = HtmlUtil::getPrimaryImage($images);
                $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;


                $inner_html = $inner_html . "<tr class= \"cart_item first_item address_0 odd \">
            <td class= cart_product >
                <a href= # ><img src= " . URL::to($path) . "  width= 80  height= 80 ></a>
            </td>
            <td class= cart_description >
                <p class= s_title_block ><a href= # >" . $product->name . "</a></p>
            </td>
            <td class= cart_quantity >
                <div class= cart_quantity_button >
                    <a rel= nofollow  class=\" qty_btn cart_quantity_up \" id= cart_quantity_up data-id=" . $product_id . "  href= #  title= Add >
                        <img src=" . asset('frontoffice/themes/leometr/img/icon/quantity_up.gif') . "  width= 14  height= 9 >
                    </a><br>
                    <a rel= nofollow  class=\" qty_btn cart_quantity_down \" id= cart_quantity_down data-id=" . $product_id . " href= #  title= Subtract >
                        <img src=" . asset('frontoffice/themes/leometr/img/icon/quantity_down.gif') . "  alt= Subtract  width= 14  height= 9 >
                    </a>
                </div>
                <input type= hidden  value= 65  name= quantity_4_0_0_0_hidden >
                <input type= text  size= 2  autocomplete= off  class= cart_quantity_input id= cart_quantity_input_" . $product_id . "  value= " . $item->qty . ">
                <a class=\"save_new_qty\" data-item-type=product data-id=" . $product_id . ">Save</a>

            </td>
            <td class= cart_total >
		        <span class= price-black  id= total_product_price_4_0_0 >
				<span class= WebRupee > Rs. </span>" . $item->price . "</span>
            </td>

            <td class= cart_total >
		        <span class= price-black  id= total_product_price_4_0_0 >
				<span class= WebRupee > Rs. </span>" . $item->subtotal . "</span>
            </td>

            <td class= cart_delete >
                <div>
                    <a href=" . URL::to('cart/remove-item/product/' . $product_id) . " class= cart_quantity_delete>x</a>
                </div>
            </td>
        </tr>";
            }

        }

        return $inner_html;
    }

}
