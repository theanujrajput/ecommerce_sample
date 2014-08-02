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
                                src="{{asset('frontoffice/img/designer-island-hood/tea-maker-kettles.jpg')}}" alt=""
                                title="Glen Tea Maker &amp; Kettles" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>The Kettle That Makes Tea, Perfectly For the perfectly balanced brew,
                            different teas need to be steeped for different time durations.</p>

                        <p>The Glen Tea Maker makes this convenient, just move the stainless steel tea filter assembly
                            up
                            and down, gently agitating the leaves to precisely infuse
                            your tea. Now, enjoy a perfect cup of tea, every time.</p>

                        <p>Detach the filter assembly and it's a glass kettle. Perfect kettle. Perfect tea.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">


                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/kettle-tea-maker/detach-filter.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Detach the filter assembly and it's a glass kettle</p>
                                    </div>
                                </div>

                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/kettle-tea-maker/cordless.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Cordless with 360 degree rotational base</p>
                                    </div>
                                </div>

                                <div class="span4">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/kettle-tea-maker/stainless.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Stainless steel tea filter assembly</p>
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