<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <title>Glen India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('frontoffice/img/favicon.ico')}}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontoffice/img/favicon.ico')}}"/>

    {{HTML::style('frontoffice/themes/leometr/css/bootstrap.css')}}

    <!--    cache themes-->
    {{HTML::style('frontoffice/themes/leometr/cache/1b115dab49c4ab0941c2178bac6d2921_all.css')}}
    {{HTML::style('frontoffice/themes/leometr/cache/b2f75094dbbc0a4ad436345203310867_all.css')}}


    {{HTML::style('frontoffice/css/index-menu.css')}}
    {{HTML::style('frontoffice/themes/leometr/css/bootstrap-responsive.css')}}
    {{HTML::style('frontoffice/themes/leometr/css/theme-responsive.css')}}
    {{HTML::style('frontoffice/css/rupee.css')}}
    {{HTML::style('frontoffice/css/custom.css')}}
    {{HTML::style('frontoffice/css/custom1.css')}}
    {{HTML::style('frontoffice/css/custom-index.css')}}
    {{HTML::style('frontoffice/css/feedback.css')}}
    {{HTML::style('frontoffice/css/compare.css')}}
    <link rel="stylesheet" href="//cdn.jsdelivr.net/qtip2/2.2.0/basic/jquery.qtip.css"/>


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    {{HTML::script('frontoffice/js/compare.js')}}
    {{HTML::script('frontoffice/js/purl.js')}}
    {{HTML::script('frontoffice/js/jquery/jquery-migrate-1.2.1.js')}}
    {{HTML::script('frontoffice/js/feedback.js')}}
    {{HTML::script('frontoffice/js/tab-slideout.js')}}
    {{HTML::script('frontoffice/js/jquery/plugins/jquery.easing.js')}}
    {{HTML::script('frontoffice/js/tools.js')}}
    <script type="text/javascript" src="//cdn.jsdelivr.net/qtip2/2.2.0/basic/jquery.qtip.js"></script>


    {{HTML::script('frontoffice/modules/carriercompare/carriercompare.js')}}
    {{HTML::script('frontoffice/themes/leometr/js/tools/treeManagement.js')}}
    {{HTML::script('frontoffice/js/jquery/plugins/autocomplete/jquery.autocomplete.js')}}
    {{HTML::script('frontoffice/modules/favoriteproducts/favoriteproducts.js')}}
    {{HTML::script('frontoffice/modules/lofminigallery/assets/jquery.prettyPhoto.js')}}
    {{HTML::script('frontoffice/modules/blockwishlist/js/ajax-wishlist.js')}}
    {{HTML::script('frontoffice/modules/leotempcp/bootstrap/js/bootstrap.js')}}
    {{HTML::script('frontoffice/themes/leometr/info/assets/form.js')}}
    {{HTML::script('frontoffice/modules/leocamera/js/camera.js')}}
    {{HTML::script('frontoffice/themes/leometr/js/custom.js')}}


    <link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    <!--[if IE 8]>
    <link href="http://demo4leotheme.com/prestashop/leo_metro/themes/leometr/css/ie8.css" rel="stylesheet"
          type="text/css"/>
    <![endif]-->

    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


</head>

<body id="index" class="fs12">
<div id="page" class="clearfix">

    @include('_partials.frontoffice.nav_menu')

    @yield('content')

    @include('_partials.frontoffice.footer')

</div>

<div id="fb-root"></div>
<script>(function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/all.js#xfbml=1";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
</body>


<!--fancybox files starts here-->
<link rel="stylesheet" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css">
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<link src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_overlay.png">
<link src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_sprite.png">
<link src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/fancybox_sprite@2x.png">
<!--fancybox files ends here-->


</html>
