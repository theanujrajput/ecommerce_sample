@extends('layouts.dashboard_default')

@section('content')

<div class="row">
    <div class="col-lg-12"></div>
    {{ Notification::showSuccess() }}
</div>

<!-- page start-->
<div class="row">
    <div class="col-lg-10">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard/category')}}"><i class="fa fa-home"></i> Home</a></li>
            <li>Categories</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
    <div class="col-lg-2">
        <a href="{{URL::to('dashboard/category/create')}}" class="btn btn-sm btn-primary"><i
                class="fa fa-plus-circle"></i> Add New</a>
    </div>


</div>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Categories

            </header>
            <div class="panel-body">
                <table class="table  table-hover general-table">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Parent Category</th>
                        <th>Shortcode</th>
                        <th>Description</th>
                        <th>Active</th>
                        <!--                        <th>Parent Category</th>-->
                        <!--                        <th>Created At</th>-->
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(!is_null($categories))

                    @foreach($categories as $i=>$category)

                    <?php $parent_category = HtmlUtil::getCategory($category->parent_category_id);
                    $parent_category_name = isset($parent_category) ? $parent_category->name : null;
                    $info = isset($parent_category_name) ? "" : "warning";
                    ?>

                    <tr class="{{$info}}">

                        <td>{{$category->name}}</td>
                        <td>{{$parent_category_name or 'None'}}</td>
                        <td>{{$category->shortcode}}</td>
                        <td>{{$category->description}}</td>

                        <td>
                            @if($category->active==1)
                            <a href="{{URL::to('dashboard/category/activate-or-deactivate/'.$category->id.'/0')}}">
                                <i class="fa fa-check green"></i>
                            </a>
                            @else
                            <a href="{{URL::to('dashboard/category/activate-or-deactivate/'.$category->id.'/1')}}">
                                <i class="fa fa-times red"></i>
                            </a>
                            @endif
                        </td>
                        <!--                        <td>-->
                        <!--                            --><?php //$created_at = $category->created_at;
                        //                            echo date("d M Y", strtotime($created_at));
                        //
                        ?>
                        <!--                        </td>-->
                        <td>
                            <a href="{{URL::to('dashboard/category/edit/'.$category->id)}}" class="btn btn-xs btn-info"><i
                                    class="fa fa-pencil"></i></a>
                        </td>

                    </tr>


                    @endforeach

                    @else

                    @endif

                    </tbody>

                </table>
            </div>
        </section>

    </div>

    <div class="text-center">
        <?php echo $categories->links(); ?>
    </div>


</div>


@stop