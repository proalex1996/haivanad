@extends('pages.top-page.master')
@section('title','Thêm Khách Hàng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Khách Hàng</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="{{url('customer/import-customer')}}">
                    <i class="zmdi zmdi-plus" ></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
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
                                        <div class="col-sm-9">
                                            <input class="form-customer-input" type="text" id="name_customer" name="name_customer" placeholder="Tên Khách Hàng" required>
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
                                            <input type="text" class="form-customer-input" value="{{$code}}" id="id_customer" name="customer_id"
                                                   placeholder="Mã Khách Hàng" size="20" readonly>
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlSelect1" >Loại Khách Hàng</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <select class="form-customer-input" id="type_customer" name="type_customer">
                                                @foreach($type_customers as $type_customer)
                                                    <option value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                                                @endforeach
                                            </select>
                                            <button type="button" class="btn-selected" data-toggle="modal"
                                                    data-target="#type_customer" style="margin-top:unset">Loại KH không có sẵn?</button>
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
                                            <input type="text" class="form-customer-input" id="mst" name="mst"
                                                   placeholder="Mã Số Thuế" required>
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
                                            <select class="form-control" id="status" name="status_customer">
                                                @foreach($statuss as $status)
                                                    <option value="{{$status->id_status}}">{{$status->status}}</option>
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
                                            <input class="form-customer-input" type="text" id="adress_customer" name="adress_customer" placeholder="Địa Chỉ">
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
                                            <input type="text" class="form-customer-input" oninput="addCommas(this)" maxlength="20" id="_bank" name="_bank"
                                                   placeholder="1111-2222-3333-4444">
                                        </div>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 col-sm-12">
                                            <label for="exampleFormControlInput1 uname">Tên Ngân Hàng</label>
                                        </div>
                                        <div class="col-md-6 col-sm-12">
                                            <input type="text" class="form-customer-input"
                                                   id="name_bank" name="name_bank"
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
                                            <input type="text" class="form-customer-input" id="_cmnd" name="_cmnd"
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
                                            <input type="text" class="form-customer-input" maxlength="20" id="position_customer" name="position_customer"
                                                   placeholder="Chức Vụ">
                                            <div class="invalid-feedback">Tên liên hệ không được để trống</div>
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
                                        <input type="text" class="form-customer-input" id="contact_name" name="contact_name"
                                               placeholder="Tên Liên Hệ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Số Điện Thoại:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="tel" id="phone_customer" name="phone_customer" size="20" maxlength="10" placeholder="Số Điện Thoại">
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
                                        <input class="form-customer-input" type="text" id="email" name="email_customer" size="20" placeholder="example@mail.com" >
                                    </div>
                                </div>
                            </div> <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Nguồn Khách Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-customer-input" id="id_nguon" name="id_nguon">
                                            @foreach($nguons as $nguon)
                                                <option value="{{$nguon->id_nguon}}">{{$nguon->name_nguon}}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn-selected" data-toggle="modal"
                                                data-target="#nguon" style="margin-top:unset">NKH không có sẵn?</button>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                    </div>
                </fieldset>
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                        <i class="zmdi zmdi-plus"></i>Thêm
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
{{--Nguồn--}}
<div class="modal fade" id="nguon" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Nguồn Khách Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Nguồn:</label>
                        <input type="text" class="form-control" id="id_nguon">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Nguồn Khách Hàng:</label>
                        <input type="text" class="form-control" id="name_nguon">
                    </div>
                </form>
            </div>
            <div class="container">
                <p style="color: red !important; width: 100% !important;font-style: italic;font-size: 12px">
                    Sau khi thêm mới sẽ reload lại trang web để cập nhật dữ liệu mới. Những dữ liệu chưa lưu sẽ bị mất
                </p>
            </div>


            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_nguon">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--Loại Khách Hàng--}}
<div class="modal fade" id="type_customer" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Loại Khách Hàng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Thể Loại:</label>
                        <input type="text" class="form-control" id="id_type_customer">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại Khách Hàng:</label>
                        <input type="text" class="form-control" id="name_type_customer">
                    </div>
                </form>
            </div>
            <div class="container">
                <p style="color: red !important; width: 100% !important;font-style: italic;font-size: 12px">
                    Sau khi thêm mới sẽ reload lại trang web để cập nhật dữ liệu mới. Những dữ liệu chưa lưu sẽ bị mất
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="submit_type_customer">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>

