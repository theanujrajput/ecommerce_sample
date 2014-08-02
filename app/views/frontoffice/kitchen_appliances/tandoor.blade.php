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
                                src="{{asset('frontoffice/img/designer-island-hood/Toasters.jpg')}}" alt=""
                                title="Glen Toasters" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Now make your toasts as you like them. The Glen 2-slice toasters with a cool touch body come
                            with
                            a variable browning control, defrost setting, reheat setting, cancel button, hi-lift
                            facility
                            and removable crumbs tray. The multiple browning settings, provide consistent browning at
                            just
                            the level you prefer.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">

                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/toaster/1.jpg')}}"/></div>
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                </div>
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/toaster/2.jpg')}}"/></div>
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                </div>
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/toaster/3.jpg')}}"/></div>
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                </div>
                                <div class="span3">

                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/toaster/4.jpg')}}"/></div>
                                    <div class="row-fluid">
                                        <h5></h5>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="row-fluid">
                            <div class="chimney-category padding5">
                                <p>Now make your toasts as you like them. The Glen 2-slice toasters with a cool touch
                                    body
                                    come with a variable browning control, defrost setting, reheat setting, cancel
                                    button,
                                    hi-lift facility and removable crumbs tray. The multiple browning settings, provide
                                    consistent browning at just the level you prefer.</p>
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