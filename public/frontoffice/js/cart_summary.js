/**
 * Created by anuj on 4/9/14.
 */
$(document).ready(function () {

    //   triggers when quantity is incremented or decremented
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

    //  trigger when new quantity is saved
    $('.save_new_qty').live('click', function (e) {

        e.preventDefault();
        $.fancybox.showLoading();
        $.fancybox.helpers.overlay.open({parent: $('body')});

        $item_type = $(this).data('item-type');
        $id = $(this).data('id');

        $qty = $('#cart_quantity_input_' + $id).val();

        $url = "/cart/add-item/" + $item_type + '/' + $id + '/' + $qty + '?qty_changed=true'; //qty_changed signifies that only the quantity is changed

        $.get($url, function (data) {
            if (data == 'true') {
                window.location.reload();
            }
        });

    });

});