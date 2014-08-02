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
                                src="{{asset('frontoffice/img/designer-island-hood/split-chimney.jpg')}}" alt=""
                                title="Glen Split Chimney" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>The revolutionary new concept in chimneys, the split chimney, makes the kitchen free of
                            unwanted
                            noise and odours. Enjoy the silence.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">

                        <div class="span6 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span6">
                                    <div class="row-fluid">
                                        <h5>Curved Glass</h5></div>
                                    <div class="row-fluid">
                                        <p>The elegance of glass accentuated by its flowing contour. Now, make a real
                                            statement in your kitchen</p><br/>
                                    </div>
                                    <div class="row-fluid">
                                        <img class="span12 padding5"
                                             src="{{asset('frontoffice/img/chimney-category/split-chimney/curved-glass.jpg')}}"/>
                                    </div>
                                </div>
                                <div class="span6">
                                    <div class="row-fluid">
                                        <h5>Intelligent controls</h5></div>
                                    <div class="row-fluid">
                                        <p>Convenient three speed push button control, two powerful 40 W lamps, create
                                            just
                                            the right lighting for your workspace.</p></div>


                                    <div class="row-fluid">
                                        <img class="span12 padding5"
                                             src="{{asset('frontoffice/img/chimney-category/split-chimney/intelligent-control.jpg')}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="span6 chimney-category-features-content">
                            <div class="row-fluid">
                                <h5>Split chimney</h5></div>
                            <div class="row-fluid">
                                <p>A cook once said "My favorite way to cook, especially
                                    when I cook alone, is in silence. I like the sounds of
                                    cooking: the chopping, the sizzling, the thwacking of
                                    a wooden spoon against the bowl when I cream butter
                                    and sugar. "</p></div>

                            <div class="row-fluid">
                                <img class="span12 padding5"
                                     src="{{asset('frontoffice/img/chimney-category/split-chimney/split-chimney.jpg')}}"/>
                            </div>
                            <div class="row-fluid">
                                <p>Our novel concept takes the noise straight out of the
                                    kitchen. Introducing split chimney with separate outdoor
                                    and indoor units.</p></div>
                            <div class="row-fluid">
                                <p>Now, Enjoy the silence !</p></div>
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