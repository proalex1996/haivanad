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
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Khách Hàng:</label>
                            <input type="text" class="form-control" id="customer_id" name="customer_id"
                                   placeholder="Mã Khách Hàng">
                        </div>
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Tên Khách Hàng:</label>
                             <input type="text" class="form-control" id="name_customer" name="name_customer"
                                   placeholder="Tên Khách Hàng">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Địa Chỉ:</label>
                            <input type="text" class="form-control" id="adress_customer" name="adress_customer"
                                   placeholder="Địa Chỉ">
                        </div>
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlInput1 ">Mã Số Thuế</label>
                               <input type="text" class="form-control" id="mst" name="mst"
                                   placeholder="Mã Số Thuế">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">CMND</label>
                            <input type="text" class="form-control" id="_cmnd" name="_cmnd"
                                   placeholder="Chứng Minh Nhân Dân">
                        </div>
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Người Liên Hệ</label>
                            <input type="text" class="form-control" id="contact_name" name="contact_name"
                                   placeholder="Người Liên Hệ">
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Loại Khách Hàng</label>
                            <select class="form-control" id="type_customer" name="type_customer">
                                <option value="">--Loại Khách Hàng--</option>
                                @foreach($type_customers as $type_customer)
                                    <option value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-5 col-sm-12 m-t-10">
                            <label for="exampleFormControlSelect1">Trạng Thái</label>
                            <select class="form-control" id="status_customer" name="status_customer">
                                <option value="">--Trạng Thái--</option>
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
                            <th width="10%">STT</th>
                            <th width="10%">Mã Khách Hàng</th>
                            <th width="20%">Tên Khách Hàng</th>
                            <th width="25%">Địa Chỉ</th>
                            <th width="10%">Mã Số Thuế</th>
                            <th width="10%">Loại khách hàng</th>
                            <th width="15%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($customers as $customer)
                                <tr id ="redirect_{{$customer->id}}">
                                    <td><a class="dropdown-toggle" data-target="{{$customer->id}}" data-toggle="dropdown" aria-haspopup="true"
                                           aria-expanded="false" id="dropdownMenuLink"> {{$customer->id}}</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item"
                                               href="{{\Illuminate\Support\Facades\URL::to('customer/update')."/".$customer->id}}">Sửa
                                                thông tin khách hàng</a>

                                        </div>
                                    </td>
                                    <td>{{$customer->customer_id}}</td>
                                    <td>{{$customer->name_customer}}</td>
                                    <td>{{$customer->adress_customer}}</td>
                                    <td>{{$customer->mst}}</td>
                                    <td>{{$customer->name_type}}</td>
                                    <td> <a href="{{\Illuminate\Support\Facades\URL::to('customer/update')."/".$customer->id}}">Xem chi tiết</a></td>
                                </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection



