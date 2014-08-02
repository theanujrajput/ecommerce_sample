@extends('layouts.frontoffice.homepage_default')
@section('content')

<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js"></script>


<section id="slideshow" class="hidden-phone">
    <div class="container">
        <div class="row-fluid">
            <div><img src="{{asset('frontoffice/img/slider1.png')}}"/></div>

            <div class="customhtml leo-customhtml-slideshow  ">
                <div class="block_content clearfix">
                    <div class="banner-welcome-wrap">
                        <div class="banner-welcome">
                            <h5>World-class appliances from Glen complement your contemporaty lifestyle.</h5>

                            <p>Come experience the exciting world of possibilities from Glen</p>
                        </div>
                        <div class="buytheme"><a class="btn" href="#">Explore Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="columns" class="clearfix">
<div class="container">
<div class="row-fluid">

<!-- Center -->
<section id="center_column" class="span12">
<div class="contenttop row-fluid">
    <div id="homecontent-displayHome">
        <div class="leo-custom">
            <div class="row-fluid">
                <div class="span4"><img src="{{asset('frontoffice/modules/leomanagemodules/img/img-adv3.png')}}"
                                        alt=""/></div>
                <div class="span4"><img src="{{asset('frontoffice/modules/leomanagemodules/img/img-adv1.jpg')}}"
                                        alt=""/></div>
                <div class="span4"><img src="{{asset('frontoffice/modules/leomanagemodules/img/img-adv2.jpg')}}"
                                        alt=""/></div>
            </div>
        </div>

        <!--        latest offers starts here-->
        <div class="leo-carousel">
            <div id="blockleohighlightcarousel-new"
                 class="block products_block exclusive blockleohighlightcarousel span6 blue">
                <h3 class="title_block">Latest Offers</h3>

                <div class="block_content">

                    <div class="carousel slide" id="new-7-carousel"><a class="carousel-control left"
                                                                       href="#new-7-carousel"
                                                                       data-slide="prev">&lsaquo;</a> <a
                            class="carousel-control right" href="#new-7-carousel" data-slide="next">&rsaquo;</a>

                        <div class="carousel-inner">

                            @if(!is_null($latest_offers))

                            @for ($i = 0; $i < count($latest_offers); $i=$i+2)

                            @if($i==0)<?php $active="active"; ?> @else <?php $active=""; ?> @endif
                            <div class="item {{$active}}">

                                <div class="row-fluid">
                                    @for($j=0;$j<2;++$j)

                                    @if($i+$j < count($latest_offers))
                                    <div
                                        class="p-item myspan6 product_block ajax_block_product first_item p-item clearfix">
                                        <div class="product-container"><a href="#" title="Ut congue quam"
                                                                          class="product_image"><img
                                                    src="img/p/3/1/31-home_default.jpg" alt="Ut congue quam"></a>
                                            <h5 class="s_title_block"><a href="#" title="Ut congue quam">Induction
                                                    Cooker/GL 3079</a></h5>

                                            <div class="product_desc"><a href="#" title="More"> Buy super slim Induction
                                                    Cooker and a 3 Ltr pressure cooker free</a></div>
                                            <div>
                                                <p class="price_container"><span class="price">Rs.5090</span></p>
                                                <!--<span class="exclusive">Add to cart</span> --></div>
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
    </div>
    <!-- latest offers ends here-->

    <script>
        $(document).ready(function () {
            $('.carousel').each(function () {
                $(this).carousel({
                    pause: true,
                    interval: false
                });
            });
            // Using custom configuration
            $('#custom_carousel').carouFredSel({
                items: 2,
                direction: "left",
                scroll: {
                    items: 1,
                    easing: "elastic",
                    duration: 1000,
                    pauseOnHover: true
                }
            });

        });
    </script>

    <!-- MODULE Home Featured Products -->
    <div id="featured-products_block_center" class="block products_block clearfix span6 red">
        <h3 class="title_block">Featured products</h3>

        <div class="block_content">
            <div style="min-height:280px;" class=" carousel slide" id="homefeatured"><a class="carousel-control left"
                                                                                        href="#homefeatured"
                                                                                        data-slide="prev">&lsaquo;</a>
                <a class="carousel-control right" href="#homefeatured" data-slide="next">&rsaquo;</a>

                <div class="carousel-inner">
                    <div class="item active">
                        <div class="p-item ajax_block_product first_item last_item_of_line ">
                            <div class="product-container">
                                <div class="row-fluid">
                                    <div class="center_block span6"><a href="#" title="iPod Nano" class="product_image"><img
                                                src="img/p/2/7/27-home_default.jpg" alt="iPod Nano"></a></div>
                                    <div class="right_block span6">
                                        <h5 class="s_title_block"><a href="#" title="iPod Nano">Built-in-Hobs/GL 1060
                                                MXT PRO</a></h5>

                                        <div class="product_desc"><a href="#" title="More"> A four burner, 60 cm wide,
                                                built in hob</a></div>
                                        <p class="price_container"><span class="price">Rs.11,691</span></p>
                                        <!--<span class="exclusive">Add to cart</span> --></div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item ajax_block_product last_item last_item_of_line last_line">
                            <div class="product-container">
                                <div class="row-fluid">
                                    <div class="center_block span6"><a href="#" title="iPod shuffle"
                                                                       class="product_image"><img
                                                src="img/p/2/8/28-home_default.jpg" alt="iPod shuffle"></a></div>
                                    <div class="right_block span6">
                                        <h5 class="s_title_block"><a href="#" title="iPod shuffle">Designer Hood
                                                Chimneys/GL 1022 IS</a></h5>

                                        <div class="product_desc"><a href="#" title="More"> A new look island hood for
                                                contemporary kitchen</a></div>
                                        <p class="price_container"><span class="price">Rs.38,691</span></p>
                                        <!--<a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_2" href="#" title="Add to cart">Add to cart</a>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="p-item ajax_block_product first_item last_item_of_line ">
                            <div class="product-container">
                                <div class="row-fluid">
                                    <div class="center_block span6"><a href="#"
                                                                       title="Shure SE210 Sound-Isolating Earphones for iPod and iPhone"
                                                                       class="product_image"><img
                                                src="img/p/3/0/30-home_default.jpg"
                                                alt="Shure SE210 Sound-Isolating Earphones for iPod and iPhone"></a>
                                    </div>
                                    <div class="right_block span6">
                                        <h5 class="s_title_block"><a href="#"
                                                                     title="Shure SE210 Sound-Isolating Earphones for iPod...">Shure
                                                SE210 Sound-Isolating...</a></h5>

                                        <div class="product_desc"><a href="#" title="More"> Evolved from personal
                                                monitor technology road-tested by pro...</a></div>
                                        <p class="price_container"><span class="price">$124.58</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="p-item ajax_block_product last_item last_item_of_line last_line">
                            <div class="product-container">
                                <div class="row-fluid">
                                    <div class="center_block span6"><a href="#" title="Ut congue quam"
                                                                       class="product_image"><img
                                                src="img/p/3/1/31-home_default.jpg" alt="Ut congue quam"></a></div>
                                    <div class="right_block span6">
                                        <h5 class="s_title_block"><a href="#" title="Ut congue quam">Ut congue quam</a>
                                        </h5>

                                        <div class="product_desc"><a href="#" title="More"> MacBook Air is ultrathin,
                                                ultraportable, and ultra unlike...</a></div>
                                        <p class="price_container"><span class="price">$1,504.18</span></p>
                                        <!--<span class="exclusive">Add to cart</span> --></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /MODULE Home Featured Products -->

</div>
<!-- end div block_home -->
<div id="contentbottom">
    <div id="homecontent-displayContentBottom">
        <div class="leo-carousel">
            <div id="blockleohighlightcarousel-bestseller" class="block products_block green">
                <div class="row-fluid">
                    <h3 class="title_block">Our Products</h3>

                    <div class="block_content">
                        <div class="carousel slide" id="bestseller-10-carousel"><a class="carousel-control left"
                                                                                   href="#bestseller-10-carousel"
                                                                                   data-slide="prev">&lsaquo;</a> <a
                                class="carousel-control right" href="#bestseller-10-carousel"
                                data-slide="next">&rsaquo;</a>

                            <div class="carousel-inner">
                                <div class="item active">
                                    <div class="row-fluid">
                                        <div style="border-bottom:0"
                                             class="p-item span3 ajax_block_product first_item clear ">
                                            <div class="product-container">
                                                <div class="center_block"><a href="#" title="Aliquam iaculis sapien"
                                                                             class="product_image"> <img
                                                            src="{{asset('frontoffice/img/p/2/8/28-home_default.jpg')}}"
                                                            alt="Aliquam iaculis sapien"> </a></div>
                                                <div class="right_block">
                                                    <h5 class="s_title_block"><a href="#"
                                                                                 title="Aliquam iaculis sapien">Chimneys</a>
                                                    </h5>
                                                    <!--<div class="product_desc"><a href="#" title="More"> Glen Rice cookers are smart little devices designed to give you delicious rice at the push of button.</a></div>-->

                                                </div>
                                            </div>
                                        </div>
                                        <div style="border-bottom:0" class="p-item span3 ajax_block_product    ">
                                            <div class="product-container">
                                                <div class="center_block"><a href="#" title="iPod Nano"
                                                                             class="product_image"> <img
                                                            src="{{asset('frontoffice/img/p/2/10/22.jpg')}}"
                                                            alt="iPod Nano"> </a></div>
                                                <div class="right_block">
                                                    <h5 class="s_title_block"><a href="#" title="iPod Nano">Cooktops</a>
                                                    </h5>
                                                    <!-- <div class="product_desc"><a href="#" title="More"> Outstanding aesthetics and efficient capability in cooking. Yes, this is precisely what has been kept  </a></div>
                                              <div>
                                                <p class="price_container"><span class="price">Rs.11,691</span></p>
                                                add to cart
                                                <span class="exclusive">Add to cart</span>
                                                end add to cart

                                              </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div style="border-bottom:0" class="p-item span3 ajax_block_product    ">
                                            <div class="product-container">
                                                <div class="center_block"><a href="#"
                                                                             title="Shure SE210 Sound-Isolating Earphones for iPod and iPhone"
                                                                             class="product_image"> <img
                                                            src="{{asset('frontoffice/img/p/3/0/30-home_default.jpg')}}"
                                                            alt="Shure SE210 Sound-Isolating Earphones for iPod and iPhone">
                                                    </a></div>
                                                <div class="right_block">
                                                    <h5 class="s_title_block"><a href="#"
                                                                                 title="Shure SE210 Sound-Isolating...">Built-In-Appliances</a>
                                                    </h5>
                                                    <!--<div class="product_desc"><a href="#" title="More"> Enjoy yourself as you cook, right from putting the ingredients together to the preparations</a></div>
                                              <div>
                                                <p class="price_container"><span class="price">Rs.55,990</span></p>
                                                add to cart
                                                <a class="exclusive ajax_add_to_cart_button" rel="ajax_id_product_7" href="#" title="Add to cart">Add to cart</a>
                                                end add to cart

                                              </div>-->
                                                </div>
                                            </div>
                                        </div>
                                        <div style="border-bottom:0"
                                             class="p-item span3 ajax_block_product last_item last_item_of_line ">
                                            <div class="product-container">
                                                <div class="center_block"><a href="#" title="Donec ultrices eratm"
                                                                             class="product_image"> <img
                                                            src="{{asset('frontoffice/img/p/3/3/33-home_default.jpg')}}"
                                                            alt="Donec ultrices eratm"> </a></div>
                                                <div class="right_block">
                                                    <h5 class="s_title_block"><a href="#" title="Donec ultrices eratm">Small
                                                            Appliances</a></h5>
                                                    <!--<div class="product_desc"><a href="#" title="More"> Induction is a powerful cooking medium, just like or even better than gas</a></div>
                                              <div>
                                                <p class="price_container"><span class="price">Rs.2,690</span></p>
                                                add to cart
                                                <span class="exclusive">Add to cart</span>
                                                end add to cart

                                              </div>-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="leo-custom">
            <div class="row-fluid">
                <div class="span3" style="line-height:200px;">
                    <p><img src="{{asset('frontoffice/modules/leomanagemodules/img/custombottom1.jpg')}}" alt=""/></p>
                </div>
                <div class="span7">
                    <div class="fb-like-box" data-href="https://www.facebook.com/GlenIndia" data-width="540"
                         data-height="200" data-colorscheme="light" data-show-faces="true" data-header="false"
                         data-stream="false" data-show-border="false"></div>
                </div>
                <div style="line-height:220px;" class="span2">
                    <p class="findout">Stay Connected</p>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function () {
            $('.carousel').each(function () {
                $(this).carousel({
                    pause: true,
                    interval: false
                });
            });
            $(".blockleoproducttabs").each(function () {
                $(".nav-tabs li", this).first().addClass("active");
                $(".tab-content .tab-pane", this).first().addClass("active");
            });
        });
    </script>
</div>
</section>
</div>
</div>
</section>


@stop