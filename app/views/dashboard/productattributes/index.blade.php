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
            <li>Features</li>
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
                Add
            </div>
            <div class="panel-body">

                @if(sizeof($attributes)!=0)
                <div class="form">
                    <form action="{{URL::to('dashboard/product-attributes/create/'.$product->id)}}"
                          class="cmxform form-horizontal" id="form" method="post" enctype="multipart/form-data">


                        @foreach($attributes as $key=>$value)
                        <div class="form-group ">

                            <label for="{{$value['id']}}" class="control-label col-lg-2">{{$value['name']}}</label>

                            @if($value['attribute_value_type']=='string')
                            <?php $validate="lettersonly"; ?>
                            @elseif($value['attribute_value_type']=='integer')
                            <?php $validate="digits"; ?>
                            @elseif($value['attribute_value_type']=='decimal')
                            <?php $validate="number"; ?>
                            @endif

                            <div class="col-lg-4">
                                <input name="id_{{$value['id']}}" type="text" class="form-control {{$validate}}"
                                       id="{{$value['id']}}"
                                       value="@if(isset($values_array[$value['id']])){{trim($values_array[$value['id']]['value'])}}@endif"/>
                            </div>

                            <div class="col-sm-1">
                              <h4><span class="label label-default">{{$value['attribute_value_type']}}</span></h4>
                            </div>

                            <div class="col-lg-4">
                                <textarea name="notes_{{$value['id']}}" class="form-control" rows="3"
                                          placeholder="Enter notes here">@if(isset($values_array[$value['id']])){{$values_array[$value['id']]['notes']}}@endif</textarea>
                            </div>

                        </div>
                        @endforeach


                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
                @else
                <h4>No features have been added yet.</h4>
                @endif

            </div>
        </div>
    </div>

</div>


@stop