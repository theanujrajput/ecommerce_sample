<script type="text/javascript">
    $(document).ready(function () {

        $('.latest_products').click(function () {

            var latest_product = $(this);
            var url = latest_product.data('url');
            window.location.href = url;

        });

    });
</script>

<!--        latest offers starts here-->
<div class="leo-carousel">
    <div id="blockleohighlightcarousel-new"
         class="block products_block exclusive blockleohighlightcarousel span6 blue">
        <h3 class="title_block">Latest Offers</h3>

        <div class="block_content">

            <div class="carousel slide" id="new-7-carousel"><a class="carousel-control left"
                                                               href="#new-7-carousel"
                                                               data-slide="prev">&lsaquo;</a> <a
                    class="carousel-control right" href="#new-7-carousel"
                    data-slide="next">&rsaquo;</a>

                <div class="carousel-inner">

                    @if(!is_null($latest_offers))

                    @for ($i = 0; $i < count($latest_offers); $i=$i+2)

                    @if($i==0)<?php $active = "active"; ?> @else <?php $active = ""; ?> @endif
                    <div class="item {{$active}}">
                        <div class="row-fluid">
                            @for($j=0;$j<2;++$j)
                            @if($i+$j < count($latest_offers))

                            <?php $images = $latest_offers[$i + $j]->images; ?>
                            <?php $id = $latest_offers[$i + $j]->id;
                            $category_name = $latest_offers[$i + $j]->category->name;
                            $product_name = $latest_offers[$i + $j]->name;
                            $url = URL::to("$category_name/$product_name-$id");
                            ?>


                            <div
                                class="p-item latest_products myspan6 product_block ajax_block_product first_item p-item clearfix"
                                data-url="{{$url}}">
                                <div class="product-container"><a
                                        href="{{$url}}"
                                        title="Ut congue quam"
                                        class="product_image">

                                        @if(isset($images))
                                        <?php $image = HtmlUtil::getPrimaryImage($images); ?>
                                        <?php $path = $image['path']; ?>

                                        @if(!is_null($path))
                                        <img src="{{URL::to($path)}}" alt="" class="tab_image"/>
                                        @else
                                        <img src="http://placehold.it/300X300" alt=""/>
                                        @endif
                                        @endif


                                        <h5 class="s_title_block">
                                            <a href="" title="Ut congue quam">
                                                {{$latest_offers[$i+$j]->name}}
                                            </a>
                                        </h5>

                                        <div class="product_desc">
                                            <a href="#" title="More">{{$latest_offers[$i+$j]->description}}</a>
                                        </div>
                                        <div>
                                            <p class="price_container">
                                                <span class="price"><span class="WebRupee">Rs.</span>{{$latest_offers[$i +$j]->list_price}}</span>
                                            </p>
                                        </div>
                                        <br/>
                                </div>
                            </div>

                            @endif
                            @endfor
                        </div>
                    </div>
                    @endfor
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>