@extends('layouts.frontoffice.default')

@section('content')

{{HTML::style('frontoffice/themes/leometr/cache/7908d2ebd930903fc4a31e0ff2a9ac57_all.css')}}
{{HTML::style('frontoffice/css/blocklayered-15.css')}}
{{HTML::script('frontoffice/js/blocklayered.js')}}
{{HTML::script('frontoffice/js/get_products.js')}}

{{HTML::style('frontoffice/css/accordian.css')}}
{{HTML::script('frontoffice/js/accordian.js')}}

{{HTML::script('frontoffice/js/cart_modal.js')}}


<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>


<!--fb slide partial view -->
@include('_partials.frontoffice.fb_slide_box')


<!--compare bar partial view -->
@include('_partials.frontoffice.compare_bar')


<!--ajax loader-->
<div class="ajax_loader_div hidden">
    <img src="{{asset('frontoffice/img/loader.gif')}}" alt="" width="35" height="35"/>
    Loading
</div>

<?php $session_ids = Session::get('id'); ?>

<section id="columns" class="clearfix">

<div class="container">


<!-- features showcase starts here -->
<div class="row">
    <div class="span12">
        <div class="width-20percent chimney-category-features-content">

            <div class="row-fluid">
                <img class="span12 padding5"
                     src="{{asset('frontoffice/img/chimney-category/designer-hood/auto-sense.jpg')}}"/>
            </div>
            <div class="row-fluid">
                <h5>Auto Sense</h5></div>
            <div class="row-fluid">
                <p>This intelligent chimney with a nose, detects heat or gas under the hood and activates
                    automatically.
                    It adjusts speed on its own and even switches off once the task is done.</p>
            </div>
        </div>
        <div class="width-20percent chimney-category-features-content">

            <div class="row-fluid">
                <img class="span12 padding5"
                     src="{{asset('frontoffice/img/chimney-category/designer-hood/design.jpg')}}"/>
            </div>
            <div class="row-fluid">
                <h5>Design</h5></div>
            <div class="row-fluid">
                <p>A sleek body and the artistic interplay of steel and glass on the outside with a range of
                    intelligent
                    features inside provide an unmatched blend of
                    performance and looks. Premium materials make for a superior product.</p>
            </div>
        </div>
        <div class="width-20percent chimney-category-features-content">

            <div class="row-fluid">
                <img class="span12 padding5"
                     src="{{asset('frontoffice/img/chimney-category/designer-hood/led-lighting.jpg')}}"/>
            </div>
            <div class="row-fluid">
                <h5>LED lighting</h5></div>
            <div class="row-fluid">
                <p>Environment friendly, power saving, LED lamps with exceptionally long life effectively
                    illuminate the
                    hob area; easy on the eye as well as easing cooking tasks.</p>
            </div>
        </div>
        <div class="width-20percent chimney-category-features-content">

            <div class="row-fluid">
                <img class="span12 padding5"
                     src="{{asset('frontoffice/img/chimney-category/designer-hood/intelligent-feature.jpg')}}"/>
            </div>
            <div class="row-fluid">
                <h5>Intelligent features</h5></div>
            <div class="row-fluid">
                <p>Soft touch electronic push button controls, three speed settings, a powerful maximum
                    extraction rate
                    of 1250 m<sup>3</sup>/hr, two powerful LED lights plus an automatic switch-off timer.</p>
            </div>
        </div>
        <div class="width-20percent chimney-category-features-content margin-right-0px">

            <div class="row-fluid">
                <img class="span12 padding5"
                     src="{{asset('frontoffice/img/chimney-category/designer-hood/low-noise.jpg')}}"/>
            </div>
            <div class="row-fluid">
                <h5>Low noise, Long life</h5></div>
            <div class="row-fluid">
                <p>A pressure die cast aluminium (PDCA) housing enhances the durability of the Italian motor and
                    reduces
                    the ambient noise.</p>
            </div>
        </div>
    </div>
</div>
<!-- features showcase ends -->


<div class="clearfix"></div>

<!--products starts here-->

@if(!is_null($products))

<!--filter products partial view-->
@include('_partials.frontoffice.filters')


@for ($i = 0; $i < count($products); $i=$i+3)

<div class="row-fluid">


    @for($j=0;$j<3;++$j)
    @if($i+$j < count($products))
    <?php $id = $products[$i + $j]->id;
    $category_name = $products[$i + $j]->category->name;
    $product_name = $products[$i + $j]->name;
    $url = URL::to("$category_name/$product_name-$id");
    ?>

    <div class="span4">

        <?php $images = $products[$i + $j]->images; ?>
        @if(isset($images))
        <?php $image = HtmlUtil::getPrimaryImage($images); ?>
        <?php $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
        $title = isset($image['title']) ? $image['title'] : $products[$i + $j]->name;
        ?>
        @else
        <?php $path = Constants::DEFAULT_300_IMAGE;;
        $title = $products[$i + $j]->name;
        ?>
        @endif

        <div class="product_detail_box padding5">
            <div class="row-fluid">
                <a href="{{$url}}"><img src="{{URL::to($path)}}"/></a>
            </div>
            <div class="row-fluid">
                <br/>
                <h4 class="blue-heading">{{$products[$i+$j]->name}}</h4>

                <p class="margin-top10">A sleek and stylish new hood with an interplay of glass and matt
                    steel</p>
            </div>
            <div class="row-fluid">
                <div class="accordionButton margin-top10">
                    <span class="plusMinus">+</span> <span>Features</span>
                </div>
                <div class="accordionContent margin-top10">

                    <ul class="product-features">
                        {{$products[$i+$j]->description}}
                    </ul>
                </div>
            </div>
            <div class="clearfix"></div>

            @if(isset($session_ids) && sizeof($session_ids))
            <?php $key = array_search($id, $session_ids);
            $disabled = is_int($key) ? "disabled" : "";?>
            @else
            <?php $disabled = "" ?>
            @endif

            <div class="row-fluid margin-top-20px">
                <div class="span9">
                    <button data-id="{{$id}}" id="compare_{{$id}}" class="add_to_compare dark_button"
                    {{$disabled}}>Add to Compare
                    </button>
                </div>
                <div class="span3">
                    <a href="#" data-id="{{$id}}" class="add_to_cart_image">
                        <input type="hidden" data-item-type="product" data-id="{{$id}}" name="qty" id="quantity_wanted"
                               class="text qty_{{$id}}" value="1" size="2">
                        <img src="{{asset('frontoffice/img/add-cart.png')}}" title="Add to Cart"/>
                    </a>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row-fluid margin-top-20px">
                <div class="span6">
                    <div class="price">
                        <p class="our_price_display font-17px">
                            <span id="our_price_display" class="price-line-through">
                                <span class="WebRupee"> Rs. </span>{{$products[$i+$j]->list_price}}</span>
                        </p>
                    </div>
                </div>
                <div class="span6 text-right">
                    <div class="price">
                        <p class="our_price_display font-17px">

                            <span style="padding-left:5px; color:#333;">
                                <span class="WebRupee"> Rs. </span>{{$products[$i+$j]->offer_price}}</span>
                        </p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @endif
    @endfor

</div>

<br/>
@endfor

@else
<h4>No products found</h4>
@endif

<!--products ends here-->

</div>
</section>


<!--feedback slide box partial-->
@include('_partials.frontoffice.feedback_slide_box')

@stop