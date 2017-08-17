<!DOCTYPE html>
<html>

<head lang="en">
    <meta charset="UTF-8">
    <title>注册</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="stylesheet" href="{{ url('home/css/amazeui.min.css') }}" />
    <link href="{{ url('home/css/dlstyle.css') }}" rel="stylesheet" type="text/css">
    <script src="{{ url('home/js/jquery.min.js') }}"></script>
    <script src="{{ url('home/js/amazeui.min.js') }}"></script>

</head>

<body>

<div class="login-boxtitle">
    <a href="{{ url('/') }}"><img alt="" src="{{ url('home/img/logobig.png') }}" /></a>
</div>

<div class="res-banner">
    <div class="res-main">
        <div class="login-banner-bg"><span></span><img src="{{ url('home/img/big.jpg') }}" /></div>
        <div class="login-box">

            <div class="am-tabs" id="doc-my-tabs">
                <ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
                    <li class="am-active"><a href="">邮箱注册</a></li>
                    <li><a href="">手机号注册</a></li>
                </ul>

                <div class="am-tabs-bd">
                    <div class="am-tab-panel am-active">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" id="error">
                                <ul>
                                    @foreach($errors -> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ url('home/doregister') }}">
                            {{ csrf_field() }}
                            <div class="user-email">
                                <label for="email"><i class="am-icon-envelope-o"></i></label>
                                <input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                            </div>
                            <div class="user-pass">
                                <label for="password"><i class="am-icon-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="设置密码6-12位">
                            </div>
                            <div class="user-pass">
                                <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                <input type="password" name="repwd" id="passwordRepeat" placeholder="确认密码">
                            </div>
                            <div class="am-cf">
                                <input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                            </div>
                        </form>
                    </div>

                    <div class="am-tab-panel">
                        @if(count($errors) > 0)
                            <div class="alert alert-danger" id="error1">
                                <ul>
                                    @foreach($errors -> all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="post" action="{{ url('home/dotelregister') }}">
                            {{ csrf_field() }}
                            <div class="user-phone">
                                <label for="phone"><i class="am-icon-mobile-phone am-icon-md"></i></label>
                                <input type="tel" name="tel" id="phone" placeholder="请输入手机号">
                            </div>
                            <div class="verification">
                                <label for="code"><i class="am-icon-code-fork"></i></label>
                                <input type="tel" name="yzcode" id="code" placeholder="请输入验证码">
                                <input type="button" id="dyMobileButton" value="获取" onclick="settime(this)" />
                            </div>
                            <div class="user-pass">
                                <label for="password"><i class="am-icon-lock"></i></label>
                                <input type="password" name="password" id="password" placeholder="设置密码6-12位">
                            </div>
                            <div class="user-pass">
                                <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
                                <input type="password" name="repwd" id="passwordRepeat" placeholder="确认密码">
                            </div>
                            <div class="am-cf">
                                <input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl">
                            </div>
                        </form>
                        <hr>
                    </div>

                    <script>
                        $(function() {
                            $('#doc-my-tabs').tabs();
                        })
                    </script>

                    <script>
                        setTimeout(function(){
                            $('#error').hide();
                        },3000);
                    </script>
                    <script>
                        setTimeout(function(){
                            $('#error1').hide();
                        },3000);
                    </script>

                    <script type="text/javascript">
                        var countdown=60;
                        function settime(obj) {
                            if(countdown == 60){
                                $.get("{{ url('home/info') }}",{phone:$("input[name='tel']").val()});
                            }
                            if (countdown == 0) {
                                obj.removeAttribute("disabled");
                                obj.value="获取";
                                countdown = 60;
                                return;
                            } else {
                                obj.setAttribute("disabled", true);
                                obj.value= countdown;
                                countdown--;
                            }
                            setTimeout(function() {
                                    settime(obj) }
                                ,1000)
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>

    <div class="footer ">
        <div class="footer-hd ">
            <p>
                <a href="# ">商城首页</a>
                <b>|</b>
                <a href="# ">支付宝</a>
                <b>|</b>
                <a href="# ">物流</a>
            </p>
        </div>
        <div class="footer-bd ">
            <p>
                <a href="# ">关于闲鱼</a>
                <a href="# ">合作伙伴</a>
                <a href="# ">联系我们</a>
                <a href="# ">网站地图</a>
                <em>© 2015-2025 xianyu.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
            </p>
        </div>
    </div>
</body>

</html>