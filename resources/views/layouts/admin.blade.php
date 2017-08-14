<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="/admin/css/vendor.css">
    <!-- Theme initialization -->
    <link rel="stylesheet" href="/admin/css/app.css">
    <script type="text/javascript" src="{{ URL::asset('admin/js/jquery.js') }}"></script>

    @section('header')
    @show

</head>

<body>
<div class="main-wrapper">
    <div class="app sidebar-fixed" id="app" >
        <header class="header">
            <div class="header-block header-block-search hidden-sm-down">
                <form role="search">
                    <div class="input-container"> <i class="fa fa-search"></i> <input type="search" placeholder="搜索">
                        <div class="underline"></div>
                    </div>
                </form>
            </div>
            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button"
                           aria-haspopup="true" aria-expanded="true">
                <span class="name">
                    {{ ucfirst(session('user')['uname']) }}
                </span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1" style="min-width:120px">
                            <a class="dropdown-item" href="{{ url('/admin/pass') }}" style="width: 120px;">
                                <i class="fa fa-bell icon">
                                </i>
                                修改密码
                            </a>
                            <a class="dropdown-item" href="{{ url('admin/info') }}" style="width: 120px;">
                                <i class="fa fa-gear icon">
                                </i>
                                修改信息
                            </a>
                            <div class="dropdown-divider">
                            </div>
                            <a class="dropdown-item" href="{{ url('/admin/quit') }}" style="width: 120px;">
                                <i class="fa fa-power-off icon">
                                </i>
                                退出
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo">
					<span class="l l1">
					</span>
                            <span class="l l2">
					</span>
                            <span class="l l3">
					</span>
                            <span class="l l4">
					</span>
                            <span class="l l5">
					</span>
                        </div>
                        群英&nbsp;&nbsp;闲鱼后台
                    </div>
                </div>
                <nav class="menu">
                    <ul class="nav metismenu" id="sidebar-menu">
                        <li class="active">
                            <a href="{{url('/admin/index')}}">
                                <i class="fa fa-home">
                                </i>
                                &nbsp;&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;页
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-th-large">
                                </i>
                                &nbsp;&nbsp;用&nbsp;户&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow">
                                </i>
                            </a>
                            <ul class="collapse">
                                <li>
                                    <a href="{{url('/admin/user')}}">
                                        用&nbsp;户&nbsp;列&nbsp;表&nbsp;
                                    </a>
                                </li>
                                <li>
                                    <a href="{{url('/admin/user/create')}}">
                                        添&nbsp;加&nbsp;用&nbsp;户&nbsp;
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-th-large">
                                </i>
                                &nbsp;&nbsp;分&nbsp;类&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow">
                                </i>
                            </a>
                            <ul class="collapse">
                                <li>
                                    <a href="{{ url('/admin/type') }}">
                                        分&nbsp;类&nbsp;列&nbsp;表&nbsp;
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/type/create') }}">
                                        添&nbsp;加&nbsp;分&nbsp;类&nbsp;
                                    </a>
                                </li>
                            </ul>
                        </li>

						<li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;订&nbsp;单&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="{{ url('/admin/order') }}"> 订&nbsp;单&nbsp;列&nbsp;表&nbsp;</a> </li>

                            </ul>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-th-large">
                                </i>
                                &nbsp;&nbsp;鱼&nbsp;塘&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow">
                                </i>
                            </a>
                            <ul class="collapse">
                                <li>
                                    <a href="{{url('/admin/fish')}}">
                                        鱼&nbsp;塘&nbsp;列&nbsp;表&nbsp;
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        推&nbsp;荐&nbsp;鱼&nbsp;塘&nbsp;
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li> <a href="#">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;&nbsp;广&nbsp;告&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="{{url('/admin/advert/create')}}"> &nbsp;添&nbsp; 加&nbsp;广&nbsp; 告&nbsp;</a> </li>
                                <li> <a href="{{url('/admin/advert')}}"> &nbsp;广&nbsp;告&nbsp;列&nbsp;表</a> </li>
                                <!-- <li> <a href="#"> 活&nbsp;跃&nbsp;度&nbsp;</a> </li> -->

                            </ul>
                        </li>
						<li> <a href="#">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;数&nbsp;据&nbsp;统&nbsp;计&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="{{url('/admin/dataSta')}}"> 交&nbsp;易&nbsp;分&nbsp;析&nbsp;</a> </li>
                                <li> <a href="{{url('/admin/visit')}}"> 访&nbsp;问&nbsp;动&nbsp;态&nbsp;</a> </li>
								<!-- <li> <a href="#"> 活&nbsp;跃&nbsp;度&nbsp;</a> </li> -->

                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-th-large">
                                </i>
                                &nbsp;&nbsp;网&nbsp;站&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow">
                                </i>
                            </a>
                             <ul class="collapse">
                                <li> <a href="{{url('/admin/web')}}"> 基&nbsp;本&nbsp;信&nbsp;息 </a> </li>
                                <li> <a href="{{url('/admin/links')}}"> 友&nbsp;情&nbsp;链&nbsp;接&nbsp;</a> </li>
                                <li> <a href="{{url('/admin/figure')}}"> 轮&nbsp;播&nbsp;图&nbsp;管&nbsp;理&nbsp; </a> </li>                                                               
                            </ul>
                        </li>
                        <li>
                            <a href="">
                                <i class="fa fa-th-large">
                                </i>
                                &nbsp;&nbsp;文章&nbsp;&nbsp;问题&nbsp;&nbsp;
                                <i class="fa arrow">
                                </i>
                            </a>
                             <ul class="collapse">
                                <li> <a href="{{url('/admin/problems')}}"> 相&nbsp;关&nbsp;问&nbsp;题 </a> </li>
                                <li> <a href="{{url('/admin/article')}}"> 相&nbsp;关&nbsp;文&nbsp;章&nbsp; </a> </li>                                                               
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </aside>
        <article class="content dashboard-page">
            <section class="section">
                <div class="row sameheight-container">
                @section('content')

                @show
                </div>
            </section>
        </article>
        <footer class="footer">
            <div class="footer-block author" style="margin-left: 520px;">
                created by <a href="#">XianYu</a>
            </div>
        </footer>
    </div>
</div>
<script src="/admin/js/vendor.js"></script>
<script src="/admin/js/app.js"></script>
<script src="/layer/layer.js"></script>
@section('js')

@show
</body>

</html>