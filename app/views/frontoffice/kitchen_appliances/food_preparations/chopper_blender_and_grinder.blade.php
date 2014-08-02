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
                                src="{{asset('frontoffice/img/designer-island-hood/chopper.jpg')}}" alt=""
                                title="Glen Chopper, Blender &amp; Grinder" id="categoryImage"/>
                        </div>
                    </div>
                    <div class="chimney-category">
                        <p>Kitchen tasks call for instant processing of small quantities of food. Glen brings you a
                            range of compact machines ideal for blending, chopping,
                            grinding, mashing and pureeing small quantities.</p>

                        <p>Make frothy shakes with the hand blender and seedless tomato puree with the mini blender. The
                            mini chopper chops onions and mashes bananas for baby food in a jiffy. The mini grinder is
                            ideal for fresh grinding of coffee beans and spices. Glen makes all kitchen tasks simple and
                            convenient.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/chopper/tomato-puree.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Makes tomato puree</h5>
                                    </div>
                                </div>

                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/chopper/chops-onion.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Chops onion and vegetables</h5>
                                    </div>
                                </div>

                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/chopper/small-quantity-nuts.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Chops small quantities of nuts instantly
                                        </h5>
                                    </div>
                                </div>

                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/chopper/whisks-eggs.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Whisks eggs in a jiffy</h5>
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