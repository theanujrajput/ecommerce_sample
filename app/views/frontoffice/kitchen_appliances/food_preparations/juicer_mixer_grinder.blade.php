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
                                src="{{asset('frontoffice/img/designer-island-hood/juicer-mixer.jpg')}}" alt=""
                                title="Glen Juicer Mixer Grinder" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Gas is the culinary sign of competence. Appreciated for centuries, gas has no replacement.
                            But it can be
                            improved. Used in conjunction with toughened glass, gas finds a new visually attractive
                            setting and the practical
                            advantages of a modern material.</p>
                    </div>

                    <div class="row-fluid chimney-category-features ">
                        <div class="span12 chimney-category-features-content padding5">
                            <div class="span2">
                                <div class="row-fluid"><img
                                        src="{{asset('frontoffice/img/juicer-mixer/fruit-filter.jpg')}}"/></div>
                            </div>
                            <div class="span5">
                                <div class="row-fluid"><p>This unique attachment helps prepare juices without seeds. It
                                        is also very useful for grape juices, seedless tomato purees and coconut
                                        milk.</p>
                                </div>
                            </div>
                            <div class="span3 pull-right">
                                <div class="row-fluid"><p><img
                                            src="{{asset('frontoffice/img/juicer-mixer/juicer.png')}}"/></p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr/>


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