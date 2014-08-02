<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css"/>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script type="text/javascript" src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css"/>

    <script type="text/javascript">


        // Execute this after the site is loaded.
        $(function () {
            // Find list items representing folders and
            // style them accordingly.  Also, turn them
            // into links that can expand/collapse the
            // tree leaf.
            $('li > ul').each(function (i) {
                // Find this list's parent list item.
                var parent_li = $(this).parent('li');

                // Style the list item as folder.
                parent_li.addClass('folder');

                // Temporarily remove the list from the
                // parent list item, wrap the remaining
                // text in an anchor, then reattach it.
                var sub_ul = $(this).remove();
                parent_li.wrapInner('<a/>').find('a').click(function () {
                    // Make the anchor toggle the leaf display.
                    sub_ul.toggle();
                });
                parent_li.append(sub_ul);
            });

            // Hide all lists except the outermost.
            $('ul ul').hide();
        });

        $('.folder').live("click", function () {

            $('.hide').removeClass();
        });

    </script>

    <style type="text/css">
        ul:hover {
            cursor: default;
        }

        .hide {
            display: none;
        }
    </style>

</head>
<body>
<div class="container">

    <div class="row">

        <div class="col-lg-4">

            <ul class="fa-ul tree">
                {{$tree}}
            </ul>

        </div>
    </div>


</div>





</body>
</html>








