<header id="header">
<section class="topbar">
    <div class="container">

        <div id="header_user" class="pull-right">
            <div id="header_user_info">
                <div class="nav-item">
                    <div class="item-top hidden-phone">Customer Care: 1800-180-1998 |

                        @if(AppUtil::isUserLoggedIn())
                        <a href="{{URL::to('user/logout')}}">Logout</a>
                        @else
                        <a href="{{URL::to('user/login')}}">Login</a>
                        @endif

                        | <a href="#">Blog</a> | <a href="#">Contact</a>
                    </div>
                </div>
                <div class="nav-item" id="your_account">
                    <div class="item-top"><a href="#" title="Your Account">Your Account</a></div>
                </div>
            </div>
        </div>

        <!-- /Block user information module HEADER -->

    </div>
</section>
<section class="header">
<div class="container">
<div class="row-fluid">
<div class="row-fuild">
<div class="span3">
    <a id="header_logo" href="{{URL::to('/')}}" title="Glen india">
        <img class="logo" src="{{asset('frontoffice/img/logo.png')}}" alt="Glen India">
    </a>
</div>

<div class="span9">
<nav id="topnavigation">
<div class="row-fluid">
<div class="navbar">
<div class="navbar-inner"><a data-target=".nav-collapse" data-toggle="collapse"
                             class="btn btn-navbar"> <span class="icon-bar"></span>
    <span class="icon-bar"></span> <span class="icon-bar"></span> </a>

<div class="nav-collapse collapse">
<ul class="nav megamenu">
<li class=" active"><a href="{{URL::to('/')}}"><span class="menu-icon"
                                                     style="background:url('../frontoffice/img/icon-home.png') no-repeat;">
            <span class="menu-title">Home</span></span></a></li>
<li class="parent dropdown"><a class="dropdown-toggle"
                               data-toggle="dropdown" href="#"
                               onclick="e.stopPropagation();"><span
            class="menu-title">Consumer Products</span><b
            class="caret"></b></a>

    <div class="dropdown-menu menu-content mega-cols cols3">
        <div class="row-fluid">
            <div class="mega-col span4 col-1">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">Chimneys</span><b
                                class="caret"></b></a>
                        <ul class="dropdown-mega level1">
                            <li class="  "><a
                                    href="island-chimney.html"><span
                                        class="menu-title">Island Chimneys</span></a>
                            </li>
                            <li class="  "><a href="split-chimney.html"><span
                                        class="menu-title">Split Chimneys</span></a>
                            </li>
                            <li class="  "><a
                                    href="designer-hood-chimney.html"><span
                                        class="menu-title">Designer Chimneys</span></a>
                            </li>
                            <li class="  "><a
                                    href="straight-line-chimney.html"><span
                                        class="menu-title">Straight line Chimneys</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="mega-col span4 col-2">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown"
                            href="http://www.demo4leotheme.com/prestashop/leo_metro/index.php?controller=#"><span
                                class="menu-title">Built-in Series</span><b
                                class="caret"></b></a>
                        <ul class="dropdown-mega level1">
                            <li class="  "><a
                                    href="buil-in-oven.html"><span
                                        class="menu-title">Microwave Ovens</span></a>
                            </li>
                            <li class="  "><a
                                    href="buil-in-oven.html"><span
                                        class="menu-title">Steam Oven</span></a>
                            </li>
                            <li class="  "><a
                                    href="buil-in-oven.html"><span
                                        class="menu-title">Oven</span></a>
                            </li>
                            <li class="  "><a
                                    href="buil-in-induction-hob.html"><span
                                        class="menu-title">Induction Hob</span></a>
                            </li>
                            <li class="  "><a
                                    href="glass-hob.html"><span
                                        class="menu-title">Glass Hob</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="mega-col span4 col-3">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">Cooking Appliances</span><b
                                class="caret"></b></a>
                        <ul class="dropdown-mega level1">
                            <li class="  "><a
                                    href="glass-cooktops.html"><span
                                        class="menu-title">Glass &amp; Induction Cooktops</span></a>
                            </li>
                            <li class="  "><a
                                    href="platinum-cooktops.html"><span
                                        class="menu-title">Platinum Cooktops</span></a>
                            </li>
                            <li class="  "><a
                                    href="stainless-steel-cooktops.html"><span
                                        class="menu-title">Stainless steel Cooktops</span></a>
                            </li>
                            <li class="  "><a href="cooking-range.html"><span
                                        class="menu-title">Cooking Range</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="clearfix"></div>
            <hr>
            <div class="mega-col span4 col-1" style="margin-left:0px;">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">Small Appliances</span></a>
                        <ul class="dropdown-mega level1">
                            <li class=""><a class="dropdown-toggle"
                                            data-toggle="dropdown"
                                            href="food-processor.html"><span
                                        class="menu-title">Food Processors</span></a>
                            </li>
                            <li class=""><a class="dropdown-toggle"
                                            data-toggle="dropdown"
                                            href="juicer-mixer-grinder.html"><span
                                        class="menu-title">Juicer Mixer Grinders</span></a>
                            </li>
                            <li class=""><a class=""
                                            href="mixer-grinder.html"><span
                                        class="menu-title">Mixer Grinders</span></a>
                            </li>
                            <li class=""><a class=""
                                            href="chopper.html"><span
                                        class="menu-title">Chopper, Blender &amp; Grinder</span></a>
                            </li>
                            <li class=""><a class=""
                                            href="hand-mixer.html"><span
                                        class="menu-title">Hand Mixer</span></a>
                            </li>
                            <li class=""><a class=""
                                            href="tea-maker-kettle.html"><span
                                        class="menu-title">Kettle &amp; Tea Maker</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="mega-col span4 col-2">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">&nbsp;</span></a>
                        <ul class="dropdown-mega level1">
                            <li class="  "><a href="toaster.html"><span
                                        class="menu-title">Toasters</span></a>
                            </li>
                            <li class="  "><a
                                    href="sandwich-maker.html"><span
                                        class="menu-title">Sandwich Makers</span></a>
                            </li>
                            <li class="parent dropdown-submenu  "><a
                                    href="bread-maker.html"><span
                                        class="menu-title">Bread Maker</span></a>
                            </li>
                            <li class="  "><a href="Airfryer.html"><span
                                        class="menu-title">Airfryer</span></a>
                            </li>
                            <li class="  "><a
                                    href="steam-cooker.html"><span
                                        class="menu-title">Steam Cooker</span></a>
                            </li>
                            <li class="  "><a
                                    href="rice-cooker.html"><span
                                        class="menu-title">Rice Cooker</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="mega-col span4 col-2">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">&nbsp;</span></a>
                        <ul class="dropdown-mega level1">
                            <li class="  "><a href="otg.html"><span
                                        class="menu-title">Oven Toaster Griller</span></a>
                            </li>
                            <li class="  "><a href="tandoor.html"><span
                                        class="menu-title">Tandoor</span></a>
                            </li>
                            <li class="parent dropdown-submenu  "><a
                                    href="induction-cooker.html"><span
                                        class="menu-title">Induction Cookera</span></a>
                            </li>
                            <li class="  "><a href="heaters.html"><span
                                        class="menu-title">Heaters</span></a>
                            </li>
                            <li class="  "><a
                                    href="steam-iron.html"><span
                                        class="menu-title">Irons</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</li>
<li class="no_border"><a class="no_border" href="#" style="border: none!important;"><span
            class="menu-title">Retail Stores</span></a></li>
<li class="parent dropdown"><a class="dropdown-toggle"
                               data-toggle="dropdown" href="#"><span
            class="menu-title">Media</span><b class="caret"></b></a>

    <div class="dropdown-menu menu-content mega-cols">
        <div class="row-fluid">
            <div class="mega-col span4 col-1">
                <ul>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">Press</span><b
                                class="caret"></b></a></li>
                    <li class="parent dropdown-submenu mega-group"><a
                            class="dropdown-toggle"
                            data-toggle="dropdown" href="#"><span
                                class="menu-title">Video</span><b
                                class="caret"></b></a></li>
                </ul>
            </div>
        </div>
    </div>
</li>
<li class=""><a href="#"><span class="menu-title">Offer Zone</span></a>
</li>
<li><a href="{{URL::to('/cart')}}" class="padding-right0"><span class="menu-icon"
                                                                style="background:url(../frontoffice/img/cart.png) no-repeat;"><span
                class="menu-title">Cart</span></span></a></li>
</ul>
</div>
</div>
</div>
</div>
</nav>
</div>
<!-- #EndLibraryItem --></div>
</div>
</div>
</section>
</header>


<section id="promotetop">
    <div class="container">
        <div class="row-fluid">
            <div id="homecontent-displayPromoteTop" class="leo-manage">
                <div class="leo-custom customhtml">
                    <p><img src="{{asset('frontoffice/modules/leomanagemodules/img/image.png')}}" alt=""/></p>
                </div>
            </div>
        </div>
    </div>
</section>
