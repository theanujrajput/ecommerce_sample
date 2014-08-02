@extends('layouts.dashboard_default')

@section('content')

{{HTML::style('backoffice/css/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css')}}
{{HTML::script('backoffice/js/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js')}}
{{HTML::script('backoffice/js/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js')}}

<script type="text/javascript">
    $(document).ready(function () {


        $('.description').wysihtml5({
            "image": false
        });

        $('#form').validate({ ignore: ":hidden:not(select)" });
        $('#category,#sequence').chosen();


    });
</script>


<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{URL::to('dashboard/products')}}">Products</a></li>
            <li>Add New</li>
        </ul>
        <!--breadcrumbs end -->
    </div>

</div>


<div class="row">

<div class="col-lg-12">
<div class="panel">
<div class="panel-heading">

</div>
<div class="panel-body">
<div class="form">
<form action="{{URL::to('dashboard/products/create')}}" class="cmxform form-horizontal"
      id="form" method="post">
<div class="form-group ">
    <label for="name" class="control-label col-lg-3">Name *</label>

    <div class="col-lg-6">
        <input name="name" type="text" class="required form-control" id="name" value="{{Input::old('name')}}"/>
        <span class="error">{{$errors->first('name')}}</span>
    </div>

</div>

<div class="form-group">
    <label for="code" class="control-label col-lg-3">Code *</label>

    <div class="col-lg-6">
        <input name="code" type="text" class="required form-control" id="code" value="{{Input::old('code')}}"/>
        <span class="error">{{$errors->first('code')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="shortcode" class="control-label col-lg-3">Shortcode *</label>

    <div class="col-lg-6">
        <input name="shortcode" type="text" class="required form-control" id="shortcode"
               value="{{Input::old('shortcode')}}"/>
        <span class="error">{{$errors->first('shortcode')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="description" class="control-label col-lg-3">Description (Quick Overview)*</label>

    <div class="col-lg-6">
        <textarea name="description" class="required description form-control" id="description" rows="8">{{Input::old('description')}}</textarea>
        <span class="error">{{$errors->first('description')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="description_secondary" class="control-label col-lg-3">Secondary
        Description (More Info)*</label>

    <div class="col-lg-6">
        <textarea name="description_secondary" class="required description form-control" id=""
                  rows="8">{{Input::old('secondary_description')}}</textarea>
        <span class="error">{{$errors->first('secondary_description')}}</span>

    </div>
</div>

<div class="form-group">
    <label for="category" class="control-label col-lg-3">Category *</label>

    <div class="col-lg-6">
        <select name="category" id="category" class="required form-control input-sm m-bot15"
                data-placeholder="Select Category">
            <option value=""></option>
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
        <span class="error">{{$errors->first('category')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="active" class="control-label col-lg-3">Active ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input name="active" type="radio" class="required" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input name="active" type="radio" class="required" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('active')}}</span>
</div>

<div class="form-group">
    <label for="delivered" class="control-label col-lg-3">Is delivered ? </label>

    <div class="col-lg-3">
        <div class="radio">
            <input name="delivered" type="radio" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input name="delivered" type="radio" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('delivered')}}</span>
</div>


<div class="form-group">
    <label for="ltw" class="control-label col-lg-3">Is Ltw ? </label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" name="ltw" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" name="ltw" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('ltw')}}</span>
</div>

<div class="form-group">
    <label for="cod" class="control-label col-lg-3">Is Cod ? </label>

    <div class="col-lg-3">
        <div class="radio">
            <input name="cod" type="radio" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input name="cod" type="radio" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('cod')}}</span>
</div>

<div class="form-group ">
    <label for="warranty" class="control-label col-lg-3">Warranty</label>

    <div class="col-lg-6">
        <input name="warranty" class="form-control number " id="warranty" value="{{Input::old('warranty')}}"
               type="text"/>
        <span class="error">{{$errors->first('warranty')}}</span>
    </div>
</div>

<div class="form-group ">
    <label for="list_price" class="control-label col-lg-3">List Price*</label>

    <div class="col-lg-6">
        <input name="list_price" class="required form-control number " id="list_price"
               value="{{Input::old('list_price')}}" type="text"/>
        <span class="error">{{$errors->first('list_price')}}</span>
    </div>
</div>

<div class="form-group ">
    <label for="offer_price" class="control-label col-lg-3">Offer Price*</label>

    <div class="col-lg-6">
        <input name="offer_price" class="required form-control number " id="offer_price"
               value="{{Input::old('offer_price')}}" type="text"/>
        <span class="error">{{$errors->first('offer_price')}}</span>
    </div>
</div>

<div class="form-group ">
    <label for="weight" class="control-label col-lg-3">Weight*</label>

    <div class="col-lg-6">
        <input name="weight" class="required form-control number " id="weight" value="{{Input::old('weight')}}"
               type="text"/>
        <span class="error">{{$errors->first('weight')}}</span>
    </div>
</div>


<div class="form-group">
    <label for="" class="control-label col-lg-3">Sequence *</label>

    <div class="col-lg-1">
        <div class="radio">
            <input name="sequence" type="radio" class="required" value="top"/>At top
        </div>
    </div>
    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="bottom"/>At End
        </div>
    </div>

    @if(!is_null($products))
    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="after">After
        </div>
    </div>

    <div class="col-lg-3">
        <select name="after" id="sequence" class="form-control input-sm m-bot15" data-placeholder="Select Product">
            <option value=""></option>
            @foreach($products as $product)

            <option value="{{$product->id}}">{{$product->name}}</option>
            @endforeach
        </select>
    </div>
    @endif

    <span class="error">{{$errors->first('sequence')}}</span>
</div>


<div class="form-group ">
    <label for="popularity" class="control-label col-lg-3">Popularity</label>

    <div class="col-lg-6">
        <input name="popularity" class="form-control number" id="weight" value="{{Input::old('popularity')}}"
               type="text"/>
        <span class="error">{{$errors->first('popularity')}}</span>
    </div>
</div>


<div class="form-group">
    <label for="meta_title" class="control-label col-lg-3">Meta Title </label>

    <div class="col-lg-6">
        <textarea name="meta_title" class=" form-control" id="meta_title"
                  rows="6">{{Input::old('meta_title')}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="control-label col-lg-3">Meta Description </label>

    <div class="col-lg-6">
        <textarea name="meta_description" class=" form-control" id="meta_description"
                  rows="6">{{Input::old('meta_description')}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_keywords" class="control-label col-lg-3">Meta Keywords </label>

    <div class="col-lg-6">
        <textarea name="meta_keywords" class=" form-control" id="meta_keywords"
                  rows="6">{{Input::old('meta_keywords')}}</textarea>
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


@stop