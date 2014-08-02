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
                                src="{{asset('frontoffice/img/designer-island-hood/glass-grill.jpg')}}" alt=""
                                title="Glen Glass Grill" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>The Glen Glass Grill is designed to cook a variety of foods directly on a durable ceramic
                            glass
                            surface with even heat distribution for better consistent cooking.</p>

                        <p>The non-porous glass-ceramic helps keep the nutrients and natural food juices intact, making
                            grilled food juicy, delicious and succulent with wonderful flavor and fragrance.</p>

                        <p>A portable, healthy and safe alternative to conventional grilling, with no chemicals or toxic
                            fumes to harm the environment.</p>

                        <p>In addition a range of sandwich makers for the best sandwiches to complement your morning
                            tea.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">

                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/glass-grill/1.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                </div>
                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/glass-grill/2.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                </div>
                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/glass-grill/3.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5></h5>
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