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
                <?php $current_page = "Cooking Appliances"; ?>
                @include('_partials.frontoffice.breadcrumb')
                <!-- /Breadcrumb -->


                <div class="content_scene_cat">
                    <!-- Category image -->
                    <div class="align_center"> <img src="{{asset('frontoffice/img/designer-island-hood/ss-cooktops.jpg')}}" alt="" title="SS / ISI cooktops" id="categoryImage"  /> </div>
                </div>
                <div class="chimney-category">
                    <p>With the Glen cooktops you get the freedom of choice. Simply the widest range of models to choose from. Spacious designs with two, three, four or five cooking zones. A choice of burners triple ring, high flame, sealed, aluminium alloy or conventional. Multiplicity of size; 60, 70 or 90 cms; traditional square or modern round shape available in a stainless steel or matt steel finish. How easy to choose the right one for your kitchen.</p>
                </div>


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