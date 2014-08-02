<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="keyword" content="">


    <title>404</title>

    <!--Core CSS -->
    {{HTML::style('backoffice/css/bootstrap.min.css')}}
    {{HTML::style('backoffice/css/bootstrap-reset.css')}}
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>

    <!-- Custom styles for this template -->
    {{HTML::style('backoffice/css/style.css')}}
    {{HTML::style('backoffice/css/style-responsive.css')}}
    {{HTML::style('backoffice/css/custom.css')}}


</head>


<style type="text/css">
    .error-desk {
        background: none !important;
    }
</style>

<body class="body-404">

<div class="error-head"></div>

<div class="container ">

    <section class="error-wrapper text-center">
        <h1><img src="{{URL::asset('backoffice/img/404.png')}}" alt=""></h1>

        <div class="error-desk">
            <h2>page not found</h2>

            <p class="nrml-txt">We Couldn’t Find This Page</p>
        </div>
        <a href="" class="back-btn"><i class="fa fa-home"></i> Back To Home</a>
    </section>

</div>


</body>
</html>
