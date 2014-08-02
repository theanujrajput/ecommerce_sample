<?php $category_id = $category->id; ?>
<div class="col-lg-2">
    <ul class="nav nav-tabs tabs-left">
        <li class="@if(isset($active)&&$active=='category_info')active @endif">
            <a href="{{URL::to('dashboard/category/edit/'.$category_id)}}">Category Info</a>
        </li>
        <li class="@if(isset($active)&&$active=='documents')active @endif">
            <a href="{{URL::to('dashboard/category-documents/'.$category_id)}}">Documents</a>
        </li>
        <li class="@if(isset($active)&&$active=='videos')active @endif">
            <a href="{{URL::to('dashboard/category-videos/'.$category_id)}}">Videos</a>
        </li>
        <li class="@if(isset($active)&&$active=='attributes')active @endif">
            <a href="{{URL::to('dashboard/category-attributes/'.$category_id)}}">Features</a>
        </li>
    </ul>
</div>
