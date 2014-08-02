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
                    <?php $current_page = "Small Appliances"; ?>
                    @include('_partials.frontoffice.breadcrumb')
                    <!-- /Breadcrumb -->


                    <div class="content_scene_cat">
                        <!-- Category image -->
                        <div class="align_center"><img
                                src="{{asset('frontoffice/img/designer-island-hood/steam-iron.jpg')}}" alt=""
                                title="Glen Steam Iron" id="categoryImage"/></div>
                    </div>
                    <div class="row-fluid">
                        <div class="span12 chimney-category ">
                            <div class="span2">
                                <img src="{{asset('frontoffice/img/steam-iron/ultra-glide.png')}}"/>
                            </div>
                            <div class="span10">
                                <p>With Glen Steam Iron, you can adjust steam settings for a variety of fabrics. The
                                    fine
                                    mist spray gives sharper creases and the non-stick coated sole plate provides for
                                    smooth
                                    ironing results. They heat up fast, are light weight, and have an anti slip handle.
                                    The
                                    soleplate features full length button grooves which make ironing around buttons
                                    easier.</p>
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