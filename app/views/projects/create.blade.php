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
    {{HTML::script(asset("/public/js/jquery.validate.min.js"))}}
    {{HTML::script(asset("/public/js/common.js"))}}
    {{HTML::script(asset("/public/js/projects/create.js"))}}

</head>
<body>
<div>

    <div id="wrapper" class="main-container">

        @include('includes.header')

        <div style="margin-bottom: 20px;">
            <a href="{{$root}}/list-projects">Project list</a>
        </div>

        <form id="form-project" class="admin-section-form frm" onsubmit="return false">

            <div class="content">
                <div class="form-row">
                    <input id="name" name="name" class="input username" placeholder="Project name" type="text"/>
                </div>

                <div class="form-row">
                    <textarea id="description" name="description" class="input" placeholder="Description of project" rows="10"></textarea>
                </div>

            </div>

            <div class="footerlogin">
                <input class="button" name="btn-create-project" value="Create" type="submit"/>

                <div class="message" style="font-weight: bold; padding-top:16px;">&nbsp;</div>
            </div>

        </form>

    </div>
    <div class="gradient"></div>
</div>

@include('includes.footer')
</body>
</html>