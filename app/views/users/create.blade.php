<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        Administrator Section
    </title>

    {{HTML::style(asset("/public/css/common.css"))}}
    {{HTML::style(asset("/public/css/theme/transdmin.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/common.js"))}}
    {{HTML::script(asset("/public/js/bugs/create.js"))}}

</head>
<body>
<div>

    <div id="wrapper" class="main-container">

        @include('includes.header')

        <form id="form-bug" class="admin-section-form frm">

            <div class="header">
                <div>
                    <a href="{{$root}}/list-bugs/{{$projectId}}">View all bugs</a> <br/>
                </div>

                <br/>
                <h1>Create bug</h1>
                <br/>
            </div>

            <div class="content">
                <input name="title" class="input" placeholder="Bug title" type="text"/>

                <div class="user-icon"></div>
                <textarea name="description" class="input" placeholder="Description of bug"></textarea>

                <div class="pass-icon"></div>
            </div>

            <div class="footerlogin">
                <input class="button" name="btn-create-bug" value="Create" type="button"/>

                <div class="message" style="font-weight: bold; padding-top:16px;">&nbsp;</div>
            </div>

        </form>

    </div>
</div>

@include('includes.footer')
</body>
</html>