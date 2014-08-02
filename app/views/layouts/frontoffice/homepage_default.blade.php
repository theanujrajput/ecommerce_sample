<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <title>Glen India</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0">
    <link rel="icon" type="image/vnd.microsoft.icon" href="{{asset('frontoffice/img/favicon.ico')}}"/>
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('frontoffice/img/favicon.ico')}}"/>

    {{HTML::style('frontoffice/themes/leometr/css/bootstrap.css')}}

    {{HTML::style('frontoffice/themes/leometr/cache/1b115dab49c4ab0941c2178bac6d2921_all.css')}}

    {{HTML::style('frontoffice/css/index-menu.css')}}
    {{HTML::style('frontoffice/themes/leometr/css/bootstrap-responsive.css')}}
    {{HTML::style('frontoffice/themes/leometr/css/theme-responsive.css')}}
    {{HTML::style('frontoffice/css/rupee.css')}}
    {{HTML::style('frontoffice/css/custom.css')}}
    {{HTML::style('frontoffice/css/custom1.css')}}
    {{HTML::style('frontoffice/css/custom-index.css')}}


    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    {{HTML::script('frontoffice/js/jquery/jquery-migrate-1.2.1.js')}}
    {{HTML::script('frontoffice/js/jquery/plugins/jquery.easing.js')}}
    {{HTML::script('frontoffice/js/tools.js')}}
    {{HTML::script('frontoffice/modules/carriercompare/carriercompare.js')}}
    {{HTML::script('frontoffice/themes/leometr/js/modules/blockcart/ajax-cart.js')}}
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

<body id="index" class=" fs12">
<div id="page" class="clearfix">

    @include('_partials.frontoffice.nav_menu_with_static_banner')

    @yield('content')

    @include('_partials.frontoffice.footer')

</div>

<script type="text/javascript">
    $("#toolspanelcontent").animate({"left": -($("#toolspanelcontent").width() + 7)}).addClass("inactive");
    $("#toolspanel .pn-button").click(function () {
        if ($("#toolspanelcontent").hasClass("inactive")) {
            $("#toolspanelcontent").animate({"left": 0}).addClass("active").removeClass("inactive");
            $(this).removeClass("open").addClass("close");
        } else {
            $("#toolspanelcontent").animate({"left": -($("#toolspanelcontent").width() + 7)}).addClass("inactive").removeClass("active");
            $(this).removeClass("close").addClass("open");
        }
    });
    $("#pnpartterns a").click(function () {
        $("#pnpartterns a").removeClass("active");
        $(this).addClass("active");
        document.body.className = document.body.className.replace(/pattern\w*/, "");
        $("body").addClass($(this).attr("id").replace(/\.\w+$/, ""));
        $("#bgpattern").val($(this).attr("id").replace(/\.\w+$/, ""));
    });
</script>
<script type="text/javascript">
    $('.title_block').each(function () {
        var me = $(this);
        me.html(me.text().replace(/(^\w+|\s+\w+)/, '<span class="tcolor">$1</span>'));
    });

</script>
<script type="text/javascript">
    var classBody = ".png";
    $("body").addClass(classBody.replace(/\.\w+$/, ""));
</script>
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


</html>
