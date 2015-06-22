<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        Administrator Section
    </title>

    {{HTML::style(asset("/public/css/common.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/common.js"))}}
    {{HTML::script(asset("/public/js/projects/create.js"))}}

</head>
<body>
<div>

    <div id="wrapper" class="main-container">

        @include('includes.header')

        <form id="form-project" class="admin-section-form frm">

            <div class="content">
                <input name="name" class="input username" placeholder="Project name" type="text"/>

                <div class="user-icon"></div>
                <textarea name="description" class="input" placeholder="Description of project"></textarea>

                <div class="pass-icon"></div>
            </div>

            <div class="footerlogin">
                <input class="button" name="btn-create-project" value="Create" type="button"/>

                <div class="message" style="font-weight: bold; padding-top:16px;">&nbsp;</div>
            </div>

        </form>

    </div>
    <div class="gradient"></div>
</div>

@include('includes.footer')
</body>
</html>