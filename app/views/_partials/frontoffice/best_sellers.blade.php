<div id="viewed-products_block_left" class="block products_block">
    <h3 class="title_block"><span class="tcolor">Best</span> Sellers</h3>

    <div class="block_content">
        <ul class="products clearfix">

            @if(!is_null($best_sellers))

            @foreach($best_sellers as $row)

            <?php
            $id = $row->id;
            $images = $row->images; ?>
            @if(isset($images))
            <?php $image = HtmlUtil::getPrimaryImage($images); ?>
            <?php $path = isset($image['path']) ? $image['path'] : "http://placehold.it/60X60"; ?>
            <?php $title = isset($image['title']) ? $image['title'] : ""; ?>
            @else
            <?php $path = "http://placehold.it/60X60"; ?>
            <?php $title = $row->name; ?>
            @endif

            <li class="clearfix first_item">
                <a href="{{URL::to('product/'.$id)}}"
                   title="{{$title}}" class="content_img">
                    <img src="{{URL::to($path)}}" alt="" style="width: 60px;height: 60px">
                </a>

                <div class="text_desc">
                    <p class="s_title_block"><a href="{{URL::to('product/'.$id)}}">{{$row->name}}</a></p>
                    <p><a href="{{URL::to('product/'.$id)}}">{{$row->description}}</a>
                    </p>
                </div>
            </li>

            @endforeach

            @endif
        </ul>
    </div>
</div>