@extends('layouts.frontoffice.default')

@section('content')

{{HTML::style('frontoffice/themes/leometr/cache/7908d2ebd930903fc4a31e0ff2a9ac57_all.css')}}

<script type="text/javascript">

    $(document).ready(function () {

        var site_url = $.url();
        var host = site_url.attr('host');
        var id_url_param = site_url.param('id');


//        triggers when the type of product is changed
        $('.type').change(function () {
            $category_id = $(this).val();
            if ($category_id == "") {
                $('.products').html(" ");
                return false;
            }

            $url = "<?php echo URL::to('product/ajax-products/') ?>";
            $url = $url + '/' + $category_id;

            $('.ajax_loader').removeClass('hidden');
            $('.products').attr("disabled", "disabled");

            var products_request = $.get($url, function (data) {
                $('.products').html(" ");
                if (data) {
                    $(data).each(function (key, value) {
                        var option = $('<option></option>');
                        option.attr('value', value['id']);
                        option.html(value['name']);
                        $('.products').append(option);
                    });
                }
            });

            products_request.success(function () {
                $('.products').removeAttr("disabled");
                $('.ajax_loader').addClass("hidden");
            });
        });

//        triggers when the product is selected
        $('.products').live('change', function () {

            var product_id = $(this).val();
            window.location.href = '/product/compare?id=' + id_url_param + ',' + product_id;
        });


    });

</script>

<?php $total_products = sizeof($products['product_info']);
$attributes_info = isset($products['attribute_info']) ? $products['attribute_info'] : null;
$products_info = isset($products['product_info']) ? $products['product_info'] : null;
?>

<?php $url_ids = Input::get('id'); ?>

<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">
                    <h1>Product Comparision</h1>

                    <div class="authentication-page row-fluid">
                        <div class="span12">
                            <div class="products_block">
                                <table id="product_comparison">
                                    <tbody>

                                    <!-- image row starts here-->

                                    @if(isset($products_info))
                                    <tr>
                                        <td width="20%" class="td_empty"></td>

                                        @foreach($products_info as $p_info)
                                        <?php $id = $p_info['id']; ?>

                                        <td width="26%" class="ajax_block_product comparison_infos">
                                            <div class="product-container">
                                                <a href="{{URL::to('product/'.$id)}}" title="" class="product_image">

                                                    <?php $images = $p_info['image']; ?>
                                                    <?php $image = HtmlUtil::getPrimaryImage($images);
                                                    $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                                                    ?>
                                                    <img src="{{URL::to($path)}}" width="300" height="300">
                                                </a>

                                                @if($total_products>1)
                                                <a href="{{URL::to('product/remove-compare-id?id='.$url_ids.'&remove='.$id)}}">
                                                    <img class="product-camparision-close"
                                                         src="{{asset('frontoffice/img/close.png')}}">
                                                </a>
                                                @endif

                                                <h3 class="s_title_block text-center">
                                                    <a href="#">{{$p_info['name']}}</a></h3>
                                             <span><a class="lnk_more retail-store-button-red" href="#">
                                                     Buy Online</a>
                                             </span>
                                                <span style="float:right"><a class="lnk_more exclusive" href="#"
                                                                             title="View">Retail Stores</a></span>

                                                <div class="comparison_product_infos">
                                                    <div class="prices_container">
                                                        <p class="price_container text-center margin-top-20px">
                                                            <span class="price price-line-through">
                                                                <span class="WebRupee"> Rs. </span>{{$p_info['list_price']}}</span>
                                                            <span class="price price-gray">
                                                                <span class="WebRupee"> Rs. </span>{{$p_info['offer_price']}}</span>
                                                        </p>

                                                        <div class="product_discount"></div>
                                                        &nbsp; </div>
                                                    <!-- availability -->
                                                    <p class="comparison_availability_statut"></p>

                                                </div>
                                            </div>
                                        </td>
                                        @endforeach


                                        @if($total_products<3)
                                        <td width="26%" class="ajax_block_product comparison_infos">
                                            <div class="product-container">
                                                <h4 class="margin-bottom10 margin-top10 text-center">Add to
                                                    Compare</h4>

                                                <?php $margin_left = ($total_products == 1) ? 'margin_left_20' : ''; ?>
                                                <div class="padding10">
                                                    <span style="padding-bottom:5px;">Select Type</span>
                                                    <select class="{{$margin_left}} type">
                                                        <option value="">Select</option>

                                                        @if(isset($categories))
                                                        @foreach($categories as $category)
                                                        <option value="{{$category['id']}}">
                                                            {{$category['name']}}
                                                        </option>
                                                        @endforeach

                                                        @endif

                                                    </select>
                                                </div>

                                                <div class="padding10 margin-top10">
                                                    <span style="padding-bottom:5px;">Select Product</span>
                                                    <select class="products">


                                                    </select>
                                                    <span class="hidden ajax_loader">
                                                        <img src="{{asset('frontoffice/img/ajax-loader.gif')}}"
                                                             alt=""/> Loading products...</span>
                                                </div>

                                                <!--<div class="product_desc"><a href="#"> MacBook Air is ultrathin, ultraportable, and ultra...</a></div>-->

                                                <div class="comparison_product_infos">
                                                    <div class="prices_container">
                                                        <!--<p class="price_container"><span class="price">$1,504.18</span></p>-->
                                                        <div class="product_discount"></div>
                                                        &nbsp; </div>
                                                    <!-- availability -->
                                                    <p class="comparison_availability_statut"></p>

                                                    <!--<span class="exclusive">Add to cart</span>--> </div>
                                            </div>
                                        </td>
                                        @endif
                                    </tr>
                                    @endif

                                    <!--image row ends here-->

                                    <!-- blank first row starts here-->

                                    <tr class="comparison_header">
                                        <td> Features:</td>

                                        @foreach($products_info as $p_info)
                                        <td></td>
                                        @endforeach

                                        @if($total_products<3)
                                        <td></td>
                                        @endif
                                    </tr>

                                    <!-- blank first row ends here-->

                                    <!--  main feature rows starts here-->

                                    @if(isset($attributes_info))

                                    @foreach($attributes_info as $key=>$value)
                                    <tr>

                                        <td>{{$key}}</td>

                                        @for($i=0;$i<$total_products;$i++)

                                        <td>@if(isset($value[$i]['value'])) {{$value[$i]['value']}} @else - @endif</td>

                                        @endfor

                                        @if($total_products<3)
                                        <td>&nbsp;</td>
                                        @endif
                                    </tr>
                                    @endforeach
                                    @endif
                                    <!-- main feature rows ends here-->

                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- end div block_home -->
            </section>
        </div>
    </div>
</section>

@stop