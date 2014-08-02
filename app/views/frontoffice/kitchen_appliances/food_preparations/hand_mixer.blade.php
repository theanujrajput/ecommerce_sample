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
                            src="{{asset('frontoffice/img/designer-island-hood/hand-mixer.jpg')}}" alt=""
                            title="Glen Hand Mixer" id="categoryImage"/></div>
                </div>
                <div class="chimney-category">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book.</p>

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