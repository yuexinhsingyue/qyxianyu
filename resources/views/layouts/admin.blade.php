<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <title> @yield('title') </title>
    <link rel="stylesheet" href="/admin/css/vendor.css">
    <!-- Theme initialization -->
    <link rel="stylesheet" href="/admin/css/app.css">
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
                <div class="nav-profile" style=" margin-right: 25px;">
                    <span class="name" style="margin-right: 25px;">Admin</span>
                    <a href="#"><i class="fa fa-power-off icon"></i>退出</a>
                </div>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <div class="logo"> <span class="l l1"></span> <span class="l l2"></span> <span class="l l3"></span> <span class="l l4"></span> <span class="l l5"></span> </div> 群英&nbsp;&nbsp;闲鱼后台 </div>
                </div>
                <nav class="menu">
                    <ul class="nav metismenu" id="sidebar-menu">
                        <li class="active"> <a href="{{url('/admin/index')}}"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;首&nbsp;&nbsp;&nbsp;页</a> </li>
                        <li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;用&nbsp;户&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="{{url('/admin/user')}}"> 用&nbsp;户&nbsp;列&nbsp;表&nbsp;</a> </li>
                                <li> <a href="{{url('/admin/user/create')}}"> 添&nbsp;加&nbsp;用&nbsp;户&nbsp;</a> </li>
                            </ul>
                        </li>
						<li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;分&nbsp;类&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="#"> 分&nbsp;类&nbsp;列&nbsp;表&nbsp;</a> </li>
                                <li> <a href="{{URL('admin/type/create')}}"> 添&nbsp;加&nbsp;分&nbsp;类&nbsp;</a> </li>
                            </ul>
                        </li>
						<li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;定&nbsp;单&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="#"> 定&nbsp;单&nbsp;列&nbsp;表&nbsp;</a> </li>								
                            </ul>
                        </li>
						<li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;鱼&nbsp;塘&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="#"> 鱼&nbsp;塘&nbsp;列&nbsp;表&nbsp;</a> </li>
                                <li> <a href="#"> 推&nbsp;荐&nbsp;鱼&nbsp;塘&nbsp;</a> </li>
                            </ul>
                        </li>
						<li> <a href="#"><i class="fa fa-home"></i>&nbsp;&nbsp;&nbsp;广&nbsp;告&nbsp;管&nbsp;理&nbsp;</a> </li>
						<li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;数&nbsp;据&nbsp;统&nbsp;计&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="#"> 交&nbsp;易&nbsp;金&nbsp;额&nbsp;</a> </li>
                                <li> <a href="#"> 访&nbsp;问&nbsp;量&nbsp;</a> </li>
								<li> <a href="#"> 活&nbsp;跃&nbsp;度&nbsp;</a> </li>
                            </ul>
                        </li>
						<li> <a href="">
                                <i class="fa fa-th-large"></i> &nbsp;&nbsp;网&nbsp;站&nbsp;管&nbsp;理&nbsp;
                                <i class="fa arrow"></i>
                            </a>
                            <ul class="collapse">
                                <li> <a href="#"> 网&nbsp;站&nbsp;标&nbsp;题&nbsp;</a> </li>
								<li> <a href="#"> 网&nbsp;站&nbsp;描&nbsp;述&nbsp;</a> </li>
								<li> <a href="#"> 友&nbsp;情&nbsp;链&nbsp;接&nbsp;</a> </li>
								<li> <a href="#"> 网&nbsp;站&nbsp;信&nbsp;息&nbsp;</a> </li>
								<li> <a href="#"> 联&nbsp;系&nbsp;方&nbsp;式&nbsp;</a> </li>
								<li> <a href="#"> 轮&nbsp;播&nbsp;图&nbsp;管&nbsp;理&nbsp; </a> </li>								                               
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
@section('js')

@show
</body>

</html>