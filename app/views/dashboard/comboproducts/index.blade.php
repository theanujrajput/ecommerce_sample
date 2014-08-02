@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {
        $('#myModal').on('shown.bs.modal', function () {
            $('#product_id').val("");
            $('#price').val("");
            $('.select', this).chosen();
        });
        $('#add_product_form').validate({ ignore: ":hidden:not(select)" });
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
            <li><a href=""></a>Combos</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>

<div class="row">

    <!--side tab starts here-->
    <div class="col-lg-2">
        <ul class="nav nav-tabs tabs-left">
            <li class="">
                <a href="{{URL::to('/dashboard/combo/edit/'.$combo->id)}}">Combo Info</a>
            </li>
            <li class="active">
                <a href="" class="active">Combo Products</a>
            </li>
        </ul>
    </div>
    <!--side tabs ends here-->

    <div class="col-lg-10">

        <h3>{{$combo->name}}</h3>

        <div class="panel">
            <div class="panel-heading">
                Products
                <a href="#" data-toggle="modal" data-target="#myModal"
                   class="btn btn-primary btn-sm col-lg-offset-5"><i class="fa fa-plus-circle"></i> Add Products</a>
            </div>
            <div class="panel-body">

                @if($combo->products->count()!=0)
                <?php $combo_products = $combo->products ?>
                <table class="table  table-hover general-table">
                    <thead>

                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Combo Price</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach($combo_products as $product)

                    <?php $images = $product->images;
                    $image = HtmlUtil::getPrimaryImage($images);
                    $path = isset($image['path']) ? $image['path'] : Constants::DEFAULT_300_IMAGE;
                    ?>

                    <tr>
                        <td><img src="{{URL::to($path)}}" alt="" class="tab_image"/></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->pivot->combo_price}}</td>
                        <td>{{$product->pivot->created_at}}</td>

                        <td><a href="{{URL::to('dashboard/combo-products/delete/'.$combo->id.'/'.$product->id)}}"
                               class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a></td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No products have been added.</h4>
                @endif

            </div>
        </div>


    </div>

</div>


<!--add product Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Add Product</h4>
            </div>
            <form action="{{URL::to('dashboard/combo-products/add-combo-product/'.$combo->id)}}"
                  class="cmxform form-horizontal "
                  id="add_product_form" method="post">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="product_id" class="control-label col-lg-3">Product *</label>

                        <div class="col-lg-6">
                            <select name="product_id" id="product_id" class="form-control col-lg-6 select required"
                                    data-placeholder="Select a product*">

                                <option value=""></option>
                                @foreach($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                                @endforeach

                            </select>
                        </div>

                    </div>
                    <div class="form-group">
                        <label for="price" class="control-label col-lg-3">Price *</label>

                        <div class="col-lg-6">
                            <input name="price" type="text" class="required number form-control" id="price"/>
                        </div>
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