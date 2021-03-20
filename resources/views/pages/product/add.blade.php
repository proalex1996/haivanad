@extends('pages.top-page.master')
@section('title','Thêm Pano')
@section('content')
    <div class="container-fluid" onload="getCountries()">
        <div class="col-md-12 m-b-40">
            <div class="overview-wrap">
                <h2 class="title-1">Thêm Mới Pano</h2>
                <a type="button" class="au-btn au-btn-icon au-btn--blue" href="import-product">
                    <i class="zmdi zmdi-plus"></i>Nhập file Excel
                </a>
            </div>
        </div>
        <form action="add" enctype="multipart/form-data" class="needs-validation" method="post">
            @csrf
            <div class="form-staff">
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Mã Pano: </label>
                    <input type="text" class="form-customer-input" id="id_banner" name="id_banner"
                           placeholder="Mã Pano" size="20" required>
                    <div class="invalid-feedback">Mã Pano không được để trống</div>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Loại Hình Sản Phẩm</label>
                    <select class="form-control" id="id_typebanner" name="id_typebanner">
                        @foreach($type_banners as $type_banner)
                            <option value="{{$type_banner->id_typebanner}}">{{$type_banner->name_type}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Kết Cấu: </label>
                    <input type="text" class="form-customer-input" id="id_system" name="id_system"
                           placeholder="Kết Cấu" required>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Vị Trí:</label>
                    <input type="text" class="form-customer-input" id="location" name="location"
                           placeholder="Tên Vị Trí" required>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Địa Chỉ: </label>
                    <input type="text" class="form-customer-input" id="banner_adress" name="banner_adress"
                           placeholder="Địa chỉ" required>
                    <div class="invalid-feedback">Địa chỉ không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Tỉnh/Thành Phố</label>
                    <select class="form-control" id="tinh" name="tinh" onchange="getQuan(this)">
                        <option value="">-- Chọn tỉnh thành --</option>
                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Quận/Huyện</label>
                    <select class="form-control" id="quan" name="quan">
                        <option value="">-- Chọn Quận/Huyện --</option>
                    </select>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Kích Thước:</label>
                    <input class="form-customer-input" type="number" id="size_banner" name="size_banner"
                           placeholder="Kích thước" required>
                    <div class="invalid-feedback">Kích thước không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Tổng Chiều Cao: </label>
                    <input class="form-customer-input" type="text" id="height_banner" name="height_banner"
                           placeholder="Tổng chiều cao" required>
                    <div class="invalid-feedback">Email không được để trống</div>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Hệ Thống Đèn: </label>
                    <input class="form-customer-input" type="text" id="light_system" name="light_system"
                           placeholder="Hệ thống đèn" required>
                    <div class="invalid-feedback">Hệ thống đèn không được để trống</div>
                </div>


                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Lưu Lượng Người: </label>
                    <input class="form-customer-input" type="number" id="flow" name="flow"
                           placeholder="Lưu Lượng Người" required>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Điểm Escom: </label>
                    <input class="form-customer-input" type="text" id="escom" name="escom" placeholder="Điểm Escom" required>
                </div>
                <div class="form-customer">
                    <label for="exampleFormControlInput1 uname">Ghi Chú: </label>
                    <input class="form-customer-input" type="text" id="note_banner" name="note_banner" placeholder="Ghi Chú" required>
                </div>

                <div class="form-customer">
                    <label for="exampleFormControlSelect1">Trạng Thái</label>
                    <select class="form-control" id="status_banner" name="status_banner">
                        @foreach($statuss as $status)
                            <option value="{{$status->id_status}}">{{$status->name_status}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Đặc Điểm</label>
                    <textarea class="form-control" id="dac_diem" name="dac_diem" rows="5" ></textarea>
                </div>
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Hình Ảnh</label>
                    <div class="custom-file">
                        <label class="custom-file-label" for="validatedCustomFile">Chọn file...</label>
                        <input type="file" class="custom-file-input" accept="image/*" id="thumb_banner"
                               name="thumb_banner" multiple required>
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


