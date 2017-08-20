<!doctype html>
<html class="no-js" lang="en">

    <head>
        <meta charset="utf-8">
        <title>闲鱼后台登录</title>
        <link rel="stylesheet" href="/admin/css/vendor.css">
        <!-- Theme initialization -->
        <script>
            var themeSettings = (localStorage.getItem('themeSettings')) ? JSON.parse(localStorage.getItem('themeSettings')) :
            {};
            var themeName = themeSettings.themeName || '';
            if (themeName)
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app-' + themeName + '.css">');
            }
            else
            {
                document.write('<link rel="stylesheet" id="theme-style" href="css/app.css">');
            }
        </script>
    </head>

    <body>
        <div class="auth">
            <div class="auth-container">
                <div class="card">
                    <header class="auth-header">
                        <h1 class="auth-title">
                            <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> 闲鱼后台管理系统 </h1>
                    </header>
                    <div class="auth-content">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" id="error">
                                <ul>
                                    @foreach($errors -> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="/admin/dologin" method="post">
                            {{ csrf_field() }}
                            <div class="form-group">
                                <label>
                                    用户名:
                                </label>
                                <input class="form-control underlined" name="uname" placeholder="你的名字"
                                       required type="text">
                            </div>
                            <div class="form-group">
                                <label>
                                    密码:
                                </label>
                                <input type="password" class="form-control underlined" name="password"
                                       placeholder="你的密码" required>
                            </div>
                            <div class="row">
                                <div class="col-sm-8 form-group" style="padding-right: 10px;">
                                    <label>
                                        验证码:
                                    </label>
                                    <input class="form-control underlined" name="captcha" required aria-required="true"
                                           type="text">
                                </div>
                                <a onclick="re_captcha();">
                                    <img src="{{ URL('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6"
                                         style="margin-top: 20px;">
                                </a>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-block btn-primary">
                                    登&nbsp;&nbsp;录
                                </button>
                            </div>
                            <div class="form-group">
                                <p class="text-muted text-xs-center">申请账户入口? <a href="{{ url('admin/register') }}">注册用户</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function re_captcha() {
                $url = "{{ URL('/code/captcha') }}";
                $url = $url + "/" + Math.random();
                document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
            }
        </script>
        <script src="/admin/js/vendor.js"></script>
        <script src="/admin/js/app.js"></script>
        <script>
            setTimeout(function(){
                $('#error').hide();
            },3000);
        </script>
    </body>

</html>