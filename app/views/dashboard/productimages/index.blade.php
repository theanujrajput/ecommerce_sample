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
            <li>Images</li>
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
                Images
                <a id="iframe" href="{{URL::to('dashboard/product-images/create/'.$product->id)}}"
                   class="btn btn-primary btn-sm col-lg-offset-5"><i class="fa fa-plus-circle"></i> Add Images</a>
            </div>
            <div class="panel-body">

                @if($product->images->count()!=0)
                <table class="table  table-hover general-table">
                    <thead>

                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Caption</th>
                        <th>Notes</th>
                        <th>Is Primary</th>
                        <th>Created At</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $images = $product->images; ?>

                    @foreach($images as $image)
                    <tr>
                        <td><img src="{{URL::to($image->path)}}" alt="" class="tab_image"/></td>
                        <td>{{$image->pivot->name}}</td>
                        <td>{{$image->pivot->title}}</td>
                        <td>{{$image->pivot->caption}}</td>
                        <td>{{$image->pivot->notes}}</td>
                        <td>
                            @if($image->pivot->is_primary==1)
                            <a href="{{URL::to('dashboard/product-images/set-primary-image/'.$product->id.'/'.$image->id)}}">
                                <i class="fa fa-check green"></i>
                            </a>
                            @else
                            <a href="{{URL::to('dashboard/product-images/set-primary-image/'.$product->id.'/'.$image->id)}}">
                                <i class="fa fa-times red"></i>
                            </a>
                            @endif
                        </td>
                        <td>{{AppUtil::getParsedDate($image->created_at)}}</td>
                        <td><a href="{{URL::to($image->path)}}" target="_blank">View</a></td>
                        <td>
                            <a class="btn btn-xs btn-info"
                               href="{{URL::to('dashboard/product-images/edit/'.$product->id.'/'.$image->id)}}">
                                <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger"
                               href="{{URL::to('dashboard/product-images/destroy/'.$product->id.'/'.$image->id)}}">
                                <i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No images have been added.</h4>
                @endif

            </div>
        </div>


    </div>

</div>


@stop