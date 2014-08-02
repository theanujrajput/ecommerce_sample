<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">


    <title></title>


    <!--Core CSS -->
    {{HTML::style('backoffice/css/bootstrap.min.css')}}
    {{HTML::style('backoffice/css/bootstrap-reset.css')}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>

    <!-- Custom styles for this template -->
    {{HTML::style('backoffice/css/style.css')}}
    {{HTML::style('backoffice/css/style-responsive.css')}}
    {{HTML::style('backoffice/css/custom.css')}}


<!--    chosen bootstrap css-->
    <link rel="stylesheet" href="http://harvesthq.github.io/chosen/chosen.css"/>


    <!--vertical tabs css-->
    {{HTML::style('backoffice/css/bootstrap.vertical-tabs.min.css')}}

    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.0.min.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->

</head>


<body class="full-width">

<section id="container" class="">
    <!--header start-->
    <header class="header fixed-top">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="fa fa-bar"></span>
                <span class="fa fa-bar"></span>
                <span class="fa fa-bar"></span>
            </button>

            <!--logo start-->
            <!--logo start-->
            <div class="brand">
                <a href="{{URL::to('dashboard')}}" class="logo" style="margin-top: 10px;margin-left: 60px;">
                    <img src="{{URL::asset('backoffice/img/logo.png')}}" alt="" ">
                </a>
            </div>
            <!--logo end-->
            <!--logo end-->
            <div class="horizontal-menu navbar-collapse collapse ">
                <ul class="nav navbar-nav">
                    <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>

                    <li class="dropdown">
                        <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#">Catalog
                            <b class=" fa fa-angle-down"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{URL::to('dashboard/category')}}">Categories</a></li>
                            <li><a href="{{URL::to('dashboard/products')}}">Products</a></li>
                            <li><a href="{{URL::to('dashboard/tags')}}">Tags</a></li>
                            <li><a href="{{URL::to('dashboard/combo')}}">Combos</a></li>
                        </ul>
                    </li>
                    <li><a href="basic_table.html">Orders</a></li>

                </ul>

            </div>
            <div class="top-nav ">
                <ul class="nav pull-right top-menu">

                    <!-- user login dropdown start-->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <i class="fa fa-user"></i>
                            <span class="username">{{ AppUtil::getUserName();}}</span>
                            <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu extended logout">
                            <div class="log-arrow-up"></div>

                            <li><a href="#"><i class="fa fa-cog"></i> Change Password</a></li>
                            <li><a href="{{URL::to('admin/log-out')}}"><i class="fa fa-key"></i> Log Out</a></li>
                        </ul>
                    </li>
                    <!-- user login dropdown end -->
                </ul>
            </div>

        </div>

    </header>
    <!--header end-->

    <section id="main-content">
        <section class="wrapper">
            @yield('content')
        </section>
    </section>


    <!--footer start-->
    <footer class="footer-section">
        <div class="text-center">
            2014 &copy; Powered by <a href="http://greenapplesolutions.com/" target="_blank" class="company_link">Green
                Apple Solutions</a>
        </div>
    </footer>
    <!--footer end-->


</section>


<!-- Placed js at the end of the document so the pages load faster -->

<!--Core js-->

<script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

<!--jquery validation-->
<script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript"
        src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/additional-methods.min.js"></script>


{{HTML::script("backoffice/js/plugins/hover-down/hover-dropdown.js")}}

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>


<!--<script type="text/javascript" src="js/hover-down/hover-dropdown.js"></script>-->
<!--<script src="js/nicescroll/jquery.nicescroll.js" type="text/javascript"></script>-->
<!--Easy Pie Chart-->
<!--<script src="assets/easypiechart/jquery.easypiechart.js"></script>-->
<!--Sparkline Chart-->
<!--<script src="assets/sparkline/jquery.sparkline.js"></script>-->
<!--jQuery Flot Chart-->
<!--<script src="assets/flot-chart/jquery.flot.js"></script>-->
<!--<script src="assets/flot-chart/jquery.flot.tooltip.min.js"></script>-->
<!--<script src="assets/flot-chart/jquery.flot.resize.js"></script>-->
<!--<script src="assets/flot-chart/jquery.flot.pie.resize.js"></script>-->


</body>
</html>