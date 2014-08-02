@extends('layouts.dashboard_default')

@section('content')

<script type="text/javascript">
    $(document).ready(function () {

        $("#form").validate({
            rules: {
                file: {extension: "mp4,flv,mkv,mov,avi" }
            }
        });

    });
</script>


<div class="row">
    <div class="col-lg-12">
        {{ Notification::showSuccess() }}
        {{ Notification::showError() }}
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <!--breadcrumbs start -->
        <ul class="breadcrumb">
            <li><a href="{{URL::to('dashboard')}}"><i class="fa fa-home"></i> Home</a></li>
            <li><a href="{{URL::to('dashboard/category')}}">Category</a></li>
            <li>Videos</li>
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
                    <form action="{{URL::to('dashboard/category-videos/edit/'.$category->id.'/'.$video->id)}}"
                          class="cmxform form-horizontal" id="form" method="post" enctype="multipart/form-data">

                        <div class="form-group ">
                            <label for="name" class="control-label col-lg-3">Name *</label>

                            <div class="col-lg-6">
                                <input name="name" type="text" class="required form-control" id="name"
                                       value="{{$video->name}}"/>
                                <span class="error">{{$errors->first('name')}}</span>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="title" class="control-label col-lg-3">Title *</label>

                            <div class="col-lg-6">
                                <input name="title" type="text" class="required form-control" id="title"
                                       value="{{$video->title}}"/>
                                <span class="error">{{$errors->first('title')}}</span>
                            </div>

                        </div>

                        <div class="form-group ">
                            <label for="label" class="control-label col-lg-3">Label *</label>

                            <div class="col-lg-6">
                                <input name="label" type="text" class="required form-control" id="label"
                                       value="{{$video->label}}"/>
                                <span class="error">{{$errors->first('label')}}</span>
                            </div>

                        </div>

                        <div class="form-group">

                            <label for="notes" class="control-label col-lg-3">Notes </label>

                            <div class="col-lg-6">
                                <textarea name="notes" id="notes" rows="6"
                                          class="form-control">{{$video->notes}}</textarea>
                            </div>

                        </div>

                        <div class="form-group">
                            <?php $active = $video->active; ?>
                            <label for="active" class="control-label col-lg-3">Active ? *</label>

                            <div class="col-lg-3">
                                <div class="radio">
                                    <input type="radio" class="required" name="active" value="1"

                                    @if(isset($active) && $active==1)
                                    checked
                                    @endif

                                    />Yes
                                </div>
                            </div>
                            <div class="col-lg-3">
                                <div class="radio">
                                    <input type="radio" class="required" name="active" value="0"
                                    @if(isset($active) && $active==0)
                                    checked
                                    @endif

                                    />No
                                </div>
                            </div>
                            <span class="error">{{$errors->first('active')}}</span>
                        </div>

                        <div class="form-group">
                            <label for="active" class="control-label col-lg-3">Upload Video</label>

                            <div class="col-lg-6">
                                <input type="file" name="file" id="file" class=""/>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-lg-offset-3 col-lg-6">
                                <button class="btn btn-success" type="submit">Save</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

</div>


@stop