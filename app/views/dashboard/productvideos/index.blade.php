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
            <li>Videos</li>
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
                Videos
                <a id="iframe" href="{{URL::to('dashboard/product-videos/create/'.$product->id)}}"
                   class="btn btn-primary btn-sm col-lg-offset-5"><i class="fa fa-plus-circle"></i> Add Video</a>
            </div>
            <div class="panel-body">

                @if($product->videos->count()!=0)
                <table class="table  table-hover general-table">
                    <thead>

                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Label</th>
                        <th>Notes</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $videos = $product->videos; ?>

                    @foreach($videos as $video)
                    <tr>
                        <td>{{$video->pivot->name}}</td>
                        <td>{{$video->pivot->title}}</td>
                        <td>{{$video->pivot->label}}</td>
                        <td>{{$video->pivot->notes}}</td>
                        <td>
                            @if($video->active==1)
                            <a href="{{URL::to('dashboard/product-videos/activate-or-deactivate/'.$product->id.'/'.$video->id.'/0')}}">
                                <i class="fa fa-check green"></i>
                            </a>
                            @else
                            <a href="{{URL::to('dashboard/product-videos/activate-or-deactivate/'.$product->id.'/'.$video->id.'/1')}}">
                                <i class="fa fa-times red"></i>
                            </a>
                            @endif
                        </td>
                        <td>{{AppUtil::getParsedDate($video->created_at)}}</td>
                        <td><a href="{{URL::to($video->path)}}" target="_blank">View</a></td>
                        <td>
                            <a class="btn btn-xs btn-info"
                               href="{{URL::to('dashboard/product-videos/edit/'.$product->id.'/'.$video->id)}}">
                                <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger"
                               href="{{URL::to('dashboard/product-videos/delete/'.$product->id.'/'.$video->id)}}">
                                <i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No videos have been added.</h4>
                @endif

            </div>
        </div>


    </div>

</div>


@stop