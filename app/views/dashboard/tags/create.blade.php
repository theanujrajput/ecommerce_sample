@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

        $('#form').validate();

    });

</script>

<div class="row">

<div class="col-lg-12">

    <!--breadcrumbs start -->
    <ul class="breadcrumb">
        <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
        <li><a href="{{URL::to('dashboard/tags')}}">Tags</a></li>
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
      action="{{URL::to('dashboard/tags/create')}}">
<div class="form-group ">
    <label for="name" class="control-label col-lg-3">Name *</label>

    <div class="col-lg-6">
        <input name="name" type="text" class="required form-control" id="name"
               value="{{Input::old('name')}}"/>
        <span class="error">{{$errors->first('name')}}</span>
    </div>

</div>

<div class="form-group">
    <label for="code" class="control-label col-lg-3">Code *</label>

    <div class="col-lg-6">
        <input name="code" type="text" class="required form-control" id="code"
               value="{{Input::old('code')}}"/>
        <span class="error">{{$errors->first('code')}}</span>
    </div>
</div>

<div class="form-group">
    <label for="description" class="control-label col-lg-3">Description </label>

    <div class="col-lg-6">
        <textarea class="form-control" name="description" id="" rows="6">{{Input::old('description')}}</textarea>
        <span class="error">{{$errors->first('description')}}</span>
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