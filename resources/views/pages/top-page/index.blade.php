<?php
use Illuminate\Support\Facades\DB;
?>
@extends('pages.top-page.master')
@section('title','Trang Chủ')
@section('content')
    <?php
    $contracts = DB::table('contract')
        ->join('customer', 'id_customer', '=', 'customer.customer_id')
        ->join('staff', 'id_staff', '=', 'staff.id')
        ->join('banner', 'contract.id_banner', '=', 'banner.id')
        ->join('kind_contract', 'kind', '=', 'kind_contract.id_contract')
        ->join('contract_status', 'status_contract', '=', 'contract_status.id_contract')
        ->select('contract.id', 'contract.id_contract', 'name_customer', 'banner.id_banner', 'contract.content', 'contract_status.name_status', 'kind_contract.name_kind',
            'date_start', 'date_end', 'name_staff', 'value_contract')->groupBy('contract.id')->orderBy('contract.id', 'DESC')->get();
    $staff = DB::table('users')->select(DB::raw('COUNT(*) as users'))
        ->get();
    $contract2 = DB::table('contract')->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
                                        ->select(DB::raw('COUNT(*) as contract'))
                                       -> where('contract.id_contract','=',2)->get();
    $contract1 = DB::table('contract')->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
        ->select('value_contract')->sum('value_contract');
    $contract = DB::table('contract')->join('detail_payment','contract.id_contract','=','detail_payment.id_contract')
        ->select(DB::raw('COUNT(*) as contract'),'value_contract')->get();


    ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Tổng Quan</h2>
                    {{--                    <button class="au-btn au-btn-icon au-btn--blue">--}}
                    {{--                        <i class="zmdi zmdi-plus"></i>In Báo Cáo--}}
                    {{--                    </button>--}}
                </div>
            </div>
        </div>
        <div class="row m-t-25">
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c1">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-account-o"></i>
                            </div>
                            <div class="text">
                                <h2>{{$staff[0]->users}}</h2>
                                <span>Nhân Viên</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart1"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c2">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-shopping-cart"></i>
                            </div>
                            <div class="text">
                                <h2>{{$contract[0]->contract}}</h2>
                                <marquee behavior="none" direction="right" style="color: #ffff;">
                                    Tổng Số hợp đồng
                                </marquee>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart2"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c3">
                    <div class="overview__inner">
                        <div class="overview-box clearfix" style="display: flex">
                            <div class="icon">
                                <i class="zmdi zmdi-calendar-note"></i>
                            </div>
                            <div class="text">
                                <h2>{{$contract2[0]->contract}}</h2>
                                <marquee behavior="none" direction="right" style="color: #ffff;">
                                    Tổng Số Hợp Đồng Đã Thanh Toán
                                </marquee>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart3"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-lg-3">
                <div class="overview-item overview-item--c4">
                    <div class="overview__inner">
                        <div class="overview-box clearfix">
                            <div class="icon">
                                <i class="zmdi zmdi-money"></i>
                            </div>
                            <div class="text">
                                <h2>{{$contract1}}

                                </h2>

                                <span>Tổng danh thu</span>
                            </div>
                        </div>
                        <div class="overview-chart">
                            <canvas id="widgetChart4"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="au-card recent-report">
                    <div class="au-card-inner">
                        <h3 class="title-2">Báo Cáo Gần Đây</h3>
                        <div class="chart-info">
                            <div class="chart-info__left">
                                <div class="chart-note">
                                    <span class="dot dot--blue"></span>
                                    <span>HĐ Thuê</span>
                                </div>
                                <div class="chart-note mr-0">
                                    <span class="dot dot--green"></span>
                                    <span>HĐ cho thuê</span>
                                </div>
                            </div>
                            <div class="chart-info__right">
                                <div class="chart-statis">
                                                    <span class="index incre">
                                                        <i class="zmdi zmdi-long-arrow-up"></i>25%</span>
                                    <span class="label">products</span>
                                </div>
                                <div class="chart-statis mr-0">
                                                    <span class="index decre">
                                                        <i class="zmdi zmdi-long-arrow-down"></i>10%</span>
                                    <span class="label">services</span>
                                </div>
                            </div>
                        </div>
                        <div class="recent-report__chart">
                            <canvas id="recent-rep-chart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="au-card chart-percent-card">
                    <div class="au-card-inner">
                        <h3 class="title-2 tm-b-5">Trạng Thái Thanh Toán</h3>
                        <div class="row no-gutters">
                            <div class="col-xl-6">
                                <div class="chart-note-wrap">
                                    <div class="chart-note mr-0 d-block">
                                        <span class="dot dot--blue"></span>
                                        <span>Đã thanh toán</span>
                                    </div>
                                    <div class="chart-note mr-0 d-block">
                                        <span class="dot dot--yellow"></span>
                                        <span>Chưa thanh toán</span>
                                    </div>
                                    <div class="chart-note mr-0 d-block">
                                        <span class="dot dot--red"></span>
                                        <span>Công nợ</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="percent-chart">
                                    <canvas id="percent-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h2 class="title-1 m-b-25">Danh Sách Hợp Đồng</h2>
                <div class="fixed_header m-b-40">
                    <table id="table-data_reponse" class="table table-borderless table-data3 ">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Hợp Đồng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Mã Pano</th>
                            <th>Nội Dung</th>
                            <th>Thời Hạn Còn Lại</th>
                            <th>Loại Hợp Đông</th>
                            <th>Lịch Thanh Toán</th>
                            <th>Giá trị hợp đồng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            @if ( (\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())) < '0')
                                <tr class="status--denied dropdown">
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa
                                                thông tin hợp đồng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$contract->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa
                                                hợp đồng</a>
                                            <hr>
                                            <a id="open-dueContract" class="dropdown-item"
                                               data-contract_id="{{$contract->id}}" data-toggle="modal"
                                               data-target="#due" onclick="openDueContract(this)">Gia hạn hợp đồng</a>
                                        </div>
                                    </td>
                                    <td>{{$contract->id_contract}}</td>
                                    <td>{{$contract->name_customer}}</td>
                                    <td>{{$contract->id_banner}}</td>
                                    <td><a
                                            href="{{URL::to('/public/storage/contract') . '/' . $contract->content}}">Tải
                                            về</a>
                                    </td>
                                    <td>{{\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())}}
                                        Ngày
                                    </td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td>{{$contract->_pay_due}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                </tr>
                            @elseif('60' > \App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()) &&
                                    \App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString()) > '0')
                                <tr class="status--warn dropdown">
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa
                                                thông tin hợp đồng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$contract->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa
                                                hợp đồng</a>
                                            <hr>
                                            <a id="open-dueContract" class="dropdown-item"
                                               data-contract_id="{{$contract->id}}" data-toggle="modal"
                                               data-target="#due" onclick="openDueContract(this)">Gia hạn hợp đồng</a>
                                        </div>
                                    </td>
                                    <td>{{$contract->id_contract}}</td>
                                    <td>{{$contract->name_customer}}</td>
                                    <td>{{$contract->id_banner}}</td>
                                    <td><a
                                            href="{{URL::to('/public/storage/contract') . '/' . $contract->content}}">Tải
                                            về</a>
                                    </td>
                                    <td>{{\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())}}
                                        Ngày
                                    </td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td>{{$contract->_pay_due}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                </tr>
                            @elseif((\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())) > '60')
                                <tr class="dropdown status--process">
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa
                                                thông tin hợp đồng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$contract->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa
                                                hợp đồng</a>
                                            <hr>
                                            <a id="open-dueContract" class="dropdown-item"
                                               data-contract_id="{{$contract->id}}" data-toggle="modal"
                                               data-target="#due" onclick="openDueContract(this)">Gia hạn hợp đồng</a>
                                        </div>
                                    </td>
                                    <td>{{$contract->id_contract}}</td>
                                    <td>{{$contract->name_customer}}</td>
                                    <td>{{$contract->id_banner}}</td>
                                    <td><a
                                            href="{{URL::to('/public/storage/contract') . '/' . $contract->content}}">Tải
                                            về</a>
                                    </td>
                                    <td>{{\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())}}
                                        Ngày
                                    </td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td>{{$contract->_pay_due}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

