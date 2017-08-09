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
                            <div class="name"> 总访问量 </div>
                        </div> <progress class="progress stat-progress" value="15" max="100">
                            <div class="progress">
                                <span class="progress-bar" style="width: 15%;"></span>
                            </div>
                        </progress> </div>
                </div>
            </div>
        </div>
    </div>

<div class="col col-xs-12 col-sm-12 col-md-6 col-xl-7 history-col">
    <div class="card sameheight-item" data-exclude="xs" style="height: 323px;">
        <div class="card-header card-header-sm bordered">
            <div class="header-block">
                <h3 class="title">数据分析</h3>
            </div>
            <ul class="nav nav-tabs pull-right" role="tablist">
                <li class="nav-item"> <a class="nav-link" href="#visits" role="tab" data-toggle="tab" aria-expanded="false">年交易金额</a> </li>
                <li class="nav-item"> <a class="nav-link active" href="#downloads" role="tab" data-toggle="tab" aria-expanded="true">近30天交易金额</a> </li>
            </ul>
        </div>
        <div class="card-block">
            <div class="tab-content">

                <!-- 线形图 -->
                <div role="tabpanel" class="tab-pane fade" id="visits" aria-expanded="false">
                    
                    <div id="dashboard-visits-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="220" version="1.1" width="554" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative;"><desc>Created with Raphaël 2.2.0</desc>
                    <defs/>
                    
                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="12.5" y="500" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="500">400</tspan>
                    </text>
                    <path style="" fill="none" stroke="#aaaaaa" d="M50,195H26" stroke-width="0.9"/>

                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="12.5" y="152.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal">
                    <tspan dy="152.5"></tspan>
                    </text>
                    <path style="" fill="none" stroke="#aaaaaa" d="M25,152.5H26" stroke-width="0.5"/>

                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="12.5" y="110" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="110">63</tspan></text>
                    <path style="" fill="none" stroke="#aaaaaa" d="M25,110H26" stroke-width="0.5"/>
                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="12.5" y="67.5" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="67.5"></tspan></text>
                    <path style="" fill="none" stroke="#aaaaaa" d="M25,67.5H26" stroke-width="0.5"/>
                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="12.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal">
                    <tspan dy="25">86</tspan>
                    </text>
                    <path style="" fill="none" stroke="#aaaaaa" d="M25,25H26" stroke-width="0.5"/>

                    <path style="" fill="none" stroke="#000000" d="M25,84.1304347826087C25.041666666666668,79.51086956521739,25.125,56.41304347826076,25.166666666666668,65.65217391304347C25.208333333333336,74.89130434782598,25.291666666666664,158.04347826086956,25.333333333333332,158.04347826086956C25.375,158.04347826086956,25.458333333333332,65.65217391304347,25.5,65.65217391304347C25.541666666666668,65.65217391304347,25.625,158.04347826086956,25.666666666666668,158.04347826086956C25.708333333333336,158.04347826086956,25.791666666666664,82.28260869565199,25.833333333333332,65.65217391304347C25.875,49.0217391304346,25.958333333333332,35.16304347826087,26,25" stroke-width="3"/>

                    <circle cx="25" cy="84.1304347826087" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    <circle cx="25.166666666666668" cy="65.65217391304347" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    <circle cx="25.333333333333332" cy="158.04347826086956" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    <circle cx="25.5" cy="65.65217391304347" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    <circle cx="25.666666666666668" cy="158.04347826086956" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    <circle cx="25.833333333333332" cy="65.65217391304347" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    <circle cx="26" cy="25" r="4" fill="#000000" stroke="#ffffff" style="" stroke-width="1"/>
                    </svg>
                    <div class="morris-hover morris-default-style" style="display: none;"></div>
                    </div>
                </div>
                <!-- 柱形图 -->
                <div role="tabpanel" class="tab-pane fade active in" id="downloads" aria-expanded="true">
                    <p class="title-description"> 近30天交易 </p>
                    <div id="dashboard-downloads-chart" style="position: relative; -webkit-tap-highlight-color: rgba(0, 0, 0, 0);"><svg height="220" version="1.1" width="554" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" style="overflow: hidden; position: relative; top: -0.600006px;"><desc>Created with Raphaël 2.2.0</desc><defs/>
                    
                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="46.5" y="18" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">0</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M59,181H529" stroke-width="0.5"/>

                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="46.5" y="142" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">500</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M59,142H529" stroke-width="0.5"/>

                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="46.5" y="103" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">1,000</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M59,103H529" stroke-width="0.5"/>

                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="46.5" y="64" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">1,500</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M59,64H529" stroke-width="0.5"/>

                    <text style="text-anchor: end; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="46.5" y="25" text-anchor="end" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal"><tspan dy="4">2,000</tspan></text><path style="" fill="none" stroke="#aaaaaa" d="M59,25H529" stroke-width="0.5"/>

                    <text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="505.5" y="193.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4">2015</tspan></text>

                    <text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="411.5" y="193.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4">2013</tspan></text>

                    <text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="317.5" y="193.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4">2011</tspan></text>

                    <text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="223.5" y="193.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4">2009</tspan></text>

                    <text style="text-anchor: middle; font-family: sans-serif; font-size: 12px; font-weight: normal;" x="129.5" y="193.5" text-anchor="middle" font-family="sans-serif" font-size="12px" stroke="none" fill="#888888" font-weight="normal" transform="matrix(1,0,0,1,0,7)"><tspan dy="4">2007</tspan></text>
                    
                    <rect x="64.875" y="79.6" width="35.25" height="101.4" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="111.875" y="61.971999999999994" width="35.25" height="119.028" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="158.875" y="25" width="35.25" height="156" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="205.875" y="40.599999999999994" width="35.25" height="140.4" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="252.875" y="52.30000000000001" width="35.25" height="128.7" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="299.875" y="132.64" width="35.25" height="48.360000000000014" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="346.875" y="103" width="35.25" height="78" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="393.875" y="33.111999999999995" width="35.25" height="147.888" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="440.875" y="114.7" width="35.25" height="66.3" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>
                    <rect x="487.875" y="64" width="35.25" height="117" rx="0" ry="0" fill="#000000" stroke="none" style="fill-opacity: 1;" fill-opacity="1"/>

                    </svg><div class="morris-hover morris-default-style" style="left: 353.5px; top: 80px; display: none;"><div class="morris-hover-row-label">2013</div><div class="morris-hover-point" style="color: #000000">
  Downloads:
  1,896
</div></div></div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

