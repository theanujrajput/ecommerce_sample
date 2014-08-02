@extends('layouts.dashboard_default')

@section('content')


<div class="row">
    <div class="col-lg-12">
        {{Notification::showSuccess()}}
    </div>
</div>


<div class="row">
    <div class="col-lg-10">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li>Products</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
    <div class="col-lg-2">
        <a href="{{URL::to('dashboard/products/create')}}" class="btn btn-primary btn-sm"><i
                class="fa fa-plus-circle"></i> Add New</a>
    </div>
</div>
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                Products
                <div style="text-transform: none" class="pull-right label btn-xs btn-info">Variant</div>
            </header>
            <div class="panel-body">
                <table class="table general-table">
                    <thead>
                    <tr>
                        <th>Photo</th>
                        <th>Name</th>
                        <th>Variant Of</th>
                        <th>Code</th>
                        <th>Category</th>
                        <th>List Price</th>
                        <th>Offer Price</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(!is_null($products))

                    @foreach($products as $product)


                    <tr class="@if($product->base_product_id!=null)alert alert-info @endif">
                        <td>
                            <?php $images = $product->images; ?>
                            @if(isset($images))
                            <?php $image = HtmlUtil::getPrimaryImage($images);
                            $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                            ?>
                            @else

                            <?php $path = Constants::DEFAULT_300_IMAGE; ?>

                            @endif

                            <img src="{{URL::to($path)}}" alt="" class="tab_image"/>

                        </td>
                        <td>{{$product->name}}</td>
                        <td>
                            <?php $variant = HtmlUtil::getProductById($product->base_product_id) ?>
                            {{$variant->name or 'None'}}
                        </td>
                        <td>{{$product->code}}</td>
                        <td>{{$product->category->name}}</td>
                        <td>{{$product->list_price}}</td>
                        <td>{{$product->offer_price}}</td>
                        <td>
                            @if($product->active==1)
                            <a href="{{URL::to('dashboard/products/activate-or-deactivate/'.$product->id.'/0')}}">
                                <i class="fa fa-check green"></i>
                            </a>
                            @else
                            <a href="{{URL::to('dashboard/products/activate-or-deactivate/'.$product->id.'/1')}}">
                                <i class="fa fa-times red"></i>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('dashboard/products/edit/'.$product->id)}}"
                               class="btn btn-info btn-xs" title="Edit"><i
                                    class="fa fa-pencil"></i></a>

                            @if($product->base_product_id==null)
                            <a href="{{URL::to('dashboard/variant/create/'.$product->id)}}"
                               class="btn btn-success btn-xs"
                               title="Create Variant">
                                <i class="fa fa-exchange"></i>
                            </a>
                            @endif
                        </td>

                    </tr>


                    @endforeach

                    @else

                    @endif

                    </tbody>

                </table>
            </div>
        </section>
    </div>
    <div class="text-center">
        <?php echo $products->links(); ?>
    </div>
</div>


@stop