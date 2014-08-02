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
                    <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/banner.jpg')}}" alt=""
                                                   title="Glen Designer Island Hood Chimney" id="categoryImage"/></div>
                </div>
                <div class="chimney-category">
                    <p>Bold and distinctive, these hoods suspend over a central island unit and can make a stunning
                        focal point. Sculpted
                        from stainless steel, with an accent of glass, these free standing designs ooze style. While
                        under the hood, it's all
                        about performance.</p>
                </div>
                <div class="row-fluid chimney-category-features">
                    <div class="span6 chimney-category-features-content">
                        <div class="row-fluid">
                            <div class="span6">
                                <div class="row-fluid">
                                    <h5>LED lighting</h5>
                                </div>
                                <div class="row-fluid">
                                    <p>Environment friendly, power saving, LED lamps with exceptionally long life,
                                        effectively illuminate the hob area for convenient cooking.</p>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/chimney-category/img/led-lighting.jpg')}}"/></div>
                            </div>
                            <div class="span6">
                                <div class="row-fluid">
                                    <h5>Design</h5>
                                </div>
                                <div class="row-fluid">
                                    <p>Bold and distinctive. Premium materials are combined to create a
                                        statement hood that provides an unrivalled blend of performance.</p>
                                </div>
                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/chimney-category/img/design.jpg')}}"/></div>
                            </div>
                        </div>
                    </div>
                    <div class="span6 chimney-category-features-content">
                        <div class="row-fluid">
                            <h5>Intelligent controls</h5>
                        </div>
                        <div class="row-fluid">
                            <p>Electronic three speed controls that let you select between
                                three convenient speed and an automatic switch-off timer,
                                so you can leave your kitchen knowing all those unpleasant
                                odours will be long gone by the time you return to clear
                                away.</p>
                        </div>
                        <div class="row-fluid"><img class="span12 padding5"
                                                    src="{{asset('frontoffice/img/chimney-category/img/intelligent-control.jpg')}}"/></div>
                    </div>
                </div>
                <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View
                    Products </a>

                <div class="clearfix"></div>
                <hr/>
        </div>
    </div>
    <!-- end div block_home -->


    <!--feedback slide box partial-->
    @include('_partials.frontoffice.feedback_slide_box')

    @stop