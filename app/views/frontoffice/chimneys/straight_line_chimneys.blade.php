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
                    <?php $current_page = "Glen Chimneys"; ?>
                    @include('_partials.frontoffice.breadcrumb')
                    <!-- /Breadcrumb -->

                    <div class="content_scene_cat">
                        <!-- Category image -->
                        <div class="align_center"><img
                                src="{{asset('frontoffice/img/designer-island-hood/straight-line-chimney.jpg')}}" alt=""
                                title="Glen Straight Line Chimney" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Stylish straight hoods designed to be fitted against the wall or directly below the cabinet.
                            Great aesthetics with smooth and rounded contours, coupled with an intelligent
                            technology.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">

                                <div class="span6">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/straightline-chimney/more-power.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>More Power</h5>
                                    </div>
                                    <div class="row-fluid">
                                        <p>The revolutionary bi-rotational technology gives powerful suction and a
                                            greater
                                            efficiency.</p>
                                    </div>

                                </div>
                                <div class="span6">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/straightline-chimney/Discerning-Safety.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Discerning Safety</h5>
                                    </div>
                                    <div class="row-fluid">
                                        <p>The thermal overheat protector prevents motor burnout. The housing is made
                                            with
                                            special flame retardant low smoke ingredients.</p>
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