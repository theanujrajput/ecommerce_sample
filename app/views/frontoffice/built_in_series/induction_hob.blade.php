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
                    <?php $current_page = "Built In Series"; ?>
                    @include('_partials.frontoffice.breadcrumb')
                    <!-- /Breadcrumb -->


                    <div class="content_scene_cat">
                        <!-- Category image -->
                        <div class="align_center"><img
                                src="{{asset('frontoffice/img/designer-island-hood/built-induction-hob.jpg')}}" alt=""
                                title="Glen Built-in-Induction-Hob" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Induction Hobs are hygienic, more energy-efficient, safer and easier to use. They work by
                            creating a magnetic field between the hob and the pan. Heat is instant, and it's easy to
                            control. Once you remove the pan, they cool down very quickly, which is handy if kids are
                            around. They're more energy-efficient because they only heat the pan area itself, rather
                            than all around it.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="row-fluid">
                                        <h5>Induction</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/induction-hob/induction.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>A safe and flameless method of cooking, induction offers a whole range of
                                            benefits. Induction hobs are energy efficient,as well as deliver high levels
                                            of versatility and control. The glass surface remains cool, so you don't
                                            need to worry about accidentally touching a hot burner. The pan gets the
                                            transfer of heat directly, so the energy loss is minimum.</p>
                                    </div>
                                </div>

                                <div class="span6">
                                    <div class="row-fluid">
                                        <h5>Precision built-in with LED touch control</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/induction-hob/Precision-built-in-led-touch-control.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>The intuitive touch controls set into black tempered
                                            glass look fabulous. With advanced digital technology giving you nine
                                            precise power levels on each burner, they also offer an exceptional level of
                                            control. Enjoy the
                                            best of both worlds.</p>
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