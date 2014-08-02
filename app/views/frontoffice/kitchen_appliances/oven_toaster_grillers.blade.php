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
                        <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/otg.jpg')}}"
                                                       alt=""
                                                       title="Glen Oven Toaster Grillers" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Good eating is synonymous with good health. Food cooked with steam retains far higher level
                            of nutrients, vitamins and minerals than by any other method. Moreover no additional fat is
                            required for cooking, this helps reduce
                            cholesterol and blood pressure.</p>

                        <p>The new Glen Steam Cooker, makes healthy cooking most convenient. Most sleek design, food
                            grade plastic and numerous other advanced features.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span3">
                                    <!--<div class="row-fluid">
                                      <h5>Induction</h5>
                                    </div>-->
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/otg/60-litres-capacity.png')}}"/>
                                    </div>
                                    <!--<div class="row-fluid">
                                      <p>A safe and flameless method of cooking, induction offers a whole range of benefits. Induction hobs are energy efficient,as well as deliver high levels of versatility and control. The glass surface remains cool, so you don't need to worry about accidentally touching a hot burner. The pan gets the transfer of heat directly, so the energy loss is minimum.</p>
                                    </div>-->
                                </div>
                                <div class="span3">
                                    <!--<div class="row-fluid">
                                      <h5>Induction</h5>
                                    </div>-->
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/otg/motorised-rotisserie.png')}}"/>
                                    </div>
                                    <!--<div class="row-fluid">
                                      <p>A safe and flameless method of cooking, induction offers a whole range of benefits. Induction hobs are energy efficient,as well as deliver high levels of versatility and control. The glass surface remains cool, so you don't need to worry about accidentally touching a hot burner. The pan gets the transfer of heat directly, so the energy loss is minimum.</p>
                                    </div>-->
                                </div>
                                <div class="span3">
                                    <!--<div class="row-fluid">
                                      <h5>Induction</h5>
                                    </div>-->
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/otg/turbo-convection.png')}}"/>
                                    </div>
                                    <!--<div class="row-fluid">
                                      <p>A safe and flameless method of cooking, induction offers a whole range of benefits. Induction hobs are energy efficient,as well as deliver high levels of versatility and control. The glass surface remains cool, so you don't need to worry about accidentally touching a hot burner. The pan gets the transfer of heat directly, so the energy loss is minimum.</p>
                                    </div>-->
                                </div>
                                <div class="span3">
                                    <!--<div class="row-fluid">
                                      <h5>Induction</h5>
                                    </div>-->
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/otg/self-clean.png')}}"/>
                                    </div>
                                    <!--<div class="row-fluid">
                                      <p>A safe and flameless method of cooking, induction offers a whole range of benefits. Induction hobs are energy efficient,as well as deliver high levels of versatility and control. The glass surface remains cool, so you don't need to worry about accidentally touching a hot burner. The pan gets the transfer of heat directly, so the energy loss is minimum.</p>
                                    </div>-->
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