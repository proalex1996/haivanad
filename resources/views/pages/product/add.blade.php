@extends('pages.top-page.master')
@section('title','Thêm Pano')
@section('content')
    <div class="container-fluid">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Pano</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="import-product">
                    <i class="zmdi zmdi-plus"></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" id="product-add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="container">
                <div class="container-fluid">
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Mã Sản Phẩm:</label>
                                    </div>

                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" value="{{$code}} "onchange="getProduct()" id="id_banner"
                                               name="id_banner"
                                               readonly>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="row">
{{--                            <input type="hidden" class="form-customer-input" id="id_banners" name="id_banner"--}}
{{--                                   placeholder="Mã Pano" size="20" >--}}

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tên Sản Phẩm:</label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" class="form-customer-input" id="_name_banner"
                                               name="_name_banner"
                                               placeholder="Tên Sản Phẩm" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input type="text" class="form-customer-input" id="banner_adress"
                                               name="banner_adress"
                                               placeholder="Địa chỉ">
                                        <div class="invalid-feedback">Địa chỉ không được để trống</div>
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
                                        <label for="exampleFormControlSelect1">Tỉnh/Thành Phố:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="tinh" name="tinh" onchange="getQuan(this)">
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
                                        <label for="exampleFormControlSelect1">Quận/Huyện:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="quan" name="quan">
                                            <option value="">--Quận/Huyện--</option>
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
                                        <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="id_typebanner" name="id_typebanner">
                                            @foreach($type_banners as $type_banner)
                                                <option
                                                    value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn-selected" data-toggle="modal" data-target="#type_banner">Loại hình sp không có sẵn?</button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1">Kết Cấu: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input type="text" class="form-customer-input" id="id_system" name="id_system"
                                               placeholder="Kết Cấu"  maxlength="20">
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
                                        <label for="exampleFormControlSelect1">Trạng Thái:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <select class="form-control" id="status_banner" name="status_banner">
                                            @foreach($statuss as $status)
                                                <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                                            @endforeach
                                        </select>
                                        <button type="button" class="btn-selected" data-toggle="modal" data-target="#status_banner">Trạng thái không có sẵn?</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="size_banner"
                                               name="size_banner"
                                               placeholder="Kích thước"  maxlength="20">
                                        <div class="invalid-feedback">Kích thước không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Diện Tích: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="dien_tich" name="dien_tich"
                                               placeholder="Diện Tích" required>
                                        <div class="invalid-feedback">Email không được để trống</div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="height_banner"
                                               name="height_banner"
                                               placeholder="Tổng chiều cao"  maxlength="20">
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
                                        <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="light_system"
                                               name="light_system"
                                               placeholder="Hệ thống đèn"  maxlength="20">
                                        <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
                                    </div>

                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="flow" name="flow"
                                               placeholder="Lưu Lượng Người"  maxlength="20">
                                        <div class="invalid-feedback">Lưu Lượng Người không được để trống</div>
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
                                        <label for="exampleFormControlInput1 uname">Giá Đèn: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" maxlength="20" data-type="currency" type="text" id="v_light"
                                               name="v_light"
                                               placeholder="Giá Đèn">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Điểm Escom: </label>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <input class="form-customer-input" type="text" id="escom" name="escom"
                                               placeholder="Điểm Escom" >
                                        <div class="invalid-feedback">Điểm Escom không được để trống</div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Giá Năm(USD): </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input class="form-customer-input" type="text" id="gianam" data-type="currency"
                                               pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" name="gianam"
                                               placeholder="Giá Năm">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Ghi Chú: </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input class="form-customer-input" type="text" id="note_banner"
                                               name="note_banner"
                                               placeholder="Ghi Chú">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3 col-sm-12">
                                        <label for="exampleFormControlInput1 uname">Nội Dung Quảng Cáo Hiện Tại: </label>
                                    </div>
                                    <div class="col-md-9 col-sm-12">
                                        <input class="form-customer-input" type="text" id="content"
                                               name="content"
                                               placeholder="Nội Dung Quảng Cáo Hiện Tại">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Đặc Điểm:</label>
                        <textarea class="form-control text-aria" id="dac_diem" name="dac_diem" rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-3 col-sm-12 label-views">
                                <label for="exampleFormControlInput1 uname">Hướng Nhìn 1: </label>
                            </div>
                            <div class="col-md-3 col-sm-12 label-views">
                                <label for="exampleFormControlInput1 uname">Hướng Nhìn 2: </label>
                            </div>
                            <div class="col-md-3 col-sm-12 label-views">
                                <label for="exampleFormControlInput1 uname">Hướng Nhìn 3: </label>
                            </div>
                            <div class="col-md-3 col-sm-12 label-views">
                                <label for="exampleFormControlInput1 uname">Hướng Nhìn 4: </label>
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-customer-input" type="text" name="views[]"
                                       placeholder="Hướng Nhìn 1">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-customer-input" type="text" name="views[]"
                                       placeholder="Hướng Nhìn 2">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-customer-input" type="text" name="views[]"
                                       placeholder="Hướng Nhìn 3">
                            </div>
                            <div class="col-md-3 col-sm-12">
                                <input class="form-customer-input" type="text" name="views[]"
                                       placeholder="Hướng Nhìn 4">
                            </div>

                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Hình Ảnh(4 Ảnh):</label>
                        <div class="input-images">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Sơ Đồ:</label>
                        <div class="input-images-map">
                        </div>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="au-btn au-btn-icon au-btn--blue float-right m-b-25">
                            <i class="zmdi zmdi-plus"></i>Lưu
                        </button>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection
{{--Modal thêm trạng thái--}}
<div class="modal fade" id="status_banner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Trạng Thái</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Trạng Thái:</label>
                        <input type="text"  class="form-control" id="id_statu">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Trạng Thái:</label>
                        <input type="text" class="form-control" id="name_status">
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
                <button type="button" class="btn btn-primary" id="submit_product">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
{{--Modal thêm loại hình sản phẩm--}}
<div class="modal fade" id="type_banner" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm Mới Loại Hình Sản Phẩm</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Mã Loại Hình:</label>
                        <input type="text" class="form-control" id="id_typebanner">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Tên Loại Hình:</label>
                        <input type="text" class="form-control" id="name_type">
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
                <button type="button" class="btn btn-primary" id="submit_type_product">Xác Nhận</button>
            </div>
        </div>
    </div>
</div>
