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
            <li><a href="{{URL::to('dashboard/category')}}">Category</a></li>
            <li>Features</a></li>
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
            Edit Feature
        </div>

        <div class="panel-body">

            <div class="form">
                <form class="cmxform form-horizontal " id="form" method="post"
                      action="{{URL::to('dashboard/category-attributes/edit/'.$category->id.'/'.$attribute->id)}}">
                    <div class="form-group ">
                        <label for="name" class="control-label col-lg-3">Name *</label>

                        <div class="col-lg-6">
                            <input name="name" type="text" class="required form-control" id="name"
                                   value="{{$attribute->name}}"/>
                            <span class="error">{{$errors->first('name')}}</span>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="code" class="control-label col-lg-3">Code *</label>

                        <div class="col-lg-6">
                            <input name="code" type="text" class="required form-control" id="code"
                                   value="{{$attribute->code}}"/>
                            <span class="error">{{$errors->first('code')}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="attribute_category" class="control-label col-lg-3">Attribute Category *</label>

                        <div class="col-lg-6">
                            <input name="attribute_category" type="text" class="required form-control"
                                   id="attribute_category"
                                   value="{{$attribute->attribute_category}}"/>
                            <span class="error">{{$errors->first('attribute_category')}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="description" class="control-label col-lg-3">Description *</label>

                        <div class="col-lg-6">
                            <textarea class="required form-control" name="description" id="" rows="6">{{$attribute->description}}</textarea>
                            <span class="error">{{$errors->first('description')}}</span>
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

                        @if(sizeof($attributes)!=0)
                        <div class="col-lg-1">
                            <div class="radio">
                                <input type="radio" class="required" name="sequence" value="after"
                                @if(isset($sequence)&& is_int($sequence)) checked @endif/>After
                            </div>
                        </div>

                        <div class="col-lg-3">
                            <select name="after" class="form-control" id="">
                                <?php foreach ($attributes as $row): ?>

                                    @if($attribute->id==$row['id'])
                                    <?php continue; ?>
                                    @endif
                                    <option value="{{$row['sequence']}}"
                                            @if(isset($sequence) && is_int($sequence) && ($sequence==$row['id']) )
                                            checked
                                            @endif>{{$row['name']}}</option>

                                <?php endforeach; ?>
                            </select>

                        </div>
                        @endif

                        <span class="error">{{$errors->first('sequence')}}</span>
                    </div>

                    <div class="form-group">
                        <label for="active" class="control-label col-lg-3">Active ? *</label>
                        <?php $active = $attribute->active; ?>
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
                        <label for="comparable" class="control-label col-lg-3">Is Comparable ? *</label>

                        <?php $comparable = $attribute->is_comparable; ?>
                        <div class="col-lg-3">
                            <div class="radio">
                                <input type="radio" class="required" name="comparable" value="1"
                                @if(isset($comparable)&& $comparable==1) checked @endif/>Yes
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="radio">
                                <input type="radio" class="required" name="comparable" value="0"
                                @if(isset($comparable)&& $comparable==0) checked @endif/>No
                            </div>
                        </div>
                        <span class="error">{{$errors->first('comparable')}}</span>
                    </div>


                    <div class="form-group">
                        <label for="filterable" class="control-label col-lg-3">Is Filterable ? *</label>

                        <?php $filterable = $attribute->is_filterable; ?>
                        <div class="col-lg-3">
                            <div class="radio">
                                <input type="radio" class="required" name="filterable" value="1"
                                @if(isset($filterable)&& $filterable==1) checked @endif/>Yes
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="radio">
                                <input type="radio" class="required" name="filterable" value="0"
                                @if(isset($filterable)&& $filterable==0) checked @endif/>No
                            </div>
                        </div>
                        <span class="error">{{$errors->first('filterable')}}</span>
                    </div>


                    <div class="form-group ">
                        <label for="attribute_value_type" class="control-label col-lg-3">Feature Value Type
                            *</label>

                        <div class="col-lg-6">
                            <select name="attribute_value_type" id="attribute_value_type"
                                    class="required form-control">

                                <option value="string">String</option>
                                <option value="integer">Integer</option>
                                <option value="decimal">Decimal</option>
                                <option value="options">Options</option>
                            </select>
                            <span class="error">{{$errors->first('attribute_value_type')}}</span>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="options" class="control-label col-lg-3">Options</label>

                        <div class="col-lg-6">
                            <input type="text" name="options" id="options" class="form-control"
                                   value="{{$attribute->options}}"/>
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