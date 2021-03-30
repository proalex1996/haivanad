@extends('pages.top-page.master')
@section('title','Sửa thông tin hợp đồng')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Chi Tiết Hợp đồng</h2>
            </div>
        </div>
        <form action="{{url('contract/update/'.$contract->id)}}" enctype="multipart/form-data" class="needs-validation" method="post">
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
                                    <input type="text" class="form-control" value="{{$contract->id_contract}}" id="id_contract" name="id_contract"
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
                                    <select class="form-control " id="exampleFormControlSelect2" name="id_staff" required>
                                        @foreach($staffs as $staff)
                                            @if ($staff->id_staff == $contract ->id_staff)
                                                <option value="{{$staff->id_staff}}" selected>{{$staff->name}}</option>
                                            @else
                                                <option value="{{$staff->id_staff}}">{{$staff->name}}</option>
                                            @endif
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
                                            @if($kind->id_contract == $contract ->kind)
                                            <option value="{{$kind->id_contract}}" selected>{{$kind->name_kind}}</option>
                                            @else
                                                <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>
                                            @endif
                                        @endforeach
                                    </select>
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
                                        <select class="form-control" id="name_customer" name="name_customer"
                                                onchange="getCustomer()">
                                            @foreach($customers as $customer)
                                                @if($customer->customer_id == $contract->id_customer)
                                                <option value="{{$customer->customer_id}}" selected>{{$customer->name_customer}}</option>
                                                @else
                                                    <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>
                                                @endif
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
                                            <select class="form-control" id="id_nguoncustomer" name="id_nguoncustomer">
                                            </select>

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
                                            @foreach($banners as $banner)
                                                  @if ($banner->id_banner == $contract->id_banner)
                                                        <option value="{{$banner->id_banner}}" selected>{{$banner->id_banner}}</option>
                                                    @else
                                                        <option value="{{$banner->id_banner}}">{{$banner->id_banner}}</option>
                                                    @endif
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
                            <div class="row" id="image-input">


                            </div>

                        </div>
                    </div>

                </fieldset>
                <fieldset class="border-text">
                    <legend class='text-left'>Hợp Đồng</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Giá trị hợp đồng</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" class="form-control" id="value_contract"
                                               name="value_contract"
                                               placeholder="Giá trị hợp đồng" onchange="getTong()" value="{{$contract->value_contract}}" required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Thuế VAT</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="number" class="form-control" onchange="getTong()" id="thue"
                                               name="thue"
                                               placeholder="Thuế (%)" value="{{$contract->vat}}" required>
                                    </div>

                                </div>

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="dateofbirth">Ngày bắt đầu:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-control" value="{{$contract->date_start}}" type="date" name="date_start" id="dateofbirth"
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
                                        <input class="form-control" value="{{$contract->date_end}}" type="date" name="date_end" id="dateofbirth"
                                               required>
                                        <div class="invalid-feedback m-l-20">Vui lòng nhập ngày kết thúc hợp đồng</div>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng</label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="number" class="form-control" value="" step="0.01" id="tong" name="tong"
                                               placeholder="Tổng Giá Trị hợp Đồng">
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </fieldset>

                <form>
                    <fieldset class="border-text">
                        <legend class='text-left'>Thanh Toán</legend>
                        <div class="container-set">
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
                                    <td><input type="checkbox" id="check-box1" name="check_box[]" value="1"
                                               class="display-input m-r-5"></td>
                                    <td><input type="text" class="display-input form-control" id="payment_period" name="payment_period"
                                               required>
                                    </td>
                                    <td><input type="text" class="form-control display-input" id="ratio" name="ratio" required></td>
                                    <td><input type="text" class="form-control display-input" id="id_value_contract" onchange="getRatio()"
                                               name="id_value_contract" required></td>
                                    <td><input type="text" class="form-control display-input" id="id_vat" onchange="getRatio()" name="id_vat" required></td>
                                    <td><input type="text" class="form-control display-input" id="total" name="total_value" required></td>
                                    <td><input type="date" class="form-control display-input" name="_pay_due" id="_pay_due" required>
                                    </td>
                                </tr>
                                </tbody>

                            </table>
                            <div class="form-group">
                                <button type="button"  onclick="deleteRowPayment()" id="addPayment"
                                        class="au-btn au-btn-icon au-btn--blue float-right m-b-20" style="color: #ffff;">
                                    <i class="zmdi zmdi-plus"></i>Xóa Kỳ Thanh Toán
                                </button>
                                <button type="button" id="addrowPayment"
                                        class="au-btn au-btn-icon au-btn--blue float-right m-b-20 m-r-20"
                                        style="color: #ffff;">
                                    <i class="zmdi zmdi-plus"></i>Thêm Kỳ Thanh Toán
                                </button>
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
                <div class="form-group m-t-20">
                    <label for="exampleFormControlSelect1">Ghi Chú</label>
                    <div class="custom-file">
                        <input class="form-control" value="{{$contract->note_contract}}" type="text" name="note_contract"
                              >
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                        <i class="zmdi zmdi-plus"></i>Lưu
                    </button>
                </div>
            </div>


        </form>
    </div>
@endsection


{{--    <div class="container-fluid">--}}
{{--        <div class="col-md-12 m-b-40">--}}
{{--            <div class="overview-wrap" style="width: 400px;">--}}
{{--                <a href="{{url('/')}}">Trang Chủ>></a><a href="{{url('/contract')}}">Hợp đồng>></a>Sửa thông tin khách hàng--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <form action="{{\Illuminate\Support\Facades\URL::to('/contract/update/' . $contract->id)}}" enctype="multipart/form-data" class="needs-validation" method="post">--}}
{{--            @csrf--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlInput1 uname">Mã Hợp Đồng</label>--}}
{{--                <input type="text" class="form-control" value="{{$contract->id_contract}}" id="id_contract"--}}
{{--                       name="id_contract"--}}
{{--                       placeholder="Tên Hợp đồng" required>--}}
{{--                <div class="invalid-feedback">Tên Hợp đồng không được để trống</div>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect1">Tên khách hàng</label>--}}
{{--                <select class="form-control" id="name_customer" name="id_customer">--}}
{{--                    @foreach($customers as $customer)--}}
{{--                        @if($customer->customer_id == $contract->id_customer)--}}
{{--                        <option value="{{$customer->customer_id}}" selected>{{$customer->name_customer}}</option>--}}
{{--                        @else--}}
{{--                            <option value="{{$customer->customer_id}}">{{$customer->name_customer}}</option>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect1">Mã Pano</label>--}}
{{--                <select class="form-control" id="name_banner" name="id_banner">--}}
{{--                  @foreach($banners as $banner)--}}
{{--                      @if ($banner->id == $contract->id_banner)--}}
{{--                            <option value="{{$banner->id}}" selected>{{$banner->id_banner}}</option>--}}
{{--                        @else--}}
{{--                            <option value="{{$banner->id}}">{{$banner->id_banner}}</option>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect1">Nội dung hợp đồng</label>--}}
{{--                <div class="custom-file">--}}
{{--                    <label class="custom-file-label" for="validatedCustomFile">{{$contract->content}}</label>--}}
{{--                    <input type="file" class="custom-file-input"--}}
{{--                           accept=".doc,.docx,.pdf" id="content_contract"--}}
{{--                           name="content" {{is_null($contract->content) ? "required" : ""}}>--}}
{{--                    <input type="hidden" name="content_hide" value="{{$contract->content}}">--}}
{{--                    <div class="invalid-feedback">Định dạng file phải là .doc, .docx, .pdf</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect2">Nhân Viên Phụ Trách</label>--}}
{{--                <select class="form-control " id="exampleFormControlSelect2" name="id_staff" required>--}}
{{--                    @foreach($staffs as $staff)--}}
{{--                        @if ($staff->id == $contract ->id_staff)--}}
{{--                            <option value="{{$staff->id}}" selected>{{$staff->name_staff}}</option>--}}
{{--                        @else--}}
{{--                            <option value="{{$staff->id}}">{{$staff->name_staff}}</option>--}}
{{--                        @endif--}}

{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="row form-group">--}}
{{--                <div class='col-sm-6'>--}}
{{--                    <label for="dateofbirth">Ngày bắt đầu</label>--}}
{{--                    <input value="{{$contract->date_start}}" type="date" name="date_start" id="dateofbirth" required>--}}
{{--                </div>--}}
{{--                <div class='col-sm-6'>--}}
{{--                    <label for="dateofbirth">Ngày kết thúc</label>--}}
{{--                    <input type="date" value="{{$contract->date_end}}" name="date_end" id="dateofbirth" required>--}}
{{--                </div>--}}
{{--                <div class='col-sm-6'>--}}
{{--                    <label for="dateofbirth">Ngày Thanh Toán</label>--}}
{{--                    <input type="date" value="{{$contract->pay_due}}" name="_pay_due" id="dateofbirth" required>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect1">Loại hợp đồng</label>--}}
{{--                <select class="form-control" id="kind_name" name="kind">--}}
{{--                    @foreach($kind_contract as $kind)--}}
{{--                        @if($kind->id_contract == $contract ->kind)--}}
{{--                        <option value="{{$kind->id_contract}}" selected>{{$kind->name_kind}}</option>--}}
{{--                        @else--}}
{{--                            <option value="{{$kind->id_contract}}">{{$kind->name_kind}}</option>--}}
{{--                        @endif--}}
{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlInput1 uname">Giá Năm</label>--}}
{{--                <input type="text" class="form-control" value="{{$contract->gianam}}" id="id_contract"--}}
{{--                       name="gianam"--}}
{{--                       placeholder="Giá Năm">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlInput1 uname">Giá 3 Tháng</label>--}}
{{--                <input type="text" class="form-control" value="{{$contract->gia3thang}}" id="id_contract"--}}
{{--                       name="gianam"--}}
{{--                       placeholder="Giá 3 Tháng">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlInput1 uname">Giá 6 Tháng</label>--}}
{{--                <input type="text" class="form-control" value="{{$contract->gia6thang}}" id="id_contract"--}}
{{--                       name="gia6thang"--}}
{{--                       placeholder="Giá 6 Tháng">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlInput1 uname">Giá 9 Tháng</label>--}}
{{--                <input type="text" class="form-control" value="{{$contract->gia9thang}}" id="id_contract"--}}
{{--                       name="gia9thang"--}}
{{--                       placeholder="Giá 9 Tháng">--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlInput1">Giá trị hợp đồng</label>--}}
{{--                <div class="d-inline-flex">--}}
{{--                    <input type="number" value="{{$contract->value_contract}}" class="form-control"--}}
{{--                           id="exampleFormControlInput1" name="value_contract"--}}
{{--                           placeholder="Giá trị hợp đồng" required>--}}
{{--                    <label for="exampleFormControlInput1">VND</label>--}}
{{--                    <div class="invalid-feedback m-l-20">Vui lòng nhập giá trị hợp đồng</div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <label for="exampleFormControlSelect1">Trạng Thái Hợp Đồng</label>--}}
{{--                <select class="form-control" id="status" name="status_contract">--}}
{{--                    @foreach($status as $stt)--}}
{{--                        @if ($stt -> id_contract == $contract->status_contract)--}}
{{--                            <option value="{{$stt->id_contract}}" selected>{{$stt->name_status}}</option>--}}
{{--                        @else--}}
{{--                            <option value="{{$stt->id_contract}}">{{$stt->name_status}}</option>--}}
{{--                        @endif--}}

{{--                    @endforeach--}}
{{--                </select>--}}
{{--            </div>--}}
{{--            <div class="form-group">--}}
{{--                <button data-toggle="modal" data-target="#update" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">--}}
{{--                    Sửa--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}
{{--<div class="modal fade" id="update">--}}

{{--    <div class="modal-dialog modal-dialog-centered">--}}
{{--        <div class="modal-content container-fluid">--}}

{{--            <!-- Modal Header -->--}}
{{--            <div class="modal-header">--}}
{{--                <h4 class="modal-title">Thông Báo</h4>--}}
{{--                <button type="button" class="close" data-dismiss="modal">×</button>--}}
{{--            </div>--}}

{{--            <!-- Modal body -->--}}
{{--            <div class="modal-body">--}}
{{--                Sửa thông tin hợp đồng thành công!!--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
