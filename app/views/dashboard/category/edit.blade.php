@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

        $('#form').validate({ ignore: ":hidden:not(select)" });
        $('#parent_category,#sequence_after').chosen();

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
            <li><a href="{{URL::to('dashboard/category')}}">Category</a></li>
            <li>Edit</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
</div>

<div class="row">

@include('_partials.dashboard.vertical_tabs_category')

<div class="col-lg-10">

<h3>{{$category->name}}</h3>

<div class="panel">

<div class="panel-heading">
    Edit
</div>

<div class="panel-body">
<div class="form">
<form class="cmxform form-horizontal " id="form" method="post"
      action="{{URL::to('dashboard/category/edit/'.$category->id)}}">
<div class="form-group ">
    <label for="name" class="control-label col-lg-3">Name *</label>

    <div class="col-lg-6">
        <input name="name" type="text" class="required form-control" id="name"
               value="{{$category->name}}"/>
        <span class="error">{{$errors->first('name')}}</span>
    </div>

</div>

<div class="form-group">
    <label for="shortcode" class="control-label col-lg-3">Shortcode *</label>

    <div class="col-lg-6">
        <input name="shortcode" type="text" class="required form-control" id="shortcode"
               value="{{$category->shortcode}}"/>
        <span class="error">{{$errors->first('shortcode')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="description" class="control-label col-lg-3">Description *</label>

    <div class="col-lg-6">
        <textarea class="required form-control" name="description" id=""
                  rows="6">{{$category->description}}</textarea>
        <span class="error">{{$errors->first('description')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="secondary_description" class="control-label col-lg-3">Secondary
        Description</label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="secondary_description" id=""
                  rows="6">{{$category->secondary_description}}</textarea>

    </div>
</div>

<div class="form-group">

    <?php $active = $category->active; ?>
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

    @if(!is_null($categories))
    <div class="col-lg-1">
        <div class="radio">
            <input type="radio" class="required" name="sequence" value="after"
            @if(isset($sequence)&& is_int($sequence)) checked @endif/>After
        </div>
    </div>

    <div class="col-lg-3">
        <select name="after" id="sequence_after" class="form-control input-sm m-bot15">
            <?php foreach ($categories as $row): ?>
                @if($category->id==$row->id)
                <?php continue; ?>
                @endif
                <option value="{{$row->id}}"
            @if(isset($sequence) && is_int($sequence) && ($sequence==$row->id) )
            checked
            @endif >{{$row->name}}</option>
            <?php endforeach; ?>
        </select>
    </div>
    @endif
    <span class="error">{{$errors->first('sequence')}}</span>
</div>


<div class="form-group">
    <label for="parent_category" class="control-label col-lg-3">Parent Category *</label>
    <?php $parent_category_id = $category->parent_category_id; ?>
    <div class="col-lg-6">
        <select id="parent_category" class="required form-control input-sm m-bot15"
                name="parent_category">
            <option value="0">None</option>

            @foreach($categories as $row)

            <option value="{{$row->id}}"
            @if(isset($parent_category_id)&& $parent_category_id==$row->id) selected @endif>
            {{$row->name}}
            </option>

            @endforeach
        </select>
        <span class="error">{{$errors->first('parent_category')}}</span>
    </div>
</div>

<div class="form-group">
    <?php $is_delivered = $category->is_delivered; ?>
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

    <?php $is_ltw = $category->is_ltw; ?>

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
    <?php $is_cod = $category->is_cod; ?>
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
    <label for="warranty" class="control-label col-lg-3">Warranty*</label>

    <div class="col-lg-6">
        <input class="required form-control digits " id="warranty" value="{{$category->warranty}}"
               type="text" name="warranty"/>
        <span class="error">{{$errors->first('warranty')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="meta_title" class="control-label col-lg-3">Meta Title </label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="meta_title" id=""
                  rows="6">{{$category->meta_title}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_description" class="control-label col-lg-3">Meta Description </label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="meta_description" id=""
                  rows="6">{{$category->meta_description}}</textarea>

    </div>
</div>

<div class="form-group">
    <label for="meta_keywords" class="control-label col-lg-3">Meta Keywords </label>

    <div class="col-lg-6">
        <textarea class=" form-control" name="meta_keywords" id=""
                  rows="6">{{$category->meta_keywords}}</textarea>
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