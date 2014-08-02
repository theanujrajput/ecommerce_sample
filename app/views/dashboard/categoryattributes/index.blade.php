@extends('layouts.dashboard_default')

@section('content')

<div class="row">
    <div class="col-lg-12">
        {{ Notification::showSuccess() }}
    </div>
</div>

<!-- page start-->
<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{URL::to('dashboard/category')}}">Category</a></li>
            <li>Features</li>

        </ul>
        <!--breadcrumbs end -->
    </div>

</div>

<?php $category_id = $category->id; ?>
<div class="row">

    @include('_partials.dashboard.vertical_tabs_category')

    <div class="col-sm-10">
        <h3>{{$category->name}}</h3>
        <section class="panel">
            <header class="panel-heading">
                Features
                <a href="{{URL::to('dashboard/category-attributes/create/'.$category->id)}}"
                   class="btn btn-primary btn-sm col-lg-offset-5"><i class="fa fa-plus-circle"></i> Add Feature</a>
            </header>

            <div class="panel-body">
                @if(sizeof($attributes)!=0)
                <table class="table general-table">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Code</th>
                        <th>Attribute Category</th>
                        <th>Description</th>
                        <th>Active</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    <?php $original_attributes = $category->attributes;

                    if (isset($original_attributes)) {
                        foreach ($original_attributes as $org_attr) {
                            $org_attr_id[] = $org_attr->id;
                        }
                    }

                    ?>


                    @foreach($attributes as $row)

                    @if(sizeof($org_attr_id)!=0)
                    <?php $is_new = in_array($row['id'], $org_attr_id); ?>
                    @endif

                    <!-- if the attribute is new to the category enable edit and activate,deactivate functionality-->
                    @if($is_new)

                    <tr>
                        <td>{{$row['name'] or ''}}</td>
                        <td>{{$row['code'] or '' }}</td>
                        <td>{{$row['attribute_category'] or ''}}</td>
                        <td>{{$row['description'] or ''}}</td>

                        <td>
                            @if(isset($row['active'])&&$row['active']==1)
                            <a href="{{URL::to('dashboard/category-attributes/activate-or-deactivate/'.$category_id.'/'.$row['id'].'/0')}}">
                                <i class="fa fa-check green"></i>
                            </a>
                            @else
                            <a href="{{URL::to('dashboard/category-attributes/activate-or-deactivate/'.$category_id.'/'.$row['id'].'/1')}}">
                                <i class="fa fa-times red"></i>
                            </a>
                            @endif
                        </td>
                        <td>
                            <a href="{{URL::to('dashboard/category-attributes/edit/'.$category->id.'/'.$row['id'])}}"
                               class="btn btn-xs btn-info"><i
                                    class="fa fa-pencil"></i></a>
                        </td>

                    </tr>

                    <!--  else deactivate  edit and activate,deactivate functionality  -->
                    @else

                    <tr class="active">
                        <td>{{$row['name'] or ''}}</td>
                        <td>{{$row['code'] or '' }}</td>
                        <td>{{$row['attribute_category'] or ''}}</td>
                        <td>{{$row['description'] or ''}}</td>

                        <td>
                            @if(isset($row['active'])&&$row['active']==1)
                            <i class="fa fa-check green"></i>
                            @else
                            <i class="fa fa-times red"></i>
                            @endif
                        </td>
                        <td>
                            <i class="fa fa-pencil"></i>
                        </td>

                    </tr>

                    @endif

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No features have been added</h4>
                @endif
            </div>

        </section>

    </div>


</div>


@stop