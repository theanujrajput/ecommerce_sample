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
                                src="{{asset('frontoffice/img/designer-island-hood/induction-cooker.jpg')}}" alt=""
                                title="Glen Indcuction Cooker" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>A new better way to cook !</p>

                        <p>A<strong> powerful cooking medium</strong>, just like or even better than gas, which is till
                            today known as the most powerful cooking medium. </p>

                        <p><strong>Instant & precise heat control</strong>, unlike electric cooking where the elements
                            take
                            time to heat and cool, resulting in lack of proper control on the dishes being cooked.</p>

                        <p><strong>No heat wastage</strong> as the energy is supplied directly to the cooking vessel
                            unlike
                            gas or conventional electric cookers where they end up heating your kitchen and you, instead
                            of
                            heating up the food.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/induction-cooker/high-safety.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>High Safety</h5>
                                    </div>
                                    <div class="row-fluid">
                                        <p>No open flames, no fire hazards, no gas leakages. The glass top stays cool
                                            that
                                            means no burnt fingers or hands.</p>
                                    </div>
                                </div>

                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/induction-cooker/no-heat-wastage.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>No Heat Wastage</h5>
                                    </div>
                                    <div><p>Energy is supplied directly to the cooking vessel and not to the kitchen
                                            environment</p>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                    <div class="row-fluid">

                                        <p>Easy-to-clean black ceramic glass surface resistant to scratching, staining,
                                            impact and heat.</p>

                                        <p>Cookware sensing-elements will not be energized without an
                                            inductioncompatible
                                            pan on the cooktop surface</p>

                                        <p>Temperature limiter to ensure that safe operating temperature of ceramic
                                            glass is
                                            never exceeded</p>

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>


                    <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View
                        Products </a>

                    <div class="clearfix"></div>
                    <hr/>

                </div>
        </div>
</section>

<!--feedback slide box partial-->
@include('_partials.frontoffice.feedback_slide_box')

@stop