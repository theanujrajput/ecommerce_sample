<div class="row-fluid" id="content_container">

    <div class="span12 margin-top-20px">
        <form action="#" id="layered_form">
            {{$filters_html}}
        </form>

    </div>

    <div style="float: left">
        <br/>

        <p class="select">
            <label for="selectPrductSort">Sort by</label>
            <select id="selectPrductSort" class="selectProductSort">
                <option value="popularity" selected>Popularity</option>
                <option value="lowest">Price: Lowest first</option>
                <option value="highest">Price: Highest first</option>
            </select>
        </p>
    </div>

    <div class="" style="float:right;">
        <a href="#" class="button_large pull-right margin-top10 margin-bottom10 ">Search</a>
        <a href="http://glensite.localhost.com/category/test" class="button_large pull-right margin-top10 margin-bottom10 margin-right10">Reset</a>
    </div>

</div>
