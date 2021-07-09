@extends('pages.top-page.master')
@section('title','Thông Tin Chung')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="overview-wrap">
                    <h2 class="title-1">Thông Tin Chung</h2>
                </div>
            </div>
        </div>
            <div class="row">
                <div class="col-md-3 col-sm-12 m-t-10">
                    <label for="exampleFormControlInput1 ">Tên Sản Phẩm</label>
                    <select class="form-control chosen-select" id="_name_banner" name="_name_banner">
                        <option value="">--Chọn Pano--</option>
                        @foreach($banners as $banner)
                            <option value="{{$banner->id_banner}}">{{$banner->_name_banner}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2 col-sm-12 m-t-15">
                    <label for="exampleFormControlInput1 "></label>
                    <button class="btn btn-primary btn-block" type="button" id="id_finder" aria-expanded="false">Tìm
                    </button>
                </div>
            </div>
        <div id="info_finder">
        <div class="container">
                                <div class="container-fluid">
                                    <fieldset class="border-text">
                                        <legend class='text-left'><h2 class="title-1">Thông tin sản phẩm</h2></legend>
                                        <div class="form-group">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="exampleFormControlInput1 uname">Mã Sản Phẩm:</label>
                                                        </div>
                
                                                        <div class="col-md-6 col-sm-12">
                                                            <input type="text" class="form-customer-input" value="" id="id_banner"
                                                                name="id_banner"
                                                                readonly>
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
                                                            <label for="exampleFormControlInput1 uname">Tên Sản Phẩm:</label>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                                <input type="text" class="form-customer-input" id="_detail_name_banner"
                                                                    name="_name_banner"
                                                                    placeholder="Tên Sản Phẩm" value=""  readonly>
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
                                                                <input type="text" class="form-customer-input"  id="banner_adress"
                                                                    name="banner_adress" value=""
                                                                    placeholder="Địa chỉ" readonly>
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
                                                                    <input type="text" id="province" class="form-customer-input" value="" readonly>
                                                                </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="exampleFormControlSelect1">Quận/Huyện:</label>
                                                        </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <input type="text" id="district" class="form-customer-input" value="" readonly>
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
                                                            <input type="text" id="type_product" class="form-customer-input" value="" readonly>       
                                                        </div>
                                                    </div>
                
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="exampleFormControlInput1">Kết Cấu: </label>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                                <input type="text" class="form-customer-input" value="" id="id_system" name="id_system"
                                                                value="" placeholder="Kết Cấu" readonly>
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
                                                            <input type="text" id="status" class="form-customer-input" value="" readonly>
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
                                                                    name="size_banner" value=""
                                                                    placeholder="Kích thước" readonly>
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
                                                                value="" placeholder="Diện Tích" readonly>
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
                                                                    name="height_banner" value=""
                                                                    placeholder="Tổng chiều cao"  maxlength="20" readonly>
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
                                                                    name="light_system" value=""
                                                                    placeholder="Hệ thống đèn"  maxlength="20" readonly>
                                                        </div>
                
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="row">
                                                        <div class="col-md-6 col-sm-12">
                                                            <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                                                        </div>
                                                        <div class="col-md-6 col-sm-12">
                                                                <input class="form-customer-input" type="text" id="flow" name="flow" value=""
                                                                    placeholder="Lưu Lượng Người"  maxlength="20" readonly>
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
                                                                    name="v_light" value=""
                                                                    placeholder="Giá Đèn" readonly>
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
                                                                value="" placeholder="Điểm Escom" readonly>
                
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
                                                            <label for="exampleFormControlInput1 uname">Giá Sản Phẩm (USD): </label>
                                                        </div>
                                                        <div class="col-md-9 col-sm-12">
                                                                <input class="form-customer-input" type="text" id="gianam" data-type="currency"
                                                                    pattern="^\$\d{1,3}(,\d{3})*(\.\d+)?$" name="gianam" value=""
                                                                    placeholder="Giá Sản Phẩm" readonly>
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
                                                                    name="content" value=""
                                                                    placeholder="Nội Dung Quảng Cáo Hiện Tại" readonly>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    
                                    <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Đặc Điểm:</label>
                                            <textarea class="form-control text-aria" id="dac_diem" name="dac_diem" rows="5" readonly></textarea>
                                    </div>
                                    <fieldset class="border-text">
                                        <legend class='text-left'>Giấy phép quảng cáo</legend>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="license_number_advertise">Số giấy phép</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="text" id="license_number_advertise" name="license_number_advertise" value="" placeholder="Số giấy phép quảng cáo" readonly>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="start_date_advertise">Từ ngày</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="date" id="start_date_advertise" name="start_date_advertise" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="date_range_advertise">Ngày cấp</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="date" id="date_range_advertise" name="date_range_advertise" value="" readonly>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="end_date_advertise">Đến ngày</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="date" id="end_date_advertise" name="end_date_advertise" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="content_advertise">Nội dung giấy phép</label>
                                                </div>
                                                <div class="col-md-9 col-sm-12">
                                                    <input class="form-customer-input" id="content_advertise" type="text" name="content_advertise" value="" placeholder="Nội dung" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="border-text">
                                        <legend class='text-left'>Giấy phép xây dựng</legend>
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="license_number_build">Số giấy phép</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="text" id="license_number_build" name="license_number_build" placeholder="Số giấy phép xây dựng" value="" readonly>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="start_date_build">Từ ngày</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="date" id="start_date_build" name="start_date_build" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="date_range_build">Ngày cấp</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="date" id="date_range_build" name="date_range_build" value="" readonly>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="end_date_build">Đến ngày</label>
                                                </div>
                                                <div class="col-md-3 col-sm-12">
                                                    <input type="date" id="end_date_build" name="end_date_build" value="" readonly>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3 col-sm-12">
                                                    <label for="content_build">Nội dung giấy phép</label>
                                                </div>
                                                <div class="col-md-9 col-sm-12">
                                                    <input class="form-customer-input" type="text" id="content_build" name="content_build" value=""  placeholder="Nội dung" readonly>
                                                </div>
                                            </div>
                                        </div>
                                    </fieldset>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="row">
                                                    <div class="col-md-3 col-sm-12">
                                                        <label for="exampleFormControlInput1 uname">Ghi Chú: </label>
                                                    </div>
                                                    <div class="col-md-9 col-sm-12">
                                                            <input class="form-customer-input" type="text" id="note_banner"
                                                                name="note_banner" value=""
                                                                placeholder="Ghi Chú" readonly>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="col-md-12">
                            <div class="fixed_header">
                                <table class="table table-borderless table-data3 ">
                                    <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Mã Hợp Đồng</th>
                                        <th>Tên Khách Hàng</th>
                                        <th>Loại Hợp Đồng</th>
                                        <th>Tên Sản Phẩm</th>
                                        <th>Ngày Hết Hạn</th>
                                        <th>Tổng Giá Trị</th>
                                        <th>Đã Thanh Toán</th>
                                        <th>Công Nợ</th>
                                        <th>Trạng Thái</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody id="detail_finder_contract">
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
        </div>
        <!-- <div id="info_finder_contract">

        </div> -->
    </div>
@endsection
