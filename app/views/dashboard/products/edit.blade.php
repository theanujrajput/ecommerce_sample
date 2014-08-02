@extends('layouts.dashboard_default')

@section('content')

{{HTML::style('backoffice/css/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
{{HTML::script('backoffice/js/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
{{HTML::script('backoffice/js/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}

<script type="text/javascript">
    $(document).ready(function () {

        $('#form').validate({ ignore: ":hidden:not(select)" });


        $('.description').wysihtml5({
            "image": false
        });

        $('#sequence').chosen();

    });

</script>
<div class="row">

    <div class="col-lg-12">

        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{URL::to('dashboard/products')}}">Product</a></li>
            <li>Edit</a></li>
        </ul>
        <!--breadcrumbs end -->

    </div>

</div>

<div class="row">

@include('_partials.dashboard.vertical_tabs_product')

<?php $base_product_id = $product->base_product_id; ?>

<div class="col-lg-10">

<h3>{{$product->name}}</h3>

<div class="panel">

<div class="panel-heading">
    Edit
</div>

<div class="panel-body">


<div class="form">
<form action="{{URL::to('dashboard/products/edit/'.$product->id)}}" class="cmxform form-horizontal" id="form"
      method="post">

<div class="form-group ">
    <label for="name" class="control-label col-lg-3">Name *</label>

    <div class="col-lg-7">
        <input name="name" type="text" class="required form-control" id="name"
               value="{{$product->name}}"/>
        <span class="error">{{$errors->first('name')}}</span>
    </div>

</div>

<div class="form-group">
    <label for="code" class="control-label col-lg-3">Code *</label>

    <div class="col-lg-7">
        <input name="code" type="text" class="required form-control" id="code"
               value="{{$product->code}}"/>
        <span class="error">{{$errors->first('code')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="shortcode" class="control-label col-lg-3">Shortcode *</label>

    <div class="col-lg-7">
        <input name="shortcode" type="text" class="required form-control" id="shortcode"
               value="{{$product->shortcode}}"/>
        <span class="error">{{$errors->first('shortcode')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="description" class="control-label col-lg-3">Description (Quick Overview)*</label>

    <div class="col-lg-7">
        <textarea class="required description form-control" name="description" id=""
                  rows="8">{{$product->description}}</textarea>
        <span class="error">{{$errors->first('description')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="description_secondary" class="control-label col-lg-3">Secondary
        Description (More Info)*</label>

    <div class="col-lg-7">
        <textarea class="required description form-control" name="description_secondary" id="description_secondary"
                  rows="8">{{$product->description_secondary}}</textarea>
        <span class="error">{{$errors->first('description_secondary')}}</span>

    </div>
</div>


<div class="form-group">
    <label for="category" class="control-label col-lg-3">Category *</label>

    <div class="col-lg-7">


        <?php $category_id = $product->category_id; ?>
        @foreach($categories as $category)

        @if($category_id==$category->id)
        <?php $category_name = $category->name; ?>
        @endif

        @endforeach


        <input type="text" value="{{$category_name}}" class="form-control" readonly/>
        <input type="hidden" name="category" value="{{$category_id}}"/>
        <span class="error">{{$errors->first('category')}}</span>
    </div>
</div>

@if(isset($base_product_id))
<div class="form-group">
    <label for="base_product" class="control-label col-lg-3">Base Product</label>

    <div class="col-lg-7">


        @foreach($products as $row)
        @if($base_product_id==$row->id)
        <?php $base_product_name = $row->name;
        ?>
        @endif
        @endforeach

        <input type="text" class="form-control" value="{{$base_product_name}}" readonly/>
        <input type="hidden" name="base_product" value="{{$base_product_id}}"/>

    </div>
</div>
@endif


<div class="form-group">
    <?php $active = $product->active; ?>
    <label for="active" class="control-label col-lg-3">Active ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="active" value="1"
            @if(isset($active)&& $active==1) checked @endif/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="active" value="0"
            @if(isset($active)&& $active==0) checked @endif/>No
        </div>
    </div>
    <span class="error">{{$errors->first('active')}}</span>
</div>


<div class="form-group">
    <?php $is_delivered = $product->is_delivered; ?>

    <label for="delivered" class="control-label col-lg-3">Is delivered ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="delivered" value="1"
            @if(isset($is_delivered)&& $is_delivered==1) checked @endif/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="delivered" value="0"
            @if(isset($is_delivered)&& $is_delivered==0) checked @endif/>No
        </div>
    </div>
    <span class="error">{{$errors->first('delivered')}}</span>
</div>


<div class="form-group">
    <?php $is_ltw = $product->is_ltw; ?>
    <label for="ltw" class="control-label col-lg-3">Is Ltw ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="ltw" value="1"
            @if(isset($is_ltw)&& $is_ltw==1) checked @endif/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="ltw" value="0"
            @if(isset($is_ltw)&& $is_ltw==0) checked @endif/>No
        </div>
    </div>
    <span class="error">{{$errors->first('ltw')}}</span>
</div>

<div class="form-group">
    <?php $is_cod = $product->is_cod; ?>
    <label for="cod" class="control-label col-lg-3">Is Cod ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="cod" value="1"
            @if(isset($is_cod)&& $is_cod==1) checked @endif/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="cod" value="0"
            @if(isset($is_cod)&& $is_cod==0) checked @endif/>No
        </div>
    </div>
    <span class="error">{{$errors->first('cod')}}</span>
</div>

<div class="form-group ">
    <label for="warranty" class="control-label col-lg-3">Warranty</label>

    <div class="col-lg-7">
        <input class="required form-control digits " id="warranty" value="{{$product->warranty}}"
               type="text" name="warranty"/>
        <span class="error">{{$errors->first('warranty')}}</span>
    </div>
</div>

<div class="form-group ">
    <label for="list_price" class="control-label col-lg-3">List Price*</label>

    <div class="col-lg-7">
        <input name="list_price" class="required form-control number "
               id="list_price" value="{{$product->list_price}}" type="text"/>
        <span class="error">{{$errors->first('list_price')}}</span>
    </div>
</div>

<div class="form-group ">
    <label for="offer_price" class="control-label col-lg-3">Offer Price*</label>

    <div class="col-lg-7">
        <input name="offer_price" class="required form-control number "
               id="offer_price" value="{{$product->offer_price}}" type="text"/>
        <span class="error">{{$errors->first('offer_price')}}</span>
    </div>
</div>

<div class="form-group ">
    <label for="weight" class="control-label col-lg-3">Weight*</label>

    <div class="col-lg-7">
        <input name="weight" class="required form-control number "
               id="weight" value="{{$product->weight}}" type="text"/>
        <span class="error">{{$errors->first('weight')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="" class="control-label col-lg-3">Sequence *</label>

    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="top"
            @if(isset($sequence)&&$sequence=='top') checked @endif/>At top
        </div>
    </div>

    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="bottom"
            @if(isset($sequence)&&$sequence=='bottom') checked @endif/>At End
        </div>
    </div>

    @if(!is_null($products))

    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="after"
            @if(isset($sequence)&& is_int($sequence)) checked @endif/>After
        </div>
    </div>


    <div class="col-lg-3">

        <select name="after" id="sequence" class="form-control input-sm m-bot15">
            <?php foreach ($products as $row): ?>

                @if($product->id==$row->id)
                <?php continue; ?>
                @endif

                <option value="{{$row->id}}"

            @if(isset($sequence) && is_int($sequence) && ($sequence==$row->id) )
            checked
            @endif
            >{{$row->name}}</option>

            <?php endforeach; ?>
        </select>
    </div>
    @endif


    <span class="error">{{$errors->first('sequence')}}</span>
</div>

@if(isset($base_product_id))
<div class="form-group">
    <label for="base_diff_text" class="control-label col-lg-3">Base Difference Text *</label>

    <div class="col-lg-7">
        <textarea name="base_diff_text" class="required form-control" id="base_diff_text"
                  rows="6">{{$product->base_diff_text}}</textarea>
        <span class="error">{{$errors->first('base_diff_text')}}</span>

    </div>
</div>
@endif

<div class="form-group ">
    <label for="popularity" class="control-label col-lg-3">Popularity</label>

    <div class="col-lg-7">
        <input name="popularity" class="form-control number" id="weight"
               value="{{$product->popularity}}" type="text"/>
        <span class="error">{{$errors->first('popularity')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="meta_title" class="control-label col-lg-3">Meta Title </label>

    <div class="col-lg-7">
        <textarea class=" form-control" name="meta_title" id=""
                  rows="6">{{$product->meta_title}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="control-label col-lg-3">Meta Description </label>

    <div class="col-lg-7">
        <textarea class=" form-control" name="meta_description" id=""
                  rows="6">{{$product->meta_description}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_keywords" class="control-label col-lg-3">Meta Keywords </label>

    <div class="col-lg-7">
        <textarea class=" form-control" name="meta_keywords" id=""
                  rows="6">{{$product->meta_keywords}}</textarea>
    </div>
</div>


<div class="form-group">
    <div class="col-lg-offset-3 col-lg-6">
        <button class="btn btn-primary" type="submit">Save</button>
        <button class="btn btn-default" type="button">Cancel</button>
    </div>
</div>
</form>
</div>


</div>

</div>

</div>

</div>


</div>


@stop