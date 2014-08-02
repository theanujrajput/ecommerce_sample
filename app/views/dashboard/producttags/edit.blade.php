@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").validate();

    });
</script>


<div class="row">
    <div class="col-lg-12">
        {{ Notification::showSuccess() }}
        {{ Notification::showError() }}
    </div>
</div>


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
                Edit
            </div>
            <div class="panel-body">

                <div class="form">
                    <form action="{{URL::to('dashboard/product-tags/edit/'.$product->id.'/'.$tag->id)}}"
                          class="cmxform form-horizontal" id="form" method="post" enctype="multipart/form-data">

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name *</label>

                            <div class="col-lg-6">
                                <input name="name" type="text" class="required form-control" id="name"
                                       value="{{$tag->name}}" readonly/>
                                <span class="error">{{$errors->first('name')}}</span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="code" class="control-label col-lg-3">Code *</label>

                            <div class="col-lg-6">
                                <input name="code" type="text" class="required form-control" id="code"
                                       value="{{$tag->code}}" readonly/>
                                <span class="error">{{$errors->first('code')}}</span>
                            </div>
                        </div>

                        <div class="form-group">

                            <label for="description" class="control-label col-lg-3">Description </label>

                            <div class="col-lg-6">
                                <textarea name="description" id="description" rows="6"
                                          class="form-control" readonly>{{$tag->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="offer_price" class="control-label col-lg-3">Offer Price *</label>

                            <div class="col-lg-6">
                                <input name="offer_price" type="text" class="required number form-control"
                                       id="offer_price"
                                       value="{{$tag->offer_price}}"/>
                                <span class="error">{{$errors->first('offer_price')}}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>


@stop