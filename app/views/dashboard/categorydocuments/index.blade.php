@extends('layouts.dashboard_default')

@section('content')

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
            <li>Documents</li>
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
                Documents
                <a href="{{URL::to('dashboard/category-documents/create/'.$category->id)}}"
                   class="btn btn-primary btn-sm col-lg-offset-5"><i class="fa fa-plus-circle"></i> Add Document</a>
            </div>
            <div class="panel-body">

                @if($category->documents->count()!=0)
                <table class="table  table-hover general-table">
                    <thead>

                    <tr>
                        <th>Name</th>
                        <th>Title</th>
                        <th>Label</th>
                        <th>Notes</th>
                        <th>Active</th>
                        <th>Created At</th>
                        <th>View</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>

                    <?php $documents = $category->documents; ?>

                    @foreach($documents as $document)
                    <tr>
                        <td>{{$document->pivot->name}}</td>
                        <td>{{$document->pivot->title}}</td>
                        <td>{{$document->pivot->label}}</td>
                        <td>{{$document->pivot->notes}}</td>
                        <td>
                            @if($document->active==1)
                            <a href="{{URL::to('dashboard/category-documents/activate-or-deactivate/'.$category->id.'/'.$document->id.'/0')}}">
                                <i class="fa fa-check green"></i>
                            </a>
                            @else
                            <a href="{{URL::to('dashboard/category-documents/activate-or-deactivate/'.$category->id.'/'.$document->id.'/1')}}">
                                <i class="fa fa-times red"></i>
                            </a>
                            @endif
                        </td>
                        <td>{{AppUtil::getParsedDate($document->created_at)}}</td>
                        <td><a href="{{URL::to($document->path)}}" target="_blank">View</a></td>
                        <td>
                            <a class="btn btn-xs btn-info"
                               href="{{URL::to('dashboard/category-documents/edit/'.$category->id.'/'.$document->id)}}">
                                <i class="fa fa-pencil"></i></a>
                            <a class="btn btn-xs btn-danger"
                               href="{{URL::to('dashboard/category-documents/destroy/'.$category->id.'/'.$document->id)}}"><i
                                    class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>

                    @endforeach

                    </tbody>
                </table>
                @else
                <h4>No documents have been added.</h4>
                @endif

            </div>
        </div>


    </div>

</div>


@stop