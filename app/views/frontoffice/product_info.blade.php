@extends('layouts.frontoffice.default')

@section('content')

{{HTML::style('frontoffice/css/jquery.jqzoom.css')}}
{{HTML::script('frontoffice/js/jquery.jqzoom-core.js')}}
{{HTML::script('frontoffice/js/jquery/plugins/jquery.idTabs.js')}}
{{HTML::script('frontoffice/js/cart_modal.js')}}

<link rel="stylesheet" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<link src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_overlay.png">
<link src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_sprite.png">
<link src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_sprite@2x.png">


<script type="text/javascript">
    $(document).ready(function () {

        var site_url = $.url();
        var host = site_url.attr('host');

        var options = {
            zoomType: 'standard',
            lens: true,
            preloadImages: true,
            alwaysOn: false,
            zoomWidth: 300,
            zoomHeight: 250,
            xOffset: 10,
            position: 'right'

        };
        $('.zoom_hover').jqzoom(options);


        $("#more_info_block ul").idTabs();

        $('.variant').change(function () {

            $product_id = $(this).val();
            if ($product_id != '') {
                window.location.href = '/product/' + $product_id;
            }

        });

//        trigger q-tip
        $('.question_image_product_block').live('click', function (event) {
            // Bind the qTip within the event handler
            $(this).qtip({
                overwrite: false, // Make sure the tooltip won't be overridden once created
                content: {
                    title: {
                        text: 'Description',
                        button: true
                    },
                    text: $(this).find('.tooltip_val')[0].innerHTML
                },
                show: {
                    event: event.type, // Use the same show event as the one that triggered the event handler
                    ready: true,// Show the tooltip as soon as it's bound, vital so it shows up the first time you hover!
                    solo: true
                },
                hide: {event: false},
                position: {
                    at: 'bottom left',
                    my: 'top left',
                    adjust: {
                        method: 'flip'
                    },
                    viewport: true
                }, style: {
                    width: 400, // Overrides width set by CSS (but no max-width!)
                    classes: 'qtip-light',
                    overflow: 'scroll'
                }

            }, event); // Pass through our original event to qTip
        })

    });
</script>


<!--fb slide partial view-->
@include('_partials.frontoffice.fb_slide_box')

@include('_partials.frontoffice.compare_bar')


<?php $session_ids = Session::get('id'); ?>
<?php $category_name = $product->category->name;
$product_name = $product->name;
$product_id = $product->id;
$url = URL::to("$category_name/$product_name-$product_id");
?>

<section id="columns" class="clearfix">
<div class="container">
<div class="row-fluid">


<!--left categories accordian starts here-->
@include('_partials.frontoffice.left_categories_accordian')
<!--left categories accordian ends here-->


<section id="center_column" class="span9">
<div class="contenttop row-fluid">


<!-- Breadcrumb -->
<div id="breadcrumb">
    <ul class="breadcrumb">
        <li>
            <a href="{{URL::to('/')}}" title="return to Home">Home</a>
            <span class="divider">&gt;</span>
        </li>
        <li class="active"><a href="#" title="">{{$product->category->name or ''}}</a><span
                class="navigation-pipe">&gt;</span>
            {{$product->name or ''}}
        </li>
    </ul>
</div>
<!-- /Breadcrumb -->
<div id="product-detail">
<div id="primary_block" class="row-fluid">


<!-- right infos-->
<div id="pb-right-column" class="span5">
    <div class="images-block">

        <div id="image-block">

            <!--  product primary image  -->
            <?php $images = $product->images; ?>
            <?php $image = HtmlUtil::getPrimaryImage($images); ?>
            <?php $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE; ?>


            <span id="view_full_size">
                            <a href="{{URL::to($path)}}" class=" zoom_hover" title="" rel="undefined"
                               style="outline-style: none; text-decoration: none;">
                                <img src="{{URL::to($path)}}" title=""
                                     id="bigpic" width="300"
                                     height="300" data-lensWidth="1" data-lensHeight="1">
                            </a>

			</span>

        </div>
        <!-- thumbnails -->
        <div id="views_block" class="clearfix ">
            <div class="content_prices clearfix">
                <!-- prices -->
                <p class="online_only">Price</p>

                <div class="price">

                    <p class="our_price_display">
                        <span id="our_price_display" class="price-line-through">
                            <span class="WebRupee"> Rs. </span>{{$product->list_price}}</span>
                        <span style="padding-left:5px; color:#333;">
                            <span class="WebRupee"> Rs. </span>{{$product->offer_price}}</span>
                    </p>

                </div>


                <div class="clear"></div>


            </div>
        </div>
    </div>

</div>

<!-- left infos-->
<div id="pb-left-column" class="span7">

    <h1>@if(!is_null($product)) {{$product->name}} @endif


        @if(isset($session_ids) && sizeof($session_ids))
        <?php $key = array_search($product->id, $session_ids);
        $disabled = is_int($key) ? "disabled" : "";?>
        @else
        <?php $disabled = "" ?>
        @endif


        <div style="float:right; margin-right:10px; font-size:13px; font-weight:700">
            <button class="dark_button add_to_compare" id="compare_{{$product_id}}" data-id="{{$product->id}}"
            {{$disabled}}>Add to compare</button>
        </div>

    </h1>

    <!-- usefull links-->
    <ul id="usefull_link_block">

        <li id="">
            <a class="fb-share-button" data-href="{{$url}}" data-type="icon">Share on
                Facebook!</a>
            <a class="fb-share-button" data-href="{{$url}}" data-type="link"
               style="top:-3px"></a>
        </li>

        <li class="sendtofriend">
            <a id="send_friend_button" href="#">Send to a friend</a>
        </li>

        <li class="print"><a href="javascript:print();">Print</a></li>
    </ul>
    <!-- end usefull links-->


    <!-- quick overview starts here -->
    <div id="short_description_block">
        <h3>Quick Overview</h3>

        <div id="short_description_content" class="rte align_justify">
            <ul class="product-features">
                {{$product->description or 'No description available'}}
            </ul>
        </div>
    </div>
    <!-- quick overview ends here -->

    <div id="product_custom_block">
        <div class="row-fluid">


            <div class="span12">
                <ul class="buy-view-list">

                    @if($product->ltw)
                    <li class="question_image_product_block">
                        Life Time Warranty

                    </li>
                    @endif

                    <li class="question_image_product_block" data-hasqtip="0" aria-describedby="qtip-0">
                        Free Shipping
                        <img src="{{asset('frontoffice/img/question_icon.gif')}}" style="margin:3px 5px 0px 0px">

                        <!--                        free shipping qtip content starts here-->
                        <div class="tooltip_val" style="display:none;"><p>
                                <strong>How is the delivery time determined?</strong></p>

                            <p>The delivery time tells the approximate time band, in number of days, that we will take
                                to deliver the product to you.</p>

                            <p>Business days exclude Saturdays, Sundays and any public holidays.</p>

                            <p>We normally deliver our TabTop PCs by air across India wherever possible. The bigger
                                items like Robots are sent out either via Air or via Surface, depending on your
                                location.</p>

                            <p>Milagrow works with the best in class carriers like FedEx, DHL, Blue Dart, Aramex, DTDC
                                and Speed Post.</p>

                            <p>All efforts are made by us to inform you of the progress by constantly updating the
                                status of shipment on our website.</p>

                            <p>The delivery times vary sometimes due to distances and circumstances beyond our
                                control.</p>

                            <p style="text-align:right"><a href="/content/28-shipping-and-delivery-faqs#delivery-time"
                                                           target="_blank">Read More..</a></p>
                        </div>
                        <!--                        free shipping qtip content ends here-->

                    </li>
                </ul>
            </div>
        </div>
    </div>

    <?php $i = 0; ?>


    <!--variants starts here-->
    @if(!is_null($variants))

    <div class="row-fluid">
        <div class="span12">
            <select name="" id="" class="variant">

                @foreach($variants as $variant)

                @if($product->id==$variant->id)
                <?php $selected = 'selected'; ?>
                @else
                <?php $selected = ''; ?>
                @endif


                <option value="{{$variant->id}}"
                {{$selected}}>
                @if(!isset($variant->base_diff_text)||($variant->base_diff_text==''))
                {{$variant->name}}
                @else
                {{$variant->base_diff_text}}
                @endif
                </option>
                @endforeach
            </select>
        </div>
    </div>

    @endif
    <!-- variants ends here -->


    <!-- add to cart form-->
    <form id="buy_block" action="" method="post">

        <!-- content prices -->
        <div class="content_prices clearfix">
            <!-- prices -->

            <p class="buttons_bottom_block">
                <label style="width: 29%; margin-top: 2px;">Add to Compare</label></p>

            <div class="product_attributes">

                <!-- quantity wanted -->
                <p id="quantity_wanted_p">
                    <label>Qty:</label>
                    <input type="text" data-item-type="product" data-id="{{$product->id}}" name="qty"
                           id="quantity_wanted"
                           class="text qty_{{$product->id}}" value="1"
                           size="2">
                </p>

            </div>


            <a class="ajax_add_to_cart_button right" href="#" data-id="{{$product->id}}" data-item-type="product">
                Add to cart</a>

            <div class="clear"></div>
        </div>
        <!-- content prices -->

        <!-- attributes -->

        <!-- end attributes -->


    </form>

</div>
</div>

<?php $total_documents = $product->documents->count(); ?>
<?php $total_combos = $product->combos->count(); ?>

<!-- description and features tabs starts here -->
<div id="more_info_block" class="clear">
    <ul id="more_info_tabs" class="idTabs idTabsShort clearfix">
        <li><a class="more_info_tab" href="#idTab1">More info</a></li>
        <li><a href="#idTab2" class="idTabHrefShort">Specifications</a></li>
        @if($total_documents!=0)
        <li><a href="#idTab3" class="idTabHrefShort">Support</a></li>
        @endif

        <?php $i = 4;
        $j = 1 ?>
        @if($total_combos!=0)

        @foreach($combos as $combo)

        <li><a href="#idTab{{$i}}" class="idTabHrefShort">Combo Offer {{$j}}</a></li>
        <?php $i++;
        $j++; ?>
        @endforeach

        @endif

    </ul>
    <div id="more_info_sheets" class="sheets align_justify">
        <!-- full description -->
        <div id="idTab1" class="">
            <div class="product-overview-full">
                <ul class="product-features">
                    {{$product->description_secondary or 'No more info for the moment'}}
                </ul>
            </div>
        </div>

        <div id="idTab2">
            <div id="product_comments_block_tab">
                <p class="align_center">No customer comments for the moment.</p>
            </div>
        </div>

        @if($total_documents!=0)
        <div id="idTab3">
            <div class="row-fluid">
                <div class="span9">
                    <div class="product-overview-full">
                        <h3>Manuals &amp; Documentation</h3>

                        <div class="content-column-left">
                            <ul>
                                <?php $documents = $product->documents; ?>
                                @foreach($documents as $document)
                                <?php $path = $document->path; ?>
                                <li class="downloadlink  pdf icon">
                                    <a href="{{URL::to($path)}}" target="_blank">{{$document->pivot->name}}</a>
                                </li>
                                @endforeach

                            </ul>
                        </div>


                    </div>
                </div>
                <div class="span3">
                    <div class="content-smallright">
                        <div id="ServiceBar">
                            <div class="ServiceBarComponent">
                                <div class="title"><h3>Contact</h3></div>
                                <ul id="ContactOptions">
                                    <li class="call">
                                        <a href="#">Call us</a></li>
                                    <li class="mail">
                                        <a href="#" target="">Send email</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
        @endif

        @if($total_combos!=0)
        <?php $i = 4; ?>
        @foreach($combos as $combo)

        <?php $combo_id = $combo['combo_info']['id']; ?>
        <div id="idTab{{$i}}">
            <div class="line rposition bundle-content">

                <?php $products = $combo['product']; ?>

                @if(sizeof($products!=0))

                <?php $j = 1; ?>
                @foreach($products as $product)

                <?php $images = $product['images'];
                $combo_product_category = $product['category'];
                $combo_product_name = $product['name'];
                $combo_product_id = $product['id'];
                $combo_product_url = URL::to("$combo_product_category/$combo_product_name-$combo_product_id");
                ?>
                @if($images->count()!=0)
                <?php $image = HtmlUtil::getPrimaryImage($images);
                $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                $title = isset($image['title']) ? $image['title'] : "";
                ?>
                @else
                <?php $path = Constants::DEFAULT_300_IMAGE;
                $title = "";
                ?>
                @endif

                <?php $product_list_price_array[] = $product['list_price']; ?>

                <div class="combo-unit unit unit-4 combo-unit-1">
                    <a class="pu-image fk-product-thumb bmargin5" href="{{$combo_product_url}}">
                        <img src="{{URL::to($path)}}" alt="" title="{{$title}}">
                    </a>

                    <div class="tpadding5">
                        <form>
                            <input type="checkbox" name="bundle11" class="bundle-check bind-bundle-check"
                                   checked="checked" disabled>

                            <label for="">
                                <span class="category-name bpadding5 fk-inline-block">{{$product['name']}}</span>
                                <span class="fk-display-block fk-bold lmargin20 pu-border-top tpadding5 bpadding5">
                                   <span class="WebRupee">Rs.</span>  {{$product['list_price']}}
                                </span>
                            </label>

                        </form>
                    </div>

                </div>

                @if($j!=sizeof($products))
                <div class="unit plus">+</div>
                @endif

                <?php $j++; ?>
                @endforeach
                @endif


                <?php $products_list_price_total = array_sum($product_list_price_array);
                $combo_price_diff = $products_list_price_total - $combo['combo_info']['combo_price'];
                ?>


                <div class="unitExt product-unit bundle-details">
                    <div class="offers">
                        <div class="pu-banner pu-offer fk-uppercase">Combo Offer</div>
                    </div>
                    <div class="pu-price">
                        <div class="bmargin5 with-santa">
                            <div class="pu-final pu-discount">
                                <span class="pu-old "><span
                                        class="WebRupee">Rs.</span> {{$products_list_price_total}}</span>
                                <span class="santa-discount fk-bold"><span class="WebRupee">Rs.</span>{{$combo_price_diff}}</span>
                            </div>
                            <div class="pu-border-top">
                                <div class="pu-final fk-font-17 fk-bold">{{$combo['combo_info']['combo_price']}}</div>
                            </div>
                        </div>

                        <input type="hidden" data-item-type="combo" data-id="{{$combo_id}}" name="qty"
                               id="quantity_wanted"
                               class="text qty_{{$combo_id}}" value="1" size="2">
                        <a class="btn btn-orange fk-buy-now fkg-pp-buy-btn bundle-buy tab-buyBtn-1">
                            Buy {{sizeof($products)}} Items
                        </a>

                    </div>
                </div>

            </div>
        </div>

        <?php $i++; ?>
        @endforeach

        @endif


    </div>
</div>
<!-- description and feature tabs end here-->

</div>

<!-- module Related products starts here -->

@include('_partials.frontoffice.related_products')

<!--module related products ends here-->


</div>
<!-- end div block_home -->
</section>

</div>
</div>
</section>


@stop