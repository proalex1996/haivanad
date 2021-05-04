@extends('pages.top-page.master')
@section('title','Thêm Hợp Đồng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Hợp đồng</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="{{url('contract/import-contract')}}">
                    <i class="zmdi zmdi-plus" ></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container-fluid">
                <div class="form-staff">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12">
                                    <label for="exampleFormControlInput1 uname">Mã Hợp đồng</label>
                                </div>
                                <div class="col-xl-6 col-sm-12">
                                    <input type="text" class="form-control" value="{{$codes}}" id="id_contracts" name="id_contract"
                                           placeholder="Tên Hợp đồng" required>
                                    <div class="invalid-feedback">Tên Hợp đồng không được để trống</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-xl-7 col-sm-12">
                                    <label for="exampleFormControlSelect2">Nhân Viên Phụ Trách</label>
                                </div>
                                <div class="col-xl-5 col-sm-12">
                                    <select class="form-control chosen-select" id="exampleFormControlSelect2" name="id_staff" required>
                                        @foreach($staffs as $staff)
                                            <option value="{{$staff->id_staff}}">{{$staff->name}}</option>
                                    @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-xl-6 col-sm-12">
                                    <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                                </div>
                                <div class="col-xl-6 col-sm-12">
                                    <select class="form-control" id="kind_name" name="kind_name">
                                        @foreach($kind_contract as $kind)
                                            <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                                        @endforeach
                                    </select>
                                    <button type="button" class="btn-selected" data-toggle="modal" data-target="#kind_contract">Loại HĐ không có sẵn?</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <fieldset class="border-text">
                    <legend class='text-left'>Khách Hàng</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tên khách hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <select class="form-control chosen-select custom-chosen" id="id_customer" name="name_customer"
                                                    onchange="getCustomer()">
                                                <option value="">--Chọn Khách Hàng--</option>
                                                @foreach($customers as $customer)
                                                    <option
                                                        value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Nguồn Khách Hàng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_nguoncustomer" name="id_nguoncustomer">
                                            <option value="">--Chọn Nguồn Khách Hàng--</option>

                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Địa Chỉ</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="adress_customer" name="adress_customer"
                                       placeholder="Địa Chỉ" value="" required>
                                <div class="invalid-feedback">Địa chỉ không được để trống</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">MST</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="mst" name="mst"
                                               placeholder="Mã Số Thuế" required>
                                        <div class="invalid-feedback">MST không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Số Điện
                                            Thoại</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" id="phone_customer"
                                               name="phone_customer"
                                               placeholder="Số Điện Thoại"
                                               maxlength="10" value="" required>
                                        <div class="invalid-feedback">Số điện thoại không được để trống</div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Đại
                                            Diện</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="contact_name"
                                               name="contact_name"
                                               placeholder="Tên Người Đại Diện" required>
                                        <div class="invalid-feedback">Đại Diện không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Chức Vụ</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="position_customer" name="position_customer">
                                            <option value="">--Chức Vụ--</option>
                                        </select>
                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </fieldset>
                <fieldset class="border-text border-text-product">
                    <legend class='text-left'><div type="button" id="more_product" class="snip1547"><span>Thông Tin Sản Phẩm</span></div></legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlSelect1">Tên Sản Phẩm</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <select class="form-control chosen-select" id="_name_banner_1" name="_name_banner[]" onchange="product(1)">
                                    <option value="">--Chọn Pano--</option>
                                    @foreach($banners as $banner)
                                        <option value="{{$banner->id_banner}}">{{$banner->_name_banner}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Mã Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_banner_1" name="id_banner[]">
                                            <option value="">--Chọn Mã Pano--</option>
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_typebanner_1" name="id_typebanner[]">
                                            <option value="">--Loại Hình--</option>
                                        </select>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Địa Chỉ</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="banner_adress_1"
                                       name="banner_adress[]"
                                       placeholder="Địa Chỉ Pano" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="tinh_1" name="tinh[]" onchange="getQuan(this)">
                                            <option value="">--Tỉnh/Thành Phố--</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province -> _code}}">{{$province -> _name}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Quận/Huyện</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="quan_1" name="quan[]">
                                            <option value="">--Quận/Huyện--</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Kết Cấu</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="id_system_1" name="id_system[]"
                                               placeholder="Kết Cấu" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Kích Thước</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="size_banner_1" name="size_banner[]"
                                               placeholder="Kích Thước" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3 col-sm-12">
                                <label for="exampleFormControlInput1 uname">Giá Năm(USD)</label>
                            </div>
                            <div class="col-md-9 col-sm-12">
                                <input type="text" class="form-control" id="gianam_1" name="gianam"
                                       placeholder="Giá Năm" value="" required>
                                <div class="invalid-feedback">Địa chỉ không được để trống</div>
                            </div>
                        </div>
                    </div>

                </fieldset>
                <div id="form_product">

                </div>
                <fieldset class="border-text">
                    <legend class='text-left'>Hợp Đồng</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth">Ngày bắt đầu:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" type="date" name="date_start" id="dateofbirth"
                                               required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày bắt đầu hợp đồng</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth">Ngày kết thúc</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" type="date" name="date_end" id="dateofbirth"
                                               required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày kết thúc hợp đồng</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row" style="margin-bottom: 20px; margin-top: 15px">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Giá trị hợp đồng(USD)</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" data-type="currency" pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" onchange="getTong()" id="value_contract"
                                               name="value_contract"
                                               placeholder="Giá trị hợp đồng" value="" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Tỉ Giá VND/1USD</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" data-type="currency"  onchange="getTong()" id="exchange"
                                               name="exchange"
                                               placeholder="VND">
                                    </div>

                                </div>

                            </div>
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Thuế VAT(%)</label>
                                    </div>
                                    <div class="col-md-3 col-sm-12">
                                        <input type="number" class="form-control"  onchange="getTong()" id="thue"
                                               name="thue"
                                               placeholder="Thuế (%)" value="10" readonly>

                                    </div>
                                    <label for="exampleFormControlInput1">(%)</label>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng(VND)</label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="number" class="form-control" value="" id="tong" name="tong"
                                               placeholder="Tổng Giá Trị hợp Đồng(USD)" readonly>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>
                <fieldset class="border-text">
                        <legend class='text-left'>Thanh Toán</legend>
                        <div class="container-fluid">
                            <table id="example" class="display table-borderless table-responsive" style="width:100%">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" name="title" onclick="checkAll()"></th>
                                    <th class="text-center">Kỳ</th>
                                    <th class="text-center">Tỷ Lệ</th>
                                    <th class="text-center">Số Tiền</th>
                                    <th class="text-center">VAT</th>
                                    <th class="text-center">Tổng</th>
                                    <th class="text-center">Ngày Thanh Toán</th>
                                </tr>
                                </thead>
                                <tbody id="idBodyPayment">
                                <tr class="idTrPayment">
                                    <td><input type="checkbox" id="check-box" name="check_box[]" value="1"
                                               class="display-input m-r-5"></td>
                                    <td><input type="text" class="display-input form-control payment_period" id="payment_period" name="payment_period[]"
                                               required>
                                    </td>
                                    <td><input type="text" class="form-control display-input ratio" placeholder="Tỉ Lệ(%)" id="ratio" onchange="setRatio(this)" name="ratio[]" required></td>
                                    <td><input type="text" class="form-control display-input id_value_contract" id="id_value_contract"
                                               name="id_value_contract[]" placeholder="Số Tiền(USD)" readonly></td>
                                    <td><input type="text" class="form-control display-input id_vat" placeholder="Thuế (%)" id="id_vat"  value="10" name="id_vat[]" readonly></td>
                                    <td><input type="text" class="form-control display-input total" placeholder="Tổng Tiền(USD)" id="total" name="total_value[]" readonly></td>
                                    <td><input type="date" class="form-control display-input" name="_pay_due[]" required>



                                </tbody>

                            </table>
                            <div class="form-group">
                                <button type="button"  onclick="deleteRowPayment1()" id="addPayment"
                                   class="au-btn au-btn-icon au-btn--blue float-right m-b-20" style="color: #ffff;">
                                    <i class="zmdi zmdi-plus"></i>Xóa Kỳ Thanh Toán
                                </button>
                                <button type="button" id="addrowPayment1"
                                   class="au-btn au-btn-icon au-btn--blue float-right m-b-20 m-r-20"
                                   >
                                    <i class="zmdi zmdi-plus"></i>Thêm Kỳ Thanh Toán
                                </button>
                            </div>
                        </div>
                    </fieldset>
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Hợp đồng đã ký</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                        <input type="file" class="custom-file-input" accept=".doc,.docx,.pdf" id="contented"
                               name="contented">
                        <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>
                    </div>
                </div>
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Nội dung hợp đồng</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                        <input type="file" class="custom-file-input" accept=".doc,.docx,.pdf" id="content_contract"
                               name="content_contract" required>
                        <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>
                    </div>
                </div>
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Ghi Chú</label>
                    <div class="custom-file">
                        <input type="text" class="form-control" id="note_contract" name="note_contract"
                               placeholder="Ghi Chú">
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                        <i class="zmdi zmdi-plus"></i>Thêm
                    </button>

                </div>
            </div>


        </form>
    </div>
@endsection<div class="modal fade" id="kind_contract" tabindex="-1" role="dialog"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Loại Hợp Đồng</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Loại HĐ:</label>
                        <input type="text" class="form-control" id="id_contract">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại Hình:</label>
                        <input type="text" class="form-control" id="name_kind">
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
                <button type="button" class="btn btn-primary" id="add_kind">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>

