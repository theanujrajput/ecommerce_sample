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
                <?php $current_page = "Kitchen Appliances"; ?>
                @include('_partials.frontoffice.breadcrumb')
                <!-- /Breadcrumb -->

                <div class="content_scene_cat">
                    <!-- Category image -->
                    <div class="align_center"><img
                            src="{{asset('frontoffice/img/designer-island-hood/food-processor.jpg')}}" alt=""
                            title="Glen Built-in-Induction-Hob" id="categoryImage"/></div>
                </div>
                <div class="chimney-category">
                    <p>The new Glen food processor GL 4052 is a versatile kitchen machine designed to make working in
                        the kitchen fast, convenient and pleasant. It takes care of all your pre-cooking tasks, making
                        them simple and convenient. It chips, chops, slices, shreds, whisks, kneads, shreds coconut and
                        does much much more.
                        Moreover the smart mixer grinder attachment, with three jars, takes care of all blending,
                        grinding tasks and prepares tongue tickling chutneys too. Prepare fresh & healthy fruit &
                        vegetable juices for friends and family with the juice extractor and the new design citrus
                        juicer</p>
                </div>
                <div class="row-fluid chimney-category-features">
                    <div class="span12 chimney-category-features-content">
                        <div class="row-fluid">
                            <div class="span4">
                                <div class="row-fluid">
                                    <h5></h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/compact-rack.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>A compact rack which houses almost all the accessories conveniently. Moreover it
                                        fits comfortably inside the bowl for a convenient storage and a minimum shelf
                                        space.</p>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="row-fluid">
                                    <h5></h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/jar.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>3 Jars for liquidising, wet & dry grinding and chutney
                                        making. The blades and jars are made of special food grade 304 stainless steel
                                        which do not effect the food quality even when they get heated up.</p>
                                </div>
                            </div>

                            <div class="span4">
                                <div class="row-fluid">
                                    <h5></h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/better-balancing.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p><strong>Better Balancing, Better Operations</strong> In the food processor GL
                                        4052 the feeder tube is specially designed in the centre of the machine. This
                                        helps reduce vibrations during operation and makes the processing results much
                                        better.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>

                <div class="row-fluid chimney-category-features">
                    <div class="span12 chimney-category-features-content">
                        <div class="row-fluid">
                            <div class="span3">
                                <div class="row-fluid">
                                    <h5>Spill-proof bowl</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/spill-proff-jar.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>A large capacity revolutionary new bowl, designed without a centre tube. It has a
                                        specially designed spindle, which gets locked in the bowl and seals it
                                        perfectly. This prevents overflow and spillage of liquids while working or while
                                        removing the processing blades.</p>
                                </div>
                            </div>

                            <div class="span3">
                                <div class="row-fluid">
                                    <h5>Low RPM citrus press</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/low-rpm.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>The RPM of this specially designed citrus press has been reduced to a minimum for
                                        a convenient operation & better juicing of citrus
                                        fruits. Moreover the cone is specially positioned at an off-centre position to
                                        allow for more space &amp; a better grip while juicing.</p>
                                </div>
                            </div>

                            <div class="span3">
                                <div class="row-fluid">
                                    <h5>Multi-flow liquidiser</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/multi-flow.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>The new liquidiser now comes with a unique design multi-flow lid. No need to
                                        remove the lid, simply slide the pointer near the handle to adjust to the three
                                        possible pouring settings 'open', 'sieve' or closed'. Choose your shakes as you
                                        like, with or without ice.</p>
                                </div>
                            </div>

                            <div class="span3">
                                <div class="row-fluid">
                                    <h5>Easily changeable blades</h5>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/food-processor/easy-changable.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <p>A single disc with easy to fit interchangeable blades for shredding, slicing,
                                        chipping and grating. For maximum safety during handling, all these blades are
                                        mounted in a special plastic body. No sharp edges, no difficult locks, safety
                                        and convenience at its best.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View
                    Products </a>

                <div class="clearfix"></div>
                <hr/>


                <!-- end div block_home -->

        </div>
    </div>
</section>

<!--feedback slide box partial-->
@include('_partials.frontoffice.feedback_slide_box')

@stop