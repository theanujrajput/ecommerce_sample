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
                                src="{{asset('frontoffice/img/designer-island-hood/glass-hob.jpg')}}" alt=""
                                title="Glen Glass Hob" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p style="font-weight:500;">Outstanding aesthetics and efficient capability in cooking. Yes,
                            this is precisely what has been kept in mind
                            while designing the Glen Built-in Hobs. Behind their minimalistic exteriors is the backing
                            of the promise of high
                            performance cooking.</p>

                        <p>Just turn the dial. Glen gas hobs are incredibly intuitive to operate, and have automatic
                            ignition and a range of sizes and burner choices. Every model has an optional Flame Safe
                            technology too, which instantly cuts the gas supply if the flame goes out.</p>
                    </div>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5>Precision built-in</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/Glass-hob/Precision-built-in.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>It's about control. Instant heat when you want it at exactly the power you
                                            need. But when you choose a Glen gas hob, it's also about bringing a sense
                                            of style and finesse to your kitchen.</p>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5>Toughened black glass 8mm thick</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/Glass-hob/Toughened-black-glass-8mm.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>The elegant black glass surface doesn't just look stunning – it makes your
                                            Glen hob a breeze to clean, and resists scratches, stains, impact and
                                            heat.</p>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5>Cast Iron pan supports</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/Glass-hob/Cast-Iron-pan-supports.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Robust & sturdy supports to easily accommodate large and heavy vessels.</p>
                                    </div>
                                </div>


                            </div>
                            <div class="clearfix"></div>
                            <div class="row-fluid">
                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5>Triple ring burner</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/Glass-hob/Triple-ring-burner.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>The burner with three perfect rings of flame,spreads heat more evenly across
                                            the pan. A high energy, high efficiency burner specially designed for the
                                            Indian deepfrying.</p>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5>Double ring burner</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/Glass-hob/Double-ring-burner.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Specially designed & developed in Italy for Indiancooking needs, the double
                                            ring burner makes the problem of low flame in hobs, a thing of the past.
                                            This Italian burner comes in 2 different sizes for different levels of
                                            cooking.</p>
                                    </div>
                                </div>

                                <div class="span4">
                                    <div class="row-fluid">
                                        <h5>Italian gas valves</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/built-in-series/Glass-hob/Italian-gas-valves.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>High precision Italian gas valves for total safety and a perfect flame
                                            control. No more gas leakages and no more sim-off.</p>
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