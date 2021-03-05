@extends('pages.top-page.master')
@section('title','Hợp Đồng')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Quản lý Hợp đồng</h2>
                    <div class="exp-excel">
                        <a class="au-btn au-btn-icon au-btn--blue" href="contract/add">
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
        <div class="row m-t-30">

            <div class="col-md-12">
                <div class="fixed_header">
                    <table id="table-data_reponse" class="table table-borderless table-data3 ">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Hợp Đồng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Tên Banner</th>
                            <th>Nội Dung</th>
                            <th>Trạng Thái</th>
                            <th>Loại Hợp Đồng</th>
                            <th>Ngày Bắt Đầu</th>
                            <th>Ngày Kết Thúc</th>
                            <th>Nhân Viên Phụ Trách</th>
                            <th>Giá trị hợp đồng</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($contracts as $contract)
                            @if (\App\Utilili\DateTimeFormat::getDate($contract->date_end) < '0')
                                <tr class="status--denied dropdown">
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa
                                                thông tin hợp đồng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$contract->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa hợp đồng</a>
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
                                    <td>{{$contract->name_status}}</td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td class="date_start">{{$contract->date_start}}</td>
                                    <td class="date_end">{{$contract->date_end}}</td>
                                    <td>{{$contract->name_staff}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                </tr>
                            @elseif('60' > \App\Utilili\DateTimeFormat::getDate($contract->date_end) && \App\Utilili\DateTimeFormat::getDate($contract->date_end) > '0.0')
                                <tr class="status--warn dropdown">
                                    <td><a class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$contract->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa
                                                thông tin hợp đồng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$contract->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa hợp đồng</a>
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
                                    <td>{{$contract->name_status}}</td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td class="date_start">{{$contract->date_start}}</td>
                                    <td class="date_end">{{$contract->date_end}}</td>
                                    <td>{{$contract->name_staff}}</td>
                                    <td class="value_contract"><span>{{$contract->value_contract}}</span>
                                        VND
                                    </td>
                                </tr>
                            @elseif(\App\Utilili\DateTimeFormat::getDate($contract->date_end) > '60')
                                <tr class="dropdown status--process">
                                    <td class=" contract_id"><a class="dropdown-toggle" data-toggle="dropdown"
                                                                aria-haspopup="true"
                                                                aria-expanded="false"
                                                                id="dropdownMenuLink"> {{$contract->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('contract/update')."/".$contract->id}}">Sửa
                                                thông tin hợp đồng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$contract->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa Thông Tin Khách Hàng</a>
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
                                    <td>{{$contract->name_status}}</td>
                                    <td>{{$contract->name_kind}}</td>
                                    <td class="date_start">{{$contract->date_start}}</td>
                                    <td class="date_end">{{$contract->date_end}}</td>
                                    <td>{{$contract->name_staff}}</td>
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

<div class="modal fade" id="detroy">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Thông Báo</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <div class="modal-body">
                Xác nhận xóa
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a type="button" id="destroy-value"
                        data-destroy-link="{{\Illuminate\Support\Facades\URL::to('contract/destroy')."/"}}"
                        class="btn btn-primary">Xác Nhận
                </a>
            </div>

        </div>
    </div>
</div>
<div class="modal fade" id="due">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content container-fluid">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gia hạn hợp đồng</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>

            <!-- Modal body -->
            <form id="due-contract"  data-due-link="{{\Illuminate\Support\Facades\URL::to('contract/update/').'/'}}"
                  enctype="multipart/form-data" class="needs-validation" method="POST">
                @csrf
                <div class="row form-group">
                    <div class='col-sm-6'>
                        <label for="dateofbirth">Ngày bắt đầu</label>
                        <input type="date" name="date_start" id="dateofbirth" required>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày bắt đầu hợp đồng</div>
                    </div>
                    <div class='col-sm-6'>
                        <label for="dateofbirth">Ngày kết thúc</label>
                        <input type="date" name="date_end" id="dateofend" required>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày kết thúc hợp đồng</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                    <div class="d-inline-flex">
                        <input type="number" class="form-control" id="exampleFormControlInput1" name="value_contract"
                               placeholder="Giá trị hợp đồng" required>
                        <label for="exampleFormControlInput1">VND</label>
                        <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="kind_name" name="status_contract">
                        {{$status = \Illuminate\Support\Facades\DB::table('contract_status')->select('*')->get()}}
                        @foreach($status as $stt)
                            <option value="{{$stt->id_contract}}">{{$stt->name_status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit"
                            class="btn btn-primary">Xác Nhận
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>


