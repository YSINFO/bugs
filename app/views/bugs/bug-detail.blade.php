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
            <div class="form-row">
                <a href="{{$root}}/list-bugs/{{$projectId}}">Back</a>
                <br/>
            </div>
            <br/>

            <div class="form-row">
                Posted by : {{$bug->user->name}}
            </div>
            <div class="form-row">
                Level : <span class="{{strtolower($bug->severity)}}">{{$bug->severity}}</span>
            </div>
            <br/>
            <div class="form-row">
                <strong>{{$bug->title}}</strong>
            </div>
            <br/>
            <div class="form-row">
                {{$bug->description}}
            </div>
            <br/>
            <?php
                if(isset($bugFiles) && count($bugFiles)>0){

                    $image_types= array('jpeg','jpg','gif','png');

                    foreach($bugFiles as $bugFile){

                        $extension = pathinfo($bugFile->file_name, PATHINFO_EXTENSION);

                        echo "<div class='form-row'>";

                        if(in_array($extension, $image_types))
                            echo "<a href='$root/public/uploads/$bugFile->saved_file_name' target='_blank'><img class='bug-image' src='$root/public/uploads/$bugFile->saved_file_name'/></a>";
                        else
                            echo "<a href='$root/download-bug/$bug->id'>$bugFile->file_name</a>";

                        echo "</div>";
                    }
                }
            ?>

            <br/>
            <div class="form-row">
                <textarea name="comment" rows="5" cols="40" placeholder="Add your comment"></textarea>
                <br/><br/>
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