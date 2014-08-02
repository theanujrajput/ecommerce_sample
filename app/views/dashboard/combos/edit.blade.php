@extends('layouts.dashboard_default')

@section('content')

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">


<script type="text/javascript">
    $(document).ready(function () {

        $('#form').validate();
        $("#start_date,#end_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });


    });

</script>

<div class="row">

    <div class="col-lg-12">

        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{URL::to('dashboard/combo')}}">Combo</a></li>
            <li>Edit</a></li>
        </ul>
        <!--breadcrumbs end -->

    </div>

</div>

<div class="row">

    <!--side tab starts here-->
    <div class="col-lg-2">
        <ul class="nav nav-tabs tabs-left">
            <li class="active">
                <a href="{{URL::to('dashboard/combo/edit/'.$combo->id)}}">Combo Info</a>
            </li>
            <li class="">
                <a href="{{URL::to('dashboard/combo-products/'.$combo->id)}}">Combo Products</a>
            </li>
        </ul>
    </div>
    <!--side tabs ends here-->


    <div class="col-lg-10">

        <div class="panel">


            <div class="panel-body">

                <div class="form">

                    <h4>Combo Info</h4>
                    <hr/>
                    <form class="cmxform form-horizontal " id="form" method="post"
                          action="{{URL::to('dashboard/combo/edit/'.$combo->id)}}">

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name *</label>

                            <div class="col-lg-6">
                                <input name="name" type="text" class="required form-control" id="name"
                                       value="{{$combo->name or ''}}"/>
                                <span class="error">{{$errors->first('name')}}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description" class="control-label col-lg-3">Description *</label>

                            <div class="col-lg-6">
                                <textarea class="required form-control" name="description" id="" rows="6">{{$combo->description
                                    or ''}}</textarea>
                                <span class="error">{{$errors->first('description')}}</span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Type</label>

                            <div class="col-lg-6">
                                <input name="type" type="text" class="form-control" id="type"
                                       value="{{$combo->type or ''}}"/>
                                <span class="error">{{$errors->first('type')}}</span>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="combo_price" class="control-label col-lg-3">Combo Price *</label>

                            <div class="col-lg-6">
                                <input name="combo_price" type="text" class="form-control required number" id="type"
                                       value="{{$combo->combo_price or ''}}"/>
                                <span class="error">{{$errors->first('combo_price')}}</span>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="start_date" class="control-label col-lg-3">Start Date</label>

                            <div class="col-lg-2">
                                <input name="start_date" type="text" class="date form-control" id="start_date"
                                       value="{{date('Y-m-d',strtotime($combo->start_date)) }}"/>
                            </div>

                            <label for="end_date" class="control-label col-lg-2">End Date</label>

                            <div class="col-lg-2">
                                <input name="end_date" type="text" class="date form-control " id="end_date"
                                       value="{{date('Y-m-d',strtotime($combo->end_date)) }}"/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-5 col-lg-6">
                                <button class="btn btn-primary" type="submit">Save</button>
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