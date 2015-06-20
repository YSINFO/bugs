<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        Administrator Section
    </title>

    {{HTML::style(asset("/public/css/jquery.dataTables.css"))}}
    {{HTML::style(asset("/public/css/projects/list.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/jquery.dataTables.min.js"))}}
    {{HTML::script(asset("/public/js/common.js"))}}
    {{HTML::script(asset("/public/js/projects/list.js"))}}

</head>
<body>
<div>

    <div id="wrapper" class="main-container">

            <div class="header">
                <div style="">
                    {{HTML::image(asset("public/images/logo.png"))}}
                </div>
                <br/>
                <h1>Project list</h1>
                <br/>
            </div>

            <div id="table-data"></div>
    </div>

</div>

@include('footer')

</body>
</html>