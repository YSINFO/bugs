<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        Administrator Section
    </title>

    {{HTML::style(asset("/public/css/jquery.dataTables.css"))}}
    {{HTML::style(asset("/public/css/theme/transdmin.css"))}}
    {{HTML::style(asset("/public/css/common.css"))}}
    {{HTML::style(asset("/public/css/bugs/list-comments.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/jquery.dataTables.min.js"))}}
    {{HTML::script(asset("/public/js/common.js"))}}
    {{HTML::script(asset("/public/js/bugs/detail.js"))}}

</head>
<body>
<div>

    <div id="wrapper" class="main-container">

        @include('includes.header')

        <div class="header">
            <div>
                <br/>
                <a href="{{$root}}/list-bugs/{{$projectId}}">Back</a>
            </div>
            <br/>

            <div class="form-row">
                {{$bug->title}}
            </div>
            <div class="form-row">
                Posted by : {{$bug->user->name}}
            </div>
            <div class="form-row">
                How severe? {{$bug->severity}}
            </div>
            <div class="form-row">
                {{$bug->description}}
            </div>

            <?php
                if(isset($bugFiles) && count($bugFiles)>0){
                    echo "<div class='form-row'>";
                    echo "<a href='$root/download-bug/$bug->id'>Download files</a>";
                    echo "</div>";
                }
            ?>

            <div class="form-row">
                <textarea name="comment" rows="5" cols="40" placeholder="Add your comment"></textarea>
                <br/>
                <input type="button" name="btn-add-comment" value="Add comment"/>
            </div>

            <div class="form-row bug-comments"></div>

        </div>

        <div id="table-data"></div>
    </div>

</div>

@include('includes.footer')

</body>
</html>