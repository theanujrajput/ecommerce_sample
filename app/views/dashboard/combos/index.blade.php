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
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li>Combos</li>
        </ul>
        <!--breadcrumbs end -->
    </div>
    <div class="col-lg-2">
        <a href="{{URL::to('dashboard/combo/create')}}" class="btn btn-sm btn-primary"><i
                class="fa fa-plus-circle"></i> Add New</a>
    </div>


</div>
<div class="row">
    <div class="col-sm-12">
        <section class="panel">
            <header class="panel-heading">
                Combos
            </header>
            <div class="panel-body">
                <table class="table  table-hover general-table">
                    <thead>
                    <tr>

                        <th>Name</th>
                        <th>Description</th>
                        <th>Combo Price</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                    </thead>

                    <tbody>

                    @if(!is_null($combos))

                    @foreach($combos as $combo)

                    <tr>

                        <td>{{$combo->name}}</td>
                        <td>{{$combo->description}}</td>
                        <td>{{$combo->combo_price}}</td>

                        <td>
                            <?php $created_at = $combo->created_at;
                            echo date("d M Y", strtotime($created_at));?>
                        </td>
                        <td>
                            <a href="{{URL::to('dashboard/combo/edit/'.$combo->id)}}" class="btn btn-xs btn-info"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="{{URL::to('dashboard/combo/delete/'.$combo->id)}}" class="btn btn-danger btn-xs"><i class="fa fa-trash-o"></i></a>
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

    @if(!is_null($combos))
    <div class="text-center">
        <?php echo $combos->links(); ?>
    </div>
    @endif

</div>


@stop