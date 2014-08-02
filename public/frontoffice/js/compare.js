$(document).ready(function () {

    var site_url = $.url();
    var filter_param = site_url.param('filter');
    if (filter_param == 'true') {

        $('html,body').animate({
            scrollTop: $(window).scrollTop() + 600
        })

    }

    var fixed = false;
    var scrollHeight = 100;
//    if ($('body').attr('id') == 'index')
//        scrollHeight = 770;

    $(document).scroll(function () {
        var isCompareWrapperExist = $('.block_content').find('.compare-cart-wrapper');
        if (isCompareWrapperExist.length != 0) {
            if ($(this).scrollTop() > scrollHeight) {
                if (!fixed) {
                    fixed = true;
                    $('#compare_notification_div').addClass('compare-scroll');
                    $('.compare-cart-wrapper').addClass('compare-scroll');
                }
            } else {
                fixed = false;
                $('#compare_notification_div').removeClass('compare-scroll');
                $('.compare-cart-wrapper').removeClass('compare-scroll');

            }
        }
    });

    $request_url = '/product/create-compare-bar-html';
    $.get($request_url, function (data) {

        if ($.trim(data)) {
            $('.compare_row').removeClass('hidden');
            $('#compare_block').addClass('compare_block_height');
            $('#fc_comparison').empty().html(data);
            updateRenderPosition();
        }
        else {
            $('#compare_block').removeClass('compare_block_height');
            $('#fc_comparison').empty().html(data);
            updateRenderPosition();
        }
    });

    //updated the render position of the compare bar
    function updateRenderPosition() {
        var scrollHeight = 100;
        if ($('body').attr('id') == 'index')
            scrollHeight = 770;
        if ($(document).scrollTop() > scrollHeight) {
            $('.compare-cart-wrapper').addClass('compare-scroll');
        }
    }

//    triggers when add to compare button is clicked
    $('.add_to_compare').click(function (e) {

        $error = false;
        var compare = $(this);
        $id = compare.data('id');

        $existing_comparable_items = $('.compare-items').data('items-size');
        if (parseInt($existing_comparable_items) >= 3) {
            e.preventDefault();
            alertMessage("More then 3 products cannot be compared");
            console.log("limit exceeded");
            $error = true;
        } else {
            $('.compare-item').each(function () {
                $existing_id = $(this).attr('data-id');
                if (parseInt($existing_id) == $id) {
                    e.preventDefault();
                    alertMessage("Product already in comparison list.");
                    console.log("already exist");
                    $error = true;
                }
            });
        }

        if ($error == false) {
            $compare_url = '/product/compare-bar/' + $id;
            $.get($compare_url, function (data) {
                if (data != "false") {
                    compare.attr('disabled', 'disabled');
                    alertMessage("Product has been added for comparison");
                    showCompareHtml(data);
                } else {
                    alertMessage("Product cannot be compared.");
                    console.log("product cannot be compared");
                }
            });
        }

    });

//    triggers when select to compare is clicked from category products page
//    $('.select_to_compare').click(function (e) {
//
//        $error = false;
//        var compare = $(this);
//        $id = compare.data('id');
//
//        $existing_comparable_items = $('.compare-items').data('items-size');
//
//        //check whether comparison limit has exceeded or not
//        if (parseInt($existing_comparable_items) >= 3) {
//            e.preventDefault();
//            console.log("limit exceeded");
//            alertMessage("Product comparison limit exceeded.");
//            $error = true;
//        } else {
//
//            //check whether item already exist in comparison list
//            $('.compare-item').each(function () {
//                $existing_id = $(this).attr('data-id');
//                if (parseInt($existing_id) == $id) {
//                    e.preventDefault();
//                    console.log("already exist");
//                    alertMessage("Product already exist");
//                    $error = true;
//                }
//            });
//        }
//
//
//        if ($error == false) {
//            $compare_url = '/product/compare-bar/' + $id;
//
//            $.get($compare_url, function (data) {
//                if (data != 'false') {
//                    console.log('product added');
//
//                    showCompareHtml(data);
//                    console.log($(this).attr('disabled'));
//                    $(this).attr('disabled', 'disabled');
////                    alertMessage("Product has been added for comparison");
//                    return false;
//
//                } else {
//                    alertMessage("Product cannot be compared.");
//                    console.log("product cannot be compared");
//                    return false;
//                }
//            });
//        }
//    });
});

//triggers when the compare bar is closed
function deleteAllItems() {

    $compare_buttons = $('.add_to_compare');
    if (isUndefined($compare_buttons) == false) {
        $compare_buttons.removeAttr("disabled");
    }

    $('.compare_row').addClass('hidden');
    $('#fc_comparison').html("");
    $deleteAll = '/product/remove-all-items';
    $.get($deleteAll, function () {
    });
}

// triggers when item is removed from compare bar
function deleteItem(id) {

    $compare_btn = $('#compare_' + id);
    if (isUndefined($compare_btn) == false) {
        $compare_btn.removeAttr("disabled");
    }

    $delete_item_url = '/product/remove-item/' + id;


    $.get($delete_item_url, function () {
        $.get($request_url, function (data) {

            if ($.trim(data)) {
                $('.compare_row').removeClass('hidden');
                $('#compare_block').addClass('compare_block_height');
                $('#fc_comparison').empty().html(data);
                updateRenderPosition();
            }
            else {
                $('#compare_block').removeClass('compare_block_height');
                $('#fc_comparison').empty().html(data);
                updateRenderPosition();
            }
        });
    });
}

function showCompareHtml(html) {

    $('.compare_row').removeClass('hidden');
    $('#compare_block').addClass('compare_block_height');
    $('#fc_comparison').empty().html(html);
    updateRenderPosition();
}

//updates the render position of the compare bar
function updateRenderPosition() {
    var scrollHeight = 100;
    if ($('body').attr('id') == 'index')
        scrollHeight = 770;
    if ($(document).scrollTop() > scrollHeight) {
        $('.compare-cart-wrapper').addClass('compare-scroll');
    }
}

function isUndefined(val) {
    if (typeof val === 'undefined') {
        return true;
    } else {
        return false;
    }
}

// show the alert message while compare
function alertMessage(msg) {
    $('#notification_message').append('<div class="alert"></div>');
    var $alert = $('.alert');
    $alert.fadeIn(400);
    var message = "<p>" + msg + "</p>";
    $alert.html(message);
    $alert.fadeIn('400', function () {
        setTimeout(function () {
            $alert.fadeOut('400', function () {
                $(this).fadeOut(400, function () {
                    $(this).detach();
                })
            });
        }, 2000)
    });
}
