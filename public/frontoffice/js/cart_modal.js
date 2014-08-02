/**
 * Created by anuj on 3/24/14.
 */

$(document).ready(function () {

    $site_url = $.url();
    $host = "http://" + $site_url.attr('host');

//        triggers when add to cart button or add to cart image is clicked
    $('.ajax_add_to_cart_button,.add_to_cart_image').click(function (e) {

        e.preventDefault();
        var id = $(this).data("id");
        $item_type = $('.qty_' + id).data('item-type');
        $id = $('.qty_' + id).data('id');
        $qty = $('.qty_' + id).val();
        $url = "/cart/add-item/" + $item_type + "/" + $id + '/' + $qty;

        $.fancybox.showLoading({
            helpers: {
                overlay: {closeClick: false}
            }
        });
        $.fancybox.helpers.overlay.open({parent: $('body')});

        $.get($url, function () {
            $.fancybox({
                href: "/cart/cart-items",
                type: 'ajax',
                helpers: {
                    overlay: {closeClick: false}
                },
                afterClose: function () {
                    $('#quantity_wanted').val("1");
                }
            });
        });
    });

//       triggers when quantity is incremented or decremented
    $('.qty_btn').live("click", function () {

        $button = $(this);
        $id = $button.data('id');
        $old_value = $('#cart_quantity_input_' + $id).val();
        if ($button.attr('id') == 'cart_quantity_up') {
            $newVal = parseFloat($old_value) + 1;
        } else {
            // Don't allow decrementing below zero
            if ($old_value > 1) {
                $newVal = parseFloat($old_value) - 1;
            } else {
                $newVal = 1;
            }

        }
        $('#cart_quantity_input_' + $id).val($newVal);
    });

//        trigger when new quantity is saved
    $('.save_new_qty').live('click', function (e) {

        e.preventDefault();
        $.fancybox.showLoading();
        $item_type = $(this).data('item-type');
        $id = $(this).data('id');

        $qty = $('#cart_quantity_input_' + $id).val();
        $url = "/cart/add-item/" + $item_type + '/' + $id + '/' + $qty + '?qty_changed=true'; //qty_changed signifies that only the quantity is changed

        $.get($url, function () {
            $.get("/cart/cart-items", function (data) {
                $.fancybox.hideLoading();
                $(".fancybox-inner").html(data)
            });

        });
    });

//  trigger when product is removed form place order model
    $('.cart_quantity_delete').live("click", function (e) {

        e.preventDefault();
        $total_items = $('.content_items').data('total-items');
        $remove_url = $(this).attr("href");
        $get_items_url = '/cart/cart-items';

        $.fancybox.showLoading();

        $.get($remove_url, function () {
            if ($total_items == 1) {
                window.location.reload();
            } else {
                $.get($get_items_url, function (data) {
                    $.fancybox.hideLoading();
                    $(".fancybox-inner").html(data);
                });
            }
        });
    });

});