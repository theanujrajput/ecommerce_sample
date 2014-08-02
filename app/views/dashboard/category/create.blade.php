@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

        $('#form').validate({ ignore: ":hidden:not(select)" });
        $('#parent_category').chosen();

    });

</script>

<div class="row">

<div class="col-lg-12">

    <!--breadcrumbs start -->
    <ul class="breadcrumb">
        <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{URL::to('dashboard/category')}}">Category</a></li>
        <li>Add New</a></li>
    </ul>
    <!--breadcrumbs end -->

</div>

<div class="col-lg-12">

<div class="panel">

<div class="panel-heading">
    Create
</div>

<div class="panel-body">

<div class="form">
<form class="cmxform form-horizontal " id="form" method="post"
      action="{{URL::to('dashboard/category/create')}}">
<div class="form-group ">
    <label for="name" class="control-label col-lg-3">Name *</label>

    <div class="col-lg-6">
        <input name="name" type="text" class="required form-control" id="name"
               value="{{Input::old('name')}}"/>
        <span class="error">{{$errors->first('name')}}</span>
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
    <label for="description" class="control-label col-lg-3">Description *</label>

    <div class="col-lg-6">
        <textarea class="required form-control" name="description" id=""
                  rows="6">{{Input::old('description')}}</textarea>
        <span class="error">{{$errors->first('description')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="secondary_description" class="control-label col-lg-3">Secondary
        Description</label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="secondary_description" id=""
                  rows="6">{{Input::old('secondary_description')}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="active" class="control-label col-lg-3">Active ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="active" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="active" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('active')}}</span>
</div>


<div class="form-group">
    <label for="" class="control-label col-lg-3">Sequence *</label>

    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="top"/>At top
        </div>
    </div>
    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="bottom"/>At End
        </div>
    </div>

    @if(!is_null($categories))
    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="after"/>After
        </div>
    </div>

    <div class="col-lg-3">
        <select name="after" id="" class="form-control input-sm m-bot15">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select>
    </div>
    @endif
    <span class="error">{{$errors->first('sequence')}}</span>
</div>


<div class="form-group">
    <label for="parent_category" class="control-label col-lg-3">Parent Category *</label>

    <div class="col-lg-6">
        <select id="parent_category" class="required form-control input-sm m-bot15"
                name="parent_category">
            <option value="0">None</option>
            @if(!is_null($categories))
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
            @endif
        </select>
        <span class="error">{{$errors->first('parent_category')}}</span>
    </div>
</div>


<div class="form-group">
    <label for="delivered" class="control-label col-lg-3">Is delivered ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="delivered" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="delivered" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('delivered')}}</span>
</div>


<div class="form-group">
    <label for="ltw" class="control-label col-lg-3">Is Ltw ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="ltw" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="ltw" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('ltw')}}</span>
</div>

<div class="form-group">
    <label for="cod" class="control-label col-lg-3">Is Cod ? *</label>

    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="cod" value="1"/>Yes
        </div>
    </div>
    <div class="col-lg-3">
        <div class="radio">
            <input type="radio" class="required" name="cod" value="0"/>No
        </div>
    </div>
    <span class="error">{{$errors->first('cod')}}</span>
</div>

<div class="form-group ">
    <label for="warranty" class="control-label col-lg-3">Warranty</label>

    <div class="col-lg-6">
        <input class="required form-control digits " id="warranty" value="{{Input::old('warranty')}}"
               type="text" name="warranty"/>
        <span class="error">{{$errors->first('warranty')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="meta_title" class="control-label col-lg-3">Meta Title </label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="meta_title" id=""
                  rows="6">{{Input::old('meta_title')}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="control-label col-lg-3">Meta Description </label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="meta_description" id=""
                  rows="6">{{Input::old('meta_description')}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_keywords" class="control-label col-lg-3">Meta Keywords </label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="meta_keywords" id="" rows="6">{{Input::old('meta_keywords')}}</textarea>
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