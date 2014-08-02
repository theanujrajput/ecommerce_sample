@extends('layouts.frontoffice.default')

@section('content')

{{HTML::style('frontoffice/themes/leometr/cache/7908d2ebd930903fc4a31e0ff2a9ac57_all.css')}}
{{HTML::style('frontoffice/css/blocklayered-15.css')}}
{{HTML::script('frontoffice/js/blocklayered.js')}}
{{HTML::script('frontoffice/js/purl.js')}}
{{HTML::script('frontoffice/js/get_products.js')}}


<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
<script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>

<script type="text/javascript">
    $(document).ready(function () {


    });

</script>
<?php $session_ids = Session::get('id'); ?>

@include('_partials.frontoffice.compare_bar')


<!--ajax loader-->
<div class="ajax_loader_div hidden">
    <img src="{{asset('frontoffice/img/loader.gif')}}" alt="" width="35" height="35"/>
    Loading
</div>

<section id="columns" class="clearfix">
    <div class="container" id="content_container">
        <div class="row-fluid">


            <!--           filters partial starts here -->
            <section id="left_column" class="column span3 sidebar">
                @include('_partials.frontoffice.filters')
            </section>
            <!--        filters partial ends here-->


            <section id="center_column" class="span9">
                <div class="contenttop row-fluid">

                    <!-- Breadcrumb -->
                    <div id="breadcrumb">
                        <ul class="breadcrumb">
                            <li><a href="index-2.html" title="return to Home">Home</a> <span class="divider">&gt;</span>
                            </li>
                            <li>Glen Chimneys</li>
                        </ul>
                    </div>
                    <!-- /Breadcrumb -->


                    <div class="products-list">
                        <div class="content_sortPagiBar">
                            <div class="row-fluid sortPagiBar">
                                <div class="span3 hidden-phone">
                                    <div class="inner">
                                        <div class="btn-group" id="productsview"><a class="btn" href="#"
                                                                                    rel="view-grid"><i
                                                    class="icon-th active"></i></a> <a class="btn" href="#"
                                                                                       rel="view-list"><i
                                                    class="icon-th-list"></i></a></div>
                                    </div>
                                </div>
                                <div class="span6 hidden-phone">
                                    <div class="inner">

                                        <!--Sort Products -->
                                        <form id="productsSortForm"
                                              action="http://demo4leotheme.com/prestashop/leo_metro/index.php?id_category=4&amp;controller=category&amp;id_lang=1&amp;id_lang=1"
                                              class="productsSortForm">
                                            <p class="select">
                                                <label for="selectPrductSort">Sort by</label>
                                                <select id="selectPrductSort" class="selectProductSort">
                                                    <option value="popularity" selected>Popularity</option>
                                                    <option value="lowest">Price: Lowest first</option>
                                                    <option value="highest">Price: Highest first</option>
                                                </select>
                                            </p>
                                        </form>
                                        <!-- /Sort products -->

                                    </div>
                                </div>
                                <div class="span3">
                                    <div class="inner">
                                        <form method="post"
                                              action="http://demo4leotheme.com/prestashop/leo_metro/index.php?controller=products-comparison"
                                              onsubmit="true">
                                            <p>
                                                <input type="submit" id="bt_compare" class="button bt_compare"
                                                       value="Compare"/>
                                                <input type="hidden" name="compare_product_list"
                                                       class="compare_product_list"
                                                       value=""/>
                                            </p>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Products list starts here -->
                        <div id="product_list" class="products_block view-grid">
                            <div class="rows-fluid">

                                @if(!is_null($products))
                                @for ($i = 0; $i < count($products); $i=$i+3)
                                <div class="row-fluid">

                                    @for($j=0;$j<3;++$j)
                                    @if($i+$j < count($products))
                                    <?php $id = $products[$i + $j]->id; ?>

                                    <div data-href="{{URL::to('product/'.$id)}}"
                                         class="p-item myspan4 product_block ajax_block_product item clearfix">
                                        <div class="list-products productModule">

                                            <!--                combo tag starts here-->
                                            <?php $total_combo = $products[$i + $j]->combos->count(); ?>
                                            @if($total_combo!=0)
                                            <div class="newofferTag DISCOUNT"><span class="flap"></span> <span
                                                    class="offerLogo"></span>

                                                <div class="moreOffers"><span class="offerCount">+ {{$total_combo}} OFFER</span>

                                                    <div class="listOfOffers"></div>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            @endif
                                            <!--                combo tag ends here-->

                                            <?php $images = $products[$i + $j]->images; ?>

                                            @if(isset($images))
                                            <?php $image = HtmlUtil::getPrimaryImage($images); ?>
                                            <?php $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                                            $title = isset($image['title']) ? $image['title'] : $products[$i + $j]->name;
                                            ?>
                                            @else
                                            <?php $path = Constants::DEFAULT_300_IMAGE;;
                                            $title = $products[$i + $j]->name;
                                            ?>
                                            @endif


                                            <div class="product-container clearfix">
                                                <div class="center_block">
                                                    <a href="{{URL::to('product/'.$id)}}" class="product_img_link"
                                                       title="{{$title}}">
                                                        <img src="{{URL::to($path)}}" alt="{{$products[$i+$j]->name}}"/>
                                                    </a>
                                                </div>


                                                <div class="right_block">
                                                    <h5 class="s_title_block">
                                                        <a href="#">{{$products[$i+$j]->name}}</a>
                                                    </h5>

                                                    <div class="product_desc">{{$products[$i+$j]->description}}
                                                    </div>

                                                    @if(isset($session_ids) && sizeof($session_ids))

                                                    <?php $key = array_search($id, $session_ids);
                                                    $checked = is_int($key) ? "checked" : "";?>
                                                    @else
                                                    <?php $checked = "" ?>
                                                    @endif

                                                    <div class="left_block">
                                                        <p class="compare select_to_compare" data-id="{{$id}}">
                                                            <input type="checkbox" id="comparator_item_{{$id}}"
                                                                   class="comparator" {{$checked}}/>
                                                            <label for="comparator_item_{{$id}}">Select to
                                                                compare</label>
                                                        </p>
                                                    </div>
                                                    <p class="content_price">
                                                        <span class="price" style="display: inline;">
                                                           <span class="WebRupee">Rs.</span>{{$products[$i+$j]->list_price}}
                                                        </span><br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    @endif

                                    @endfor


                                </div>

                                @endfor

                                @else
                                <h4>No products found</h4>
                                @endif


                            </div>
                        </div>
                        <!-- Products list ends here -->

                        <!-- Pagination -->
                        <div id="pagination_bottom" class="pagination">
                            @if(!is_null($products)) <?php echo $products->links(); ?> @endif
                        </div>
                        <!-- /Pagination -->

                    </div>
                </div>

            </section>

        </div>
    </div>
</section>


@stop