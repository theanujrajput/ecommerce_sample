@extends('layouts.frontoffice.default')

@section('content')

<script type="text/javascript" src="{{asset('frontoffice/js/cart_summary.js')}}"></script>

<?php $user_id = $user->id;
$mobile = $user->mobile;
?>
<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">


                    <h1 id="cart_title" class="title_category custom_h1">Order Summary</h1>

                    <!-- Steps -->
                    <ul class="step" id="order_step">

                        <li class="step_done"><span><a href="#">1. Login</a></span></li>
                        <li class="step_done"><span><a href="{{URL::to('user/address/'.$user_id)}}">2.
                                    Address</a></span></li>
                        <li id="step_end" class="step_current"><span>3. Order Summary</span></li>
                    </ul>
                    <!-- /Steps -->

                    @if(sizeof($items)!=0)

                    <p class="wrapper">Your shopping cart contains: <span
                            id="summary_products_quantity">{{sizeof($items)}} products</span></p>

                    <div id="order-detail-content" class="table_block">
                        <table id="cart_summary" class="std">
                            <thead>
                            <tr>
                                <th class="cart_product first_item">Product</th>
                                <th class="cart_description item ">Item</th>
                                <th class="cart_quantity item">Qty</th>
                                <th class="cart_total item">Price</th>
                                <th class="cart_total item">SubTotal</th>
                                <th class="cart_delete last_item">&nbsp;</th>
                            </tr>
                            </thead>

                            <tbody>

                            @foreach($items as $item)

                            <?php $custom_id = $item['id'];
                            $custom_id = explode('_', $custom_id);
                            $type = $custom_id[0];
                            $id = $custom_id[1];

                            $image = AppUtil::getProductPrimaryImage($id);
                            $path = isset($image['image_path']) ? $image['image_path'] : Constants::DEFAULT_300_IMAGE;
                            $title = isset($image['image_title']) ? $image['image_title'] : "";
                            ?>

                            <tr id="product_4_0_0_0" class="cart_item first_item address_0 odd">
                                <td class="cart_product">
                                    <a href="#">
                                        <img src="{{URL::to($path)}}" alt="{{$title}}" width="80" height="80"/>
                                    </a>
                                </td>
                                <td class="cart_description">
                                    <p class="s_title_block">
                                        <a href="">{{$item['name']}}</a>
                                    </p>
                                </td>
                                <td class="cart_quantity">
                                    <div class="cart_quantity_button">
                                        <a class="qty_btn cart_quantity_up" id="cart_quantity_up" data-id="{{$id}}"
                                           title="Add">
                                            <img src="{{asset('frontoffice/themes/leometr/img/icon/quantity_up.gif')}}"
                                                 alt="Add"
                                                 width="14" height="9"/>
                                        </a><br/>
                                        <a class="qty_btn cart_quantity_down" id="cart_quantity_down" data-id="{{$id}}"
                                           title="subtract">
                                            <img
                                                src="{{asset('frontoffice/themes/leometr/img/icon/quantity_down.gif')}}"
                                                alt="Subtract"
                                                width="14" height="9"/>
                                        </a>
                                    </div>

                                    <input name="" size="2" type="text" autocomplete="off" class="cart_quantity_input"
                                           id="cart_quantity_input_{{$id}}" value="{{$item['qty']}}"/>
                                    <a class="save_new_qty" data-item-type="product" data-id="{{$id}}">Save</a>

                                </td>
                                <td class="cart_total">
		                                <span class="price-black" id="total_product_price_4_0_0">
											<span class="WebRupee">Rs.</span>	 {{$item['price']}}
                                        </span>
                                </td>

                                <td class="cart_total">
		                                <span class="price-black" id="total_product_price_4_0_0">
											<span class="WebRupee">Rs.</span>	 {{$item['subtotal']}}
                                        </span>
                                </td>


                                <td class="cart_delete">
                                    <div>
                                        <a href="{{URL::to('cart/remove-item/'.$type.'/'.$id.'?redirect=true&order=true')}}"
                                           class="cart_quantity_delete">x</a>
                                    </div>
                                </td>
                            </tr>


                            @endforeach

                            </tbody>
                        </table>
                        <div class="clearfix row-fluid" id="customer_cart_total">
                            <div class="span12">

                                <table class="std">
                                    <tfoot>


                                    <tr class="cart_total_price">

                                        <td colspan="2" class="" id="">
                                            <h3 style="float:right;" class="display-inline-block">Amount Payable
                                                <span id="total_price"><span class="WebRupee"
                                                                             style="display:inline-block; padding-left:6px;">
                                                        Rs.</span>{{$total_price}}</span>
                                            </h3>
                                        </td>
                                    </tr>
                                    </tfoot>
                                </table>
                                <div style="display:inline-block">
                                    <form>
                                        <fieldset>
                                            <input type="checkbox" id="" checked="checked"> Send Order Confirmation SMS
                                            alert to +91
                                            <input id="" size="10" type="text" name="phone" class=""
                                                   maxlength="10" value="{{$mobile}}">
                                        </fieldset>
                                    </form>
                                </div>
                                <div class="" style="display:inline-block; float:right">
                                    <a href="{{URL::to('/order/create-order')}}"
                                       class="exclusive standard-checkout btn btn-large"
                                       title="Next">Pay Now »</a>
                                </div>
                            </div>
                        </div>
                    </div>


                    @else

                    <h4>Your shopping cart is empty.</h4>

                    @endif

                </div>
                <!-- end div block_home -->
            </section>
        </div>
    </div>
</section>

@stop