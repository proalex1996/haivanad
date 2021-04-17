@extends('pages.top-page.master')
@section('title','Hợp Đồng')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Quản lý Hợp đồng</h2>
                    <div class="exp-excel">
                        <a class="au-btn au-btn-icon au-btn--blue" href="{{url('contract/export')}}">
                            <i class="zmdi zmdi-plus"></i>Xuất file Excel
                        </a>
                    </div>
                    <div class="add-contract">
                        <a class="au-btn au-btn-icon au-btn--blue" href="contract/add">
                            <i class="zmdi zmdi-plus"></i>Thêm mới hợp đồng
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <form class="post-form-sort" action="{{url('/contract')}}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlInput1 ">Mã Hợp Đồng</label>
                    <input type="text" class="form-control" id="id_contract" name="id_contract"
                           placeholder="Mã Hợp Đồng">
                </div>
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlInput1 ">Tên Khách Hàng</label>
                    <input type="text" class="form-control" id="name_customer" name="name_customer"
                           placeholder="Tên Pano">
                </div>
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Nguồn:</label>
                    <select class="form-control" name="nguon">
                        <option value="">--Nguồn Khách Hàng--</option>
                        @foreach($nguons as $nguon)
                            <option value="{{$nguon -> id_nguon}}">{{$nguon -> name_nguon}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
{{--            <div class="row">--}}
{{--                --}}
{{--                --}}
{{--            </div>--}}
            <div class="row">
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Nhân Viên Phụ Trách:</label>
                    <select class="form-control"  name="id_staff">
                        <option value="">--Nhân Viên--</option>
                        @foreach($users as $user)
                            <option value="{{$user->id_staff}}">{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Loại Hợp Đồng:</label>
                    <select class="form-control" name="kind" >
                        <option value="">--Loại Hợp Đồng--</option>
                        @foreach($kinds as $kind)
                            <option value="{{$kind->id_contract}}">{{$kind -> name_kind}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Loại hình sản phẩm:</label>
                    <select class="form-control"  name="type_banner">
                        <option value="">--Loại hình sản phẩm--</option>
                        @foreach($type_banners as $type_banner)
                            <option value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Tên Vị Trí:</label>
                    <input type="text" class="form-control display-input" name="_name_banner" placeholder="Tên Vị Trí">
                </div>
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Từ Ngày:</label>
                    <input type="date" class="form-control display-input" name="date_start" >
                </div>
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlSelect1">Đến Ngày:</label>
                    <input type="date" class="form-control display-input" name="date_end">
                </div>
            </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlInput1 ">Trạng thái</label>
                    <select type="text" class="form-control" id="id_status" name="id_status">
                        <option value="">Tất Cả</option>
                        @foreach($status_contracts as $status)
                            <option value="{{$status->id_contract}}">{{$status->name_status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-sm-12 m-t-30">
                    <label for="exampleFormControlInput1 "></label>
                    <button class="btn btn-primary btn-block" type="submit" aria-expanded="false">Tìm
                    </button>
                </div>
            </div>



        </form>
        <div class="row m-t-30">
            <div class="col-md-12">
                <div class="fixed_header">
                    <table class="table table-borderless table-data3 ">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Hợp Đồng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Loại Hợp Đồng</th>
                            <th>Loại Sản Phẩm</th>
                            <th>Tên Sản Phẩm</th>
                            <th>Ngày Hết Hạn</th>
                            <th>Tổng Giá Trị</th>
                            <th>Đã Thanh Toán</th>
                            <th>Công Nợ</th>
                            <th>Trạng Thái</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            @if ((\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())) > '60')
                                <tr class="status--process dropdown" id ="row_contract_{{$contract->id}}">
                                    <td><input type="checkbox" id="check-box" data-target="{{$contract->id}}" name="check_box[]" onchange="getCheckedBox()" value="{{$contract->id_contract}}"
                                               class="display-input m-r-5"></td>
{{--                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item"--}}
{{--                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa--}}
{{--                                                thông tin hợp đồng</a>--}}
{{--                                            <a id="open-deleteContract" class="dropdown-item"--}}
{{--                                               data-id_data="{{$contract->id}}" data-toggle="modal"--}}
{{--                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa hợp đồng</a>--}}
{{--                                            <hr>--}}
{{--                                            <a id="open-dueContract" class="dropdown-item"--}}
{{--                                               data-contract_id="{{$contract->id}}" data-toggle="modal"--}}
{{--                                               data-target="#due" onclick="openDueContract(this)">Gia hạn hợp đồng</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                    <td>{{$contract->id_contract}}</td>
                                    <td>{{$contract->name_customer}}</td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td>
                                        {{$contract->name_type}}
                                    </td>
                                    <td>{{$contract->_name_banner}}</td>
                                    <td>{{$contract->date_end}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                    <td>{{$contract->paid}}</td>
                                    <td>{{$contract->due}}</td>
                                    <td>{{$contract->name_status}}</td>
                                    <td><a href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Xem Chi Tiết</a></td>

                                </tr>

                            @elseif('60' > App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString()) &&
                                    \App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString()) >= '0')
                                <tr class="status--warn dropdown" id ="row_contract_{{$contract->id}}">
                                    <td><input type="checkbox" id="check-box" data-target="{{$contract->id}}" name="check_box[]" onchange="getCheckedBox()" value="{{$contract->id_contract}}"
                                               class="display-input m-r-5"></td>
{{--                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a class="dropdown-item"--}}
{{--                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa--}}
{{--                                                thông tin hợp đồng</a>--}}
{{--                                            <a id="open-deleteContract" class="dropdown-item"--}}
{{--                                               data-id_data="{{$contract->id}}" data-toggle="modal"--}}
{{--                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa hợp đồng</a>--}}
{{--                                            <hr>--}}
{{--                                            <a id="open-dueContract" class="dropdown-item"--}}
{{--                                               data-contract_id="{{$contract->id}}" data-toggle="modal"--}}
{{--                                               data-target="#due" onclick="openDueContract(this)">Gia hạn hợp đồng</a>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
                                    <td>{{$contract->id_contract}}</td>
                                    <td>{{$contract->name_customer}}</td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td>
                                        {{$contract->name_type}}
                                    </td>
                                    <td>{{$contract->_name_banner}}</td>
                                    <td>{{$contract->date_end}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                    <td>{{$contract->paid}}</td>
                                    <td>{{$contract->due}}</td>
                                    <td>{{$contract->name_status}}</td>
                                    <td><a href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Xem Chi Tiết</a></td>
                                </tr>
                            @elseif( (\App\Utilili\DateTimeFormat::getDate($contract->date_end) - \App\Utilili\DateTimeFormat::getDate(\Carbon\Carbon::now()->toDateString())) < '0')
                                <tr class="dropdown status--denied" id ="row_contract_{{$contract->id}}">
                                    <td><input type="checkbox" id="check-box" data-target="{{$contract->id}}" name="check_box[]" onchange="getCheckedBox()" value="{{$contract->id_contract}}"
                                               class="display-input m-r-5"></td>
{{--                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"--}}
{{--                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>--}}
{{--                                        <div class="dropdown-menu">--}}
{{--                                            <a id="open-deleteContract" class="dropdown-item"--}}
{{--                                               data-id_data="{{$contract->id}}" data-toggle="modal"--}}
{{--                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa hợp đồng</a>--}}
{{--                                            <hr>--}}

{{--                                        </div>--}}
{{--                                    </td>--}}
                                    <td>{{$contract->id_contract}}</td>
                                    <td>{{$contract->name_customer}}</td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td>
                                        {{$contract->name_type}}
                                    </td>
                                    <td>{{$contract->_name_banner}}</td>
                                    <td>{{$contract->date_end}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                    <td>{{$contract->paid}}</td>
                                    <td>{{$contract->due}}</td>
                                    <td>{{$contract->name_status}}</td>
                                    <td><a href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Xem Chi Tiết</a></td>
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




