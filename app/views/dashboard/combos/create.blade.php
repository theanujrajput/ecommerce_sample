@extends('layouts.dashboard_default')

@section('content')

<script src="//code.jquery.com/jquery-1.9.1.js"></script>
<script src="http://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
<link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">

<script type="text/javascript">
    $(document).ready(function () {

        $('#form').validate({ ignore: ":hidden:not(select)" });

        $("#start_date,#end_date").datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'yy-mm-dd'
        });

        $(".select").chosen();

    });

</script>

<div class="row">

    <div class="col-lg-12">

        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Dashboard</a></li>
            <li><a href="{{URL::to('dashboard/combos')}}">Combos</a></li>
            <li>Add New</a></li>
        </ul>
        <!--breadcrumbs end -->

    </div>

    <div class="col-lg-12">

        <div class="panel">

            <div class="panel-heading">
                Create
                <a href="" class="btn col-lg-offset-10 btn-info btn-sm">Add Product In Combo</a>
            </div>

            <div class="panel-body">

                <div class="form">

                    <h4>Combo Info</h4>
                    <hr/>
                    <form class="cmxform form-horizontal " id="form" method="post"
                          action="{{URL::to('dashboard/combo/create')}}">

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name *</label>

                            <div class="col-lg-6">
                                <input name="name" type="text" class="required form-control" id="name"
                                       value="{{Input::old('name')}}"/>
                                <span class="error">{{$errors->first('name')}}</span>
                            </div>
                        </div>


                        <div class="form-group">
                            <label for="description" class="control-label col-lg-3">Description *</label>

                            <div class="col-lg-6">
                                <textarea class="required form-control" name="description" id="" rows="6">{{Input::old('description')}}</textarea>
                                <span class="error">{{$errors->first('description')}}</span>
                            </div>
                        </div>

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Type</label>

                            <div class="col-lg-6">
                                <input name="type" type="text" class="form-control" id="type"
                                       value="{{Input::old('type')}}"/>
                                <span class="error">{{$errors->first('type')}}</span>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="combo_price" class="control-label col-lg-3">Combo Price *</label>

                            <div class="col-lg-6">
                                <input name="combo_price" type="text" class="form-control required number" id="type"
                                       value="{{Input::old('combo_price')}}"/>
                                <span class="error">{{$errors->first('combo_price')}}</span>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="start_date" class="control-label col-lg-3">Start Date</label>

                            <div class="col-lg-2">
                                <input name="start_date" type="text" class="date form-control " id="start_date"/>
                            </div>

                            <label for="end_date" class="control-label col-lg-2">End Date</label>

                            <div class="col-lg-2">
                                <input name="end_date" type="text" class="date form-control " id="end_date"/>
                            </div>
                        </div>

                        <h4>Products For Combo</h4>(Atleast 2 products must be selected for combo)
                        <hr/>
                        <!--                    combo products starts here-->

                        <div class="form-group ">

                            <div class="col-lg-4">

                                <h5>Product 1</h5>

                                <select name="product[]" id="tag" class="form-control select required"
                                        data-placeholder="Select a product*">

                                    <option value=""></option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach

                                </select><br/> <br/>

                                <input class="form-control required number" type="text" name="price[]"
                                       placeholder="Price *"/>

                            </div>

                            <div class="col-lg-4">

                                <h5>Product 2</h5>

                                <select name="product[]" id="tag" class="form-control select required"
                                        data-placeholder="Select a product*">

                                    <option value=""></option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach

                                </select><br/> <br/>

                                <input class="form-control required number" type="text" name="price[]"
                                       placeholder="Price *"/>

                            </div>


                            <div class="col-lg-4">

                                <h5>Product 3</h5>

                                <select name="product[]" id="tag" class="form-control select"
                                        data-placeholder="Select a product*">
                                    <option value=""></option>
                                    @foreach($products as $product)
                                    <option value="{{$product->id}}">{{$product->name}}</option>
                                    @endforeach

                                </select> <br/> <br/>

                                <input class="form-control " type="text" name="price[]"
                                       placeholder="Price "/>
                            </div>

                        </div>

                        <!--                    combo products ends here-->


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


@stop