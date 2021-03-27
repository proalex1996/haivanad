@extends('pages.top-page.master')
@section('title','Thêm Hợp Đồng')
@section('content')
    <script>
        var myDropzone = new Dropzone("div#myId", {
            url: "/file/post"
        });
        $("div#myId").dropzone({
            url: "/file/post"
        });

    </script>
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Hợp đồng</h2>
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Nhập file Excel
                </button>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container-fluid">
                <div class="form-staff">
                    <div class="form-customer">
                        <label for="exampleFormControlInput1 uname">Mã Hợp đồng</label>
                        <input type="text" class="form-control" id="id_contract" name="id_contract"
                               placeholder="Tên Hợp đồng" required>
                        <div class="invalid-feedback">Tên Hợp đồng không được để trống</div>
                    </div>
                    <div class="form-customer">
                        <label for="exampleFormControlSelect2">Nhân Viên Phụ Trách</label>
                        <select class="form-control " id="exampleFormControlSelect2" name="name_staff" required>
                            @foreach($staffs as $staff)
                                <option value="{{$staff->id}}">{{$staff->name_staff}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-customer">
                        <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                        <select class="form-control" id="kind_name" name="kind_name">
                            @foreach($kind_contract as $kind)
                                <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                            @endforeach
                        </select>
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
                                        <select class="form-control" id="name_customer" name="name_customer"
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
                                        <label for="exampleFormControlInput1 uname" style="width: 284px;">Số Điện
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
                                        <label for="exampleFormControlInput1 uname" style="width: 100px;">Đại
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
                                        <label for="exampleFormControlSelect1" style="width: 116px;">Chức Vụ</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="position_customer" name="position_customer">
                                            <option value="">--Chức Vụ--</option>
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
                    </div>

                </fieldset>
                <fieldset class="border-text border-text-product">
                    <legend class='text-left'>Thông Tin Sản Phẩm</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1" style="width: 150px;">Mã Sản Phẩm</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_banner" name="id_banner"
                                                onchange="product()">
                                            <option value="">--Chọn Mã Pano--</option>
                                            @foreach($banners as $banner)
                                                <option value="{{$banner->id_banner}}">{{$banner->id_banner}}</option>
                                            @endforeach
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
                                        <select class="form-control" id="id_typebanner" name="id_typebanner">
                                            <option value="">--Loại Hình--</option>
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
                                        <input type="text" class="form-control" value="" id="id_system" name="id_system"
                                               placeholder="Kết Cấu" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Vị Trí</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-control" value="" id="location" name="location"
                                               placeholder="Vị Trí" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="tinh" name="tinh" onchange="getQuan(this)">
                                            <option value="">--Tỉnh/Thành Phố--</option>
                                            @foreach($provinces as $province)
                                                <option value="{{$province -> id}}">{{$province -> _name}}</option>
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
                                        <select class="form-control" id="quan" name="quan">
                                            <option value="">--Quận/Huyện--</option>
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
                                <input type="text" class="form-control" id="banner_adress"
                                       name="banner_adress"
                                       placeholder="Địa Chỉ Pano" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Hình Ảnh:</label>
                            <div class="polaroid">
                                <img src="{{config('config_app.domain.method').config('config_app.domain.url')
                            .config('config_app.domain.port').config('config_app.domain.name').'/public/storage/content/1-10.jpg'}}" alt="1-10.jpg" style="width:100%">
                                <div class="container">
                                    <p>1-10.jpg</p>
                                </div>
                            </div>

                        </div>
                    </div>

                </fieldset>
                <fieldset class="border-text">
                    <legend class='text-left'>Hợp Đồng</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlSelect1">Loại hợp đồng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="kind_name" name="kind_name">
                                            @foreach($kind_contract as $kind)
                                                <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" class="form-control" id="value_contract"
                                               name="value_contract"
                                               placeholder="Giá trị hợp đồng" value="" required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Thuế VAT</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" class="form-control" onchange="getTong()" id="thue"
                                               name="thue"
                                               placeholder="Giá trị hợp đồng" value="" required>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" class="form-control" value="" id="tong" name="tong"
                                               placeholder="Tổng Giá Trị hợp Đồng">
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-5">
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
                            <div class="col-md-7">
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
                    </div>
                </fieldset>

                <form>
                    <fieldset class="border-text">
                        <legend class='text-left'>Thanh Toán</legend>
                        <div class="container">
                            <table id="example" class="display table-borderless table-responsive" style="width:100%">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" id="check-all" name="title" onclick="checkAll()"></th>
                                    <th>Kỳ</th>
                                    <th>Tỷ Lệ</th>
                                    <th>Số Tiền</th>
                                    <th>VAT</th>
                                    <th>Tổng</th>
                                    <th>Ngày Thanh Toán</th>
                                </tr>
                                </thead>
                                <tbody id="idBodyPayment">
                                <tr class="idTrPayment">
                                    <td><input type="checkbox" id="check-box" name="check-box[]" value="1"
                                               class="m-r-10"></td>
                                    <td><input type="text" class="form-control" id="slovency" name="slovency" required>
                                    </td>
                                    <td><input type="text" class="form-control" id="ratio" name="ratio" required></td>
                                    <td><input type="text" class="form-control" id="id_value_contract"
                                               name="id_value_contract" required></td>
                                    <td><input type="text" class="form-control" id="id_vat" name="id_vat" required></td>
                                    <td><input type="text" class="form-control" id="total" name="total" required></td>
                                    <td><input type="date" class="form-control" name="pay_due" id="pay_due" required>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                            <div class="form-group">
                                <a type="button" onclick="deleteRowPayment()" id="addPayment"
                                   class="au-btn au-btn-icon au-btn--blue float-right m-b-20" style="color: #ffff;">
                                    <i class="zmdi zmdi-plus"></i>Xóa Kỳ Thanh Toán
                                </a>
                                <a type="button" onclick="addPayment()"
                                   class="au-btn au-btn-icon au-btn--blue float-right m-b-20 m-r-20"
                                   style="color: #ffff;">
                                    <i class="zmdi zmdi-plus"></i>Thêm Kỳ Thanh Toán
                                </a>
                            </div>
                        </div>
                    </fieldset>

                </form>


                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Nội dung hợp đồng</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                        <input type="file" class="custom-file-input" accept=".doc,.docx,.pdf" id="content_contract"
                               name="content_contract" required>
                        <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>
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
@endsection
