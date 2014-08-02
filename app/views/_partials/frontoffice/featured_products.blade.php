<script type="text/javascript">

    $(document).ready(function () {

        $('.featured_products').click(function () {

            var feature_product = $(this);
            var url = feature_product.data('url');
            window.location.href = url;

        });

    });


</script>


<div id="featured-products_block_center" class="block products_block clearfix span6 red">
    <h3 class="title_block">Featured products</h3>

    <div class="block_content">
        <div style="min-height:280px;" class=" carousel slide" id="homefeatured"><a class="carousel-control left"
                                                                                    href="#homefeatured"
                                                                                    data-slide="prev">&lsaquo;</a> <a
                class="carousel-control right" href="#homefeatured" data-slide="next">&rsaquo;</a>

            <div class="carousel-inner">

                @if(!is_null($featured_products))
                @for ($i = 0; $i < count($featured_products); $i=$i+2)
                @if($i==0)<?php $active = "active"; ?> @else <?php $active = ""; ?> @endif

                <div class="item {{$active}}">

                    @for($j=0;$j<2;++$j)
                    @if($i+$j < count($featured_products))

                    <?php $images = $featured_products[$i + $j]->images; ?>
                    <?php $id = $featured_products[$i + $j]->id;
                    $category_name = $featured_products[$i + $j]->category->name;
                    $product_name = $featured_products[$i + $j]->name;

                    ?>
                    @if(isset($images))
                    <?php $image = HtmlUtil::getPrimaryImage($images); ?>
                    <?php $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                    $title = isset($image['title']) ? $image['title'] : $featured_products[$i + $j]->name;
                    ?>
                    @else
                    <?php $path = Constants::DEFAULT_300_IMAGE;;
                    $title = $featured_products[$i + $j]->name;
                    ?>
                    @endif

                    <?php $url = URL::to("$category_name/$product_name-$id"); ?>

                    <div class="p-item featured_products ajax_block_product first_item last_item_of_line"
                         data-url="{{$url}}">
                        <div class="product-container">
                            <div class="row-fluid">
                                <div class="center_block span6"><a href="{{$url}}" title="{{$title}}"
                                                                   class="product_image">
                                        <img src="{{URL::to($path)}}" alt="{{$title}}"></a></div>
                                <div class="right_block span6">
                                    <h5 class="s_title_block"><a href="{{$url}}">
                                            {{$featured_products[$i+$j]->name}}</a></h5>

                                    <div class="product_desc"><a href="{{$url}}" title="More">
                                            {{$featured_products[$i+$j]->description}}</a></div>
                                    <p class="price_container">
                                        <span class="price"><span class="WebRupee"> Rs. </span>{{$featured_products[$i+$j]->list_price}}</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endfor

                </div>

                @endfor
                @endif

            </div>

        </div>
    </div>
</div>

