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
                                src="{{asset('frontoffice/img/designer-island-hood/bread-maker.jpg')}}" alt=""
                                title="Glen Bread Maker" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Enjoy the delicious aroma of freshly baked bread in your own kitchen every day: with the Glen
                            bread maker.</p>

                        <p>This intelligent appliance takes care of every stage of dough preparation for you. All you
                            have
                            to do is pour in the ingredients and, after an hour or two, your favourite, aromatic bread
                            will
                            be ready.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span6">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/bread-maker/detachable-pan.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Detachable non-stick baking pan</h5>
                                    </div>

                                </div>
                                <div class="span6">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/bread-maker/electronic-panel.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Electronic control panel</h5>
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