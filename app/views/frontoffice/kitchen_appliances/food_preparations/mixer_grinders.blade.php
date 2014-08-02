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
                                src="{{asset('frontoffice/img/designer-island-hood/mixer-grinder.jpg')}}" alt=""
                                title="Glen Juicer Mixer Grinder" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Glen brings you a wide selection of mixer grinders. With these versatile geniuses you can
                            effortlessly prepare a variety of dishes and drinks in just seconds, everything from
                            delicious
                            shakes to tangling sauces and soups. Glen mixer grinders are easy to use and clean, offering
                            you
                            all-around convenience. And you can always rely on them to deliver excellent results.</p>

                        <p>Simply the best choice for your kitchen.</p>

                        <p>Glen mixer grinders are a step ahead of the conventional mixie. They come loaded with special
                            features for the most convenient operation.</p>

                        <p><strong>Strong & sturdy motor</strong> makes the toughest of tasks like grinding
                            soaked rice & dals fast, simple and convenient. Now comes with 5 year warranty.</p>

                        <p><strong>Special oil seals</strong> prevent leakages while working with liquids for a better
                            performance and longer life.</p>

                        <p><strong>Food grade blades</strong> made of 304 grade stainless steel, they do not effect the
                            food
                            quality even when they get heated up.</p>

                        <p><strong>Unbreakable lids</strong> made of polycarbonate for a breakage free longer life.
                            Transparent lids to monitor the food being processed.</p>
                    </div>

                    <div class="row-fluid chimney-category-features ">
                        <div class="span12 chimney-category-features-content padding5">
                            <div class="span2">
                                <div class="row-fluid"><img
                                        src="{{asset('frontoffice/img/juicer-mixer/fruit-filter.jpg')}}"/></div>
                            </div>
                            <div class="span5">
                                <div class="row-fluid">
                                    <h5>Fruit Filter (optional)</h5>

                                    <p>This unique attachment helps prepare juices without seeds. It is also
                                        very useful for grape juices, seedless tomato purees and coconut milk.</p>
                                </div>
                            </div>
                            <div class="span3 pull-right">
                                <div class="row-fluid"><p><img
                                            src="{{asset('frontoffice/img/mixer-grinder/GL-4026-Plus.png')}}"/></p>
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