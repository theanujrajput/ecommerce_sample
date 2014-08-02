@extends('layouts.dashboard_default')

@section('content')

<div class="row">
    <div class="col-lg-12">
        {{ Notification::showSuccess() }}
        {{ Notification::showError() }}
    </div>
</div>

<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{URL::to('dashboard/products')}}">Products</a></li>
            <li>Tags</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>

<div class="row">

    @include('_partials.dashboard.vertical_tabs_product')

    <div class="col-lg-10">

        <h3>{{$product->name}}</h3>

        <div class="panel">
            <div class="panel-heading">
                Tags
                <a href="{{URL::to('dashboard/product-tags/create/'.$product->id)}}"
                   class="btn btn-primary btn-sm col-lg-offset-5"><i class="fa fa-plus-circle"></i> Add </a>
            </div>
            <div class="panel-body">

                @if($product->tags->count()!=0)
                <table class="table  table-hover general-table">
                    <thead>

                    <tr>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Offer Price</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $tags = $product->tags; ?>

                    @foreach($tags as $tag)
                    <tr>
                        <td>{{$tag->name}}</td>
                        <td>{{$tag->code}}</td>
                        <td>{{$tag->description}}</td>
                        <td>{{$tag->pivot->offer_price}}</td>
                        <td>{{AppUtil::getParsedDate($tag->pivot->created_at)}}</td>
                        <td>
                            <a class="btn btn-xs btn-info"
                               href="{{URL::to('dashboard/product-tags/edit/'.$product->id.'/'.$tag->id)}}">
                                <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger"
                               href="{{URL::to('dashboard/product-tags/destroy/'.$product->id.'/'.$tag->id)}}">
                                <i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No tags have been added.</h4>
                @endif

            </div>
        </div>


    </div>

</div>


@stop