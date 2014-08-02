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
                    <?php $current_page = "Cooking Appliances"; ?>
                    @include('_partials.frontoffice.breadcrumb')
                    <!-- /Breadcrumb -->

                <div class="content_scene_cat">
                    <!-- Category image -->
                    <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/cooking-range.jpg')}}" alt=""
                                                   title="SS / ISI cooktops" id="categoryImage"/></div>
                </div>
                <div class="chimney-category">
                    <p>Glen's Classic range of cookers combine exceptional build quality with superb all-round
                        performance. They offer a variety of features, such as the high energy triple ring burner for
                        faster cooking, a motorised rotisserie for perfect
                        grilling, a convenient multi-spark auto ignition. A light in the oven for easy viewing and a
                        minute minder to keep the time tab. Simply experience the best part of cooking with the sheer
                        form, function and capabilities of the
                        Glen Cooking Range.</p>
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