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
                        <div class="align_center"><img
                                src="{{asset('frontoffice/img/designer-island-hood/glass-cooktops.jpg')}}" alt=""
                                title="Glen Glass Cooktops" id="categoryImage"/></div>
                    </div>
                    <div class="chimney-category">
                        <p>Gas is the culinary sign of competence. Appreciated for centuries, gas has no replacement.
                            But it
                            can be
                            improved. Used in conjunction with toughened glass, gas finds a new visually attractive
                            setting
                            and the practical
                            advantages of a modern material.</p>
                    </div>

                    <div class="row-fluid chimney-category-features ">
                        <div class="span12 chimney-category-features-content padding5">
                            <div class="span2">
                                <div class="row-fluid"><img
                                        src="{{asset('frontoffice/img/cooking-appliances/glass-cooktops/glass-cooktop1.jpg')}}"/>
                                </div>
                            </div>
                            <div class="span10">
                                <div class="row-fluid"><p>Truly a result of innovation, Glen Cooktops come with elegant
                                        looks, rich brush steel finish, high energy triple ring burner, one touch auto
                                        ignition, flame failure device, perfect flame control, no sim offs. Truly the
                                        controls are all yours. With Glen Cooktops you gain precise command not only of
                                        the
                                        dishes you prepare but also of the configuration of the instruments you use to
                                        prepare them.</p>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr/>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content padding5">
                            <div class="row-fluid margin-top10">

                                <div class="span8">
                                    <div class="row-fluid"><h5>Freedom of space</h5></div>
                                    <div class="row-fluid">
                                        <p>Ultra spacious design with the most convenient
                                            burner access, maximum vessel space.</p>

                                        <p>Ultra spacious design with the most convenient burner access maximum, vessel
                                            space.
                                            Ultra spacious design with the most convenient burner access maximum, vessel
                                            space.</p>
                                    </div>
                                </div>
                                <div class="span4">
                                    <div class="row-fluid"><img
                                            src="{{asset('frontoffice/img/cooking-appliances/glass-cooktops/freedom-space.jpg')}}"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr/>
                    <div class="row-fluid chimney-category-features">
                        <div class="span12 chimney-category-features-content">
                            <div class="row-fluid">
                                <div class="span3">
                                    <div class="row-fluid">
                                        <h5>Matt steel &amp; cool black glass</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/cooking-appliances/glass-cooktops/Matt-steel-and-cool-black.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Single piece toughened glass 8mm thick mounted on a matt steel frame. Easy to
                                            clean, resistant to scratches, stains impact & heat.</p>
                                    </div>
                                </div>

                                <div class="span3">
                                    <div class="row-fluid">
                                        <h5>Knobs</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/cooking-appliances/glass-cooktops/Knobs.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Soft flowing knobs for the most convenient operation.</p>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="row-fluid">
                                        <h5>Alloy burners</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/cooking-appliances/glass-cooktops/Alloy-burners.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p><strong>With a 5 year warranty.</strong><br/>
                                            Special alloy burners, pressure die-cast for longer life. These Ultra light
                                            burners are convenient to handle and have Special holes angle for higher
                                            thermal
                                            efficiency.</p>
                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="row-fluid">
                                        <h5>Auto Ignition option</h5>
                                    </div>
                                    <div class="row-fluid"><img class="span12 padding5"
                                                                src="{{asset('frontoffice/img/cooking-appliances/glass-cooktops/Auto-Ignition-option.jpg')}}"/>
                                    </div>
                                    <div class="row-fluid">
                                        <p>Just turn the knob and press the ignition button and up comes the blue flame.
                                            Matchsticks and lighters are now not a part of the kitchen. Cooktops from
                                            Glen
                                            come with multi spark battery operated auto-ignition.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                </div>
                <a href="category-test.html" class="button_large pull-right margin-top10 margin-bottom10">View
                    Products </a>

                <div class="clearfix"></div>
                <hr/>
                <!-- end div block_home -->

        </div>
</section>


<!--feedback slide box partial-->
@include('_partials.frontoffice.feedback_slide_box')

@stop