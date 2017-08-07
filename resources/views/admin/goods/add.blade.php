@extends('layouts.admin')
@section('title','商品分类')
@section('content')
    <body>
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">分类管理</a> &raquo; 添加分类
    </div>
    <!--面包屑导航 结束-->

    <!--结果集标题与导航组件 开始-->
    <div class="result_wrap">
        <div class="result_title">
            <h3>快捷操作</h3>
            <div class="mark">
                <ul>
                    <li>报错</li>
                </ul>
            </div>

        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增分类</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->

    <div class="result_wrap">
        <form action="{{url('admin/type')}}" method="post">
            <table class="add_tab">
                {{csrf_field()}}
                <tbody>
                <tr>
                    <th width="120"><i class="require">*</i>父级分类：</th>
                    <td>
                        <select name="tid">
                            <option value="0">==顶级分类==</option>

                                <option value="">父类名字</option>

                        </select>
                    </td>
                </tr>
                <tr>
                    <th>分类名称：</th>
                    <td>
                        <input type="text" name="name">
                        <span><i class="fa fa-exclamation-circle yellow"></i>分类名必须6-18位</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>分类标题：</th>
                    <td>
                        <input type="text" class="lg" name="cate_title">
                        <p>标题可以写30个字</p>
                    </td>
                </tr>
                <tr>
                    <th>关键字：</th>
                    <td>
                        <textarea name="cate_keywords"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>描述：</th>
                    <td>
                        <textarea name="cate_description"></textarea>
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" name="cate_order">
                        <span><i class="fa fa-exclamation-circle yellow"></i></span>
                    </td>
                </tr>

                <tr>
                    <th></th>
                    <td>
                        <input type="submit" value="提交">
                        <input type="button" class="back" onclick="history.go(-1)" value="返回">
                    </td>
                </tr>
                </tbody>
            </table>
        </form>
    </div>

    </body>
@endsection