@extends('pages.top-page.master')
@section('title','Sửa thông tin khách hàng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Quản lý Khách Hàng</h2>
            </div>
        </div>
        <form action="{{\Illuminate\Support\Facades\URL::to('/customer/update/'.$customers->id)}}"
              enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container">
                <fieldset class="border-text">
                    <legend class='text-left'>Thông Tin Khách Hàng</legend>
                    <div class="container">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="exampleFormControlInput1 uname">Tên Khách Hàng:</label>
                                        </div>
                                        <div class="col-md-9 col-sm-12">
                                            <input type="text" class="form-customer-input" value="{{$customers->name_customer}}" id="name_customer" name="name_customer"
                                                   placeholder="Tên Khách Hàng">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Mã Khách Hàng:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" id="id_customer" name="customer_id"
                                                   placeholder="Mã Khách Hàng" value="{{$customers->customer_id}}" size="20" readonly>
                                            <div class="invalid-feedback">Mã khách hàng không được để trống</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlSelect1">Loại Khách Hàng</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <select class="form-customer-input" name="type_customer">
                                                @foreach($type_customers as $type_customer)
                                                    @if( $type_customer->id == $customers->type_customer)
                                                        <option value="{{$type_customer->id}}"
                                                                selected>{{$type_customer->name_type}}</option>
                                                    @else
                                                        <option
                                                            value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Mã Số Thuế/CMND:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" name="mst" placeholder="Mã Số Thuế" value="{{$customers->mst}}" required>
                                            <div class="invalid-feedback">Mã Khách hàng không được để trống</div>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlSelect1" style="width: 340px;">Trạng Thái</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <select class="form-customer-input" id="status" name="status_customer">
                                                @foreach($statuss as $status)
                                                    @if($customers->status_customer == $status->id_status)
                                                        <option value="{{$status->id_status}}"
                                                                selected>{{$status->status}}</option>
                                                    @else
                                                        <option value="{{$status->id_status}}">{{$status->status}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <label for="exampleFormControlInput1">Đia Chỉ</label>
                                        </div>
                                        <div class="col-sm-9">
                                            <input class="form-customer-input" type="text"  value="{{$customers->adress_customer}}" name="adress_customer" placeholder="Địa Chỉ" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlSelect1" >Tài Khoản Ngân Hàng</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" oninput="addCommas(this)" maxlength="20"  name="_bank"
                                                   placeholder="1111-2222-3333-4444" value="{{$customers->_bank}}">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Tên Ngân Hàng</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" value="{{$customers->name_bank}}" id="name_bank" name="name_bank"
                                                   placeholder="Tên Ngân Hàng">
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Người Đại Diện:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" value="{{$customers->_cmnd}}" id="_cmnd" name="_cmnd"
                                                   placeholder="Người Đại Diện">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Chức Vụ</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" value="{{$customers->position_customer}}" maxlength="20" id="id_position" name="position_customer"
                                                   placeholder="Chức Vụ">
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

                </fieldset>
                <fieldset class="border-text">
                    <legend class='text-left'>Thông Tin Liên Hệ</legend>
                    <div class="container">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname" >Tên Liên Hệ: </label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input" value="{{$customers->contact_name}}" name="contact_name"  placeholder="Tên Liên Hệ" required>
                                            <div class="invalid-feedback">Tên liên hệ không được để trống</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Số Điện Thoại:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input class="form-customer-input" type="tel" name="phone_customer" value="{{$customers->phone_customer}}" size="20" maxlength="10" placeholder="Số Điện Thoại" required>
                                            <div class="invalid-feedback">Số điện thoại không được để trống</div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname" >Email:</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input class="form-customer-input" type="text"  name="email_customer" value="{{$customers->email_customer}}" size="20" placeholder="example@mail.com" required>
                                            <div class="invalid-feedback">Email không được để trống</div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlSelect1">Nguồn Khách Hàng</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <select class="form-customer-input" id="id_nguon" name="id_nguon">
                                                @foreach($nguons as $nguon)
                                                    @if($customers->id_nguon == $nguon->id_nguon)
                                                        <option value="{{$nguon->id_nguon}}" selected>{{$nguon->name_nguon}}</option>
                                                    @else
                                                        <option value="{{$nguon->id_nguon}}">{{$nguon->name_nguon}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>

                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                        <i class="zmdi zmdi-plus"></i>Lưu
                    </button>
                    <a type="button" id="open-deleteContract"
                       data-id_data="{{$customers->id}}" data-toggle="modal"
                       data-target="#detroy" onclick="openDestroyDialog(this, 'destroy-value')"class="au-btn au-btn-icon au-btn--red float-left">
                        <i class="far fa-trash-alt"></i>Xóa
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
<div class="modal fade" id="detroy">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Thông Báo</h4>
                @if(auth()->user()->id_phan_quyen == 1)
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
            @else
                <div class="modal-body m-t-20">
                    Bạn không được cấp quyền xóa
                </div>
                <button type="button" class="btn btn-secondary m-t-70" data-dismiss="modal">Đóng</button>

            @endif
        </div>
        </div>
    </div>
</div>

