/**
 * Created by anuj on 3/7/14.
 */
$(document).ready(function () {


    $url = $.url(); // parse the current page URL
    $source = $url.attr("source");
    $query = $url.attr('query');
    $path = $url.attr('path');

    $sort = $url.param('sort');
    $selected_sort = $('.selectProductSort').val();
    var price_slider = $('#price_slider');
    var min = price_slider.data('min');
    var max = price_slider.data('max');
    var min_selected = price_slider.data('min-selected');
    var max_selected = price_slider.data('max-selected');


//    set the sort by select option
    if ($sort != '' && $sort != 'undefined') {
        $('.selectProductSort option[value=' + $sort + ']').attr("selected", "selected");
    }

//    triggers on changing the sort by select option
    $('.selectProductSort').change(function () {

        addLoader();
        $sort_by = $('.selectProductSort').val();
        $filters = getCheckedFilters();
        $filters['price'] = min_selected + '-' + max_selected;
        if ($.isEmptyObject($filters)) {
            $final_url = $path + '?sort=' + $sort_by;
        } else {
//            $filters = getCheckedFilters();
            $final_url = getFiltersPath($filters);
            $final_url = $final_url + '&sort=' + $sort_by;
        }
        window.location.href = $final_url;
    });


//   apply price range slider
    price_slider.slider({
        range: true,
        min: min,
        max: max,
        values: [ min_selected, max_selected ],
        step: 5,
        slide: function (event, ui) {
            $("#amount").html("Rs." + ui.values[ 0 ] + " - Rs." + ui.values[ 1 ]);
        },

//        triggers when range is changed
        change: function (event, ui) {

            addLoader();
            var selected_min_value = ui.values[0];
            var selected_max_value = ui.values[1];
            $filters = getCheckedFilters();
            $filters['price'] = selected_min_value + '-' + selected_max_value;
            if ($.isEmptyObject($filters)) {
                $filters_path = $path;
                if (typeof($sort) === "undefined") {
                    $filters_path = $filters_path + '?sort=' + $selected_sort;
                } else {
                    $filters_path = $filters_path + '?sort=' + $sort;
                }

            } else {
                $filters_path = getFiltersPath($filters);
                if (typeof($sort) === "undefined") {
                    $filters_path = $filters_path + '&sort=' + $selected_sort;
                } else {
                    $filters_path = $filters_path + '&sort=' + $sort;
                }
            }
            window.location.href = $filters_path;
        }
    });


    // sets the range text above price slider
    $("#amount").html("<span class='WebRupee'>Rs.</span>" + price_slider.slider("values", 0) +
        " - <span class='WebRupee'>Rs.</span>" + price_slider.slider("values", 1));


    // triggers when any filter checkbox is clicked
    $(".filter_value").on("click", function () {
        addLoader();
        $filters = getCheckedFilters();
        $filters['price'] = min_selected + '-' + max_selected;
        if ($.isEmptyObject($filters)) {
            $filters_path = $path;
            if (typeof($sort) === "undefined") {
                $filters_path = $filters_path + '?sort=' + $selected_sort;
            } else {
                $filters_path = $filters_path + '?sort=' + $sort;
            }

        } else {
            $filters_path = getFiltersPath($filters);
            if (typeof($sort) === "undefined") {
                $filters_path = $filters_path + '&sort=' + $selected_sort;
            } else {
                $filters_path = $filters_path + '&sort=' + $sort;
            }
        }
        window.location.href = $filters_path;
    });

});

function addLoader() {
    $('#content_container').css("opacity", 0.5);
    $(".ajax_loader_div").removeClass("hidden");
}

function getCheckedFilters() {

    $filter = {};
    $value_object = {};

    $('#layered_form input[type=checkbox]:checked').each(function () {

        $name = $(this).attr('name');
        $value = $(this).attr('value');
        console.log('in');

        if ($filter[$name]) {
            $existing_value = $filter[$name];
            $value = $existing_value + ',' + $value;
            $value_object = $value;

            $filter[$name] = $value_object;
        } else {
            $filter[$name] = $(this).attr('value');
        }
    });
    return $filter;
}


function getFiltersPath($filters) {

    var filters_path = $path + "?filter=true";
    $.each($filters, function (key, value) {
        filters_path += '&' + key + '=' + value;
    });
    return filters_path;
}


//function getSortPath($filters_path, $filter) {
//
//    if ($filter == 'true') {
//        if (typeof($sort) === "undefined") {
//            $filters_path = $filters_path + '&sort=' + $selected_sort;
//        } else {
//            $filters_path = $filters_path + '&sort=' + $sort;
//        }
//    } else {
//        if (typeof($sort) === "undefined") {
//            $filters_path = $filters_path + '?sort=' + $selected_sort;
//        } else {
//            $filters_path = $filters_path + '?sort=' + $sort;
//        }
//    }
//
//    window.location.href = $filters_path;
//
//
//}
