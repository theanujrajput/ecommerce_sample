<?php $product_id = $product->id ?>

<div class="col-lg-2">
    <ul class="nav nav-tabs tabs-left">
        <li class="@if(isset($active)&&$active=='product_info')active @endif">
            <a href="{{URL::to('dashboard/products/edit/'.$product_id)}}">Product Info</a>
        </li>
        <li class="@if(isset($active)&&$active=='documents')active @endif">
            <a href="{{URL::to('dashboard/product-documents/'.$product_id)}}">Documents</a>
        </li>
        <li class="@if(isset($active)&&$active=='videos')active @endif">
            <a href="{{URL::to('dashboard/product-videos/'.$product_id)}}">Videos</a>
        </li>
        <li class="@if(isset($active)&&$active=='attributes')active @endif">
            <a href="{{URL::to('dashboard/product-attributes/'.$product_id)}}">Features</a>
        </li>
        <li class="@if(isset($active)&&$active=='images')active @endif">
            <a href="{{URL::to('dashboard/product-images/'.$product_id)}}">Images</a>
        </li>
        <li class="@if(isset($active)&&$active=='tags')active @endif">
            <a href="{{URL::to('dashboard/product-tags/'.$product_id)}}">Tags</a>
        </li>
        <li class="@if(isset($active)&&$active=='specific_attributes')active @endif">
            <a href="{{URL::to('dashboard/product-specific-attributes/'.$product_id)}}">Specific Features</a>
        </li>
    </ul>
</div>
