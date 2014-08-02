<!-- Footer -->
<section id="bottom">
    <div class="container">
        <div class="row-fluid">
            <div id="homecontent-displayBottom" class="leo-manage">
                <div class="leo-custom customhtml">
                    <h1 class="title_block">Our Special Offers</h1>
                    <div class="row-fluid">
                        <div class="span4"><img src="{{asset('frontoffice/modules/leomanagemodules/img/img-offers1.jpg')}}" alt="" /></div>
                        <div class="span4"><img src="{{asset('frontoffice/modules/leomanagemodules/img/img-offers2.jpg')}}" alt="" /></div>
                        <div class="span4"><img src="{{asset('frontoffice/modules/leomanagemodules/img/img-offers3.jpg')}}" alt="" /></div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('.carousel').each(function(){
                        $(this).carousel({
                            pause: true,
                            interval: false
                        });
                    });
                    $(".blockleoproducttabs").each( function(){
                        $(".htabs li", this).first().addClass("active");
                        $(".tab-content .tab-pane", this).first().addClass("active");
                    } );
                });
            </script>
        </div>
    </div>
</section>
<footer id="footer" class="omega clearfix">
    <section class="footer">
        <div class="container">
            <div class="row-fluid">
                <div style="clear:both"></div>
                <div id="lofadvafooterfooter" class="lofadvafooter">
                    <div id="lofadva-pos-1" class="lof-position" style="width:100%">
                        <div class="lof-position-wrap">
                            <div class="lofadva-block-1 lof-block" style="width:25.00%; float:left;">
                                <div class="lof-block-wrap">
                                    <h2>Socialize</h2>
                                    <ul class="lof-items">
                                        <li class="lof-text">
                                            <div class="social"><a class="facebook" href="#" title="Facebook">facebook</a> <a class="dribble" href="#" title="Blog">Blog</a> <a class="mail" href="#" title="Mail">mail</a> <a class="youtube" href="#" title="Youtube">Youtube</a> </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lofadva-block-2 lof-block" style="width:25%; float:left;">
                                <div class="lof-block-wrap">
                                    <h2>My Account</h2>
                                    <ul class="lof-items">
                                        <li class="link"><a href="#" title="Terms" target="_blank">My Order</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">Track Order</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">Product Manuals</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">Downloads</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="lofadva-block-3 lof-block" style="width:25.00%; float:left;">
                                <div class="lof-block-wrap">
                                    <h2>About</h2>
                                    <ul class="lof-items">
                                        <li class="link"><a href="#" title="Terms" target="_blank">Corporate</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">Press</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">Careers</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">FAQ's</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">T&amp;C</a></li>
                                        <li class="link"><a href="#" title="About us" target="_self">Return Policy</a></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="lofadva-block-5 lof-block" style="width:25.00%; float:left;">
                                <div class="lof-block-wrap">
                                    <h2>Reach us</h2>
                                    <ul class="lof-items">
                                        <li class="lof-module">

                                            <!-- Block Newsletter module-->
                                            <div id="newsletter_block_left" class="">
                                                <h3 class="title_block"><span class="tcolor">Reach us</span></h3>
                                                <div class="block_content">
                                                    <ul class="lof-items">
                                                        <li class="link"><a href="#" title="" target="_blank">Retail Outlets</a></li>
                                                        <li class="link"><a href="#" title="" target="_self">Service Centres</a></li>
                                                        <li class="link"><a href="#" title="" target="_self">Customer Service</a></li>
                                                        <li class="link"><a href="#" title="" target="_self">Distributors</a></li>
                                                        <li class="link"><a href="#" title="" target="_self">Complaints</a></li>
                                                        <li class="link"><a href="#" title="" target="_self">Contact us</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div style="clear:both;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="footer-bottom">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <div class="copyright"> Copyright 2014 Glen India. All Rights Reserved </div>
                </div>
            </div>
        </div>
    </section>
</footer>