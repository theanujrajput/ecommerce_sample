@if(!is_null($related_products))
<div id="relatedproducts" class="block products_block exclusive blockleorelatedproducts">
    <h3 class="title_block"><span class="tcolor">Other</span> Products in this Category</h3>

    <div class="block_content">
        <div class=" carousel slide" id="leorelatedcarousel">

            @if(!is_null($related_products) && count($related_products)>3)
            <div class="button-carousel">
                <a class="carousel-control left" href="#leorelatedcarousel" data-slide="prev">‹</a>
                <a class="carousel-control right" href="#leorelatedcarousel" data-slide="next">›</a>
            </div>
            @endif

            <div class="carousel-inner">

                @for ($i = 0; $i < count($related_products); $i=$i+3)
                @if($i==0)<?php $active = "active"; ?> @else <?php $active = ""; ?> @endif
                <div class="item {{$active}}">
                    <div class="row-fluid">

                        @for($j=0;$j<3;++$j)
                        @if($i+$j < count($related_products))

                        <?php $images = $related_products[$i + $j]->images; ?>
                        <?php $id = $related_products[$i + $j]->id;
                        $category_name = $related_products[$i + $j]->category->name;
                        $product_name = $related_products[$i + $j]->name;
                        $url = URL::to("$category_name/$product_name-$id");
                        ?>

                        <div class="p-item myspan4 product_block ajax_block_product first_item p-item clearfix">
                            <div class="product-container">
                                <a href="{{$url}}" title="{{$related_products[$i + $j]->name}}"
                                   class="product_image">

                                    @if(isset($images))
                                    <?php $image = HtmlUtil::getPrimaryImage($images); ?>
                                    <?php $path = $image['path']; ?>
                                    @if(!is_null($path))
                                    <img src="{{URL::to($path)}}">
                                    <!--                                    <span class="new">New</span>-->
                                </a>

                                @else
                                <img src="http://placehold.it/300X300" alt=""/>
                                @endif
                                @endif


                                <h5 class="s_title_block">
                                    <a href="" title="">{{$related_products[$i + $j]->name}}</a></h5>

                                <div class="product_desc">{{$related_products[$i + $j]->description}}</div>
                                <div>
                                    <p class="price_container"><span class="price">
                                            <span class="WebRupee"> Rs. </span>{{$related_products[$i + $j]->list_price}}</span>
                                    </p>

                                    <input type="hidden" data-item-type="product" data-id="{{$id}}" name="qty"
                                           id="quantity_wanted"
                                           class="text qty_{{$id}}" value="1"
                                           size="2">
                                    <a class="exclusive ajax_add_to_cart_button cart_btn" href="#"
                                       style="background: white!important;"
                                       data-id="{{$id}}">Add to cart</a>
                                </div>
                            </div>
                        </div>

                        @endif
                        @endfor

                    </div>
                </div>
                @endfor
            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('.blockleorelatedproducts .carousel').each(function () {
            $(this).carousel({
                pause: true,
                interval: false
            });
        });

    });
</script>
@endif