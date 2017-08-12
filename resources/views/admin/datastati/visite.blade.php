@extends('layouts.admin')

@section('title','金额统计')

@section('content')
    <div class="col">
        <div class="card  stats" style="height: 150px;">
            <div class="card-block " style="height: 130px;">

                <div class="row row-sm stats-container">
                    <div class="col-xs-12 col-sm-3 stat-col">
                        <div class="stat-icon"> <i class="fa fa-rocket"></i> </div>
                        <div class="stat">
                            <div class="value"> 5407 </div>
                            <div class="name"> 平台闲置物品数量 </div>
                        </div> 
                        <progress class="progress stat-progress" value="75" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 75%;"></span>
                            </div>
                        </progress> 
                        </div>
                    <div class="col-xs-12 col-sm-3 stat-col">
                        <div class="stat-icon"> <i class="fa fa-shopping-cart"></i> </div>
                        <div class="stat">
                            <div class="value"> 78464 </div>
                            <div class="name"> 总订单数</div>
                        </div> <progress class="progress stat-progress" value="25" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 25%;"></span>
                            </div>
                        </progress> </div>
                    <div class="col-xs-12 col-sm-3  stat-col">
                        <div class="stat-icon"> <i class="fa fa-line-chart"></i> </div>
                        <div class="stat">
                            <div class="value"> $80.560 </div>
                            <div class="name"> 当月交易额 </div>
                        </div> <progress class="progress stat-progress" value="60" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 60%;"></span>
                            </div>
                        </progress> </div>
                    <div class="col-xs-12 col-sm-3  stat-col">
                        <div class="stat-icon"> <i class="fa fa-users"></i> </div>
                        <div class="stat">
                            <div class="value"> 359 </div>
                            <div class="name"> 总用户 </div>
                        </div> <progress class="progress stat-progress" value="34" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 34%;"></span>
                            </div>
                        </progress> </div>
                    <div class="col-xs-12 col-sm-3  stat-col">
                        <div class="stat-icon"> <i class="fa fa-list-alt"></i> </div>
                        <div class="stat">
                            <div class="value"> 59 </div>
                            <div class="name"> 当月订单数 </div>
                        </div> <progress class="progress stat-progress" value="49" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 49%;"></span>
                            </div>
                        </progress> </div>
                    <div class="col-xs-12 col-sm-3 stat-col">
                        <div class="stat-icon"> <i class="fa fa-dollar"></i> </div>
                        <div class="stat">
                            <div class="value"> $780.064 </div>
                            <div class="name"> 总交易金额 </div>
                        </div> <progress class="progress stat-progress" value="15" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 15%;"></span>
                            </div>
                        </progress> </div>
                </div>
            </div>
        </div>
    </div>
      <!-- 为ECharts准备一个具备大小（宽高）的Dom -->
    <div class="col">  
    <div class="card  stats">  
        <div id="main" style="width: 900px;height:400px;"></div>
        <!-- 接收控制器传递的表格数据，中转给js接收 -->
        <input type="hidden" name='chartX' value = "{{$chartX}}">
        <script type="text/javascript" src="/admin/js/jquery.js"></script>
        <script type="text/javascript" src="/admin/js/echarts.js"></script>
        <script type="text/javascript">
            // 基于准备好的dom，初始化echarts实例
            var myChart = echarts.init(document.getElementById('main'));
            // var echartX = ["衬衫","羊毛衫","雪纺衫","裤子","高跟鞋","袜子",'sdfsd'];
            var echartX = $("input[name='chartX']").val();
            var echartX=echartX.split(","); 

            var echartY = [50, 20, 36, 10, 10, 20,50,25,65,50, 20, 36, 10, 10, 20,50,25,65,65,50, 20, 36, 10, 10, 20,50,25,65,25,65];
            // 指定图表的配置项和数据
            var option = {
                title: {
                    text: '近30天交易额'
                },
                tooltip: {},
                backgroundColor: 'white',
                // color:'#8FC800',
                legend: {
                    data:['交易额']
                },
                xAxis: {
                    data: echartX
                },
                yAxis: {},
                series: [{
                    name: '当日交易',
                    type: 'bar',
                    data: echartY
                }]
            };

            // 使用刚指定的配置项和数据显示图表。
            myChart.setOption(option);
        </script>
        </div>
    </div>
@endsection

