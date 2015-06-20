<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>
        Administrator Section
    </title>

    {{HTML::style(asset("/public/css/login.css"))}}

    {{HTML::script(asset("/public/js/jquery-1.10.2.js"))}}
    {{HTML::script(asset("/public/js/common.js"))}}
    {{HTML::script(asset("/public/js/login.js"))}}

    </head>
<body>
<div>

    <div id="wrapper" class="ys-adminform">

        <form id="form-login" class="admin-section-form frm">

            <div class="header">
                <div style="">
                    {{HTML::image(asset("public/images/logo.png"))}}
                </div>
                <br/>
                <h1>Login</h1>
                <br/>
            </div>

            <div class="content">
                <input name="email" class="input" placeholder="Email" type="text"/>

                <div class="user-icon"></div>
                <input name="password" class="input password" placeholder="Password" type="password"/>

                <div class="pass-icon"></div>
            </div>

            <div class="footerlogin">
                <input class="button" name="btn-login" value="Authenticate" type="button"/>

                <div class="message" style="font-weight: bold; padding-top:16px;">&nbsp;</div>
            </div>

        </form>

    </div>
    <div class="gradient"></div>
</div>

@include('footer')
</body>
</html>