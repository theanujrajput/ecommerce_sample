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
                    <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/heaters.jpg')}}"
                                                   alt="" title="Glen Heaters" id="categoryImage"/></div>
                </div>
                <div class="chimney-category">
                    <p>Oil-filled radiators are convection heaters filled with oil, the oil is electrically heated and
                        acts as a heat reservoir. The hot oil heats the metal walls and in turn the surroundings via
                        convection and radiation.</p>

                    <p>The thin fin columns with a large surface area allow more air to be in contact with the heater
                        and help rapid transfer of heat into the room.</p>

                    <p>A safe environment friendly method of heating that does not involve any fuel burning, Oil filled
                        radiators do not reduce oxygen nor do they cause any dryness in the room.</p>

                    <p>Glen Oil Filled Radiator Heaters are designed to provide fast and flexible heating to any indoor
                        space. They are highly efficient, safe and provide long lasting heating. With a 400 W ceramic
                        fan they spread their warmth instantly.</p>
                </div>
                <div class="row-fluid chimney-category-features">
                    <div class="span12 chimney-category-features-content">
                        <div class="row-fluid">
                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/oil-filled/In-built-handle.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <h5>In-built handle</h5>
                                </div>

                            </div>
                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/oil-filled/Turbo-fan.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <h5>Turbo fan</h5>
                                </div>

                            </div>
                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/oil-filled/castor-wheel.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <h5>Castor wheels</h5>
                                </div>

                            </div>

                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/oil-filled/fins.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <h5>Available in 9/11/13 fins</h5>
                                </div>

                            </div>


                        </div>

                    </div>

                </div>

                <div class="align_center"><img src="{{asset('frontoffice/img/designer-island-hood/PTC-Heaters.jpg')}}" alt=""
                                               title="Glen PTC Heaters" id="categoryImage"/></div>

                <div class="chimney-category row-fluid">
                    <p>The revolutionary PTC (Positive Temperature Coefficient) technology is used for efficient
                        heating. In this small ceramic stones with self-limiting temperature characteristics are
                        used.</p>

                    <p>They have fast heating response times and plateau at pre-defined temperature. PTC heating
                        elements automatically vary wattage to maintain pre-set temperature thereby saving power and are
                        energy efficient.</p>

                    <p>They are Absolutely Safe as no matter how much current is applied to the PTC, it will never
                        surpass the set temperature.</p>

                    <p>PTC ceramic stones are highly reliable, have long life and are compact in design so PTC Heaters
                        look good and perform better</p>
                </div>

                <div class="row-fluid chimney-category-features">
                    <div class="span12 chimney-category-features-content">
                        <div class="row-fluid">
                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/ptc-heater/Cool-warm-hot-air-selection.jpg')}}"/>
                                </div>
                                <div class="row-fluid">
                                    <h5>Cool/warm/hot air selection</h5>
                                </div>

                            </div>
                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/ptc-heater/remote-control.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <h5>Multi-function remote control</h5>
                                </div>

                            </div>
                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/ptc-heater/easy-to-carry.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <h5>Easy to carry recessed handle</h5>
                                </div>

                            </div>

                            <div class="span3">

                                <div class="row-fluid"><img class="span12 padding5"
                                                            src="{{asset('frontoffice/img/heaters/ptc-heater/safety-tip-over.jpg')}}"/></div>
                                <div class="row-fluid">
                                    <h5>Safety tip-over switch</h5>
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