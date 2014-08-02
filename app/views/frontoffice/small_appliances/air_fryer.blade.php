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
                <div class="contenttop row-fluid"">

                <!-- Breadcrumb -->
                <?php $current_page = "Small Appliances"; ?>
                @include('_partials.frontoffice.breadcrumb')
                <!-- /Breadcrumb -->

                <div class="content_scene_cat">
                    <!-- Category image -->
                    <div class="align_center"> <img src="{{asset('frontoffice/img/designer-island-hood/Airfryer.jpg')}}" alt="" title="Glen Juicer Mixer Grinder" id="categoryImage"  /> </div>
                </div>
                <div class="chimney-category">
                    <p>Now give your favorite fried foods a make over. Instead of using fat to make fries, the revolutionary Glen Air Fryer uses superheated air. It fries to a crispy golden-brown finish - and cuts the calories - in everything from fries, snacks, chicken, burgers, meat and more.</p>
                    <p>That same mouth-watering taste "crispy on the outside, moist on the inside" - without the oil. Genuine homemade and extremely tasty.</p>
                </div>

                <div class="clearfix"></div>
                <hr />



                <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View Products </a>
                <div class="clearfix"></div>
                <hr />
                <!-- end div block_home -->

        </div>
    </div>
</section>



<!--feedback slide box partial-->
@include('_partials.frontoffice.feedback_slide_box')

@stop