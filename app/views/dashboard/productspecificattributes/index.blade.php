@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

        $('#create_form').validate();

    });
</script>


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
            <li>Specific Features</li>
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
                Specific Features
                <a href="#" class="btn btn-primary btn-sm col-lg-offset-5" data-toggle="modal"
                   data-target="#createAttributeModal">
                    <i class="fa fa-plus-circle"></i> Add </a>
            </div>
            <div class="panel-body">

                @if($product->product_specific_attributes->count()!=0)
                <table class="table  table-hover general-table">
                    <thead>

                    <tr>
                        <th>Name</th>
                        <th>Value</th>
                        <th>Notes</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $product_specific_attributes = $product->product_specific_attributes; ?>

                    @foreach($product_specific_attributes as $row)
                    <tr>
                        <td>{{$row->name}}</td>
                        <td>{{$row->value}}</td>
                        <td>{{$row->notes}}</td>
                        <td>{{AppUtil::getParsedDate($row->created_at)}}</td>
                        <td>
                            <a class="btn btn-xs btn-info"
                               href="{{URL::to('dashboard/product-specific-attributes/edit/'.$row->id)}}">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <a class="btn btn-xs btn-danger"
                               href="{{URL::to('dashboard/product-specific-attributes/delete/'.$row->id)}}">
                                <i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No specific features have been added.</h4>
                @endif

            </div>
        </div>


    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="createAttributeModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Create Specific Feature</h4>
            </div>
            <form id="create_form"
                  action="{{URL::to('dashboard/product-specific-attributes/create/'.$product->id)}}" method="post">
                <div class="modal-body">


                    <div class="form-group">
                        <label for="name" class="control-label col-lg-3">Name *</label>


                        <input name="name" type="text" class="required form-control" id="name"/>

                    </div>

                    <div class="form-group">
                        <label for="value" class="control-label col-lg-3">Value *</label>

                        <input name="value" type="text" class="required form-control" id="value"/>

                    </div>

                    <div class="form-group">
                        <label for="notes" class="control-label col-lg-3">Notes *</label>


                        <textarea name="notes" class="required form-control" id="notes" cols="30"
                                  rows="6"></textarea>

                    </div>


                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>


@stop