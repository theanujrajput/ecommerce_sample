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
                                src="{{asset('frontoffice/img/designer-island-hood/rice-ccoker.jpg')}}" alt=""
                                title="Glen Rice Cooker" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>The smart and automatic Glen rice cooker allows the enthusiastic cook to steam up a perfect
                            pot of rice at the flick of a switch. In addition a rice cooker is good to cook desserts,
                            boil eggs, prepare dim sum, steam fish, meat and vegetables. An extremely healthy way to
                            cook food that preserves freshness and nutrition.</p>

                        <p>With features like cool touch body and sleek handles, durable non stick cooking pans and
                            lockable hinged lids and a single switch operation, the Glen rice cookers
                            are simply the best choice for healthy cooking.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/rice-cooker/cool-touch-handle.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Cool Touch Handle</h5>
                                    </div>

                                </div>
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/rice-cooker/control-panel.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Control Panel</h5>
                                    </div>

                                </div>
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/rice-cooker/inner-steamer.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Inner Steamer</h5>
                                    </div>

                                </div>

                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/rice-cooker/cooking-pans.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <h5>Cooking Pans</h5>
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