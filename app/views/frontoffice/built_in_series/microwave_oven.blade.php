@extends('layouts.frontoffice.default')

@section('content')

<!--fb slide partial view-->
@include('_partials.frontoffice.fb_slide_box')


<section id="columns" class="clearfix">
    <div class="container">
        <div class="row-fluid">

            <!-- Left -->

            <!-- Center -->
            <section id="center_column" class="span12">
                <div class="contenttop row-fluid">

                <!-- Breadcrumb -->
                <?php $current_page="Built In Series"; ?>
                @include('_partials.frontoffice.breadcrumb')
                <!-- /Breadcrumb -->

                <div class="content_scene_cat">
                    <!-- Category image -->
                    <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/buil-in-oven.jpg')}}" alt=""
                                                   title="Glen Built-in-Oven" id="categoryImage"/></div>
                </div>
                <div class="chimney-category">
                    <p style="font-weight:600;">There is a Glen oven for every kind of kitchen and every type of
                        lifestyle.</p>

                    <p>Aseries of top of the line ovens with exceptional performance and an
                        uncompromising attention to detail – not only in the way they work, but also in the way they
                        look. A minimalist design that complements any kitchen. Featuring innovative touch control
                        technology, every Glen oven delivers outstanding results, whatever the cooking task.</p>
                </div>
                <div class="row-fluid chimney-category-features">
                    <div class="span12 chimney-category-features-content">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="row-fluid">
                                    <h5>LED Touch control& LCD Display</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/built-in-series/built-in-oven/led-touch-control.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>The intuitive control panel lets you swiftly access all the functions, the
                                        electronic timer, minute minder and clock. You can also see the current cooking
                                        time and temperature.</p>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="row-fluid">
                                    <h5>Pre-set Auto Cooking</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/built-in-series/built-in-oven/pre-set-auto-cooking.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>The auto cook menu gives you a set of preset cooking modes,
                                        each designed to provide you with the best possible results. Includes food
                                        weight and temperature for optimum results. You can also create and save your
                                        own customized programs.</p>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="row-fluid">
                                    <h5>Stainless steel interior</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/built-in-series/built-in-oven/ss-interior.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>The stainless steel interior not only looks great, but its wipe clean surface
                                        makes hygiene a top priority too. Telescopic shelves, catalytic liners and large
                                        side lights.</p>
                                </div>
                            </div>


                        </div>
                        <div class="clearfix"></div>
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="row-fluid">
                                    <h5>Self-cleaning technology</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/built-in-series/built-in-oven/self-cleaning-tech.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>Forget scrubbing your oven. Selfcleaning technology, works by
                                        heating the oven to 500&deg;C, causing even hidden-away and baked-on grime to
                                        carbonise into a fine ash. When it's done, just use a damp sponge to wipe the
                                        ash out. Not only does it save you vast amounts of grease, it actually improves
                                        oven efficiency over time too.</p>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="row-fluid">
                                    <h5>Doors</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/built-in-series/built-in-oven/door.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <p>Sealed cool-touch doors fitted
                                        with high quality hinges and
                                        double layer full-width glass.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View
                    Products </a>

                <div class="clearfix"></div>
                <hr/>

                <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/set-of-three-oven.jpg')}}" alt=""
                                               title="Built-in micro / steam / oven" id="categoryImage"/></div>

                <div class="chimney-category">
                    <p>The troika; a conventional oven, a steam oven and a microwave makes your kitchen ready for
                        anything, from steam to turbo grill to defrost. Intuitive touch controls and an LCD display for
                        both steam and conventional cooking and an auto cook menu that covers a range of dishes. In
                        addition a built-in microwave with clever technology and perfect for making quick and easy
                        snacks as well as serious cooking. All so easy to use and when you're finished it will clean
                        itself.</p>
                </div>
                <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View
                    Products </a>

                <div class="clearfix"></div>
                <!-- end div block_home -->

        </div>
    </div>
</section>


<!--feedback slide box partial-->
@include('_partials.frontoffice.feedback_slide_box')


@stop