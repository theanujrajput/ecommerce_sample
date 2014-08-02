@extends('layouts.frontoffice.homepage_default')
@section('content')

<script type="text/javascript"
        src="//cdnjs.cloudflare.com/ajax/libs/jquery.caroufredsel/6.2.1/jquery.carouFredSel.packed.js"></script>


<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">

            <!-- Center -->
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">
                    <div id="homecontent-displayHome">
                        <div class="leo-custom">
                            <div class="row-fluid">
                                <div class="span4"><img
                                        src="{{asset('frontoffice/modules/leomanagemodules/img/img-adv3.png')}}"
                                        alt=""/></div>
                                <div class="span4"><img
                                        src="{{asset('frontoffice/modules/leomanagemodules/img/img-adv1.jpg')}}"
                                        alt=""/></div>
                                <div class="span4"><img
                                        src="{{asset('frontoffice/modules/leomanagemodules/img/img-adv2.jpg')}}"
                                        alt=""/></div>
                            </div>
                        </div>

                        <!-- MODULE Home Latest Offers -->
                        @include('_partials.frontoffice.latest_products')
                        <!-- /MODULE Home Latest Offers -->
                    </div>



                    <!-- MODULE Home Featured Products -->
                    @include('_partials.frontoffice.featured_products')
                    <!-- /MODULE Home Featured Products -->

                </div>
                <!-- end div block_home -->
                <div id="contentbottom">
                    <div id="homecontent-displayContentBottom">
                        <div class="leo-custom">
                            <div class="row-fluid">
                                <div class="span3" style="line-height:200px;">
                                    <p>
                                        <img
                                            src="{{asset('frontoffice/modules/leomanagemodules/img/custombottom1.jpg')}}"
                                            alt=""/></p>
                                </div>
                                <div class="span7">
                                    <div class="fb-like-box" data-href="https://www.facebook.com/GlenIndia"
                                         data-width="540"
                                         data-height="200" data-colorscheme="light" data-show-faces="true"
                                         data-header="false"
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

<script>
    $(document).ready(function () {
        $('.carousel').each(function () {
            $(this).carousel({
                pause: true,
                interval: false
            });
        });
//        // Using custom configuration
//        $('#custom_carousel').carouFredSel({
//            items: 2,
//            direction: "left",
//            scroll: {
//                items: 1,
//                easing: "elastic",
//                duration: 1000,
//                pauseOnHover: true
//            }
//        });

    });
</script>



@stop