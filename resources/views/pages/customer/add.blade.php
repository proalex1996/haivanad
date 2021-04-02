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
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Mã Khách Hàng:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="" id="id_customers" name="customer_id"
                                               placeholder="Mã Khách Hàng" size="20" required>
                                        <div class="invalid-feedback">Mã khách hàng không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tên Khách Hàng:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="name_customer" name="name_customer"
                                               placeholder="Tên Khách Hàng" required>
                                        <div class="invalid-feedback">Tên khách hàng không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Mã Số Thuế:</label>
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
                                        <label for="exampleFormControlInput1 uname" >Tên Liên Hệ: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="contact_name" name="contact_name"
                                               placeholder="Tên Liên Hệ" required>
                                        <div class="invalid-feedback">Tên liên hệ không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Số Điện Thoại:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="tel" id="phone_customer" name="phone_customer" size="20" maxlength="10" placeholder="Số Điện Thoại" required>
                                        <div class="invalid-feedback">Số điện thoại không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" >Email:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="email" id="email" name="email_customer" size="20" placeholder="example@mail.com" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
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
                                        <label for="exampleFormControlSelect1" >Loại Khách Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-customer-input" id="type_customer" name="type_customer">
                                            @foreach($type_customers as $type_customer)
                                                <option value="{{$type_customer->id}}">{{$type_customer->name_type}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1" >Khả năng thanh toán</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="kind_name" name="solvency">
                                            @foreach($solvencys as $solvency)
                                                <option value="{{$solvency->id}}">{{$solvency->name_solvency}}</option>
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
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname" style="width: 250px;">Khối Lượng:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="mass" name="mass" size="20" placeholder="Khối lượng" required>
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
                                        <label for="exampleFormControlSelect1">Nguồn Khách Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_nguon" name="id_nguon">
                                            @foreach($nguons as $nguon)
                                                <option value="{{$nguon->id_nguon}}">{{$nguon->name_nguon}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Chức Vụ</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="position_customer" name="position_customer">
                                            <option value="">--Chức Vụ--</option>
                                            @foreach($positions as $postion)
                                                <option value="{{$postion->id_position}}">{{$postion->name_position}}</option>
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
                                        <label for="exampleFormControlSelect1" >Tài Khoản Ngân Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" oninput="addCommas(this)" maxlength="20" id="_bank" name="_bank"
                                               placeholder="1111-2222-3333-4444" required>
                                        <div class="invalid-feedback">Tên liên hệ không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Chứng Minh Nhân Dân</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="_cmnd" name="_cmnd"
                                               placeholder="Chứng Minh Nhân Dân" required>
                                        <div class="invalid-feedback">Tên liên hệ không được để trống</div>
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
                                        <input class="form-customer-input" type="text" id="adress_customer" name="adress_customer" placeholder="Địa Chỉ" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                            <i class="zmdi zmdi-plus"></i>Thêm
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

