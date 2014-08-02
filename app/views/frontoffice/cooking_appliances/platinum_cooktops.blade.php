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
                    <?php $current_page = "Cooking Appliances"; ?>
                    @include('_partials.frontoffice.breadcrumb')
                    <!-- /Breadcrumb -->

                    <div class="content_scene_cat">
                        <!-- Category image -->
                        <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/platinum-cooktops.jpg')}}" alt=""
                                                       title="Glen Platinum Cooktops" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>The metal makes the difference. The international favourite brush finish stainless steel
                            moulded into a sleek and compact shape. No more shiny steel, the new Platinum series imparts
                            a rich matt look to the cooktop. A single piece deep drawn body gives a clean and
                            streamlined look and also makes the cooktop stronger and sturdier.</p>
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