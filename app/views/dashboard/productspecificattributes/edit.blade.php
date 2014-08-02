@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

//        $('#form').validate();

    });

</script>

<div class="row">


    <div class="col-lg-12">

        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{URL::to('dashboard/products')}}">Products</a></li>
            <li>Edit</a></li>
        </ul>
        <!--breadcrumbs end -->

    </div>

    @include('_partials.dashboard.vertical_tabs_product')
    <div class="col-lg-10">

        <div class="panel">

            <div class="panel-heading">
                Edit
            </div>

            <div class="panel-body">

                <div class="form">
                    <form class="cmxform form-horizontal " id="form" method="post"
                          action="{{URL::to('dashboard/product-specific-attributes/edit/'.$specific_attribute->id)}}">
                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name *</label>

                            <div class="col-lg-6">
                                <input name="name" type="text" class="required form-control" id="name"
                                       value="{{$specific_attribute->name}}"/>
                                <span class="error">{{$errors->first('name')}}</span>
                            </div>

                        </div>

                        <div class="form-group">
                            <label for="value" class="control-label col-lg-3">Value *</label>

                            <div class="col-lg-6">
                                <input name="value" type="text" class="required form-control" id="value"
                                       value="{{$specific_attribute->value}}"/>
                                <span class="error">{{$errors->first('name')}}</span>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="notes" class="control-label col-lg-3">Notes * </label>

                            <div class="col-lg-6">
                                <textarea class="form-control required" name="notes" id=""
                                          rows="6">{{$specific_attribute->notes}}</textarea>
                                <span class="error"></span>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>

</div>


@stop