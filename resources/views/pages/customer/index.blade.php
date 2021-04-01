@extends('pages.top-page.master')
@section('title','Khách Hàng')
@section('content')

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Quản lý Khách Hàng</h2>
                    <div class="exp-excel">
                        <a class="au-btn au-btn-icon au-btn--blue" href="customer/export">
                            <i class="zmdi zmdi-plus"></i>Xuất file Excel
                        </a>
                    </div>
                    <div class="add-contract">
                        <a class="au-btn au-btn-icon au-btn--blue" href="customer/add">
                            <i class="zmdi zmdi-plus"></i>Thêm mới khách Hàng
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row m-t-30">
            <div class="col-md-12">
                <form class="post-form-sort" action="{{url('/customer')}}" method="post" style="margin-bottom: 3em">
                    @csrf
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Khách Hàng:</label>
                            <input type="text" class="form-control" id="customer_id" name="customer_id"
                                   placeholder="Mã Khách Hàng">
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Tên Khách Hàng:</label>
                             <input type="text" class="form-control" id="name_customer" name="name_customer"
                                   placeholder="Tên Khách Hàng">
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Số Thuế</label>
                               <input type="text" class="form-control" id="mst" name="mst"
                                   placeholder="Mã Số Thuế">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Địa Chỉ:</label>
                            <input type="text" class="form-control" id="adress_customer" name="adress_customer"
                                   placeholder="Địa Chỉ">
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Người Liên Hệ</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name"
                                   placeholder="Người Liên Hệ">
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Loại Khách Hàng</label>
                            <select class="form-control" id="type_customer" name="type_customer">
                                <option value="">--Loại Khách Hàng--</option>
                                @foreach($type_customers as $type_customer)
                                    <option value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">CMND</label>
                            <input type="text" class="form-control" id="_cmnd" name="_cmnd"
                                   placeholder="Chứng Minh Nhân Dân">
                        </div>
                        <div class="col-md-3 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Trạng Thái</label>
                            <select class="form-control" id="status_customer" name="status_customer">
                                <option value="">--Loại Khách Hàng--</option>
                                @foreach($status_customers as $status_customer)
                                    <option value="{{$status_customer->id_status}}">{{$status_customer->status}}</option>
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
                <div class="fixed_header">
                    <table id="" class="table table-borderless table-data3">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Mã Khách Hàng</th>
                            <th>Tên Khách Hàng</th>
                            <th>Tên Liên Hệ</th>
                            <th>Mã Số Thuế</th>
                            <th>Số Điện Thoại</th>
                            <th>Địa Chỉ</th>
                            <th>Email</th>
                            <th>Loại khách hàng</th>
                            <th>Khả năng thanh toán</th>
                            <th>Khối lượng</th>
                            <th>Trạng Thái</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                                <tr id = "redirect">
                                    <td><a class="dropdown-toggle" data-target="{{$customer->id}}" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$customer->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('customer/update')."/".$customer->id}}">Sửa
                                                thông tin khách hàng</a>
                                            <a id="open-deleteContract" class="dropdown-item"
                                               data-id_data="{{$customer->id}}" data-toggle="modal"
                                               data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')">Xóa Thông Tin Khách Hàng</a>
                                        </div>
                                    </td>
                                    <td>{{$customer->customer_id}}</td>
                                    <td>{{$customer->name_customer}}</td>
                                    <td>{{$customer->contact_name}}</td>
                                    <td>{{$customer->mst}}</td>
                                    <td>{{$customer->phone_customer}}</td>
                                    <td>{{$customer->adress_customer}}</td>
                                    <td>{{$customer->email_customer}}</td>
                                    <td>{{$customer->name_type}}</td>
                                    <td>{{$customer->name_solvency}}</td>
                                    <td>{{$customer->mass}}</td>
                                    <td>{{$customer->status}}</td>
                                </tr>
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
            <div class="modal-header">
                <h4 class="modal-title">Thông Báo</h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                Xác nhận xóa
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <a type="button" id="destroy-value"
                        data-destroy-link="{{\Illuminate\Support\Facades\URL::to('customer/destroy')."/"}}"
                        class="btn btn-primary">Xác Nhận
                </a>
            </div>
        </div>
    </div>
</div>

