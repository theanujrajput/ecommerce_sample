<?php

/**
 * Created by PhpStorm.
 * User: anuj
 * Date: 2/8/14
 * Time: 4:25 PM
 */
class CartController extends BaseController
{
    function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /** return the cart summary view
     * @return \Illuminate\View\View
     * @throws Exception
     */
    public function getIndex()
    {
        try {
            $data['items'] = $this->cartService->getCartContents();
            $data['total_price'] = $this->cartService->getTotalPrice();
            return View::make('frontoffice.cart_summary', $data);
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }

    }

    /** returns the html of cart items for cart modal view
     * @return string
     */
    public function getCartItems()
    {
        return $this->cartService->getCartItemsRowsHtml();
    }

    /**
     * @param $item_type
     * @param $item_id
     * @param $qty
     * @return string
     * @throws Exception
     */
    public function getAddItem($item_type, $item_id, $qty)
    {
        try {
            $qty_changed = Input::get('qty_changed'); //checks whether qty is changed or new product is added
            $qty_changed = isset($qty_changed) ? true : false;

            if (AppUtil::isUserLoggedIn()) { //if the user is logged in item is added to db cart
                if ($item_type == "product") {
                    $this->cartService->addProductToDbCart($item_id, $qty, $qty_changed);
                    return 'true';
                } else if ($item_type == "combo") {
                    $this->cartService->addComboToDbCart($item_id, $qty, $qty_changed);
                    return 'true';
                }
            } else { //else the item is added to session cart
                if ($item_type == 'product') {
                    $this->cartService->addProduct($item_id, $qty, $qty_changed);
                    return 'true';
                } else if ($item_type == "combo") {
                    $this->cartService->addCombo($item_id, $qty, $qty_changed);
                    return 'true';
                }
            }

        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

    /**removes items from cart [used in order page and cart summary ]
     * @param $item_type
     * @param $item_id
     * @return \Illuminate\Http\RedirectResponse|string
     * @throws Exception
     */
    public function getRemoveItem($item_type, $item_id)
    {
        try {
            $redirect = Input::get('redirect');
            $order = Input::get('order'); //signifies that user is at order page

            if (AppUtil::isUserLoggedIn()) {
                $this->cartService->removeItemFromDbCart($item_id, $item_type);
            } else {
                $this->cartService->removeItem($item_id, $item_type);
            }

            if (isset($order)) {
                return Redirect::to("/order"); //redirects user again at order page
            }

            return isset($redirect) ? Redirect::to("/cart") : "true";
        } catch (Exception $ex) {
            Log::error($ex);
            throw $ex;
        }
    }

}